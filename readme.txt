=== WP e-Commerce Compare Products ===
Contributors: a3rev, nguyencongtuan, a3rev Software, nguyencongtuan
Tags: WP eCommerce, WP e-Commerce, compare product, wpec compare product, compare products, wp ecommerce compare products, e-commerce, ecommerce

Requires at least: 4.6
Tested up to: 4.8
Stable tag: 3.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Add a World Class Compare Products Feature to your WP e-Commerce store today with the WP e-Commerce Compare Products plugin.

== Description ==

= NOTICE ! =

As of version 2.0.0 this plugin is no longer supported by the developer. With version 2.0.0 release the plugin is upgraded for compatibility with:

* WP eCommerce 3.12.2
* WordPress 4.8.0

Version 2.0.0 also contains all advanced features that used to be available in a paid Premium Version. 

We invite any interested developer to take over the maintenance and future development of this plugin. If you are interested in doing that please let us know via a support ticket.

= WHAT IT DOES =

The Compare Products extension for WP e-Commerce gives a product comparison feature that you'd only expect to find on the big corporate e-commerce sites.

Compare Products uses your existing WP e-Commerce Product Categories and Product Variations to create Product Feature Sets that can be assigned to each and every product to create a feature comparison table.

This allows users to firstly add products to a compare widget basket, then at the click of a mouse the chosen products can be viewed in a state-of-the-art comparison table.

Chosen products are compared side-by-side, feature by feature, price-by-price. Discard products from the table at the click of a mose as you hone in on the product that is the one for you. Save the comparison as a PDF or print it.

= Key Features =
* Create the perfect layout and look for your compare features without touching the theme or plugin code.
* Theme updates and changing a theme does not affect the layout and styles you create. It is all in the plugin, independent of the theme.
* In Window Comparison page and the scrolling comparison table that will wow your users.
* Create unique Comparison feature set for a group of products by using existing WP e-Commerce Product Categories and Variations.
* Add or create completely new comparable feature sets independent to your existing WP e-Commerce Product Categories and Variations.
* Works with any Theme that has the WP e-Commerce plugin installed and activated.
* On install all of your existing Product Categories are auto created as Compare Categories
* On install all of your existing Product Variations are auto created as Compare Features.
* Add custom Comparable Features.
* Fully tested and optimized for all legacy browsers on IOS, Windows and IE9 to IE11.
* Fully tested and optimized for all iPads, Android, Kindle and Google Tablets
* Fully tested and optimized for IOS and Android Mobile platforms.

= MORE FEATURES =

The Pro version upgrade offers these additional features:

= PRODUCTS EXPRESS MANAGER =

* Product Express Manager - If your time is worth anything to you - you will want this feature.
* Saves you hours, days or even weeks of work (on larger stores) in apply compare to your products

= COMPARE VIDEO AND AUDIO =

* Compare Audio - Shows the default WordPress Audio player in the Comparison table. Supported formats .mp3, .m4a, .ogg, .wav file
* Compare Video - Shows and plays Youtube, Vimeo and WordPressTV videos in the Comparison table.

= FULL IN PLUGIN STYLE OPTIONS =

* Create a unique style and layout of the Compare front end features in Sass without touching the code.
* Activates the 'View Cart' feature on Grid View.
* Products Grid View layout and display styling function.
* Full Compare Widget layout and styling functions.
* 'Add to Cart', 'View Checkout' custom style feature on the comparison table.
* Full Comparison Table layout and style functions.

= LANGUAGE TRANSLATIONS =

Want to add a new language! You can contribute via [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/wp-ecommerce-compare-products)


== Screenshots ==

1. screenshot-1.jpg

2. screenshot-2.jpg

3. screenshot-3.jpg

== Installation ==

To install WP e-Commerce  Compare Products:
1. Download the WP e-Commerce Compare Products plugin
2. Upload the wp-ecommerce-compare-products folder to your /wp-content/plugins/ directory
3. Activate the WP e-Commerce Compare Products from the Plugins menu within WordPress

