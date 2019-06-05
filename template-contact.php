<?php
/*
 * Template Name: Contact Template
 */
?>

<?php get_header(); ?>

	<main id="main" class="page-main contact" role="main">
    <div class="container flex content-between">
      <div class="left-part">
        <h4>Contact</h4>
          <div class="form-holder">
              <?php echo do_shortcode('[contact-form-7 id="171" title="Contact form 1"]') ?>
          </div>
      </div>
      <div class="right-part">
          <?php get_sidebar(); ?>
      </div>
    </div>
	</main>

<?php get_footer(); ?>