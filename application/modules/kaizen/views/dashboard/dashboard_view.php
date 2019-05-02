
<?php  echo $this->load->view($header); ?>
<?php echo $this->load->view($left); ?>
<?php $profile_id = '';
if(!empty($site_settings)){
    $profile_id = $site_settings[0]->profile_id;
}
$this->load->model('modelmain');
?>
<div class="rightDiv">
    <?php //$this->load->view($cms_header); ?>
    <div class="right-outer">

    	<div class="right-outer">
		<h3 class="title">Dashboard</h3>
                <div class="clear"></div>
                <div class="padbot40">
                    <div class="dashboard_section">

                        <?php /* if(!empty($profile_id)){ ?>
                        <div style="padding-top:20px;" class="members-table">
                        <div style="width:100%; text-align:left; border:0px solid red;">
            <iframe src="https://2webdesign.com/2webanalytics/analytics.php?profile=<?php echo $profile_id;?>" scrolling="0" frameborder="0" align="middle" width="95%" height="900" style="margin-left:25px;"></iframe>
			</div></div>
                        <?php } */ ?>

                       
                        <div class="dash_item">
                                  <a href="<?php echo site_url('kaizen/takeoff'); ?>">Takeoff Entry </a>
                              </div>
                              <div class="dash_item">
                              <a href="<?php echo site_url('kaizen/material'); ?>">Master Entries  </a>
                             </div>
                            <div class="dash_item">
                                <?php if($this->session->userdata('user_level')==1){ ?>
                                <a href="<?php echo site_url('kaizen/user'); ?>">Admin Management</a>
                                <?php }else{ ?>
                                <a href="javascript:void(0);" style="cursor: no-drop;">Admin Management</a>
                                <?php } ?>
                            
                            </div>
                        </div>
                        <?php echo $this->load->view($footer); ?>
                    


                </div>
        </div>
        <style>
            .box-sty { background: #ccc;}
            .box-sty p{ font-size: 18px; text-align: center; padding:25px 10px;}
        </style>
            
    </div>
    <?php //echo $this->load->view($copyright); ?>
</div>
<?php //$this->load->view($cms_header); ?>

<style>
 .dashboard_section{ display:flex; flex-wrap:wrap; margin: 0 -15px; box-sizing: border-box;    margin-bottom: 146px;}
 .dash_item{ width:33.33%; padding: 0 15px; box-sizing: border-box;}
 .dash_item a{ display: block; background: #d7d7d7; color: #000; text-align: center; box-sizing: border-box; padding: 70px 0; font-size: 22px; font-weight: bold; border-radius: 10px;}
</style>
