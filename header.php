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

<?php
	wp_deregister_script( 'jquery' );	
	wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.11.0' );
?>

<title><?php full_title(); ?></title>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<header>
	<div id="site__id">
		<<?php diverge_site_id(); ?> id="header__logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a></<?php diverge_site_id(); ?>>
		<<?php diverge_tagline(); ?> class="tagline"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/tagline.png" alt="<?php bloginfo( 'description' ); ?>"></a></<?php diverge_tagline(); ?>>
	</div>
	<!-- /site-id -->

</header>
