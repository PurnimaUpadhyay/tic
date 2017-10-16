<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$order = wc_get_order( $order_id );

$show_purchase_note = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
?>
<?php if (!is_checkout()) { ?>
		<div class="your-order-container">
<?php } ?>
			<h4><?php _e( 'Order Details','thevoux' ); ?></h3>
			<table class="shop_table order_table">
				<thead>
					<tr>
						<th class="product-name"><?php _e( 'Product','thevoux' ); ?></th>
						<th class="product-subtotal"><?php _e( 'Total','thevoux' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach( $order->get_items() as $item_id => $item ) {
							$product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
							$purchase_note = get_post_meta( $product->id, '_purchase_note', true );
			
							wc_get_template( 'order/order-details-item.php', array(
								'order'					=> $order,
								'item_id'				=> $item_id,
								'item'					=> $item,
								'show_purchase_note'	=> $show_purchase_note,
								'purchase_note'			=> $purchase_note,
								'product'				=> $product,
							) );
						}
					?>
					<?php do_action( 'woocommerce_order_items_table', $order ); ?>
				</tbody>
				<tfoot>
					<?php
						foreach ( $order->get_order_item_totals() as $key => $total ) {
							?>
							<tr>
								<th scope="row"><?php echo $total['label']; ?></th>
								<td><?php echo $total['value']; ?></td>
							</tr>
							<?php
						}
					?>
				</tfoot>
			</table>
	
			<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
			
			<?php //wc_get_template( 'order/order-details-customer.php', array( 'order' =>  $order ) ); ?>
			
			<h4><?php _e( 'Customer details','thevoux' ); ?></h4>
	
			<div class="row order-information">
				<div class="small-12 medium-6 large-4 columns">
				<?php
					if ( $order->customer_note ) echo '<label>' . __( 'Note:', 'woocommerce') . '</label><p>' . wptexturize( $order->customer_note ) . '</p>';
					if ( $order->billing_email ) echo '<label>' . __( 'Email:', 'woocommerce' ) . '</label><p>' .  esc_html( $order->billing_email) . '</p>';
					if ( $order->billing_phone ) echo '<label>' . __( 'Telephone:', 'woocommerce' ) . '</label><p>' .  esc_html( $order->billing_phone ). '</p>';
				?>
				</div>
			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>
	
			
	
				<div class="small-12 medium-6 large-4 columns">
	
					<?php endif; ?>
			
							<label><?php _e( 'Billing Address', 'woocommerce' ); ?></label>
							<address><p>
								<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'thevoux' ); ?>
							</p></address>
			
					<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>
	
				</div><!-- /.col-1 -->
	
				<div class="small-12 medium-6 large-4 columns">
	
					<label><?php _e( 'Shipping Address', 'woocommerce' ); ?></label>
					<address><p>
						<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'thevoux' ); ?>
					</p></address>
	
				</div><!-- /.col-2 -->
	
			</div><!-- /.row -->
	
			<?php endif; ?>
<?php if (!is_checkout()) { ?>
</div>
<?php } ?>