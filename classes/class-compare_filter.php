<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
/**
 * WPEC Compare Hook Filter
 *
 * Table Of Contents
 *
 * register_admin_screen()
 * template_loader()
 * add_google_fonts()
 * include_customized_style()
 * wpec_ajax_add_compare_button()
 * add_compare_button()
 * show_compare_button()
 * show_compare_fields()
 * wpeccp_add_to_compare()
 * wpeccp_remove_from_popup_compare()
 * wpeccp_update_compare_popup()
 * wpeccp_update_compare_widget()
 * wpeccp_update_total_compare()
 * wpeccp_remove_from_compare()
 * wpeccp_clear_compare()
 * wpec_compare_footer_script()
 * auto_create_compare_category()
 * auto_create_compare_feature()
 * a3_wp_admin()
 * admin_sidebar_menu_css()
 * plugin_extra_links()
 */
class WPEC_Compare_Hook_Filter
{
	
	public static function register_admin_screen () {
		if (get_option('a3rev_wpeccp_just_confirm') == 1) {
			WPEC_Compare_Data::automatic_add_features();
			WPEC_Compare_Categories_Data::automatic_add_compare_categories();
			update_option('a3rev_wpeccp_just_confirm', 0);
		}
		
		$product_comparison = add_menu_page( __('Compare Products', 'wp-ecommerce-compare-products' ), __('WPEC Compare', 'wp-ecommerce-compare-products' ), 'manage_options', 'wpsc-compare-features', array( 'WPEC_Compare_Features_Panel', 'admin_screen' ), null, '25.222');
		
		$compare_features = add_submenu_page('wpsc-compare-features', __( 'Compare Category & Feature', 'wp-ecommerce-compare-products' ), __( 'Category & Feature', 'wp-ecommerce-compare-products' ), 'manage_options', 'wpsc-compare-features', array( 'WPEC_Compare_Features_Panel', 'admin_screen' ) );
		
		$compare_products = add_submenu_page('wpsc-compare-features', __( 'Compare Products Manager', 'wp-ecommerce-compare-products' ), __( 'Product Manager', 'wp-ecommerce-compare-products' ), 'manage_options', 'wpsc-compare-products', array( 'WPEC_Compare_Products_Class', 'wpeccp_products_manager' ) );
				
	} // End register_admin_screen()
	
	public static function template_loader( $template ) {
		global $product_compare_id;
		global $post;

		if ( $product_compare_id == $post->ID ) {

			$file 	= 'product-compare.php';
			$find[] = $file;
			$find[] = apply_filters( 'ecommerce_compare_template_url', 'e-commerce/' ) . $file;
			
			$template = locate_template( $find );
			if ( ! $template ) $template = ECCP_FILE_PATH . '/templates/' . $file;

		}
	
		return $template;
	}
	
	public static function nocache_ours_page() {
		global $product_compare_id;
		
		$wpeccp_page_uris   = array();
		// Exclude querystring when using page ID
		$wpeccp_page_uris[] = 'p=' . $product_compare_id;
		$wpeccp_page_uris[] = 'page_id=' . $product_compare_id;
		
		// Exclude permalinks
		$comparision_page      = get_post( $product_compare_id );
		
		if ( ! is_null( $comparision_page ) )
			$wpeccp_page_uris[] = '/' . $comparision_page->post_name;
		
		if ( is_array( $wpeccp_page_uris ) ) {
			foreach( $wpeccp_page_uris as $uri ) {
				if ( strstr( $_SERVER['REQUEST_URI'], $uri ) ) {
					if ( ! defined( 'DONOTCACHEPAGE' ) )
						define( "DONOTCACHEPAGE", "true" );
		
					if ( ! defined( 'DONOTCACHEOBJECT' ) )
						define( "DONOTCACHEOBJECT", "true" );
		
					if ( ! defined( 'DONOTCACHEDB' ) )
						define( "DONOTCACHEDB", "true" );
		
					nocache_headers();
				}
			}
		}
	}
	
