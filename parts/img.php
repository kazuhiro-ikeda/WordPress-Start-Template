<?php 
$image = get_field( 'img' );
if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$alt = $image['alt'];

	// thumbnail
	$size = 'hogehoge';
	$thumb = $image['sizes'][ $size ];

	 ?>
	 
<figure><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"></figure>
	
<?php else: ?>
		
<?php endif; ?>
