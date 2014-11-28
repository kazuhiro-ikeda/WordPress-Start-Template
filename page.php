<?php get_header(); ?>

<article id="main" <?php post_class(); ?>>
	<?php
		if(is_front_page()):
			//
		else:
			//
			if ( class_exists( 'WP_SiteManager_bread_crumb' ) ) { WP_SiteManager_bread_crumb::bread_crumb(); } /* 条件分岐とセットの記述　単独では <?php ?> で囲む*/
		endif;
	?>
	
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	<?php remove_filter ('the_content', 'wpautop'); ?>
	<?php the_content(); ?>
<?php endwhile; else: ?>
	<p>お探しの記事はありません。</p>
<?php endif; ?>

</article><!-- /#main post_class -->

<?php if (wp_is_mobile()) : ?>
			<!-- mobile -->
			
	<?php else : ?>
			<!-- pc -->
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
			
	<?php  endif; ?>
			<!-- /if_mobile -->

<?php get_footer(); ?>