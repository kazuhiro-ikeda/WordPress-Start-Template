<?php
/**
 * Name       : MW WP Form Validation Rule Akismet
 * Description: Akismetのエラー。常にtrue
 * Version    : 1.1.0
 * Author     : Takashi Kitajima
 * Author URI : http://2inc.org
 * Created    : July 21, 2014
 * Modified   : December 31, 2014
 * License    : GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
class MW_WP_Form_Validation_Rule_Akismet extends MW_WP_Form_Abstract_Validation_Rule {

	/**
	 * $name
	 * バリデーションルール名を指定
	 * @var string
	 */
	protected $name = 'akismet_check';

	/**
	 * rule
	 * @param string $key name属性
	 * @param array $option
	 * @return string エラーメッセージ
	 */
	public function rule( $key, array $options = array() ) {
		$defaults = array(
			'message' => __( 'The contents which you input were judged with spam.', MWF_Config::DOMAIN )
		);
		$options = array_merge( $defaults, $options );
		return $options['message'];
	}

	/**
	 * admin
	 * @param numeric $key バリデーションルールセットの識別番号
	 * @param array $value バリデーションルールセットの内容
	 */
	public function admin( $key, $value ) {
	}
}