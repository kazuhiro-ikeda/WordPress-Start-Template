
<?php 

$posts = get_field('case_store');

if( $posts ): ?>

<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
<?php setup_postdata($post); ?>


<?php $store = get_the_title(); ?>
<?php $tel = get_field('store_tel'); ?>
<?php $time = get_field('store_time'); ?>
<?php $place = get_field('store_address'); ?>
<?php $location = get_field('store_map'); ?>
<?php $mapurl = get_field('store_map_url'); ?>

<?php endforeach; ?>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

<?php endif; ?>