<article class="article offset" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_category( $post_id ); ?>
  <div class="news-article">
    <h2><a href="<?php echo get_permalink();?>" class="headline-link"><?php the_title(); ?></a></h2>
    <div class="top-holder flex content-between">
      <p class="author">By <span><?php echo get_the_author(); ?></span></p>
      <p class="post-date"><?php the_time('F j, Y'); ?></p>
    </div>
    <?php if(get_the_post_thumbnail_url()){ ?>
      <div class="news-article__image">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
      </div>
    <?php } ?>
    <div class="inner-block">
      <!--<p class="excerpt"><?php /*$exs = get_the_excerpt(); print $exs;*/?></p>-->
      <p class="excerpt">
          <?php if (  has_excerpt() ) {
              echo $exs = get_the_excerpt(); print $exs;;
          } else {
              echo wp_trim_words( get_the_excerpt(), 50 );
          }?>
      </p>
      <a href="<?php echo get_permalink();?>" class="more">read more</a>
    </div>
  </div>
</article>