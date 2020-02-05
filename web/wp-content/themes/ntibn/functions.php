<?php
/* * *********
 * Adding Useful Function
 */
require_once get_template_directory() . '/admin/admin.php';

/*for demo aspire*/
@ini_set( 'upload_max_size' , '120M' );
@ini_set( 'post_max_size', '120M');
@ini_set( 'max_execution_time', '300' );

/* * *********
 * STYLESHEETS & SCRIPTS
 */
 
function add_theme_scripts() {

    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.1', 'all');
    wp_enqueue_style('sweetalert', get_template_directory_uri() . '/css/sweetalert.css', array(), '1.1', 'all');
    wp_enqueue_style('css1', get_template_directory_uri() . '/css/css(1).css', array(), '1.1', 'all');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.1', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.1', 'all');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css', array(), '1.1', 'all');
    wp_enqueue_style('venobox', get_template_directory_uri() . '/css/venobox.css', array(), '1.1', 'all');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.1', 'all');

    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.1', 'all');

    wp_enqueue_script("jquery");
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/js/easing.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array('jquery'), 1.1, true);
    wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('venobox', get_template_directory_uri() . '/js/venobox.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), 1.1, true);
//    <script src="{{ url('/js/jquery-3.4.1.js') }}"></script>
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 1.1, true);
//wp_enqueue_script( 'sweetalert', get_template_directory_uri() . '/js/sweetalert.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), 1.1, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/jquery.payform.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('sweetalert', get_template_directory_uri() . '/js/sweetalert.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('bootstrap-multiselect', get_template_directory_uri() . '/js/bootstrap-multiselect.js', array('jquery'), 1.1, true);
//wp_enqueue_script( 'cardvalidation', get_template_directory_uri() . '/js/cardvalidation.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 1.1, true);

//if (is_page_template('register')) { 
    wp_enqueue_style('form-style', get_template_directory_uri() . '/css/form-style.css', array(), '1.2', 'all');
//}
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');


/* * *********
 * ADDING MENU
 */
include( get_template_directory() . '/inc/walker.php');
include( get_template_directory() . '/inc/walker_mobile.php');
add_theme_support('menus');

function register_theme_menus() {
    register_nav_menus(
            array('primary_menu' => _('Primary Menu'))
    );
//    register_nav_menus(
//            array('mobile_menu' => _('Mobile Menu'))
//    );
    register_nav_menus(
            array('footer_menu' => _('Footer Menu'))
    );
}

add_action('init', 'register_theme_menus');
/* * *********
 * REMOVING UNWANTED SCRIPTS
 */

//remove_action('wp_head', 'wp_generator');
//remove_action( 'wp_head', 'rsd_link' );
//remove_action( 'wp_head', 'wlwmanifest_link' );
//remove_action( 'wp_head', 'wp_generator' );
//remove_action( 'wp_head', 'start_post_rel_link' );
//remove_action( 'wp_head', 'index_rel_link' );
//remove_action( 'wp_head', 'adjacent_posts_rel_link' );
//remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
//remove_action( 'wp_head', 'bs_shortcodes-css' );
//remove_action( 'wp_head', 'bs_bootstrap-css' );
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//remove_action('wp_head', 'start_post_rel_link', 10, 0);
//remove_action('wp_head', 'feed_links', 2);
//remove_action('wp_head', 'feed_links_extra', 3);
//remove_action('wp_head', 'parent_post_rel_link', 10, 0);

/* * *********
 * WIDGETS
 */

function create_widget($name, $id, $description) {
    register_sidebar(array(
        'name' => __($name),
        'id' => $id,
        'description' => __($description),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title %2$s">',
        'after_title' => '</h3>'
    ));
}

create_widget('Page Sidebar', 'page', 'Appears on the side of pages with a sidebar');
//create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );

create_widget('Client One', 'client_1', 'Appears below content, on the far right corner of the page');
create_widget('Client Two', 'client_2', 'Appears below content, on the centner of the page');
create_widget('Client Three', 'client_3', 'Appears below content, on the far left corner of the page');

create_widget('Contact One', 'contact_1', 'Appears below Clients, on the far right corner of the page');
create_widget('Contact Two', 'contact_2', 'Appears below Clients, on the centner of the page');
create_widget('Contact Three', 'contact_3', 'Appears below Clients, on the far left corner of the page');

