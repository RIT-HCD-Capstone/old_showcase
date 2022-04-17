<?php
/**
 * @package CAD-Mail-From-Address
 * @version 1.0
 */
/*
Plugin Name: CAD Mail From Address
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Description: This plugin works with the CAD web environment to change your from email address. These changes work with the CAD and RIT mail environments.
Author: Bradley Coudriet
Version: 1.0
Author URI: https://helpdesk.cad.rit.edu/
*/



add_filter( 'wp_mail_from', 'custom_wp_mail_from' );
function custom_wp_mail_from( $original_email_address ) {
        //Make sure the email is from the same domain
        //as your website to avoid being marked as spam.
        return get_current_user()."@rit.edu";
}

