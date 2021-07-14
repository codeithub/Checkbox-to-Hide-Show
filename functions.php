add_filter( 'woocommerce_checkout_fields' , 'codeithub_display_checkbox_and_new_checkout_field' );
  
function codeithub_display_checkbox_and_new_checkout_field( $fields ) {
  
$fields['billing']['checkbox_trigger'] = array(
    'type'      => 'checkbox',
    'label'     => __('Checkbox label', 'woocommerce'),
    'class'     => array('form-row-wide'),
    'clear'     => true
);   
    
$fields['billing']['new_billing_field'] = array(
    'label'     => __('New Billing Field Label', 'woocommerce'),
    'placeholder'   => _x('New Billing Field Placeholder', 'placeholder', 'woocommerce'),
    'class'     => array('form-row-wide'),
    'clear'     => true
);
  
return $fields;
  
}
  
add_action( 'woocommerce_after_checkout_form', 'codeithub_conditionally_hide_show_new_field', 9999 );
  
function codeithub_conditionally_hide_show_new_field() {
    
  wc_enqueue_js( "
      jQuery('input#checkbox_trigger').change(function(){
           
         if (! this.checked) {
            // HIDE IF NOT CHECKED
            jQuery('#new_billing_field_field').fadeOut();
            jQuery('#new_billing_field_field input').val('');         
         } else {
            // SHOW IF CHECKED
            jQuery('#new_billing_field_field').fadeIn();
         }
           
      }).change();
  ");
       
}
