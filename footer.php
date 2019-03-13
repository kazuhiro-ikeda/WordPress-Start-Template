<footer>
	
</footer>

<nav id="nav_foot_normal">
	<a href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	
</nav>

<!--jQuery --> 
<script src="<?php bloginfo('template_url');?>/js/jquery.common.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.matchHeight.js"></script>
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
<script src="<?php bloginfo('template_url');?>/js/lightbox.js"></script>
<script src="<?php bloginfo('template_url');?>/js/glide.js"></script>
<script>
    $("#Glide").glide({
        type: "carousel"
    });
</script>
<script src="<?php bloginfo('template_url');?>/js/slick.js"></script>
<script>
	$('.multiple-items').slick({
		autoplay: true,
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
			breakpoint: 769,
				settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '20vw',
				slidesToShow: 1
				}
			}
		]
	});
</script>

<?php wp_footer(); ?>

</body>
</html>