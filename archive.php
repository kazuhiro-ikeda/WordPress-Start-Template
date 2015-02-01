<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
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
			</div>
			<!-- r-box -->
		</div>
		<!-- /.category-nav cl -->
	</a>
	
<?php endwhile; else: ?>
<?php if ( class_exists( 'WP_SiteManager_page_navi' ) ) { WP_SiteManager_page_navi::page_navi(); } ?>
<?php 	/* WP_Queryなどページ送りを使用する場合の必須設定　２項目
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;←ページ送りの情報を取得
		$args = array(
		'paged' => $paged,←クエリに加える
		'post_type' => 'clinic',
		'order' => 'ASC',
		'orderby' => 'meta_value_num',
		'meta_key' => 'list_number',
		'tax_query' => array(
			array(
				'taxonomy' => 'network-list',
				'field' => 'slug',
				'terms' => 'accession',
				)
			)
		); */
 ?>
 
<?php endif; ?>

</div>
<!-- /.contents -->

<?php if (wp_is_mobile()) : //mobile only ?>
			
<?php else : //pc only ?>
			
<?php  endif ; //if_mobile ?>
			
<?php get_footer(); ?>