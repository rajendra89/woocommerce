<?php
/**
 * Hospital User Order
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.3.0
 */


if (!defined('ABSPATH')) exit; ?>
 
<?php do_action('woocommerce_email_header', $email_heading); ?>
 
<p>Hello Admin, Following hospital user order details:</p>
 
<ul>
        <li><?php echo sprintf(__('Username: %s', 'woocommerce'), $user_login); ?></li>
        <li><?php echo sprintf(__('Useremail: %s', 'woocommerce'), $user_email); ?></li>
        <li><?php echo get_cart_content(); ?></li>
</ul>
 
<p><?php echo sprintf(__("Thanks for business with %s!", 'woocommerce'), $blogname); ?></p>
 
<div style="clear:both;"></div>
 
<?php do_action('woocommerce_email_footer'); ?>