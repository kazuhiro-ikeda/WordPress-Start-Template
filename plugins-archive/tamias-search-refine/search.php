<?php get_header(); ?>

<div id="main" class="screen" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	<?php the_content(); ?>
<?php endwhile; else: ?>
	<p style="text-align:center; font-size:24px; font-weight:bold; color:#ddd; margin:300px auto;">検索結果：0</p>
<?php endif; ?>

</div>
<!-- /.screen -->
<?php get_footer(); ?>