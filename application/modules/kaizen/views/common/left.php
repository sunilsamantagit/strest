<?php // echo $this->session->userdata('user_level');
$fetch_class =  $this->router->fetch_class();
$comp_arr = array('membership'         => 'membership',
                    'banner'           => 'banner',
                    'takeoff'           => 'takeoff',
                    'takeoffline'           => 'takeoffline',
                    'home_block'       => 'home_block'
            );



$comp_arr2 = array('material'         => 'material',
                    'lumbsum'       => 'lumbsum',
                    'shapes_management'       => 'shapes_management',
                    'shapes_size'       => 'shapes_size'
            );
$comp_arr3 = array('user'         => 'user');

$comp_arr4 = array(
                    'user_tracking'              => 'user_tracking'
            );



$active_cls = '';
if(in_array($fetch_class,$comp_arr)){
    $active_cls = "active";
}


$active_cls2 = '';
if(in_array($fetch_class,$comp_arr2)){
    $active_cls2 = "active";
}

$active_cls3 = '';
if(in_array($fetch_class,$comp_arr3)){
    $active_cls3 = "active";
}

$active_cls4 = '';
if(in_array($fetch_class,$comp_arr4)){
    $active_cls4 = "active";
}

?>

<div class="leftDiv">
  <div class="logo">
        <a href="<?php echo site_url('kaizen/main'); ?>">STREST</a>
    </div> 
  <ul class="cat-list">

    <li class="listing-dashboard">
    <a href="<?php echo site_url("kaizen/main/"); ?>" <?php if(!empty($fetch_class) && $fetch_class == "main"){ ?> class="active" <?php } ?>  ><i class="fa fa-home"></i>Dashboard</a>
    </li>

 <!--   <li class="listing-application">
    <a href="<?php echo site_url("kaizen/pages"); ?>" <?php if(!empty($fetch_class) && $fetch_class == "pages"){ ?> class="active" <?php } ?>>Pages</a>
    </li> -->

    <li class="listing-list"> <a href="javascript:void(0)"><i class="fa fa-tasks"></i>Takeoff<span class="fa fa-chevron-down"></span></a>
      <div style="<?php if(!empty($active_cls)){ echo 'display:block;'; }?>" class="cat-cont">
        <ul class="category_sub_list">
         
          <li><a href="<?php echo site_url("kaizen/takeoff"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "takeoff")){ echo "active" ; } ?>">Takeoff</a></li>
        
          <li><a href="<?php echo site_url("kaizen/takeoffline"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "takeoffline")){ echo "active" ; } ?>">Takeoff Line Entries</a></li>
          
          <li><a href="<?php echo site_url("kaizen/takeoff_price"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "takeoff_price")){ echo "active" ; } ?>">Takeoff Price</a></li>
                
        </ul>
      </div>
    </li>
    
 
    
    
    <li class="listing-list"> <a href="javascript:void(0)"><i class="fa fa-graduation-cap"></i>Master Entries<span class="fa fa-chevron-down"></span></a>
      <div style="<?php if(!empty($active_cls2)){ echo 'display:block;'; }?>" class="cat-cont">
        <ul class="category_sub_list">
         
          <li><a href="<?php echo site_url("kaizen/material"); ?>" class="<?php if(!empty($active_cls2) && ($fetch_class == "material")){ echo "active" ; } ?>">Material Function</a></li>
        
          <li><a href="<?php echo site_url("kaizen/lumbsum"); ?>" class="<?php if(!empty($active_cls2) && ($fetch_class == "lumbsum")){ echo "active" ; } ?>">Lump Sum Entries</a></li>
          
          <li><a href="<?php echo site_url("kaizen/shapes_management"); ?>" class="<?php if(!empty($active_cls2) && ($fetch_class == "shapes_management")){ echo "active" ; } ?>">Shapes Management</a></li>
          
           <li><a href="<?php echo site_url("kaizen/shapes_size"); ?>" class="<?php if(!empty($active_cls2) && ($fetch_class == "shapes_size")){ echo "active" ; } ?>">Shapes Size Management</a></li>
                
        </ul>
      </div>
    </li>
    
    
     <?php if($this->session->userdata('user_level')==1){ ?>
    <li class="listing-list"> <a href="javascript:void(0)"><i class="fa fa-user"></i>Admin Management<span class="fa fa-chevron-down"></span></a>
      <div style="<?php if(!empty($active_cls3)){ echo 'display:block;'; }?>" class="cat-cont">
        <ul class="category_sub_list">
         
  <li><a href="<?php echo site_url("kaizen/user"); ?>" class="<?php if(!empty($active_cls) && ($active_cls3 == "user")){ echo "active" ; } ?>">Admin</a></li>
                
        </ul>
      </div>
    </li>
    <?php }  ?> 
    

<!--    <li class="listing-setting">
    <a href="<?php echo site_url("kaizen/settings/");?>" class="setting <?php if(!empty($fetch_class) && $fetch_class == "settings"){ echo "active" ; } ?>">Website Settings</a>
    </li>-->

   
  
<!--    <li class="listing-members"> <a href="javascript:void(0)">Tracking<span class="listing-arrow"></span></a>
      <div style="<?php if(!empty($active_cls4)){ echo 'display:block;'; }?>" class="cat-cont">
      <ul class="category_sub_list">

<li><a href="<?php echo site_url("kaizen/user_tracking"); ?>" class="<?php if(!empty($active_cls4) && ($fetch_class == "user_tracking")){ echo "active" ; } ?>">Tracking</a></li>

      </ul>
    </div>
  </li> --->
    
  </ul>
</div>

<!--left column end-->
