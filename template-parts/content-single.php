<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container flex content-between post">
    <div class="left-part">
      <header class="entry-header">
        <p class="post-title">
            <?php the_category( $post_id ); ?>
        </p>
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <p class="author">By <span><?php echo get_the_author(); ?></span></p>
      </header>
      <div class="entry-content">
          <?php if(get_the_post_thumbnail_url()){ ?>
            <div class="entry-content__image">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
            </div>
          <?php } ?>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <div class="share-block">
          <p class="post-date"><?php the_time('F j, Y g:i a'); ?></p>
            <?php echo do_shortcode('[do_widget id=ssba_widget-2]'); ?>
        </div>
        <div class="entry-content__additional">
          <h4>You may also like...</h4>
          <div class="content-wrap flex content-between">
              <?php
              $categories = get_the_category();
              $category_id = $categories[0]->cat_ID;
              global $post;
              $args = array( 'posts_per_page' => 3, 'category' => $category_id );
              $myposts = get_posts( $args );
              foreach( $myposts as $post ){ setup_postdata($post);
                  ?>
                <div class="category-card">
                  <a href="<?php echo get_permalink();?>" class="category-card__link">
                    <span class="category-card__image" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') no-repeat; background-size: cover"></span>
                    <p class="name"><?php
                        $category = get_the_category();
                        echo $category[0]->cat_name;
                        ?></p>
                  </a>
                  <div class="bottom-wrap">
                    <p class="category-card-date"><?php the_time('F j, Y'); ?></p>
                    <p class="excerpt"><?php the_title(); ?></p>
                  </div>
                </div>
                  <?php
              }
              wp_reset_postdata();
              ?>
          </div>
        </div>
      </div>
      <div class="comments-block">
          <?php // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
              comments_template();
          endif; ?>
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
</article>