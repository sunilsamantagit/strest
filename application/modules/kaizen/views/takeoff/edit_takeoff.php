<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
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
    $('#cont').submit();
}
</script>
<script type="text/javascript">
     $(function() {
     $('.iframe-btn').fancybox({	
      	'width'		: 900,
      	'height'	: 600,
      	'type'		: 'iframe',
              'autoScale'    	: false
          });
    });
</script>

<style>
.maxlength-feedback {
    color: #D3332F;
}
</style>
<div class="rightDiv">
  <div class="right-outer">
    <?php if(isset($details->id) && $details->id >0){?>
    <h3 class="title">Edit
      <?php if(isset($details->title)){
		     $count_e = mb_strlen( $details->title);
							      $last_space_e = '';
							      $last_space_e = strrpos(substr($details->title, 0, 80), ' ');
								  $trimmed_text_e = substr($details->title, 0, $last_space_e);
		 echo preg_replace('/<[^>]*>/', '', $details->title); if($count_e>80){ echo "..."; }}?>
    </h3>
    <?php }
    else {?>
    <h3 class="title">Add Takeoff</h3>
    <?php } ?>
    <div class="clear"></div>
    <div class="mid-block padbot40">
      <div class="mid-content web-cont-mid" style="border-radius: 25px;background-color: lightgray;">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <?php 
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/takeoff/addedit/'.$details->id,$attributes);
		  echo form_hidden('takeoff_id', $details->id);		  
		  ?>
            <?php
		if($this->session->userdata('ERROR_MSG')==TRUE){
			echo '<div class="notific_error">
					<h1 align="center" style="color:#fff;">'.$this->session->userdata('ERROR_MSG').'</h1></div>';
			$this->session->unset_userdata('ERROR_MSG');
		}
		if($this->session->userdata('SUCC_MSG')==TRUE){
			echo '<div class="notific_suc"><h2 align="center" style="color:#000;">'.$this->session->userdata('SUCC_MSG').'</h1></div>';
			$this->session->unset_userdata('SUCC_MSG');
		}
		?>
            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Project No.<span> *</span></label>
              <input type="text" name="takeoff_project_no" id="takeoff_project_no" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Quote No.</label>
              <input type="text" name="takeoff_quate_no" id="takeoff_quate_no" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Addenda</label>
              <input type="text" name="takeoff_addenda" id="takeoff_addenda" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Start Date</label>
              <input type="text" name="takeoff_start_date" id="takeoff_start_date" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required] datepicker" />
              <img src="<?php echo base_url(); ?>application/modules/kaizen/views/takeoff/u212.png"></img>
                          </div>


            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Pricing Units</label>
              <select id="pricing_units" name="pricing_units">
                <option>English</option>
                <option>Metric</option>
              </select>
            </div>
            
            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Project Title</label>
              <input type="text" name="takeoff_project_title" id="takeoff_project_title" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>  

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Erect?</label>
              <select id="erect" name="erect">
                <option>Yes</option>
                <option>No</option>
              </select>
             </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">FOB</label>
              <input type="text" name="takeoff_fob" id="takeoff_fob" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Location</label>
              <input type="text" name="takeoff_location" id="takeoff_location" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label"> =   Legal</label>
              <input type="text" name="takeoff_legal" id="takeoff_legal" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Owner</label>
              <input type="text" name="takeoff_owner" id="takeoff_owner" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_place" id="takeoff_place" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Tel.</label>
              <input type="text" name="takeoff_tel" id="takeoff_tel" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Fax</label>
              <input type="text" name="takeoff_fax" id="takeoff_fax" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Mobile</label>
              <input type="text" name="takeoff_mobile" id="takeoff_mobile" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Contact</label>
              <input type="text" name="takeoff_contact" id="takeoff_contact" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Closing - Bid Depository</label>
              <select id="closing_bid_depository" name="closing_bid_depository">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Rulings</label>
              <input type="text" name="takeoff_rulings" id="takeoff_rulings" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Date - Time</label>
              <input type="text" name="takeoff_datetime" id="takeoff_datetime" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
              <img src="<?php echo base_url(); ?>application/modules/kaizen/views/takeoff/u212.png"></img>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_clo_place" id="takeoff_clo_place" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">GST</label>
              <input type="text" name="takeoff_GST" id="takeoff_GST" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">PST</label>
              <input type="text" name="takeoff_PST" id="takeoff_PST" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Other Tax</label>
              <input type="text" name="takeoff_othertax" id="takeoff_othertax" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Bid Bond</label>
              <select id="bid_bond" name="bid_bond">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Perform. Bond</label>
              <select id="perform_bond" name="perform_bond">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Lab./Mat. Bond</label>
              <select id="lab_mat_bond" name="lab_mat_bond">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Holdback</label>
              <input type="text" name="takeoff_holdback" id="takeoff_holdback" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />%
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Architect</label>
              <input type="text" name="takeoff_architect_name" id="takeoff_architect_name" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Engineer</label>
              <input type="text" name="takeoff_engineer_name" id="takeoff_engineer_name" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_architect_place" id="takeoff_architect_place" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