== Usage ==

1. WP-Admin dashboard go to WPEC Compare Menu.

2. Settings Tab - follow the extensive on-screen help notes to style your Compare feature.

3. Features Tab - add your products Compare Features.

4. Go to any products edit screen and add data to your Compare Feature Fields.

5. Make more sales!


== Frequently Asked Questions ==

= When can I use this plugin? =

You can use this plugin when you have installed the WP e-Commerce plugin

== Changelog ==

= 3.0.0 - 2017/06/15 =
* Major Upgrade - Upgrade Free version to full Premium version
* Feature - Added Product Express manager
* Feature - Added compare video and audio files options
* Feature - Added full in plugin style and layout options for widget and comparison table 
* Tweak - Tested for compatibility with WordPress major version 4.8.0
* Tweak - Tested for compatibility with WPEC major version 3.12.2
* Tweak - Change global $$variable to global ${$variable} for compatibility with PHP 7.0
* Tweak - WordPress Translation activation. Add text domain declaration in file header
* Tweak - Update a3 Revolution to a3rev Software on plugins description
* Tweak - Added Settings link to plugins description on plugins menu
* Tweak - Updated plugins Description with End of Development and Maintenance notice

= 2.2.5 - 2016/04/22 =
* Tweak - Tested for full compatibility with WP-eCommerce Version 3.11.2
* Tweak - Tested for full compatibility with WordPress major version 4.5.0

= 2.2.4 - 2015/08/25 =
* Tweak - include new CSSMin lib from https://github.com/tubalmartin/YUI-CSS-compressor-PHP-port into plugin framework instead of old CSSMin lib from http://code.google.com/p/cssmin/ , to avoid conflict with plugins or themes that have CSSMin lib
* Tweak - Make __construct() function for 'Compile_Less_Sass' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4
* Tweak - Change class name from 'lessc' to 'a3_lessc' so that it does not conflict with plugins or themes that have another Lessc lib
* Tweak - Added new options into Settings -> Permalinks page on Dashboard
* Tweak - Tested for full compatibility with WordPress major version 4.3.0
* Tweak - Tested for full compatibility with WP-eCommerce major version 3.9.5
* Fix - Check 'request_filesystem_credentials' function, if it does not exists then require the core php lib file from WP where it is defined
* Fix - Make __construct() function for 'WPEC_Compare_Widget' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4

= 2.2.3 - 2015/06/03 =
* Tweak - Tested for full compatibility with WordPress Version 4.2.2
* Tweak - Security Hardening. Removed all php file_put_contents functions in the plugin framework and replace with the WP_Filesystem API
* Tweak - Security Hardening. Removed all php file_get_contents functions in the plugin framework and replace with the WP_Filesystem API
* Fix - Update dynamic stylesheet url in uploads folder to the format //domain.com/ so it's always is correct when loaded as http or https

= 2.2.2 - 2015/05/05 =
* Tweak - Tested for full compatibility with WordPress Version 4.2.1
* Fix - Removed check_ajax_referer() call on frontend for compatibility with PHP caching plugins. Was returning -1 to js success call-back.

= 2.2.1 - 2015/04/24 =
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.2.0
* Tweak - Tested and Tweaked for full compatibility with WP e-Commerce Version 3.9.3
* Tweak - Changed <code>dbDelta()</code> function to <code>$wpdb->query()</code> for creating plugin table database.
* Tweak - Update style of plugin framework. Removed the <code>[data-icon]</code> selector to prevent conflict with other plugins that have font awesome icons
* Tweak - Changed <code>WP_CONTENT_DIR</code> to <code>WP_PLUGIN_DIR</code>. When admin sets a custom WordPress file structure then it can get the correct path of plugin
* Fix - Changed ajax url from <code>index.php?ajax=true</code> to <code>admin_url('admin-ajax.php' , 'relative')</code> Add to Compare button can work on WP 4.1 or higher
* Fix - Move the output of <code>add_query_arg()</code> into <code>esc_url()</code> function to fix the XSS vulnerability identified in WordPress 4.1.2 security upgrade
* Fix - Sass compile path not saving on windows xampp

