<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

get_header( '' ); ?>

  <?php product_path('breadcrumbs'); ?>

  <div class="main-container col1-layout">
          <div class="main">          

            <div class="product-list-wrap">
              <div class="container">
                <div class="row">
                  <div class="col-md-9">
                  <div class="ma-bestsellerproductslider-container">
                  <div class="row">
                    
                    <div class="toolbar row">
                        <div class="col-md-6">
                          <div class="product-result-count">                          
                          <?php
                          global $wp_query;
                          $paged    = max( 1, $wp_query->get( 'paged' ) );
                          $per_page = $wp_query->get( 'posts_per_page' );
                          $total    = $wp_query->found_posts;
                          $first    = ( $per_page * $paged ) - $per_page + 1;
                          $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

                          if ( $total <= $per_page || -1 === $per_page ) {
                            printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
                          } else {
                            printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
                          }
                          ?>
                          <?php //echo $paged; ?>
                           
                          </div>
                        </div>
                        <div class="sorter col-md-6">
                          <div class="sort-by hidden-xs">                        

              <form class="woocommerce-ordering" method="get">
                
                <?php woocommerce_catalog_ordering(); ?>
                
                <?php
                  // Keep query string vars intact
                  foreach ( $_GET as $key => $val ) {
                    if ( 'orderby' === $key || 'submit' === $key ) {
                      continue;
                    }
                    if ( is_array( $val ) ) {
                      foreach( $val as $innerVal ) {
                        echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                      }
                    } else {
                      echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
                    }
                  }
                ?>
              </form>                            

                           </div>
                        </div><!-- /.sorter -->                          
                      </div>
                    </div>                    
                    <div class="row">
                       <ul class="owl">
                        <!-- Loop Start -->
            <?php while ( have_posts() ) : the_post(); ?> 
                          <?php global $product; ?>
                          <li class='col-md-4 bestsellerproductslider-item'>
                            <div class="item-inner">
                              <div class="ma-box-content">
                                <div class="box-hover">
                                  <div class="actions">
                                    <ul class="add-to-links">
                                      <li><!-- <a href="#9" class="link-wishlist fa fa-heart"><em>Add to Wishlist</em></a> -->
                                      <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                      </li>
                                      <!--<li><!-- <span class="separator">|</span> <a href="#9" class="link-compare fa fa-refresh"><em>Add to Compare</em></a> -->
                                      <?php //echo do_shortcode('[yith_compare_button]');  ?>
                                      <!--</li>-->
                                    </ul>
                                  </div><!-- /.actions -->
                                  <!--<div class="ratings">
                                    <div class="rating-box">
                                      <div class="rating" style="width:80%"></div>
                                    </div>
                                    <span class="amount"><a href="#">1 Review(s)</a></span>
                                  </div>--><!-- /.ratings -->
                                  <h2 class="product-name"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                  <div class="actions ">
                                    <!-- <button type="button" title="" class="button btn-cart"> -->
                                    <?php // woocommerce_template_loop_add_to_cart( $loop->post, $product );
                                    ?>    
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
                                    <!-- </button> -->
                                  </div>
                                </div><!-- /.box-hover -->
                                <div class="box-hidden">
                                  <a href="<?php the_permalink(); ?>" title="Cras neque metus" class="product-image"><img src="<?php echo get_the_post_thumbnail_url($loop->post,'thumbnail'); ?>" alt="Cras neque metus" />
                                  </a>
                                  <h2 class="product-name"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                  <?php global $current_user;

                                    get_currentuserinfo();

                                    $roles = wp_get_current_user()->roles;
                                    if(!in_array('hospital_user', $roles)){

                                   ?>
                                    <div class="price-box">
                                   <?php echo $product->get_price_html(); ?>
                                    </div>
                                    <?php } ?>
                                  </div>

                                </div><!-- /.box-hidden -->
                              </div><!-- /.ma-box-content -->
                          </li><!-- /.bestsellerproductslider-item -->
                        
                        <?php endwhile; // end of the loop. ?>
                        <!-- Loop End -->
                          
                        </ul>
                      </div>
                     </div> 

                     <!-- PAGINATION -->
                            <div class="row">
                              <div class="col-md-12 text-center">                                  
                                <nav class="woocommerce-pagination">
                                <?php
                                  echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
                                    'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                    'format'       => '',
                                    'add_args'     => false,
                                    'current'      => max( 1, get_query_var( 'paged' ) ),
                                    'total'        => $wp_query->max_num_pages,
                                    'prev_text'    => '&larr;',
                                    'next_text'    => '&rarr;',
                                    'type'         => 'list',
                                    'end_size'     => 3,
                                    'mid_size'     => 3
                                  ) ) );
                                ?>
                                </nav>
                              </div>
                            </div> <!-- row -->
                  </div><!--col-md-9-->
                  <div class="sidebar col-md-3">
                    

                    <div class="block block-category">
                      <div class="block-title">


                          <ul id="sidebar">
                          <?php get_sidebar(); ?>
                          </ul>

                     
                        <!-- <strong><span>categories</span></strong> -->
                      </div>

                    <!--   <div class="block-content">
                        <ul class="category-list">
                          <li><a href="#product-list.html">Personal Health Care</a>
                          </li>
                          <li><a href="#product-list.html">Professional Health Care</a>
                          </li>
                          <li><a href="#product-list.html">Fitness</a>
                          </li>
                          <li><a href="#product-list.html">Health</a>
                          </li>
                          <li><a href="#product-list.html">Personal care</a>
                          </li>
                          <li><a href="#product-list.html">Beauty</a>
                          </li>
                        </ul>
                      </div> -->
                    </div>                   

                     
                   <!--  <form id="search_mini_form" method="get">
                      <div class="form-search">
                        <label for="search">Search:</label>
                          <input id="search" name="q" value="" class="input-text" maxlength="128" placeholder="Enter keywords to search..." type="text">
                          <div class="loading_image_search"></div>
                          <button type="submit" title="Search" class="button"><span><span><i class="fa fa-search "></i>Search</span></span></button>
                      </div>
                    </form> -->

                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            <script type="text/javascript">
    //           jQuery(document).ready(function($){
    //             $(".ma-bestsellerproductslider-container .owl").owlCarousel({
    //   autoPlay: false,
    //   items: 4,
    //   itemsDesktop: [1199, 4],
    //   itemsDesktopSmall: [980, 2],
    //   itemsTablet: [768, 2],
    //   itemsMobile: [479, 1],
    //   slideSpeed: 1000,
    //   paginationSpeed: 1000,
    //   rewindSpeed: 1000,
    //   navigation: false,
    //   stopOnHover: true,
    //   pagination: false,
    // });
    //           })
            </script>
<?php get_footer('shop'); ?>
