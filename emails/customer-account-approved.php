<?php if (!defined('ABSPATH')) exit; ?>
 
<?php do_action('woocommerce_email_header', $email_heading); ?>
 
<p><?php echo sprintf(__("Good news! Your account has been approved. You can now login here: %s.", 'woocommerce'), get_permalink(woocommerce_get_page_id('myaccount'))); ?></p>
 
<ul>
        <li><?php echo sprintf(__('Username: %s', 'woocommerce'), $user_login); ?></li>
        <li><?php echo sprintf(__('Password: %s', 'woocommerce'), $user_pass); ?></li>
</ul>
 
<p><?php echo sprintf(__("Thanks for registering with %s!", 'woocommerce'), $blogname); ?></p>
 
<div style="clear:both;"></div>
 
<?php do_action('woocommerce_email_footer'); ?>