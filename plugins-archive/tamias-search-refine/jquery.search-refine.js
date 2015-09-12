/*
Author : Kazuhiro Ikeda
*/

$(function(){
	
	//チェックボックスアウトプット１
			$(function(){
			  $("#panel-01 :checkbox").change(function(){
			    // 結果を表示する要素内を消去
			    $("output#word-list-01").text("");
			    // チェック済みのチェックボックスを指定する
			    $("#panel-01 :checkbox:checked").each(function(){
			      // チェックボックスの項目名を読み出す
			      var itemName = $(this).attr("data-title");
			      // 読み出した結果を要素に追加
			      $("output#word-list-01").append(itemName).append("　　");
			    });
			  });
			});
			
			//チェックボックスアウトプット２
			$(function(){
			  $("#panel-02 :checkbox").change(function(){
			    // 結果を表示する要素内を消去
			    $("output#word-list-02").text("");
			    // チェック済みのチェックボックスを指定する
			    $("#panel-02 :checkbox:checked").each(function(){
			      // チェックボックスの項目名を読み出す
			      var itemName = $(this).attr("data-title");
			      // 読み出した結果を要素に追加
			      $("output#word-list-02").append(itemName).append("　　");
			    });
			  });
			});
			
			//チェックボックスアウトプット３
			$(function(){
			  $("#panel-03 :checkbox").change(function(){
			    // 結果を表示する要素内を消去
			    $("output#word-list-03").text("");
			    // チェック済みのチェックボックスを指定する
			    $("#panel-03 :checkbox:checked").each(function(){
			      // チェックボックスの項目名を読み出す
			      var itemName = $(this).attr("data-title");
			      // 読み出した結果を要素に追加
			      $("output#word-list-03").append(itemName).append("　　");
			    });
			  });
			});
			
			//チェックボックスアウトプット４
			$(function(){
			  $("#panel-04 :checkbox").change(function(){
			    // 結果を表示する要素内を消去
			    $("output#word-list-04").text("");
			    // チェック済みのチェックボックスを指定する
			    $("#panel-04 :checkbox:checked").each(function(){
			      // チェックボックスの項目名を読み出す
			      var itemName = $(this).attr("data-title");
			      // 読み出した結果を要素に追加
			      $("output#word-list-04").append(itemName).append("　　");
			    });
			  });
			});

	
});// END TAG