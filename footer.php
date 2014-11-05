<!-- フッター -->
<footer>
	
</footer>

<!--jQuery CDN--> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script src="<?php bloginfo(template_url);?>/js/jquery.smooth-scroll.js"></script>
<script>
	//nav
	jQuery.preloadimages = function(){
	    for(var i = 0; i<arguments.length; i++){
	        jQuery("<img>").attr("src", arguments[i]);
	    }
	};
	$.preloadimages(
		"<?php bloginfo('template_url'); ?>/images/common/xxx_on.png",
		"<?php bloginfo('template_url'); ?>/images/common/yyy_on.png"
	);
</script>
<?php wp_footer(); ?>
</body>
</html>