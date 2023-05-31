<?php
/***** [start] remove unusable sections in customizer*****/
add_action( 'customize_register', 'arc_customize_deregister', 11);
function arc_customize_deregister($wp_customize){
	$wp_customize->remove_section('custom_css');
	$wp_customize->remove_section('header_image');
	/*$wp_customize->remove_panel('widgets');*/
	$wp_customize->remove_section('static_front_page');
		/*echo "<pre>";
		print_r($wp_customize);
		echo "</pre>";*/
}
add_action('customize_register', 'arc_customize_deregister_woocommerce', 99999);
function arc_customize_deregister_woocommerce($wp_customize){
	$wp_customize->remove_section('woocommerce_store_notice');
	$wp_customize->remove_section('woocommerce_product_catalog');
	$wp_customize->remove_section('woocommerce_product_images');
	$wp_customize->remove_control('woocommerce_checkout_address_2_field');
	$wp_customize->remove_control('woocommerce_checkout_terms_and_conditions_checkbox_text');
	$wp_customize->remove_control('woocommerce_checkout_privacy_policy_text');
	$wp_customize->remove_control('woocommerce_terms_page_id');
	$wp_customize->remove_control('woocommerce_checkout_highlight_required_fields');
	$wp_customize->get_section('woocommerce_checkout')->title = 'Billing Details';
	$wp_customize->get_section('woocommerce_checkout')->description = '';
	$wp_customize->remove_control('woocommerce_checkout_company_field');

	$wp_customize->remove_control('woocommerce_checkout_phone_field');
	$wp_customize->get_control('wp_page_for_privacy_policy')->priority = 40;
	$wp_customize->get_control('wp_page_for_privacy_policy')->section = 'section_billing_details';
	$wp_customize->remove_section('woocommerce_checkout');
}
/***** [end] remove unusable sections*****/

/*** [start] rename customize settings***/
add_action('customize_register', 'change_default_customize_settings');
function change_default_customize_settings($wp_customize) {
	$wp_customize->get_control('custom_logo')->label = 'Site logo';
	$wp_customize->get_control('custom_logo')->priority = 2;
	$wp_customize->get_control('custom_logo')->active_callback = 'set_custom_logo_on_site';

	$wp_customize->get_control('blogname')->label = 'Site title';
	$wp_customize->get_control('site_icon')->label = 'Site icon';
	$wp_customize->get_control('display_header_text')->label = 'Display the site title and tagline';

	$wp_customize->get_setting('custom_logo')->transport = 'refresh';
	$wp_customize->get_control('background_color')->label = 'Primary background color';
	$wp_customize->get_control('background_color')->priority = 2;
	$wp_customize->get_control('header_textcolor')->label = 'Site Title and Tagline text color';
	$wp_customize->get_section('background_image')->priority = 41;
	$wp_customize->get_section('colors')->title = 'Theme Colors';
	$wp_customize->get_setting('background_color')->transport = 'refresh';
	$wp_customize->get_setting('display_header_text')->transport = 'refresh';
	$wp_customize->get_control('site_icon')->description = 'Site icons are what you see in browser tabs, bookmark bars, and within WordPress mobile apps.<br><br>Site Icons should be square and at least 512 × 512 pixels.';

	if ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#004347';
		$secondaryBack = '#003538';
		$boxedLayout = '#003033';
		$menuColor = '#ffffff';
		$primaryColor = '#005055';
		$secondaryColor = '#003c42';
		$primaryBtnColor = '#35ff56';
		$secondaryBtnColor = '#2edb56';
		$iconColor = '#35ff56';
		$inputColor = '#003538';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//teens
	if ('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#002e4d';
		$secondaryBack = '#001e32';
		$boxedLayout = '#001d33';
		$menuColor = '#ffffff';
		$primaryColor = '#003f69';
		$secondaryColor = '#00375b';
		$primaryBtnColor = '#ff2552';
		$secondaryBtnColor = '#e02154';
		$iconColor = '#ff2552';
		$inputColor = '#001e32';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#1b0439';
		$secondaryBack = '#100025';
		$boxedLayout = '#0e001e';
		$menuColor = '#ffffff';
		$primaryColor = '#2e0c59';
		$secondaryColor = '#18013a';
		$primaryBtnColor = '#18ffc8';
		$secondaryBtnColor = '#13dbc0';
		$iconColor = '#18ffc8';
		$inputColor = '#100025';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	if ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#640030';
		$secondaryBack = '#520027';
		$boxedLayout = '#330016';
		$menuColor = '#ffffff';
		$primaryColor = '#8a0042';
		$secondaryColor = '#660038';
		$primaryBtnColor = '#ffc700';
		$secondaryBtnColor = '#d1a300';
		$iconColor = '#ffc700';
		$inputColor = '#520027';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#e4c1d2';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#e4c1d2';
	}
	//gay
	if ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#0e245b';
		$secondaryBack = '#031748';
		$boxedLayout = '#051238';
		$menuColor = '#ffffff';
		$primaryColor = '#1d3075';
		$secondaryColor = '#0c1c60';
		$primaryBtnColor = '#18f1ff';
		$secondaryBtnColor = '#14d7e5';
		$iconColor = '#18f1ff';
		$inputColor = '#031748';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//pornx default
	if ('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#172030';
		$secondaryBack = '#0f1725';
		$boxedLayout = '#181c26';
		$menuColor = '#ffffff';
		$primaryColor = '#1e2739';
		$secondaryColor = '#242f4c';
		$primaryBtnColor = '#c32ce2';
		$secondaryBtnColor = '#aa2cc4';
		$iconColor = '#c32ce2';
		$inputColor = '#0f1725';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//trans
	if ('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#3f0303';
		$secondaryBack = '#330000';
		$boxedLayout = '#260000';
		$menuColor = '#ffffff';
		$primaryColor = '#550000';
		$secondaryColor = '#3d0000';
		$primaryBtnColor = '#0052ce';
		$secondaryBtnColor = '#0045a0';
		$iconColor = '#0052ce';
		$inputColor = '#330000';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#ccb2b2';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#ccb2b2';
	}
	//fetish
	if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#131313';
		$secondaryBack = '#000000';
		$boxedLayout = '#0a0a0a';
		$menuColor = '#ffffff';
		$primaryColor = '#1d1d1d';
		$secondaryColor = '#444444';
		$primaryBtnColor = '#e83008';
		$secondaryBtnColor = '#c62f05';
		$iconColor = '#e83008';
		$inputColor = '#000000';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//porn light
	if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#e5e5e5';
		$secondaryBack = '#d0d0d0';
		$boxedLayout = '#9b9b9b';
		$menuColor = '#383838';
		$primaryColor = '#d8d8d8';
		$secondaryColor = '#b2b2b2';
		$primaryBtnColor = '#8f07ab';
		$secondaryBtnColor = '#c32ce2';
		$iconColor = '#8f07ab';
		$inputColor = '#d0d0d0';
		$activeLinkColor = '#111111';
		$passiveLinkColor = '#6e6e6e';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#0a0a0a';
	}

	$wp_customize->get_setting('background_color')->default = $primaryBack; //Primary background color
	$wp_customize->get_setting('secondary_background_color')->default = $secondaryBack; //Secondary background color
	$wp_customize->get_setting('boxed_layout_background')->default = $boxedLayout; //Boxed layout background
	$wp_customize->get_setting('menu_color')->default = $menuColor; //Menu color
	$wp_customize->get_setting('primary_color_setting')->default = $primaryColor; //Primary color
	$wp_customize->get_setting('secondary_color_setting')->default = $secondaryColor; //Secondary color
	$wp_customize->get_setting('btn_color_setting')->default = $primaryBtnColor; //Primary button color
	$wp_customize->get_setting('btn_hover_color_setting')->default = $secondaryBtnColor; //Secondary button color
	$wp_customize->get_setting('icons_color_setting')->default = $iconColor; //Icon color
	$wp_customize->get_setting('input_color')->default = $inputColor; //Input color
	$wp_customize->get_setting('links_color_setting')->default = $activeLinkColor; //Active link color
	$wp_customize->get_setting('passive_color_setting')->default = $passiveLinkColor; //Passive link color
	$wp_customize->get_setting('text_site_color')->default = $primaryTextColor; //Primary text color
	$wp_customize->get_setting('secondary_text_site_color')->default = $secondaryTextColor; //Secondary text color
}/*** [end] rename customize settings***/

/** [start] TinyMCE Editor in Customizer**/
if (class_exists('WP_Customize_Control')) {
	class Text_Editor_Custom_Control extends WP_Customize_Control {
		function __construct($manager, $id, $options) {
			parent::__construct($manager, $id, $options);

			global $num_customizer_teenies_initiated;
			$num_customizer_teenies_initiated = empty($num_customizer_teenies_initiated)
				? 1
				: $num_customizer_teenies_initiated + 1;
		}
		function render_content() {
			global $num_customizer_teenies_initiated, $num_customizer_teenies_rendered;
			$num_customizer_teenies_rendered = empty($num_customizer_teenies_rendered)
				? 1
				: $num_customizer_teenies_rendered + 1;

			$value = $this->value();
			?>
			<label>
				<span class="customize-text_editor"><?php echo esc_html($this->label); ?></span>
				<input id="<?php echo $this->id ?>-link" class="wp-editor-area" type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea($value); ?>">
				<?php
				wp_editor($value, $this->id, [
					'textarea_name' => $this->id,
					'media_buttons' => false,
					'drag_drop_upload' => false,
					'teeny' => false,
					'quicktags' => false,
					'textarea_rows' => 5,
					'tinymce' => [
						'setup' => "function (editor) {
						  var cb = function () {
							var linkInput = document.getElementById('$this->id-link')
							linkInput.value = editor.getContent()
							linkInput.dispatchEvent(new Event('change'))
						  }
						  editor.on('Change', cb)
						  editor.on('Undo', cb)
						  editor.on('Redo', cb)
						  editor.on('KeyUp', cb)
						}"
					]
				]);
				?>
			</label>
			<?php
			if ($num_customizer_teenies_rendered == $num_customizer_teenies_initiated)
				do_action('admin_print_footer_scripts');
		}
	}
}/** [end] TinyMCE Editor in Customizer**/

