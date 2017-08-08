<div class="our-section clearfix">
					<div class="col-sm-12 col-md-12">
						<h1 class="overlay-title">our sections </h1>
					</div>
					<div class="production">
						<ul>						
							<?php 
							$args = array(
								'number'     => $number,
								'orderby'    => 'title',
								'order'      => 'ASC',
								'hide_empty' => $hide_empty,
								'include'    => $ids
								);
							$product_categories = get_terms( 'product_cat', $args );
							$count = count($product_categories);
							if ( $count > 0 ){

								foreach ( $product_categories as $product_category ) { 
									
									?>
								<li class="col-sm-6 col-md-4">
								<a href="#" class="lnks-pp" data-toggle="modal" data-target="#myModal-<?php echo $product_category->term_id; ?>"></a>
									
									<?php

					       				//category details
									$thumbnail_id = get_woocommerce_term_meta( $product_category->term_id, 'thumbnail_id', true );
									$image = wp_get_attachment_url( $thumbnail_id );	
									$title = $product_category->name;					
									$description = $product_category->description;	
								    ?>
								    
									<div class="prod-img" style="background: url('<?php echo $image; ?>'); background-size: cover;">
										<div class="prod-title">
										<h2><a href="<?php echo get_term_link( $product_category ); ?>"><? echo $title; ?></a></h2>

										</div>
									</div>
									<!-- modal -->
								<div class="modal fade" id="myModal-<?php echo $product_category->term_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
								         </button>	
								      </div>
								      <div class="modal-body">
								        <div class="mid-sec-det-pp">
								        	<div class="pop-top-cnt">
								        		<div class="prod-title overlay-title">		<h2><?php echo $title; ?></h2>				
								        		</div>
												<div class="week-product-basic">
													<p>	
													<?php echo $description; ?>

													</p>
													
												</div>
												
											</div>
								        </div>
								      </div>
								    </div>
								  </div>
								</div>
							<!-- end modal -->	
								</li>
								<?php
						} //end of foreach loop
						wp_reset_query();
					} //end of count
					?>
				</ul>			
			</div>
		</div>
