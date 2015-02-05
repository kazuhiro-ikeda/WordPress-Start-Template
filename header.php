<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/icon.png">

<?php
	wp_deregister_script('jquery');	
	wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '1.11.0');
?>

<title><?php full_title(); ?></title>
<meta name="Author" content="<?php bloginfo('name'); ?>">

<script>
(function(){
    var _UA = navigator.userAgent;
    if (_UA.indexOf('iPhone') > -1 || _UA.indexOf('iPad') > -1) {
        document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/iphone.css">');
    }else if(_UA.indexOf('Android') > -1){
        document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/android.css">');
    }else{
       //nonstyle
    }
})();
</script>

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
		
<?php if (wp_is_mobile()) : //mobile only ?>
				
<?php else : //pc only ?>
	<?php wp_nav_menu(
		array(
			'theme_location' => 'global' ,
			'container'       => 'nav',
			'container_id'    => 'nav-global',
			'container_class' => '',
			'menu_id'         => 'nav-ul-global',
			'menu_class'      => 'nav-list-horizontal screen cl'
	)); ?>
				
<?php  endif ; //if_mobile ?>
		
</header>