/****[start] add Range element to customizer***/
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';
if(class_exists('WP_Customize_Control')) {
	/***only html****/
	class WP_Customize_Simple_Html extends WP_Customize_Control {
		public $type = 'html';
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$args = wp_parse_args( $args);
		}
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><i><?php echo $this->label; ?></i></span>
			</label>
			<?php
		}
	}

	/***only html description****/
	class WP_Customize_Simple_Html_Desc extends WP_Customize_Control {
		public $type = 'html';
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$args = wp_parse_args( $args);
		}
		public function render_content() {
			?>
			<p>
				<span class="description customize-control-description"><i><?php echo $this->label; ?></i></span>
			</p>
			<?php
		}
	}

	class WP_Customize_Range_Back extends WP_Customize_Control {
		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 63
			);
			$args = wp_parse_args( $args, $defaults );

			$this->min = $args['min'];
			$this->max = $args['max'];
			$this->step = $args['step'];
			$this->default = $args['default'];
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="customize-control-desc"><i><?php echo '1-100%' ?></i></span><br>
				<input id="range-back-op" class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>
				<input class="button" onclick="
					jQuery(this).prev('input').val(<?php echo $this->default;?>);
					jQuery('input#range-back-op').val(<?php echo $this->default;?>);
					jQuery('iframe').contents().find('#some_div').css('opacity', <?php echo $this->default;?> + '%');
					" type='button' value="Default" />
			</label>
			<?php
		}
	}

	class WP_Customize_Range_Blur extends WP_Customize_Control {
		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 8
			);
			$args = wp_parse_args( $args, $defaults );

			$this->min = $args['min'];
			$this->max = $args['max'];
			$this->step = $args['step'];
			$this->default = $args['default'];
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="customize-control-desc"><i><?php echo '1-10px'; ?></i></span><br>
				<input id="range-back-blur" class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>
				<input class="button" onclick="
					jQuery(this).prev('input').val(<?php echo $this->default;?>);
					jQuery('input#range-back-blur').val(<?php echo $this->default;?>);
					var blurFilter = 'blur(' + <?php echo $this->default;?> + 'px)';
					jQuery('iframe').contents().find('#dclm-blur')
					.css({
					'filter': blurFilter,
					'-webkit-filter': blurFilter,
					'-moz-filter': blurFilter,
					'-o-filter': blurFilter,
					'-ms-filter': blurFilter,
					});
					" type='button' value="Default" />
			</label>
			<?php
		}
	}

	class WP_Customize_Range_Form_Opacity extends WP_Customize_Control {
		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 100
			);
			$args = wp_parse_args( $args, $defaults );

			$this->min = $args['min'];
			$this->max = $args['max'];
			$this->step = $args['step'];
			$this->default = $args['default'];
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="customize-control-desc"><i><?php echo '1-100%'; ?></i></span><br>
				<input id="range-form-op" class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>
				<input class="button" onclick="
					jQuery(this).prev('input').val(<?php echo $this->default;?>);
					jQuery('input#range-form-op').val(<?php echo $this->default;?>);
					var oldBack = jQuery('iframe').contents().find('#dclm_modal_content').css('background-color').split(',');
					var oldBack4 = <?php echo $this->default/100?>;
					var newBack = oldBack[0].replace('rgba(', '') + ',' + oldBack[1] + ',' + oldBack[2] + ', ' + oldBack4;
					jQuery('iframe').contents().find('#dclm_modal_content').attr('style', 'background-color: rgba(' + newBack + ') !important');
					" type='button' value="Default" />
			</label>
			<?php
		}
	}

	class WP_Customize_Range_Login_Back_Opacity extends WP_Customize_Control {
		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 63
			);
			$args = wp_parse_args( $args, $defaults );

			$this->min = $args['min'];
			$this->max = $args['max'];
			$this->step = $args['step'];
			$this->default = $args['default'];
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="customize-control-desc"><i><?php echo '1-100%'; ?></i></span><br>
				<input id="range-login-back-op" class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>
				<input class="button" onclick="
					jQuery(this).prev('input').val(<?php echo $this->default;?>);
					jQuery('input#range-login-back-op').val(<?php echo $this->default;?>);
					" type='button' value="Default" />
			</label>
			<?php
		}
	}

	class WP_Customize_Range_Login_Popup_Back_Opacity extends WP_Customize_Control {
		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 63
			);
			$args = wp_parse_args( $args, $defaults );

			$this->min = $args['min'];
			$this->max = $args['max'];
			$this->step = $args['step'];
			$this->default = $args['default'];
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="customize-control-desc"><i><?php echo '1-100%'; ?></i></span><br>
				<input id="range-login-popup-back-op" class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>
				<input class="button" onclick="
						jQuery(this).prev('input').val(<?php echo $this->default;?>);
						jQuery('input#range-login-popup-back-op').val(<?php echo $this->default;?>);
						" type='button' value="Default" />
			</label>
			<?php
		}
	}
} /****[end] add Range element to customizer***/

