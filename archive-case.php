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