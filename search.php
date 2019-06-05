<?php get_header(); ?>

<main id="main" class="site-main search" role="main">

  <div class="container">
    <header class="page-header">
      <h1 class="search-title"><?php printf( esc_html__( 'Search Results for: %s', 'theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>
  </div>
  <div class="container flex content-between main-wrap">
    <div class="left-part responsive-wrap">
      <ul class="category-list-holder" id="target">
          <?php if ( have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post(); ?>

                  <?php get_template_part( 'template-parts/content', 'search' ); ?>

              <?php endwhile; ?>

          <?php else : ?>

              <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; ?>
          <?php if ($wp_query->max_num_pages > 1) : ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <div class="more_block button-wrap search-button">
              <div class="btn_more_blocks news__button load" id="true_loadmore2">
                <span>Load more</span>
              </div>
            </div>
          <?php endif; ?>
      </ul>
    </div>
    <div class="right-part">
        <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<div class="additional-posts">
  <h4>You Might Also Like</h4>
  <div class="additional-posts__container">
      <?php
      $cat_args = array(
          'orderby' => 'name',
          'order' => 'DESC',
          'child_of' => 0
      );

      $categories =  get_categories($cat_args);

      foreach($categories as $category) {
          echo '';
          $post_args = array(
              'numberposts' => 1,
              'category' => $category->term_id
          );

          $posts = get_posts($post_args);

          foreach($posts as $post) {
              ?>
            <div class="additional-posts__item">
              <a href="<?php the_permalink(); ?>"><div class="image-holder" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') no-repeat; background-size: cover">
                </div></a>
                <?php echo '<p class="category"><a href="' . get_category_link( $category->term_id ) . '" title="' . $category->name . '" ' . ' class="category">' . $category->name.'</a></p>';?>
              <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
              <?php
          }
          echo '</dl>';
      }

      ?>
  </div>
</div>
<?php get_footer(); ?>
