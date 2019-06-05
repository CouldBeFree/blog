	<footer class="page-footer" role="contentinfo">
		<div class="page-footer__inner">
      <div class="container flex content-between">
        <div class="left-block flex align-center">
          <div class="left-block__content">
              <?php dynamic_sidebar( 'col-1' ); ?>
            <a href="/about/" class="footer-addition">read more</a>
          </div>
        </div>
        <div class="right-block flex align-center content-between">
          <div class="footer-block flex align-center">
            <div class="right-block__category">
                <?php dynamic_sidebar( 'col-2' ); ?>
            </div>
            <div class="right-block__navigation">
                <?php dynamic_sidebar( 'col-3' ); ?>
            </div>
          </div>
          <div class="right-block__social">
              <?php dynamic_sidebar( 'col-4' ); ?>
          </div>
        </div>
      </div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>