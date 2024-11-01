<?php
/**
 * Plugin Uninstall
 *
 * Uninstalling deletes options, tables, and pages.
 *
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();


if (get_option('wpec_compare_product_clean_on_deletion') == 1) {

    delete_option('wpec_compare_product_page_settings');
    delete_option('wpec_compare_product_page_button_style');
    delete_option('wpec_compare_product_page_tab');
    delete_option('wpec_compare_product_page_view_compare_style');
    delete_option('wpec_compare_widget_clear_all_style');
    delete_option('wpec_compare_widget_button_style');
    delete_option('wpec_compare_widget_style');
    delete_option('wpec_compare_widget_thumbnail_style');
    delete_option('wpec_compare_widget_title_style');
    delete_option('wpec_compare_grid_view_button_style');
    delete_option('wpec_compare_grid_view_settings');
    delete_option('wpec_compare_gridview_view_compare_style');
    delete_option('wpec_compare_addtocart_style');
    delete_option('wpec_compare_close_window_button_style');
    delete_option('wpec_compare_comparison_page_global_settings');
    delete_option('wpec_compare_page_style');
    delete_option('wpec_compare_print_page_settings');
    delete_option('wpec_compare_product_prices_style');
    delete_option('wpec_compare_table_content_style');
    delete_option('wpec_compare_table_style');
    delete_option('wpec_compare_viewcart_style');

    delete_option('wpec_compare_addtocart_success');
    delete_option('wpec_compare_logo');
    delete_option('wpec_compare_gridview_product_success_icon');
    delete_option('wpec_compare_product_success_icon');
    delete_option('wpec_compare_basket_icon');

    delete_option('wpec_compare_product_clean_on_deletion');

    delete_post_meta_by_key('_wpsc_deactivate_compare_feature');
    delete_post_meta_by_key('_wpsc_compare_category');
    delete_post_meta_by_key('_wpsc_compare_category_name');

    wp_delete_post(get_option('product_compare_id'), true);

    global $wpdb;
    $wpdb->query('DROP TABLE IF EXISTS ' . $wpdb->prefix . 'wpec_compare_fields');
    $wpdb->query('DROP TABLE IF EXISTS ' . $wpdb->prefix . 'wpec_compare_categories');
    $wpdb->query('DROP TABLE IF EXISTS ' . $wpdb->prefix . 'wpec_compare_cat_fields');
}
