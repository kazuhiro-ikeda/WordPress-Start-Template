/*
Author : Kazuhiro Ikeda
*/

jQuery(function(){
	jQuery('a[href^=#]').click(function() {
	   	var speed = 400; 
	   	var href= jQuery(this).attr("href");
	   	var target = jQuery(href == "#" || href == "" ? 'html' : href);
	   	var position = target.offset().top;
	jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
    	return false;
	});
});