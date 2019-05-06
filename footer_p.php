<div id="pagetop">
	<a href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	
</div>
<!-- /#pagetop -->

<footer>
	<?php get_template_part( 'parts/id' ); ?>
	
	<div id="footer_id_s">
		<a class="logo" href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>
		<a class="tel" href="tel:xxxxxxxx"><img src="<?php echo get_template_directory_uri(); ?>/images/common/tel.png" alt="xxxxxxxx"></a>
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

<div class="block_s">
	<nav id="nav_foot">
		<?php if(is_singular( 'case' )): ?>
	
		<div class="inner_case">
			<a onclick="gtag('event', 'click', {'event_category': 'telephone','event_label': 'telclick', 'value': location.href});" href="tel:xxx"><i class="fa fa-phone" aria-hidden="true"></i>TEL応募</a>
			<a onclick="gtag('event', 'click', {'event_category': 'oubobanner','event_label': 'ouboclick', 'value': location.href});" href="<?php echo esc_url(home_url('/')); ?>?page_id=55&post_id=<?php echo $post->ID; ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i>WEB応募</a>
			<a href="#requirements">募集詳細を見る</a>
			
		</div>
		<!-- /.inner_case -->
		
		<?php else: ?>
		<div class="inner_other">
			<a href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
			
		</div>
		<!-- /.inner_other -->
		
		<?php endif; ?>
		
	</nav>

</div>
<!-- /.block_s -->

<!--jQuery -->
<script src="<?php echo get_template_directory_uri(); ?>/js/glide.js"></script>
<script>
    $("#Glide").glide({
        type: "carousel"
    });
    
     $("#Glide_s").glide({
        type: "carousel"
    });
    
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.common.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.adjust.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.matchHeight.js"></script>
<script>
	$(function() {
	    $('.item').matchHeight();
	    $('.img_gallery').matchHeight();
	    $('.caption_gallery').matchHeight();
	    $('.style_archive').matchHeight();
	    $('.title_archive').matchHeight();
	    $('.info_archive').matchHeight();
	    $('#loop .box').matchHeight();
	});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>

<?php wp_footer(); ?>

</body>
</html>