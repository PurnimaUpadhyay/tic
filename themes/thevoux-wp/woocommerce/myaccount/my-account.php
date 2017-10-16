<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$yith_wcwl = class_exists( 'YITH_WCWL_UI' );
$downloads = WC()->customer->get_downloadable_products();
?>
<div id="my-account">
		<div class="row">
			<div class="small-12 medium-centered medium-10 large-8 columns">
				<ul id="my-account-nav" class="my-account-nav">
					<li class="active">
						<a href="#edit-account"><span><?php _e("My Account", 'thevoux'); ?></span></a>
					</li>
					<li>
						<a href="#my-orders"><span><?php _e("My Orders", 'thevoux'); ?></span></a>
					</li>
					<li>
						<a href="#address-book"><span><?php _e("My Addresses", 'thevoux'); ?></span></a>
					</li>
					<?php if ($yith_wcwl) { ?>
					<li>
						<a href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><span><?php _e("My Wishlist", 'thevoux'); ?></span></a>
					</li>
					<?php } ?>
					<?php if ( $downloads ) { ?>
					<li>
						<a href="#my-downloads" class="account-icon-box"><span><?php _e("My Downloads", 'thevoux'); ?></span></a>
					</li>
					<?php } ?>
					<?php if (class_exists('WC_Subscriptions')) { ?>
					<li>
						<a href="#my-subscriptions"><span><?php _e("My Subscriptions", 'thevoux'); ?></span></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="tab-pane active" id="edit-account">
			<?php wc_get_template( 'myaccount/form-edit-account.php' ); ?>
		</div>
		
		<div class="tab-pane" id="my-orders">
			<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
		</div>
		
		<div class="tab-pane" id="address-book">
			<?php wc_get_template( 'myaccount/my-address.php' ); ?>
		</div>
		
		<?php if ( $downloads ) { ?>
		<div class="tab-pane" id="my-downloads">
			<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>
		</div>
		<?php } ?>
		
		<?php if (class_exists('WC_Subscriptions')) { ?>
		<div class="tab-pane" id="my-subscriptions">
			<?php if (class_exists('WC_Subscriptions')) { WC_Subscriptions::get_my_subscriptions_template(); } ?>
		</div>
		<?php } ?>
</div>