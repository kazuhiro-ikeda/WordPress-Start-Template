<?php
/**
 * Name       : MW WP Form Validation Rule AlphaNumeric
 * Description: 値が英数字
 * Version    : 1.1.0
 * Author     : Takashi Kitajima
 * Author URI : http://2inc.org
 * Created    : July 21, 2014
 * Modified   : December 31, 2014
 * License    : GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
class MW_WP_Form_Validation_Rule_AlphaNumeric extends MW_WP_Form_Abstract_Validation_Rule {

	/**
	 * $name
	 * バリデーションルール名を指定
	 * @var string
	 */
	protected $name = 'alphanumeric';

	/**
	 * rule
	 * @param string $key name属性
	 * @param array $option
	 * @return string エラーメッセージ
	 */
	public function rule( $key, array $options = array() ) {
		$value = $this->Data->get( $key );
		if ( !is_null( $value ) && !MWF_Functions::is_empty( $value ) ) {
			if ( !preg_match( '/^[0-9A-Za-z]+$/', $value ) ) {
				$defaults = array(
					'message' => __( 'Please enter with a half-width alphanumeric character.', MWF_Config::DOMAIN )
				);
				$options = array_merge( $defaults, $options );
				return $options['message'];
			}
		}
	}

	/**
	 * admin
	 * @param numeric $key バリデーションルールセットの識別番号
	 * @param array $value バリデーションルールセットの内容
	 */
	public function admin( $key, $value ) {
		?>
		<label><input type="checkbox" <?php checked( $value[$this->getName()], 1 ); ?> name="<?php echo MWF_Config::NAME; ?>[validation][<?php echo $key; ?>][<?php echo esc_attr( $this->getName() ); ?>]" value="1" /><?php esc_html_e( 'Alphabet and Numeric', MWF_Config::DOMAIN ); ?></label>
		<?php
	}
}