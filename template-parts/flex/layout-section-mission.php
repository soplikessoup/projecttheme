<?php
$section_label = get_sub_field('section_label');
$left_column   = get_sub_field('left_column');
$right_column  = get_sub_field('right_column');
$label_class   = $section_label ? ' has-label' : '';
?>
<div class="section-mission__module<?php echo esc_attr($label_class); ?>">
  <?php if ($section_label): ?>
    <div class="section-mission__label">
      <h1><?php echo esc_html($section_label); ?></h1>
    </div>
  <?php endif; ?>

  <div class="section-mission__content">
    <?php if ($left_column): ?>
      <div class="section-mission__column section-mission__column--primary rte">
        <?php echo wp_kses_post($left_column); ?>
      </div>
    <?php endif; ?>

    <?php if ($right_column): ?>
      <div class="section-mission__column section-mission__column--secondary rte">
        <?php echo wp_kses_post($right_column); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
