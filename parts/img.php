<?php 
$image = get_field( 'img' );
if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'functions.phpで定義';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	 ?>
	 
	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	
<?php else: ?>
		
<?php endif; ?>
