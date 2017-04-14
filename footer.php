<footer>
	
</footer>

<nav id="nav_foot">
	<a href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	
</nav>

<!--jQuery --> 
<script src="<?php bloginfo('template_url');?>/js/jquery.common.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.adjust.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.height.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.matchHeight.js"></script>
<script>
	$(function() {
	    $('.item').matchHeight();
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
</script>

<?php wp_footer(); ?>

</body>
</html>