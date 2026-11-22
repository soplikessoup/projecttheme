<?php
$cover_image = get_sub_field('cover_image');
$title = get_sub_field('title');
$price = get_sub_field('price');
$details = get_sub_field('publication_details');
$contributors = get_sub_field('contributors');
$description = get_sub_field('description');
$order_link = get_sub_field('order_link');
$order_url = is_array($order_link) ? ($order_link['url'] ?? '') : '';
$order_title = is_array($order_link) ? ($order_link['title'] ?? '') : '';
$order_target = is_array($order_link) && !empty($order_link['target']) ? $order_link['target'] : '_self';
$order_rel = $order_target === '_blank' ? 'noopener noreferrer' : '';
$has_publication = $cover_image || $title || $price || $details || $contributors || $description || $order_url;

if (!$has_publication) {
  return;
}
?>
<article class="section-publication__card">
  <div class="section-publication__book">
    <?php if ($cover_image): ?>
      <?php
      echo wp_get_attachment_image($cover_image, 'medium', false, [
        'class'    => 'section-publication__cover',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]);
      ?>
    <?php endif; ?>

    <?php if ($title): ?>
      <h2 class="section-publication__book-title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($price): ?>
      <h3>€</h3>
      <h1 class="section-publication__price">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo esc_html($price); ?></h1>
    <?php endif; ?>

    <?php if ($details): ?>
      <div class="section-publication__details rte">
        <?php echo wp_kses_post($details); ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($contributors): ?>
    <div class="section-publication__contributors rte">
      <?php echo wp_kses_post($contributors); ?>
    </div>
  <?php else: ?>
    <div class="section-publication__contributors"></div>
  <?php endif; ?>

  <div class="section-publication__description rte">
    <?php if ($description): ?>
      <?php echo wp_kses_post($description); ?>
    <?php endif; ?>

    <?php if ($order_url): ?>
      <a class="btn btn-primary"
         href="<?php echo esc_url($order_url); ?>"
         target="<?php echo esc_attr($order_target); ?>"
         rel="<?php echo esc_attr($order_rel); ?>">
        <?php echo esc_html($order_title ?: 'order via mail'); ?>
      </a>
    <?php endif; ?>


  </div>
</article>
