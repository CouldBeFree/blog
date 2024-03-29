<?php
/*
 * Template Name: Custom Template
 */
?>

<?php get_header(); ?>

	<main id="main" class="page-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      	<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

      	<div class="page-content">
      		<?php the_content(); ?>
      	</div>

      </article>

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>
