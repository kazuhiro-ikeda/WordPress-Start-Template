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
<script src="https://use.fontawesome.com/38e4e444a4.js"></script>
<link rel="alternate" hreflang="ja" href="<?php the_permalink(); ?>">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/icon.png">

<?php wp_deregister_script( 'jquery' ); wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.11.0' ); ?>

<title><?php full_title(); ?></title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	
<header>
	<?php get_template_part( 'parts/id' ); ?>
	
	<div id="id_s">
		<a class="logo" href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>
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
		
	</div>
	<!-- /#id_s -->

</header>

<nav id="global_s" class="nav_s">
	<ul>
		<li><a href="<?php echo home_url(); ?>/">HOME</a></li>
		<li><a href="<?php echo home_url(); ?>/case">募集一覧</a></li>
		<li class="official_s"><a target="_blank" href="">コーポレートサイト</a></li>
	</ul>
	
</nav>
<!-- /#nav_s -->
