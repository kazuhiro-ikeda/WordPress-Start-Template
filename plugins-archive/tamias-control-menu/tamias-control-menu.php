<?php
/*
Plugin Name: TAMIAS Control Menu
Plugin URI: http://moriad.jp/
Description: 管理画面変更
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://moriad.jp/
*/	

	//ダッシュボード
		function remove_menus() {
			//remove_menu_page( 'edit.php' );
			remove_menu_page( 'edit-comments.php' );
			//remove_menu_page( 'plugins.php' );
			//remove_menu_page( 'edit.php?post_type=mw-wp-form' );
			//remove_menu_page( 'edit.php?post_type=acf-field-group' );
		}
		add_action( 'admin_menu', 'remove_menus' );

	//変更
		function edit_admin_menus() {
		  global $menu;
		  $menu[5][0] = '案件登録'; // 投稿
		}
		add_action( 'admin_menu', 'edit_admin_menus' );
	
?>