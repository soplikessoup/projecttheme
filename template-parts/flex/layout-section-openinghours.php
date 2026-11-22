<?php
$section_label = get_sub_field('section_label');
$hours_title   = get_sub_field('hours_title');
$weekday_label = get_sub_field('weekday_label');
$weekday_time  = get_sub_field('weekday_time');
$saturday_label = get_sub_field('saturday_label');
$saturday_time  = get_sub_field('saturday_time');
$hours_note    = get_sub_field('hours_note');
$tours_title   = get_sub_field('tours_title');
$tours_subtitle = get_sub_field('tours_subtitle');
$email_link    = get_sub_field('email_link');
$email_button_label = get_sub_field('email_button_label') ?: 'Write us an e-mail';
$phone_link    = get_sub_field('phone_link');
$phone_button_label = get_sub_field('phone_button_label') ?: 'Or call us';
$admission_text = get_sub_field('admission_text');
$label_class   = $section_label ? ' has-label' : '';

$hours_rows = [
  ['label' => $weekday_label, 'time' => $weekday_time],
  ['label' => $saturday_label, 'time' => $saturday_time],
];
$contact_links = [
  ['link' => $email_link, 'label' => $email_button_label],
  ['link' => $phone_link, 'label' => $phone_button_label],
];
?>
<div class="section-openinghours__module<?php echo esc_attr($label_class); ?>">
  <?php if ($section_label): ?>
    <div class="section-openinghours__label">
      <h1><?php echo esc_html($section_label); ?></h1>
    </div>
  <?php endif; ?>

  <div class="section-openinghours__content">
    <div class="section-openinghours__schedule">
      <?php if ($hours_title): ?>
        <h2 class="section-openinghours__title"><?php echo esc_html($hours_title); ?></h2>
      <?php endif; ?>

      <div class="section-openinghours__hours">
        <?php foreach ($hours_rows as $row): ?>
          <?php if ($row['label'] || $row['time']): ?>
            <div class="section-openinghours__hours-row">
              <span><?php echo esc_html($row['label']); ?></span>
              <span><?php echo esc_html($row['time']); ?></span>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <?php if ($hours_note): ?>
        <p class="section-openinghours__note"><?php echo esc_html($hours_note); ?></p>
      <?php endif; ?>
    </div>

    <div class="section-openinghours__tours">
      <?php if ($tours_title): ?>
        <h2 class="section-openinghours__title"><?php echo esc_html($tours_title); ?></h2>
      <?php endif; ?>

      <?php if ($tours_subtitle): ?>
        <p class="section-openinghours__subtitle"><?php echo esc_html($tours_subtitle); ?></p>
      <?php endif; ?>

      <div class="section-openinghours__links">
        <?php foreach ($contact_links as $contact_link): ?>
          <?php
          $link = $contact_link['link'];
          $url = is_array($link) ? ($link['url'] ?? '') : '';
          $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
          $rel = $target === '_blank' ? 'noopener noreferrer' : '';
          ?>
          <?php if ($url): ?>
            <a class="btn btn-primary"
               href="<?php echo esc_url($url); ?>"
               target="<?php echo esc_attr($target); ?>"
               rel="<?php echo esc_attr($rel); ?>">
              <?php echo esc_html($contact_link['label']); ?>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <?php if ($admission_text): ?>
      <p class="section-openinghours__admission"><?php echo esc_html($admission_text); ?></p>
    <?php endif; ?>
  </div>

  <img class="section-openinghours__chevron"
       src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/section-chevron-right.png'); ?>"
       alt=""
       aria-hidden="true">
</div>
