<li>
  <div class="category-card">
    <a href="<?php echo get_permalink();?>" class="category-card__link">
      <span class="category-card__image" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') no-repeat; background-size: cover">
      </span>
        <?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
    </a>
    <div class="bottom-wrap">
      <p class="category-card-date"><?php the_time('F j, Y'); ?></p>
      <p class="excerpt"><?php echo wp_trim_words( get_the_content(), 10 ); ?></p>
    </div>
  </div>
</li>