	public static function add_google_fonts() {
		global $wpec_compare_fonts_face;
		global $wpec_compare_product_page_button_style, $wpec_compare_product_page_view_compare_style, $wpec_compare_widget_style, $wpec_compare_widget_title_style, $wpec_compare_widget_button_style, $wpec_compare_widget_clear_all_style, $wpec_compare_grid_view_button_style, $wpec_compare_gridview_view_compare_style;
		$google_fonts = array( 
							$wpec_compare_product_page_button_style['product_compare_link_font']['face'], 
							$wpec_compare_product_page_button_style['button_font']['face'], 
							$wpec_compare_product_page_view_compare_style['product_view_compare_link_font']['face'], 
							$wpec_compare_product_page_view_compare_style['button_font']['face'], 
							$wpec_compare_widget_style['text_font']['face'], 
							$wpec_compare_widget_title_style['widget_title_font']['face'],
							$wpec_compare_widget_title_style['total_font']['face'],
							$wpec_compare_widget_button_style['compare_widget_link_font']['face'],
							$wpec_compare_widget_button_style['button_font']['face'],
							$wpec_compare_widget_clear_all_style['clear_text_font']['face'],
							$wpec_compare_widget_clear_all_style['clear_all_button_font']['face'],
							$wpec_compare_grid_view_button_style['link_font']['face'],
							$wpec_compare_grid_view_button_style['button_font']['face'],
							$wpec_compare_gridview_view_compare_style['gridview_view_compare_link_font']['face'],
						);
						
		$google_fonts = apply_filters( 'wpec_compare_google_fonts', $google_fonts );
		
		$wpec_compare_fonts_face->generate_google_webfonts( $google_fonts );
	}
	
	public static function add_google_fonts_comparison_page() {
		global $wpec_compare_fonts_face;
		global $wpec_compare_page_style, $wpec_compare_table_content_style, $wpec_compare_product_prices_style, $wpec_compare_addtocart_style, $wpec_compare_viewcart_style, $wpec_compare_print_page_settings, $wpec_compare_close_window_button_style;
		$google_fonts = array( 
							$wpec_compare_page_style['no_product_message_font']['face'],
							$wpec_compare_table_content_style['feature_title_font']['face'],
							$wpec_compare_table_content_style['content_font']['face'],
							$wpec_compare_table_content_style['empty_font']['face'],
							$wpec_compare_table_content_style['product_name_font']['face'],
							$wpec_compare_product_prices_style['price_font']['face'],
							$wpec_compare_addtocart_style['addtocart_link_font']['face'],
							$wpec_compare_addtocart_style['addtocart_button_font']['face'],
							$wpec_compare_viewcart_style['viewcart_link_font']['face'],
							$wpec_compare_print_page_settings['print_message_font']['face'],
							$wpec_compare_print_page_settings['print_link_font']['face'],
							$wpec_compare_print_page_settings['button_font']['face'],
							$wpec_compare_close_window_button_style['close_link_font']['face'],
							$wpec_compare_close_window_button_style['button_font']['face'],
						);
						
		$google_fonts = apply_filters( 'wpec_comparison_page_google_fonts', $google_fonts );
		
		$wpec_compare_fonts_face->generate_google_webfonts( $google_fonts );
	}
	
	public static function include_customized_style() {
		include( ECCP_DIR. '/templates/customized_style.php' );
	}
	
