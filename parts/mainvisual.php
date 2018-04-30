<?php 
$image = get_field( 'img' );
if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'メインビジュアル';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	 ?>
	 
<figure id="mainvisual"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"></figure>
	
<?php else: ?>
		
<?php endif; ?>

<?php 
$image = get_field( 'img_s' );
if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'スライダーSP';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	 ?>
	 
<figure id="mainvisual_s"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"></figure>
	
<?php else: ?>
		
<?php endif; ?>
