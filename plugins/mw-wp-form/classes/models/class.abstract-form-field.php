<?php
/**
 * Name       : MW WP Form Abstract Form Field
 * Description: フォームフィールドの抽象クラス
 * Version    : 1.7.0
 * Author     : Takashi Kitajima
 * Author URI : http://2inc.org
 * Created    : December 14, 2012
 * Modified   : January 2, 2015
 * License    : GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
abstract class MW_WP_Form_Abstract_Form_Field extends MW_Form_Field {
}
abstract class MW_Form_Field {

	/**
	 * $shortcode_name
	 * @var string 
	 */
	protected $shortcode_name;

	/**
	 * $display_name
	 * @var string
	 */
	protected $display_name;

	/**
	 * $Form
	 * @var MW_WP_Form_Form
	 */
	protected $Form;

	/**
	 * $defaults
	 * 属性値等初期値
	 * @var array
	 */
	protected $defaults = array();

	/**
	 * $atts
	 * 属性値
	 * @var array
	 */
	protected $atts = array();

	/**
	 * $Error
	 * エラーオブジェクト
	 * @var Error
	 */
	protected $Error;

	/**
	 * $form_key
	 * フォーム識別子
	 * @var string
	 */
	protected $form_key;

	/**
	 * $type
	 * フォームタグの種類 input|select|button|error|other
	 * @var string
	 */
	protected $type = 'other';

	/**
	 * $qtags
	 * qtagsの引数
	 * @var array
	 */
	protected $qtags = array(
		'id'      => '',
		'display' => '',
		'arg1'    => '',
		'arg2'    => '',
	);

	/**
	 * __construct
	 */
	public function __construct() {
		$parent_class = get_parent_class( $this );
		$class        = get_class( $this );
		if ( is_admin() && in_array( 'MW_Form_Field', array( $parent_class, $class ) ) ) {
			MWF_Functions::deprecated_message(
				'MW_Form_Field',
				'MW_WP_Form_Abstract_Form_Field'
			);
		}
		$this->_set_names();
		// 後方互換
		if ( method_exists( $this, 'setDefaults' ) ) {
			MWF_Functions::deprecated_message(
				'MW_Form_Field::setDefaults()',
				'MW_WP_Form_Abstract_Form_Field::set_defaults()'
			);
			$this->defaults = $this->setDefaults();
		} else {
			$this->defaults = $this->set_defaults();
		}
		$this->_add_mwform_tag_generator();
		add_action( 'mwform_add_shortcode', array( $this, 'add_shortcode' ), 10, 4 );
		add_filter( 'mwform_form_fields'  , array( $this, 'mwform_form_fields' ) );
	}

	/**
	 * set_names
	 * shortcode_name、display_nameを定義。各子クラスで上書きする。
	 * @return array shortcode_name, display_name
	 */
	protected function set_names() {
		return array(
			'shortcode_name' => $this->shortcode_name,
			'display_name'   => $this->display_name,
		);
	}
	private function _set_names() {
		$args = $this->set_names();
		$this->shortcode_name = $args['shortcode_name'];
		$this->display_name   = $args['display_name'];
	}

	/**
	 * set_qtags
	 * @param string $id
	 * @param string $display
	 * @param string $arg1 開始タグ（ショートコード）
	 * @param string $arg2 終了タグ（ショートコード）
	 */
	protected function set_qtags( $id, $display, $arg1, $arg2 = '' ) {
		MWF_Functions::deprecated_message(
			'MW_Form_Field::set_qtags()',
			'MW_WP_Form_Abstract_Form_Field::set_names()'
		);
		$this->qtags = array(
			'id'      => $id,
			'display' => $display,
			'arg1'    => $arg1,
			'arg2'    => $arg2,
		);
	}

	/**
	 * get_error
	 * @param  string $key name属性
	 * @return string エラーHTML
	 */
	protected function get_error( $key ) {
		$_ret = '';
		if ( is_array( $this->Error->get_error( $key ) ) ) {
			$start_tag = '<span class="error">';
			$end_tag   = '</span>';
			foreach ( $this->Error->get_error( $key ) as $rule => $error ) {
				$rule = strtolower( $rule );
				$error = apply_filters(
					'mwform_error_message_' . $this->form_key,
					$error,
					$key,
					$rule
				);
				$error_html = apply_filters( 'mwform_error_message_html',
					$start_tag . esc_html( $error ) . $end_tag,
					$error,
					$start_tag,
					$end_tag,
					$this->form_key,
					$key,
					$rule
				);
				$_ret .= $error_html;
			}
		}
		if ( $_ret ) {
			return apply_filters( 'mwform_error_message_wrapper', $_ret, $this->form_key );
		}
	}
	protected function getError( $key ) {
		MWF_Functions::deprecated_message(
			'MW_Form_Field::getError()',
			'MW_WP_Form_Abstract_Form_Field::get_error()'
		);
		return $this->get_error( $key );
	}

	/**
	 * set_defaults
	 * $this->defaultsを設定し返す
	 * @return array defaults
	 */
	protected function set_defaults() {
		// 本当は abstract。後方互換のためしてない。
	}

	/**
	 * input_page
	 * 入力ページでのフォーム項目を返す
	 * @param array $atts
	 * @return string HTML
	 */
	protected function input_page() {
		// 本当は abstract。後方互換のためしてない。
	}
	public function _input_page( $atts ) {
		if ( isset( $this->defaults['value'], $atts['name'] ) && !isset( $atts['value'] ) ) {
			$atts['value'] = apply_filters(
				'mwform_value_' . $this->form_key,
				$this->defaults['value'],
				$atts['name']
			);
		}
		$this->atts = shortcode_atts( $this->defaults, $atts );
		// 後方互換
		if ( method_exists( $this, 'inputPage' ) ) {
			MWF_Functions::deprecated_message(
				'MW_Form_Field::inputPage()',
				'MW_WP_Form_Abstract_Form_Field::input_page()'
			);
			return $this->inputPage();
		}
		return $this->input_page();
	}

	/**
	 * confirm_page
	 * 確認ページでのフォーム項目を返す
	 * @param array $atts
	 * @return string HTML
	 */
	protected function confirm_page() {
		// 本当は abstract。後方互換のためしてない。
	}
	public function _confirm_page( $atts ) {
		$this->atts = shortcode_atts( $this->defaults, $atts );
		// 後方互換
		if ( method_exists( $this, 'confirmPage' ) ) {
			MWF_Functions::deprecated_message(
				'MW_Form_Field::confirmPage()',
				'MW_WP_Form_Abstract_Form_Field::confirm_page()'
			);
			return $this->confirmPage();
		}
		return $this->confirm_page();
	}

	/**
	 * add_shortcode
	 * フォーム項目を返す
	 * @param MW_WP_Form_Form $Form
	 * @param string $view_flg
	 * @param MW_WP_Form_Error $Error
	 * @param string $form_key
	 */
	public function add_shortcode( MW_WP_Form_Form $Form, $view_flg, MW_WP_Form_Error $Error, $form_key ) {
		if ( !empty( $this->shortcode_name ) ) {
			$this->Form     = $Form;
			$this->Error    = $Error;
			$this->form_key = $form_key;
			switch( $view_flg ) {
				case 'input' :
					add_shortcode( $this->shortcode_name, array( $this, '_input_page' ) );
					break;
				case 'confirm' :
					add_shortcode( $this->shortcode_name, array( $this, '_confirm_page' ) );
					break;
				case 'complete' :
					break;
				default :
					exit( '$view_flg is not right value. $view_flg is ' . $view_flg . ' now.' );
			}
		}
	}

	/**
	 * get_children
	 * 選択肢の配列を返す（:が含まれている場合は分割して前をキーに、後ろを表示名にする）
	 * @param string $_children
	 * @return array $children
	 */
	public function get_children( $_children ) {
		$children = array();
		if ( !empty( $_children ) && !is_array( $_children ) ) {
			$_children = explode( ',', $_children );
		}
		if ( is_array( $_children ) ) {
			$_children = array_map( 'trim', $_children );
			foreach ( $_children as $child ) {
				$child = array_map( 'trim', explode( ':', $child, 2 ) );
				if ( count( $child ) === 1 ) {
					$children[$child[0]] = $child[0];
				} else {
					$children[$child[0]] = $child[1];
				}
			}
		}
		if ( $this->form_key ) {
			$children = apply_filters( 'mwform_choices_' . $this->form_key, $children, $this->atts );
		}
		return $children;
	}
	public function getChildren( $_children ) {
		MWF_Functions::deprecated_message(
			'MW_Form_Field::getChildren()',
			'MW_WP_Form_Abstract_Form_Field::get_children()'
		);
		return $this->get_children( $_children );
	}

	/**
	 * _add_mwform_tag_generator
	 * フォームタグジェネレータのタグ選択肢とダイアログを設定
	 */
	protected function _add_mwform_tag_generator() {
		add_action( 'mwform_tag_generator_dialog', array( $this, 'add_mwform_tag_generator' ) );
		if ( $this->type !== 'other' ) {
			$tag = 'mwform_tag_generator_' . $this->type . '_option';
		} else {
			$tag = 'mwform_tag_generator_option';
		}
		add_action( $tag, array( $this, 'mwform_tag_generator_option' ) );
	}

	/**
	 * add_mwform_tag_generator
	 * タグジェネレータのダイアログ枠を出力
	 */
	public function add_mwform_tag_generator() {
		?>
		<div id="dialog-<?php echo esc_attr( $this->shortcode_name ); ?>" class="mwform-dialog" title="<?php echo esc_attr( $this->shortcode_name ); ?>">
			<div class="form">
				<?php $this->mwform_tag_generator_dialog(); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * add_mwform_tag_generator
	 * タグジェネレータのダイアログを出力。各フォーム項目クラスでオーバーライド
	 */
	public function mwform_tag_generator_dialog( array $options = array() ) {}

	/**
	 * mwform_tag_generator_option
	 * フォームタグ挿入ボタンのセレクトボックスに選択項目を追加
	 */
	public function mwform_tag_generator_option() {
		$display_name = $this->qtags['display'];
		if ( $this->display_name ) {
			$display_name = $this->display_name;
		}
		?>
		<option value="<?php echo esc_attr( $this->shortcode_name ); ?>"><?php echo esc_html( $display_name ); ?></option>
		<?php
	}

	/**
	 * mwform_form_fields
	 * @param array $form_fields MW_WP_Form_Abstract_Form_Field を継承したオブジェクトの一覧
	 * @return array $form_fields
	 */
	public function mwform_form_fields( array $form_fields ) {
		$form_fields = array_merge( $form_fields, array( $this->shortcode_name => $this ) );
		return $form_fields;
	}

	/**
	 * get_display_name
	 * @return string 表示名
	 */
	public function get_display_name() {
		return $this->display_name;
	}

	/**
	 * get_shortcode_name
	 * @return string ショートコード名
	 */
	public function get_shortcode_name() {
		return $this->shortcode_name;
	}

	/**
	 * get_value_for_generator
	 * MW WP Fomr Generator 用
	 */
	public function get_value_for_generator( $key, $options ) {
		$attributes = array_keys( $this->defaults );
		$add_allow_attributes = array(
			'mw-wp-form-generator-notes',
			'mw-wp-form-generator-display-name'
		);
		$attributes = array_merge( $attributes, $add_allow_attributes );
		$attributes = array_flip( $attributes );
		if ( isset( $attributes[$key] ) ) {
			if ( isset( $options[$key] ) ) {
				return $options[$key];
			} else {
				return '';
			}
		}
	}
}
