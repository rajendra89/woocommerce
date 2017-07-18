<?php
/*
Template Name: Hospital_email 
*/
?>

<?php 
get_header(); ?>



<div class="container">
	<div class="col-lg-9">
			<p style="font-size:22px;">
				Dear Hospital User,
				you have order following products:

				<?php echo get_cart_content(); ?>
				
				<!-- custom email to admin abt order by Hospital user -->
				<?php 

				//$user_login = 'Binod';
				echo 'Username: ' . $current_user->user_login . '<br />';
				 echo 'User email: ' . $current_user->user_email . '<br />';
				//$user_email = 'Binod';
				
				$order_detail = get_cart_content();

				$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

				$subject  = 'New order from Hospital ';
				$email_heading  = "User $user_login has been approved";

        		// Buffer
				ob_start();

        		// Get mail template
				woocommerce_get_template('emails/hospital-order.php', array(
					'user_login'    => $user_login,
					'user_pass'             => $user_pass,
					'blogname'              => $blogname,
					'email_heading' => $email_heading
					));

        		// Get contents
				$message = ob_get_clean();

        		// Send the mail
				woocommerce_mail( 'kulchan.rajendra@gmail.com', 'hospital-order-detail', $message, $headers = "Content-Type: text/htmlrn", $attachments = "" ); ?>


				 ?>

			</p>
	</div>
	
		
	<div class="col-lg-3 ">
			<?php get_sidebar(); ?>
		
	</div>
</div>

<?php get_footer(); ?>




