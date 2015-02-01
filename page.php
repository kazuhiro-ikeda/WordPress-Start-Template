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
	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	<?php remove_filter ('the_content', 'wpautop'); ?>
	<?php the_content(); ?>
<?php endwhile; else: ?>
	<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
<?php endif; ?>

</div><!-- /#main post_class -->

<?php if (wp_is_mobile()) : //mobile only ?>
			
<?php else : //pc only ?>
	<div id="sidebar">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'side' ,
				'container'       => 'nav',
				'container_id'    => '',
				'container_class' => 'cl',
				'menu_id'         => 'side-nav',
				'menu_class'      => ''
				//スタイル
				//<nav class="cl">
				//<ul id="side-nav">
				//<li><a href=""></a></li>
				//</ul>
				//</nav>
		)); ?>	
	</div><!-- /#sidebar -->
			
<?php  endif ; //if_mobile ?>

<?php get_footer(); ?>