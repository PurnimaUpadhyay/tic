<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}
// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
// Increase loop count
$woocommerce_loop['loop']++;
// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
$attachment_ids = $product->get_gallery_attachment_ids();
$catalog_mode = isset($_GET['shop_catalog_mode']) ? htmlspecialchars($_GET['shop_catalog_mode']) : ot_get_option('shop_catalog_mode', 'off');
$shop_columns = isset($_GET['shop_columns']) ? htmlspecialchars($_GET['shop_columns']) : ot_get_option('shop_columns', '4');

switch($shop_columns) {
	case '2':
		$columns = 'small-6';
		break;
	case '3':
		$columns = 'small-6 medium-4 large-4';
		break;
	case '4':
		$columns = 'small-6 medium-4 large-3';
		break;	
	case '5':
		$columns = 'small-6 medium-4 large-24';
		break;
	case '6':
		$columns = 'small-6 medium-4 large-2';
		break;
}
?>

<article itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" <?php post_class("post item ".$columns." columns"); ?>>
	<?php
		$image_html = "";

		if ( has_post_thumbnail() ) {
			$image_html = wp_get_attachment_image( get_post_thumbnail_id(), 'shop_catalog' );					
		} else if ( wc_placeholder_img_src() ) {
			$image_html = wc_placeholder_img( 'shop_catalog' );
		}
	?>
	<figure class="product-image">
		<?php do_action( 'thb_product_badge'); ?>
		<?php 
			if ($attachment_ids) {
					
					echo '<a href="'.get_the_permalink().'" title="'. the_title_attribute(array('echo' => 0)).'" class="fade">'.$image_html.'</a>';	

						
					if ( get_post_meta( $attachment_ids[0], '_woocommerce_exclude_image', true ) ) { continue; }
						
					echo '<a href="'.get_the_permalink().'" title="'. the_title_attribute(array('echo' => 0)).'" class="fade">'.wp_get_attachment_image( $attachment_ids[0], 'shop_catalog' ).'</a>';	

								
			} else {
					echo '<a href="'.get_the_permalink().'" title="'. the_title_attribute(array('echo' => 0)).'">'.$image_html.'</a>';	
			}
		?>
		<?php if ($catalog_mode != 'on') { wc_get_template( 'loop/add-to-cart.php' ); } ?>
	</figure>
	<header class="post-title<?php if ($catalog_mode == 'on') { echo ' catalog-mode'; } ?>">
		<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
		<?php if ($catalog_mode != 'on') { ?>
			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		<?php } ?>
	</header>
	
</article><!-- end product -->