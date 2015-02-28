<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
<?php
	if(is_front_page()){
		
	} else{
		//
		if ( class_exists( 'WP_SiteManager_bread_crumb' ) ) { WP_SiteManager_bread_crumb::bread_crumb(); }
	}
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="single-content"><?php the_content(); ?></div>
	
<?php endwhile; else: ?>
	<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
	
<?php endif; ?>

</div><!-- /#main post_class -->

<?php if (is_mobile()) : //mobile only ?>	
<?php else : //pc only ?>	
<?php  endif ; //if_mobile ?>

<?php get_footer(); ?>