<?php ob_start();  session_start();/* Template Name: Login */ 
if ( is_user_logged_in() ) { 
    global $current_user;
    wp_get_current_user();

$location = site_url();
wp_redirect($location);}
?>
<?php get_header(); ?>
<?php if (have_posts()):while (have_posts()):the_post(); ?>

<section id="login" class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Sign In</h5>
<?php     
$err_msg="";
if ( isset($_POST["user_email"]) && isset($_POST["user_password"]) ) {
$user_login     = esc_attr($_POST["user_email"]);
$user_password  = esc_attr($_POST["user_password"]);
$user_email     = esc_attr($_POST["user_email"]);

$user_data = array(
    'user_login'    =>      $user_login,
    'user_pass'     =>      $user_password,
    'user_email'    =>      $user_email,
    'role'          =>      'subscriber'
);

// Inserting new user to the db
//wp_insert_user( $user_data );

$creds = array();
$creds['user_login'] = $user_login;
$creds['user_password'] = $user_password;
$creds['remember'] = true;

$user = wp_signon( $creds, false );
@$userID = $user->ID;
if( !$userID){ $err_msg = "Invalid Email and/or Password!"; }else{

wp_set_current_user( $userID, $user_login );
wp_set_auth_cookie( $userID, true, false );
do_action( 'wp_login', $user_login );

}
if ( is_user_logged_in() ) : 
    global $current_user;
    wp_get_current_user();

$location = site_url().'/profile.php';
wp_redirect($location);
endif;
}
 ?>
                <p class="text-danger text-center"><?=$err_msg;?></p>
                <form class="form-signin" name="login" action="" method="post">
                  <div class="form-label-group" iaccinput="">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="user_email" required="" autofocus="">
                  </div>
                  <br>
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="user_password" placeholder="Password" required="">
                  </div>
                  <br>
                  <div> 
<!--<a href="forgetPassword.php">
<p style="font-size: 12px; text-align: right;">Forget Password</p>
</a> -->                  </div>          
                  <!-- <div class="custom-control custom-checkbox mb-3">
                                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            </div> -->
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                  <hr class="my-4">
                </form>
                <a href="<?=site_url()?>/register.php">
                <button class="btn btn-lg btn-primary btn-block text-uppercase reg">Register</button>
                </a> </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>