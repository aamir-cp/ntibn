<?php if( is_admin() ) {?>
<link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" type="text/css"/>
<link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/admin/inc/settings.css" type="text/css"/>
<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>body {font-size: 14px;}#footer-thankyou {display: none;} .disabled{color:#AAA;pointer-events: none; cursor: default;  text-decoration: none;}
th{position: relative;}th a:hover:active:focus {outline: none !important;    border: none !important;    box-shadow: unset !important;}
.table td, .table th {    padding: 15px 10px;}</style>
<?php }global $wpdb;$tablename = 'payments';?>
<?php $uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?> 
<?php
#function setting_field($name,$type){ echo '';}
?>
<div class="wrap">
  <div class="row">
    <div class="col-md-12">
      <h3 class="page_title">NTIBN Payments</h3>
    </div>
  </div>

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
        <div class="col-12">
<div class="p-4">
<form action="" accept-charset="UTF-8" method="post">
<div class="input-group">
<input type="text" name="search" id="search" value="" placeholder="Search name..." class="form-control">
<span class="input-group-btn">
    <input type="submit" name="commit" value="Search" class="btn btn-primary" data-disable-with="Search">
 </span>
</div>
</form>
</div>
<?php $search = $_POST['search'];
if(isset($search) && $search != ""){?>
            
<h3 class="text-center">Results for "<?=$search;?>" <a class="btn btn-tiny" href="<?=$uri?>"><small>Clear Search</small></a> </h3>

<div class="table-responsive">
               
<table class="table table-striped table-hover">
    <tr>
        <th width="4%">ID</th>
        <th width="12%">NAME</th>
        <th width="15%">EMAIL</th>                    
        <th width="5%">PAYMENT</th>
        <th width="12%">PAID FOR</th>
        <th width="20%">NAME/ ID</th>
        <th width="20%">TRANSACTION ID</th>
        <th width="12%">DATE PAID</th>
    </tr>
  <?php $q = "SELECT * FROM  $tablename WHERE name LIKE  '%$search%'";
$s_results    = $wpdb->get_results ($q); ?> 
 <?php if(count($s_results) == 0):?>
           <tr>
               <td colspan="7" class="text-center text-danger"><h4 class="p-5">No records found!</h4></td> 
           </tr>    
 <?php else:?>                
        <?php foreach($s_results as $result):?>                
                <tr>
                    <td><?=$result->id;?></td>
                    <td><?=$result->name;?></td>
                    <td><?=$result->email;?></td>
                    <td>$<?=$result->payment;?></td>
                    <td><?=$result->paid_for;?>
<?php if($result->paid_for == 'Search Report'){?><br/>
    <?php if($result->if_report_link != ""):?><a target="_blank" href="<?=$result->if_report_link;?>">Download Report</a><?php endif;?>
<?php }
?>
                    </td>
                    <!--<td> ID: <?php // if($result->paid_for == 'Registration'){$slug="/wp-admin/user-edit.php?user_id=$result->paid_for_id";}elseif($result->paid_for == 'Event'){$slug="/wp-admin/post.php?post=$result->paid_for_id&action=edit";}?><a target="_blank" href="<?=site_url()?><?=$slug;?>"><?=$result->paid_for_id;?></a></td>-->
                    <td>
                        <?php if($result->paid_for !='Registration'){?><?=$result->paid_for_name;?>&nbsp;<?php }?><?php if($result->paid_for == 'Registration'){$slug="/wp-admin/user-edit.php?user_id=$result->paid_for_id";}elseif($result->paid_for == 'Event'){$slug="/wp-admin/post.php?post=$result->paid_for_id&action=edit";}?><a target="_blank" href="<?=site_url()?><?=$slug;?>"><?=$result->paid_for_id;?></a></td>
                    <td><?=$result->transaction_id;?></td>
                    <td><?php $dt = $result->date_paid; echo $newDate = date("j M, Y", strtotime($dt));?></td>
                </tr>
                
        <?php endforeach;?>
</table>  
                <div class="p-5 clearfix"><br/></div>
<?php endif;?>                
<?php }else{ ?>
<?php $sort = $_GET['sort'];
$sort_type = $_GET['sort_type'];?>                
            <div class="table-responsive">
               
            <table class="table table-striped table-hover">
                <tr>
                    <th width="4%">ID</th>
                    <th width="12%">NAME
                        <a class="<?=($sort == 'name' && $sort_type == 'ASC'?'disabled':'')?>" href="<?=$uri?>&sort=name&sort_type=ASC" title="Ascending Order"><i class="fa fa-caret-up"></i></a>
                        <a class="<?=($sort == 'name' && $sort_type == 'DESC'?'disabled':'')?>" tabindex="-1" href="<?=$uri?>&sort=name&sort_type=DESC" title="Descending Order"><i class="fa fa-caret-down"></i></a>
                    </th>
                    <th width="15%">EMAIL</th>                    
                    <th width="5%">PAYMENT
                        <a class="<?=($sort == 'payment' && $sort_type == 'ASC'?'disabled':'')?>" href="<?=$uri?>&sort=payment&sort_type=ASC" title="Ascending Order"><i class="fa fa-caret-up"></i></a>
                        <a class="<?=($sort == 'payment' && $sort_type == 'DESC'?'disabled':'')?>" tabindex="-1" href="<?=$uri?>&sort=payment&sort_type=DESC" title="Descending Order"><i class="fa fa-caret-down"></i></a>
                    </th>
                    <th width="12%">PAID FOR 
                        <a class="<?=($sort == 'paid_for' && $sort_type == 'ASC'?'disabled':'')?>" href="<?=$uri?>&sort=paid_for&sort_type=ASC" title="Ascending Order"><i class="fa fa-caret-up"></i></a>
                        <a class="<?=($sort == 'paid_for' && $sort_type == 'DESC'?'disabled':'')?>" tabindex="-1" href="<?=$uri?>&sort=paid_for&sort_type=DESC" title="Descending Order"><i class="fa fa-caret-down"></i></a>
                    </th>
                    <th width="20%">NAME/ ID</th>
                    <th width="20%">TRANSACTION ID</th>
                    <th width="12%">DATE PAID   
                        <a class="<?=($sort == 'date_paid' && $sort_type == 'ASC'?'disabled':'')?>" href="<?=$uri?>&sort=date_paid&sort_type=ASC" title="Ascending Order"><i class="fa fa-caret-up"></i></a>
                        <a class="<?=($sort == 'date_paid' && $sort_type == 'DESC'?'disabled':'')?>" tabindex="-1" href="<?=$uri?>&sort=date_paid&sort_type=DESC" title="Descending Order"><i class="fa fa-caret-down"></i></a>
                    </th>
                </tr>

<?php 
if(isset($sort)){
    $sort_by = "ORDER BY $sort $sort_type";
}else{
    $sort_by = "";
}

$per_page = 10;
$page = isset($_GET['pn'])?$_GET['pn']:1;
$offset = ($page-1) * $per_page;
 $q = "SELECT * FROM  $tablename $sort_by LIMIT $offset, $per_page";
$results    = $wpdb->get_results ($q);
$rows       = $wpdb->get_results ("SELECT * FROM  $tablename");

$total_rows = count($rows);
$total_pages = ceil($total_rows / $per_page);
?>        
<?php foreach($results as $result):?>                
                <tr>
                    <td><?=$result->id;?></td>
                    <td><?=$result->name;?></td>
                    <td><?=$result->email;?></td>
                    <td>$<?=$result->payment;?></td>
                    <td><?=$result->paid_for;?>
<?php if($result->paid_for == 'Search Report'){?><br/>
    <?php if($result->if_report_link != ""):?><a target="_blank" href="<?=$result->if_report_link;?>"> 
Download Report </a><?php endif;?>
<?php }
?>                 
                    </td>
<td><?php if($result->paid_for !='Registration'){?><?=$result->paid_for_name;?>&nbsp;<?php }?><?php if($result->paid_for == 'Registration'){$slug="/wp-admin/user-edit.php?user_id=$result->paid_for_id";}elseif($result->paid_for == 'Event'){$slug="/wp-admin/post.php?post=$result->paid_for_id&action=edit";}?><a target="_blank" href="<?=site_url()?><?=$slug;?>"><?=$result->paid_for_id;?></a></td>
                    <td><?=$result->transaction_id;?></td>
                    <td><?php $dt = $result->date_paid; echo $newDate = date("j M, Y", strtotime($dt));?></td>
                </tr>
<?php endforeach;?>                                
            </table>
                <div class="float-right pt-3 pr-4">
                <ul class="pagination">
<?php 
$sorting = (isset($sort)?"&sort=$sort&sort_type=$sort_type":'');
for ($x = 1; $x <= $total_pages; $x++) {?>       
   <li class="page-item <?=($page==$x)?'active':'';?>"><a class="page-link " href="admin.php?page=payments&pn=<?=$x;?><?=$sorting;?>"><?=$x;?></a></li>
<?php }
?></ul></div>

            </div>
<?php }//else search?>            
        </div>
    </div>
</div>
<!--/the page--> 