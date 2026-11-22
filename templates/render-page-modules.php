<?php
/**
 * Rendert die ACF Flexible-Content-Felder aus `page_modules`
 * Erwartet pro Layout ein Partial unter: /template-parts/flex/layout-*.php
 */

if (!function_exists('have_rows') || !have_rows('page_modules')) {
  return;
}

$publication_group_open = false;
$publication_group_opts = [];
$publication_heading_layouts = [
  'section-heading',
  'section-publication-with-heading',
  'section_publication',
];
$close_publication_group = function () use (&$publication_group_open, &$publication_group_opts) {
  if (!$publication_group_open) {
    return;
  }

  echo '</div></div>';
  if (function_exists('section_close')) {
    section_close($publication_group_opts);
  } else {
    if ($publication_group_opts['container'] !== 'none') echo '</div>';
    echo '</section>';
  }
  $publication_group_open = false;
};

while (have_rows('page_modules')) : the_row();
  $layout = get_row_layout();

  if ($publication_group_open && $layout !== 'section-publication') {
    $close_publication_group();
  }

  if ($publication_group_open && $layout === 'section-publication') {
    get_template_part('template-parts/flex/layout', 'section-publication');
    continue;
  }

  // Section-Optionen 
  $opts = [
    'name'       => get_row_layout(),
    'container'  => get_sub_field('container') ?: 'container-lg',
    'padding_y'  => get_sub_field('padding_y') ?: 'py-5',
    'bg'         => get_sub_field('background') ?: 'none',
    'id'         => get_sub_field('id-anchor') ?: '',
    'show_on'    => get_sub_field('show-on') ?: 'everywhere',
  ];

  // Öffne Section-Hülle nur, wenn Helper existieren – sonst simple Wrapper
  if (function_exists('section_open')) {
    section_open($opts);
  } else {
    $name = $opts['name'];
    $id   = $opts['id'] ? ' id="'.esc_attr($opts['id']).'"' : '';
    $cont = $opts['container'];
    $py   = $opts['padding_y'];
    echo '<section'.$id.' class="'.$name.' '.$py.'">';
    if ($cont !== 'none') echo '<div class="'.$cont.'">';
  }

  switch (get_row_layout()) {
    case 'intro':
      get_template_part('template-parts/flex/layout', 'intro'); break;

    case 'text_1col':
      get_template_part('template-parts/flex/layout', 'text-1col'); break;

    case 'text_2col':
      get_template_part('template-parts/flex/layout', 'text-2col'); break;

    case 'text_3col':
      get_template_part('template-parts/flex/layout', 'text-3col'); break;

    case 'text_4col':
      get_template_part('template-parts/flex/layout', 'text-4col'); break;

    case 'text_left_image_right':
      get_template_part('template-parts/flex/layout', 'text-left-image-right'); break;

    case 'image_left_text_right':
      get_template_part('template-parts/flex/layout', 'image-left-text-right'); break;

    case 'image_slider':
      get_template_part('template-parts/flex/layout', 'image-slider'); break;

    case 'bildboxen':
      get_template_part('template-parts/flex/layout', 'bildboxen'); break;

    case 'galerie':
      get_template_part('template-parts/flex/layout', 'galerie'); break;

    case 'tabs':
      get_template_part('template-parts/flex/layout', 'tabs'); break;

    case 'akkordeon':
      get_template_part('template-parts/flex/layout', 'akkordeon'); break;

    case 'breaker':
      get_template_part('template-parts/flex/layout', 'breaker'); break;

    case 'code_editor':
      get_template_part('template-parts/flex/layout', 'code-editor'); break;

    case 'google_map':
      get_template_part('template-parts/flex/layout', 'google-map'); break;

    case 'project_highlight':
      get_template_part('template-parts/flex/layout', 'project-highlight'); break;

    case 'section_left_with_chevron':
      get_template_part('template-parts/flex/layout', 'section-left-with-chevron'); break;

    case 'section_right':
      get_template_part('template-parts/flex/layout', 'section-right'); break;

    case 'section_right_with_chevron':
      get_template_part('template-parts/flex/layout', 'section-right-with-chevron'); break;

    case 'contact':
      get_template_part('template-parts/flex/layout', 'contact'); break;

    case 'section-openinghours':
      get_template_part('template-parts/flex/layout', 'section-openinghours'); break;

    case 'section-mission':
      get_template_part('template-parts/flex/layout', 'section-mission'); break;

    case 'section-team':
      get_template_part('template-parts/flex/layout', 'section-team'); break;

    case 'section-members':
      get_template_part('template-parts/flex/layout', 'section-members'); break;

    case 'section-sponsors':
      get_template_part('template-parts/flex/layout', 'section-sponsors'); break;

    case 'section-exhibition':
      get_template_part('template-parts/flex/layout', 'section-exhibition'); break;

    case 'section-heading':
    case 'section-publication-with-heading':
    case 'section_publication':
      get_template_part('template-parts/flex/layout', 'section-heading'); break;

    case 'section-publication':
      get_template_part('template-parts/flex/layout', 'section-publication'); break;

  }

  if (in_array($opts['name'], $publication_heading_layouts, true)) {
    $publication_group_open = true;
    $publication_group_opts = $opts;
  } elseif (function_exists('section_close')) {
    section_close($opts);
  } else {
    if ($opts['container'] !== 'none') echo '</div>';
    echo '</section>';
  }

endwhile;

$close_publication_group();