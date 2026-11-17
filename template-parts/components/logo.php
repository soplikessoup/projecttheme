<?php
/**
 * Site logo component.
 *
 */

$logo_url  = get_template_directory_uri() . '/assets/images/rotor_logo.jpeg';
$site_name = get_bloginfo( 'name' );
?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( $site_name ); ?>">
    <img
      class="site-logo"
      src="<?php echo esc_url( $logo_url ); ?>"
      alt="<?php echo esc_attr( $site_name ); ?>"
    >
  </a>
