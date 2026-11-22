document.addEventListener('DOMContentLoaded', () => {
  const navigation = document.querySelector('#site-navigation');
  const toggle = navigation?.querySelector('.menu-toggle');
  const menu = navigation?.querySelector('.main-menu-container');

  if (!navigation || !toggle || !menu) {
    return;
  }

  const setMenuOpen = (isOpen) => {
    navigation.classList.toggle('is-open', isOpen);
    document.body.classList.toggle('menu-open', isOpen);
    toggle.setAttribute('aria-expanded', String(isOpen));
  };

  toggle.addEventListener('click', () => {
    setMenuOpen(!navigation.classList.contains('is-open'));
  });

  menu.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMenuOpen(false));
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && navigation.classList.contains('is-open')) {
      setMenuOpen(false);
      toggle.focus();
    }
  });

  window.addEventListener('resize', () => {
    if (window.matchMedia('(min-width: 768px)').matches) {
      setMenuOpen(false);
    }
  });
});
