<?php
# ADDING ADMIN THEME SETTINGS
function add_theme_setting_option($name,$type,$class){
         settings_fields('theme_settings'); 
         $options = get_option('theme_settings');
    
    $types = array('text','textarea','upload','check','color');

    if( strpos($name, "-") !== false ) {
     $label = str_replace ("-", " ", ucfirst($name));
    }elseif( strpos($name, "_") !== false ) {
     $label = str_replace ("_", " ", ucfirst($name));
    }else{
        $label =  ucfirst($name);
    }
  
if($type == 'text'){?>
<div class="form-group row">
<label class="col-md-2 control-label" for="<?=$name;?>"><?=$label;?></label>
<div class="col-md-8">     
<input name="theme_settings[<?=$name;?>]" id="<?=$name;?>" 
type="text" 
value='<?php echo $options[$name];?>'
class="inp-big form-control <?=$class;?> <?=$name;?>"/>
</div>
    <div class="col-md-2">&nbsp;</div>
</div>    
<?php    }
    elseif($type == 'textarea'){?>
  <div class="form-group row">
    <label class="col-md-2 control-label" for="<?=$name;?>"><?=$label;?></label>
    <div class="col-md-8">     
      <textarea name="theme_settings[<?=$name;?>]"  id="<?=$name;?>" type="text" class="inp textarea <?=$class;?> <?=$name;?>"/><?php if ( $options[$name] != '' ){ echo $options[$name];} ?></textarea>
    </div>
    <div class="col-md-2">&nbsp;</div>
  </div>
<?php    }
    elseif($type == 'upload'){?>
  <div class="form-group row">
    <label class="col-md-2 control-label" for="<?=$name;?>"><?=$label;?></label>
    <div class="col-md-8">
      <label for="<?=$name;?>">
      <input id="<?=$name;?>" type="text" name="theme_settings[<?=$name;?>]" value="<?php echo $options[$name]; ?>" class="form-control"/>
      <input id="<?=$name;?>_button" type="button" value="Upload Image" class="btn btn-primary"/>
      <br />
      <div class="small-note">Enter an URL or upload an image for the <?=$label;?>.</div>
      </label>
    </div>
    <div class="col-md-2">
      <?php if($options[$name]):?>
        <div class="preview"><img src="<?php echo $options[$name]; ?>" class="border"/></div>
      <div class="preview"><span class="small-note"><?=$label;?> Preview</span></div>
      <?php endif;?>
    </div>
  </div>
<script>
//Upload Background
 jQuery('#<?=$name;?>_button').click(function() {
        upload_image_button =true;
        formfieldID=jQuery(this).prev().attr("id");
     formfield = jQuery("#"+formfieldID).attr('name');
     tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        if(upload_image_button==true){
                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {
                imgurl = jQuery('img', html).attr('src');
                jQuery("#"+formfieldID).val(imgurl);
                 tb_remove();
                window.send_to_editor = oldFunc;
                }
        }
        upload_image_button=false;
  });
</script>
<?php      }
    elseif($type == 'check'){?>
  <div class="form-group row">
    <label class="col-md-2 control-label" for="<?=$name;?>"><?=$label;?></label>
    <div class="col-md-8">     
    <label>
    <input class="form-check" name="theme_settings[<?=$name;?>]"  id="<?=$name;?>" type="checkbox" value="<?=$name;?>" <?=(isset($options[$name])?"checked='checked'":""); ?> />
    <span style="position: relative;top: 3px;">Enable</span> </label>
    </div>
    <div class="col-md-2">&nbsp;</div>
  </div>
<?php  }
    elseif($type == 'color'){?>
<div class="form-group row">
<label class="col-md-2 control-label" for="<?=$name;?>"><?=$label;?></label>
<div class="col-md-8">     
<input name="theme_settings[<?=$name;?>]" id="<?=$name;?>" 
type="text" 
value='<?php echo $options[$name];?>'
class="cpa-color-picker <?=$class;?> <?=$name;?>"/>
</div>
    <div class="col-md-2">&nbsp;</div>
</div> 
<?php    }
}//ends func?>