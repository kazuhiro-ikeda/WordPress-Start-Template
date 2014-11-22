/*
Author : Kazuhiro Ikeda
*/

$(function(){
	
	//画像のプリロード
		
		    jQuery.preloadImages = function(){
		        for(var i = 0; i<arguments.length; i++){
		            jQuery("<img>").attr("src", arguments[i]);
		        }
		    };
		    $.preloadImages(
		    "wp-content/theme/epi-rank/images/common/xxx.png" ,
		    "wp-content/theme/epi-rank/images/common/xxx.png" ,
		    "wp-content/theme/epi-rank/images/common/xxx.png" 
		    );
	
});// END TAG