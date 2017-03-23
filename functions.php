<?php
	
	//カテゴリ選択制限
	add_action( 'admin_print_footer_scripts', 'limit_category_select' );
	function limit_category_select() {
		?>
		<script type="text/javascript">
			jQuery(function($) {
				// 投稿画面のカテゴリー選択を制限
				var cat_checklist = $('.categorychecklist input[type=checkbox]');
				cat_checklist.click( function() {
					$(this).parents('.categorychecklist').find('input[type=checkbox]').attr('checked', false);
					$(this).attr('checked', true);
				});
				
				// クイック編集のカテゴリー選択を制限
				var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
				quickedit_cat_checklist.click( function() {
					$(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
					$(this).attr('checked', true);
				});
			    
				$('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before('<p style="padding-top:5px;">カテゴリーは1つしか選択できません</p>');
			});
		</script>
		<?php
	}
	//カテゴリ選択制限ここまで
	
	
	//スラッグ強制
	function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
	    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
	        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
	    }
	    return $slug;
	}
	add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );
	
	
	//ビジュアルエディタの非表示
	function disable_visual_editor_in_page(){
		global $typenow;
		if( $typenow == 'mw-wp-form' ){
			add_filter('user_can_richedit', 'disable_visual_editor_filter');
		}
	}
	function disable_visual_editor_filter(){
		return false;
	}
	add_action( 'load-post.php', 'disable_visual_editor_in_page' );
	add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );
	
	/*//カスタム投稿タイプ表示数
	add_action('pre_get_posts', 'xxx_pre_get_posts');
	function xxx_pre_get_posts($query) {
	    if (!is_admin() && $query->is_main_query() && is_post_type_archive('xxx')) {
	        $query->set('posts_per_page', 9);
	    }
	}*/
	
	/*//検索対象の指定
	function SearchFilter($query) {
	  if ($query->is_search) {
	    $query->set('post_type', 'xxx');
	  }
	  return $query;
	}
	add_filter('pre_get_posts','SearchFilter');*/
	
	/*//カスタムフィールド sarch query URL
	add_filter( 'query_vars', 'url_query_vars' );
	function url_query_vars( $public_query_vars ) {
	    return array_merge( $public_query_vars, array( 'meta_key', 'meta_value' ) );
	}*/
	
	//Google API
	function my_acf_init() {
	
		acf_update_setting('google_api_key', 'AIzaSyBe4ErGSJnXnoiNV1UcvmXrHNe0ke9Bpgg');
	}
	
	add_action('acf/init', 'my_acf_init');
	
	//コメント許可
	remove_filter( 'the_content', 'wptexturize' );
	
	//タブレットをモバイルから除外
	function is_mobile() {
	    $useragents = array(
	        'iPhone',          // iPhone
	        'iPod',            // iPod touch
	        'Android.*Mobile', // 1.5+ Android Only mobile
	        'Windows.*Phone',  // Windows Phone
	        'dream',           // Pre 1.5 Android
	        'CUPCAKE',         // 1.5+ Android
	        'blackberry9500',  // Storm
	        'blackberry9530',  // Storm
	        'blackberry9520',  // Storm v2
	        'blackberry9550',  // Storm v2
	        'blackberry9800',  // Torch
	        'webOS',           // Palm Pre Experimental
	        'incognito',       // Other iPhone browser
	        'webmate'          // Other iPhone browser
	    );
	    $pattern = '/'.implode('|', $useragents).'/i';
	    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
	}
		
	//管理画面スラッグ表示
	function add_page_columns_name($columns) {
    $columns['slug'] = "スラッグ";
    return $columns;
	}
	function add_page_column($column_name, $post_id) {
	    if( $column_name == 'slug' ) {
	        $post = get_post($post_id);
	        $slug = $post->post_name;
	        echo attribute_escape($slug);
	    }
	}
	add_filter( 'manage_pages_columns', 'add_page_columns_name' );
	add_action( 'manage_pages_custom_column', 'add_page_column', 10, 2);

	//抜粋文の長さ
	function custom_excerpt_length( $length ) {
     return 48;	
	}	
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999);
	
	//read more リンク
	function new_excerpt_more( $more ) {
	return '<br><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">続きを見る→</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	
	//エディタのスタイル
	add_editor_style( 'editor-style.css' );

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
	
	//子ページ条件判定
	function is_subpage( $pagename ) {
	  if ( is_page() ) { //固定ページである。
	    global $post;
	    if ( $post->ancestors ) { //誰かのサブページである。
	      $root = $post->ancestors[count($post->ancestors) - 1]; //配列の一番後ろが一番上の親。
	      $root_post = get_post( $root );
	      $name = esc_attr( $root_post->post_name );
	      if ( $pagename == $name ) return true;
	    }
	  }
	  return false;
	}
	
	// タイトルタグのテキストを出力
	function full_title() {
		if (!is_front_page()) {
			echo trim(wp_title('', false)) . " | ";
		} 
		
		bloginfo( 'name' );
	}
	
	//body にスラッグを追加
	function getLoopCount(){
		global $wp_query;
		return $wp_query->current_post+1;
		}
	function pagename_class($classes = '' ) {
		if (is_page()) {
		$page = get_page(get_the_ID());
		$classes[] = 'page-' . $page->post_name;
		if ($page->post_parent) {
		$classes[] = 'page-' . get_page_uri($page->post_parent) . '-child';
		}
	}
		return $classes;
	}
	add_filter( 'body_class', 'pagename_class' );
		
	//アイキャッチ画像の有効化
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'VGA', 640, 480, true);
	add_image_size( 'ランドスケープM', 320, 240, true);
	add_image_size( 'ランドスケープS', 160, 120, true);
	add_image_size( 'ポートレートM', 240, 320, true);
	add_image_size( 'ポートレートS', 120, 160, true);
		
	//カテゴリをID順に取得
	function get_the_category_orderby_parent( $categories ) {
	    usort( $categories, '_usort_terms_by_ID' );
	    return $categories;
	}
	add_filter( 'get_the_categories', 'get_the_category_orderby_parent' );
		
	//エディタで ファイルをインクルード [inc_php file='hoge']
	function include_php($params = array()) {
	    extract(shortcode_atts(array(
	        'file' => 'default'
	    ), $params));
	    ob_start();
	    include(get_theme_root() . '/' . get_template() . "/parts/$file.php");
	    return ob_get_clean();
	}
	add_shortcode('inc_php', 'include_php');

	//不要なメタタグを表示しない
	remove_action( 'wp_head', 'wp_generator' );

	remove_action( 'wp_head', 'rsd_link' );

	remove_action( 'wp_head', 'wlwmanifest_link' );

	remove_action( 'wp_head', 'feed_links_extra', 3);

	remove_action( 'wp_head', 'feed_links', 2);
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
			
?>