jQuery(function($){
	$(document).ready(function() {
		$('div.mw-wp-form-wp-list-table').each(function(){
			var email_reg = /[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}/g;
			var html=$(this).html();
			if(html!="" && html!=undefined){

				// htmlからメールアドレスを配列として取得
				var match=html.match(email_reg);
				if(match && match instanceof Array){

					// メールアドレスにリンクを付加
					for(var i=0; i<match.length;i++){
						var email=match[i];
						html=html.replace(email,'<a href="mailto:'+email+'">'+email+'</a>');
					}
					// htmlを上書き反映
					$(this).html(html);
				}
			}
		});
	});
});