= 2.2.0 - 2014/09/17 =
* Feature - Converted all front end CSS #dynamic {stylesheets} to Sass #dynamic {stylesheets} for faster loading.
* Feature - Convert all back end CSS to Sass.

= 2.1.5.6 - 2014/09/10 =
* Tweak - Updated google font face in plugin framework.
* Tweak - Tested 100% compatible with WP e-Commerce 3.8.14.3
* Tweak - Tested 100% compatible with WordPress Version 4.0

= 2.1.5.5 - 2014/06/24 =
* Tweak - Updated chosen js script to latest version 1.0.1 on the a3rev Plugin Framework
* Tweak - Added support for placeholder feature for input, email , password , text area types.

= 2.1.5.4 - 2014/05/25 =
* Tweak - Changed add_filter( 'gettext', array( $this, 'change_button_text' ), null, 2 ); to add_filter( 'gettext', array( $this, 'change_button_text' ), null, 3 );
* Tweak - Update change_button_text() function from ( $original == 'Insert into Post' ) to ( is_admin() && $original === 'Insert into Post' )
* Tweak - Checked and updated for full compatibility with WP e-Commerce Version 3.8.14.1 and WordPress version 3.9.1
* Tweak - Converted the plugin to the new a3rev Free Evaluation Trail License feature.
* Tweak - Update plugins Description on wordpress.org
* Tweak - Updated plugins admin yellow sidebar text.
* Fix - Code tweaks to fix a3 Plugins Framework conflict with WP e-Commerce tax rates.

= 2.1.5.3 - 2014/05/08 =
* Tweak - remove wp_create_nonce() function from Compare Widget load item by ajax feature.
* Tweak - remove check_ajax_referer() function from Compare Widget load item by ajax feature.

= 2.1.5.2 - 2014/05/06 =
* Tweak - Update the compare widget. Added load items to cart by ajax for solve the problem cached by another plugin
* Tweak - set DONOTCACHEPAGE constant for Comparison page to prevent caching of current items in widget.
* Tweak - Updated Framework help text font for consistency.
* Tweak - Added remove_all_filters('mce_external_plugins'); before call to wp_editor to remove extension scripts from other plugins.
* Tweak - Tested 100% compatible with WP e-Commerce version 3.8.14
* Tweak - Tested 100% compatible with WordPress version 3.9
* Credit - to Will MacQuinn for the ftp and wp-admin access to look at the compare widget caching issue.

= 2.1.5.1 - 2014/02/04 =
* Tweak - Added description text to the top of each Pro Version yellow border section
* Fix - Undefined index: _wpsc_compare_category in class-compare_metabox.php

