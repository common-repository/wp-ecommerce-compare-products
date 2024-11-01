<?php
/**
 * The Template for compare products
 *
 * Override this template by copying it to yourtheme/e-commerce/product-compare.php
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		$wpec_compare_logo = get_option('wpec_compare_logo');
		$suffix	= defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		
		global $wpec_compare_page_style, $wpec_compare_close_window_button_style, $wpec_compare_viewcart_style;
		global $wpec_compare_comparison_page_global_settings;
		global $wpec_compare_print_page_settings;
		
?>
<!doctype html>
<html>
<head>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
<?php global $post; ?>
<?php $site_url = str_replace( 'http:', '', str_replace( 'https:', '', get_option('siteurl') ) ); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=0.8; maximum-scale=1.0; minimum-scale=0.5;">
<title><?php echo $post->post_title; ?> | <?php bloginfo('name'); ?></title>
<meta name="description" content="Default Description" />
<meta name="keywords" content="<?php bloginfo('name'); ?>" />
<meta name="robots" content="INDEX,FOLLOW" />
<script type="text/javascript" src="<?php echo $site_url; ?>/wp-includes/js/jquery/jquery.js"></script>
<script src="<?php echo ECCP_JS_URL; ?>/jquery.printElement.js"></script>
<?php do_action('wpeccp_comparison_page_header'); ?>
</head>
<body>
		<?php
		$print_custom_class = '';
		$print_button_text = $wpec_compare_print_page_settings['print_link_text'];
		$print_button_class = 'compare_print_link_type';
		if ($wpec_compare_print_page_settings['print_button_type'] == 'button') {
			$print_button_class = 'compare_print_button_type';
			$print_custom_class = '';
			$print_button_text = $wpec_compare_print_page_settings['button_text'];
		}
		
		$close_custom_class = '';
		$close_button_text = $wpec_compare_close_window_button_style['close_link_text'];
		$close_button_class = 'compare_close_link_type';
		if ($wpec_compare_close_window_button_style['close_button_type'] == 'button') {
			$close_button_class = 'compare_close_button_type';
			$close_custom_class = '';
			$close_button_text = $wpec_compare_close_window_button_style['button_text'];
		}
		?>
    	<div class="compare_print_container"><div id="compare_popup_container" class="compare_popup_container">
        <link type="text/css" href="<?php echo ECCP_JS_URL; ?>/fixedcolumntable/fixedcolumntable.css" rel="stylesheet" />
       
        <?php 
		$_upload_dir = wp_upload_dir();
		if ( file_exists( $_upload_dir['basedir'] . '/sass/wpsc_product_comparison.min.css' ) )
			echo '<link media="screen" type="text/css" href="' . str_replace(array('http:','https:'), '', $_upload_dir['baseurl'] ) . '/sass/wpsc_product_comparison.min.css" rel="stylesheet" />' . "\n";
		else
			include( ECCP_DIR. '/templates/product_comparison_style.php' );
		?>
        
        <?php do_action('wpeccp_comparison_table_before'); ?>
				<div class="compare_heading">
					<?php if ( $wpec_compare_logo != '') { ?>
                    <img class="compare_logo" src="<?php echo $wpec_compare_logo; ?>" alt="<?php _e('Compare Products', 'wp-ecommerce-compare-products' ); ?>" />
                    <?php } else { ?> 
                    <h1><?php _e('Compare Products', 'wp-ecommerce-compare-products' ); ?></h1>
                    <?php } ?>
                    <div class="print_control">
                        <?php if ($wpec_compare_comparison_page_global_settings['open_compare_type'] != 'new_page') { ?><a class="wpec_compare_close <?php echo $close_button_class ;?> <?php echo $close_custom_class ;?>" href="#" onClick="window.close();"><span><?php echo $close_button_text ;?></span></a><?php } ?>
                        <?php if ( $wpec_compare_print_page_settings['enable_print_page_feature'] == 1 ) { ?>
                        <a id="wpec_compare_print" class="wpec_compare_print <?php echo $print_button_class ;?> <?php echo $print_custom_class ;?>" href="#"><span><?php echo $print_button_text ;?></span></a>
                        <div style="clear:both;"></div>
                    	<div class="wpec_compare_print_msg"><?php echo $wpec_compare_print_page_settings['print_message_text'];?></div>
                        <?php } ?>
                    </div>
                </div>
            	<div style="clear:both;"></div>
                <div class="popup_wpec_compare_widget_loader" style="display:none;"><img src="<?php echo ECCP_IMAGES_URL; ?>/ajax-loader.gif" border=0 /></div>
                <div class="compare_popup_wrap">
                    <?php echo WPEC_Compare_Functions::get_compare_list_html_popup();?>
                </div>
        <?php do_action('wpeccp_comparison_table_after'); ?>
        </div>
        </div>
        <?php
			$wpeccp_compare_events = wp_create_nonce("wpeccp-compare-events");
		?>
        <script type="text/javascript">
			jQuery(document).ready(function($) {
						var ajax_url = "<?php echo admin_url( 'admin-ajax.php' , 'relative');?>";
						<?php if ( $wpec_compare_print_page_settings['enable_print_page_feature'] == 1 ) { ?>
						$(document).on("click", "#wpec_compare_print", function(){
							$(".compare_print_container").printElement({
								printBodyOptions:{
								styleToAdd:"overflow:visible !important;",
								classNameToAdd : "compare_popup_print"
								}
							});
						});
						<?php } ?>
						$(document).on("click", ".wpec_compare_popup_remove_product", function(){
							var popup_remove_product_id = $(this).attr("rel");
							$(".popup_wpec_compare_widget_loader").show();
							$(".compare_popup_wrap").html("");
							$("#bg-labels").remove();
							var data = {
								action: 		"wpeccp_remove_from_popup_compare",
								product_id: 	popup_remove_product_id,
								security: 		"<?php echo $wpeccp_compare_events; ?>"
							};
							$.post( ajax_url, data, function(response) {
								$("body").trigger("wpeccp_popup_remove_product_from_compare_list", [popup_remove_product_id]);
								data = {
									action: 		"wpeccp_update_compare_popup",
									security: 		"<?php echo $wpeccp_compare_events; ?>"
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".popup_wpec_compare_widget_loader").hide();
									$(".compare_popup_wrap").html(result);
								});
								$("body").trigger("wpeccp_update_compare_popup");
								
								data = {
									action: 		"wpeccp_update_compare_widget",
									security: 		"<?php echo $wpeccp_compare_events; ?>"
								};
								$.post( ajax_url, data, function(response) {
									new_widget = $.parseJSON( response );
									$(".wpec_compare_widget_container").html(new_widget);
								});
							});
						});
						$(document).on("click", ".add_to_cart_button", function() {
							var $thisbutton = $(this);
							form_values = $thisbutton.parent('form.product_form').serialize();
							$thisbutton.removeClass('added');
							
							$.post( ajax_url, form_values, function(returned_data) {
								$thisbutton.addClass('added');
								if ( $thisbutton.parent().find('.added_to_cart').size() == 0 )
									$thisbutton.after( ' <a href="<?php echo esc_url( get_option( 'shopping_cart_url' ) ); ?>" class="added_to_cart" title="<?php echo $wpec_compare_viewcart_style['viewcart_text']; ?>" target="_blank"><?php echo $wpec_compare_viewcart_style['viewcart_text']; ?></a>' );
								$thisbutton.parent('form.product_form').siblings('.virtual_added_to_cart').remove();
							});
							return false;
						});
			});
		</script>
        <?php do_action('wpeccp_comparison_page_footer'); ?>
        <script src="<?php echo ECCP_JS_URL; ?>/fixedcolumntable/fixedcolumntable.js"></script>
</body>
</html>
