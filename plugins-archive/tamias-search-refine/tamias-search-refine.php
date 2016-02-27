<?php
/*
Plugin Name: TAMIAS Search Refine
Plugin URI: http://moriad.jp/
Description: 絞込み検索
Version: 1.0
Author: Kazuhiro Ikeda
Author URI: http://moriad.jp/
*/

	//スクリプト読み込み
	add_action( 'wp_footer', 'tsr_add_scripts');
	function tsr_add_scripts() {
		if(!is_admin()){
			wp_register_script('tsr-js', plugins_url('js/jquery.search-refine.js', __FILE__));
			wp_enqueue_script('tsr-js');
		}
	}

	//投稿ページのみを検索対象
		function SearchFilter($query) {
			if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
				$query->set( 'post_type', 'post' );
			}
		}
		add_action( 'pre_get_posts','SearchFilter' );

	//検索チェックボックスの配列を文字列に変換
		function custom_request($query) {
			if (!is_admin() && !empty($query['cat']) && array_key_exists('s', $query)){
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

	//検索用チェックボックス出力
	//$cat_id：親カテゴリid or slug,$name：チェックボックス名,$target：出力対象,$class：クラス名
	//出力対象設定値：
	//'parent'	指定カテゴリを親に持つ子カテゴリを出力
	//'child_of'	指定カテゴリに含まれる子カテゴリを出力
	//'check_parent'指定カテゴリを親に持つ子カテゴリを出力（親子チェックボックス対応class付加）
	//'check_child'	指定カテゴリに含まれる孫カテゴリを出力（子カテゴリは含まない。親子チェックボックス対応class付加）
	function tsr_get_cat_checkbox($cat_id,$name,$target='parent',$class=''){

		//カテゴリID変換
		if(!is_numeric($cat_id)){
			$cat=get_category_by_slug($cat_id);
			if($cat){
				$cat_id=$cat->term_id;
			} else {
				$cat_id=0;
			}
		}

		//$target設定値確認
		$target_array=array('check_parent','check_child','parent','child_of');
		if(!in_array($target,$target_array)){
			$target="parent";
		}
		switch($target){
			case"child_of":
				$arg_cat='child_of';
			break;

			case"parent":
			default:
				$arg_cat='parent';
		}
		$cat_tags='';
		$args=array(
			$arg_cat=>$cat_id,
			'orderby'=>'id',
			'hide_empty'=>0
		);
		
		$parent_cats=get_categories($args);
		foreach($parent_cats as $parent_cat){
			if($target=="check_child"){
				$args=array(
					'parent'=>$parent_cat->cat_ID,
					'orderby'=>'id',
					'hide_empty'=>0
				);
				$cats=get_categories($args);
				foreach($cats as $cat){
					$cat_tags.='
						<label class="check-item-label">
							<input type="checkbox" value="'.$cat->cat_ID.'" name="'.$name.'[]" data-parent="'.$parent_cat->cat_ID.'" data-title="'.esc_html($cat->cat_name).'" />
							'.esc_html($cat->cat_name).'
						</label>
					';
				}
			} else {
				$cat_tags.='
					<label class="check-item-label">
						<input type="checkbox" value="'.$parent_cat->cat_ID.'" name="'.$name.'[]" data-title="'.esc_html($parent_cat->cat_name).'" />
						'.esc_html($parent_cat->cat_name).'
					</label>
				';
			}
		}

		if(!empty($cat_tags)){

			//親子チェックボックス対応class付加
			if($target=='check_child'){
				$add_class=' tsrCatChild';
			} else if($target=='check_parent'){
				$add_class=' tsrCatParent';
			}

			//ブロック要素、追加class付加
			$cat_tags='
				<div class="'.esc_html($class).$add_class.'">
					'.$cat_tags.'
				</div>
			';
		}

		return $cat_tags;
	}
		
?>