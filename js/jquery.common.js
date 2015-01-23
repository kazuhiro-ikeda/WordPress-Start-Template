/*
Author : Kazuhiro Ikeda
*/

$(function(){
		
	//ロールオーバー
		
			$(".rollover img").mouseover(function(){
				$(this).attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_on$2"));
			}).mouseout(function(){
				$(this).attr("src",$(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/, "$1$2"));
			}).each(function(){
				$("<img>").attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_on$2"));
			});
		
	//スムーススクロール
	
			$('a[href^=#]').click(function() {
			   	var speed = 400; 
			   	var href= jQuery(this).attr("href");
			   	var target = jQuery(href == "#" || href == "" ? 'html' : href);
			   	var position = target.offset().top;
			$('body,html').animate({scrollTop:position}, speed, 'swing');
		    	return false;
			});

	//トグルパネル
	/* 
		USAGE
		<div class="toggle" title="navigation">トグル</div>
		<div id="panel-navigation" class="hide-panel">パネル</div>
	 */
	
			$(".hide-panel").hide();
			$(".toggle").css("cursor" , "pointer");
			$(".toggle").on("click", function() {
				var panelId = $(this).attr("title");
				var panel = "#panel-" + panelId;
				$(this).toggleClass("active");//開いた時、ボタンにクラスを追加
				$(panel).fadeToggle("fast");//”slow”、”normal”、”fast”
			});
	
	//ホバーメニュー
	/*
		USAGE
		<ul>
			<li>AAA</li>
			<li class="list-btn">BBB
			<ul class="sub-panel">
				<li>１２３４</li>
				<li>５６７８</li>
				<li>９１０１１</li>
				<li>１２１３１４１５</li>
			</ul>
			</li>
			<li>CCC</li>
			<li>DDD</li>
		</ul>
	*/
			$(".sub-panel").hide();
			$(".list-btn").hover(function(){
				$(this).find("ul").slideDown("slow");
			}, function(){
				$(this).find("ul").slideUp("fast");
			});	
			
			
});// END TAG