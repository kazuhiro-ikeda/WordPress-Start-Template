<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">

	<?php $template_slug = get_post($wp_query->post->ID)->post_name; ?>
	<?php get_template_part( 'parts/'.$template_slug ); ?>

	<section id="entry">
		<div class="ttl_case_line em6"><span>応募フォーム</span></div>
		
		<div class="inner">
			<style scoped>
			 .thanks-text {margin-top: 120px; margin-bottom: 120px; text-align: center; line-height: 200%;}
			</style>
			
			<p class="thanks-text" style="color: #f18d00; font-weight: bold">この度は、数ある企業の中から弊社へご応募頂きまして <br>誠にありがとうございます。</p>
			
			<p class="thanks-text">これより、エントリーフォーム内容を元に書類選考を進めさせていただきます。 <br><br>
				結果に関しましては、合否に関わらず<br>
				ご応募から営業日３日以内を目安にご連絡をさしあげますので <br>
				もうしばらくお待ちくださいませ。 <br><br>
				Company Name<br>
				〒zip-code<br>
				address<br>
				TEL 0000-00-0000</p>
	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php remove_filter ( 'the_content', 'wpautop' ); ?>
			<?php the_content(); ?>
			
		</div>
		<!-- /.inner -->
		
	</section>
	<!-- /#entry -->

<?php endwhile; else: ?>
	<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto; line-height:200%;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
	
<?php endif; ?>

</div><!-- /#main post_class -->

<?php get_footer(); ?>
