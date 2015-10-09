<!-- フッター -->
<footer>
	
</footer>

<!--jQuery --> 
<script src="<?php bloginfo(template_url);?>/js/jquery.common.js"></script>
<script src="<?php bloginfo(template_url);?>/js/jquery.height.js"></script>
<script src="<?php bloginfo(template_url);?>/js/lightbox.js"></script>
<script src="<?php bloginfo(template_url);?>/js/jquery.adjust.js"></script>
<script src="<?php bloginfo(template_url);?>/js/jquery.mousewheel.js"></script>
<script src="<?php bloginfo(template_url);?>/js/jquery.jscrollpane.min.js"></script>
<script>
	$(function() {
		$('.scroll-pane').jScrollPane();
	});
</script>


<?php wp_footer(); ?>

</body>
</html>