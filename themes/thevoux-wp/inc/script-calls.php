<?php

// Main Styles
function thb_main_styles() {	

		 // Register 
		 wp_register_style('thb-foundation', THB_THEME_ROOT . '/assets/css/foundation.min.css', null, null);
		 wp_register_style("thb-fa", THB_THEME_ROOT . '/assets/css/font-awesome.min.css', null, null);
		 wp_register_style("thb-app", THB_THEME_ROOT .  "/assets/css/app.css", null, null);
		 wp_register_style("thb-mp", THB_THEME_ROOT . "/assets/css/magnific-popup.css", null, null);
		 
		 // Enqueue
		 wp_enqueue_style('thb-foundation');
		 wp_enqueue_style('thb-fa');
		 wp_enqueue_style('thb-app');
		 wp_enqueue_style('thb-mp');
		 wp_enqueue_style('thb-style', get_stylesheet_uri(), null, null);	
}

add_action('wp_enqueue_scripts', 'thb_main_styles');

// Main Scripts
function thb_register_js() {
	
	if (!is_admin()) {
		$url_prefix = is_ssl() ? 'https:' : 'http:';
		// Register 
		wp_register_script('modernizr', THB_THEME_ROOT . '/assets/js/plugins/modernizr.custom.min.js', 'jquery', null);
		wp_register_script('gmapdep', $url_prefix.'//maps.google.com/maps/api/js', false, null, TRUE);
		wp_register_script('tweenmax', $url_prefix.'//cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js', 'false', null, TRUE);
		wp_register_script('tweenmax-scrollto', $url_prefix.'//cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/plugins/ScrollToPlugin.min.js', 'false', null, TRUE);
		wp_register_script('tweenmax-css', $url_prefix.'//cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/plugins/CSSRulePlugin.min.js', 'false', null, TRUE);
		wp_register_script('vendor', THB_THEME_ROOT . '/assets/js/vendor.min.js', 'jquery', null, TRUE);
		wp_register_script('app', THB_THEME_ROOT . '/assets/js/app.min.js', 'jquery', null, TRUE);
		
		// Enqueue
		wp_enqueue_script('jquery');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('tweenmax');
		wp_enqueue_script('tweenmax-scrollto');
		wp_enqueue_script('vendor');
		wp_enqueue_script('app');
		wp_localize_script( 'app', 'themeajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action('wp_enqueue_scripts', 'thb_register_js');

// Admin Scripts
function thb_admin_scripts() {
	wp_register_script('thb-admin-meta', THB_THEME_ROOT .'/assets/js/admin-meta.min.js', array('jquery'));
	wp_enqueue_script('thb-admin-meta');
	
	wp_register_style("thb-admin-css", THB_THEME_ROOT . "/assets/css/admin.css");
	wp_enqueue_style('thb-admin-css'); 
	if (class_exists('WPBakeryVisualComposerAbstract')) {
		wp_enqueue_style( 'vc_extra_css', THB_THEME_ROOT . '/assets/css/vc_extra.css' );
	}
}
add_action('admin_enqueue_scripts', 'thb_admin_scripts');

/* De-register Contact Form 7 styles */
remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_styles' );

/* WooCommerce */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
/* WooCommerce */
if(class_exists('woocommerce')) {
	function thb_woocommerce_scripts() {
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
	}
	add_action('wp_enqueue_scripts', 'thb_woocommerce_scripts');
}
?>