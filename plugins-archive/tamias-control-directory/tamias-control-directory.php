<?php
/*
Plugin Name: TAMIAS Control Directory
Plugin URI: http://tamias.co.jp/
Description: 相対パス
Version: 1.0
Author: TAMIAS LLC.
Author URI: http://tamias.co.jp/
*/



	//相対パスに変更
		class relative_URI {
				    function relative_URI() {
				        add_action('get_header', array(&$this, 'get_header'), 1);
				        add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
				    }
				    function replace_relative_URI($content) {
				        $home_url = trailingslashit(get_home_url('/'));
				        return str_replace($home_url, '/', $content);
				    }
				    function get_header(){
				        ob_start(array(&$this, 'replace_relative_URI'));
				    }
				    function wp_footer(){
				        ob_end_flush();
				    }
				}
		new relative_URI();
		
		
?>