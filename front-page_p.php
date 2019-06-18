<?php get_header(); ?>

<?php //get_template_part( 'parts/glide_cms' ); ?>
<?php get_template_part( 'parts/mainvisual' ); ?>

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
				'posts_per_page' => 18,
			);
			$the_query = new WP_Query($args);
		?>
					
		<section id="loop">
			<h1 class="ttl_case_line em4"><span>募集一覧</span></h1>
			
			<?php get_template_part( 'nav_p' ); ?>
			
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
	
	</div>
	<!-- /#main -->

<?php get_footer(); ?>