= 2.1.5 - 2013/12/31 =
* Feature - Upgraded the plugin to the newly developed a3rev admin panel app interface.
* Feature - a3rev Plugin Framework admin interface 100% Compatibility with WordPress v3.8.0 with backward compatibility.
* Feature - a3rev framework admin interface 100% iOS and Android compatible.
* Feature - Dashboard switches and sliders use Vector based display that shows when WordPress version 3.8.0 is activated.
* Feature - All plugin .jpg icons and images use Vector based display for full compatibility with new WordPress version.
* Feature - New admin UI features check boxes replaced by switches, some dropdowns replaced by sliders.
* Feature - Added 4 new border display types, Grove, Ridge, Inset, Outset
* Feature - Button Corner style - Rounded - Can now set a rounded value for each corner of the button to create many different button styles.
* Feature - New Border / Button shadow features. Create shadow external or internal, set wide of shadow.
* Feature - Replaced colour picker with new WordPress 3.6.0 colour picker.
* Feature - Added choice of 350 Google fonts to the existing 17 websafe fonts in all new single row font editor.
* Feature - New on page instant previews for Fonts editor, create border and shadow style.
* Feature - Added intuitive triggers for settings. When switched ON a features corresponding feature settings show, when OFF they hide.
* Feature - Added House keeping function to settings. Clean up on Deletion.  Option - Choose if you ever delete this plugin it will completely remove all tables and data it created.
* Tweak - Moved plugin settings from wp-admin Settings > Shop menu to its own menu item on the wp-admin sidebar.
* Tweak - Changed plugins menu item name from Product Comparison to WPEC Compare.
* Tweak - Added main sub menu items, Category & Feature | Product Manager | Settings & Style
* Tweak - Yellow sidebar on Pro Version Menus does not show in Mobile screens to optimize admin panel screen space.
* Tweak - Numerous admin description text tweaks and typo fix ups.
* Tweak - Tested 100% compatible with WP 3.8.0
* Tweak - Tested 100% compatible with WP e-Commerce Version 3.8.13.1

= 2.1.4 -2013/11/07 =
* Tweak - added esc_attr() to text input fields to support hyphen character
* Tweak - Tested plugin for full compatibility with lastest WordPress version 3.7.1
* Fix - Plugins admin script and style not loading in Firefox with SSL on admin. Stripped http// and https// protocols so browser will use the protocol that the page was loaded with.

= 2.1.3 - 2013/08/20 =
* Tweak - Tested for full compatibility with WordPress v3.6.0
* Tweak - Added PHP Public Static to functions in Class. Done so that Public Static warnings don't show in WP__DEBUG mode.
* Tweak - Dashboard Yellow sidebar info and added link to the Pro Version 7 day FREE trail offer.
* Fix - Product Page button position over-riding Grid View button position settings. Changed 'product_page_button_position' to 'grid_view_button_position'

= 2.1.2 - 2013/06/15 =
* Fix - Compare Features Tab on Product Page, Enable / Disable function. The 2 functions worked but the opposite of what they where supposed to.
* Tweak - Updated support URL link to the plugins wordpress.org support forum.

= 2.1.1 - 2013/04/23 =
* Fix - Text colour pickers not saving and displaying the hex number and hex colour in Font Colour, Font Link Colour and Font Hover colour selectors after editing and updating. The bug affected all font colour setting that use theme colours on install. These are the settings show an empty colour selector field on install

