<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	<div id="page_404">
		<p class="text_404"><?php the_field( "text_404", 54); ?></p>
		
		<a class="btn_top_404" href="<?php echo home_url(); ?>/">トップページへ</a>
		
	</div>
	<!-- /#page_404 -->	

</div><!-- /#main post_class -->

<?php get_footer(); ?>