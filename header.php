<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta name="viewport" content="width=640">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/icon.png">
<title>
<?php full_title(); ?>
</title>
<meta name="Author" content="xxx">
<script>
(function(){
    var _UA = navigator.userAgent;
    if (_UA.indexOf('iPhone') > -1 || _UA.indexOf('iPod') > -1) {
        document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/iphone.css">');
    }else if(_UA.indexOf('Android') > -1){
        document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/android.css">');
    }else{
       //nonstyle
    }
})();
</script>
<?php wp_deregister_script('jquery'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<header>
	<?php wp_nav_menu(
		array(
			'theme_location' => 'global' ,
			'container'       => 'nav',
			'container_id'    => '',
			'container_class' => 'screen cl',
			'menu_id'         => 'global-nav',
			'menu_class'      => ''
			//スタイル
			//<nav class="screen cl">
			//<ul id="global-nav">
			//<li><a href=""></a></li>
			//</ul>
			//</nav>
	)); ?>
	
	<!-- サイトID -->
	<div id="site-id">
		<a href="<?php bloginfo('url'); ?>"><<?php sccs_site_id(); ?> class="logo">
		<img src="<?php bloginfo('template_url'); ?>/images/common/id-logo.png" alt="<?php bloginfo('name'); ?>" width="433" height="26"></<?php sccs_site_id(); ?>></a>
		<a href="<?php bloginfo('url'); ?>"><<?php sccs_tagline(); ?> class="tagline">
		<img src="<?php bloginfo('template_url'); ?>/images/common/id-simbol.png" alt="<?php bloginfo('description'); ?>" width="234" height="120" class="simbol"></<?php sccs_tagline(); ?>></a>
	</div><!-- /site-id -->
	
	<h1><?php
			global $wp_query;
			$postID = $wp_query->post->ID;
			echo get_post_meta($postID, 'h1', true);
		?></h1>
	
	
</header>





















