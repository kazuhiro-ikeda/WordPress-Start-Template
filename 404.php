<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	<div id="page_404">
		<p class="lead_404">お探しのページは、移動もしくは準備中の可能性があります。</p>

		<p class="text_404">お手数ですが、以下よりご希望のページをご覧ください。</p>
		
		<a class="btn_top_404" href="<?php echo home_url(); ?>/">トップページへ</a>
		
	</div>
	<!-- /#page_404 -->	

</div><!-- /#main post_class -->

<?php get_footer(); ?>