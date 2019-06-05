<!DOCTYPE html>
  <html <?php language_attributes(); ?>>
  <head>
      <?php get_template_part( 'template-parts/head' ); ?>
  </head>

  <body class="page" <?php body_class("page-body"); ?>>

  <div class="wrapper">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link" rel="home"><img src="<?php echo get_theme_mod('logo'); ?>" alt=""></a>
    <div class="content-holder">
      <p class="number">404</p>
      <p class="description">Sorry! That page can’t be found</p>
    </div>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="load">back to homepage</a>
  </div>

  <?php wp_footer(); ?>
  </body>
</html>