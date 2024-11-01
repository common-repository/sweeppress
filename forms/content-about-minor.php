<?php

use Dev4Press\v51\Core\Quick\KSES;
use function Dev4Press\v51\Functions\panel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="d4p-about-minor">
    <h3><?php esc_html_e( 'Maintenance and Security Releases', 'sweeppress' ); ?></h3>

    <p>
        <strong><?php esc_html_e( 'Version', 'sweeppress' ); ?> <span>6.1</span></strong> &minus;
        Many updates to Pro only code. Fire actions on some events.
    </p>
    <p>
        <strong><?php esc_html_e( 'Version', 'sweeppress' ); ?> <span>6.0.1</span></strong> &minus;
        Minor updates and fixes.
    </p>
    <p>
		<?php echo KSES::standard( sprintf( __( 'For more information, see <a href=\'%s\'>the changelog</a>.', 'sweeppress' ), panel()->a()->panel_url( 'about', 'changelog' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
    </p>
</div>
