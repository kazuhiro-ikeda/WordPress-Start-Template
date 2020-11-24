<?php
/*
Plugin Name: TAMIAS Control Form
Plugin URI: http://tamias.co.jp/
Description: 管理画面変更
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://tamias.co.jp/
*/	

	//ダッシュボード
		function remove_menus_form() {
			remove_menu_page( 'edit.php?post_type=mw-wp-form' );
		}
		add_action( 'admin_menu', 'remove_menus_form' );
	
?>