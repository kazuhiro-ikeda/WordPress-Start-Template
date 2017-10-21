<div id="Glide" class="glide">

	<?php 
	
	$images = get_field('slider');
	
	if( $images ): ?>
	    <div class="glide__wrapper">
       		<ul class="glide__track">
	            <?php foreach( $images as $image ): ?>
	                <li class="glide__slide"><img src="<?php echo $image['sizes']['スライダー']; ?>" alt="<?php echo $image['alt']; ?>" /></li>
	                
	            <?php endforeach; ?>
	        </ul>
	    </div>
	    <!-- /.glide__wrapper -->
	    
	<?php endif; ?>
	
</div>
<!-- /#Glide.glide -->
	
<div id="Glide_s" class="glide">

	<?php 
	
	$images = get_field('slider_s');
	
	if( $images ): ?>
	    <div class="glide__wrapper">
       		<ul class="glide__track">
	            <?php foreach( $images as $image ): ?>
	                <li class="glide__slide"><img src="<?php echo $image['sizes']['スライダーSP']; ?>" alt="<?php echo $image['alt']; ?>" /></li>
	                
	            <?php endforeach; ?>
	        </ul>
	    </div>
	    <!-- /.glide__wrapper -->
	    
	<?php endif; ?>
	
</div>
<!-- /#Glide_s.glide -->