<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta name="viewport" content="width=960">
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