<?php
/*
Plugin Name: TAMIAS Search Refine
Plugin URI: http://tamias.co.jp/
Description: 絞込み検索
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://tamias.co.jp/
*/

	//投稿ページのみを検索対象
		function SearchFilter($query) {
			if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
				$query->set( 'post_type', 'post' );
			}
		}
		add_action( 'pre_get_posts','SearchFilter' );

	//検索チェックボックスの配列を文字列に変換
		function custom_request($query) {
			if (!empty($query['cat']) && array_key_exists('s', $query)){
				$search_category_array='';
				$tax_query='';
				if($query['cat']){
					foreach($query['cat'] as $category_id){
						$category_data=get_category($category_id);
						$parent_category_id=$category_data->parent;
						$search_category_array[$parent_category_id][]=$category_id;
					}
					if($search_category_array){
						foreach($search_category_array as $category_array){
							$tax_query[]=array(
								'taxonomy'=>'category',
								'terms'=>$category_array,
								'field'=>'term_id',
								'operator'=>'IN'
							);
						}
						$tax_query['relation']='AND';
					}
				}
				$query['tax_query'] =$tax_query;
				unset($query['cat']);
		}
			return $query;
		}
		add_filter( 'request', 'custom_request' );
		
?>