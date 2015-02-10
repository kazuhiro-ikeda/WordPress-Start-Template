<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php remove_filter ('the_content', 'wpautop'); ?>
<?php the_content(); ?>
<?php //advanced custom fields プラグイン the_field("prefecture", $post->ID); ?>

<?php endwhile; else: ?>
<?php get_template_part( 'parts/pagination' ); ?>
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

<?php if (is_mobile()) : //mobile only ?>
			
<?php else : //pc only ?>
			
<?php  endif ; //if_mobile ?>
			
<?php get_footer(); ?>