= 2.1.0 - 2013/04/17 =
* Feature - Removed Compare pop-up fly out powered by Fancybox and Lightbox tools and replaced with Product Comparisons opening in a new browser window. Using the new WordPress PrettyPhoto tool (as of v3.5) as the pop-up tool in testing we found supporting 3 pop-up scripts, PrettyPhoto, Fancybox and Lightbox was very buggy and troublesome. So we have removed all 3 pop-up scripts and replaced with open in browser window. The result is around 4,000 less lines of code in the plugin and a beautifully robust comparison result presentation.
* Feature - Added 2 show Comparison in new widow options. Option 1. Show the product Comparison in an on-screen pop-up window or Option 2. Show Comparisons in a new window.
* Feature - Added Fixed Features Title column. This means when more than 3 products are being compared in the pop up window or on-page comparison the products scroll left under the Features Title column - this means the user always can see what product features are being compared, because the are fixed while the products and each feature values scroll under them.
* Feature - Added Comparison Table scrolls horizontal and vertical via the window scrollers and not by scrollers on an inner container. This is a great UI enhancement as it does away with inner containers - no more having to use the window scrollers to get to the inner container scroll bars which was confusing and messy.
* Feature - Completely reworked the Print Product Comparison function. The Print function now works beautifully with added print style. Prints the entire tall of 3 products Comparison columns regardless of the tall of the columns.
* Feature - In-Plugin Custom Styling - Style every element of the compare feature that front end users see and interface with all without touching the theme or plugin code.
* Feature - Theme updates and changing a theme does not affect the layout and styles you create for your Compare feature because it is all in the plugin, independent of any theme.
* Feature - Removed the old Settings tab and replaced with 4 new tabs, Product Page | Widget Style | Grid View Style | Comparison Page
* Feature - Separated all Product page and Grid View page layout and style settings for fine grain control of how the feature shows on any theme.
* Feature - Product Page Main tab.  Full custom layout and style features for the compare feature on product pages under 4 new sub tabs.
* Feature - Added Activate / Deactivate the Compare Feature on single product pages.
* Feature - Added full custom Compare Button and Linked Text style options.
* Feature - Added Product page 'successfully added' to compare icon. Auto shows after button is clicked. Default icon is a green tick, includes option to remove or upload a custom icon.
* Feature - Added 'View Compare' feature that shows after a product is added to compare. Fully customizable Button or Linked Text. Ideal for full wide product pages that have no sidebar.
* Feature - Widget Style main tab. Full custom styling of everything that the plugin outputs in the Compare WordPress widget.
* Feature - Added option to show product feature image with items added to the Compare widget. Set thumbnail size, position (Right | Left) and custom image border.
* Feature - Added option to show Widget Compare Button as Button or Linked Text, full custom styling, set position (Left | Center | Right)
* Feature - Added option to create a fully customized Widget Title including background colour and border style.
* Feature - Added option to show 'Clear All' feature as Button or Link text, full custom styling, set position relative to the compare button (Above | Below) and horizontal align (Left | Right | Center)
* Feature - Added fully Customize the 'Nothing to Compare' text message and font style that shows when widget is empty.
* Feature - Added option to upload a custom 'Remove' Single item icon from Compare Widget.
* Feature - Added 'Remove' single item icon function auto position. Always displays opposite side of product title to thumbnail. If thumbnail feature not activated - shows to the right as default.
* Feature - Grid View Style main tab. Created full custom settings for the Compare feature for product extracts on the WP e-Commerce Product Page, Product Categories and Product Tags pages.
* Feature - Added option to set the position that the Compare feature shows relative to the 'add to cart' button (Above | Below) independent of Product page settings.
* Feature - Added Activate / Deactivate Compare Feature option on Grid View (Product page, Product Categories and Product Tag archives pages)
* Feature - Added full custom styling of Compare Button / Text Link on Grid View pages independent of Product page settings.
* Feature - Added Grid View 'successfully added' to compare icon. Auto shows after button is clicked. Default icon is a purple tick, includes option to remove or upload a custom icon.
* Feature - Added 'View Compare' feature on Grid View Product listings. Auto shows under Compare button after click. Fully customizable Link text.
* Feature - Comparison Page main tab. In this upgrade we launch full table customization features.
* Feature - Added all new Page Header image uploader script to replace the old and clunky show image by URL from WordPress media library.
* Feature - Added Shortcode now shows as an image in the page visual text editor instead of the shortcode [product_comparison_page]. Added set page from the admin panel.
* Feature - Added customize Comparison page Header background colour, body background colour and the Comparison Empty Window Message text font and style.
* Feature - Added option to show Print Page function as a button or Linked text with full style options for both.
* Feature - Added text edit and font style options for print page message.
* Feature - Added option to show Close Window function as a button or Linked text with full style options for both.
* Feature - Added custom style options for Table header and Alternate rows background colours. Custom style options for Table borders and row padding.
* Feature - Added custom style options for Compare Feature Titles font (Left fixed column), Table Rows Feature Values font and Product Name font.
* Feature - Added text edit and font style options and custom cell background colour to replace the default N/A text for Compare features that have no value. Default is now empty instead of N/A
* Feature - Added Product Prices - Activate / Deactivate option. Custom font styling. Position options to display prices Top and Bottom | Top Only | Bottom Only.
* Feature - Added 'Add to Cart' - Activate / Deactivate option. Added show Add to Cart as button or Linked text with full style options.
* Feature - Added, Variation Add to Cart from the Comparison table.
* Feature - Added 'successfully added' to cart icon that shows after a Product is added to cart. Default icon is a purple tick, includes option to remove or upload a custom icon.
* Feature - Added custom 'Go to Checkout' text link including text edit and font style. The "Go to Checkout' link shows under add to cart button when a Product is added to the cart from the comparison table.
* Feature - Added support for 'Off site Product Link'. Button or link shows the same text as the product page listing with link to external source.
* Tweak - Added chosen script for select Compare categories on add and edit Compare features.
* Tweak - Tested and optimization in Windows XP, IE 7, IE8, Windows 7, IE8 and IE9 and Windows 8, IE10 and IE10 Desktop.
* Tweak - Tested and optimization for all 3 Windows operating systems - for these legacy browsers - Firefox, Safari, Chrome and Opera.
* Tweak - Tested and optimization for Apple OS X operating systems. Snow leopard, Lion and Mountain Lion using these legacy Browsers - Firefox, Safari, Chrome and Opera
* Tweak - Tested and optimization for Apple IOS Mobile Safari in iPhones and all iPads.
* Tweak - Tested and optimization for Android Browser on all models of these manufacturers tablets that use the Android operating system - Amazon Kindle Fire, Google Nexus 7, Samsung Galaxy Note, Samsung Galaxy Tab 2
* Tweak - Tested and optimization for Android Browser on all models of these manufacturers phone that use the Android operating system (to many to list) mobile phones that support - Samsung Galaxy, Motorola, HTC, Sony and LG
* Tweak - Tested and optimization for Opera Mobile - Samsung Galaxy Tablet and Mobiles HTC Wildfire. Nokia 5800, Samsung Galaxy S II, Motorola Droid X and Motorola Atrix 4G
* Tweak - Added when install and activate plugin link redirects to License Key validation page instead of the wp-plugins dashboard.
* Tweak - Compare product page meta only shows open if the feature is activated.
* Tweak - Removed the Print Page Button and print page message from showing on the printed comparison.
* Tweak - Moved the Un-Assigned Compare Features on Features tab to the top of Compare categories for ease of use.
* Tweak - Updated admin error messages that displays when creating a Compare Category or Feature that already exists.
* Tweak - Updated admin error message that displays when plugin cannot connect to a3API on the Amazon cloud upon activation of the license.
* Tweak - Jumped version from 2.0.7 to 2.1.0 for release of the In-Plugin Custom Styling feature.
* Tweak - Updated plugin wiki docs to include new custom styling and layout features.
* Fix - Compare Feature search, search term is no longer case sensitive.
* Fix - Updated all JavaScript functions so that the plugin is compatible with jQuery Version1.9 and backwards to version 1.6. WordPress still uses jQuery version 1.8.3. In themes that use Google js Library instead of the WordPress jQuery then there was trouble because Google uses the latest jQuery version 1.9. There are a number of functions in jQuery Version 1.9 that have been depreciated and hence this was causing errors with the jQuery function in the plugin.
* Fix - Full WP_DEG run. All Uncaught exceptions fixed.
* Fix - Added site page ownership information to Compare Window so browsers recognized window as part of the site.
* Fix - Bug for users who have https: (SSL) on their sites wp-admin but have http on sites front end. This was causing a -1 to show when products added to Compare Widget wp-admin with SSL applied only allows https: but the url of admin-ajax.php is http: and it is denied hence returning the ajax -1 error. Fixed by writing a filter to recognize when https is configured on wp-admin and parsing correctly.

