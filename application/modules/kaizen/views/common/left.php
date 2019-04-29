<?php // echo $this->session->userdata('user_level');
$fetch_class =  $this->router->fetch_class();
$comp_arr = array('membership'         => 'membership',
                    'banner'           => 'banner',
                    'home_block'       => 'home_block'
            );

$active_cls = '';
if(in_array($fetch_class,$comp_arr)){
    $active_cls = "active";
}
$comp_arr2 = array(
                    'user_tracking'              => 'user_tracking'
            );
$active_cls3 = '';
if(in_array($fetch_class,$comp_arr2)){
    $active_cls3 = "active";
}

?>

<div class="leftDiv">
  <ul class="cat-list">

    <li class="listing-dashboard">
    <a href="<?php echo site_url("kaizen/main/"); ?>" <?php if(!empty($fetch_class) && $fetch_class == "main"){ ?> class="active" <?php } ?>  >Dashboard</a>
    </li>

 <!--   <li class="listing-application">
    <a href="<?php echo site_url("kaizen/pages"); ?>" <?php if(!empty($fetch_class) && $fetch_class == "pages"){ ?> class="active" <?php } ?>>Pages</a>
    </li> -->

    <li class="listing-list"> <a href="javascript:void(0)">Takeoff<span class="listing-arrow"></span></a>
      <div style="<?php if(!empty($active_cls)){ echo 'display:block;'; }?>" class="cat-cont">
        <ul class="category_sub_list">
         
          <li><a href="<?php echo site_url("kaizen/home_block"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "home_block")){ echo "active" ; } ?>">Takeoff</a></li>
        
          <li><a href="<?php echo site_url("kaizen/membership"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "membership")){ echo "active" ; } ?>">Takeoff Line Entries</a></li>
          
          <li><a href="<?php echo site_url("kaizen/membership"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "membership2")){ echo "active" ; } ?>">Takeoff Price</a></li>
                
        </ul>
      </div>
    </li>
    
 
    
    
    <li class="listing-list"> <a href="javascript:void(0)">Master Entries<span class="listing-arrow"></span></a>
      <div style="<?php if(!empty($active_cls)){ echo 'display:block;'; }?>" class="cat-cont">
        <ul class="category_sub_list">
         
          <li><a href="<?php echo site_url("kaizen/home_block"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "home_block")){ echo "active" ; } ?>">Material Function</a></li>
        
          <li><a href="<?php echo site_url("kaizen/membership"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "membership")){ echo "active" ; } ?>">Lump Sum Entries</a></li>
          
          <li><a href="<?php echo site_url("kaizen/membership"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "membership2")){ echo "active" ; } ?>">Shapes Management</a></li>
          
           <li><a href="<?php echo site_url("kaizen/membership"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "membership2")){ echo "active" ; } ?>">Shapes Size Management</a></li>
                
        </ul>
      </div>
    </li>
    
    
     <?php if($this->session->userdata('user_level')==1){ ?>
    <li class="listing-list"> <a href="javascript:void(0)">Admin Management<span class="listing-arrow"></span></a>
      <div style="<?php if(!empty($active_cls)){ echo 'display:block;'; }?>" class="cat-cont">
        <ul class="category_sub_list">
         
  <li><a href="<?php echo site_url("kaizen/user"); ?>" class="<?php if(!empty($active_cls) && ($fetch_class == "user")){ echo "active" ; } ?>">Admin</a></li>
                
        </ul>
      </div>
    </li>
    <?php }  ?> 
    

    <li class="listing-setting">
    <a href="<?php echo site_url("kaizen/settings/");?>" class="setting <?php if(!empty($fetch_class) && $fetch_class == "settings"){ echo "active" ; } ?>">Website Settings</a>
    </li>

   
  
<!--    <li class="listing-members"> <a href="javascript:void(0)">Tracking<span class="listing-arrow"></span></a>
      <div style="<?php if(!empty($active_cls3)){ echo 'display:block;'; }?>" class="cat-cont">
      <ul class="category_sub_list">

<li><a href="<?php echo site_url("kaizen/user_tracking"); ?>" class="<?php if(!empty($active_cls3) && ($fetch_class == "user_tracking")){ echo "active" ; } ?>">Tracking</a></li>

      </ul>
    </div>
  </li> --->
    
  </ul>
</div>

<!--left column end-->