<?php
/*
 * Template Name: About Template
 */
?>

<?php get_header(); ?>

	<main id="main" class="page-main about" role="main"><?php while ( have_posts() ) : the_post(); ?>
      <div class="container flex content-between main-wrap home">
        <div class="left-part">
          <div class="article-holder">
            <h2><?php echo CFS()->get( 'about_title' ); ?></h2>
            <h1><?php echo CFS()->get( 'author' ); ?></h1>
            <div class="article-holder__image" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') no-repeat; background-size: cover">
            </div>
            <div class="article-holder__content">
                <?php the_content(); ?>
            </div>
          </div>
        </div>
        <div class="right-part">
            <?php get_sidebar(); ?>
        </div>
      </div>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="page-content">
        </div>
      </article>

      <?php endwhile; ?>


	</main>

<?php get_footer(); ?>
