<?php get_header(); ?>

<div id="main" <?php post_class(); ?> role="main">
	
<?php if (is_mobile()) : //for breads ?>
			
<?php else : //pc tablet ?>
<nav id="breads">
	<?php if(is_front_page()): ?>
	
	<?php elseif(is_singular( 'blog' )): ?>
	<a href="<?php bloginfo( 'url' ); ?>/"><?php bloginfo( 'name' ); ?></a> > <a href="<?php bloginfo( 'url' ); ?>/blog">ブログ一覧</a> > <?php the_title(); ?>
	
	<?php else: ?>
	<a href="<?php bloginfo( 'url' ); ?>/"><?php bloginfo( 'name' ); ?></a> > <?php the_title(); ?>
	
	<?php endif; ?>
	
</nav>
			
<?php  endif ; //end for breads ?>

<?php $template_slug = get_post($wp_query->post->ID)->post_name; ?>
<?php get_template_part( 'parts/'.$template_slug ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php remove_filter ( 'the_content', 'wpautop' ); ?>
<?php the_content(); ?>
<?php //advanced custom fields プラグイン the_field( "prefecture", $post->ID); ?>
	
<?php endwhile; else: ?>
	<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:100px auto; line-height:200%;">お探しの記事は準備中です。<br>近日中に公開となります。</p>
	
<?php endif; ?>

</div><!-- /#main post_class -->

<?php get_footer(); ?>