= 2.0.5 - 2013/01/08 =
* Tweak - Added support for Chinese Characters
* Tweak - UI tweak - changed the order of the admin panel tabs so that the most used Features tab is moved to first tab.
* Tweak - Added links to all other a3rev wordpress.org plugins from the Features tab
* Tweak - Updated Support and Pro Version link URL's on wordpress.org description, plugins and plugins dashboard. Links were returning 404 errors since the launch of the all new a3rev.com mobile responsive site as the base e-commerce permalinks is changed.

= 2.0.4 - 2012/12/14 =
* Fix - Updated depreciated custom database collator $wpdb->supports_collation() with new WP3.5 function $wpdb->has_cap( 'collation' ). æSupports backward version compatibility.
* Fix - When Product attributes are auto created as Compare Features, if the Attribute has no terms then the value input field is created as Input Text - Single line instead of a Checkbox.
* Fix - On Compare Products admin tab, ajax not able to load the products list again after saving a product edit

= 2.0.3 - 2012/08/15 =
* Tweak - Variations where auto created as Compare Feature input type 'dropdown' (single select). Changed to input type 'check box' (multi-select)
* Tweak - Jumped Lite version from v2.0.0 to v2.0.3 to bring Lite and Pro versions back into sync.
* Tweak - Updated plugin description and added link to Documentation.
* Tweak - Set database table name to be created the same as WordPress table type
* Tweak - Change localization file path from actual to base path
* Documentation - Added comprehensive extension documentation to the a3rev wiki.
* Localization - Added Bulgarian translation (thanks to Keremidi)