	public static function wpec_ajax_add_compare_button() {
		global $post;
		global $wpec_compare_product_page_settings;
		global $wpec_compare_grid_view_settings;
		global $wpec_compare_comparison_page_global_settings;
		global $product_compare_id;
		$product_id = $post->ID;
		if ( (is_singular('wpsc-product') && $wpec_compare_product_page_settings['disable_product_page_compare'] == 1 ) || (!is_singular('wpsc-product') && $wpec_compare_grid_view_settings['disable_grid_view_compare'] == 1) ) return;
		
		if ( is_singular('wpsc-product') && $wpec_compare_product_page_settings['auto_add'] == 'no') return;
		
		if ($post->post_type == 'wpsc-product' && WPEC_Compare_Functions::check_product_activate_compare($product_id) && WPEC_Compare_Functions::check_product_have_cat($product_id) ) {
			
			$widget_compare_popup_view_button = '';
			if ( $wpec_compare_comparison_page_global_settings['open_compare_type'] != 'new_page' ) $widget_compare_popup_view_button = 'wpec_bt_view_compare_popup';
			
			if ( is_singular('wpsc-product') ) {
				
				global $wpec_compare_product_page_button_style;
				global $wpec_compare_product_page_view_compare_style;
				
				$product_compare_custom_class = '';
				$product_compare_text = $wpec_compare_product_page_button_style['product_compare_button_text'];
				$product_compare_class = 'wpec_bt_compare_this_button';
				if ($wpec_compare_product_page_button_style['product_compare_button_type'] == 'link') {
					$product_compare_custom_class = '';
					$product_compare_text = $wpec_compare_product_page_button_style['product_compare_link_text'];
					$product_compare_class = 'wpec_bt_compare_this_link';
				}
				
				$view_compare_html = '';
				if ($wpec_compare_product_page_view_compare_style['disable_product_view_compare'] == 0) {
					$product_view_compare_custom_class = '';
					$product_view_compare_text = $wpec_compare_product_page_view_compare_style['product_view_compare_link_text'];
					$product_view_compare_class = 'wpec_bt_view_compare_link';
					if ($wpec_compare_product_page_view_compare_style['product_view_compare_button_type'] == 'button') {
						$product_view_compare_custom_class = '';
						$product_view_compare_text = $wpec_compare_product_page_view_compare_style['product_view_compare_button_text'];
						$product_view_compare_class = 'wpec_bt_view_compare_button';
					}
					$product_compare_page = get_permalink($product_compare_id);
					if ($wpec_compare_comparison_page_global_settings['open_compare_type'] != 'new_page') {
						$product_compare_page = '#';
					}
					
					$view_compare_html = '<div style="clear:both;"></div><a class="wpec_bt_view_compare '.$widget_compare_popup_view_button.' '.$product_view_compare_class.' '.$product_view_compare_custom_class.'" href="'.$product_compare_page.'" target="_blank" alt="" title="" style="display:none;">'.$product_view_compare_text.'</a>';
				}
				
				$compare_html = '<div class="wpec_compare_button_container"><a class="wpec_bt_compare_this '.$product_compare_class.' '.$product_compare_custom_class.'" id="wpec_bt_compare_this_'.$product_id.'">'.$product_compare_text.'</a>' . $view_compare_html . '<input type="hidden" id="input_wpec_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
				
				$button_position = 'before';
				if ($wpec_compare_product_page_settings['product_page_button_position'] == 'below') $button_position = 'after';
				
			} else {
				
				global $wpec_compare_grid_view_button_style;
				global $wpec_compare_gridview_view_compare_style;
				
				$compare_grid_view_custom_class = '';
				$compare_grid_view_text = $wpec_compare_grid_view_button_style['button_text'];
				$compare_grid_view_class = 'wpec_bt_compare_this_button';
				if ($wpec_compare_grid_view_button_style['grid_view_button_type'] == 'link') {
					$compare_grid_view_custom_class = '';
					$compare_grid_view_text = $wpec_compare_grid_view_button_style['link_text'];
					$compare_grid_view_class = 'wpec_bt_compare_this_link';
				}
				
				$view_compare_html = '';
				if ($wpec_compare_gridview_view_compare_style['disable_gridview_view_compare'] == 0) {
					$gridview_view_compare_custom_class = '';
					$gridview_view_compare_text = $wpec_compare_gridview_view_compare_style['gridview_view_compare_link_text'];
					$gridview_view_compare_class = 'wpec_bt_view_compare_link';
					
					$product_compare_page = get_permalink($product_compare_id);
					if ($wpec_compare_comparison_page_global_settings['open_compare_type'] != 'new_page') {
						$product_compare_page = '#';
					}
					$view_compare_html = '<div style="clear:both;"></div><a class="wpec_bt_view_compare '.$widget_compare_popup_view_button.' '.$gridview_view_compare_class.' '.$gridview_view_compare_custom_class.'" href="'.$product_compare_page.'" target="_blank" alt="" title="" style="display:none;">'.$gridview_view_compare_text.'</a>';
				}
				
				$compare_html = '<div class="wpec_grid_compare_button_container"><a class="wpec_bt_compare_this '.$compare_grid_view_class.' '.$compare_grid_view_custom_class.'" id="wpec_bt_compare_this_'.$product_id.'">'.$compare_grid_view_text.'</a>' . $view_compare_html . '<input type="hidden" id="input_wpec_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
				
				$button_position = 'before';
				if ($wpec_compare_grid_view_settings['grid_view_button_position'] == 'below') $button_position = 'after';
				
			}
			$script_add = '<script type="text/javascript">
				(function($){		
					$(function(){
						if($("#wpec_bt_compare_this_'.$product_id.'").length <= 0){
							if($("input#product_'.$product_id.'_submit_button").length > 0){
								$("input#product_'.$product_id.'_submit_button").'.$button_position.'(\''.$compare_html.'\');
							}else if($(".product_view_'.$product_id.'").length > 0){
								$(".product_view_'.$product_id.'").find(".more_details").'.$button_position.'(\''.$compare_html.'\');
							}else{
								$("input.wpsc_buy_button").'.$button_position.'(\''.$compare_html.'\');
							}
						}
					});		  
				})(jQuery);
				</script>';
			echo $script_add;
		}
	}
	
	public static function add_compare_button($product_id='') {
		global $post;
		global $wpec_compare_product_page_button_style;
		global $wpec_compare_comparison_page_global_settings;
		global $wpec_compare_product_page_view_compare_style;
		global $product_compare_id;
		extract($wpec_compare_product_page_button_style);
		if (trim($product_id) == '') $product_id = $post->ID;
		$post_type = get_post_type($product_id);
		$html = '';
		if ($post_type == 'wpsc-product' && WPEC_Compare_Functions::check_product_activate_compare($product_id) && WPEC_Compare_Functions::check_product_have_cat($product_id)) {
			
			$widget_compare_popup_view_button = '';
			if ( $wpec_compare_comparison_page_global_settings['open_compare_type'] != 'new_page' ) $widget_compare_popup_view_button = 'wpec_bt_view_compare_popup';
			
			$product_compare_custom_class = '';
			$product_compare_text = $wpec_compare_product_page_button_style['product_compare_button_text'];
			$product_compare_class = 'wpec_bt_compare_this_button';
			if ($wpec_compare_product_page_button_style['product_compare_button_type'] == 'link') {
				$product_compare_custom_class = '';
				$product_compare_text = $wpec_compare_product_page_button_style['product_compare_link_text'];
				$product_compare_class = 'wpec_bt_compare_this_link';
			}
			
			$view_compare_html = '';
			if ($wpec_compare_product_page_view_compare_style['disable_product_view_compare'] == 0) {
				$product_view_compare_custom_class = '';
				$product_view_compare_text = $wpec_compare_product_page_view_compare_style['product_view_compare_link_text'];
				$product_view_compare_class = 'wpec_bt_view_compare_link';
				if ($wpec_compare_product_page_view_compare_style['product_view_compare_button_type'] == 'button') {
					$product_view_compare_custom_class = '';
					$product_view_compare_text = $wpec_compare_product_page_view_compare_style['product_view_compare_button_text'];
					$product_view_compare_class = 'wpec_bt_view_compare_button';
				}
				$product_compare_page = get_permalink($product_compare_id);
				if ($wpec_compare_comparison_page_global_settings['open_compare_type'] != 'new_page') {
					$product_compare_page = '#';
				}
				$view_compare_html = '<div style="clear:both;"></div><a class="wpec_bt_view_compare '.$widget_compare_popup_view_button.' '.$product_view_compare_class.' '.$product_view_compare_custom_class.'" href="'.$product_compare_page.'" target="_blank" alt="" title="" style="display:none;">'.$product_view_compare_text.'</a>';
			}
			
			$html .= '<div class="wpec_compare_button_container"><a class="wpec_bt_compare_this '.$product_compare_class.' '.$product_compare_custom_class.'" id="wpec_bt_compare_this_'.$product_id.'">'.$product_compare_text.'</a>' . $view_compare_html . '<input type="hidden" id="input_wpec_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
		}
		
		return $html;
	}
	
	public static function show_compare_button() {
		global $wpec_compare_product_page_settings;
		if ($wpec_compare_product_page_settings['auto_add'] == 'yes') {
			echo '<div class="wpsc_buy_button_container">'.WPEC_Compare_Hook_Filter::add_compare_button().'</div>';
		}
	}
	
	public static function show_compare_fields($product_id='', $use_table_style=true) {
		global $wp_embed;
		add_shortcode( 'embed', array( $wp_embed, 'shortcode' ) );
		
		global $post, $wpec_compare_table_content_style;
		if(trim($product_id) == '') $product_id = $post->ID;
		$html = '';
		$variations_list = WPEC_Compare_Functions::get_variations($product_id);
		if (is_array($variations_list) && count($variations_list) > 0) {
			foreach ($variations_list as $variation_id) {
				if (WPEC_Compare_Functions::check_product_activate_compare($variation_id) && WPEC_Compare_Functions::check_product_have_cat($variation_id)) {
					$html .= '<div class="compare_product_variation"><h2>'.get_the_title($variation_id).'</h2></div>';
					if ($use_table_style) 
						$html .= '<table class="compare_featured_fields shop_attributes">'; 
					else
						$html .= '<ul class="compare_featured_fields">';
					$fixed_width = ' width="60%"';
					$compare_category = get_post_meta( $variation_id, '_wpsc_compare_category', true );
					$compare_fields = WPEC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'",'cf.field_order ASC');
					foreach ($compare_fields as $field_data) {
						$field_value = get_post_meta( $variation_id, '_wpsc_compare_'.$field_data->field_key, true );
						if (is_serialized($field_value)) $field_value = maybe_unserialize($field_value);
						if (is_array($field_value) && count($field_value) > 0) $field_value = implode(', ', $field_value);
						elseif (is_array($field_value) && count($field_value) < 0) $field_value = $wpec_compare_table_content_style['empty_text'];
						if (trim($field_value) == '') $field_value = $wpec_compare_table_content_style['empty_text'];
						if (trim($field_data->field_unit) != '') $field_unit = ' <span class="compare_featured_unit">('.trim($field_data->field_unit).')</span>';
						if ( $field_data->field_type == 'wp-video' ) {
							if ( $field_value != $wpec_compare_table_content_style['empty_text'] ) {
								$field_value = '<div class="wpeccp_video_type_container">'.do_shortcode( '[embed]'. trim( strip_shortcodes( $field_value ) ) . '[/embed]' ).'</div>';
							}
						} elseif ( $field_data->field_type == 'wp-audio' ) {
							if ( $field_value != $wpec_compare_table_content_style['empty_text'] ) {
								$field_value = '<div class="wpeccp_audio_type_container">'.do_shortcode( '[audio src="'. trim( strip_shortcodes( $field_value ) ) . '" ]' ).'</div>';
							}
						}
						if ($use_table_style) 
							$html .= '<tr><th><span class="compare_featured_name">'.stripslashes($field_data->field_name).'</span>'.$field_unit.'</th><td '.$fixed_width.'><div class="compare_featured_value">'.$field_value.'</div></td></tr>';
						else
							$html .= '<li class="compare_featured_item"><span class="compare_featured_name"><strong>'.stripslashes($field_data->field_name).'</strong>'.$field_unit.'</span> : <span class="compare_featured_value">'.$field_value.'</span></li>';
						$fixed_width = '';
					}
					if ($use_table_style) 
						$html .= '</table>';
					else 
						$html .= '</ul>';
				}
			}
		} elseif (WPEC_Compare_Functions::check_product_activate_compare($product_id) && WPEC_Compare_Functions::check_product_have_cat($product_id)) {
			$compare_category = get_post_meta( $product_id, '_wpsc_compare_category', true );
			$compare_fields = WPEC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'",'cf.field_order ASC');
			if (is_array($compare_fields) && count($compare_fields)>0) {
				if ($use_table_style) 
					$html .= '<table class="compare_featured_fields shop_attributes">'; 
				else
					$html .= '<ul class="compare_featured_fields">';
				$fixed_width = ' width="60%"';
				foreach ($compare_fields as $field_data) {
					$field_value = get_post_meta( $product_id, '_wpsc_compare_'.$field_data->field_key, true );
					if (is_serialized($field_value)) $field_value = maybe_unserialize($field_value);
					if (is_array($field_value) && count($field_value) > 0) $field_value = implode(', ', $field_value);
					elseif (is_array($field_value) && count($field_value) < 0) $field_value = $wpec_compare_table_content_style['empty_text'];
					if (trim($field_value) == '') $field_value = $wpec_compare_table_content_style['empty_text'];
					if (trim($field_data->field_unit) != '') $field_unit = ' <span class="compare_featured_unit">('.trim(stripslashes($field_data->field_unit)).')</span>';
					if ( $field_data->field_type == 'wp-video' ) {
						if ( $field_value != $wpec_compare_table_content_style['empty_text'] ) {
							$field_value = '<div class="wpeccp_video_type_container">'.do_shortcode( '[embed]'. trim( strip_shortcodes( $field_value ) ) . '[/embed]' ).'</div>';
						}
					} elseif ( $field_data->field_type == 'wp-audio' ) {
						if ( $field_value != $wpec_compare_table_content_style['empty_text'] ) {
							$field_value = '<div class="wpeccp_audio_type_container">'.do_shortcode( '[audio src="'. trim( strip_shortcodes( $field_value ) ) . '" ]' ).'</div>';
						}
					}
					if ($use_table_style) 
						$html .= '<tr><th><span class="compare_featured_name">'.stripslashes($field_data->field_name).'</span>'.$field_unit.'</th><td '.$fixed_width.'><div class="compare_featured_value">'.$field_value.'</div></td></tr>';
					else
						$html .= '<li class="compare_featured_item"><span class="compare_featured_name"><strong>'.stripslashes($field_data->field_name).'</strong>'.$field_unit.'</span> : <span class="compare_featured_value">'.$field_value.'</span></li>';
					$fixed_width = '';
				}
				if ($use_table_style) 
					$html .= '</table>';
				else 
					$html .= '</ul>';
			}
		}
		return $html;
	}
	
	public static function wpeccp_add_to_compare() {
		
		$product_id 	= $_REQUEST['product_id'];
		WPEC_Compare_Functions::add_product_to_compare_list($product_id);
		
		die();
	}
	
	public static function wpeccp_remove_from_popup_compare() {
	
		$product_id 	= $_REQUEST['product_id'];
		WPEC_Compare_Functions::delete_product_on_compare_list($product_id);
		
		die();
	}
	
	public static function wpeccp_update_compare_popup() {
		global $post;
		global $product_compare_id;
		if ( $product_compare_id < 1 || $product_compare_id == NULL ) $product_compare_id = get_option('product_compare_id'); 
		$post = get_post( $product_compare_id );
		
		$result = WPEC_Compare_Functions::get_compare_list_html_popup();
		$result .= '<script src="'. ECCP_JS_URL.'/fixedcolumntable/fixedcolumntable.js"></script>';
		echo json_encode( $result );
		die();
	}
	
	public static function wpeccp_update_compare_widget() {
		$result = WPEC_Compare_Functions::get_compare_list_html_widget();
		echo json_encode( $result );
		die();
	}
	
	public static function wpeccp_update_total_compare() {
		$result = WPEC_Compare_Functions::get_total_compare_list();
		echo json_encode( $result );
		die();
	}
	
	public static function wpeccp_remove_from_compare() {
		$product_id 	= $_REQUEST['product_id'];
		WPEC_Compare_Functions::delete_product_on_compare_list($product_id);
		die();
	}
	
	public static function wpeccp_clear_compare() {
		WPEC_Compare_Functions::clear_compare_list();
		die();
	}
		
	public static function wpec_compare_footer_script(){
		global $product_compare_id;
		global $wpec_compare_comparison_page_global_settings;
		$wpeccp_compare_events = wp_create_nonce("wpeccp-compare-events");
		
		$script_add_on = '';
		$script_add_on .= '<script type="text/javascript">
				jQuery(document).ready(function($) {
						var ajax_url = "'. admin_url( 'admin-ajax.php', 'relative' ) .'";
						wpec_compare_widget_load();';
						
			$script_add_on .= '
						$(document).on("click", ".wpec_compare_popup_button_go, .wpec_bt_view_compare_popup", function (event){
							var compare_url = "'.get_permalink($product_compare_id).'";
							window.open(compare_url, "'.__('Product_Comparison', 'wp-ecommerce-compare-products' ).'", "scrollbars=1, width=980, height=650");
							event.preventDefault();
							return false;
					 
					  });';

		$script_add_on .= '
						$(document).on("click", ".wpec_bt_compare_this", function(){
							var bt_compare_current = $(this);
							var product_id = $("#input_"+$(this).attr("id")).val();
							$(".wpec_compare_widget_loader").show();
							$(".wpec_compare_widget_container").html("");
							bt_compare_current.removeClass("compared");
							bt_compare_current.siblings(".wpec_bt_view_compare").hide();
							var data = {
								action: 		"wpeccp_add_to_compare",
								product_id: 	product_id,
								security: 		"'.$wpeccp_compare_events.'"
							};
							$.post( ajax_url, data, function(response) {
								//alert(response);
								bt_compare_current.addClass("compared");
								bt_compare_current.siblings(".wpec_bt_view_compare").show();
								data = {
									action: 		"wpeccp_update_compare_widget",
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".wpec_compare_widget_loader").hide();
									$(".wpec_compare_widget_container").html(result);
								});
								$("body").trigger("wpeccp_add_product_to_compare_list", [product_id]);
								wpec_update_total_compare_list();
							});							
						});
						
						$(document).on("click", ".wpec_compare_remove_product", function(){
							var remove_product_id = $(this).attr("rel");
							$(".wpec_compare_widget_loader").show();
							$(".wpec_compare_widget_container").html("");
							var data = {
								action: 		"wpeccp_remove_from_compare",
								product_id: 	remove_product_id,
								security: 		"'.$wpeccp_compare_events.'"
							};
							$.post( ajax_url, data, function(response) {
								data = {
									action: 		"wpeccp_update_compare_widget",
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".wpec_compare_widget_loader").hide();
									$(".wpec_compare_widget_container").html(result);
								});
								$("body").trigger("wpeccp_remove_product_from_compare_list", [remove_product_id]);
								wpec_update_total_compare_list();
							});
						});
						$(document).on("click", ".wpec_compare_clear_all", function(){
							$(".wpec_compare_widget_loader").show();
							$(".wpec_compare_widget_container").html("");
							var data = {
								action: 		"wpeccp_clear_compare",
								security: 		"'.$wpeccp_compare_events.'"
							};
							$.post( ajax_url, data, function(response) {
								data = {
									action: 		"wpeccp_update_compare_widget",
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".wpec_compare_widget_loader").hide();
									$(".wpec_compare_widget_container").html(result);
								});
								$("body").trigger("wpeccp_clear_compare_list");
								wpec_update_total_compare_list();
							});
						});
						
