<?php
/**
 * Notice
 *
 * Notice related functionality goes in this file.
 *
 * @since   1.0.0
 * @package WP
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! function_exists( 'ga_events_review_notice' ) ) {
    // Add an admin notice.
    add_action( 'admin_notices', 'ga_events_review_notice' );

    /**
     *  Admin Notice to Encourage a Review or Donation.
     *
     *  @author Matt Cromwell
     *  @version 1.0.0
     */
    function ga_events_review_notice() {
        // Define your Plugin name, review url, and donation url.
        $plugin_name = 'WP Google Analytics Events';
        $review_url = 'https://wordpress.org/support/view/plugin-reviews/wp-google-analytics-events';
        $donate_url = 'https://wpflow.com/upgrade';
        // Get current user.
        global $current_user, $pagenow ;
        $user_id = $current_user->ID;
        // Get today's timestamp.
        $today = mktime( 0, 0, 0, date('m')  , date('d'), date('Y') );
        $actdate = get_option( 'ga_events_activation_date', false );
        $installed = ( ! empty( $actdate ) ? $actdate : '999999999999999' );
        if ( $installed <= $today ) {
            // Make sure we're on the plugins page.
                // If the user hasn't already dismissed our alert,
                // Output the activation banner.
                $nag_admin_dismiss_url = 'plugins.php?ga_events_review_dismiss=0';
                $user_meta             = get_user_meta( $user_id, 'ga_events_review_dismiss' );
                if ( empty($user_meta) ) {
                    ?>
                    <div class="update-nag">

                        <style>
                            div.review {
                                position: relative;
                                margin-left: 35px;
                                height: 80px;
                                display:block;
                            }
                            div.review span.ga-events-icon {
                                color: white;
                                position: absolute;
                                left: -30px;
                                /*padding: 9px;*/
                                /*top: -8px;*/
                            }
                            div.review strong {
                                color: #66BB6A;
                            }
                            div.review a.dismiss {
                                float: right;
                                text-decoration: none;
                                color: #000000;
                            }
                            .review a  {
                                color:#ED494D;
                            }
                            .ga-events-notice-text {
                                display: inline-block;
                                margin-left: 170px;
                                margin-top: 24px;
                            }

                        </style>
                        <?php
                        // For testing purposes
                        //echo '<p>Today = ' . $today . '</p>';
                        //echo '<p>Installed = ' . $installed . '</p>';
                        ?>

                        <div class="review">
                            <span class="ga-events-icon">
                                <img src="<?php echo plugins_url( 'images/WPGAE_Logo-177x78.png', dirname(__FILE__)) ?>">
                            </span>
                            <span class="ga-events-notice-text">
                                <?php echo wp_kses( sprintf( __( 'Thank you for using <strong>' . $plugin_name . '</strong>? We would love to hear about <a href="https://wpflow.com/contact">your experience</a> with the plugin. Need more features? <a href="https://wpflow.com/upgrade" target="_blank">Upgrade Now</a> to unlock.', 'ga_events_text' ), esc_url( $donate_url ), esc_url( $review_url ) ), array( 'strong' => array(), 'a' => array( 'href' => array(), 'target' => array() ) ) ); ?>
                            </span>
                            <a href="<?php echo admin_url( $nag_admin_dismiss_url ); ?>" class="dismiss"><span class="dashicons dashicons-dismiss"></span></a>
                        </div>

                    </div>

                <?php }
        }
    }
}
if ( function_exists( 'ga_events_ignore_review_notice' ) ) {
    // Function to force the Review Admin Notice to stay dismissed correctly.
    add_action('admin_init', 'ga_events_ignore_review_notice');
    /**
     * Ignore review notice.
     *
     * @since  1.0.0
     */
}
function ga_events_ignore_review_notice() {
    if ( isset( $_GET[ 'ga_events_review_dismiss' ] ) && '0' == $_GET[ 'ga_events_review_dismiss' ] ) {
        // Get the global user.
        global $current_user;
        $user_id = $current_user->ID;
        add_user_meta( $user_id, 'ga_events_review_dismiss', 'true', true );
    }
}
