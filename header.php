<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php get_template_part( 'template-parts/head' ); ?>
</head>

<body <?php body_class("page-body"); ?>>

<header class="page-header">
  <div class="container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link" rel="home"><img src="<?php echo get_theme_mod('logo'); ?>" alt=""></a>
    <nav class="main-nav" role="navigation">
      <button class="burger-menu flex align-center"><span class="icon-menu"><span class="icon-menu__item"></span><span class="icon-menu__item"></span><span class="icon-menu__item"></span></span>Menu</button>
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'main-nav__list', 'container' => false ) ); ?>
      <button class="search-btn" id="search-btn"><span class="icon-magnifying-glass" id="target-icon"></span></button>
      <div class="search-block flex content-between align-center">
        <form class="search-form flex content-between align-center" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
          <input type="text" placeholder="What are you looking for?" id="search" class="search-block__item toggle" value="<?php echo get_search_query() ?>" name="s" id="s" />
          <button type="submit" id="searchsubmit" class="search-block__button search-block__item toggle"><span class="icon-magnifying-glass"></span></button>
        </form>
      </div>
    </nav>
  </div>
</header>