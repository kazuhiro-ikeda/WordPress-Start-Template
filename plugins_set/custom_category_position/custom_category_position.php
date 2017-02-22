<?php
/*
Plugin Name: Custom Category Position
Description: 投稿編集でのカテゴリー選択をカスタマイズします。
Author: codeDrive
Version: 0.9.1
Author URI: http://www.codedrive.jp
*/
/*UPDATE:2016-02-04*/

$ccposition = new ccPosition();

add_action( 'plugins_loaded', array( $ccposition, 'ccpStart' ) );

class ccPosition {

	public function ccpStart() {
		//スタイルシート読み込み
		add_action( 'admin_print_scripts', array($this,'add_admin_styles'), 1000 );


		//カテゴリ選択非表示アクションフック
		add_action('admin_menu',array($this,'remove_default_post_screen_metaboxes'));

		//カスタムボックス定義用アクションフック
		add_action('edit_form_after_title', array($this,'post_category_box'));

		//データ保存用アクションフック
		add_action('save_post', array($this,'postpage_option_save_fields'));
	}
	function add_admin_styles() {
		wp_register_style('ccp_admin-css', plugins_url('css/admin.css', __FILE__));
		wp_enqueue_style('ccp_admin-css');
	}

	function remove_default_post_screen_metaboxes() {
		remove_meta_box( 'categorydiv' , 'post' , 'side' );
	}

	function post_category_box() {
		global $post;

		if($post->post_type=='post'){

			$parent_cat_name='案件';

			$post_category=get_the_category($post->ID);
			$post_cat_array=array();
			if($post_category){
				foreach($post_category as $post_cat){
					$post_cat_array[]=$post_cat->term_id;
				}
			}
			$cat_id = get_cat_ID($parent_cat_name);
			$args=array(
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => false,
				'parent' => $cat_id,
			);
			$categories=get_categories($args);
			$cat_list='';
			if($categories){
				foreach($categories as $parent_cat){
					$args=array(
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false,
						'parent' => $parent_cat->term_id,
					);
					$child_categories=get_categories($args);
					$child_cat_list='';
					if($child_categories){
						foreach($child_categories as $child_cat){
							if(in_array($child_cat->term_id,$post_cat_array)){
								$checked='checked';
							} else {
								$checked='';
							}
							$child_cat_list.='
								<li>
									<input id="cat-'.$child_cat->term_id.'" name="ccp_post_category[]" type="checkbox" value="'.$child_cat->term_id.'" '.$checked.' /> <label for="cat-'.$child_cat->term_id.'">'.$child_cat->name.'</label>
								</li>
							';
						}
						$child_cat_list='
							<ul>
								'.$child_cat_list.'
							</ul>
						';
					}
					$cat_list.='
						<dl>
							<dt>'.$parent_cat->name.'</dt>
							<dd>'.$child_cat_list.'</dd>
						</dl>
					';
				}
			}
			echo '
				<div class="ccpBox postbox">
					<h3>'.$parent_cat_name.'</h3>
					<div class="inside">
						'.$cat_list.'
						<input type="hidden" name="postpage_optionnonce" id="postpage_optionnonce" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />
					</div>
				</div>
			';
		}
	}

	// カスタムフィールドの値を保存
	function postpage_option_save_fields( $post_id ){
		global $post;
	
		//認証確認。
		if(!wp_verify_nonce($_POST['postpage_optionnonce'],plugin_basename(__FILE__))){
			return $post_id;
		}
	
		//自動保存ルーチンかチェック。自動保存の場合はフォームを送信しない
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return $post_id;
		}
	
		//パーミッション確認
		if(!current_user_can('edit_post',$post_id)){
			return $post_id;
		}

		//カテゴリーを設定
		$set_category=array('');
		if(!empty($_POST['ccp_post_category'])){
			$set_category=$_POST['ccp_post_category'];
		}

		$post_data=array(
			'ID'=>$post_id,
			'post_category' =>$set_category,
		);

		//そのままでは無限ループするため、一旦アクションフックを削除
		remove_action('save_post',array($this,'postpage_option_save_fields'));

		//カテゴリーを更新
		wp_update_post($post_data);

		//再度アクションフックを設定
		add_action('save_post',array($this,'postpage_option_save_fields'));

	}

}

?>