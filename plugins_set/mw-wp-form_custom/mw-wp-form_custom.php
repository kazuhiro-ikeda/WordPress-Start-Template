<?php
/*
Plugin Name: MW WP Form Custom
Description: プラグイン「MW WP Form」の管理画面表示等をカスタマイズします。
Author: codeDrive
Version: 1.00
Author URI: http://www.codedrive.jp
*/
/*UPDATE:2016-02-10*/

$mwfcustom = new MwfCustom();

add_action( 'plugins_loaded', array( $mwfcustom, 'mwfcStart' ) );

class MwfCustom {

	//プラグイン「Front-end Editor」のファイルパス
	protected $plugin_file='mw-wp-form/mw-wp-form.php';

	public function mwfcStart() {
		if(!function_exists( 'get_plugins')){
			require_once(ABSPATH.'wp-admin/includes/plugin.php');
		}
		$plugin_data=$this->getSinglePluginData($this->plugin_file);
		if($plugin_data['active']){
			add_action('admin_print_scripts', array($this,'add_admin_js'));
		}
	}

	function add_admin_js() {
		wp_enqueue_script('jquery');
		if(is_admin()){
			wp_register_script('mwfc-admin-script', plugins_url('js/admin.js', __FILE__));
			wp_enqueue_script('mwfc-admin-script');
		}
	}
	protected function getSinglePluginData($plugin_file){
		$plugin_data=get_plugin_data(WP_PLUGIN_DIR.'/'.$plugin_file);
		if(is_array($plugin_data)){
			$plugin_data['active']=is_plugin_active($plugin_file);
		} else {
			$plugin_data['active']=0;
		}
		return $plugin_data;
	}
}
?>