/* Disable WordPress Admin Bar for all users but admins. */
//add_filter( 'show_admin_bar', '__return_false' );

/**
 * ADDING FEATURED IMAGE OPTION
 */
add_theme_support('post-thumbnails');

/* * *
 * Removing p Tags
 * * */
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


/* * ***
 * * ADDING BLOG HOME TO NAVIGATION IF CREATING BLOG
 * * */

function childtheme_menu_args($args) {
    $args = array(
        'show_home' => 'Home',
        'sort_column' => 'menu_order',
        'menu_class' => 'menu',
        'echo' => true
    );
    return $args;
}

add_filter('wp_page_menu_args', 'childtheme_menu_args');
/* * ***
 * * BREADCRUMBS
 * * */

function the_breadcrumb() {
    echo "<ol class='breadcrumb'>";
    if (!is_home()) {
        echo '<li><a href="' . get_option('home') . '"> Home ' . "</a><li>";
        if (is_category() || is_single()) {
            echo '<li>' . the_category('title_li=') . '</li>';
            if (is_single()) {
                the_title();
            }
        } elseif (is_page()) {
            the_title();
        }
    }//is_home
    echo "</ol>";
}

/* CUSTOM EXCERPT LENGTH */

function custom_excerpt_length($length) {
    return 30;
}

add_filter('excerpt_length', 'custom_excerpt_length');

/* * **
  REMOVE [] FROM EXCERPT:
 * * */

function new_excerpt_more($more) {
    return '...';
}

/////////////////////////////////////////
// CATEGORY ID IN BODY AND POST CLASS
////////////////////////////////
//function category_id_class($classes) {
//    global $post;
//    foreach ((get_the_category($post->ID)) as $category)
//        $classes [] = 'cat-' . $category->cat_ID . '-id';
//    return $classes;
//}
//
//add_filter('post_class', 'category_id_class');
//add_filter('body_class', 'category_id_class');

