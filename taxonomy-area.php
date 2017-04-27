<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">

	<div class="ttl_page_sub">
		<?php if(is_tax('area', 'area_a')): ?>
		名古屋市内一覧
		
		<?php elseif(is_tax('area', 'area_b')): ?>
		名古屋市外一覧
		
		<?php elseif(is_tax('area', 'area_c')): ?>
		岐阜
		
		<?php elseif(is_tax('area', 'area_d')): ?>
		三重
		
		<?php endif; ?>
	</div>

	<section id="loop">
		
		<?php get_template_part( 'nav_p' ); ?>

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