<?php ob_start();?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php /* get theme options */ $options = get_option('theme_settings'); 
        global $current_user;
wp_get_current_user();
//is_user_logged_in();
//$current_user->user_login // display_name

        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=bloginfo('name'); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <!-- Favicons -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= $options['favicon']; ?>">
        <!--STYLES ETC-->
        <?php wp_head(); ?>  
        <style>#contact textarea {    resize: none;height: 163px;} .hide{display:none !important;}</style>
        <style type='text/css'  media='all'>#wpadminbar { display: none !important; }</style>
    </head>
    <body <?php body_class(); ?>>
        <button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>
        <!--==========================
            Header
          ============================-->
        <header id="header" class="header-scrolled">
            <div class="container">               
                <div id="logo1" class="pull-left">
                    <a href="#intro" class="scrollto1">
                        <?php if (isset($options['logo_scroll'])) { ?>
                            <img src="<?php echo $options['logo_scroll']; ?>" height="85px" width="120px;" style="padding-bottom: 25px;" alt="<?php echo bloginfo('name'); ?>" title="">
                        <?php } else { ?>
                            <?php echo bloginfo('name'); ?>
                        <?php } ?>
                    </a>
                </div>
                <nav id="nav-menu-container">
                    <?php
                    $args = array(
                        'theme_location' => 'primary_menu',
                        'menu' => 'primary_menu',
                        'container' => false,
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'nav-menu-container',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">%3$s</ul>',
                        'depth' => 3,
                        'walker' => new Walker_Nav_Mobile(), // This controls the display of the Bootstrap Navbar
                        'fallback_cb' => 'Walker::fallback', // For menu fallback
                    );
                    ?>    
                    <?php wp_nav_menu($args); ?>
                    <?php if(is_user_logged_in()){?>
                        <script>
                            $ = jQuery;
var jq = $.noConflict();
jq(document).ready(function () {
    jq('.buy-tickets>a').attr("href", "<?=site_url()?>/profile.php");
//    jq('.buy-tickets').hide());
    jq('.buy-tickets>a').html('<?=$current_user->display_name;?>');
    jq('.logout').removeClass('hide');
});
                        </script>
                  <?php   }?>
                </nav><!-- #nav-menu-container -->
            </div>
            
        </header><!-- #header -->
        <!--==========================
                  Intro Section
                ============================-->
        <section id="intro" class="introtop" style=" background: url(<?= $options['header_banner']; ?>) top center;">
            <div id="imglogo" style="float: left; position: absolute;
                 top: 0;
                 left: 16px; " class="intro-container2">


                <?php if (isset($options['logo'])) { ?>
                    <img src="<?php echo $options['logo']; ?>" height="170px" width="130px;" style="position: absolute;               top: 10%;
                         left: 2%;width: 90px;height: auto;" alt="<?php echo bloginfo('name'); ?>" title="">
                     <?php } else { ?>
                         <?php echo bloginfo('name'); ?>
                     <?php } ?>

            </div>
            <div class="intro-container1 wow fadeIn"
                 style="margin: 60px auto auto; visibility: visible; animation-name: fadeIn;">
                <h1 style="color: white; text-shadow: 3px 3px black"><?=get_bloginfo('description');?></h1>
            </div>
        </section>
        <main id="main">
            <?php if( !is_admin() ){?>
    <style type="text/css" media="screen">
	html { margin-top: 0 !important; }
	* html body { margin-top: 0 !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 0px !important; }
		* html body { margin-top: 0px !important; }
   }</style><?php }?>
