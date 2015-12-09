<?php
/*
Plugin Name: TAMIAS Control Contents
Plugin URI: http://tamias.co.jp/
Description: コンテンツ登録
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://tamias.co.jp/
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
		
		/*ひな形
		function show_term_area( $defaults ) {
			$defaults['★タクソノミーの英語名★'] = '★タクソノミーの日本語名★';
			return $defaults;
		}
		add_filter('manage_★投稿タイプの英語名★_posts_columns', 'show_term_area', 15, 1);
		 
		function show_term_area_id($column_name, $id) {
			if( $column_name == '★タクソノミーの英語名★' ) {
				$terms = $terms = get_the_terms( $id, '★タクソノミーの英語名★' );
				$cnt = 0;
				foreach($terms as $var) {
				echo $cnt != 0 ? ", " : "";
				echo "<a href=\"" . get_admin_url() . "edit.php?★タクソノミーの英語名★=" . $var->slug . "&post_type=★投稿タイプの英語名★" . "\">" . $var->name . "</a>";
				++$cnt;
				}
			}
		}
		add_action('manage_★投稿タイプの英語名★_posts_custom_column', 'show_term_area_id', 15, 2);
		*/
		
?>