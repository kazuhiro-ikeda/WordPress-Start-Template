<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	
	<div class="ttl_page_sub">募集要項</div>
	
	<div id="case_archive_attention">
		<figure><img src="<?php bloginfo( 'template_url' ); ?>/images/entry/fig_main.jpg" alt=""></figure>
	
		<p>クアトロでは、現在従業員を募集しています。<br>募集職種は以下の通りです。ご応募、お待ちしております。</p>
		
		<ul>
			<li>①希望する職種をクリックしてください。</li>
			<li>②募集している職種をご確認の上、職種をクリックすると、募集要項をご確認いただけます。</li>
			<li>③募集要項の下部にある「応募する」ボタンからエントリーください！</li>
		</ul>
		
		<h2 class="branch"><img src="<?php bloginfo( 'template_url' ); ?>/images/entry/ttl_archive.png" alt="募集一覧"></h2>
		
	</div>
	<!-- /#case_archive_attention -->
	

	<section id="loop">
		
		<?php get_template_part( 'nav_p' ); ?>
	
		
		<div class="items">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php remove_filter ( 'the_content', 'wpautop' ); ?>
		
		<?php get_template_part( 'loop' ); ?>
		
		<?php endwhile; else: ?>
			<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto; line-height:200%;">お探しの募集は現在ございません。</p>
			
		<?php endif; ?>
		
		</div>
		<!-- /.items -->
	
		<?php the_posts_pagination( array( 'mid_size' => 3, 'prev_text' => '<<', 'next_text' => '>>', 'screen_reader_text' => '',  ));  ?>
		
	</section>
	<!-- /#loop -->

</div>
<!-- /#main -->
			
<?php get_footer(); ?>