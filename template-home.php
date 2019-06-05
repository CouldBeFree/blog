<?php
/*
 * Template Name: Home Template
 */
?>

<?php get_header(); ?>

<main id="main" class="page-main responsive" role="main">
  <div class="container flex content-between main-wrap">
    <div class="left-part responsive-wrap">
      <div class="article-holder" id="ajaxTarget">

          <?php
          $args = [
              'post_type' => 'post',
              'posts_per_page' => 2,
              'order' => 'DESC'
          ];

          query_posts($args);

          while (have_posts()) : the_post();

              get_template_part('template-parts/content', 'posts');

              // If comments are open or we have at least one comment, load up the comment template.
              if (comments_open() || get_comments_number()) :
                  comments_template();
              endif;

          endwhile; // End of the loop.
          ?>

          <?php if ($wp_query->max_num_pages > 1) : ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <div class="more_block button-wrap">
              <div class="btn_more_blocks news__button load" id="true_loadmore">
                <span>Load more</span>
              </div>
            </div>
          <?php endif; ?>
      </div>
    </div>
    <div class="right-part">
        <?php get_sidebar(); ?>
    </div>
  </div>
  <div class="additional-posts">
    <h4>You Might Also Like</h4>
    <div class="additional-posts__container">
        <?php
        $cat_args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'child_of' => 0
        );

        $categories =  get_categories($cat_args);

        foreach($categories as $category) {
            $post_args = array(
                'posts_per_page' => 1,
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
</main>

<?php get_footer(); ?>