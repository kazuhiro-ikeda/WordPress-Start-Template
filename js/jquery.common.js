/*
Author : Kazuhiro Ikeda
*/
	
	//ロールオーバー
	
		$(function(){
			$("img.rollover").mouseover(function(){
				$(this).attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_on$2"));
			}).mouseout(function(){
				$(this).attr("src",$(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/, "$1$2"));
			}).each(function(){
				$("<img>").attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_on$2"));
			});
		});
		
		
	//スムーススクロール
	
		$(function(){
			$('a[href^=#]').click(function() {
			   	var speed = 400; 
			   	var href= jQuery(this).attr("href");
			   	var target = jQuery(href == "#" || href == "" ? 'html' : href);
			   	var position = target.offset().top;
			$('body,html').animate({scrollTop:position}, speed, 'swing');
		    	return false;
			});
		});

	//トグルパネル
	/* 
		USAGE
		<div class="toggle" data-number="0">トグル</div>
		<div id="panel0" class="hide-panel">パネル</div>
	 */
	
		$(function(){
			$(".hide-panel").hide();
			$(".toggle").css("cursor" , "pointer");
			$(".toggle").on("click", function() {
				var panelId = $(this).attr("data-number");
				var panel = "#panel" + panelId;
				$(this).toggleClass("active");//開いた時、ボタンにクラスを追加
				$(panel).fadeToggle("fast");//”slow”、”normal”、”fast”
			});
		});