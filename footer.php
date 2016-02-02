<footer>
	
</footer>

<!--jQuery --> 
<script src="<?php bloginfo('template_url');?>/js/jquery.common.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.adjust.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.height.js"></script>
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
		slideWidth: 980,
		minSlides: 3,
		maxSlides: 3,
		moveSlides: 1,
		slideMargin: 10,
	});
});
</script>

<?php wp_footer(); ?>

</body>
</html>