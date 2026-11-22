<?php
$section_label      = get_sub_field('section_label');
$team_column_1      = get_sub_field('team_column_1');
$team_column_2      = get_sub_field('team_column_2');
$team_column_3      = get_sub_field('team_column_3');
$full_width_content = get_sub_field('full_width_content');
$label_class        = $section_label ? ' has-label' : '';

$team_columns = [$team_column_1, $team_column_2, $team_column_3];
?>
<div class="section-team__module<?php echo esc_attr($label_class); ?>">
  <?php if ($section_label): ?>
    <div class="section-team__label">
      <h1><?php echo esc_html($section_label); ?></h1>
    </div>
  <?php endif; ?>

  <div class="section-team__content">
    <?php if (array_filter($team_columns)): ?>
      <div class="section-team__columns">
        <?php foreach ($team_columns as $column): ?>
          <div class="section-team__column rte">
            <?php echo wp_kses_post($column); ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($full_width_content): ?>
      <div class="section-team__full-width rte">
        <?php echo wp_kses_post($full_width_content); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