/***add settings to customize panel****/
add_action( 'customize_register', 'arc_theme_customize' );
function arc_theme_customize($wp_customize) {

	function set_custom_logo_on_site($control) {
		$value = $control->manager->get_setting('enable_demos_logos')->value();
		if ($value == 'custom') {
			return true;
		}
		return false;
	}

	/**section for choosing colors for links and buttons**/
	if ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#004347';
		$secondaryBack = '#003538';
		$boxedLayout = '#003033';
		$menuColor = '#ffffff';
		$primaryColor = '#005055';
		$secondaryColor = '#003c42';
		$primaryBtnColor = '#35ff56';
		$secondaryBtnColor = '#2edb56';
		$iconColor = '#35ff56';
		$inputColor = '#003538';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//teens
	if ('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#002e4d';
		$secondaryBack = '#001e32';
		$boxedLayout = '#001d33';
		$menuColor = '#ffffff';
		$primaryColor = '#003f69';
		$secondaryColor = '#00375b';
		$primaryBtnColor = '#ff2552';
		$secondaryBtnColor = '#e02154';
		$iconColor = '#ff2552';
		$inputColor = '#001e32';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#1b0439';
		$secondaryBack = '#100025';
		$boxedLayout = '#0e001e';
		$menuColor = '#ffffff';
		$primaryColor = '#2e0c59';
		$secondaryColor = '#18013a';
		$primaryBtnColor = '#18ffc8';
		$secondaryBtnColor = '#13dbc0';
		$iconColor = '#18ffc8';
		$inputColor = '#100025';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	if ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#640030';
		$secondaryBack = '#520027';
		$boxedLayout = '#330016';
		$menuColor = '#ffffff';
		$primaryColor = '#8a0042';
		$secondaryColor = '#660038';
		$primaryBtnColor = '#ffc700';
		$secondaryBtnColor = '#d1a300';
		$iconColor = '#ffc700';
		$inputColor = '#520027';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#e4c1d2';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#e4c1d2';
	}
	//gay
	if ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#0e245b';
		$secondaryBack = '#031748';
		$boxedLayout = '#051238';
		$menuColor = '#ffffff';
		$primaryColor = '#1d3075';
		$secondaryColor = '#0c1c60';
		$primaryBtnColor = '#18f1ff';
		$secondaryBtnColor = '#14d7e5';
		$iconColor = '#18f1ff';
		$inputColor = '#031748';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//pornx default
	if ('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#172030';
		$secondaryBack = '#0f1725';
		$boxedLayout = '#181c26';
		$menuColor = '#ffffff';
		$primaryColor = '#1e2739';
		$secondaryColor = '#242f4c';
		$primaryBtnColor = '#c32ce2';
		$secondaryBtnColor = '#aa2cc4';
		$iconColor = '#c32ce2';
		$inputColor = '#0f1725';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//trans
	if ('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#3f0303';
		$secondaryBack = '#330000';
		$boxedLayout = '#260000';
		$menuColor = '#ffffff';
		$primaryColor = '#550000';
		$secondaryColor = '#3d0000';
		$primaryBtnColor = '#0052ce';
		$secondaryBtnColor = '#0045a0';
		$iconColor = '#0052ce';
		$inputColor = '#330000';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#ccb2b2';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#ccb2b2';
	}
	//fetish
	if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#131313';
		$secondaryBack = '#000000';
		$boxedLayout = '#0a0a0a';
		$menuColor = '#ffffff';
		$primaryColor = '#1d1d1d';
		$secondaryColor = '#444444';
		$primaryBtnColor = '#e83008';
		$secondaryBtnColor = '#c62f05';
		$iconColor = '#e83008';
		$inputColor = '#000000';
		$activeLinkColor = '#ffffff';
		$passiveLinkColor = '#cccccc';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#cccccc';
	}
	//porn light
	if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
		$primaryBack = '#e5e5e5';
		$secondaryBack = '#d0d0d0';
		$boxedLayout = '#9b9b9b';
		$menuColor = '#383838';
		$primaryColor = '#d8d8d8';
		$secondaryColor = '#b2b2b2';
		$primaryBtnColor = '#8f07ab';
		$secondaryBtnColor = '#c32ce2';
		$iconColor = '#8f07ab';
		$inputColor = '#d0d0d0';
		$activeLinkColor = '#111111';
		$passiveLinkColor = '#6e6e6e';
		$primaryTextColor = '#ffffff';
		$secondaryTextColor = '#0a0a0a';
	}
	$wp_customize->get_setting('background_color')->default = $primaryBack;

	$wp_customize->add_setting( 'enable_demos_logos', [
		'default'           => 'demos',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_demos_logos', [
		'label'    => 'Displayed logo',
		'description' => 'Choosing Demo will set the selected niche\'s logo (see <a target="_blank" href="'.admin_url().'admin.php?page=my-theme-options">Theme Options</a>).
		Choosing Custom will allow you to set your own logo.',
		'section'  => 'title_tagline',
		'priority' => 1,
		'settings' => 'enable_demos_logos',
		'type'     => 'radio',
		'choices'  => [
			'demos'   => 'Demo',
			'custom'  => 'Custom',
		]
	]));

	/****add control to Colors section****/
	$wp_customize->add_setting( 'enable_demos_color_scheme', [
		'default'           => 'demos',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_demos_color_scheme', [
		'label'    => 'Color scheme',
		'description' => 'Set the site\'s color scheme. Choosing Demo will apply the selected niche\'s style (see <a target="_blank" href="'.admin_url().'admin.php?page=my-theme-options">Theme Options</a>).
		Choosing Custom will allow you to customize the site with the options below.',
		'section'  => 'colors',
		'priority' => 1,
		'settings' => 'enable_demos_color_scheme',
		'type'     => 'radio',
		'choices'  => [
			'demos'   => 'Demo',
			'custom'  => 'Custom',
		]
	] ) );
	$wp_customize->add_setting('secondary_background_color', [
			'default' => $secondaryBack,
		'transport'=> 'refresh',
	] );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'secondary_background_color', [
		'section' => 'colors',
		'settings' => 'secondary_background_color',
		'label'   => 'Secondary background color',
		'type'    => 'color',
	]));
	$wp_customize->add_setting('boxed_layout_background', [
		'default' => $boxedLayout,
		'transport'=> 'refresh',
	] );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'boxed_layout_background', [
		'section' => 'colors',
		'settings' => 'boxed_layout_background',
		'label'   => 'Boxed layout background',
		'description' => 'Shown only when the Boxed layout is set under <a target="_blank" href="'.admin_url().'admin.php?page=my-theme-options">Theme Options</a>.',
		'type'    => 'color',
	]));
	$wp_customize->add_setting('menu_color', [
		'default' => $menuColor,
		'transport'=> 'refresh',
	] );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'menu_color', [
		'section' => 'colors',
		'settings' => 'menu_color',
		'label'   => 'Main menu color',
		'type'    => 'color',
	]));
	/**** [end] add control to Colors section****/



	/**cookie**/
	{
		$wp_customize->add_section( 'arc_cookie', [
			'title'    => 'Cookie Prompt',
			'priority' => 200,
		] );
		$wp_customize->add_setting( 'show_preview_cookie', [
			'default'   => 'false',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_preview_cookie', [
			'section'     => 'arc_cookie',
			'settings'    => 'show_preview_cookie',
			'label'       => 'Show the cookie prompt preview',
			'description' => '<i>Activate only while you\'re making adjustments to the cookie prompt.</i>',
			'type'        => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'show_cookie', [
			'default'   => 'true',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_cookie', [
			'section'  => 'arc_cookie',
			'settings' => 'show_cookie',
			'label'    => 'Ask users to accept cookies',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'cookie_block_color', [
			'default'           => '#1E2739',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cookie_block_color', [
			'label'    => 'Cookie prompt background color',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_block_color',
			'type'     => 'color'
		] ) );
		$wp_customize->add_setting( 'cookie_text', [
			'default'   => 'We use cookies to provide our services. By using this website, you agree to this.',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'cookie_text', [
			'label'    => 'Cookie prompt text',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_text',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'cookie_text_pos', [
			'default'           => 'leftPos',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cookie_text_pos', [
			'label'    => 'Content position',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_text_pos',
			'type'     => 'radio',
			'choices'  => [
				'leftPos'   => 'Left',
				'rightPos'  => 'Right',
				'centerPos' => 'Center',
			]
		] ) );
		$wp_customize->add_setting( 'cookie_agree_btn_pos', [
			'default'   => 'fixed',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cookie_agree_btn_pos', [
			'label'    => 'Button position',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_agree_btn_pos',
			'type'     => 'radio',
			'choices'  => [
				'afterText' => 'After text',
				'fixed'     => 'Fixed',
			]
		] ) );
		$wp_customize->add_setting( 'cookie_dropdownpages', array(
			'default'           => false,
			'sanitize_callback' => 'arc_sanitize_dropdown_pages',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'cookie_dropdownpages', array(
			'type'    => 'dropdown-pages',
			'section' => 'arc_cookie',
			'label'   => 'Set the Privacy Policy page',
		) );
		function arc_sanitize_dropdown_pages( $page_id, $setting ) {
			$page_id = absint( $page_id );

			return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
		}
		$wp_customize->add_setting( 'agree_btn_text', [
			'default'   => 'Agree',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agree_btn_text', [
			'label'    => 'Button text',
			'section'  => 'arc_cookie',
			'settings' => 'agree_btn_text',
			'type'     => 'text'
		] ) );
		$wp_customize->add_setting( 'cookie_btn_text_color', [
			'default'   => '#ffffff',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cookie_btn_text_color', [
			'label'    => 'Button text color',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_btn_text_color',
			'type'     => 'color'
		] ) );
		$wp_customize->add_setting( 'cookie_btn_color', [
			'default'   => '#FF00D6',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cookie_btn_color', [
			'label'    => 'Button color',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_btn_color',
			'type'     => 'color'
		] ) );
		$wp_customize->add_setting( 'cookie_btn_color_on_hover', [
			'default'   => '#FF00D6',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cookie_btn_color_on_hover', [
			'label'    => 'Button color on hover',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_btn_color_on_hover',
			'type'     => 'color'
		] ) );
		$wp_customize->add_setting( 'policy_link_color', [
			'default'   => '#ffffff',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'policy_link_color', [
			'label'    => 'Privacy Policy link color',
			'section'  => 'arc_cookie',
			'settings' => 'policy_link_color',
			'type'     => 'color'
		] ) );
		$wp_customize->add_setting( 'policy_link_color_on_hover', [
			'default'   => '#FF00D6',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'policy_link_color_on_hover', [
			'label'    => 'Privacy Policy link color on hover',
			'section'  => 'arc_cookie',
			'settings' => 'policy_link_color_on_hover',
			'type'     => 'color'
		] ) );
		$wp_customize->add_setting( 'cookie_btn_close_color', [
			'default'   => '#8E939C',
			'transport' => 'refresh',
		] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cookie_btn_close_color', [
			'label'    => 'Close button color',
			'section'  => 'arc_cookie',
			'settings' => 'cookie_btn_close_color',
			'type'     => 'color'
		] ) );
	}
	/***end cookie*****/



	$wp_customize->add_setting( 'primary_color_setting', [
			'default' => $primaryColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color_setting', [
		'label'   => 'Primary color',
		'description' => 'Affects the background of on-page elements like video, category and pornstar thumbnails, pagination, page separators, forms, main menu, and the footer.',
		'section' => 'colors',
		'settings'   => 'primary_color_setting',
	]));
	$wp_customize->add_setting( 'secondary_color_setting', [
			'default'=> $secondaryColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color_setting', [
		'label'   => 'Secondary color',
		'description' => 'Affects secondary separators and menus (video, community, user) and Community sidebars.',
		'section' => 'colors',
		'settings'   => 'secondary_color_setting',
	]));
	$wp_customize->add_setting( 'btn_color_setting', [
			'default' => $primaryBtnColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_color_setting', [
		'label'   => 'Primary button color',
		'description' => 'Affects all buttons on the site, pagination top border, and selected menu option\'s top border.',
		'section' => 'colors',
		'settings'   => 'btn_color_setting',
	]));
	$wp_customize->add_setting( 'btn_hover_color_setting', [
			'default' => $secondaryBtnColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_hover_color_setting', [
		'label'   => 'Secondary button color',
		'description' => 'Affects all buttons on the site on hover, pagination bottom border, and main menu\'s bottom border.',
		'section' => 'colors',
		'settings'   => 'btn_hover_color_setting',
	]));

	$wp_customize->add_setting( 'icons_color_setting', [
			'default' => $iconColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'icons_color_setting', [
		'label'   => 'Icon color',
		'description' => 'Affects all icons on the site (rating, add to playlist, etc.), preview loaders, and required asterisks.',
		'section' => 'colors',
		'settings'   => 'icons_color_setting',
	]));

	$wp_customize->add_setting( 'input_color', [
			'default' => $inputColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'input_color', [
		'label'   => 'Input color',
		'description' => 'Affects all input boxes on the site.',
		'section' => 'colors',
		'settings'   => 'input_color',
	]));

	$wp_customize->add_setting( 'links_color_setting', [
			'default' => $activeLinkColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links_color_setting', [
		'label'   => 'Active link color',
		'section' => 'colors',
		'settings'   => 'links_color_setting',
	]));

	$wp_customize->add_setting( 'passive_color_setting', [
			'default' => $passiveLinkColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'passive_color_setting', [
		'label'   => 'Passive link color',
		'section' => 'colors',
		'settings'   => 'passive_color_setting',
	]));


	$wp_customize->add_setting( 'text_site_color', [
			'default' => $primaryTextColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_site_color', [
		'label'   => 'Primary text color',
		'section' => 'colors',
		'settings'   => 'text_site_color',
	]));
	$wp_customize->add_setting( 'secondary_text_site_color', [
			'default' => $secondaryTextColor,
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	]);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_text_site_color', [
		'label'   => 'Secondary text color',
		'section' => 'colors',
		'settings'   => 'secondary_text_site_color',
	]));
	/**end settings for choosing colors for links and buttons**/

	/**section for copyright block**/
	$wp_customize->add_setting( 'copyright_setting', [
		'default'        => 'Created by <a href="https://vicetemple.com/">Citadel Solutions B.V.</a> Copyright ' . date("Y") .' · All rights reserved',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'copyright_setting', [
		'label'   => 'Footer copyright',
		'section' => 'title_tagline',
		'settings'   => 'copyright_setting',
		'type' => 'editor',
		'priority' => 140
	]));
	/**end section for copyright block**/


	/**section for SEO settings**/
	$wp_customize->add_panel('seo_settings',array(
		'title'=> __('Text Content', 'arc'),
		'priority'=> 199,
	));
	/***home***/
	$wp_customize->add_section( 'arc_seo_settings', array(
		'title'          => 'Homepage',
		'priority'       => 10,
		'panel'=>'seo_settings',
	));
	$wp_customize->add_setting( 'title-desc-pos', array(
		'default'        => 'bottom',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title-desc-pos', array(
		'label'   =>  __( 'Position', 'arc' ),
		'description' => __('Choose if you want to display the title and description at the top or bottom of the homepage.', 'arc'),
		'section' => 'arc_seo_settings',
		'settings'   => 'title-desc-pos',
		'type' => 'radio',
		'default' => 'bottom',
		'choices' => [
			'top' => __('Top', 'arc'),
			'bottom' => __('Bottom', 'arc')
		],
	)));
	$wp_customize->add_setting( 'seo_title', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_title', array(
		'label'   => __( 'Header text – H1 (Required)', 'arc' ),
		'section' => 'arc_seo_settings',
		'settings'   => 'seo_title',
		'type' => 'editor'
	)));
	$wp_customize->add_setting( 'seo_setting', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_setting', array(
		'label'   => 'SEO content for the homepage',
		'section' => 'arc_seo_settings',
		'settings'   => 'seo_setting',
		'type' => 'editor'
	)));
	/***categories***/
	$wp_customize->add_section( 'seo_categ_settings', array(
		'title'          => 'Categories',
		'priority'       => 11,
		'panel' => 'seo_settings',
	));
	$wp_customize->add_setting( 'title_desc_categ_pos', array(
		'default'        => 'bottomCat',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_desc_categ_pos', array(
		'label'   =>  __( 'Position', 'arc' ),
		'description' => __('Choose if you want to display the title and description at the top or bottom of the Categories page.', 'arc'),
		'section' => 'seo_categ_settings',
		'settings'   => 'title_desc_categ_pos',
		'type' => 'radio',
		'default' => 'bottomCat',
		'choices' => [
			'topCat' => __('Top', 'arc'),
			'bottomCat' => __('Bottom', 'arc')
		],
	)));
	$wp_customize->add_setting( 'seo_cat_title', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_cat_title', array(
		'label'   => __( 'Header text – H1 (Required)', 'arc' ),
		'section' => 'seo_categ_settings',
		'settings'   => 'seo_cat_title',
		'type' => 'editor'
	)));
	$wp_customize->add_setting( 'seo_cat_text', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_cat_text', array(
		'label'   => 'SEO content for the Categories page',
		'section' => 'seo_categ_settings',
		'settings'   => 'seo_cat_text',
		'type' => 'editor'
	)));
	/**tags**/
	$wp_customize->add_section( 'seo_tags_settings', array(
		'title'          => 'Tags',
		'priority'       => 12,
		'panel'=>'seo_settings',
	));
	$wp_customize->add_setting( 'title_desc_tags_pos', array(
		'default'        => 'bottom',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_desc_tags_pos', array(
		'label'   =>  __( 'Position', 'arc' ),
		'description' => __('Choose if you want to display the title and description at the top or bottom of the Tags page.', 'arc'),
		'section' => 'seo_tags_settings',
		'settings'   => 'title_desc_tags_pos',
		'type' => 'radio',
		'default' => 'bottom',
		'choices' => [
			'top' => __('Top', 'arc'),
			'bottom' => __('Bottom', 'arc')
		],
	)));
	$wp_customize->add_setting( 'seo_tags_title', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_tags_title', array(
		'label'   => __( 'Header text – H1 (Required)', 'arc' ),
		'section' => 'seo_tags_settings',
		'settings'   => 'seo_tags_title',
		'type' => 'editor'
	)));
	$wp_customize->add_setting( 'seo_tags_text', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_tags_text', array(
		'label'   => 'SEO content for the Tags page',
		'section' => 'seo_tags_settings',
		'settings'   => 'seo_tags_text',
		'type' => 'editor'
	)));
	/***actors***/
	$wp_customize->add_section( 'seo_actors_settings', array(
		'title'          => 'Pornstars',
		'priority'       => 13,
		'panel'=>'seo_settings',
	));
	$wp_customize->add_setting( 'title_desc_pos_actors', array(
		'default'        => 'bottom',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_desc_pos_actors', array(
		'label'   =>  __( 'Position', 'arc' ),
		'description' => __('Choose if you want to display the title and description at the top or bottom of the Pornstars page.', 'arc'),
		'section' => 'seo_actors_settings',
		'settings'   => 'title_desc_pos_actors',
		'type' => 'radio',
		'default' => 'bottom',
		'choices' => [
			'top' => __('Top', 'arc'),
			'bottom' => __('Bottom', 'arc')
		],
	)));
	$wp_customize->add_setting( 'seo_actors_title', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_actors_title', array(
		'label'   => __( 'Header text – H1 (Required)', 'arc' ),
		'section' => 'seo_actors_settings',
		'settings'   => 'seo_actors_title',
		'type' => 'editor'
	)));
	$wp_customize->add_setting( 'seo_actors_text', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_actors_text', array(
		'label'   => 'SEO content for the Pornstars page',
		'section' => 'seo_actors_settings',
		'settings'   => 'seo_actors_text',
		'type' => 'editor'
	)));
	/****blog****/
	$wp_customize->add_section( 'seo_blog_settings', array(
		'title'          => 'Blog',
		'priority'       => 14,
		'panel'=>'seo_settings',
	));
	$wp_customize->add_setting( 'title_desc_blog_pos', array(
		'default'        => 'bottom',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_desc_blog_pos', array(
		'label'   =>  __( 'Position', 'arc' ),
		'description' => __('Choose if you want to display the title and description at the top or bottom of the Blog.', 'arc'),
		'section' => 'seo_blog_settings',
		'settings'   => 'title_desc_blog_pos',
		'type' => 'radio',
		'default' => 'bottom',
		'choices' => [
			'top' => __('Top', 'arc'),
			'bottom' => __('Bottom', 'arc')
		],
	)));
	$wp_customize->add_setting( 'seo_blog_title', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_blog_title', array(
		'label'   => __( 'Header text – H1 (Required)', 'arc' ),
		'section' => 'seo_blog_settings',
		'settings'   => 'seo_blog_title',
		'type' => 'editor'
	)));
	$wp_customize->add_setting( 'seo_blog_text', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_blog_text', array(
		'label'   => 'SEO content for the Blog',
		'section' => 'seo_blog_settings',
		'settings'   => 'seo_blog_text',
		'type' => 'editor'
	)));
	/**photos**/
	$wp_customize->add_section( 'seo_photos_settings', array(
		'title'          => 'Photos & GIFs',
		'priority'       => 15,
		'panel'=>'seo_settings',
	));
	$wp_customize->add_setting( 'title_desc_photos_pos', array(
		'default'        => 'bottom',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_desc_photos_pos', array(
		'label'   =>  __( 'Position', 'arc' ),
		'description' => __('Choose if you want to display the title and description at the top or bottom of the Photos & GIFs page.', 'arc'),
		'section' => 'seo_photos_settings',
		'settings'   => 'title_desc_photos_pos',
		'type' => 'radio',
		'default' => 'bottom',
		'choices' => [
			'top' => __('Top', 'arc'),
			'bottom' => __('Bottom', 'arc')
		],
	)));
	$wp_customize->add_setting( 'seo_photos_title', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_photos_title', array(
		'label'   => __( 'Header text – H1 (Required)', 'arc' ),
		'section' => 'seo_photos_settings',
		'settings'   => 'seo_photos_title',
		'type' => 'editor'
	)));
	$wp_customize->add_setting( 'seo_photos_text', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_photos_text', array(
		'label'   => 'SEO content for the Photos & GIFs page',
		'section' => 'seo_photos_settings',
		'settings'   => 'seo_photos_text',
		'type' => 'editor'
	)));
	/****search****/
	$wp_customize->add_section( 'seo_search_settings', array(
		'title'          => 'Search Results',
		'priority'       => 16,
		'panel'=>'seo_settings',
	));
	$wp_customize->add_setting( 'title_desc_search_pos', array(
		'default'        => 'bottom',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_desc_search_pos', array(
		'label'   =>  __( 'Position', 'arc' ),
		'description' => __('Choose if you want to display the title and description at the top or bottom of search results.', 'arc'),
		'section' => 'seo_search_settings',
		'settings'   => 'title_desc_search_pos',
		'type' => 'radio',
		'default' => 'bottom',
		'choices' => [
			'top' => __('Top', 'arc'),
			'bottom' => __('Bottom', 'arc')
		],
	)));
	$wp_customize->add_setting( 'seo_search_title', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_search_title', array(
		'label'   => __( 'Write H1 (required)', 'arc' ),
		'section' => 'seo_search_settings',
		'settings'   => 'seo_search_title',
		'type' => 'editor'
	)));
	$wp_customize->add_setting( 'seo_search_text', array(
		'default'        => '',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'seo_search_text', array(
		'label'   => 'SEO content for search results',
		'section' => 'seo_search_settings',
		'settings'   => 'seo_search_text',
		'type' => 'editor'
	)));
	/**end settings for SEO Settings**/

	/**panel for code**/
	$wp_customize->add_panel('code_panel',array(
		'title'=> __('Script Settings', 'arc'),
		'priority'=> 42,
	));
	$wp_customize->add_section( 'arc_code_settings', array(
		'title'          => 'Desktop Settings',
		'priority'       => 10,
		'panel'=>'code_panel',
	));
	$wp_customize->add_setting( 'code_setting', array());
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'code_setting', array(
		'label'   => 'JavaScript snippets',
		'description' => 'e.g., Google Analytics',
		'section' => 'arc_code_settings',
		'settings'   => 'code_setting',
		'type' => 'textarea',
	)));
	$wp_customize->add_setting( 'meta_setting', array());
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'meta_setting', array(
		'label'   => 'Meta verification snippet',
		'description' => 'e.g., Google Search Console\'s meta verification',
		'section' => 'arc_code_settings',
		'settings'   => 'meta_setting',
		'type' => 'textarea'
	)));
	$wp_customize->add_setting( 'other_code_setting', array());
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'other_code_setting', array(
		'label'   => 'Other snippets',
		'section' => 'arc_code_settings',
		'settings'   => 'other_code_setting',
		'type' => 'textarea'
	)));
	/**end settings for code**/

	/**section for mobile code**/
	$wp_customize->add_section( 'arc_mob_code_settings', array(
		'title'          => 'Mobile Settings',
		'priority'       => 11,
		'panel'=>'code_panel',
	));
	$wp_customize->add_setting( 'mob_code_setting', array());
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mob_code_setting', array(
		'label'   => 'Mobile-specific snippets',
		'section' => 'arc_mob_code_settings',
		'settings'   => 'mob_code_setting',
		'type' => 'textarea'
	)));
	/**end settings for mobile code**/
	/**end panel for code**/

	/**panel for ads**/
	$wp_customize->add_panel('ads_panel',array(
		'title'=> __('Advertising Settings', 'arc'),
		'priority'=> 43,
	));
	/**section for advertising**/
	$wp_customize->add_section( 'arc_main_advertising_settings', array(
		'title'          => 'Desktop Settings',
		'priority'       => 10,
		'panel'=>'ads_panel',
	));

	$wp_customize->add_setting( 'explanation_desc_desktop', array(
		'default'        => 'To configure ads, paste your picture URL (.jpg, .png, .gif) or iframe code in the advertising boxes below.',
	));
	$wp_customize->add_control( new WP_Customize_Simple_Html_Desc( $wp_customize, 'explanation_desc_desktop', array(
		'label' => 'To configure ads, paste your picture URL (.jpg, .png, .gif) or iframe code in the advertising boxes below.',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'explanation_desc_desktop',
		'type' => 'html',
	)));


	$wp_customize->add_setting( 'main_advertising_setting_header', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-1.png">',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_advertising_setting_header', array(
		'label'   => 'Header',
		'description' => 'Recommended size: 468x60px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/header-happy-desktop.jpg'.'"/>',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'main_advertising_setting_header',
		'type' => 'textarea',
	)));

	$wp_customize->add_setting( 'main_advertising_setting_sidebar', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-2.png">',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_advertising_setting_sidebar', array(
		'label'   => 'Sidebar',
		'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/sidebar-happy-desktop.jpg'.'"/>',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'main_advertising_setting_sidebar',
		'type' => 'textarea',
	)));


	$wp_customize->add_setting( 'main_advertising_setting_video_left', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-2.png">',
		'transport'=> 'refresh',
	));

	$wp_customize->add_setting( 'explanation_desc_text', array(
		'default'        => 'If just one side contains an ad, it will be displayed at the center.',
	));
	$wp_customize->add_control( new WP_Customize_Simple_Html( $wp_customize, 'explanation_desc_text', array(
		'label' => 'If just one side contains an ad, it will be displayed at the center.',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'explanation_desc_text',
		'type' => 'html',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_advertising_setting_video_left', array(
		'label'   => 'Video player — Left side',
		'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/inside-player-happy-zone-1-desktop.jpg'.'"/>',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'main_advertising_setting_video_left',
		'type' => 'textarea',
	)));

	$wp_customize->add_setting( 'main_advertising_setting_video_right', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-2.png">',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_advertising_setting_video_right', array(
		'label'   => 'Video player — Right side',
		'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/inside-player-happy-zone-2-desktop.jpg'.'"/>',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'main_advertising_setting_video_right',
		'type' => 'textarea',
	)));

	$wp_customize->add_setting( 'main_advertising_setting_video_under', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-3.png">',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_advertising_setting_video_under', array(
		'label'   => 'Under the video player',
		'description' => 'Recommended size: 728x90px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/under-player-happy-desktop.jpg'.'"/>',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'main_advertising_setting_video_under',
		'type' => 'textarea',
	)));


	$wp_customize->add_setting( 'main_advertising_setting_footer', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-3.png">',
		'transport'=> 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_advertising_setting_footer', array(
		'label'   => 'Footer',
		'description' => 'Recommended size: 728x90px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/footer-happy-desktop.jpg'.'"/>',
		'section' => 'arc_main_advertising_settings',
		'settings'   => 'main_advertising_setting_footer',
		'type' => 'textarea',
	)));

	/**end settings for advertising**/

	/**section for mobile advertising**/
	$wp_customize->add_section( 'arc_mobile_advertising_settings', array(
		'title'          => 'Mobile Settings',
		'priority'       => 11,
		'panel'=>'ads_panel',
	));

	$wp_customize->add_setting( 'explanation_desc_mob', array(
		'default'        => 'To configure ads, paste your picture URL (.jpg, .png, .gif) or iframe code in the advertising boxes below.',
	));
	$wp_customize->add_control( new WP_Customize_Simple_Html_Desc( $wp_customize, 'explanation_desc_mob', array(
		'label' => 'To configure ads, paste your picture URL (.jpg, .png, .gif) or iframe code in the advertising boxes below.',
		'section' => 'arc_mobile_advertising_settings',
		'settings'   => 'explanation_desc_mob',
		'type' => 'html',
	)));

	$wp_customize->add_setting( 'mob_advertising_setting_header', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/header-mobile.png">',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mob_advertising_setting_header', array(
		'label'   => 'Mobile header',
		'description' => 'Recommended size: 300x100px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/header-happy-mobile.jpg'.'"/>',
		'section' => 'arc_mobile_advertising_settings',
		'settings'   => 'mob_advertising_setting_header',
		'type' => 'textarea',
	)));

	$wp_customize->add_setting( 'mob_advertising_setting_sidebar', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/square-mobile.jpg">',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mob_advertising_setting_sidebar', array(
		'label'   => 'Mobile sidebar',
		'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/sidebar-happy-mobile.jpg'.'"/>',
		'section' => 'arc_mobile_advertising_settings',
		'settings'   => 'mob_advertising_setting_sidebar',
		'type' => 'textarea',
	)));

	$wp_customize->add_setting( 'mob_advertising_setting_under', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/square-mobile.jpg">',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mob_advertising_setting_under', array(
		'label'   => 'Under the video',
		'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/under-player-happy-mobile.jpg'.'"/>',
		'section' => 'arc_mobile_advertising_settings',
		'settings'   => 'mob_advertising_setting_under',
		'type' => 'textarea',
	)));

	$wp_customize->add_setting( 'mob_advertising_setting_footer', array(
		'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/square-mobile.jpg">',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mob_advertising_setting_footer', array(
		'label'   => 'Mobile footer',
		'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/footer-happy-mobile.jpg'.'"/>',
		'section' => 'arc_mobile_advertising_settings',
		'settings'   => 'mob_advertising_setting_footer',
		'type' => 'textarea',
	)));

	/**end settings for mobile advertising**/

	if(is_plugin_active('vicetemple-player/vicetemple-player.php')) {
		/**section for player advertising**/
		$wp_customize->add_section( 'vicetemple_player_advertising_settings', array(
			'title'          => __('Vicetemple Player Settings', 'arc'),
			'priority'       => 12,
			'panel'=>'ads_panel',
		));

		$wp_customize->add_setting( 'explanation_desc_player', array(
			'default'        => 'To configure ads, paste your picture URL (.jpg, .png, .gif) or iframe code in the advertising boxes below.',
		));
		$wp_customize->add_control( new WP_Customize_Simple_Html_Desc( $wp_customize, 'explanation_desc_player', array(
			'label' => 'To configure ads, paste your picture URL (.jpg, .png, .gif) or iframe code in the advertising boxes below.',
			'section' => 'vicetemple_player_advertising_settings',
			'settings'   => 'explanation_desc_player',
			'type' => 'html',
		)));

		$wp_customize->add_setting( 'explanation_text', array(
			'default'        => 'If just one side contains an ad, it will be displayed at the center.',
		));
		$wp_customize->add_control( new WP_Customize_Simple_Html( $wp_customize, 'explanation_text', array(
			'label' => 'If just one side contains an ad, it will be displayed at the center.',
			'section' => 'vicetemple_player_advertising_settings',
			'settings'   => 'explanation_text',
			'type' => 'html',
		)));
		$wp_customize->add_setting( 'before_play_ad_zone1', array(
			'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-2.png">',
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'before_play_ad_zone1', array(
			'label'   => esc_html__( 'Primary playback ad', 'arc' ),
			'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/inside-player-happy-zone-1-desktop.jpg'.'"/>',
			'section' => 'vicetemple_player_advertising_settings',
			'settings'   => 'before_play_ad_zone1',
			'type' => 'textarea',
		)));

		$wp_customize->add_setting( 'before_play_ad_zone2', array(
			'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-2.png">',

		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'before_play_ad_zone2', array(
			'label'   => esc_html__( 'Secondary playback ad', 'arc' ),
			'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/inside-player-happy-zone-2-desktop.jpg'.'"/>',
			'section' => 'vicetemple_player_advertising_settings',
			'settings'   => 'before_play_ad_zone2',
			'type' => 'textarea',
		)));

		$wp_customize->add_setting( 'on_pause_ad_zone1', array(
			'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-2.png">',

		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'on_pause_ad_zone1', array(
			'label'   => esc_html__( 'Primary ad on pause', 'arc' ),
			'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/inside-player-happy-zone-1-desktop.jpg'.'"/>',
			'section' => 'vicetemple_player_advertising_settings',
			'settings'   => 'on_pause_ad_zone1',
			'type' => 'textarea',
		)));

		$wp_customize->add_setting( 'on_pause_ad_zone2', array(
			'default'        => '<img src="'.get_template_directory_uri() . '/assets/img/banners/happy-2.png">',
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'on_pause_ad_zone2', array(
			'label'   => esc_html__( 'Secondary ad on pause', 'arc' ),
			'description' => 'Recommended size: 300x250px' . '<br><img src="'.get_template_directory_uri() . '/assets/img/inside-player-happy-zone-2-desktop.jpg'.'"/>',
			'section' => 'vicetemple_player_advertising_settings',
			'settings'   => 'on_pause_ad_zone2',
			'type' => 'textarea',
		)));

		$wp_customize->add_setting( 'go_to_player_settings', array(
			'default'        => '',
			'transport'=> 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( new WP_Customize_Simple_Html_Desc( $wp_customize, 'go_to_player_settings', array(
			'label'   => '<strong>You can configure video ads in the plugin\'s settings.<br>
<a href="'.admin_url('admin.php?page=vicetemplepl-options').'/" target="_blank">Go to settings</a></strong>',
			'section' => 'vicetemple_player_advertising_settings',
			'settings'   => 'go_to_player_settings',
			'type' => 'html',
		)));
		/**end settings for player advertising**/
	}
	/**end panel for ads**/

	/*****tagline****/
	$wp_customize->add_setting( 'under_title_tagline', array(
		'default'  => 'true',
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'under_title_tagline', [
		'label'   => 'Display tagline under the site title',
		'section' => 'title_tagline',
		'settings'   => 'under_title_tagline',
		'type'     => 'checkbox',
		'priority' => 42,
	]));
	$wp_customize->add_setting( 'on_tab_tagline', array(
		'default'  => 'true',
		'transport'=> 'refresh',
		'type' => 'theme_mod'
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'on_tab_tagline', [
		'label'   => 'Display tagline in browser tab',
		'section' => 'title_tagline',
		'settings'   => 'on_tab_tagline',
		'type'     => 'checkbox',
		'priority' => 43,
	]));
	/****end tagline***/

	/****register/login/forgot pass pages*****/
	 {
		$wp_customize->add_panel( 'auth_panel', array(
			'title'    => __( 'Login, Register & Password', 'arc' ),
			'priority' => 10,
		) );
		$wp_customize->add_section( 'logo_auth', array(
			'title'    => __( 'Logo & Background', 'arc' ),
			'priority' => 10,
			'panel'    => 'auth_panel',
		) );
		$wp_customize->add_setting( 'logo_show', array(
			'default'   => 'true',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo_show', [
			'label'    => 'Display logo on Login, Register and password forms',
			'section'  => 'logo_auth',
			'settings' => 'logo_show',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'logo_file', array(
			'default'   => get_theme_mod( 'custom_logo' ),
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_file', [
			'label'         => __( 'Select logo', 'arc' ),
			'section'       => 'logo_auth',
			'settings'      => 'logo_file',
			'flex_width'    => false,
			'flex_height'   => false,
			'width'         => 270,
			'height'        => 55,
			'mime_type'     => 'image',
			'button_labels' => array(
				'select'       => __( 'Select image' ),
				'change'       => __( 'Change image' ),
				'default'      => __( 'Default' ),
				'remove'       => __( 'Remove' ),
				'placeholder'  => __( 'No image selected' ),
				'frame_title'  => __( 'Select image' ),
				'frame_button' => __( 'Choose image' ),
			)
		] ) );
		$wp_customize->add_setting( 'back_color', array(
			'default'   => '#0F1725',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'back_color', [
			'label'    => __( 'Background color', 'arc' ),
			'section'  => 'logo_auth',
			'settings' => 'back_color',
		] ) );
		$wp_customize->add_setting( 'back_file', array(
			'default'   => get_option( 'auth_bg' ),
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'back_file', [
			'label'         => __( 'Select background', 'arc' ),
			'description'   => 'Recommended size: 1920x1080px',
			'section'       => 'logo_auth',
			'settings'      => 'back_file',
			'flex_width'    => false,
			'flex_height'   => false,
			'width'         => 1920,
			'height'        => 1080,
			'mime_type'     => 'image',
			'button_labels' => array(
				'select'       => __( 'Select image' ),
				'change'       => __( 'Change image' ),
				'default'      => __( 'Default' ),
				'remove'       => __( 'Remove' ),
				'placeholder'  => __( 'No image selected' ),
				'frame_title'  => __( 'Select image' ),
				'frame_button' => __( 'Choose image' ),
			)
		] ) );
		$wp_customize->add_section( 'form_auth', array(
			'title'    => __( 'Form & Links', 'arc' ),
			'priority' => 12,
			'panel'    => 'auth_panel',
		) );
		$wp_customize->add_setting( 'login_form_preview', array(
			'default'   => false,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'login_form_preview', [
			'label'    => 'Login Form Preview',
			'section'  => 'form_auth',
			'settings' => 'login_form_preview',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'reg_form_preview', array(
			'default'   => false,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'reg_form_preview', [
			'label'    => 'Register Form Preview',
			'section'  => 'form_auth',
			'settings' => 'reg_form_preview',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'form_back_color', array(
			'default'   => '#172030',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_back_color', [
			'label'    => __( 'Background color', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'form_back_color',
		] ) );
		$wp_customize->add_setting( 'form_back_opacity', array(
			'default'   => '63',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Range_Login_Back_Opacity( $wp_customize, 'form_back_opacity', [
			'label'       => __( 'Background opacity', 'arc' ),
			'description' => '1-100%',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
			'section'     => 'form_auth',
			'settings'    => 'form_back_opacity',
			'type'        => 'range'
		] ) );
		$wp_customize->add_setting( 'border_around_auth_form', array(
			'default'   => 'yes',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'border_around_auth_form', [
			'label'    => __( 'Form border', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'border_around_auth_form',
			'type'     => 'radio',
			'choices'  => [
				'yes' => 'Yes',
				'no'  => 'No',
			]
		] ) );
		$wp_customize->add_setting( 'form_border_color', array(
			'default'   => '#172030',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_border_color', [
			'label'           => __( 'Border color', 'arc' ),
			'section'         => 'form_auth',
			'settings'        => 'form_border_color',
			'active_callback' => function ( $control ) {
				$value = $control->manager->get_setting( 'border_around_auth_form' )->value();
				if ( $value == 'yes' ) {
					return true;
				}

				return false;
			}
		] ) );
		$wp_customize->add_setting( 'form_text_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_text_color', [
			'label'    => __( 'Text color', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'form_text_color',
		] ) );
		$wp_customize->add_setting( 'form_button_color', array(
			'default'   => '#C32CE2',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_button_color', [
			'label'    => __( 'Button color', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'form_button_color',
		] ) );
		$wp_customize->add_setting( 'form_button_hover_color', array(
			'default'   => '#C32CE2',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_button_hover_color', [
			'label'    => __( 'Button color on hover', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'form_button_hover_color',
		] ) );
		$wp_customize->add_setting( 'form_button_border_color', array(
			'default'   => '#C32CE2',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_button_border_color', [
			'label'    => __( 'Button border color', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'form_button_border_color',
		] ) );
		$wp_customize->add_setting( 'form_button_text_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_button_text_color', [
			'label'    => __( 'Button text color', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'form_button_text_color',
		] ) );
		$wp_customize->add_setting( 'links_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links_color', [
			'label'    => __( 'Link color', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'links_color',
		] ) );
		$wp_customize->add_setting( 'links_hover_color', array(
			'default'   => '#C32CE2',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links_hover_color', [
			'label'    => __( 'Link color on hover', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'links_hover_color',
		] ) );
		$wp_customize->add_setting( 'links_text_position', array(
			'default'   => 'left',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'links_text_position', [
			'label'    => __( 'Link text position', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'links_text_position',
			'type'     => 'radio',
			'choices'  => [
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right'
			]
		] ) );
		/****ToS|ToC***/
		$wp_customize->add_setting( 'tos_text', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod',
			'default'   => 'Terms and Conditions'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tos_text', [
			'label'    => __( 'Text displayed for the ToS link', 'arc' ),
			'settings' => 'tos_text',
			'section'  => 'form_auth',
			'type'     => 'text'
		] ) );
		$wp_customize->add_setting( 'tos_link_page', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod',
			'default'   => site_url() . '/terms-and-conditions/'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tos_link_page', [
			'label'    => __( 'Link to the ToS page', 'arc' ),
			'settings' => 'tos_link_page',
			'section'  => 'form_auth',
			'type'     => 'text'
		] ) );
		$wp_customize->add_setting( 'tos_link_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tos_link_color', [
			'label'    => __( 'ToS link color', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'tos_link_color',
		] ) );
		$wp_customize->add_setting( 'tos_link_color_on_hover', array(
			'default'   => '#C32CE2',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tos_link_color_on_hover', [
			'label'    => __( 'ToS link color on hover', 'arc' ),
			'section'  => 'form_auth',
			'settings' => 'tos_link_color_on_hover',
		] ) );
		$wp_customize->add_setting( 'underline_tos', array(
			'default'   => false,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'underline_tos', [
			'label'    => 'Display underline for the ToS link',
			'section'  => 'form_auth',
			'settings' => 'underline_tos',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_section( 'popup_login_box', array(
			'title'    => __( 'Login Popup', 'arc' ),
			'priority' => 13,
			'panel'    => 'auth_panel',
		) );
		$wp_customize->add_setting( 'login_popup_preview', array(
			'default'   => false,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'login_popup_preview', [
			'label'       => 'Popup Preview',
			'description' => '<i>Activate only while you\'re making adjustments to the login popup.</i>',
			'section'     => 'popup_login_box',
			'settings'    => 'login_popup_preview',
			'type'        => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'login_popup_back_color', array(
			'default'   => '#172030',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_back_color', [
			'label'    => __( 'Background color', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_back_color',
		] ) );
		$wp_customize->add_setting( 'login_popup_back_opacity', array(
			'default'   => '63',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Range_Login_Popup_Back_Opacity( $wp_customize, 'login_popup_back_opacity', [
			'label'       => __( 'Background opacity', 'arc' ),
			'description' => '1-100%',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
			'section'     => 'popup_login_box',
			'settings'    => 'login_popup_back_opacity',
			'type'        => 'range'
		] ) );
		$wp_customize->add_setting( 'login_popup_border_color', array(
			'default'   => '#172030',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_border_color', [
			'label'    => __( 'Border color', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_border_color',
		] ) );
		$wp_customize->add_setting( 'login_popup_text_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_text_color', [
			'label'    => __( 'Text color', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_text_color',
		] ) );
		$wp_customize->add_setting( 'login_popup_button_color', array(
			'default'   => '#C32CE2',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_button_color', [
			'label'    => __( 'Button color', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_button_color',
		] ) );
		$wp_customize->add_setting( 'login_popup_button_hover_color', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_button_hover_color', [
			'label'    => __( 'Button color on hover', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_button_hover_color',
		] ) );
		$wp_customize->add_setting( 'border_button_login_popup', array(
			'default'   => 'no',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'border_button_login_popup', [
			'label'    => __( 'Button border', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'border_button_login_popup',
			'type'     => 'radio',
			'choices'  => [
				'yes' => 'Yes',
				'no'  => 'No',
			]
		] ) );
		$wp_customize->add_setting( 'login_popup_btn_border_color', array(
			'default'   => '#C32CE2',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_btn_border_color', [
			'label'           => __( 'Border color', 'arc' ),
			'section'         => 'popup_login_box',
			'settings'        => 'login_popup_btn_border_color',
			'active_callback' => function ( $control ) {
				$value = $control->manager->get_setting( 'border_button_login_popup' )->value();
				if ( $value == 'yes' ) {
					return true;
				}

				return false;
			}
		] ) );
		$wp_customize->add_setting( 'login_popup_button_text_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_button_text_color', [
			'label'    => __( 'Button text color', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_button_text_color',
		] ) );
		$wp_customize->add_setting( 'login_popup_button_text_color_on_hover', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_button_text_color_on_hover', [
			'label'    => __( 'Button text color on hover', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_button_text_color_on_hover',
		] ) );
		$wp_customize->add_setting( 'login_popup_links_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_links_color', [
			'label'    => __( 'Link color', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_links_color',
		] ) );
		$wp_customize->add_setting( 'login_popup_links_hover_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_popup_links_hover_color', [
			'label'    => __( 'Link color on hover', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_links_hover_color',
		] ) );
		$wp_customize->add_setting( 'login_popup_links_text_position', array(
			'default'   => 'center',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'login_popup_links_text_position', [
			'label'    => __( 'Link text position', 'arc' ),
			'section'  => 'popup_login_box',
			'settings' => 'login_popup_links_text_position',
			'type'     => 'radio',
			'choices'  => [
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right'
			]
		] ) );
		/****end register/login/forgot pass pages*****/
	}

	/***disclaimer popup 18+****/
	{
		$wp_customize->add_panel('disclaimer_panel',array(
			'title'=> __('18+ Confirmation', 'arc'),
			'priority'=> 11,
		));
		$wp_customize->add_section('disc_general',array(
			'title'=> __('General', 'arc'),
			'priority' => 10,
			'panel'=>'disclaimer_panel',
		));
		$wp_customize->add_setting( 'disc_preview', array(
			'default'        => false,
			'transport'=> 'refresh',
			'type' => 'theme_mod'
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_preview', [
			'label'       => 'Show 18+ Preview',
			'description' => 'Activate only while you\'re making adjustments to the 18+ confirmation popup.',
			'section'     => 'disc_general',
			'settings'    => 'disc_preview',
			'type'        => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'disc_show', array(
			'default'   => 'true',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disc_show', [
			'label'    => 'Enable 18+ confirmation',
			'section'  => 'disc_general',
			'settings' => 'disc_show',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'disc_logo_show', array(
			'default'   => 'true',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disc_logo_show', [
			'label'    => 'Display logo on the 18+ confirmation popup',
			'section'  => 'disc_general',
			'settings' => 'disc_logo_show',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'disc_logo_file', array(
			'default'   => get_theme_mod( 'custom_logo' ),
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'disc_logo_file', [
			'label'           => __( 'Select logo', 'arc' ),
			'section'         => 'disc_general',
			'settings'        => 'disc_logo_file',
			'flex_height'     => false,
			'width'           => 270,
			'height'          => 55,
			'mime_type'       => 'image',
			'button_labels'   => array(
				'select'       => __( 'Select image' ),
				'change'       => __( 'Change image' ),
				'default'      => __( 'Default' ),
				'remove'       => __( 'Remove' ),
				'placeholder'  => __( 'No image selected' ),
				'frame_title'  => __( 'Select image' ),
				'frame_button' => __( 'Choose image' ),
			),
			'active_callback' => function ( $control ) {
				$value = $control->manager->get_setting( 'disc_logo_show' )->value();
				if ( $value == true ) {
					return true;
				}

				return false;
			}
		] ) );
		$wp_customize->add_setting( 'disc_back_color', array(
			'default'   => '#0F1725',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_back_color', [
			'label'    => __( 'Background color', 'arc' ),
			'section'  => 'disc_general',
			'settings' => 'disc_back_color',
		] ) );
		$wp_customize->add_setting( 'disc_back_opacity', array(
			'default'   => 63,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Range_Back( $wp_customize, 'disc_back_opacity', [
			'label'       => __( 'Background opacity', 'arc' ),
			'description' => '1-100%',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
			'section'     => 'disc_general',
			'settings'    => 'disc_back_opacity',
			'type'        => 'range',
		] ) );
		$wp_customize->add_setting( 'disc_back_blur', array(
			'default'   => 8,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Range_Blur( $wp_customize, 'disc_back_blur', [
			'label'       => __( 'Background blur', 'arc' ),
			'description' => '1-10px',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 10,
				'step' => 1,
			),
			'section'     => 'disc_general',
			'settings'    => 'disc_back_blur',
			'type'        => 'range'
		] ) );
		$wp_customize->add_setting( 'disc_form_opacity', array(
			'default'   => 100,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Range_Form_Opacity( $wp_customize, 'disc_form_opacity', [
			'label'       => __( 'Form opacity', 'arc' ),
			'description' => '1-100%',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
			'section'     => 'disc_general',
			'settings'    => 'disc_form_opacity',
			'type'        => 'range',
		] ) );
		$wp_customize->add_section( 'disc_form', array(
			'title'    => __( 'Form Settings', 'arc' ),
			'priority' => 13,
			'panel'    => 'disclaimer_panel',
		) );
		$wp_customize->add_setting( 'disc_form_back_color', array(
			'default'   => '#1E2739',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_form_back_color', [
			'label'    => __( 'Background color', 'arc' ),
			'section'  => 'disc_form',
			'settings' => 'disc_form_back_color',
		] ) );
		$wp_customize->add_setting( 'disc_form_header', array(
			'default'   => 'Are you 18 or older?',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_form_header', [
			'label'    => __( 'Header text', 'arc' ),
			'settings' => 'disc_form_header',
			'section'  => 'disc_form',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_form_text', array(
			'default'   => 'You must verify that you are 18 years of age or older to enter this site.',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_form_text', [
			'label'    => __( 'Bottom text', 'arc' ),
			'section'  => 'disc_form',
			'settings' => 'disc_form_text',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_form_btn_yes_text', array(
			'default'   => 'YES',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_form_btn_yes_text', [
			'label'    => __( '"YES" button\'s text', 'arc' ),
			'section'  => 'disc_form',
			'settings' => 'disc_form_btn_yes_text',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_form_yes_btn_color', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_form_yes_btn_color', [
			'label'    => __( '"YES" button\'s color', 'arc' ),
			'section'  => 'disc_form',
			'settings' => 'disc_form_yes_btn_color',
		] ) );
		$wp_customize->add_setting( 'disc_form_yes_btn_color_on_hover', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_form_yes_btn_color_on_hover', [
			'label'    => __( '"YES" button\'s color on hover', 'arc' ),
			'section'  => 'disc_form',
			'settings' => 'disc_form_yes_btn_color_on_hover',
		] ) );
		$wp_customize->add_setting( 'disc_form_btn_no_text', array(
			'default'   => 'NO',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_form_btn_no_text', [
			'label'    => __( '"NO" button\'s text', 'arc' ),
			'section'  => 'disc_form',
			'settings' => 'disc_form_btn_no_text',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_form_no_btn_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_form_no_btn_color', [
			'label'    => __( '"NO" button\'s border color', 'arc' ),
			'section'  => 'disc_form',
			'settings' => 'disc_form_no_btn_color',
		] ) );
		$wp_customize->add_section( 'disc_nope_form', array(
			'title'    => __( 'Redirect Form Settings', 'arc' ),
			'priority' => 14,
			'panel'    => 'disclaimer_panel',
		) );
		$wp_customize->add_setting( 'disc_nope_form_header1', array(
			'default'   => 'We\'re sorry!',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_nope_form_header1', [
			'label'    => __( 'Header 1 text', 'arc' ),
			'settings' => 'disc_nope_form_header1',
			'section'  => 'disc_nope_form',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_nope_form_header2', array(
			'default'   => 'I HIT THE WRONG BUTTON!',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_nope_form_header2', [
			'label'    => __( 'Header 2 text', 'arc' ),
			'settings' => 'disc_nope_form_header2',
			'section'  => 'disc_nope_form',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_nope_form_text', array(
			'default'   => 'You must be 18 years of age or older to enter this site.',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_nope_form_text', [
			'label'    => __( 'Bottom text', 'arc' ),
			'settings' => 'disc_nope_form_text',
			'section'  => 'disc_nope_form',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_nope_form_btn_text', array(
			'default'   => 'I\'m old enough!',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'disc_nope_form_btn_text', [
			'label'    => __( 'Button text', 'arc' ),
			'section'  => 'disc_nope_form',
			'settings' => 'disc_nope_form_btn_text',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'disc_nope_form_btn_color', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_nope_form_btn_color', [
			'label'    => __( 'Button color', 'arc' ),
			'section'  => 'disc_nope_form',
			'settings' => 'disc_nope_form_btn_color',
		] ) );
		$wp_customize->add_setting( 'disc_nope_form_btn_color_on_hover', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_nope_form_btn_color_on_hover', [
			'label'    => __( 'Button color on hover', 'arc' ),
			'section'  => 'disc_nope_form',
			'settings' => 'disc_nope_form_btn_color_on_hover',
		] ) );
		$wp_customize->add_setting( 'disc_nope_form_link', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'disc_nope_form_link', [
			'label'    => __( 'Redirect link', 'arc' ),
			'settings' => 'disc_nope_form_link',
			'section'  => 'disc_nope_form',
			'type'     => 'text'
		] ) );
		/***end disclaimer popup 18+****/
	}

	/***** Premium Popup *****/
	{
		$wp_customize->add_panel( 'subscribe_panel', array(
			'title'    => __( 'Premium Settings', 'arc' ),
			'priority' => 203,
		) );
		$wp_customize->add_section( 'section_billing_details', array(
			'title'    => __( 'Billing Details', 'arc' ),
			'priority' => 30,
			'panel'    => 'subscribe_panel',
		) );
		$wp_customize->add_section( 'modal_subscribe_window', array(
			'title'    => __( 'Premium Popup', 'arc' ),
			'priority' => 10,
			'panel'    => 'subscribe_panel',
		) );
		$wp_customize->add_setting( 'subscribe_preview_show', array(
			'default'   => false,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'subscribe_preview_show', [
			'label'       => 'Show premium popup preview',
			'description' => '<i>Activate only while you\'re making adjustments to the premium popup.</i>',
			'section'     => 'modal_subscribe_window',
			'settings'    => 'subscribe_preview_show',
			'type'        => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'subscribe_back_color', array(
			'default'   => '#1E2739',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subscribe_back_color', [
			'label'    => __( 'Background color', 'arc' ),
			'section'  => 'modal_subscribe_window',
			'settings' => 'subscribe_back_color',
		] ) );
		$wp_customize->add_setting( 'premium_popup_image_file', array(
			'default'   => '',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'premium_popup_image_file', [
			'label'         => __( 'Select popup image', 'arc' ),
			'section'       => 'modal_subscribe_window',
			'settings'      => 'premium_popup_image_file',
			'flex_height'   => false,
			'width'         => 483,
			'height'        => 246,
			'mime_type'     => 'image',
			'button_labels' => array(
				'select'       => __( 'Select image' ),
				'change'       => __( 'Change image' ),
				'default'      => __( 'Default' ),
				'remove'       => __( 'Remove' ),
				'placeholder'  => __( 'No image selected' ),
				'frame_title'  => __( 'Select image' ),
				'frame_button' => __( 'Choose image' ),
			)
		] ) );
		$wp_customize->add_setting( 'subscribe_header_text', array(
			'default'   => 'Watch the best porno videos!',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'subscribe_header_text', [
			'label'    => __( 'Header text', 'arc' ),
			'section'  => 'modal_subscribe_window',
			'settings' => 'subscribe_header_text',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'subscribe_footer_text', array(
			'default'   => 'Already a Premium Subscriber?',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'subscribe_footer_text', [
			'label'    => __( 'Popup content', 'arc' ),
			'section'  => 'modal_subscribe_window',
			'settings' => 'subscribe_footer_text',
			'type'     => 'editor'
		] ) );
		$wp_customize->add_setting( 'subscribe_close_color', array(
			'default'   => '#8E939C',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subscribe_close_color', [
			'label'    => __( 'Close button color', 'arc' ),
			'section'  => 'modal_subscribe_window',
			'settings' => 'subscribe_close_color',
		] ) );
		$wp_customize->add_setting( 'subscribe_login_color', array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subscribe_login_color', [
			'label'    => __( 'Login button color', 'arc' ),
			'section'  => 'modal_subscribe_window',
			'settings' => 'subscribe_login_color',
		] ) );
		$wp_customize->add_setting( 'subscribe_login_color_on_hover', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subscribe_login_color_on_hover', [
			'label'    => __( 'Register button color', 'arc' ),
			'section'  => 'modal_subscribe_window',
			'settings' => 'subscribe_login_color_on_hover',
		] ) );

		$wp_customize->add_setting( 'reg_btn_color_on_hover', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'reg_btn_color_on_hover', [
			'label'    => __( 'Register button color on hover', 'arc' ),
			'section'  => 'modal_subscribe_window',
			'settings' => 'reg_btn_color_on_hover',
		] ) );

		$wp_customize->add_section( 'premium_rates_price', array(
			'title'    => __( 'Premium Rates', 'arc' ),
			'priority' => 13,
			'panel'    => 'subscribe_panel',
		) );
		$wp_customize->add_setting( 'premium_rate_type', array(
			'default'   => '3 months',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'premium_rate_type', [
			'label'    => 'Suggest the "best choice" package',
			'section'  => 'premium_rates_price',
			'settings' => 'premium_rate_type',
			'type'     => 'radio',
			'choices'  => [
				'1 month'   => '1 month',
				'3 months'  => '3 months',
				'6 months'  => '6 months',
				'12 months' => '12 months',
			]
		] ) );
		$wp_customize->add_setting( 'premium_display_best_label', array(
			'default'   => 'true',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'premium_display_best_label', [
			'label'    => 'Display the "Best choice" label',
			'section'  => 'premium_rates_price',
			'settings' => 'premium_display_best_label',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'premium_text_label_color', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'premium_text_label_color', [
			'label'    => __( '"Best choice" label text color', 'arc' ),
			'section'  => 'premium_rates_price',
			'settings' => 'premium_text_label_color',
		] ) );
	}
	/***** end Premium Popup*****/

	/***** Redirect Popup ****/
	{
		$wp_customize->add_panel( 'popup_panel', array(
			'title'    => __( 'Redirect Popup Settings', 'arc' ),
			'priority' => 204,
		) );
		$wp_customize->add_section( 'popup_general', array(
			'title'    => __( 'General', 'arc' ),
			'priority' => 10,
			'panel'    => 'popup_panel',
		) );
		$wp_customize->add_setting( 'popup_preview_show', array(
			'default'   => false,
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_preview_show', [
			'label'       => 'Show redirect popup preview',
			'description' => '<i>Activate only while you\'re making adjustments to the redirect popup.</i>',
			'section'     => 'popup_general',
			'settings'    => 'popup_preview_show',
			'type'        => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'popup_show', array(
			'default'   => 'on',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_show', [
			'label'    => 'Enable the redirect popup',
			'section'  => 'popup_general',
			'settings' => 'popup_show',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'popup_background', array(
			'default'   => '#1E2739',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'popup_background', [
			'label'    => 'Form background color',
			'section'  => 'popup_general',
			'settings' => 'popup_background',
			'type'     => 'color',
		] ) );
		$wp_customize->add_setting( 'popup_page', array(
			'default'   => 'main',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_page', [
			'label'    => 'Display the popup on',
			'section'  => 'popup_general',
			'settings' => 'popup_page',
			'type'     => 'radio',
			'choices'  => [
				'main'     => 'Homepage',
				'category' => 'Category pages',
				'videos'   => 'Video pages',
				'all'      => 'All pages',
			]
		] ) );
		$wp_customize->add_section( 'popup_anim', array(
			'title'    => __( 'Animation', 'arc' ),
			'priority' => 11,
			'panel'    => 'popup_panel',
		) );
		$wp_customize->add_setting( 'popup_side_anim', array(
			'default'   => 'right',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_side_anim', [
			'label'    => 'Animation direction',
			'section'  => 'popup_anim',
			'settings' => 'popup_side_anim',
			'type'     => 'radio',
			'choices'  => [
				'right'  => 'From the right side',
				'left'   => 'From the left side',
				'top'    => 'From the top',
				'bottom' => 'From the bottom'
			]
		] ) );
		$wp_customize->add_setting( 'popup_time_anim', array(
			'default'   => '15sec',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_time_anim', [
			'label'    => 'Popup triggers after',
			'section'  => 'popup_anim',
			'settings' => 'popup_time_anim',
			'type'     => 'radio',
			'choices'  => [
				'15sec' => '15 seconds on the site',
				'300px' => 'Scrolling down 300px',
			]
		] ) );
		$wp_customize->add_setting( 'popup_speed_anim', array(
			'default'   => '0.5s',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_speed_anim', [
			'label'    => 'Animation speed',
			'section'  => 'popup_anim',
			'settings' => 'popup_speed_anim',
			'type'     => 'radio',
			'choices'  => [
				'0.5s' => 'Fast',
				'1s'   => 'Normal',
				'2s'   => 'Slow',
			]
		] ) );
		$wp_customize->add_setting( 'popup_hide', array(
			'default'   => '3',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_hide', [
			'label'    => 'Hide the popup after triggering for',
			'section'  => 'popup_anim',
			'settings' => 'popup_hide',
			'type'     => 'radio',
			'choices'  => [
				'6'      => '6 hour',
				'24'     => '24 hours',
				'3'      => '3 days',
				'custom' => ' ',
			]
		] ) );
		$wp_customize->add_setting( 'custom_popup_hide', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_popup_hide', [
			'label'       => __( 'days', 'arc' ),
			'description' => __( ' days', 'arc' ),
			'settings'    => 'custom_popup_hide',
			'section'     => 'popup_anim',
			'type'        => 'text',
			'input_attrs' => array(
				'maxlength' => 3,
			)
		] ) );
		$wp_customize->add_section( 'popup_content', array(
			'title'    => __( 'Content', 'arc' ),
			'priority' => 12,
			'panel'    => 'popup_panel',
		) );
		$wp_customize->add_setting( 'popup_content_type', array(
			'default'   => 'with_text',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_content_type', [
			'label'    => 'Popup style',
			'section'  => 'popup_content',
			'settings' => 'popup_content_type',
			'type'     => 'radio',
			'choices'  => [
				'with_text'    => 'Image and text',
				'without_text' => 'Image only',
			]
		] ) );
		$wp_customize->add_setting( 'popup_mime', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'popup_mime', [
			'label'       => 'Select image',
			'description' => 'Allowed image formats: .jpg, .jpeg, .png, .gif',
			'section'     => 'popup_content',
			'settings'    => 'popup_mime',
		] ) );
		$wp_customize->add_setting( 'popup_header', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod',
			'default'   => '<h1>The best porno videos for you!</h1>'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'popup_header', [
			'label'           => 'Header text',
			'section'         => 'popup_content',
			'settings'        => 'popup_header',
			'type'            => 'editor',
			'active_callback' => function ( $control ) {
				$value = $control->manager->get_setting( 'popup_content_type' )->value();
				if ( $value == 'with_text' ) {
					return true;
				}

				return false;
			},
		] ) );
		$wp_customize->add_setting( 'popup_description', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod',
			'default'   => '<p>Do you want to watch right now?</p>'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'popup_description', [
			'label'           => 'Popup content',
			'section'         => 'popup_content',
			'settings'        => 'popup_description',
			'type'            => 'editor',
			'active_callback' => function ( $control ) {
				$value = $control->manager->get_setting( 'popup_content_type' )->value();
				if ( $value == 'with_text' ) {
					return true;
				}

				return false;
			},
		] ) );
		$wp_customize->add_section( 'popup_btn', array(
			'title'    => __( 'Buttons', 'arc' ),
			'priority' => 13,
			'panel'    => 'popup_panel',
		) );
		$wp_customize->add_setting( 'popup_pulse_btn', array(
			'default'   => 'on',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'popup_pulse_btn', [
			'label'    => 'Enable button pulse',
			'section'  => 'popup_btn',
			'settings' => 'popup_pulse_btn',
			'type'     => 'checkbox',
		] ) );
		$wp_customize->add_setting( 'popup_link_btn', array(
			'default'   => '',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'popup_link_btn', [
			'label'    => 'Redirect the user to',
			'section'  => 'popup_btn',
			'settings' => 'popup_link_btn',
			'type'     => 'text',
		] ) );
		$wp_customize->add_setting( 'popup_color_btn', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'popup_color_btn', [
			'label'    => 'Redirect button color',
			'section'  => 'popup_btn',
			'settings' => 'popup_color_btn',
			'type'     => 'color',
		] ) );
		$wp_customize->add_setting( 'popup_hover_color_btn', array(
			'default'   => '#FF00D6',
			'transport' => 'refresh',
			'type'      => 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'popup_hover_color_btn', [
			'label'    => 'Redirect button color on hover',
			'section'  => 'popup_btn',
			'settings' => 'popup_hover_color_btn',
			'type'     => 'color',
		] ) );
		$wp_customize->add_setting( 'popup_btn_text', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod',
			'default'   => 'WATCH HOT VIDEOS NOW'
		) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'popup_btn_text', [
			'label'    => 'Redirect button\'s text',
			'section'  => 'popup_btn',
			'settings' => 'popup_btn_text',
			'type'     => 'editor',
		] ) );
		$wp_customize->add_setting( 'close_popup_btn_color', array(
			'transport' => 'refresh',
			'type'      => 'theme_mod',
			'default'   => '#8E939C'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'close_popup_btn_color', [
			'label'    => 'Close button color',
			'section'  => 'popup_btn',
			'settings' => 'close_popup_btn_color',
			'type'     => 'color',
		] ) );
	}
	/*****end popup modal****/

	/*****add more options for Woocommerce panel****/
	$wp_customize->add_setting('show_billings_details', [
		'default'    =>  true,
		'transport'=> 'refresh',
		'priority' => 1
	] );
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'show_billings_details', [
		'section' => 'section_billing_details',
		'settings' => 'show_billings_details',
		'label'   => 'Enable Billing details',
		'type'    => 'checkbox',
	]));
	$wp_customize->add_setting('firstname_show', [
		'default'   => 'required',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'firstname_show', [
		'section'  => 'section_billing_details',
		'label'    => 'First name',
		'type'     => 'select',
		'choices'  => [
			'hidden'     => 'Hidden',
			'required'   => 'Required',
			'optional'   => 'Optional'
		]
	]));
	$wp_customize->add_setting('lastname_show', [
		'default'   => 'required',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'lastname_show', [
		'section'  => 'section_billing_details',
		'label'    => 'Last name',
		'type'     => 'select',
		'choices'  => [
			'hidden'     => 'Hidden',
			'required'   => 'Required',
			'optional'   => 'Optional'
		]
	]));
	$wp_customize->add_setting('company_show', [
		'default'   => 'optional',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'company_show', [
		'section'  => 'section_billing_details',
		'label'    => 'Company',
		'type'     => 'select',
		'choices'  => [
			'hidden'     => 'Hidden',
			'required'   => 'Required',
			'optional'   => 'Optional'
		]
	]));
	$wp_customize->add_setting('country_show', [
		'default'   => 'required',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'country_show', [
		'section'  => 'section_billing_details',
		'label'    => 'Country',
		'type'     => 'select',
		'choices'  => [
			'hidden'     => 'Hidden',
			'required'   => 'Required',
			'optional'   => 'Optional'
		]
	]));
	$wp_customize->add_setting('city_show', [
		'default'   => 'required',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'city_show', [
		'section'  => 'section_billing_details',
		'label'    => 'City',
		'type'     => 'select',
		'choices'  => [
			'hidden'     => 'Hidden',
			'required'   => 'Required',
			'optional'   => 'Optional'
		]
	]));
	$wp_customize->add_setting('postcode_show', [
		'default'   => 'required',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'postcode_show', [
		'section'  => 'section_billing_details',
		'label'    => 'Postal code',
		'type'     => 'select',
		'choices'  => [
			'hidden'     => 'Hidden',
			'required'   => 'Required',
			'optional'   => 'Optional'
		]
	]));
	$wp_customize->add_setting('phone_show', [
		'default'   => 'required',
		'transport' => 'refresh'
	]);
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize,'phone_show', [
		'section'  => 'section_billing_details',
		'label'    => 'Phone',
		'type'     => 'select',
		'choices'  => [
			'hidden'     => 'Hidden',
			'required'   => 'Required',
			'optional'   => 'Optional'
		]
	]));

	/***** [end] add more options for Woocommerce panel****/


}/***end add settings to customize panel****/

/**hide tagline if he if off***/
add_filter( 'document_title_parts', function($title) {
	if(get_theme_mod('on_tab_tagline') !== true && is_front_page() && display_header_text() == true) {
		/*$title['title'] – first part of title
		$title['page'] – exist if we on second and more page of pagination
		$title['tagline'] – description site in second part of title
		$title['site'] – name of site in second part of title*/
		if(!empty($title['tagline'])){
			unset($title['tagline']);
		}
	}
	return $title;
});