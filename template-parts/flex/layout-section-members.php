<?php
$section_label = get_sub_field('section_label');
$members_roster = get_sub_field('members_roster');
$corresponding_title = get_sub_field('corresponding_members_title');
$corresponding_roster = get_sub_field('corresponding_members_roster');
$label_class = $section_label ? ' has-label' : '';
?>
<div class="section-members__module<?php echo esc_attr($label_class); ?>">
  <?php if ($section_label): ?>
    <div class="section-members__label">
      <h1><?php echo esc_html($section_label); ?></h1>
    </div>
  <?php endif; ?>

  <div class="section-members__content">
    <?php if ($members_roster): ?>
      <div class="section-members__roster">
        <?php echo nl2br(esc_html($members_roster)); ?>
      </div>

      <?php if ($corresponding_title || $corresponding_roster): ?>
        <div class="section-members__divider" aria-hidden="true"></div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if ($corresponding_title || $corresponding_roster): ?>
      <div class="section-members__corresponding">
        <?php if ($corresponding_title): ?>
          <h3 class="section-members__corresponding-title">
            <?php echo esc_html($corresponding_title); ?>
          </h3>
        <?php endif; ?>

        <?php if ($corresponding_roster): ?>
          <div class="section-members__roster">
            <?php echo nl2br(esc_html($corresponding_roster)); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
