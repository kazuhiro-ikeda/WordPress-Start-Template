<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<?php if (is_mobile()) : //smartphone only ?>
<?php if(is_page( 'entry' )): ?>
<meta name="viewport" content="width=device-width, user-scalable=no">

<?php else: ?>
<meta name="viewport" content="width=device-width">

<?php endif; ?>
			
<?php else : //pc tablet ?>
<meta name="viewport" content="width=device-width">
			
<?php  endif ; //if_mobile ?>


<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script src="https://use.fontawesome.com/38e4e444a4.js"></script>
<link rel="alternate" hreflang="ja" href="<?php the_permalink(); ?>">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/icon.png">
<meta name="format-detection" content="telephone=no">

<?php wp_deregister_script( 'jquery' ); wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.11.0' ); ?>

<title>
	<?php if(is_singular( 'case' )): ?>
	<?php the_field( "title_case", $post->ID); ?>｜<?php bloginfo( 'name' ); ?>
	
	<?php else: ?>
	<?php full_title(); ?>
	
	<?php endif; ?>
</title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	
<header class="normal">
	<div class="inner">
		<<?php diverge_site_id(); ?> class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a></<?php diverge_site_id(); ?>>
		
	</div>
	<!-- /.inner -->

</header>

<header class="device">
	<a class="logo" href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo_s.png" alt="<?php bloginfo( 'name' ); ?>"></a>
	
	<div class="btn_toggle">
		<span class="toggle" data-title="global_s">
			<span></span>
			<span></span>
			<span></span>
			
		</span>
		
		<div class="text">MENU</div>
		<!-- /.btn_toggle -->
		
	</div>
	<!-- /.btn_toggle -->
	
</header>
