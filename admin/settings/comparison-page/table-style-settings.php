<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
WPEC Comparison Table Style Settings

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

class WPEC_Compare_Comparison_Table_Style_Settings extends WPEC_Compare_Admin_UI
{
	
	/**
	 * @var string
	 */
	private $parent_tab = 'comparison-page';
	
	/**
	 * @var array
	 */
	private $subtab_data;
	
	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'wpec_compare_table_style';
	
	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wpec_compare_table_style';
	
	/**
	 * @var string
	 * You can change the order show of this sub tab in list sub tabs
	 */
	private $position = 3;
	
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
				'success_message'	=> __( 'Table Style successfully saved.', 'wp-ecommerce-compare-products' ),
				'error_message'		=> __( 'Error: Table Style can not save.', 'wp-ecommerce-compare-products' ),
				'reset_message'		=> __( 'Table Style successfully reseted.', 'wp-ecommerce-compare-products' ),
			);
			
			
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
			'name'				=> 'table-style',
			'label'				=> __( 'Table Style', 'wp-ecommerce-compare-products' ),
			'callback_function'	=> 'wpec_compare_comparison_table_style_settings_form',
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
            	'name' 		=> __( 'Table Style', 'wp-ecommerce-compare-products' ),
                'type' 		=> 'heading',
           	),
			array(  
				'name' 		=> __( 'Table Heading Background Colour', 'wp-ecommerce-compare-products' ),
				'desc' 		=> __( 'Default', 'wp-ecommerce-compare-products' ) . ' [default_value]',
				'id' 		=> 'table_heading_bg_colour',
				'type' 		=> 'color',
				'default'	=> '#FFFFFF'
			),
			array(  
				'name' 		=> __( 'Alternate Rows Background Colour', 'wp-ecommerce-compare-products' ),
				'desc' 		=> __( 'Default', 'wp-ecommerce-compare-products' ) . ' [default_value]',
				'id' 		=> 'alt_row_bg_colour',
				'type' 		=> 'color',
				'default'	=> '#F6F6F6'
			),
			array(  
				'name' 		=> __( 'Table Border', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'table_border',
				'type' 		=> 'border_styles',
				'default'	=> array( 'width' => '1px', 'style' => 'solid', 'color' => '#D6D6D6' ),
			),
			array(  
				'name' 		=> __( 'Table Row Padding', 'wp-ecommerce-compare-products' ),
				'id' 		=> 'table_row_padding',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array(  'id' 		=> 'table_row_padding_top',
	 										'name' 		=> __( 'Top', 'wp-ecommerce-compare-products' ),
	 										'class' 	=> '',
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
									array(  'id' 		=> 'table_row_padding_bottom',
	 										'name' 		=> __( 'Bottom', 'wp-ecommerce-compare-products' ),
	 										'class' 	=> '',
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
	 
	 								array(  'id' 		=> 'table_row_padding_left',
	 										'name' 		=> __( 'Left', 'wp-ecommerce-compare-products' ),
	 										'class' 	=> '',
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
									array(  'id' 		=> 'table_row_padding_right',
	 										'name' 		=> __( 'Right', 'wp-ecommerce-compare-products' ),
	 										'class' 	=> '',
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
	 							)
			),
			
        ));
	}
	
}

global $wpec_compare_comparison_table_style_settings;
$wpec_compare_comparison_table_style_settings = new WPEC_Compare_Comparison_Table_Style_Settings();

/** 
 * wpec_compare_comparison_table_style_settings_form()
 * Define the callback function to show subtab content
 */
function wpec_compare_comparison_table_style_settings_form() {
	global $wpec_compare_comparison_table_style_settings;
	$wpec_compare_comparison_table_style_settings->settings_form();
}

?>