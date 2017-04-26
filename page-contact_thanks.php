<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	
	<div class="ttl_page_sub">応募フォーム</div>

	<?php $template_slug = get_post($wp_query->post->ID)->post_name; ?>
	<?php get_template_part( 'parts/'.$template_slug ); ?>

	<section id="entry">
		
		<div class="inner">
			<style scoped>
			 .thanks-text {margin-top: 120px; margin-bottom: 120px; text-align: center; line-height: 200%;}
			</style>
			
			<p class="thanks-text" style="color: #f18d00; font-weight: bold">この度は、お問合せいただきまして <br>誠にありがとうございます。</p>
			
			<p class="thanks-text">営業日３日以内を目安にご連絡をさしあげますので <br>
				もうしばらくお待ちくださいませ。 <br><br>
				xxxxx<br>
				〒xxxxxx<br>
				xxxxxx<br>
				TEL xxxxxx<br>
				TEL：xxxxxx</p>
	
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
