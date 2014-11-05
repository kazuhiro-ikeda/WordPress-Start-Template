<?php

	//エディタのスタイル
	add_editor_style('editor-style.css');

	// サイトIDタグ
	function diverge_site_id() {
		if (is_front_page()) {
			echo "h1";
			} else {
				echo "div";
				}
			}
	function diverge_tagline() {
		if (is_front_page()) {
			echo "h2";
			} else {
				echo "div";
				}
			}

	//even and odd addc class
	function oddeven_post_class ( $classes ) {
		global $current_class;
		$classes[] = $current_class;
		$current_class = ($current_class == 'odd') ? 'even' : 'odd';
		return $classes;
	}
	add_filter ( 'post_class' , 'oddeven_post_class' );
		global $current_class;
		$current_class = 'odd';

	//最初と最後の要素
	function isFirst(){
		global $wp_query;
		return ($wp_query->current_post === 0);
	}
	function isLast(){
		global $wp_query;
		return ($wp_query->current_post+1 === $wp_query->post_count);
	}
	
	// タイトルタグのテキストを出力
	function full_title() {
		if (!is_front_page()) {
			echo trim(wp_title('', false)) . " | ";
			} 
			bloginfo('name');
		}
	
	//body にスラッグを追加
		function getLoopCount(){
			global $wp_query;
			return $wp_query->current_post+1;
			}
		function pagename_class($classes = '') {
			if (is_page()) {
			$page = get_page(get_the_ID());
			$classes[] = 'page-' . $page->post_name;
			if ($page->post_parent) {
			$classes[] = 'page-' . get_page_uri($page->post_parent) . '-child';
			}
		}
			return $classes;
		}
		add_filter('body_class', 'pagename_class');

	//不要なタグを表示しない
		remove_action('wp_head', 'wp_generator');

		remove_action('wp_head', 'rsd_link');

		remove_action('wp_head', 'wlwmanifest_link');

		remove_action('wp_head', 'feed_links_extra', 3 );

		remove_action('wp_head', 'feed_links', 2 );
			
?>