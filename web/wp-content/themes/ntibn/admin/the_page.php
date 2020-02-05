<?php if( is_admin() ) {?>
<link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" type="text/css"/>
<link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/admin/inc/settings.css" type="text/css"/>
<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<?php }?>
<?php
#function setting_field($name,$type){ echo '';}
?>
<div class="wrap">
  <div class="row">
    <div class="col-md-12">
      <h3 class="page_title">NTIBN Configuration</h3>
    </div>
  </div>

  <form method="post" action="options.php" enctype="multipart/form-data">
    <?php settings_fields('theme_settings'); ?>
    <?php $options = get_option('theme_settings'); ?>
     <?php /* show saved options message */    
    if ($_REQUEST['settings-updated']) : ?>
    <div class="updated">
    <p><strong class="alret">
    <?php _e('Options saved'); ?>
    </strong></p>
    </div>
    <?php endif; ?>
    <div class="the-container">
        <div class="col-12"><?php include('basic.php');?></div>
    </div>
    <p>
    <input name="theme_settings[submit]" id="submit" value="Save Changes" type="submit" class="btn btn-primary btn-md pull-right"/>
    </p>
  </form>
</div>
<!--/the page--> 