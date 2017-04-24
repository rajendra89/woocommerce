add_action( 'woocommerce_product_options_general_product_data', 'wc_custom_add_custom_fields' );
function wc_custom_add_custom_fields() {
    // Print a custom text field
    woocommerce_wp_text_input( array(
        'id' => '_custom_text_field1',
        'label' => 'Name',
        'description' => ' Field, you can write your Name.',
        'desc_tip' => 'true',      
        'placeholder' => 'Ram'
    ) ); 
}
