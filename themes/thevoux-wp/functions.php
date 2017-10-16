<?php

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file.
	You have been warned!

-------------------------------------------------------------------------------------*/
// Define Theme Name for localization
define('THB_THEME_ROOT', get_template_directory_uri());
define('THB_THEME_ROOT_ABS', get_template_directory());

// Option-Tree Theme Mode
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_override_forced_textarea_simple', '__return_true' );
include_once( 'inc/ot-fonts.php' );
include_once( 'inc/ot-radioimages.php' );
include_once( 'inc/ot-metaboxes.php' );
include_once( 'inc/ot-themeoptions.php' );
include_once( 'inc/ot-functions.php' );
if ( ! class_exists( 'OT_Loader' ) ) {
	include_once( 'admin/ot-loader.php' );
}

// Script Calls
require get_template_directory() .'/inc/script-calls.php';

// Excerpts
require get_template_directory() .'/inc/excerpts.php';

// Ajax
require get_template_directory() .'/inc/ajax.php';

// TGM Plugin Activation Class
if ( is_admin() ) {
	require get_template_directory() .'/inc/class-tgm-plugin-activation.php';
	require get_template_directory() .'/inc/plugins.php';
}

// Add Menu Support
require get_template_directory() .'/inc/wp3menu.php';

// Enable Sidebars
require get_template_directory() .'/inc/sidebar.php';

// Custom Comments
require get_template_directory() .'/inc/comments.php';

// Widgets
require get_template_directory() .'/inc/widgets.php';

// Misc 
require get_template_directory() .'/inc/misc.php';

// CSS Output of Theme Options
require get_template_directory() .'/inc/selection.php';

// Breadcrumbs 
require get_template_directory() .'/inc/related.php';

// AQ Resizer
require get_template_directory() .'/inc/aq_resizer.php';

// Twitter oAuth
require get_template_directory() .'/inc/TwitterAPIExchange.php';

// Share Counts
require get_template_directory() .'/inc/posts-social-shares-count/posts-share-count.php';

// Visual Composer Integration
require get_template_directory() .'/inc/visualcomposer.php';

// Shortcode Generator & Shortcodes (+)
require get_template_directory() .'/inc/tinymce/tinymce-class.php';	
require get_template_directory() .'/inc/tinymce/shortcode-processing.php';

// WooCommerce Settings specific for theme
require get_template_directory() .'/inc/woocommerce.php';
require get_template_directory() .'/inc/woocommerce-category-image.php';

// Theme Info
if ( is_admin() ) {
	require get_template_directory() .'/inc/theme_info.php';
}

// WordPress Importer
if ( is_admin() ) {
	if(!class_exists('WP_Import'))
		require get_template_directory() . '/inc/wordpress-importer/wordpress-importer.php';
		require get_template_directory() . '/inc/import.php';
}

// SideKick Integration
define('SK_PRODUCT_ID',459);
define('SK_ENVATO_PARTNER', '5LXnCIbjT0TD4jcyZuhMSAgVwil8hU5TTxIW5cNNwbA=');
define('SK_ENVATO_SECRET', 'RqjBt/YyaTOjDq+lKLWhL10sFCMCJciT9SPUKLBBmso=');
?>