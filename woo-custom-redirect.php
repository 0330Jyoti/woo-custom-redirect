<?php
/* 
Plugin Name: Woo Custom Redirect  
Description: woo-custom-redirect
Version: 1.0.1
Author: Jyoti
*/


// Hook to add the menu
add_action('admin_menu', 'woo_custom_redirect_menu');

// Create a menu for the plugin
function woo_custom_redirect_menu() {
    add_menu_page(
        'Woo Custom Redirect', 
        'Woo Custom Redirect', 
        'manage_options', 
        'woo-custom-redirect-settings', 
        'woo_custom_redirect_settings_page', 
        'dashicons-admin-generic'  
    );
}

// Callback function to display the settings page content
function woo_custom_redirect_settings_page() {
    
    
?>
<style>
    /* custom-redirect.css */

/* Style the form container */
.wrap-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top:50px;
}

/* Style the heading */
h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

/* Style the paragraph */
p {
    font-size: 16px;
    margin-bottom: 20px;
}

/* Style the input field */
input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the submit button */
input[type="submit"] {
    background-color: #0073e6;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

</style>
<?php
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the selected page ID from the form
        $selected_page_id = intval($_POST['selected_page']);

        // Get the permalink of the selected page
        $redirect_url = get_permalink($selected_page_id);

        // Perform the redirection
        wp_redirect($redirect_url);
        exit;
    }

    // Get a list of all pages
    $pages = get_pages();

    // Display the settings page content with the form
    echo '<div class="wrap-container">';
    echo '<h2>Woo Custom Redirect Settings</h2>';
    echo '<p>Select a page to which you want to redirect:</p>';
    
    // Display the form with a dropdown menu
    echo '<form method="post" action="">';

    // Dropdown menu for selecting a page
    echo '<select name="selected_page">';
    foreach ($pages as $page) {
        echo '<option value="' . esc_attr($page->ID) . '">' . esc_html($page->post_title) . '</option>';
    }
    echo '</select>';

    echo '<input type="submit" name="submit" value="Redirect">';
    echo '</form>';
    
    echo '</div>';

}

add_filter( 'woocommerce_login_redirect', 'geekerhub_customer_login_redirect', 9999 );
 
function geekerhub_customer_login_redirect( $redirect_url ) {
    $redirect_url = 'https://geekerhub.com/jyoti_workspace/wordpress/shop';
    return $redirect_url;
}