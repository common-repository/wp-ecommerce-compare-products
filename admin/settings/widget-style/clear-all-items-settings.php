<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
WPEC Compare Widget Clear All Items Settings

TABLE OF CONTENTS

- var parent_tab
- var subtab_data
- var option_name
- var form_key
- var position
- var form_fields
- var form_messages

- __construct()
- subtab_init()
- set_default_settings()
- get_settings()
- subtab_data()
- add_subtab()
- settings_form()
- init_form_fields()

-----------------------------------------------------------------------------------*/

class WPEC_Compare_Widget_Clear_All_Items_Settings extends WPEC_Compare_Admin_UI
{
	
	/**
	 * @var string
	 */
	private $parent_tab = 'compare-widget';
	
	/**
	 * @var array
	 */
	private $subtab_data;
	
	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'wpec_compare_widget_clear_all_style';
	
	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wpec_compare_widget_clear_all_style';
	
	/**
	 * @var string
	 * You can change the order show of this sub tab in list sub tabs
	 */
	private $position = 4;
	
	/**
	 * @var array
	 */
	public $form_fields = array();
	
	/**
	 * @var array
	 */
	public $form_messages = array();
	
	/*-----------------------------------------------------------------------------------*/
	/* __construct() */
	/* Settings Constructor */
	/*-----------------------------------------------------------------------------------*/
	public function __construct() {
		$this->init_form_fields();
		$this->subtab_init();
		
		$this->form_messages = array(
				'success_message'	=> __( 'Widget Clear All Items Settings successfully saved.', 'wp-ecommerce-compare-products' ),
				'error_message'		=> __( 'Error: Widget Clear All Items Settings can not save.', 'wp-ecommerce-compare-products' ),
				'reset_message'		=> __( 'Widget Clear All Items Settings successfully reseted.', 'wp-ecommerce-compare-products' ),
			);
			
		add_action( $this->plugin_name . '-' . $this->parent_tab . '_tab_end', array( $this, 'include_script' ) );
			
		add_action( $this->plugin_name . '_set_default_settings' , array( $this, 'set_default_settings' ) );
		add_action( $this->plugin_name . '_get_all_settings' , array( $this, 'get_settings' ) );
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* subtab_init() */
	/* Sub Tab Init */
	/*-----------------------------------------------------------------------------------*/
	public function subtab_init() {
		
		add_filter( $this->plugin_name . '-' . $this->parent_tab . '_settings_subtabs_array', array( $this, 'add_subtab' ), $this->position );
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* set_default_settings()
	/* Set default settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function set_default_settings() {
		global $wpec_compare_admin_interface;
		
		$wpec_compare_admin_interface->reset_settings( $this->form_fields, $this->option_name, false );
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* get_settings()
	/* Get settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function get_settings() {
		global $wpec_compare_admin_interface;
		
		$wpec_compare_admin_interface->get_settings( $this->form_fields, $this->option_name );
	}
	
	/**
	 * subtab_data()
	 * Get SubTab Data
	 * =============================================
	 * array ( 
	 *		'name'				=> 'my_subtab_name'				: (required) Enter your subtab name that you want to set for this subtab
	 *		'label'				=> 'My SubTab Name'				: (required) Enter the subtab label
	 * 		'callback_function'	=> 'my_callback_function'		: (required) The callback function is called to show content of this subtab
	 * )
	 *
	 */
	public function subtab_data() {
		
		$subtab_data = array( 
			'name'				=> 'clear-all-items',
			'label'				=> __( 'Clear All Items', 'wp-ecommerce-compare-products' ),
			'callback_function'	=> 'wpec_compare_widget_clear_all_items_settings_form',
		);
		
		if ( $this->subtab_data ) return $this->subtab_data;
		return $this->subtab_data = $subtab_data;
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* add_subtab() */
	/* Add Subtab to Admin Init
	/*-----------------------------------------------------------------------------------*/
	public function add_subtab( $subtabs_array ) {
	
		if ( ! is_array( $subtabs_array ) ) $subtabs_array = array();
		$subtabs_array[] = $this->subtab_data();
		
		return $subtabs_array;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* settings_form() */
	/* Call the form from Admin Interface
	/*-----------------------------------------------------------------------------------*/
	public function settings_form() {
		global $wpec_compare_admin_interface;
		
		$output = '';
		$output .= $wpec_compare_admin_interface->admin_forms( $this->form_fields, $this->form_key, $this->option_name, $this->form_messages );
		
		return $output;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* init_form_fields() */
	/* Init all fields of this form */
	/*-----------------------------------------------------------------------------------*/
	public function init_form_fields() {
		
  		// Define settings			
     	$this->form_fields = apply_filters( $this->option_name . '_settings_fields', array(
		
			array(
            	'name' => __( "'Clear All' Items Button / Hyperlink", 'wp-ecommerce-compare-products' ),
                'type' => 'heading',
           	),
			array(  
				'name' 		=> __( 'Button or Hyperlink Type', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_button_type',
				'class' 	=> 'clear_all_button_type',
				'type' 		=> 'switcher_checkbox',
				'default'	=> 'link',
				'checked_value'		=> 'button',
				'unchecked_value'	=> 'link',
				'checked_label'		=> __( 'Button', 'wp-ecommerce-compare-products' ),
				'unchecked_label' 	=> __( 'Hyperlink', 'wp-ecommerce-compare-products' ),
			),
			array(  
				'name' 		=> __( "'Clear All' Items Vertical Align", 'wp-ecommerce-compare-products' ),
				'desc' 		=> __('Relative to Compare Widget Button.', 'wp-ecommerce-compare-products' ) . ' ' .__( "Default <code>Below</code>.", 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_item_vertical',
				'css' 		=> 'width:80px;',
				'type' 		=> 'select',
				'default'	=> 'below',
				'options'	=> array(
						'above'			=> __( 'Above', 'wp-ecommerce-compare-products' ) ,	
						'below'			=> __( 'Below', 'wp-ecommerce-compare-products' ) ,
					),
			),
			array(  
				'name' 		=> __( "'Clear All' Items Horizontal Align", 'wp-ecommerce-compare-products' ),
				'desc' 		=> __( "Default <code>Right</code>.", 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_item_horizontal',
				'css' 		=> 'width:80px;',
				'type' 		=> 'select',
				'default'	=> 'right',
				'options'	=> array(
						'left'			=> __( 'Left', 'wp-ecommerce-compare-products' ) ,	
						'center'		=> __( 'Center', 'wp-ecommerce-compare-products' ) ,	
						'right'			=> __( 'Right', 'wp-ecommerce-compare-products' ) ,
					),
			),
			
			array(
            	'name' 		=> __( "'Clear All' Items Linked Text Styling", 'wp-ecommerce-compare-products' ),
                'type' 		=> 'heading',
          		'class'		=> 'clear_all_items_hyperlink_styling_container'
           	),
			array(  
				'name' => __( 'Hyperlink Text', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'widget_clear_text',
				'type' 		=> 'text',
				'default'	=> __('Clear All', 'wp-ecommerce-compare-products' )
			),
			array(  
				'name' 		=> __( 'Hyperlink Font', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_text_font',
				'type' 		=> 'typography',
				'default'	=> array( 'size' => '12px', 'face' => 'Arial, sans-serif', 'style' => 'bold', 'color' => '#000000' )
			),
			
			array(  
				'name' 		=> __( 'Hyperlink Hover Colour', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_text_font_hover_colour',
				'type' 		=> 'color',
				'default'	=> '#999999'
			),
			
			array(
            	'name' 		=> __( "'Clear All' Items Button Styling", 'wp-ecommerce-compare-products' ),
                'type' 		=> 'heading',
          		'class' 	=> 'clear_all_items_button_styling_container'
           	),
			array(  
				'name' 		=> __( 'Button Text', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_button_text',
				'type' 		=> 'text',
				'default'	=> __('Clear All', 'wp-ecommerce-compare-products' )
			),
			array(  
				'name' 		=> __( 'Button Padding', 'wp-ecommerce-compare-products' ),
				'desc' 		=> __( 'Padding from Button text to Button border', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_button_padding',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array(  'id' 		=> 'clear_all_button_padding_tb',
	 										'name' 		=> __( 'Top/Bottom', 'wp-ecommerce-compare-products' ),
	 										'class' 	=> '',
	 										'css'		=> 'width:40px;',
	 										'default'	=> '7' ),
	 
	 								array(  'id' 		=> 'clear_all_button_padding_lr',
	 										'name' 		=> __( 'Left/Right', 'wp-ecommerce-compare-products' ),
	 										'class' 	=> '',
	 										'css'		=> 'width:40px;',
	 										'default'	=> '8' ),
	 							)
			),
			array(  
				'name' 		=> __( 'Background Colour', 'wp-ecommerce-compare-products' ),
				'desc' 		=> __( 'Default', 'wp-ecommerce-compare-products' ) . ' [default_value]',
				'id' 		=> 'clear_all_button_bg_colour',
				'type' 		=> 'color',
				'default'	=> '#476381'
			),
			array(  
				'name' 		=> __( 'Background Colour Gradient From', 'wp-ecommerce-compare-products' ),
				'desc' 		=> __( 'Default', 'wp-ecommerce-compare-products' ) . ' [default_value]',
				'id' 		=> 'clear_all_button_bg_colour_from',
				'type' 		=> 'color',
				'default'	=> '#538bbc'
			),
			
			array(  
				'name' 		=> __( 'Background Colour Gradient To', 'wp-ecommerce-compare-products' ),
				'desc' 		=> __( 'Default', 'wp-ecommerce-compare-products' ) . ' [default_value]',
				'id' 		=> 'clear_all_button_bg_colour_to',
				'type' 		=> 'color',
				'default'	=> '#476381'
			),
			array(  
				'name' 		=> __( 'Button Border', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_button_border',
				'type' 		=> 'border',
				'default'	=> array( 'width' => '1px', 'style' => 'solid', 'color' => '#476381', 'corner' => 'rounded' , 'top_left_corner' => 3 , 'top_right_corner' => 3 , 'bottom_left_corner' => 3 , 'bottom_right_corner' => 3 ),
			),
			array(  
				'name' 		=> __( 'Button Font', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_button_font',
				'type' 		=> 'typography',
				'default'	=> array( 'size' => '12px', 'face' => 'Arial, sans-serif', 'style' => 'bold', 'color' => '#FFFFFF' )
			),
			array(  
				'name' 		=> __( 'Button Shadow', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'clear_all_button_shadow',
				'type' 		=> 'box_shadow',
				'default'	=> array( 'enable' => 0, 'h_shadow' => '5px' , 'v_shadow' => '5px', 'blur' => '2px' , 'spread' => '2px', 'color' => '#999999', 'inset' => '' )
			),
			
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	if ( $("input.clear_all_button_type:checked").val() == 'button') {
		//$(".clear_all_items_button_styling_container").css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
		//$(".clear_all_items_hyperlink_styling_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden'} );
		$(".clear_all_items_button_styling_container").slideDown();
		$(".clear_all_items_hyperlink_styling_container").slideUp();
	} else {
		//$(".clear_all_items_button_styling_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden'} );
		//$(".clear_all_items_hyperlink_styling_container").css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
		$(".clear_all_items_button_styling_container").slideUp();
		$(".clear_all_items_hyperlink_styling_container").slideDown();
	}
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.clear_all_button_type', function( event, value, status ) {
		//$(".clear_all_items_button_styling_container").hide().css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
		//$(".clear_all_items_hyperlink_styling_container").hide().css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
		if ( status == 'true') {
			$(".clear_all_items_button_styling_container").slideDown();
			$(".clear_all_items_hyperlink_styling_container").slideUp();
		} else {
			$(".clear_all_items_button_styling_container").slideUp();
			$(".clear_all_items_hyperlink_styling_container").slideDown();
		}
	});
});
})(jQuery);
</script>
    <?php	
	}
}

global $wpec_compare_widget_clear_all_items_settings;
$wpec_compare_widget_clear_all_items_settings = new WPEC_Compare_Widget_Clear_All_Items_Settings();

/** 
 * wpec_compare_widget_clear_all_items_settings_form()
 * Define the callback function to show subtab content
 */
function wpec_compare_widget_clear_all_items_settings_form() {
	global $wpec_compare_widget_clear_all_items_settings;
	$wpec_compare_widget_clear_all_items_settings->settings_form();
}

?>