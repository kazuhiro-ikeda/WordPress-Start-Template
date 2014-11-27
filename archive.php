<?php get_header(); ?>

<article id="main" <?php post_class(); ?>>
	<?php //アイキャッチ画像付き archive.php ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php remove_filter ('the_content', 'wpautop'); ?>
		<a href="<?php the_permalink(); ?>">
		<div class="category-nav cl">
		<?php 
			if(has_post_thumbnail()) {
				the_post_thumbnail('image-small');
			} else {
				echo '<img src="'. get_template_directory_uri() .'/images/common/no-img-small.png" class="eye-catch-no_img"/>';
			}
		?>
		<div class="r-box">
		<h3><?php the_title(); ?></h3>
		<time><?php the_time( 'Y 年 m 月 d 日' ); ?> ｜ </time>
		<?php $cat = get_the_category(); //親カテゴリ名が表示されてしまうことを防止 functions.php にfunction あり ?>
		<?php $cat = $cat[1]; ?>
		<span class="category-name"><?php echo get_cat_name($cat->term_id); ?></span>
		</div><!-- r-box -->
		</div><!-- /.category-nav cl -->
		</a>
	<?php endwhile; else: ?>
		<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
	<?php endif; ?>
		<?php if ( class_exists( 'WP_SiteManager_page_navi' ) ) { WP_SiteManager_page_navi::page_navi(); } ?>
	
</article><!-- /.contents -->

	<?php if (wp_is_mobile()) : ?>
				<!-- mobile -->
				
		<?php else : ?>
				<!-- pc -->			
	<?php get_template_part('xxx') ?>
		<?php  endif; ?>
				<!-- /if_mobile -->
			
<?php get_footer(); ?>



















