<?php
/*
Plugin Name: WP e-Commerce Compare Products Pro
Description: Compare Products uses your existing WP e-Commerce Product Categories and Product Variations to create Compare Product Features for all your products. A sidebar Compare basket is created that users add products to and view the Comparison in a Compare this pop-up screen.
Version: 3.0.0
Author: a3rev Software
Author URI: https://a3rev.com/
Text Domain: wp-ecommerce-compare-products
Domain Path: /languages
License: This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007

	WP e-Commerce Compare Products Pro. Plugin for the WP e-Commerce shopping Cart.
	Copyright 2012 A3 Revolution Web Design

	A3 Revolution Software Development team
	admin@a3rev.com
	PO Box 1170
	Gympie 4570
	QLD Australia
*/
?>
<?php
define('ECCP_FILE_PATH', dirname(__FILE__));
define('ECCP_DIR_NAME', basename(ECCP_FILE_PATH));
define('ECCP_FOLDER', dirname(plugin_basename(__FILE__)));
define('ECCP_NAME', plugin_basename(__FILE__));
define('ECCP_URL', untrailingslashit(plugins_url('/', __FILE__)));
define('ECCP_DIR', WP_PLUGIN_DIR . '/' . ECCP_FOLDER);
define('ECCP_JS_URL', ECCP_URL . '/assets/js');
define('ECCP_CSS_URL', ECCP_URL . '/assets/css');
define('ECCP_IMAGES_URL', ECCP_URL . '/assets/images');

/**
 * Load Localisation files.
 *
 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
 *
 * Locales found in:
 *      - WP_LANG_DIR/wp-ecommerce-compare-products/wp-ecommerce-compare-products-LOCALE.mo
 *      - WP_LANG_DIR/plugins/wp-ecommerce-compare-products-LOCALE.mo
 *      - /wp-content/plugins/wp-ecommerce-compare-products/languages/wp-ecommerce-compare-products-LOCALE.mo (which if not found falls back to)
 */
function wpec_compare_plugin_textdomain() {
    $locale = apply_filters( 'plugin_locale', get_locale(), 'wp-ecommerce-compare-products' );

    load_textdomain( 'wp-ecommerce-compare-products', WP_LANG_DIR . '/wp-ecommerce-compare-products/wp-ecommerce-compare-products-' . $locale . '.mo' );
    load_plugin_textdomain( 'wp-ecommerce-compare-products', false, ECCP_FOLDER.'/languages' );
}

include ('admin/admin-ui.php');
include ('admin/admin-interface.php');

include ('admin/admin-pages/admin-product-comparison-page.php');

include ('admin/admin-init.php');
include ('admin/less/sass.php');

include 'includes/class-compare_functions.php';

include 'classes/data/class-fields_data.php';
include 'classes/data/class-categories_data.php';
include 'classes/data/class-categories_fields_data.php';

include 'classes/class-compare_filter.php';
include 'classes/class-compare_metabox.php';
include 'widget/class-compare_widget.php';

include 'admin/classes/class-compare_categories.php';
include 'admin/classes/class-compare_fields.php';
include 'admin/classes/class-compare-features-panel.php';
include 'admin/classes/class-compare_products.php';

// Editor
include 'tinymce3/tinymce.php';

include 'admin/compare_init.php';

function wpec_add_compare_button($product_id = '', $echo       = false)
{
    $html       = WPEC_Compare_Hook_Filter::add_compare_button($product_id);
    if ($echo) echo $html;
    else return $html;
}

function wpec_show_compare_fields($product_id = '', $echo       = false)
{
    global $wpec_compare_product_page_tab;
    if ($wpec_compare_product_page_tab['disable_compare_featured_tab'] != 1) {
        $html       = WPEC_Compare_Hook_Filter::show_compare_fields($product_id);
        if ($echo) echo $html;
        else return $html;
    } else {
        if ($echo) echo '';
        else return false;
    }
}

register_activation_hook(__FILE__, 'wpec_compare_install');

?>