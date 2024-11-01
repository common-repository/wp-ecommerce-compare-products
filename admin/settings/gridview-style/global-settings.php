<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
WPEC Compare Grid View Global Settings

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

class WPEC_Compare_Grid_View_Global_Settings extends WPEC_Compare_Admin_UI
{
	
	/**
	 * @var string
	 */
	private $parent_tab = 'product-cards';
	
	/**
	 * @var array
	 */
	private $subtab_data;
	
	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'wpec_compare_grid_view_settings';
	
	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wpec_compare_grid_view_settings';
	
	/**
	 * @var string
	 * You can change the order show of this sub tab in list sub tabs
	 */
	private $position = 1;
	
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
				'success_message'	=> __( 'Product Card Settings successfully saved.', 'wp-ecommerce-compare-products' ),
				'error_message'		=> __( 'Error: Product Card Settings can not save.', 'wp-ecommerce-compare-products' ),
				'reset_message'		=> __( 'Product Card Settings successfully reseted.', 'wp-ecommerce-compare-products' ),
			);
			
		add_action( $this->plugin_name . '-' . $this->form_key . '_settings_end', array( $this, 'include_script' ) );
			
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
			'name'				=> 'product-card-settings',
			'label'				=> __( 'Product Card Settings', 'wp-ecommerce-compare-products' ),
			'callback_function'	=> 'wpec_compare_grid_view_global_settings_form',
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
            	'name' 		=> __( "Show Compare On Product Cards", 'wp-ecommerce-compare-products' ),
                'type' 		=> 'heading',
           	),
			array(  
				'name' 		=> __( "Compare Button / Text", 'wp-ecommerce-compare-products' ),
				'class'		=> 'disable_grid_view_compare',
				'id' 		=> 'disable_grid_view_compare',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 0,
				'checked_value'		=> 0,
				'unchecked_value' 	=> 1,
				'checked_label'		=> __( 'ON', 'wp-ecommerce-compare-products' ),
				'unchecked_label' 	=> __( 'OFF', 'wp-ecommerce-compare-products' ),
			),
			
			array(
            	'name' 		=> __( "Compare Button / Linked text Postion", 'wp-ecommerce-compare-products' ),
				'desc'		=> __('Position applies to all product cards on the Shop, Product Category and Product Tag pages.', 'wp-ecommerce-compare-products' ),
				'class'		=> 'grid_view_compare_activate_container',
                'type' 		=> 'heading',
           	),
			array(  
				'name' 		=> __( 'Button/Link Position relative to Add to Cart Button', 'wp-ecommerce-compare-products' ),
				'desc'		=> __( '<strong>Tip:</strong> Change position if Compare Button/Link does not show on Product Cards.', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'grid_view_button_position',
				'type' 		=> 'switcher_checkbox',
				'default'	=> 'above',
				'checked_value'		=> 'above',
				'unchecked_value'	=> 'below',
				'checked_label' 	=> __( 'Above', 'wp-ecommerce-compare-products' ),
				'unchecked_label'	=> __( 'Below', 'wp-ecommerce-compare-products' ),
			),
			array(  
				'name' 		=> __( 'Button Margin', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'grid_view_button_margin',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array( 
											'id' 		=> 'grid_view_button_margin_top',
	 										'name' 		=> __( 'Top', 'wp-ecommerce-compare-products' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
	 
	 								array(  'id' 		=> 'grid_view_button_margin_bottom',
	 										'name' 		=> __( 'Bottom', 'wp-ecommerce-compare-products' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
											
									array( 
											'id' 		=> 'grid_view_button_margin_left',
	 										'name' 		=> __( 'Left', 'wp-ecommerce-compare-products' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 0 ),
											
									array( 
											'id' 		=> 'grid_view_button_margin_right',
	 										'name' 		=> __( 'Right', 'wp-ecommerce-compare-products' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 0 ),
	 							)
			),

        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
	
	$(document).ready(function() {
		
		if ( $("input.disable_grid_view_compare:checked").val() == '0') {
			$(".grid_view_compare_activate_container").slideDown();
			//$(".grid_view_compare_activate_container").css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
		} else {
			$(".grid_view_compare_activate_container").slideUp();
			//$(".grid_view_compare_activate_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden'} );
		}
		
		$(document).on( "a3rev-ui-onoff_checkbox-switch", '.disable_grid_view_compare', function( event, value, status ) {
			//$(".grid_view_compare_activate_container").hide().css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
			if ( status == 'true' ) {
				$(".grid_view_compare_activate_container").slideDown();
			} else {
				$(".grid_view_compare_activate_container").slideUp();
			}
		});
		
	});
	
})(jQuery);
</script>
    <?php	
	}
	
}

global $wpec_compare_grid_view_global_settings;
$wpec_compare_grid_view_global_settings = new WPEC_Compare_Grid_View_Global_Settings();

/** 
 * wpec_compare_grid_view_global_settings_form()
 * Define the callback function to show subtab content
 */
function wpec_compare_grid_view_global_settings_form() {
	global $wpec_compare_grid_view_global_settings;
	$wpec_compare_grid_view_global_settings->settings_form();
}

?>