<?php
/*
Plugin Name: TAMIAS Control Contents
Plugin URI: http://tamias.co.jp/
Description: コンテンツ登録
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://tamias.co.jp/
*/


	//案件登録
		function case_post_type() {
			register_post_type( 'case' , array(
				'labels'        => array( 'name' => '案件' ),
				'public'        => true,
				'menu_position' => 6,
				'hierarchical'  => true ,
				'supports'      => array( 'title'/*,'editor','custom-fields','thumbnail'*/ ),
				'can_export'    => true,
				'has_archive'   => true,
			));
			
			register_taxonomy( 'genre' , 'case' , array(
				'labels'            => array( 'name' => '雇用形態'),
				'public'            => true,
				'hierarchical'      => true,
				'show_in_nav_menus' => true,
			));
			
			register_taxonomy( 'area' , 'case' , array(
				'labels'            => array( 'name' => '地域'),
				'public'            => true,
				'hierarchical'      => true,
				'show_in_nav_menus' => true,
			));
		}
		add_action( 'init' , 'case_post_type' , 1);
		
?>