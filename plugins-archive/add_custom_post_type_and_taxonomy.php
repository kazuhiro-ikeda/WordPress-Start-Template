<?php
/*
Plugin Name: xxx
Plugin URI: http://moriad.jp/
Description: xxx
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://moriad.jp/
*/



	//店舗登録
		function place_post_type() {
			register_post_type( 'place' , array(
				'labels'        => array( 'name' => '店舗一覧' ),
				'public'        => true,
				'menu_position' => 6,
				'hierarchical'  => true ,
				'supports'      => array( 'title','editor','custom-fields','thumbnail' ),
				'can_export'    => true,
				'has_archive'   => true,
			));
			
			register_taxonomy( 'organization' , 'place' , array(
				'labels'            => array( 'name' => '組織一覧'),
				'public'            => true,
				'hierarchical'      => true,
				'show_in_nav_menus' => true,
			));
		}
		add_action( 'init' , 'place_post_type' , 1);
		
?>