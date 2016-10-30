
<div id="Glide" class="glide">
	
	<!-- 
    <div class="glide__arrows">
        <button class="glide__arrow prev" data-glide-dir="<">prev</button>
        <button class="glide__arrow next" data-glide-dir=">">next</button>
    </div>
	-->
	
	<?php if( have_rows( 'slider' ) ): ?>
    <div class="glide__wrapper">
        <ul class="glide__track">
		<?php while( have_rows( 'slider' ) ): the_row(); 
			// vars
			$image = get_sub_field( 'img' );
			$caption = get_sub_field( 'caption' );
			
			// vars img
			$url = $image['url'];
			$alt = $image['alt'];
			$size = 'スライダー';
			$thumb = $image['sizes'][ $size ];
		?>
        <li class="glide__slide">
	        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>">
			<div class="caption"><p><?php echo $caption; ?></p></div>
			<!-- /.caption -->
        </li>
		
	<?php endwhile; ?>
	</ul>
	
	<?php endif; ?>

    </div>

    <!-- <div class="glide__bullets"></div> -->

</div>