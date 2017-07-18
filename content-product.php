<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li class="bestsellerproductslider-item">
  <div class="item-inner">
    <div class="ma-box-content">
      <div class="box-hover">
        <div class="actions">
          <ul class="add-to-links">
            <li> <?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
            <!-- <a href="#9" class="link-wishlist fa fa-heart"><em>Add to Wishlist</em></a> -->
            </li>
            <!--<li><!-- <span class="separator">|</span> <a href="#9" class="link-compare fa fa-refresh"><em>Add to Compare</em></a> -->
                 <?php //echo do_shortcode('[yith_compare_button]');  ?>
          <!--  </li> -->
          </ul>
        </div><!-- /.actions -->
        <div class="ratings">
          <div class="rating-box">
            <div class="rating" style="width:80%"></div>
          </div>
          <span class="amount"><a href="#">1 Review(s)</a></span>
        </div><!-- /.ratings -->
        <h2 class="product-name"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="actions ">
        <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
        sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
          esc_url( $product->add_to_cart_url() ),
          esc_attr( isset( $quantity ) ? $quantity : 1 ),
          esc_attr( $product->id ),
          esc_attr( $product->get_sku() ),
          esc_attr( isset( $class ) ? $class : 'button btn-cart' ),
          esc_html( $product->add_to_cart_text() )
        ),
        $product );
         ?>
<span class="loading-add_<?php echo $product->id; ?>" style="width: 16px; height: 16px; visibility: hidden;"> <img src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" class="ajax-loading" alt="loading" style="width:16px;height:16px;" width="16" height="16"></span>
        </div>
      </div><!-- /.box-hover -->
      <div class="box-hidden">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="product-image"> 
        <?php  the_post_thumbnail(); ?>
        </a>
        <h2 class="product-name"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="price-box">
          <div class="price-boxs">
            <span class="regular-price">
                 <?php global $current_user;

                  get_currentuserinfo();

                  $roles = wp_get_current_user()->roles;
                  if(!in_array('hospital_user', $roles)){

                 ?>
              
              <span class="price"><?php echo $product->get_price_html(); ?></span>
              <? } ?>
            </span>
          </div>
        </div>

      </div><!-- /.box-hidden -->
    </div><!-- /.ma-box-content -->
  </div><!-- /.item-inner --> 
</li><!-- /.bestsellerproductslider-item -->
