<?php
/*
Plugin Name: TAMIAS Control Menu
Plugin URI: http://tamias.co.jp/
Description: 管理画面変更
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://tamias.co.jp/
*/	

	//ダッシュボード
		function remove_menus() {
			remove_menu_page( 'edit.php' );
			remove_menu_page( 'edit-comments.php' );
			//remove_menu_page('edit.php?post_type=page');
			//remove_menu_page( 'plugins.php' );
			remove_menu_page( 'edit.php?post_type=mw-wp-form' );
			remove_menu_page( 'edit.php?post_type=acf-field-group' );
		}
		add_action( 'admin_menu', 'remove_menus' );
	
?>