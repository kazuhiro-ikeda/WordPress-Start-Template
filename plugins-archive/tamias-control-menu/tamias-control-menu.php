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
			//remove_menu_page( 'edit.php' );
			remove_menu_page( 'edit-comments.php' );
			//remove_menu_page('edit.php?post_type=page');
			//remove_menu_page( 'plugins.php' );
			//remove_menu_page( 'edit.php?post_type=mw-wp-form' );
			//remove_menu_page( 'edit.php?post_type=acf-field-group' );
		}
		add_action( 'admin_menu', 'remove_menus' );

	//変更
		function edit_admin_menus() {
		  global $menu;
		  global $submenu;
		  $menu[5][0] = 'お知らせ'; // 投稿
		  $submenu['edit.php'][5][0] = 'お知らせ一覧';
		  $submenu['edit.php'][10][0] = '新しいお知らせ';
		}
		add_action( 'admin_menu', 'edit_admin_menus' );
		
		function change_post_object_label() {
			global $wp_post_types;
			$labels = &$wp_post_types['post']->labels;
			$labels->name = 'お知らせ';
			$labels->singular_name = 'お知らせ';
			$labels->add_new = _x('新規お知らせ', 'お知らせ');
			$labels->add_new_item = '新規お知らせ';
			$labels->edit_item = 'お知らせの編集';
			$labels->new_item = '新しいお知らせ';
			$labels->view_item = 'お知らせを表示';
			$labels->search_items = 'お知らせ検索';
			$labels->not_found = 'お知らせが見つかりませんでした';
			$labels->not_found_in_trash = 'ゴミ箱のお知らせにも見つかりませんでした';
		}
		add_action( 'init', 'change_post_object_label' );
	
?>