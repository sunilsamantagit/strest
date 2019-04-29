
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
                    <div class="mid-block">

                        <?php if(!empty($profile_id)){ ?>
                        <div style="padding-top:20px;" class="members-table">
                        <div style="width:100%; text-align:left; border:0px solid red;">
            <iframe src="https://2webdesign.com/2webanalytics/analytics.php?profile=<?php echo $profile_id;?>" scrolling="0" frameborder="0" align="middle" width="95%" height="900" style="margin-left:25px;"></iframe>
			</div></div>
                        <?php } ?>

                        <div style="width:800px; height:400px;">
                              <div style="width:250px;">
                              Takeoff Entry 
                              </div>
                              <div style="width:250px;">
                              Master Entries 
                             </div>
                            <div style="width:250px;">
                             Admin Management 
                            </div>
                       </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-sty">
                                <p>dfgdfg</p>
                                </div>
                            </div>
                        </div>
                        
                        <?php echo $this->load->view($footer); ?>
                    </div>


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
