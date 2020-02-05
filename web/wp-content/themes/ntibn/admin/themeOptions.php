<?php   
//SETTING UP THE PAGE
function set_page() {
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );   
    add_menu_page('NTIBN', 'NTIBN', 'manage_options', 'ntibn_data', 'the_page', '', 40);
    //add_submenu_page($parent_slug,$page_title, $menu_title, $capability,$menu_slug, callable $function = '',$position = null );
    add_submenu_page('ntibn_data','Payments', 'Payments', 'manage_options','payments','payments_page',null );
}
//CALLING THE FUNCTION
add_action('admin_menu', 'set_page');?>
<?php //THE PAGE
function the_page() {?>
<?php
//COLORPICKER 
 if( is_admin() ) {
        // Add the color picker css file      
        wp_enqueue_style( 'wp-color-picker' );    
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', get_template_directory_uri() .'/admin/inc/custom-script.js', array( 'wp-color-picker' ), false, true );
    }
?><?php include('the_page.php');?>
<?php } ?>
<?php
//REGISTERING SETTINGS AND FIELDS
function register_settings_and_fields() {
    register_setting('theme_settings','theme_settings');
}

add_action('admin_init', 'register_settings_and_fields');

//Loading Scripts Correctly in the WordPress Admin
 function load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}
?>
<?php 
function payments_page(){
    include('payments_page.php');
}
?>