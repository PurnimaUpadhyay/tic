<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $current_user;

$page_title = ( $load_address == 'billing' ) ? __( 'Billing Address','thevoux' ) : __( 'Shipping Address','thevoux' );

get_currentuserinfo();

?>
<div class="row">
<div class="small-12 small-centered medium-8 large-4 xlarge-3 columns">
		<?php wc_print_notices()  ?>

		<?php if (!$load_address) : ?>

			<?php wc_get_template('myaccount/my-address.php'); ?>

		<?php else : ?>

			<form method="post" class="edit-address-form">

				<?php
				foreach ($address as $key => $field) :
					woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] );
				endforeach;
				?>

				<p>
					<input type="submit" class="button black small" name="save_address" value="<?php _e( 'Save Address','thevoux' ); ?>" />
					<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
					<input type="hidden" name="action" value="edit_address" />
				</p>

			</form>

		<?php endif; ?>	
</div>
</div>