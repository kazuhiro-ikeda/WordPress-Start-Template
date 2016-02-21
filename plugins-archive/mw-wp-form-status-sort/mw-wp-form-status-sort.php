<?php
/**
 * Plugin Name: MW WP Form Status Sort
 * Description: MW WP Form 問い合わせデータ一覧画面で対応状況でのソートを可能にするアドオン
 * Version: 1.0.0
 * Author: Takashi Kitajima
 * Author URI: http://2inc.org
 * Created : February 14, 2016
 * Modified:
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
class MW_WP_Form_Status_Sort {

	public function __construct() {
		register_activation_hook( __FILE__, array( __CLASS__, 'activation' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ), 11 );
	}

	/**
	 * 有効化した時の処理
	 * 問い合わせデータのメタデータの初期値を保存
	 */
	public static function activation() {
		$post_types = self::get_post_types();
		foreach ( $post_types as $post_type ) {
			$posts = get_posts( array(
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'meta_query'     => array(
					array(
						'key'     => MWF_config::CONTACT_DATA_NAME,
						'compare' => 'NOT EXISTS',
					),
				),
			) );
			foreach ( $posts as $post ) {
				$Contact_Data_Setting = new MW_WP_Form_Contact_Data_Setting( $post->ID );
				$Contact_Data_Setting->save();
			}
		}
	}

	/**
	 * 管理画面での処理
	 */
	public function admin_init() {
		$post_types = self::get_post_types();
		foreach ( $post_types as $post_type ) {
			add_action(
				'admin_head',
				array( $this, 'admin_head' )
			);
			add_filter(
				'manage_edit-' . $post_type . '_sortable_columns',
				array( $this, 'sortable_columns' )
			);
			add_filter(
				'pre_get_posts',
				array( $this, 'pre_get_posts' )
			);
		}
	}

	/**
	 * 管理画面のスタイル調整
	 */
	public function admin_head() {
		?>
		<style>
		.widefat th.sortable, .widefat th.sorted {
			min-width: 100px;
		}
		</style>
		<?php
	}

	/**
	 * 並び替え
	 *
	 * @param WP_Query
	 */
	public function pre_get_posts( $query ) {
		if ( !$query->is_main_query() ) {
			return;
		}
		if ( !isset( $_GET['orderby'] ) || $_GET['orderby'] !== 'response_status' ) {
			return;
		}

		$query->set( 'orderby', 'meta_value' );
		$query->set( 'meta_query', array(
			'relation' => 'OR',
			array(
				'key'     => MWF_config::CONTACT_DATA_NAME,
				'compare' => 'EXISTS',
			),
			array(
				'key'     => MWF_config::CONTACT_DATA_NAME,
				'compare' => 'NOT EXISTS',
			),
		) );
	}

	/**
	 * ソート対象のカラムを追加
	 *
	 * @param array $sortable_column ソート対象カラムの配列
	 * @return array
	 */
	public function sortable_columns( $sortable_columns ) {
		$sortable_columns['response_status'] = 'response_status';
		return $sortable_columns;
	}

	/**
	 * 問い合わせデータの投稿タイプを返す
	 *
	 * @return array
	 */
	protected static function get_post_types() {
		$_post_types = get_post_types( array(
			'public'  => false,
			'show_ui' => true,
		) );
		$post_types = array();
		foreach ( $_post_types as $post_type ) {
			if ( preg_match( '/^' . MWF_Config::DBDATA . '\d+$/', $post_type ) ) {
				$post_types[] = $post_type;
			}
		}
		return $post_types;
	}
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mw-wp-form/mw-wp-form.php' ) ) {
	$MW_WP_Form_Status_Sort = new MW_WP_Form_Status_Sort();
}
