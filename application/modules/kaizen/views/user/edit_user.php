<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
<script type="text/javascript" src="<?php echo site_url("public/ckeditor/ckeditor.js");?>"></script>
<link rel="stylesheet" href="<?php echo site_url("public/validator/css/validationEngine.jquery.css");?>" type="text/css"/>
<script src="<?php echo site_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#cont").validationEngine();
	});
function form_submit(){
    $('#cont').submit();
}
function showhide(val){
    $('#'+val).toggle();
}

</script>
<div class="rightDiv">
	<div class="right-outer">
		<h3 class="title">Add - Admin Management</h3>

        <div class="clear"></div>
        <div class="mid-block ass_bg">
            <?php
		if($this->session->userdata('ERROR_MSG')==TRUE){
			echo '<div class="notific_error">
					<h2 align="center" style="color:#00f;">'.$this->session->userdata('ERROR_MSG').'</h1></div>';
			$this->session->unset_userdata('ERROR_MSG');
		}
		if($this->session->userdata('SUCC_MSG')==TRUE){
			echo '<div class="notific_suc"><h2 align="center" style="color:#oao;">'.$this->session->userdata('SUCC_MSG').'</h1></div>';
			$this->session->unset_userdata('SUCC_MSG');
		}
		?>
	        <div class="mid-content web-cont-mid">
	            <div id="webcont-form">
        		<div id="member-form" class="midarea">
			<?php
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/user/addedit/'.$details->id,$attributes);
		  echo form_hidden('user_id', $details->id);

		  ?>
			

			<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
                            
                            <div class="single-column" style="display:none;">
                                    <label class="question-label">Full Name  <span>*</span></label>
                                    <input type="text" name="user_title" id="user_title" value="<?php if(isset($details->full_name)){echo $details->full_name;}?>" class="inputinpt validate[optional]" />
                            </div>
                            
                            <div class="single-column">
                                    <label class="question-label">First Name  <span>*</span></label>
                                    <input type="text" name="first_name" id="first_name" value="<?php if(isset($details->first_name)){echo $details->first_name;}?>" class="inputinpt validate[required]" />
                            </div>
                            
                            <div class="single-column">
                                    <label class="question-label">Last Name  <span>*</span></label>
                                    <input type="text" name="last_name" id="last_name" value="<?php if(isset($details->last_name)){echo $details->last_name;}?>" class="inputinpt validate[required]" />
                            </div>
                            
                            <div class="single-column" style="display:none">
                                    <label class="question-label">User Level <span>*</span></label>
                                    <select name="user_level" id="user_level"  class="inputinpt validate[required]">
                                        <option value="" >Select User Level</option>
                                        <option value="1" <?php echo ((isset($details->user_level) && $details->user_level ==1)?'selected':'')?> >Super Admin</option>
                                        <option value="2" <?php echo ((isset($details->user_level) && $details->user_level ==2)?'selected':'')?>>Admin</option>
                                    </select>
                            </div>
                            
                             <div class="single-column">
                                    <label class="question-label">Email<span>*</span></label>
                                    <input type="text" name="user_email" id="user_email" onblur="checkDuplicate('<?php echo $details->id; ?>','admin','user_email',this.value,'email_message','user_email');" value="<?php if(isset($details->user_email)){echo $details->user_email;}?>" class="inputinpt validate[required,custom[email]]" />
<!--                                    <label class="question-label" id="email_message"></label>-->
                            </div>
                            
                            <div class="single-column" >
                                    <label class="question-label">User Name<span>*</span></label>
                                    <input type="text" name="user_name" id="user_name" onblur="checkDuplicate('<?php echo $details->id; ?>','admin','user_name',this.value,'username_message','user_name');"value="<?php if(isset($details->user_name)){echo $details->user_name;}?>" class="inputinpt validate[required]" />
<!--                                    <label class="question-label" id="username_message"></label>-->
                            </div>
                            
                            <div class="single-column" >
                                    <label class="question-label">User ID<span>*</span></label>
                                    <input type="text" name="user_id2" id="user_id2" value="<?php if(isset($details->user_id)){echo $details->user_id;}?>" class="inputinpt validate[required]" />
<!--                                    <label class="question-label" id="username_message"></label>-->
                            </div>
                            
                             <div class="single-column" >
                                <label class="question-label">Status:<span>*</span></label>
                                <select name="approved" id="approved">
                                  <option value="1" <?php echo ((isset($details->approved) && $details->approved ==1)?'selected=""':'')?>>Active</option>
                                  <option value="0" <?php echo ((isset($details->approved) && $details->approved ==0)?'selected=""':'')?>>Inactive</option>
                                </select>
                            </div>
                            
                            <div class="hr_line"></div>
                            
                            
                            <?php  if(!empty($details->id)){ ?>
                            <div class="single-column" >
                                <label class="checkbox-field"><input type="checkbox" name="change_password" id="change_password" value="1" onclick="showhide('password_section')" class="inputinpt"  /> Change Password</label>
                            </div>
                            <?php  } ?>
                            
                            
                            
                            <div id="password_section" style="<?php if(empty($details->id)){ echo 'display:block'; }else{echo 'display:none'; }?>">
                                <div class="full_row">
                                <div class="single-column" >
                                        <label class="question-label">Password<span>*</span></label>
                                        <input type="password" name="pwd" id="pwd" value="" class="inputinpt validate[required]" />
                                </div>
                                <div class="single-column" >
                                        <label class="question-label">Confirm Password<span>*</span></label>
                                        <input type="password" name="conf_pwd" id="conf_pwd" value="" class="inputinpt validate[required,equals[pwd]]" />
                                </div>
                                </div>

                            </div>
                            
                            
                           
                           
<!--                            <div class="single-column" >
                                <label class="question-label">Status:<span>*</span></label>
                                <input type="radio" name="approved" id="approved" value="1"
                                <?php echo ((isset($details->approved) && $details->approved ==1)?'checked="checked"':'')?>/>
                              &nbsp;Approve &nbsp;&nbsp;
                              <input type="radio" name="approved" id="approved_1" value="0" <?php echo ((isset($details->approved) && $details->approved ==0)?'checked="checked"':'')?> />
                              &nbsp;Un-approve &nbsp;&nbsp;
                            </div>-->
                                
                                                               
			<div class="bottonserright" style="padding-bottom:20px;">
                            <a href="<?php echo site_url("kaizen/main");?>" class="back_dash">Back to Dashboard</a>
                            <a href="javascript:void(0);" title="Delete" onClick="rowdelete('<?php echo $details->id; ?>','admin');" class="web-red-btn cancil" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a>
                            <a href="javascript:void(0);" class="web-red-btn save" onClick="form_submit();"><span>Save</span></a> <?php echo form_close();?> </div>
		</div>
	</div>
	<div class="bodybottom"> </div>
</div>
</div>
<div class="rt-block">
		  <?php $this->load->view($right); ?>
</div>
 <?php
    if(!empty($details->id) && $this->session->userdata('user_level')==1){
        echo getalltracking($details->id,'admin');
    }
?>
</div>
    <div class="clear"></div>
<?php $this->load->view($footer); ?>

    <style>
        #password_section{ width: 100%;}
        .full_row{ width: 100%; display: flex;}
        #webcont-form .single-column select{ width: calc(100% - 100px) !important;}
        .checkbox-field{ width:100% !important;}
         #webcont-form .single-column input[type="checkbox"]{ width:auto !important; margin-right: 5px; float: left;}
         .ass_bg .mid-content{ background: #d7d7d7 !important; border: 0 !important; border-radius: 10px; padding-bottom: 0 !important; min-height: inherit;}
    </style>
