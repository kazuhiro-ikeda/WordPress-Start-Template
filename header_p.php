<?php header( 'X-UA-Compatible: IE=edge,chrome=1' ); ?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<?php if (is_mobile()) : //smartphone only ?>
<?php if(is_page( 'entry' )): ?>
<meta name="viewport" content="width=device-width, user-scalable=no">

<?php else: ?>
<meta name="viewport" content="width=device-width">

<?php endif; ?>
			
<?php else : //pc tablet ?>
<meta name="viewport" content="width=device-width">
			
<?php  endif ; //if_mobile ?>


<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<script src="https://use.fontawesome.com/38e4e444a4.js"></script>
<link rel="alternate" hreflang="ja" href="<?php the_permalink(); ?>">
<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/icon.png">

<?php wp_deregister_script( 'jquery' ); wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.11.0' ); ?>

<title><?php full_title(); ?></title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	
<header>
	<?php get_template_part( 'parts/id' ); ?>
	
	<div id="id_s">
		<a class="logo" href="<?php bloginfo( 'url' ); ?>/"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>
		<a class="toggle" data-title="global_s"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/toggle.png" alt="MENU"></a>
		
	</div>
	<!-- /#id_s -->

</header>

<nav id="global_s" class="nav_s">
	<ul>
		<li><a href="<?php bloginfo( 'url' ); ?>/">HOME</a></li>
		<li><a href="<?php bloginfo( 'url' ); ?>/case">募集一覧</a></li>
		<li class="official_s"><a target="_blank" href="">オフィシャル HP</a></li>
	</ul>
	
</nav>
<!-- /#nav_s -->

<!-- 設定後
<?php if(is_front_page()): ?>
	<?php get_template_part( 'parts/visual_main' ); ?>

<?php endif; ?>
-->
