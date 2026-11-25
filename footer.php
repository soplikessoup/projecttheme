
  </div><!-- #content -->

  <footer id="colophon" class="site-footer">
    <div class="footer-content container-lg">
      <div class="footer-branding">
        <div class="footer-brand-row">
          <a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rotor_logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
          </a>
          <span class="footer-language-switch" ><span class="is-current">EN</span><span aria-hidden="true">/</span><span>DE</span></span>
        </div>
        <div class="footer-social">
          <a href="https://www.instagram.com/rotor.contemporary/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <svg class="footer-social-icon footer-social-icon--instagram" viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="5"></rect><circle cx="12" cy="12" r="4"></circle><circle class="footer-social-icon-dot" cx="17.5" cy="6.5" r="1"></circle></svg>
          </a>
          <a href="https://www.facebook.com/rotor.contemporary.art/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <svg class="footer-social-icon footer-social-icon--facebook" viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3h-3.1V8.1c0-.9.3-1.5 1.6-1.5h1.7V3.9c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3V10H7.3v3h2.8v8h3.4Z"></path></svg>
          </a>
          <a href="https://www.youtube.com/@rotorcentreforcontemporary2712" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
            <svg class="footer-social-icon footer-social-icon--youtube" viewBox="0 0 24 24" aria-hidden="true"><rect x="2.5" y="5" width="19" height="14" rx="4"></rect><path d="M10 9v6l5-3-5-3Z"></path></svg>
          </a>
        </div>
      </div>
      <?php wp_nav_menu( array( 'theme_location' => 'menu-footer', 'menu_id' => 'menu-footer', 'container' => false ) ); ?>
    </div>
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
