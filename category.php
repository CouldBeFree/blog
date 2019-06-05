<?php get_header(); ?>

  <main id="main" class="page-main" role="main">
    <div class="container flex content-between main-wrap">
      <div class="left-part-category">
        <h3 class="category-title">
            <?php
            single_cat_title();
            ?>
        </h3>
        <ul class="category-list-holder">
            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content-post', 'small' ); ?>

                <?php endwhile; ?>

            <?php else : ?>

                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
        </ul>
      </div>
      <div class="right-part-category">
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
  </main>

<?php get_footer(); ?>