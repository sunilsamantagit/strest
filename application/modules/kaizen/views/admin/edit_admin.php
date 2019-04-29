<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
<script type="text/javascript" src="<?php echo site_url("public/ckeditor/ckeditor.js");?>"></script>
<link rel="stylesheet" href="<?php echo site_url("public/validator/css/validationEngine.jquery.css");?>" type="text/css"/>
<script src="<?php echo site_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/js/jquery.fancybox.js");?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url("public/css/jquery.fancybox.css");?>" type="text/css"/>
<script>
$('.fancybox').fancybox({
  width:'1200',
  height: '800'
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cont").validationEngine();
	});
function form_submit(){
       $('#selected_id option').prop('selected', true);
    $('#cont').submit();
}
</script>
<div class="rightDiv">
<div class="right-outer">
  <?php if(isset($details->id) && $details->id >0){?> <h3 class="title">Edit <?php if(isset($details->full_name)){echo $details->full_name;}?></h3> <?php }
    else {?> <h3 class="title">Add Member</h3> <?php } ?>
  <div class="clear"></div>
  <?php
	if($this->session->userdata('ERROR_MSG')==TRUE){
		echo '<div class="notific_error">
				<h2>'.$this->session->userdata('ERROR_MSG').'</h1></div>';
		$this->session->unset_userdata('ERROR_MSG');
	}
	if($this->session->userdata('SUCC_MSG')==TRUE){
		echo '<div class="notific_suc"><h2>'.$this->session->userdata('SUCC_MSG').'</h1></div>';
		$this->session->unset_userdata('SUCC_MSG');
	}
	?>
  <div class="mid-block padbot40">
    <div class="mid-content web-cont-mid">
      <div id="webcont-form">
        <div id="member-form" class="midarea">
          <?php 
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/admin/addedit/'.$details->id,$attributes);
		  echo form_hidden('admin_id', $details->id);
		  ?>
        
          <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
          <div class="single-column" >
            <label class="question-label">Enter Name : <span>*</span> </label>
            <input type="text" name="full_name" id="full_name" value="<?php if(isset($details->full_name)){echo $details->full_name;}?>" class="inputinpt validate[required]" />
          </div>
           <div class="single-column" >
            <label class="question-label">User Name: <span>*</span> </label>
            <input type="text" name="user_name" id="user_name" value="<?php if(isset($details->user_name)){echo $details->user_name;}?>" class="inputinpt validate[required]" onchange="javascript:checkusername(0)" <?php if(!empty($details->user_name)){echo 'readonly';}?> />
          </div>
          <div id="status_div" style="display:none;"></div>  
           <div class="single-column" >
            <label class="question-label">Password: <span>*</span> </label>
            <input type="password" name="pwd" id="pwd" value="<?php if(isset($details->pwd_hint)){echo $details->pwd_hint;}?>" class="inputinpt validate[required]"/>
          </div>
           <div class="single-column" >
            <label class="question-label">Confirm Password: <span>*</span> </label>
            <input type="password" name="cpwd" id="cpwd" value="<?php if(isset($details->pwd_hint)){echo $details->pwd_hint;}?>" class="inputinpt validate[required,equals[pwd]]"/>
          </div>
          
<!--          <div class="single-column">
            <label class="question-label">Display Order: </label>
            <input type="text" name="display_order" id="display_order" value="<?php if(isset($details->display_order)){echo $details->display_order;}?>" class="inputinpt validate[optional,custom[integer]]"/>
          </div>-->
            <div class="single-column" >
              <label class="question-label">Status:<span>*</span></label>
              <input type="radio" name="is_active" id="is_active" value="1" class="validate[required]"
                                <?php echo ((isset($details->is_active) && $details->is_active ==1)?'checked="checked"':'')?>/>
              &nbsp;Active &nbsp;&nbsp;
              <input type="radio" name="is_active" id="is_active_1" value="0" class="validate[required]"
                  <?php echo ((isset($details->is_active) && $details->is_active ==0)?'checked="checked"':'')?> />
              &nbsp;Inactive &nbsp;&nbsp; </div>
          <div class="bottonserright" style="padding-bottom:20px;"> 
            <a href="javascript:void(0);" title="Delete" onClick="rowdelete('<?php echo $details->id; ?>','admin');" class="web-red-btn" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a>
            <a href="javascript:void(0);" class="web-red-btn" onClick="form_submit();"><span>Save</span></a>
           <?php echo form_close();?> </div>
        </div>
      </div>
      <div class="bodybottom"> </div>
    </div>
  </div>
  <div class="rt-block">
    <?php $this->load->view($right); ?>
  </div>
</div>
</div>
 <div class="clear"></div>
  <?php $this->load->view($footer); ?>
</div>

<script type="text/javascript">
function checkusername(submitval){
    var user_name = $("#user_name").val();

    if(user_name != '' ){
    $("#status_div").html('<img src="<?php echo base_url("public/images/ajax-loader.gif");?>" />');
    $.ajax({
        url: '<?php echo site_url("kaizen/admin/checkusername/"); ?>',
        type: 'post',        
        data: {'user_name' : user_name},
        success: function (data, status) {
          $('#status_div').show();
          if(data == 1){
            $('#status_div').html('<span style="color:green;"><img src="<?php echo base_url("public/images/available.png");?>" style="float:left"/>&nbsp;&nbsp;Username  available.</span>');
			 return true;
          }
          else{
            $('#status_div').html('<span style="color:red"><img src="<?php echo base_url("public/images/not-available.png");?>" style="float:left" />&nbsp;&nbsp;Username not available.</span>');
            return false;
          }
        }
    });
  } 
}
</script>
  
<?php //$this->load->view($footer); ?>