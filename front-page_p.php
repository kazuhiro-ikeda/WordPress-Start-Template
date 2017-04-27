<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">

<div id="home_contents">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-content"><?php the_content(); ?></div>
		
	<?php endwhile; else: ?>
		<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto; line-height:200%;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
		
	<?php endif; ?>

</div>
<!-- /#home_contents -->

<?php
	$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
	$args = array(
		'post_type' => 'case',
		'paged' => $paged,
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query($args);
?>
			
<section id="loop">
	<h1 class="ttl_page branch"><img src="<?php bloginfo( 'template_url' ); ?>/images/entry/ttl_archive.png" alt="募集一覧"></h1>
	
	<ul class="n3_package">
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_a">スタイルA</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_b">スタイルB</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_c">スタイルC</a></li>
	</ul>
	
	<ul class="n3_package alternately">
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_a">スタイルA</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_b">スタイルB</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_c">スタイルC</a></li>
	</ul>
	
	<ul class="n4_package">
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_a">スタイルA</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_b">スタイルB</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_c">スタイルC</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_d">スタイルC</a></li>
	</ul>
	
	<ul class="n4_package alternately">
		<li><a href="<?php bloginfo( 'url' ); ?>/area/area_a">名古屋市内</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/area/area_b">名古屋市街</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/area/area_c">岐阜</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/area/area_d">三重</a></li>
	</ul>
	
	<div class="items">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php remove_filter ( 'the_content', 'wpautop' ); ?>

	<?php get_template_part( 'loop' ); ?>
	
	<?php endwhile; ?>
	
	</div>
	<!-- /.items -->
	
	<nav class="navigation pagination" role="navigation">	
	<?php
		if ($the_query->max_num_pages > 1) { echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%/',
			'current' => max(1, $paged),
			'prev_text' => '<<', 'next_text' => '>>',
			'total' => $the_query->max_num_pages));
		}
	 ?>
	</nav>
	
	<?php wp_reset_postdata(); ?>
	
</section>
<!-- /#loop -->

</div><!-- /#main post_class -->

<?php get_footer(); ?>