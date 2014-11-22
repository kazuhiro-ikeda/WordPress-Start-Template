<?php get_header(); ?>

<?php if (wp_is_mobile()) : ?>
			<!-- mobile -->
			<article id="main" <?php post_class(); ?>>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<?php remove_filter ('the_content', 'wpautop'); ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
				<p>お探しの記事はありません。</p>
			<?php endif; ?>
			</article><!-- /#main post_class -->
			<?php else : ?>
			
			<!-- pc -->
			<article id="main" <?php post_class(); ?>>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<?php remove_filter ('the_content', 'wpautop'); ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
				<p>お探しの記事はありません。</p>
			<?php endif; ?>
			</article><!-- /#main post_class -->
			<?php  endif; ?>
			<!-- /if_mobile -->

<?php get_footer(); ?>