<?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_engineer_place" id="takeoff_engineer_place" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Contact</label>
              <input type="text" name="takeoff_architect_contact" id="takeoff_architect_contact" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Contact</label>
              <input type="text" name="takeoff_engineer_contact" id="takeoff_engineer_contact" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>


            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Tel.</label>
              <input type="text" name="takeoff_architect_tel" id="takeoff_architect_tel" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

             <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Tel.</label>
              <input type="text" name="takeoff_engineer_tel" id="takeoff_engineer_tel" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

             <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Fax.</label>
              <input type="text" name="takeoff_architect_fax" id="takeoff_architect_fax" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Fax.</label>
              <input type="text" name="takeoff_engineer_fax" id="takeoff_engineer_fax" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>
         

<div class="bottonserright" style="padding-bottom:20px;"> 
<a href="#" class="back_dash">Back to Dashboard</a>

<a href="javascript:void(0);" title="Delete"
             onClick="rowdelete('<?php echo $details->id; ?>','home_block');" class="web-red-btn" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a> <a href="javascript:void(0);" class="web-red-btn cancil" onClick="form_submit();">
                          <span>Cancel</span></a> <?php //echo form_close();?>

 <a href="javascript:void(0);" title="Delete"
             onClick="rowdelete('<?php echo $details->id; ?>','home_block');" class="web-red-btn" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a> <a href="javascript:void(0);" class="web-red-btn save" onClick="form_submit();">
                          <span>Save</span></a> <?php echo form_close();?> 

 <a href="javascript:void(0);" title="Delete"
             onClick="rowdelete('<?php echo $details->id; ?>','home_block');" class="web-red-btn" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a> <a href="javascript:void(0);" class="web-red-btn next" onClick="form_submit();">
                          <span>Next >></span></a> <?php echo form_close();?>
 </div>



<!--
        <div class="single-column" >
              <label class="question-label">Status:<span>*</span></label>
              <input type="radio" name="is_active" id="is_active" value="1" 
                                <?php echo ((isset($details->is_active) && $details->is_active ==1)?'checked="checked"':'')?>/>
              &nbsp;Active &nbsp;&nbsp;
              <input type="radio" name="is_active" id="is_active_1" value="0" <?php echo ((isset($details->is_active) && $details->is_active ==0)?'checked="checked"':'')?> />
              &nbsp;Inactive &nbsp;&nbsp; </div>
          </div>     
        </div>
-->

        <div class="bodybottom"> </div>
      </div>
    </div>
    <div class="rt-block">
  <?php $this->load->view($right); ?>
</div>
  </div>
  <div class="clear"></div>
  <?php $this->load->view($footer); ?>
</div>