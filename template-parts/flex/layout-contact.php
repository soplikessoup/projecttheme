<?php
$section_title    = get_sub_field('section_title');
$newsletter_text  = get_sub_field('newsletter_text');
$newsletter_link  = get_sub_field('newsletter_link');
$newsletter_button_display = get_sub_field('newsletter_button_display') ?: 'icon_text';
$social_title     = get_sub_field('social_title');
$newsletter_url   = is_array($newsletter_link) ? ($newsletter_link['url'] ?? '') : '';
$newsletter_label = is_array($newsletter_link) ? ($newsletter_link['title'] ?? '') : '';
$newsletter_label = $newsletter_label ?: 'SUBSCRIBE NEWSLETTER HERE';
$newsletter_target = is_array($newsletter_link) && !empty($newsletter_link['target']) ? $newsletter_link['target'] : '_self';
$newsletter_rel    = $newsletter_target === '_blank' ? 'noopener noreferrer' : '';
$newsletter_display_options = ['text', 'icon', 'icon_text'];
if (!in_array($newsletter_button_display, $newsletter_display_options, true)) {
  $newsletter_button_display = 'icon_text';
}
$module_class = $section_title ? ' has-label' : '';
$social_links = [
  ['label' => 'Instagram', 'icon' => 'instagram', 'link' => get_sub_field('instagram_link')],
  ['label' => 'Facebook', 'icon' => 'facebook', 'link' => get_sub_field('facebook_link')],
  ['label' => 'YouTube', 'icon' => 'youtube', 'link' => get_sub_field('youtube_link')],
];
?>
<div class="contact-module<?php echo esc_attr($module_class); ?>">
  <?php if ($section_title): ?>
    <div class="contact-module__label">
      <h1><?php echo esc_html($section_title); ?></h1>
    </div>
  <?php endif; ?>

  <div class="contact-module__content">
    <div class="contact-module__newsletter">
      <?php if ($newsletter_text): ?>
        <div class="contact-module__newsletter-text rte">
          <?php echo wp_kses_post($newsletter_text); ?>
        </div>
      <?php endif; ?>

      <?php if ($newsletter_url): ?>
        <a class="btn btn-primary contact-module__newsletter-link contact-module__newsletter-link--<?php echo esc_attr($newsletter_button_display); ?>"
           href="<?php echo esc_url($newsletter_url); ?>"
           target="<?php echo esc_attr($newsletter_target); ?>"
           rel="<?php echo esc_attr($newsletter_rel); ?>"
           <?php if ($newsletter_button_display === 'icon'): ?>aria-label="<?php echo esc_attr($newsletter_label); ?>"<?php endif; ?>>
          <?php if ($newsletter_button_display !== 'text'): ?>
            <svg class="contact-module__newsletter-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
              <rect x="3" y="5" width="18" height="14" rx="1"></rect>
              <path d="m3.5 6 8.5 7 8.5-7"></path>
            </svg>
          <?php endif; ?>
          <?php if ($newsletter_button_display !== 'icon'): ?>
            <span><?php echo esc_html($newsletter_label); ?></span>
          <?php endif; ?>
        </a>
      <?php endif; ?>
    </div>

    <div class="contact-module__social">
      <?php if ($social_title): ?>
        <h3 class="contact-module__social-title"><?php echo esc_html($social_title); ?></h3>
      <?php endif; ?>

      <div class="contact-module__social-links">
        <?php foreach ($social_links as $social_link): ?>
          <?php
          $link = $social_link['link'];
          $url = is_array($link) ? ($link['url'] ?? '') : '';
          if (!$url) continue;
          $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_blank';
          $rel = $target === '_blank' ? 'noopener noreferrer' : '';
          ?>
          <a class="btn btn-primary contact-module__social-link"
             href="<?php echo esc_url($url); ?>"
             target="<?php echo esc_attr($target); ?>"
             rel="<?php echo esc_attr($rel); ?>"
             aria-label="<?php echo esc_attr($social_link['label']); ?>">
            <?php if ($social_link['icon'] === 'instagram'): ?>
              <svg class="contact-module__social-icon contact-module__social-icon--instagram" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <rect x="3.5" y="3.5" width="17" height="17" rx="5"></rect>
                <circle cx="12" cy="12" r="4"></circle>
                <circle class="contact-module__social-icon-dot" cx="17.5" cy="6.5" r="1"></circle>
              </svg>
            <?php elseif ($social_link['icon'] === 'facebook'): ?>
              <svg class="contact-module__social-icon contact-module__social-icon--facebook" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M13.5 21v-8h2.7l.4-3h-3.1V8.1c0-.9.3-1.5 1.6-1.5h1.7V3.9c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3V10H7.3v3h2.8v8h3.4Z"></path>
              </svg>
            <?php else: ?>
              <svg class="contact-module__social-icon contact-module__social-icon--youtube" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <rect x="2.5" y="5" width="19" height="14" rx="4"></rect>
                <path d="M10 9v6l5-3-5-3Z"></path>
              </svg>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