= 2.0 - 2012/07/09 =
MAJOR UPGRADE
* Feature - All Product Categories auto created as Compare Categories when plugin is activated. Feature is activated on upgrade.
* Feature - All Product Variations auto added to Master Category as Compare Features when the plugin is first activated.
* Feature Ð When Product Categories or Sub categories are created they are auto created as Compare categories. The plugin only listens to Create new so edits to Product categories are ignored.
* Feature: When parent product variations are created they are auto created as Compare Features. Child product variations and edits are ignored.
* Feature - Complete rework of admin user interface - Combined Features and Categories tabs into a single tab - Added Products Tab. Greatly enhanced user experience and ease of use.
* Feature - Moved Create New Categories and Features to a single on page assessable from an 'add new' button on Features tab.
* Feature - Added Features search facility for ease of finding and editing Compare Features.
* Feature - Added support for use of special characters in Feature Fields.
* Feature - Added support for use of Cyrillic Symbols in Feature Fields.
* Feature - Added support for use of sup tags in Feature Fields.
* Feature - Language file added to support localization Ð looking for people to do translations.
* Fixed - WP e-Commerce version updates editing Product Page Compare meta field values which caused Compare feature when activated from product page not updating Compare category name and show as activated on the Compare Products Admin Page.
* Fixed - Can't create Compare Feature if user does not have a default value set in SQL. Changed INSERT INTO SQL command output to cater for this relatively rare occurrence.
* Tweak - Replaced all Category Edit | Delete icons with WordPress link text. Replace edit icon on Product Update table with text link.
* Tweak - Edited Product update table to fit 100% wide on page so that the horizontal scroll bar does not auto show.
* Tweak - Removed verbose text explanations and superfluous tool tips.
* Tweak - Edited the way that Add Compare Features shows on product edit page - now same width as the page content.
* Tweak - Show Compare Featured fields on products page - added table css styling.
* Tweak - Adding padding between Product name and the Clear All - Compare button in sidebar widget.
* Other - Create script to facilitate seamless upgrade from Version 1.04 to Major upgrade Version 2.0

