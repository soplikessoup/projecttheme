<?php
$section_label       = get_sub_field('section_label');
$exhibition_title    = get_sub_field('exhibition_title');
$exhibition_subtitle = get_sub_field('exhibition_subtitle');
$opening_details     = get_sub_field('opening_details');
$preview_details    = get_sub_field('preview_details');
$duration_details   = get_sub_field('duration_details');
$participating_artists = get_sub_field('participating_artists');
$curated_by          = get_sub_field('curated_by');
$artwork_image       = get_sub_field('artwork_image');
$artwork_caption     = get_sub_field('artwork_caption');
$description         = get_sub_field('description');
$visit_link          = get_sub_field('visit_link');
$admission_text      = get_sub_field('admission_text');
$credits             = get_sub_field('credits');
$label_class         = $section_label ? ' has-label' : '';

$visit_url    = is_array($visit_link) ? ($visit_link['url'] ?? '') : '';
$visit_title  = is_array($visit_link) ? ($visit_link['title'] ?? '') : '';
$visit_target = is_array($visit_link) && !empty($visit_link['target']) ? $visit_link['target'] : '_self';
$visit_rel    = $visit_target === '_blank' ? 'noopener noreferrer' : '';

$has_overview = $opening_details || $preview_details || $duration_details
  || $participating_artists || $curated_by || $artwork_image;
?>
<div class="section-exhibition__module<?php echo esc_attr($label_class); ?>">
  <?php if ($section_label): ?>
    <div class="section-exhibition__label">
      <h1><?php echo esc_html($section_label); ?></h1>
    </div>
  <?php endif; ?>

  <div class="section-exhibition__content">
    <?php if ($exhibition_title): ?>
      <h2 class="section-exhibition__title"><?php echo esc_html($exhibition_title); ?></h2>
    <?php endif; ?>

    <?php if ($exhibition_subtitle): ?>
      <p class="section-exhibition__subtitle"><?php echo esc_html($exhibition_subtitle); ?></p>
    <?php endif; ?>

    <?php if ($has_overview): ?>
      <div class="section-exhibition__overview<?php echo $artwork_image ? ' has-artwork' : ''; ?>">
        <div class="section-exhibition__info">
          <?php if ($opening_details): ?>
              <h3>Exhibition opening:</h3>
              <div class="rte"><?php echo wp_kses_post($opening_details); ?></div>
          <?php endif; ?>

          <?php if ($preview_details): ?>
            <div class="section-exhibition__preview">
              <h3>Preview:</h3>
              <p><?php echo nl2br(esc_html($preview_details)); ?></p>
            </div>
          <?php endif; ?>

          <?php if ($duration_details): ?>
              <h3>Exhibition duration:</h3>
              <p><?php echo nl2br(esc_html($duration_details)); ?></p>
          <?php endif; ?>

          <?php if ($participating_artists): ?>
            <div class="section-exhibition__info-group section-exhibition__artists">
              <h3>Participating artists:</h3>
              <div class="rte"><?php echo wp_kses_post($participating_artists); ?></div>
            </div>
          <?php endif; ?>

          <?php if ($curated_by): ?>
            <div class="section-exhibition__info-group section-exhibition__curated">
              <h3>Curated by:</h3>
              <div class="rte"><?php echo wp_kses_post($curated_by); ?></div>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($artwork_image): ?>
          <figure class="section-exhibition__artwork">
            <?php
            echo wp_get_attachment_image($artwork_image, 'large', false, [
              'loading'  => 'lazy',
              'decoding' => 'async',
            ]);
            ?>
            <?php if ($artwork_caption): ?>
              <figcaption class="section-exhibition__caption">
                <?php echo esc_html($artwork_caption); ?>
              </figcaption>
            <?php endif; ?>
          </figure>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($description): ?>
      <div class="section-exhibition__description">
        <div class="section-exhibition__divider" aria-hidden="true"></div>
        <div class="section-exhibition__copy rte">
          <?php echo wp_kses_post($description); ?>
        </div>
        <div class="section-exhibition__divider" aria-hidden="true"></div>
      </div>
    <?php endif; ?>

    <?php if ($visit_url || $admission_text): ?>
      <div class="section-exhibition__footer">
        <?php if ($visit_url): ?>
          <a class="btn btn-primary"
             href="<?php echo esc_url($visit_url); ?>"
             target="<?php echo esc_attr($visit_target); ?>"
             rel="<?php echo esc_attr($visit_rel); ?>">
            <?php echo esc_html($visit_title ?: 'VISIT'); ?>
          </a>
        <?php endif; ?>

        <?php if ($admission_text): ?>
          <div class="section-exhibition__admission">
            <span><?php echo esc_html($admission_text); ?></span>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/section-chevron-right.png'); ?>"
                 alt=""
                 aria-hidden="true">
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($credits): ?>
      <div class="section-exhibition__credits">
        <?php echo wp_kses_post($credits); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
