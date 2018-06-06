/*
Author : Kazuhiro Ikeda
*/

$(function(){
	
	//ふわっとpagetop
	$(function() {
	    var topBtn = $('#xxx');    
	    topBtn.hide();
	    //スクロールが100に達したらボタン表示
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 300) {
	            topBtn.fadeIn();
	        } else {
	            topBtn.fadeOut();
	        }
	    });
	    //スクロールしてトップ
	    topBtn.click(function () {
	        $('body,html').animate({
	            scrollTop: 0
	        }, 500);
	        return false;
	    });
	});
	
	//スチィッキーヘッダー
	$(window).scroll(function(){
		if ($(window).scrollTop() > 100) {
			$('header.normal').addClass('fixed');
		} else {
			$('header.normal').removeClass('fixed');
		}
	});
		
	//ロールオーバー
		
	$( ".rollover img" ).mouseover(function(){
		$(this).attr( "src",$(this).attr( "src" ).replace(/^(.+)(\.[a-z]+)$/, "$1_on$2" ));
	}).mouseout(function(){
		$(this).attr( "src",$(this).attr( "src" ).replace(/^(.+)_on(\.[a-z]+)$/, "$1$2" ));
	}).each(function(){
		$( "<img>" ).attr( "src",$(this).attr( "src" ).replace(/^(.+)(\.[a-z]+)$/, "$1_on$2" ));
	});
	
	//画像切り替え
	$(window).on('load resize', function(){
		var windowWidth=window.innerWidth;
		$('.branch img').each(function(){
			var $obj=$(this);
			var imgSrc=$obj.attr('src');
			var ext=imgSrc.split(".").pop();
			if(windowWidth<=640){
				if(!$obj.hasClass('figure_s')){
					var replaceSrc=imgSrc.replace('.'+ext,'_s.'+ext);
					$obj.addClass('figure_s').attr('src',replaceSrc);
				}
			} else {
				if($obj.hasClass('figure_s')){
					var replaceSrc=imgSrc.replace('_s.'+ext,'.'+ext);
					$obj.removeClass('figure_s').attr('src',replaceSrc);
				}
			}
		});
	});			
			    
	//スムーススクロール
	
	$( 'a[href^=#]' ).click(function() {
	   	var speed = 400; 
	   	var href= $(this).attr( "href" );
	   	var target = $(href == "#" || href == "" ? 'html' : href);
	   	var position = target.offset().top;
	$( 'body,html' ).animate({scrollTop:position}, speed, 'swing' );
    	return false;
	});

	//トグルパネル
	$( ".toggle" ).css( "cursor", "pointer" );
	$( ".toggle" ).on( "click", function() {
		var panelId = $(this).attr( "data-title" );
		var panel = "#" + panelId;
		$(this).toggleClass( "active" );//開いた時、ボタンにクラスを追加
		$(panel).fadeToggle( "fast" );//”slow”、”normal”、”fast”
	});
	
	$('#global_s a').on('click', function(){
        if (window.innerWidth <= 640) {
            $('.toggle').click();
        }
    });	
	
	
	//投稿コンテンツの段落にクリアフィックス
	$( '.single-content p' ).addClass( 'cl' );
				
	//IE ACTIVE FOCUS remove outline
	if (document.documentElement.attachEvent)
	    document.documentElement.attachEvent('onmousedown',function(){
	    	event.srcElement.hideFocus=true
	});	
	
	//MW WP Form 必須
	$( '#mw_wp_form_mw-wp-form-識別ナンバー select option[value=""]' ).html( 'お問合せ内容を選択' );
	$( '#mw_wp_form_mw-wp-form-識別ナンバー select#year option[value=""]' ).html( '西暦' );
	$( '#mw_wp_form_mw-wp-form-識別ナンバー select#month option[value=""]' ).html( '月' );
	$( '#mw_wp_form_mw-wp-form-識別ナンバー select#day option[value=""]' ).html( '日' );
	$( '#mw_wp_form_mw-wp-form-識別ナンバー select#pref option[value=""]' ).html( '都道府県' );
	
	//br 除去
	$( '.hogehogehoge' ).find( 'br' ).replaceWith( '' );
	
	//googlemap
	$('.map').click(function () {
		$(this).find('iframe').css("pointer-events", "all");
	});	
			
			
});// END TAG