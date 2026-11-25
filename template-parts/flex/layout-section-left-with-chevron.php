<?php
$section_label = get_sub_field('section_label');
$image_id      = get_sub_field('image');
$title         = get_sub_field('title');
$subtitle      = get_sub_field('subtitle');
$link          = get_sub_field('button');
$show_chevron  = get_sub_field('show_chevron');
$show_chevron  = $show_chevron === null ? true : (bool) $show_chevron;

$link_url    = is_array($link) ? ($link['url'] ?? '') : '';
$link_title  = is_array($link) ? ($link['title'] ?? '') : '';
$link_target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
$link_rel    = $link_target === '_blank' ? 'noopener noreferrer' : '';
$label_class = $section_label ? ' has-label' : '';
$chevron_class = $show_chevron ? ' has-chevron' : '';
?>
<div class="section-left-with-chevron<?php echo esc_attr($label_class . $chevron_class); ?>">
  <?php if ($section_label): ?>
    <div class="section-left-with-chevron__label">
      <h1><?php echo esc_html($section_label); ?></h1>
    </div>
  <?php endif; ?>

  <?php if ($image_id): ?>
    <div class="section-left-with-chevron__image">
      <?php
      echo wp_get_attachment_image($image_id, 'large', false, [
        'class'    => 'img-fluid',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]);
      ?>
    </div>
  <?php endif; ?>

<div class="section-left-with-chevron__content">
  <?php if ($title): ?>
    <h2 class="section-left-with-chevron__title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>

  <?php if ($subtitle): ?>
    <div class="section-left-with-chevron__subtitle">
      <?php echo wp_kses_post($subtitle); ?>
    </div>
  <?php endif; ?>


    <?php if ($link_url): ?>
      <a class="btn btn-primary"
         href="<?php echo esc_url($link_url); ?>"
         target="<?php echo esc_attr($link_target); ?>"
         rel="<?php echo esc_attr($link_rel); ?>">
        <?php echo esc_html($link_title ?: '>>'); ?>
      </a>
    <?php endif; ?>
  </div>
</div>
