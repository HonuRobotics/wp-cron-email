<?php
/**
 * Plugin Name: Honu Cron Email
 * Description: A simple plugin to send a test email automatically using WordPress cron.
 * Version: 1.0
 * Author: Honu Robotics
 * Author URI: https://honurobotics.com
 * License: Apache License 2.0
 * License URI: https://www.apache.org/licenses/LICENSE-2.0
 */

if (!defined('ABSPATH')) {
    exit;
}

function honu_schedule_email_check() {
    if (!wp_next_scheduled('honu_send_scheduled_test_email')) {
        // Define your schedule time here. (Honu meetings happen on Tuesdays and
        wp_schedule_event(strtotime('next Tuesday'), 'weekly', 'honu_send_scheduled_test_email');
        wp_schedule_event(strtotime('next Thursday'), 'weekly', 'honu_send_scheduled_test_email');
    }
}
register_activation_hook(__FILE__, 'honu_schedule_email_check');

// Clear the scheduled event on deactivation
function honu_clear_scheduled_email_check() {
    wp_clear_scheduled_hook('honu_send_scheduled_test_email');
}
register_deactivation_hook(__FILE__, 'honu_clear_scheduled_email_check');

// Function to send test email automatically
function honu_send_scheduled_test_email() {
    $admin_email = get_option('admin_email');
    $subject = '✅ Scheduled Test Email from Honu Cron Email';
    $message = 'This is a scheduled test email to verify your WordPress mail service functionality.\n\n 🐢 ';
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    wp_mail($admin_email, $subject, $message, $headers);
}
add_action('honu_send_scheduled_test_email', 'honu_send_scheduled_test_email');