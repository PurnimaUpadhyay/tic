<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="HandheldFriendly" content="True">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="http://togglehead.net/ntic/wp-content/themes/thevoux-wp/assets/css/style.css" rel="stylesheet">
	<link href='http://togglehead.net/ntic/wp-content/themes/thevoux-wp/assets/css/simplelightbox.min.css' rel='stylesheet' type='text/css'>

	<?php wp_site_icon(); ?>
	<?php do_action( 'thb_fb_information' ); ?>
	<?php 
		$id = get_queried_object_id();
		$header_style = (isset($_GET['header_style']) ? htmlspecialchars($_GET['header_style']) : ot_get_option('header_style', 'style1'));
		$smooth_scroll = (ot_get_option('smooth_scroll') != 'off' ? 'smooth_scroll' : '');

		$class = array();
		array_push($class, $smooth_scroll);

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>
<body <?php body_class($class); ?> data-themeurl="<?php echo esc_url(get_template_directory_uri()); ?>" data-spy="scroll">

<div id="wrapper">
	<?php get_template_part( 'inc/header/mobile_menu' ); ?>
	
	
	<!-- Start Content Container -->
	<section id="content-container">
		<!-- Start Content Click Capture -->
		<div class="click-capture"></div>
		<!-- End Content Click Capture -->
		<?php get_template_part( 'inc/header/'.$header_style ); ?>
		<div role="main" class="cf">