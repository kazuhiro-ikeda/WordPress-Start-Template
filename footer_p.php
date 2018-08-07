<div id="pagetop">
	<a href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	
</div>
<!-- /#pagetop -->

<footer>
	<?php get_template_part( 'parts/id' ); ?>
	
	<div id="footer_id_s">
		<a class="logo" href="<?php bloginfo( 'url' ); ?>/"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>
		<p>テキストテキストテキスト<br>テキストテキストテキスト</p>
		<a class="tel" href="tel:xxxxxxxx"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/tel.png" alt="xxxxxxxx"></a>
		<a class="btn_official" href="http://xxxxxxxxxxxxxxxxxxxx/" target="_blank">コーポレートサイト<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		
	</div>
	<!-- /#footer_id_s -->
	
</footer>

<div id="footer_id">
	<div class="inner">
		<address class="place"><strong>テキストテキストテキスト</strong><span>テキストテキストテキスト</span></address>
	
		<address id="copyright">テキストテキストテキスト</address>
		
	</div>
	<!-- /.inner -->
	
</div>

<nav id="nav_foot">
	<?php if(is_singular( 'case' )): ?>

	<div class="inner_case">
		<a href="<?php echo esc_url(home_url('/')); ?>?page_id=55&post_id=<?php echo $post->ID; ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i>WEB応募</a>
		<a href="tel:xxxxxxx"><i class="fa fa-phone-square" aria-hidden="true"></i>TEL問合せ</a>
		
	</div>
	<!-- /.inner_case -->
	
	<?php else: ?>
	<div class="inner_other">
		<a href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
		
	</div>
	<!-- /.inner_other -->
	
	<?php endif; ?>
	
</nav>

<!--jQuery --> 
<script src="<?php bloginfo('template_url');?>/js/jquery.common.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.adjust.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.height.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.matchHeight.js"></script>
<script>
	$(function() {
	    $('.item').matchHeight();
	    $('.img_gallery').matchHeight();
	    $('.caption_gallery').matchHeight();
	    $('.style_archive').matchHeight();
	    $('.title_archive').matchHeight();
	    $('.info_archive').matchHeight();
	});
</script>
<script src="<?php bloginfo('template_url');?>/js/lightbox.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.mousewheel.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.jscrollpane.min.js"></script>
<script>
	$(function() {
		$('.scroll-pane').jScrollPane({
			showArrows:false,
			scrollbarWidth: 50,
			scrollbarMargin:0
		});
	});
</script>
<script src="<?php bloginfo('template_url');?>/js/jquery.bxslider.js"></script>
<script>
$(function(){
	$('#bxslider__items').bxSlider({
		auto: true,
		slideWidth: 1000,
		minSlides: 3,
		maxSlides: 3,
		moveSlides: 1,
		slideMargin: 10,
	});
});
</script>
<script src="<?php bloginfo('template_url');?>/js/glide.js"></script>
<script>
    $("#Glide").glide({
        type: "carousel"
    });
    
     $("#Glide_s").glide({
        type: "carousel"
    });
    
</script>

<?php wp_footer(); ?>

</body>
</html>