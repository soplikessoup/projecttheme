<?php
$section_label = get_sub_field('section_label');
$sponsors_intro = get_sub_field('sponsors_intro');
$top_sponsors = [
  [
    'text' => get_sub_field('sponsor_top_left'),
    'logo' => get_sub_field('sponsor_top_left_logo'),
  ],
  [
    'text' => get_sub_field('sponsor_top_center'),
    'logo' => get_sub_field('sponsor_top_center_logo'),
  ],
  [
    'text' => get_sub_field('sponsor_top_right'),
    'logo' => get_sub_field('sponsor_top_right_logo'),
  ],
];
$bottom_sponsors = [
  [
    'text' => get_sub_field('sponsor_bottom_left'),
    'logo' => get_sub_field('sponsor_bottom_left_logo'),
  ],
  [
    'text' => get_sub_field('sponsor_bottom_center'),
    'logo' => get_sub_field('sponsor_bottom_center_logo'),
  ],
  [
    'text' => get_sub_field('sponsor_bottom_right'),
    'logo' => get_sub_field('sponsor_bottom_right_logo'),
  ],
];
$association = get_sub_field('sponsors_association');
$label_class = $section_label ? ' has-label' : '';
$has_sponsors = false;

foreach (array_merge($top_sponsors, $bottom_sponsors) as $sponsor) {
  if ($sponsor['text'] || $sponsor['logo']) {
    $has_sponsors = true;
    break;
  }
}
?>
<div class="section-sponsors__module<?php echo esc_attr($label_class); ?>">
  <?php if ($section_label): ?>
    <div class="section-sponsors__label">
      <h1><?php echo esc_html($section_label); ?></h1>
    </div>
  <?php endif; ?>

  <div class="section-sponsors__content">
    <?php if ($sponsors_intro): ?>
      <p class="section-sponsors__intro"><?php echo esc_html($sponsors_intro); ?></p>
    <?php endif; ?>

    <?php if ($has_sponsors): ?>
      <div class="section-sponsors__divider" aria-hidden="true"></div>
    <?php endif; ?>

    <?php if ($has_sponsors): ?>
      <div class="section-sponsors__grid">
        <?php foreach ([$top_sponsors, $bottom_sponsors] as $sponsor_row): ?>
          <?php if (array_filter(array_column($sponsor_row, 'text')) || array_filter(array_column($sponsor_row, 'logo'))): ?>
            <div class="section-sponsors__row">
              <?php foreach ($sponsor_row as $sponsor): ?>
                <div class="section-sponsors__item">
                  <?php if ($sponsor['logo']): ?>
                    <?php
                    $image_attributes = [
                      'class'    => 'section-sponsors__logo',
                      'loading'  => 'lazy',
                      'decoding' => 'async',
                    ];
                    if ($sponsor['text']) {
                      $image_attributes['alt'] = '';
                    }
                    echo wp_get_attachment_image($sponsor['logo'], 'medium', false, $image_attributes);
                    ?>
                  <?php endif; ?>
                  <?php if ($sponsor['text']): ?>
                    <span class="section-sponsors__name">
                      <?php echo esc_html($sponsor['text']); ?>
                    </span>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($association): ?>
      <div class="section-sponsors__association">
        <?php echo esc_html($association); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