						function wpec_update_total_compare_list(){
							var data = {
								action: 		"wpeccp_update_total_compare",
							};
							$.post( ajax_url, data, function(response) {
								total_compare = $.parseJSON( response );
								$("#total_compare_product").html(total_compare);
								$("body").trigger("wpeccp_update_total_compare_list");
							});
						}
						
						function wpec_compare_widget_load() {
							$(".wpec_compare_widget_loader").show();
							$(".wpec_compare_widget_container").html("");
							var data = {
								action: 		"wpeccp_update_compare_widget",
							};
							$.post( ajax_url, data, function(response) {
								result = $.parseJSON( response );
								$(".wpec_compare_widget_loader").hide();
								$(".wpec_compare_widget_container").html(result);
							});
							$("body").trigger("wpeccp_compare_widget_load");
							wpec_update_total_compare_list();
						}
					});		  
				</script>';
		echo $script_add_on;
	}
		
	public static function auto_create_compare_category($term_id) {
		$term = get_term( $term_id, 'wpsc_product_category' );
		$check_existed = WPEC_Compare_Categories_Data::get_count("category_name='".trim($term->name)."'");
		if ($check_existed < 1 ) {
			WPEC_Compare_Categories_Data::insert_row(array('category_name' => trim(addslashes($term->name))));
		}
	}
	
	public static function auto_create_compare_feature($term_id) {
		$term = get_term( $term_id, 'wpsc-variation' );
		$check_existed = WPEC_Compare_Data::get_count("field_name='".trim($term->name)."'");
		if ($check_existed < 1 && $term->parent == 0 ) {
			WPEC_Compare_Data::insert_row(array('field_name' => trim(addslashes($term->name)), 'field_type' => 'input-text', 'field_unit' => '', 'default_value' => '' ) );
		}
	}
	
	public static function wpeccp_add_wp_media_lib_scripts() {
		$site_url = str_replace( 'http:', '', str_replace( 'https:', '', get_option('siteurl') ) );
		?>
        <link rel="stylesheet" href="<?php echo $site_url; ?>/wp-includes/js/mediaelement/mediaelementplayer.min.css">
		<link rel="stylesheet" href="<?php echo $site_url; ?>/wp-includes/js/mediaelement/wp-mediaelement.css">
        <?php
	}
	
	public static function a3_wp_admin() {
		wp_enqueue_style( 'a3rev-wp-admin-style', ECCP_CSS_URL . '/a3_wp_admin.css' );
	}
	
	public static function admin_sidebar_menu_css() {
		wp_enqueue_style( 'a3rev-wpec-cp-admin-sidebar-menu-style', ECCP_CSS_URL . '/admin_sidebar_menu.css' );
	}
	
	public static function plugin_extra_links($links, $plugin_name) {
		if ( $plugin_name != ECCP_NAME) {
			return $links;
		}
		$links[] = '<a href="http://docs.a3rev.com/user-guides/wp-e-commerce/wpec-compare-products/" target="_blank">'.__('Documentation', 'wp-ecommerce-compare-products' ).'</a>';
		$links[] = '<a href="http://wordpress.org/support/plugin/wp-ecommerce-compare-products/" target="_blank">'.__('Support', 'wp-ecommerce-compare-products' ).'</a>';
		return $links;
	}

	public static function settings_plugin_links($actions) {
		$actions = array_merge( array( 'settings' => '<a href="admin.php?page=wpsc-compare-settings">' . __( 'Settings', 'wp-ecommerce-compare-products' ) . '</a>' ), $actions );

		return $actions;
	}
}
?>