<?php 
	$image = get_field( 'img_home' );
	if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$alt = $image['alt'];

	// thumbnail
	$size = 'メインビジュアル';
	$thumb = $image['sizes'][ $size ];

?>
	<div id="visual_main">
		<img class="main" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>">
		<img class="layer_left" src="<?php bloginfo( 'template_url' ); ?>/images/home/layer_left.png" alt="">
		<img class="layer_right" src="<?php bloginfo( 'template_url' ); ?>/images/home/layer_right.png" alt="">
		
	</div>
	<!-- /#visual_main -->
	
<?php else: ?>
		
<?php endif; ?>