<?php get_header(); ?>
index
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	<?php the_content(); ?>
<?php endwhile; else: ?>
<p>お探しの記事はありません。</p>
<?php endif; ?>

<?php get_footer(); ?>