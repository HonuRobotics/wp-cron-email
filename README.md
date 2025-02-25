# Honu Cron Email

## Summary
The Honu Cron Email plugin is a simple WordPress plugin designed to
automatically send a test email using WordPress cron. This helps verify the
functionality of your WordPress mail service.

## Installation
1. Download the `honu-cron-email.php` file.
2. Upload the file to the `/wp-content/plugins/honu-cron-email/` directory of
    your WordPress installation.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Customization
By default, the plugin schedules the email to be sent every Tuesday. You can
customize the schedule by modifying the `wp_schedule_event` function in the
`honu-cron-email.php` file.

### Example
To change the schedule to send the email every Monday, update the following
line:

```php
wp_schedule_event(strtotime('next Tuesday'), 'weekly', 'honu_send_scheduled_test_email');
```

to:

```php
wp_schedule_event(strtotime('next Monday'), 'weekly', 'honu_send_scheduled_test_email');
```

You can also change the recurrence interval by replacing `'weekly'` with other
intervals such as `'daily'`, `'hourly'`, or custom intervals defined in your
WordPress setup.

For more information on scheduling events in WordPress, refer to the
[WordPress Codex](https://developer.wordpress.org/plugins/cron/).