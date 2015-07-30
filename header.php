<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php if(is_page( 'contact' )): ?>
<meta name="viewport" content="width=640, user-scalable=no">
<?php else: ?>
<meta name="viewport" content="width=640">
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
<?php $ua = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match( '/Macintosh/', $ua)) {
		//Mac
		echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/mac.css">';
	} else {
	//
	} ?>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/icon.png">
<?php
	$ua = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($ua, 'Android' ) !== false && strpos($ua, 'Mobile' ) === false) {
		//android tablet
	    echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/android.css">';
	} elseif(strpos($ua, 'Android') !== false && strpos($ua, 'Mobile' ) !== false) {
		//android smartphone
	    echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/android.css">';
	} elseif(strpos($ua, 'iPhone' ) !== false) {
		//iPhone
	    echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/iphone.css">';
	} elseif(strpos($ua, 'iPad' ) !== false) {
		//iPad
	    echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/iphone.css">';
	} elseif(strpos($ua, 'iPod' ) !== false) {
		//iPod
	} else {
		//iPhone、iPad、iPod、Android以外
	}
?>

<?php
	wp_deregister_script('jquery');	
	wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.11.0');
?>

<title><?php the_title(); ?><?php // full_title(); ?></title>
<meta name="Author" content="<?php bloginfo('name'); ?>">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<header>
	<!-- サイトID -->
	<div id="site-id">
		<<?php diverge_site_id(); ?> class="logo"><a href="<?php bloginfo('url'); ?>">
		<img src="<?php bloginfo('template_url'); ?>/images/common/id-logo.png" alt="<?php bloginfo('name'); ?>" width="433" height="26"></a></<?php diverge_site_id(); ?>>
		<<?php diverge_tagline(); ?> class="tagline"><a href="<?php bloginfo('url'); ?>">
		<img src="<?php bloginfo('template_url'); ?>/images/common/id-simbol.png" alt="<?php bloginfo('description'); ?>" width="234" height="120" class="simbol"></a></<?php diverge_tagline(); ?>>
	</div>
	<!-- /site-id -->

	<h1><?php
			global $wp_query;
			$postID = $wp_query->post->ID;
			echo get_post_meta($postID, 'h1', true);
	?></h1>
		
</header>
