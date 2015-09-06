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
				var panel = "#panel-" + panelId;
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
	
	//リンク無効
			$( '.no-link a' ).click(function(){
				return false;
			}).css( 'cursor', 'default' );
			$( 'li.no-link a').hover(function(){
				$(this).css( 'textDecoration', 'none' );
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
		}
	*/
	
	//MW WP Form 必須
	$( '#mw_wp_form_mw-wp-form-識別ナンバー select option[value=""]' ).html( 'お問合せ内容を選択' );
	
	//br 除去
	$( '.hogehogehoge' ).find( 'br' ).replaceWith( '' );		
			
			
});// END TAG