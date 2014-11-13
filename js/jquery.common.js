/*
Author : Kazuhiro Ikeda
*/
	
	//ロールオーバー
	
		jQuery(function(){
			$("img.rollover").mouseover(function(){
				$(this).attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_on$2"));
			}).mouseout(function(){
				$(this).attr("src",$(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/, "$1$2"));
			}).each(function(){
				$("<img>").attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_on$2"));
			});
		});
		
		
	//スムーススクロール
	
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
