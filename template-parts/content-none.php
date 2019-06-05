<section class="no-results not-found">

	<header class="page-header">
		<h1 class="search-header"><?php esc_html_e( 'Nothing Found', 'theme' ); ?></h1>
	</header>

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'theme' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'No matches were found for your search terms. Please try again with different keywords.', 'theme' ); ?></p>

      <form class="search-form flex content-between align-center" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
        <input type="text" placeholder="What are you looking for?" id="search" class="search-block__item toggle" value="<?php echo get_search_query() ?>" name="s" id="s" />
        <button type="submit" id="searchsubmit" class="search-block__button search-block__item toggle"><span class="icon-magnifying-glass"></span></button>
      </form>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'theme' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->

</section><!-- .no-results -->
