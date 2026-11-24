<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

  <header id="masthead" class="site-header">
    <div class="site-branding">
      <?php get_template_part( 'template-parts/components/logo' ); ?>
      <?php
      $language_links = apply_filters( 'wpml_active_languages', null, array( 'skip_missing' => 0 ) );
      if ( ! is_array( $language_links ) && function_exists( 'pll_the_languages' ) ) {
        $language_links = pll_the_languages( array( 'raw' => 1, 'hide_if_empty' => 0 ) );
      }
      $site_languages = array();

      if ( is_array( $language_links ) ) {
        foreach ( $language_links as $language ) {
          $language_code = strtoupper( substr( $language['language_code'] ?? $language['slug'] ?? '', 0, 2 ) );
          $language_url  = $language['url'] ?? '';

          if ( in_array( $language_code, array( 'EN', 'DE' ), true ) && $language_url ) {
            $site_languages[] = array(
              'code'    => $language_code,
              'url'     => $language_url,
              'current' => ! empty( $language['active'] ) || ! empty( $language['current_lang'] ),
            );
          }
        }
      }
      ?>
      <nav class="site-language-switch" aria-label="<?php esc_attr_e( 'Language', 'textdomaintomodify' ); ?>">
        <?php if ( $site_languages ) : ?>
          <?php foreach ( $site_languages as $index => $language ) : ?>
            <?php if ( $index > 0 ) : ?><span aria-hidden="true">/</span><?php endif; ?>
            <a href="<?php echo esc_url( $language['url'] ); ?>"
               hreflang="<?php echo esc_attr( strtolower( $language['code'] ) ); ?>"
               <?php if ( $language['current'] ) : ?>class="is-current" aria-current="page"<?php endif; ?>>
              <?php echo esc_html( $language['code'] ); ?>
            </a>
          <?php endforeach; ?>
        <?php else : ?>
          <span class="is-current">EN</span>
          <span aria-hidden="true">/</span>
          <span>DE</span>
        <?php endif; ?>
      </nav>
    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation">
        <button
          class="menu-toggle"
          type="button"
          aria-controls="menu-main"
          aria-expanded="false"
        >
          <span class="menu-toggle-label"><?php esc_html_e( 'Menu', 'textdomaintomodify' ); ?></span>
          <span class="menu-toggle-icon" aria-hidden="true">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </button>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-main',
            'menu_id'        => 'menu-main',
            'menu_class'     => 'main-menu',
            'container_class' => 'main-menu-container',
          )
        );
        ?>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->

  <div id="content" class="site-content">
