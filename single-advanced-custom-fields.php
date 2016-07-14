<?php get_header(); ?>

<div id="wrap" class="screen cl">
	<div id="main" <?php post_class(); ?> role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php 
	$image = get_field( 'post_img' );
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
	
	<h1 id="post-ttl"><?php the_title(); ?></h1>
	
	<?php //ブロック
		if( have_rows('post_block') ):
	?>
		<ul id="block-items">
		<?php while( have_rows('post_block') ): the_row(); 
			// vars
			$ttl = get_sub_field('block_ttl');
			$text = get_sub_field('block_text');			
		?>
			<li class="block-item">
				<h2 class="block-item-ttl"><?php echo $ttl; ?></h2>
				<div class="single-content"><?php echo $text; ?></div>
			</li>
			
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	
	<?php //ギャラリー
		$images = get_field('post_gallery');
		if( $images ):
	?>
	    <ul id="post-gallery-items" class="cl">
	        <?php foreach( $images as $image ): ?>
	            <li>
	                <a href="<?php echo $image['url']; ?>" data-lightbox="film" data-title="<?php echo $image['alt']; ?>">
	                     <img src="<?php echo $image['sizes']['ランドスケープS']; ?>" alt="<?php echo $image['alt']; ?>" />
	                </a>
	            </li>
	        <?php endforeach; ?>
	    </ul>
	<?php endif; ?>
	
	<?php 
		$location = get_field('map');
		if( !empty($location) ):
	?>		
		<?php get_template_part( 'parts/googlemap'); ?>
		<h2 class="single-ttl-sub"><?php the_field("post_map_ttl", $post->ID); ?></h2>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
		<p id="acf-map-caption"><?php the_field("post_map_caption", $post->ID); ?></p>	
	<?php endif; ?>
	
	<?php //リンク
		if( have_rows('post_link') ):
	?>
		<h2 class="single-ttl-sub">参考リンク</h2>
		<ul id="post-link-items">
		<?php while( have_rows('post_link') ): the_row(); 
			// vars
			$anchor_ttl = get_sub_field('anchor_text');
			$url = get_sub_field('anchor_text_url');			
		?>
			<li class="post-link-item">
				<a href="<?php echo $url; ?>" target="_blank"><?php echo $anchor_ttl; ?></a>
			</li>
			
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
		
	<?php endwhile; else: ?>
		<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto; line-height:200%;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
		
	<?php endif; ?>
	
	</div><!-- /#main post_class -->

	<?php get_template_part( 'side' ); ?>

</div>
<!-- /#wrap.screen cl -->

<?php get_footer(); ?>