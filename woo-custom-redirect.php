<?php
/* 
Plugin Name: Woo Custom Redirect  
Description: woo-custom-redirect
Version: 1.0.1
Author: Jyoti
*/



add_filter( 'woocommerce_login_redirect', 'geekerhub_customer_login_redirect', 9999 );
 
function geekerhub_customer_login_redirect( $redirect_url ) {
    $redirect_url = 'https://geekerhub.com/jyoti_workspace/wordpress/shop';
    return $redirect_url;
}