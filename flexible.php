
<?php if(!is_front_page()): ?>

<?php 
$image = get_field( 'main_img' );
if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$alt = $image['alt'];

	// thumbnail
	$size = 'ページヘッダー';
	$thumb = $image['sizes'][ $size ];

	 ?>
	 
	<figure class="img_main"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" /></figure>
	
<?php endif; ?>

<?php endif; ?>

<?php if( have_rows( 'flexible' ) ):// check if the flexible content field has rows of data ?>

 	
    <?php while ( have_rows( 'flexible' ) ) : the_row();// loop through the rows of data ?>

		
        <?php if( get_row_layout() == 'gallery' ):// check current row layout ?>
        	
        	<?php 

				$images = get_sub_field('images');
			
			if( $images ): ?>
			    <ul class="gallery_flexible">
			        <?php foreach( $images as $image ): ?>
			            <li>
			                <a class="btn" href="<?php echo $image['url']; ?>" data-lightbox="film">
			                     <img src="<?php echo $image['sizes']['ランドスケープM']; ?>" alt="<?php echo $image['alt']; ?>" />
			                </a>
			                <p><?php echo $image['caption']; ?></p>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
			
		<?php elseif( get_row_layout() == 'hn_text_gallery' ): ?>
		<section class="hn_text_gallery box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
				<<?php the_sub_field( 'tag' ); ?> class="ttl_flexible"><?php the_sub_field( 'heading' ); ?><?php if(get_sub_field( 'ttl_sub' )): ?><span><?php the_sub_field( 'ttl_sub' ); ?></span><?php endif; ?></<?php the_sub_field( 'tag' ); ?>>
	        	<p><?php the_sub_field( 'text' ); ?></p>
	        	
	        	<?php $key_caption = get_sub_field( 'key_caption' ); ?>
	        	<?php $key_text = get_sub_field( 'key_text' ); ?>
	        	<?php $key_link = get_sub_field( 'key_link' ); ?>
	        	<?php $gallery_class = get_sub_field( 'gallery_class' ); ?>
	        	
	        	<?php if( have_rows( 'gallery' ) ): ?>	
				<ul class="<?php echo $gallery_class; ?>">
					
				<?php while( have_rows( 'gallery' ) ): the_row(); 
					// vars
					$image = get_sub_field( 'img' );
					$caption = get_sub_field( 'caption' );
					$text = get_sub_field( 'text' );
					$link = get_sub_field( 'link' );
					$link_page = get_sub_field( 'link_page' );
					
					// vars img
					$url = $image['url'];
					$alt = $image['alt'];
					$size = 'ランドスケープM';
					$thumb = $image['sizes'][ $size ];
				?>
					<li><figure><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"></figure><?php if(get_sub_field( 'caption' )): ?><span class="caption heightLine-<?php echo $key_caption; ?>"><?php echo $caption; ?></span><?php endif; ?><?php if(get_sub_field( 'text' )): ?><span class="text heightLine-<?php echo $key_text; ?>"><?php echo $text; ?></span><?php endif; ?><?php if(get_sub_field( 'link' )): ?><span class="link heightLine-<?php echo $key_link; ?>"><a href="<?php echo $link_page ?>"><?php echo $link; ?></a></span><?php endif; ?></li>
				<?php endwhile; ?>
				
				</ul>
				
				<?php endif;//gallery ?>
				
				<?php if(get_sub_field( 'link_page' )): ?>
				<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
				
				<?php endif; ?>
				
			</div>
			<!-- /.inner -->
				
		</section>
		<!-- /.hn_text_gallery -->
		
		<?php elseif( get_row_layout() == 'editor' ): ?>
		
		<section class="editor_flexible box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
        	<div class="single-content"><?php the_sub_field( 'editor' ); ?></div>
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
        	
        	</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.text -->
		
		<?php elseif( get_row_layout() == 'editor_hn' ): ?>
		
		<section class="editor_heading_flexible box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
			<<?php the_sub_field( 'tag' ); ?> class="ttl_flexible"><?php the_sub_field( 'heading' ); ?><?php if(get_sub_field( 'ttl_sub' )): ?><span><?php the_sub_field( 'ttl_sub' ); ?></span><?php endif; ?></<?php the_sub_field( 'tag' ); ?>>
			
        	<div class="single-content"><?php the_sub_field( 'editor' ); ?></div>
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
        	
        	</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.text -->
		
		<?php elseif( get_row_layout() == 'pagelink' ): ?>
		
		<section class="pagelink_flexible box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
        	
        	</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.pagelink -->
		
		<?php elseif( get_row_layout() == 'text' ): ?>
		
		<section class="text_flexible box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
        	<p><?php the_sub_field( 'text' ); ?></p>
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
        	
        	</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.text -->
			
		<?php elseif( get_row_layout() == 'hn_text' ): ?>
		
		<section class="hn_text box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
			<<?php the_sub_field( 'tag' ); ?> class="ttl_flexible"><?php the_sub_field( 'heading' ); ?><?php if(get_sub_field( 'ttl_sub' )): ?><span><?php the_sub_field( 'ttl_sub' ); ?></span><?php endif; ?></<?php the_sub_field( 'tag' ); ?>>
        	<p><?php the_sub_field( 'text' ); ?></p>
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
        	
        	</div>
			<!-- /.inner -->
						
		</section>
		<!-- /.hn_text -->
		
		<?php elseif( get_row_layout() == 'hn_text_btn' ): ?>
		
		<section class="hn_text_btn box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
			<<?php the_sub_field( 'tag' ); ?> class="ttl_flexible"><?php the_sub_field( 'heading' ); ?><?php if(get_sub_field( 'ttl_sub' )): ?><span><?php the_sub_field( 'ttl_sub' ); ?></span><?php endif; ?></<?php the_sub_field( 'tag' ); ?>>
        	
        	<a href="<?php the_sub_field( 'link_page' ); ?>"><?php $image = get_sub_field( 'img' );
			if( !empty($image) ): 
			
				// vars
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
			
				// thumbnail
				$size = 'ワイド';
				$thumb = $image['sizes'][ $size ];
			
				 ?>
				 
			<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
				
			<?php else: ?>
					
			<?php endif; ?></a>
			
        	<p><?php the_sub_field( 'text' ); ?></p>
			
			</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.hn_text_btn -->
		
		<?php elseif( get_row_layout() == 'hn_text_wide' ): ?>
		
		<section class="hn_text_wide box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
			<<?php the_sub_field( 'tag' ); ?> class="ttl_flexible"><?php the_sub_field( 'heading' ); ?><?php if(get_sub_field( 'ttl_sub' )): ?><span><?php the_sub_field( 'ttl_sub' ); ?></span><?php endif; ?></<?php the_sub_field( 'tag' ); ?>>
        	
        	<figure><?php $image = get_sub_field( 'img' );
			if( !empty($image) ): 
			
				// vars
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
			
				// thumbnail
				$size = 'ワイド';
				$thumb = $image['sizes'][ $size ];
			
				 ?>
				 
			<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
				
			<?php else: ?>
					
			<?php endif; ?></figure>
			
        	<p><?php the_sub_field( 'text' ); ?></p>
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
			
			</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.hn_text_wide -->

        <?php elseif( get_row_layout() == 'hn_text_landscape' ): ?>
		
		<section class="hn_text_landscape box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
			<<?php the_sub_field( 'tag' ); ?> class="ttl_flexible"><?php the_sub_field( 'heading' ); ?><?php if(get_sub_field( 'ttl_sub' )): ?><span><?php the_sub_field( 'ttl_sub' ); ?></span><?php endif; ?></<?php the_sub_field( 'tag' ); ?>>
        	
        	<div class="primary">
	        	<figure><?php $image = get_sub_field( 'img' );
				if( !empty($image) ): 
				
					// vars
					$url = $image['url'];
					$title = $image['title'];
					$alt = $image['alt'];
				
					// thumbnail
					$size = 'ランドスケープM';
					$thumb = $image['sizes'][ $size ];
				
					 ?>
					 
				<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
					
				<?php else: ?>
						
				<?php endif; ?></figure>
				
	        	<p><?php the_sub_field( 'text' ); ?></p>
        	
        	</div>
        	<!-- /.primary -->
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
			
			</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.hn_text_landscape -->
        	
        <?php elseif( get_row_layout() == 'hn_text_portrait' ): ?>
		
		<section class="hn_text_portrait box_flexible<?php if(get_sub_field( 'class' )): ?> <?php the_sub_field( 'class' ); ?><?php endif; ?>">
			<div class="inner">
			<<?php the_sub_field( 'tag' ); ?> class="ttl_flexible"><?php the_sub_field( 'heading' ); ?><?php if(get_sub_field( 'ttl_sub' )): ?><span><?php the_sub_field( 'ttl_sub' ); ?></span><?php endif; ?></<?php the_sub_field( 'tag' ); ?>>
        	
        	<div class="primary">
	        	<figure><?php $image = get_sub_field( 'img' );
				if( !empty($image) ): 
				
					// vars
					$url = $image['url'];
					$title = $image['title'];
					$alt = $image['alt'];
				
					// thumbnail
					$size = 'ポートレートM';
					$thumb = $image['sizes'][ $size ];
				
					 ?>
					 
				<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
					
				<?php else: ?>
						
				<?php endif; ?></figure>
				
	        	<p><?php the_sub_field( 'text' ); ?></p>
        	
        	</div>
        	<!-- /.primary -->
        	
        	<?php if(get_sub_field( 'link_page' )): ?>
			<a href="<?php the_sub_field( 'link_page' ); ?>"><?php the_sub_field( 'link' ); ?></a>
			
			<?php endif; ?>
        	
        	</div>
			<!-- /.inner -->
			
		</section>
		<!-- /.hn_text_portrait -->

        <?php endif; ?>

    <?php endwhile; ?>

<?php else : // no layouts found ?>

<?php endif;?>
