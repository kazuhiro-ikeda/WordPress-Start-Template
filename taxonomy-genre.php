<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	
	<div class="ttl_page_sub">
		<?php if(is_tax('genre', 'style_a')): ?>
		受付・事務
		
		<?php elseif(is_tax('genre', 'style_b')): ?>
		総務・経理
		
		<?php elseif(is_tax('genre', 'style_c')): ?>
		医療事務
		
		<?php elseif(is_tax('genre', 'style_d')): ?>
		その他
		
		<?php endif; ?>
	</div>

	<section id="loop">
		
		<ul class="n4_package">
			<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_a">受付・事務</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_b">総務・経理</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_c">医療事務</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/genre/style_d">その他</a></li>
		</ul>
		
		<ul class="n4_package alternately">
			<li><a href="<?php bloginfo( 'url' ); ?>/area/area_a">名古屋市内</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/area/area_b">名古屋市外</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/area/area_c">岐阜</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/area/area_d">三重</a></li>
		</ul>

		<div class="items">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php remove_filter ( 'the_content', 'wpautop' ); ?>
		
		<?php get_template_part( 'loop' ); ?>
		
		<?php endwhile; else: ?>
			<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto; line-height:200%;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
			
		<?php endif; ?>
		
		</div>
		<!-- /.items -->
	
		<?php the_posts_pagination( array( 'mid_size' => 3, 'prev_text' => '<<', 'next_text' => '>>', 'screen_reader_text' => '',  ));  ?>
		
	</section>
	<!-- /#loop -->

</div>
<!-- /#main -->
			
<?php get_footer(); ?>