////////////////////////////
// ESCAPE HTML ENTITIES IN COMMENTS
///////////////////////////
function encode_code_in_comment($source) {
    $encoded = preg_replace_callback('/<code>(.*?)<\/code>/ims', create_function('$matches', '$matches[1] = preg_replace(array("/^[\r|\n]+/i", "/[\r|\n]+$/i"), "", $matches[1]); 
	return "<code>" . htmlentities($matches[1]) . "</code>";'), $source);
    if ($encoded)
        return $encoded;
    else
        return $source;
}

add_filter('pre_comment_content', 'encode_code_in_comment');
////////////////////////////
// THEME OPTIONS
///////////////////////////

include('admin/themeOptions.php');
/* get theme options */ $options = get_option('theme_settings');
global $options;
?>
<?php

function ntibn_user_profile_fields($user) { ?>
    <h3><?php _e("NTIBN Business information", "blank"); ?></h3>
<style>tr.user-url-wrap {    display: none;}</style>
    <table class="form-table">
        <!--<tr><th colspan="2"><h3>User</h3></th></tr>-->
        <tr>
            <th><label for="name"><?php _e("Name"); ?></label></th>
            <td>
                <input type="text" name="name" id="name" value="<?php echo esc_attr(get_the_author_meta('name', $user->ID)); ?>" class="regular-text" /><br />
                <!--<span class="description"><?php // _e("Please enter your name."); ?></span>-->
            </td>
        </tr>
        <tr>
            <th><label for="buss_location"><?php _e("Locations"); ?></label></th>
            <td>
                <textarea name="buss_location" id="buss_location" class="regular-text"><?php $locations = get_the_author_meta('buss_location', $user->ID);if($locations > 0){ foreach($locations as $loc){echo $loc.',';} }else{ echo 'Null';} ?></textarea>
         
            </td>
        </tr>

        <tr>
            <th><label for="title"><?php _e("Title"); ?></label></th>
            <td>
                <input type="text" name="title" id="title" value="<?php echo esc_attr(get_the_author_meta('title', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="position"><?php _e("Position"); ?></label></th>
            <td>
                <input type="text" name="position" id="position" value="<?php echo esc_attr(get_the_author_meta('position', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="user_phone"><?php _e("User Phone"); ?></label></th>
            <td>
                <input type="text" name="user_phone" id="user_phone" value="<?php echo esc_attr(get_the_author_meta('user_phone', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="user_mobile"><?php _e("User Mobile"); ?></label></th>
            <td>
                <input type="text" name="user_mobile" id="user_mobile" value="<?php echo esc_attr(get_the_author_meta('user_mobile', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>

        <tr>
            <th><label for="user_fax"><?php _e("User Fax"); ?></label></th>
            <td>
                <input type="text" name="user_fax" id="user_fax" value="<?php echo esc_attr(get_the_author_meta('user_fax', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>

        <tr>
            <th><label for="user_postal"><?php _e("User Postal"); ?></label></th>
            <td>
                <input type="text" name="user_postal" id="user_postal" value="<?php echo esc_attr(get_the_author_meta('user_postal', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="user_town"><?php _e("User Town"); ?></label></th>
            <td>
                <input type="text" name="user_town" id="user_town" value="<?php echo esc_attr(get_the_author_meta('user_town', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>

        <tr>
            <th><label for="user_state"><?php _e("User State"); ?></label></th>
            <td>
                <input type="text" name="user_state" id="user_state" value="<?php echo esc_attr(get_the_author_meta('user_state', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="user_postcode"><?php _e("Postal Code"); ?></label></th>
            <td>
                <input type="text" name="user_postcode" id="user_postcode" value="<?php echo esc_attr(get_the_author_meta('user_postcode', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <!---Business---->
        <tr><th colspan="2"><h3>Business</h3></th></tr>
        <tr>
            <th><label for="business_name"><?php _e("Business/Trading Name"); ?></label></th>
            <td>
                <input type="text" name="business_name" id="business_name" value="<?php echo esc_attr(get_the_author_meta('business_name', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_email"><?php _e("Business Email"); ?></label></th>
            <td>
                <input type="text" name="buss_email" id="buss_email" value="<?php echo esc_attr(get_the_author_meta('buss_email', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_website"><?php _e("Business Website"); ?></label></th>
            <td>
                <input type="text" name="buss_website" id="buss_website" value="<?php echo esc_attr(get_the_author_meta('buss_email', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="date_business_commenced"><?php _e("Date Business Commenced"); ?></label></th>
            <td>
                <input type="text" name="date_business_commenced" id="date_business_commenced" value="<?php echo esc_attr(get_the_author_meta('date_business_commenced', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_mobile"><?php _e("Business Mobile Number"); ?></label></th>
            <td>
                <input type="text" name="buss_mobile" id="buss_mobile" value="<?php echo esc_attr(get_the_author_meta('buss_mobile', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_town"><?php _e("Business Town"); ?></label></th>
            <td>
                <input type="text" name="buss_town" id="buss_town" value="<?php echo esc_attr(get_the_author_meta('buss_town', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_state"><?php _e("Business State"); ?></label></th>
            <td>
                <input type="text" name="buss_state" id="buss_state" value="<?php echo esc_attr(get_the_author_meta('buss_state', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_postcode"><?php _e("Business postcode"); ?></label></th>
            <td>
                <input type="text" name="buss_postcode" id="buss_postcode" value="<?php echo esc_attr(get_the_author_meta('buss_postcode', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_fax"><?php _e("Business Fax"); ?></label></th>
            <td>
                <input type="text" name="buss_fax" id="buss_fax" value="<?php echo esc_attr(get_the_author_meta('buss_fax', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="buss_type"><?php _e("Business type"); ?></label></th>
            <td>
                <input type="text" name="buss_type" id="buss_type" value="<?php echo esc_attr(get_the_author_meta('buss_type', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="profit"><?php _e("Business Not for profit?"); ?></label></th>
            <td>
<input type="radio" name="profit" class="b_owned" value="n" <?php if(get_the_author_meta('profit', $user->ID) == 'n'):?> checked="checked" <?php endif;?>> No  &nbsp; &nbsp; &nbsp;
<input type="radio" name="profit" class="b_owned" value="y" <?php if(get_the_author_meta('profit', $user->ID) == 'y'):?> checked="checked" <?php endif;?>>  Yes  
                
            </td>
        </tr>
        <!--Talent-->
        <tr><th colspan="2"><h3>Talent</h3></th></tr>
        
        <tr>
            <th><label for="tal_name"><?php _e("Talent Name"); ?></label></th>
            <td>
                <input type="text" name="tal_name" id="tal_name" value="<?php echo esc_attr(get_the_author_meta('tal_name', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="tal_phone"><?php _e("Talent Phone"); ?></label></th>
            <td>
                <input type="text" name="tal_phone" id="tal_phone" value="<?php echo esc_attr(get_the_author_meta('tal_phone', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="tal_address"><?php _e("Talent Address"); ?></label></th>
            <td>
                <textarea class="regular-text" name="tal_address" id="tal_address"><?php echo esc_attr(get_the_author_meta('tal_address', $user->ID)); ?></textarea><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="tal_email"><?php _e("Talent Email"); ?></label></th>
            <td>
                <input type="text" name="tal_email" id="tal_email" value="<?php echo esc_attr(get_the_author_meta('tal_email', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
       <tr>
            <th><label for="tal_town"><?php _e("Talent Town"); ?></label></th>
            <td>
                <input type="text" name="tal_town" id="tal_town" value="<?php echo esc_attr(get_the_author_meta('tal_town', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
       <tr>
            <th><label for="tal_state"><?php _e("Talent state"); ?></label></th>
            <td>
                <input type="text" name="tal_state" id="tal_state" value="<?php echo esc_attr(get_the_author_meta('tal_state', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
       <tr>
            <th><label for="tal_postcode"><?php _e("Talent Postcode"); ?></label></th>
            <td>
                <input type="text" name="tal_postcode" id="tal_postcode" value="<?php echo esc_attr(get_the_author_meta('tal_postcode', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>  
        
        <tr>
            <th><label for="abn_entityname"><?php _e("ABN Entity Name"); ?></label></th>
            <td>
                <input type="text" name="abn_entityname" id="abn_entityname" value="<?php echo esc_attr(get_the_author_meta('abn_entityname', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
<!--        <tr>
            <th><label for="abn"><?php _e("ABN"); ?></label></th>
            <td>
                <input type="text" name="abn" id="abn" value="<?php echo esc_attr(get_the_author_meta('abn', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="acn"><?php _e("ACN"); ?></label></th>
            <td>
                <input type="text" name="acn" id="acn" value="<?php echo esc_attr(get_the_author_meta('acn', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>-->
        
        <tr>
            <th><label for="principal_place"><?php _e("Principal Place Business"); ?></label></th>
            <td>
                <input type="text" name="principal_place" id="principal_place" value="<?php echo esc_attr(get_the_author_meta('principal_place', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="add_line2"><?php _e("(Address Line 2)"); ?></label></th>
            <td>
                <textarea name="add_line2" id="add_line2" class="regular-text"><?php echo esc_attr(get_the_author_meta('add_line2', $user->ID)); ?></textarea><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="indi_owned"><?php _e("Is this business at least 51% Indigenous owned?"); ?></label></th>
            <td>
<input type="radio" name="indi_owned" class="b_owned" value="n" <?php if(get_the_author_meta('indi_owned', $user->ID) == 'n'):?> checked="checked" <?php endif;?>> No  &nbsp; &nbsp; &nbsp;
<input type="radio" name="indi_owned" class="b_owned" value="y" <?php if(get_the_author_meta('indi_owned', $user->ID) == 'y'):?> checked="checked" <?php endif;?>>  Yes  
                <br />
            </td>
        </tr>
        
        <tr>
            <th><label for="buss_staff"><?php _e("How many total staff in the business?"); ?></label></th>
            <td>
                <input type="text" name="buss_staff" id="buss_staff" value="<?php echo esc_attr(get_the_author_meta('buss_staff', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="buss_indistaff"><?php _e("How many indigenous staff in the business?"); ?></label></th>
            <td>
                <input type="text" name="buss_indistaff" id="buss_indistaff" value="<?php echo esc_attr(get_the_author_meta('buss_indistaff', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
                        <!---Signature-->
        <tr><th colspan="2"><h3>Signature</h3></th></tr>
        <tr>
            <th><label for="sign_name"><?php _e("Signature Name?"); ?></label></th>
            <td>
                <input type="text" name="sign_name" id="sign_name" value="<?php echo esc_attr(get_the_author_meta('sign_name', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="sign_position"><?php _e("Signature Position?"); ?></label></th>
            <td>
                <input type="text" name="sign_position" id="sign_position" value="<?php echo esc_attr(get_the_author_meta('sign_position', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="sign_bussname"><?php _e("Signature Business Name?"); ?></label></th>
            <td>
                <input type="text" name="sign_bussname" id="sign_bussname" value="<?php echo esc_attr(get_the_author_meta('sign_bussname', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="signature"><?php _e("Signature"); ?></label></th>
            <td>
                <input type="text" name="signature" id="signature" value="<?php echo esc_attr(get_the_author_meta('signature', $user->ID)); ?>" class="regular-text" /> &nbsp;&nbsp;&nbsp;
                <?php if(get_the_author_meta('signature', $user->ID) != ""){?> 
                                <a href="<?php echo esc_attr(get_the_author_meta('signature', $user->ID)); ?>" target="_blank">Click here to see the document</a><br />
                <?php }else{ echo 'No Document Uploaded';}?>
            </td>
        </tr>
                                <!---More-->
        <tr><th colspan="2"><h3>More</h3></th></tr>
        <tr>
            <th><label for="icn_reg"><?php _e("Are you currently registered with the ICN NT? "); ?></label></th>
            <td>
                <input type="radio" name="icn_reg" value="1" <?php if(get_the_author_meta('icn_reg', $user->ID) == '1'):?>checked="checked"<?php endif;?>> Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="icn_reg"  value="2" <?php if(get_the_author_meta('icn_reg', $user->ID) == '2'):?>checked="checked"<?php endif;?>> No
                <br />
            </td>
        </tr>
        <tr>
            <th><label for="supply_nation_registered"><?php _e("Supply Nation Registered? "); ?></label></th>
            <td>
                <input type="checkbox" name="supply_nation_registered" value="Yes" <?php if(get_the_author_meta('supply_nation_registered', $user->ID) == 'Yes'):?>checked="checked"<?php endif;?>> Yes &nbsp;&nbsp;&nbsp;
            </td>
        </tr>
<tr>
<th><label for="add_doc_1"><?php _e("Business extract"); ?></label></th>
<td>
    <input type="text" name="add_doc_1" id="add_doc_1" value="<?php echo esc_attr(get_the_author_meta('add_doc_1', $user->ID)); ?>" class="regular-text" /> &nbsp;&nbsp;&nbsp;
    <?php if(get_the_author_meta('add_doc_1', $user->ID) != ""){?> 
                     <a href="<?php echo esc_attr(get_the_author_meta('add_doc_1', $user->ID)); ?>" target="_blank">Click here to see the document</a><br />
     <?php }else{ echo 'No Document Uploaded';}?>
</td>
</tr>

<tr>
<th><label for="add_doc_2"><?php _e("Upload Additional Doc"); ?></label></th>
<td>
    <input type="text" name="add_doc_2" id="add_doc_2" value="<?php echo esc_attr(get_the_author_meta('add_doc_2', $user->ID)); ?>" class="regular-text" /> &nbsp;&nbsp;&nbsp;
    <?php if(get_the_author_meta('add_doc_2', $user->ID) != ""){?> 
                     <a href="<?php echo esc_attr(get_the_author_meta('add_doc_2', $user->ID)); ?>" target="_blank">Click here to see the document</a><br />
     <?php }else{ echo 'No Document Uploaded';}?>
</td>
</tr>

<tr>
<th><label for="add_doc_3"><?php _e("Additional Document Three"); ?></label></th>
<td>
    <input type="text" name="add_doc_3" id="add_doc_3" value="<?php echo esc_attr(get_the_author_meta('add_doc_3', $user->ID)); ?>" class="regular-text" /> &nbsp;&nbsp;&nbsp;
<?php if(get_the_author_meta('add_doc_3', $user->ID) != ""){?> 
                 <a href="<?php echo esc_attr(get_the_author_meta('add_doc_3', $user->ID)); ?>" target="_blank">Click here to see the document</a><br />
 <?php }else{ echo 'No Document Uploaded';}?>
</td>
</tr>
		
<tr>
	<th><label for="indi_decent"><?php _e("Are you of Indigenous or Torres Strait Islander descent?"); ?></label></th>
	<td><label id="indi_decent">
<input type="radio" name="indi_decent" value="1" <?php if(get_the_author_meta('indi_decent', $user->ID) == '1'):?> checked="checked" <?php endif;?>> Yes &nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="indi_decent" value="2" <?php if(get_the_author_meta('indi_decent', $user->ID) == '2'):?> checked="checked" <?php endif;?>> No
<br>
		</label>
	</td>
</tr>
             <tr>
            <th><label for="circumstances"><?php _e("Are there any circumstances in which you would not want your visual or audio recordings used?"); ?></label></th>
            <td>
                <textarea class="regular-text" name="circumstances" id="circumstances"><?php echo esc_attr(get_the_author_meta('circumstances', $user->ID)); ?></textarea><br />
            </td>
        </tr> 
             <tr>
            <th><label for="t_description"><?php _e("Brief description of visuals/audio recorded"); ?></label></th>
            <td>
                <textarea class="regular-text" name="t_description" id="t_description"><?php echo esc_attr(get_the_author_meta('t_description', $user->ID)); ?></textarea><br />
            </td>
        </tr>  

        <tr>
            <th><label for="talent_signature"><?php _e("Talent signature"); ?></label></th>
            <td>
                <input type="text" name="talent_signature" id="talent_signature" value="<?php echo esc_attr(get_the_author_meta('talent_signature', $user->ID)); ?>" class="regular-text" /> &nbsp;&nbsp;&nbsp;
                <?php if(get_the_author_meta('talent_signature', $user->ID) != ""){?> 
                     <a href="<?php echo esc_attr(get_the_author_meta('talent_signature', $user->ID)); ?>" target="_blank">Click here to see the document</a><br />
                <?php }else{ echo 'No Document Uploaded';}?>
            </td>
        </tr>

		
<!--        <tr>
            <th><label for="bank_name"><?php //_e("Bank Name"); ?></label></th>
            <td>
                <input type="text" name="bank_name" id="bank_name" value="<?php //echo esc_attr(get_the_author_meta('bank_name', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>-->
        
<!--     <tr>
            <th><label for="payment_type"><?php _e("Payment Type"); ?></label></th>
            <td><label id="payment_type">
      <input type="radio" name="payment_type" value="Master Card" <?php //if(get_the_author_meta('payment_type', $user->ID) == 'Master Card'):?> checked="checked" <?php //endif;?>> Master Card &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="payment_type" value="Visa Card" <?php //if(get_the_author_meta('payment_type', $user->ID) == 'Visa Card'):?> checked="checked" <?php //endif;?>> Visa Card
      <br>
                </label>
            </td>
        </tr>  -->
<!--                <tr>
            <th><label for="card_holder_name"><?php _e("Card Holder Name"); ?></label></th>
            <td>
                <input type="text" name="card_holder_name" id="card_holder_name" value="<?php echo esc_attr(get_the_author_meta('card_holder_name', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>-->
                <tr>
            <th><label for="b_industry"><?php _e("Business Industry"); ?></label></th>
            <td>
                <textarea class="regular-text" name="b_industry" id="b_industry"><?php $b_ind = get_the_author_meta('b_industry', $user->ID);if($b_ind > 0){foreach($b_ind as $b_i){echo $b_i.',';}}else{echo 'Null';} ?></textarea><br />
            </td>
        </tr>
        <tr>
            <th><label for="buss_description"><?php _e("Business Description"); ?></label></th>
            <td>
                <textarea class="regular-text" name="buss_description" id="buss_description"><?php echo esc_attr(get_the_author_meta('buss_description', $user->ID)); ?></textarea><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="membership_fees"><?php _e("Membership Fees"); ?></label></th>
            <td>
                <input type="text" name="membership_fees" id="membership_fees" value="<?php echo esc_attr(get_the_author_meta('membership_fees', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
                <tr>
            <th><label for="membership_type"><?php _e("Membership Type"); ?></label></th>
            <td>
                <input type="text" name="membership_type" id="membership_type" value="<?php echo esc_attr(get_the_author_meta('membership_type', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
<!--        <tr>
            <th><label for="associate_membership_fees"><?php _e("Associate Membership Fees"); ?></label></th>
            <td>
                <input type="text" name="associate_membership_fees" id="associate_membership_fees" value="<?php echo esc_attr(get_the_author_meta('associate_membership_fees', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>-->
        
        <tr>
            <th><label for="cvv"><?php _e("CVV"); ?></label></th>
            <td>
                <input type="text" maxlength="3" name="cvv" id="cvv" value="<?php echo esc_attr(get_the_author_meta('cvv', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="transaction_id"><?php _e("Transaction id"); ?></label></th>
            <td>
                <input type="text" name="transaction_id" id="transaction_id" value="<?php echo esc_attr(get_the_author_meta('transaction_id', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
 <!--       <tr>
            <th><label for="card_number"><?php _e("Card number"); ?></label></th>
            <td>
                <input type="text" maxlength="3" name="card_number" id="card_number" value="<?php echo esc_attr(get_the_author_meta('card_number', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
        <tr>
            <th><label for="expiration_date"><?php _e("Expiration Date"); ?></label></th>
            <td>
                <input type="text" maxlength="3" name="expiration_date" id="expiration_date" value="<?php echo esc_attr(get_the_author_meta('expiration_date', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>-->
        
        <!---<tr>
            <th><label for="transaction_id"><?php _e("Transaction ID"); ?></label></th>
            <td>
                <input type="text" name="transaction_id" id="transaction_id" value="<?php echo esc_attr(get_the_author_meta('transaction_id', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>-->
        
        <tr>
            <th><label for="paid_for"><?php _e("Amount paid for"); ?></label></th>
            <td>
                <input type="text" name="paid_for" id="paid_for" value="<?php echo esc_attr(get_the_author_meta('paid_for', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        

        
        <tr>
            <th><label for="date_paid"><?php _e("Payment Date"); ?></label></th>
            <td>
                <input type="text" name="date_paid" id="date_paid" value="<?php echo esc_attr(get_the_author_meta('date_paid', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>
        
         <!---<tr>
            <th><label for="e_amount"><?php _e("E Amount"); ?></label></th>
            <td>
                <input type="text" name="e_amount" id="e_amount" value="<?php echo esc_attr(get_the_author_meta('e_amount', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>--->
     
          <tr>
            <th><label for="user_type"><?php _e("User Type"); ?></label></th>
            <td>
                <input type="text" name="user_type" id="user_type" value="<?php echo esc_attr(get_the_author_meta('user_type', $user->ID)); ?>" class="regular-text" /><br />
            </td>
        </tr>      
<!--                -Business--buss_location
        <tr><th colspan="2"><h3>Business</h3></th></tr>-->
    </table>
<?php
}

add_action('show_user_profile', 'ntibn_user_profile_fields');
add_action('edit_user_profile', 'ntibn_user_profile_fields');

// saving extra fields details in database:

function save_ntibn_user_profile_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    update_user_meta($user_id, 'name', $_POST['name']);
	$fulln = explode(" ", get_the_author_meta('nickname', $user->ID));

$first_name = $fulln[0];
$last_name = $fulln[1];

    update_user_meta($user_id, 'first_name', $first_name);
    update_user_meta($user_id, 'last_name', $last_name);
    update_user_meta($user_id, 'buss_location', $_POST['buss_location']);
    update_user_meta($user_id, 'business_name', $_POST['business_name']);
//    update_user_meta( $user_id, 'member_type', $_POST['member_type'] );
    update_user_meta($user_id, 'title', $_POST['title']);
    update_user_meta($user_id, 'position', $_POST['position']);
    update_user_meta($user_id, 'user_phone', $_POST['user_phone']);
    update_user_meta($user_id, 'user_mobile', $_POST['user_mobile']);
    update_user_meta($user_id, 'user_postal', $_POST['user_postal']);
    update_user_meta($user_id, 'user_fax', $_POST['user_fax']);
    update_user_meta($user_id, 'user_state', $_POST['user_state']);
    update_user_meta($user_id, 'user_town', $_POST['user_town']);
    update_user_meta($user_id, 'user_postcode', $_POST['user_postcode']);
        
    update_user_meta($user_id, 'buss_email', $_POST['buss_email']);
    update_user_meta($user_id, 'buss_mobile', $_POST['buss_mobile']);
    update_user_meta($user_id, 'date_business_commenced', $_POST['date_business_commenced']);
    update_user_meta($user_id, 'buss_description', $_POST['buss_description']);
    update_user_meta($user_id, 'buss_town', $_POST['buss_town']);
    update_user_meta($user_id, 'buss_state', $_POST['buss_state']);
    update_user_meta($user_id, 'buss_fax', $_POST['buss_fax']);
    update_user_meta($user_id, 'buss_postcode', $_POST['buss_postcode']);
    update_user_meta($user_id, 'add_line2', $_POST['add_line2']);
    
    update_user_meta($user_id, 'tal_name', $_POST['tal_name']);
    update_user_meta($user_id, 'tal_phone', $_POST['tal_phone']);
    update_user_meta($user_id, 'tal_address', $_POST['tal_address']);
    update_user_meta($user_id, 'tal_email', $_POST['tal_email']);
    update_user_meta($user_id, 'tal_town', $_POST['tal_town']);
    update_user_meta($user_id, 'tal_state', $_POST['tal_state']);
    update_user_meta($user_id, 'tal_postcode', $_POST['tal_postcode']);
    
    update_user_meta($user_id, 'abn_entityname', $_POST['abn_entityname']);
    
//    update_user_meta($user_id, 'abn', $_POST['abn']);
//    update_user_meta($user_id, 'acn', $_POST['acn']);
    update_user_meta($user_id, 'principal_place', $_POST['principal_place']);
    update_user_meta($user_id, 'indi_owned', $_POST['indi_owned']);
    update_user_meta($user_id, 'buss_staff', $_POST['buss_staff']);
    update_user_meta($user_id, 'buss_indistaff', $_POST['buss_indistaff']);
    
    update_user_meta($user_id, 'sign_name', $_POST['sign_name']);
    update_user_meta($user_id, 'sign_position', $_POST['sign_position']);
    update_user_meta($user_id, 'sign_bussname', $_POST['sign_bussname']);
    update_user_meta($user_id, 'icn_reg', $_POST['icn_reg']);
    update_user_meta($user_id, 'supply_nation_registered', $_POST['supply_nation_registered']);
    
    
    update_user_meta($user_id, 'indi_decent', $_POST['indi_decent']);
    update_user_meta($user_id, 'circumstances', $_POST['circumstances']);
//    update_user_meta($user_id, 'bank_name', $_POST['bank_name']);
//    update_user_meta($user_id, 'payment_type', $_POST['payment_type']);
//    update_user_meta($user_id, 'card_holder_name', $_POST['card_holder_name']);    
    
    update_user_meta($user_id, 'b_industry', $_POST['b_industry']);
    update_user_meta($user_id, 'transaction_id', $_POST['transaction_id']);
    update_user_meta($user_id, 'paid_for', $_POST['paid_for']);
    update_user_meta($user_id, 'date_paid', $_POST['date_paid']);
//    update_user_meta($user_id, 'e_amount', $_POST['e_amount']);
    update_user_meta($user_id, 'talent_signature', $_POST['talent_signature']);
    update_user_meta($user_id, 'membership_fees', $_POST['membership_fees']);
    update_user_meta($user_id, 'membership_type', $_POST['membership_type']);
//    update_user_meta($user_id, 'associate_membership_fees', $_POST['associate_membership_fees']);
    update_user_meta($user_id, 'cvv', $_POST['cvv']);
    update_user_meta($user_id, 'transaction_id', $_POST['transaction_id']);
    update_user_meta($user_id, 'user_type', $_POST['user_type']);

}

add_action('personal_options_update', 'save_ntibn_user_profile_fields');
add_action('edit_user_profile_update', 'save_ntibn_user_profile_fields');
?>
<?php 
// custom admin style sheet
function my_admin_head() {?>
         <style> /*aspirestylesforhidingunnecessaryadminmenuitems*/
 #menu-tools {
    display: none;
}#menu-appearance {
    display: none;
}#menu-plugins {
    display: none;
}#toplevel_page_eael-settings {
    display: none;
}#menu-posts-elementor_library {
    display: none;
}#toplevel_page_elementor {
    display: none;
}#toplevel_page_wpcf7 {
    display: none;
}#menu-comments {
    display: none;
}#menu-posts {
    display: none;
}#menu-media {
    display: none;
}#menu-settings {
    display: none;
}#collapse-menu {
    display:none ;
}#menu-dashboard>ul {
    display: none !important;
}div#postbox-container-1 {
   display: none !important;
}div#postbox-container-2 {
    display: none !important;
}</style>
<?php }
//add_action('admin_head', 'my_admin_head');

// add_filter( 'wp_mail_from', 'my_mail_from' );
// function my_mail_from( $email ) {
//     return "info@ntibn.com.au";
// }

?>