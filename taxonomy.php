<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	
	<div class="ttl_page_sub">
		<?php if(is_tax('genre_case', 'style_a')): ?>
		営業・事務職一覧
		
		<?php elseif(is_tax('genre_case', 'style_b')): ?>
		施工・施工管理職一覧
		
		<?php elseif(is_tax('genre_case', 'style_c')): ?>
		外注・協力会社一覧
		
		<?php endif; ?>
	</div>

	<section id="loop">
		
		<ul class="nav_style">
			<li><a href="<?php bloginfo( 'url' ); ?>/genre_case/style_a">営業・事務職</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/genre_case/style_b">施工・施工管理職</a></li>
			<li><a href="<?php bloginfo( 'url' ); ?>/genre_case/style_c">外注・協力会社</a></li>
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