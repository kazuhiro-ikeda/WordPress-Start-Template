/*
Author : Kazuhiro Ikeda
*/

$(function(){
		
	//ロールオーバー
		
	$( ".rollover img" ).mouseover(function(){
		$(this).attr( "src",$(this).attr( "src" ).replace(/^(.+)(\.[a-z]+)$/, "$1_on$2" ));
	}).mouseout(function(){
		$(this).attr( "src",$(this).attr( "src" ).replace(/^(.+)_on(\.[a-z]+)$/, "$1$2" ));
	}).each(function(){
		$( "<img>" ).attr( "src",$(this).attr( "src" ).replace(/^(.+)(\.[a-z]+)$/, "$1_on$2" ));
	});
	
	//バナー	
	$(window).scroll(function () {
	    var s = $(this).scrollTop();
	    var a = 700;  
	    var b = $( "footer" ).offset();
		    var c = b.top;
	    if (s > a && s <= ( c-$(window).height() ) ) {
	        $( "#nav_foot" ).fadeIn( "slow" );
	    } else if( s <= a || s > ( c - $(window).height() ) ) {
	        $( "#nav_foot" ).fadeOut( "slow" );
	    }
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
	
	/*//スムーススクロール
	//colorbox 対応可能
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 600) {
            $("#pagetop > a").fadeIn("slow");
        } else {
            $("#pagetop > a").fadeOut("slow");
        }
        scrollHeight = $(document).height(); //ドキュメントの高さ 
        scrollPosition = $(window).height() + $(window).scrollTop(); //現在地 
        footHeight = $("footer").innerHeight(); //footerの高さ（＝止めたい位置）
        if ( scrollHeight - scrollPosition  <= footHeight ) { //ドキュメントの高さと現在地の差がfooterの高さ以下になったら
            $("#pagetop > a").css({
                "position":"absolute", //pisitionをabsolute（親：wrapperからの絶対値）に変更
                "bottom": footHeight + 60 //下からfooterの高さ + 20px上げた位置に配置
            });
        } else { //それ以外の場合は
            $("#pagetop > a").css({
                "position":"fixed", //固定表示
                "bottom": "80px" //下から20px上げた位置に
            });
        }
    });*/
		    
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
	/* 
		USAGE
		<div class="toggle" data-title="navigation">トグル</div>
		<div id="panel-navigation" class="hide-panel">パネル</div>
	 */
	
	$( ".toggle" ).css( "cursor", "pointer" );
	$( ".toggle" ).on( "click", function() {
		var panelId = $(this).attr( "data-title" );
		var panel = "#" + panelId;
		$(this).toggleClass( "active" );//開いた時、ボタンにクラスを追加
		$(panel).fadeToggle( "fast" );//”slow”、”normal”、”fast”
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
	.list-btn に relative .sub-panel absolute
	.sub-panel がずれているときは上位の ul li のスタイルを継承している可能性大
	*/
	$( ".sub-panel" ).hide();
	$( ".list-btn" ).hover(function(){
		$(this).find( "ul" ).slideDown( "slow" );
	}, function(){
		$(this).find( "ul" ).slideUp( "fast" );
	});
	//↑スマホ、ホバー対策
	$( 'a' ).bind( 'touchstart', function(){
	$( this ).addClass( 'hover' );
	}).bind( 'touchend', function(){
		$( this ).removeClass( 'hover' );
	});
	
	//投稿コンテンツの段落にクリアフィックス
	$( '.single-content p' ).addClass( 'cl' );
				
	//IE ACTIVE FOCUS remove outline
	if (document.documentElement.attachEvent)
	    document.documentElement.attachEvent('onmousedown',function(){
	    	event.srcElement.hideFocus=true
	});	
			
	//ゆらゆら
	$.fn.yurayura = function( config ) {
	    var obj = this;
	    var i = 0;
	    var defaults = {
	      'move' : 5,     // 動く量
	      'duration' : 1000,  // 移動にかける時間
	      'delay' : 0     // 両端で停止する時間
	    };
	    var setting = $.extend( defaults, config );
	    return obj.each(function() {
	      	(function move() {
		        i = i > 0 ? -1 : 1;
		        var p = obj.position().top;
		        $( obj )
		            .delay( setting.delay )
		            .animate( { top : p + i * setting.move }, {
			            duration : setting.duration,
			            complete : move
		           });
		        })();
		    });
		};
	/*
		フッターに設置
		<script>
			$(function(){
		        $('#btn-scroll').yurayura( {
		            'move' : 20,
		            'delay' : 10,
		            'duration' : 600
		        } );
		    });
		</script>
	*/
	
	//スティッキーヘッダー
	$('#hoge').each(function () {

        var $window = $(window), // ウィンドウを jQuery オブジェクト化
            $header = $(this),   // ヘッダーを jQuery オブジェクト化
            // ヘッダーのデフォルト位置を取得
            headerOffsetTop = $header.offset().top;

        // ウィンドウのスクロールイベントを監視
        // (ウィンドウがスクロールするごとに処理を実行する)
        $window.on('scroll', function () {
            // ウィンドウのスクロール量をチェックし、
            // ヘッダーのデフォルト位置を過ぎていればクラスを付与、
            // そうでなければ削除
            if ($window.scrollTop() > headerOffsetTop) {
                $header.addClass('sticky');
            } else {
                $header.removeClass('sticky');
            }
        });

        // ウィンドウのスクロールイベントを発生させる
        // (ヘッダーの初期位置を調整するため)
        $window.trigger('scroll');

    });
    /*	
	    CSS
	    #hoge.sticky {
		    width: 100%;
		    position: fixed;
		    top: 0;
		    z-index: 100;
		}
	*/
	
	//フェーダー
    var $setElm = $('#fader'),
    fadeSpeed = 5500,
    switchDelay = 6000;
 
    $setElm.each(function(){
        var targetObj = $(this);
        var findUl = targetObj.find('ul');
        var findLi = targetObj.find('li');
        var findLiFirst = targetObj.find('li:first');
 
        findLi.css({display:'block',opacity:'0',zIndex:'99'});
        findLiFirst.css({zIndex:'100'}).stop().animate({opacity:'1'},fadeSpeed);
 
        setInterval(function(){
            findUl.find('li:first-child').animate({opacity:'0'},fadeSpeed).next('li').css({zIndex:'100'}).animate({opacity:'1'},fadeSpeed).end().appendTo(findUl).css({zIndex:'99'});
        },switchDelay);
    });
    /*
    <div id="fader">
		<ul>
			<li><img src="img/photo01.jpg" width="400" height="300" alt=""></li>
			<li><img src="img/photo02.jpg" width="400" height="300" alt=""></li>
			<li><img src="img/photo03.jpg" width="400" height="300" alt=""></li>
			<li><img src="img/photo04.jpg" width="400" height="300" alt=""></li>
			<li><img src="img/photo05.jpg" width="400" height="300" alt=""></li>
		</ul>
	</div>
    #fader {
	    margin: 0 auto;
	    width: 400px;
	    height: 300px;
	    text-align: left;
	    overflow: hidden;
	}
	 
	#fader ul {
	    width: 400px;
	    height: 300px;
	    text-align: left;
	    overflow: hidden;
	    position: relative;
	}
	 
	#fader ul li {
	    top: 0;
	    left: 0;
	    width: 400px;
	    height: 300px;
	    display: none;
	    position: absolute;
	}
	*/
	
	//ふわっと	
	$(window).scroll(function(){
		 var windowHeight = $(window).height(),
	     topWindow = $(window).scrollTop();
		 $('.animation_1').each(function(){
		  var targetPosition = $(this).offset().top;
		  if(topWindow > targetPosition - windowHeight + 200){
		   $(this).addClass("fadeInDown");
		  }
		});
	});
	
	$(window).scroll(function(){
		 var windowHeight = $(window).height(),
	     topWindow = $(window).scrollTop();

		  $('.animation_2').each(function(){
		  var targetPosition = $(this).offset().top;
		  if(topWindow > targetPosition - windowHeight + 250){
		   $(this).addClass("fadeInDown");
		  }
		});
	});
	
	$(window).scroll(function(){
		 var windowHeight = $(window).height(),
	     topWindow = $(window).scrollTop();
		  $('.animation_3').each(function(){
		  var targetPosition = $(this).offset().top;
		  if(topWindow > targetPosition - windowHeight + 300){
		   $(this).addClass("fadeInDown");
		  }
		});
	});
	
	/*//スクロール処理
    $(window).scroll(function(){
		if ($(window).scrollTop() > 500) {
			$('.page-home header.device').addClass('fixed');
		} else {
			$('.page-home header.device').removeClass('fixed');
		}
		
	});*/
	
	//電話リンク
	var ua = navigator.userAgent;
    if(ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0){
        $('.tel_link').each(function(){
            var str = $(this).text();
            $(this).html($('<a>').attr('href', 'tel:' + str.replace(/-/g, '')).append(str + '</a>'));
        });
    }
	
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