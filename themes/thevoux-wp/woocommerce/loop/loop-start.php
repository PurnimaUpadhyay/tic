<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

?>
<?php
	$shop_columns = isset($_GET['shop_columns']) ? $_GET['shop_columns'] : ot_get_option('shop_columns', '4');
	$sidebar_pos = isset($_GET['sidebar']) ? $_GET['sidebar'] : ot_get_option('shop_sidebar', 'no');
?>
<div class="products row">