= 1.0.5 - 2012/04/16 =
* Feature - Combined 2 admin pages into one with SETTINGS  |  FEATURES tabs
* Feature - Added comprehensive admin page setup instructions via Tool Tips and text instructions.
* Tweak -Greatly improved Admin pages layout for enhanced user experience.
* Tweak - Add pop up window when deleting feature fields to ask you to check if you are sure?
* Tweak - Changed Pop-Out window function from - include( '../../../wp-config.php') to show content using wp_ajax
* Tweak - Run WP_DEBUG check and fixed plugins 'undefined...' errors
* Tweak - Removed fading update messages and animation and replaced with default wordpress 'updated' messages.
* Tweak - Replace custom ajax handlers with wp_ajax and wp_ajax_nopriv
* Tweak - Code re-organized into folders with all files commented on and appropriate names as per WordPress Coding standards.
* Fix - Auto add Compare Widget to sidebar when plugin is activated.
* Fix - Feature Unit of Measurement is added in brackets after Feature Name and if nothing added it does not show.
* Fix - Replace deprecated widget attribute_escape with esc_attr().

= 1.0.4 - 2012/04/02 =
* Tweak - various small code tweaks

= 1.0.3 - 2012/03/20 =
* Fix - show Compare button for older and latest versions of WP e-commerce

= 1.0.2 - 2012/03/19 =
* Fix - Auto Add Compare button feature.

= 1.0.1 - 2012/02/28 =
* Tweak - Update Compare Feature for Product Variations

= 1.0.0 =
* First working release of the modification


== Upgrade Notice ==

= 3.0.0 =
Major Feature Upgrade and end of Development final release. Add all Premium version features. Compatible with WPEC 3.12.2, WordPress 4.8.0 and PHP 7.0

= 2.2.5 =
Maintenance Update. Tested for full compatibility with WordPress major version 4.5 and WP e-Commerce current version 3.11.2

= 2.2.4 =
Major Maintenance Upgrade. 6 Code Tweaks plus 2 bug fixes for full compatibility with WordPress v 4.3.0 and WP-eCommerce 3.9.5

= 2.2.3 =
Important Maintenance Upgrade. 2 x major a3rev Plugin Framework Security Hardening Tweaks plus 1 https bug fix and full compatibility with WordPress 4.2.2

= 2.2.2 =
Maintenance Update. 1 Bug fix for full compatibility with PHP caching plugins and full compatibility with WordPress version 4.2.1

= 2.2.1 =
Major Maintenance Update. Code tweaks, a security bug fix and bug fixes for full compatibility with WordPress Version 4.2.0 and WP e-Commerce Version 3.9.3

= 2.2.0 =
Major Version upgrade! Full front end conversion to Sass #dynamic {stylesheets}. Admin panel full conversion from CSS to Sass.

= 2.1.5.6 =
Upgrade your plugin now for full compatibility with WordPress Version 4.0 and WP e-Commerce Version 3.8.14.3

= 2.1.5.5 =
Upgrade now for 2 new framework code tweaks to keep your plugin in tip top running order.

= 2.1.5.4 =
Update now for a bug fix - a3 Plugin Framework conflict with WP e-Commerce tax rates and full compatibility with WP e-Commerce v 3.8.14.1 and WordPress v 3.9.1.

= 2.1.5.3 =
Update your plugin for 2 Tweaks to the ajax item load in Compare Widget

= 2.1.5.2 =
Update your plugin now for 2 tweaks that prevent Compare window and widget caching. Full compatibility with WP e-Commerce 3.8.14 and WordPress 3.9

= 2.1.5.1 =
Upgrade now for undefined index bug fix that surfaced in version 2.1.5

= 2.1.5 =
Major Upgrade – Plugin converted to the a3rev plugin framework. 100% WP 3.8.0 and WPEC 3.8.13.1 compatible. 14 x new * Features, 7 x * Tweaks.

= 2.1.4 =
Upgrade now for 1 bug fix and full compatibility with WordPress 3.7.1

= 2.1.3 =
Upgrade your plugin now for 1 bug fix and full compatibility with WordPress 3.6.0

= 2.1.2 =
Bug fix for show Compare Features Tab on Product Page

= 2.1.1 =
Install this update now to fix a bug that is causing your text font colour selections to not be saved when update button is clicked.

= 2.1.0 =
Massive feature upgrade 50+ new features, 5 Fixes and 6 Tweak.
