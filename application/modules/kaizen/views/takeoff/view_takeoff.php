<?php //echo "<pre>";print_r($details);exit; ?>
<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
<link rel="stylesheet" href="<?php echo site_url("public/validator/css/validationEngine.jquery.css");?>" type="text/css"/>
<script src="<?php echo site_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/js/jquery.fancybox.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/js/jquery.mask.min.js");?>" type="text/javascript" charset="utf-8"></script>
<!--
<link rel="stylesheet" href="https://hsf.ezygst.com/assets/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="https://hsf.ezygst.com/assets/plugins/datepicker/datepicker3.css">
<script src="https://hsf.ezygst.com/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://hsf.ezygst.com/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
-->
<link rel="stylesheet" href="<?php echo base_url("public/css/jquery.fancybox.css");?>" type="text/css"/>
<script>
$('.fancybox').fancybox({
  width:'1200',
  height: '800'
});
</script>
<script type="text/javascript">
$(document).ready(function(){

$('.datepicker').datepicker({
                                  autoclose: true,
                                  format: "dd-mm-yyyy hh:ii:ss",
                                  todayHighlight: true,
                                  orientation: "auto",
                                  todayBtn: true,
                                  todayHighlight: true,
                                 });
                                 
     $('.datepicker2').datepicker({
                                  autoclose: true,
                                  format: "dd-mm-yyyy",
                                  todayHighlight: true,
                                  orientation: "auto",
                                  todayBtn: true,
                                  todayHighlight: true,
                                 });
                                 
                                 

	$("#cont").validationEngine('attach', { promptPosition: "inline" });

$('#takeoff_GST').keyup(function (){
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$('#takeoff_PST').keyup(function (){
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$('#takeoff_othertax').keyup(function (){
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$('.phone_us').mask('(000)-000-0000'); 
//$('.zip_code').mask('S0S 0S0'); 
//$("#cont").validationEngine();
  
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
        'autoScale': false
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
    <h3 class="title">Takeoff - Description</h3>
    <?php } ?>
    <div class="clear"></div>
    <div class="padbot40">

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

      <div class="mid-content web-cont-mid" style="border-radius: 25px;background-color: lightgray;">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <?php 
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/takeoff/addedit/'.$details->id,$attributes);
		  echo form_hidden('takeoff_id', $details->id);		  
		  ?>
          <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Project No.<span> *</span></label>
              <input type="text" name="takeoff_project_no" id="takeoff_project_no" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Quote No.</label>
              <input type="text" name="takeoff_quate_no" id="takeoff_quate_no" value="<?php if(isset($details->quote_no)){echo $details->quote_no;}?>" class="inputinpt validate[required]" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Addenda</label>
              <input type="text" name="takeoff_addenda" id="takeoff_addenda" value="<?php if(isset($details->addenda)){echo $details->addenda;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Start Date</label>
              <input type="text" name="takeoff_start_date" id="takeoff_start_date" placeholder="MM / DD / YYYY" value="<?php if(isset($details->date)){echo $details->date;}?>" class="inputinpt datepicker2" />
              <img src="<?php echo base_url(); ?>application/modules/kaizen/views/takeoff/u212.png"></img>
            </div>


            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Pricing Units<span> *</span></label>
              <select id="pricing_units" name="pricing_units" class="inputinpt">
                <option value="English"<?php if(isset($details->addenda)){if($details->addenda=="English"){ ?> selected <?php }}?>>English</option>
                <option value="Metric"<?php if(isset($details->addenda)){if($details->addenda=="Metric"){ ?> selected <?php  }}?>>Metric</option>
              </select>
            </div>
            <div class="clear"></div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Project Title</label>
              <input type="text" name="takeoff_project_title" id="takeoff_project_title" value="<?php if(isset($details->project_title)){echo $details->project_title;}?>" class="inputinpt" />
            </div>  

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <div class="inner_column" style="padding-right: 15px;">
              <label class="question-label">Erect?</label>
              <select id="erect" name="erect" class="inputinpt">

              <option value="Yes" <?php if(isset($details->addenda)){ if($details->addenda=="Yes"){?> selected<?php } }?> >Yes</option>
              <option value="No" <?php if(isset($details->addenda)){ if($details->addenda=="No"){?> selected<?php } }?>>No</option>
              
              </select>
             </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="inner_column" style="padding-left: 15px;">
              <label class="question-label">FOB</label>
              <input type="text" name="takeoff_fob" id="takeoff_fob" value="<?php if(isset($details->fob)){echo $details->fob;}?>" class="inputinpt" />
            </div>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
              <div class="single-column">
              <label class="question-label">Location</label>
              <input type="text" name="takeoff_location" id="takeoff_location" value="<?php if(isset($details->location)){echo $details->location;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label"> =   Legal</label>
              <input type="text" name="takeoff_legal" id="takeoff_legal" value="<?php if(isset($details->legal)){echo $details->legal;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Owner</label>
              <input type="text" name="takeoff_owner" id="takeoff_owner" value="<?php if(isset($details->owner)){echo $details->owner;}?>" class="inputinpt" />
            </div>

          <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_place" id="takeoff_place" value="<?php if(isset($details->place)){echo $details->place;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Tel.</label>
              <input type="text" name="takeoff_tel" id="takeoff_tel" placeholder="(000) - 000 - 0000" value="<?php if(isset($details->tel)){echo $details->tel;}?>" class="inputinpt phone_us" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Fax</label>
              <input type="text" name="takeoff_fax" id="takeoff_fax" placeholder="(000) - 000 - 0000" value="<?php if(isset($details->fax)){echo $details->fax;}?>" class="inputinpt phone_us" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Mobile</label>
              <input type="text" name="takeoff_mobile" id="takeoff_mobile" placeholder="(000) - 000 - 0000" value="<?php if(isset($details->mobile)){echo $details->mobile;}?>" class="inputinpt phone_us" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Contact</label>
              <input type="text" name="takeoff_contact" id="takeoff_contact" value="<?php if(isset($details->contact)){echo $details->contact;}?>" class="inputinpt" />
            </div>

            <div class="hr_line"></div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Closing - Bid Depository</label>
              <select id="closing_bid_depository" name="closing_bid_depository" class="inputinpt">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Rulings</label>
              <input type="text" name="takeoff_rulings" id="takeoff_rulings" value="<?php if(isset($details->clo_rulings)){echo $details->clo_rulings;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Date - Time</label>
              <input type="text" name="takeoff_datetime" id="takeoff_datetime" placeholder="MM / DD / YYYY HH : MM" value="<?php if(isset($details->clo_date_time)){echo $details->clo_date_time;}?>" class="inputinpt datepicker" />
              <img src="<?php echo base_url(); ?>application/modules/kaizen/views/takeoff/u212.png"></img>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_clo_place" id="takeoff_clo_place" value="<?php if(isset($details->clo_place)){echo $details->clo_place;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">GST</label>
              <input type="text" name="takeoff_GST" id="takeoff_GST" value="<?php if(isset($details->clo_GST)){echo $details->clo_GST;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">PST</label>
              <input type="text" name="takeoff_PST" id="takeoff_PST" value="<?php if(isset($details->clo_PST)){echo $details->clo_PST;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Other Tax</label>
              <input type="text" name="takeoff_othertax" id="takeoff_othertax" value="<?php if(isset($details->clo_other_tax)){echo $details->clo_other_tax;}?>" class="inputinpt" />
            </div>

            <div class="hr_line"></div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Bid Bond</label>
              <select id="bid_bond" name="bid_bond" class="inputinpt">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Perform. Bond</label>
              <select id="perform_bond" name="perform_bond" class="inputinpt">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Lab./Mat. Bond</label>
              <select id="lab_mat_bond" name="lab_mat_bond" class="inputinpt">
              <option>Yes</option>
              <option>No</option>
              </select>
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Holdback</label>
              <input type="text" name="takeoff_holdback" id="takeoff_holdback" value="<?php if(isset($details->holdback)){echo $details->holdback;}?>" class="inputinpt" />%
            </div>

            <div class="hr_line"></div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Architect</label>
              <input type="text" name="takeoff_architect_name" id="takeoff_architect_name" value="<?php if(isset($details->architect_name)){echo $details->architect_name;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Engineer</label>
              <input type="text" name="takeoff_engineer_name" id="takeoff_engineer_name" value="<?php if(isset($details->engineer_name)){echo $details->engineer_name;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_architect_place" id="takeoff_architect_place" value="<?php if(isset($details->architect_place)){echo $details->architect_place;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Place</label>
              <input type="text" name="takeoff_engineer_place" id="takeoff_engineer_place" value="<?php if(isset($details->engineer_place)){echo $details->engineer_place;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Contact</label>
              <input type="text" name="takeoff_architect_contact" id="takeoff_architect_contact" value="<?php if(isset($details->architect_contact)){echo $details->architect_contact;}?>" class="inputinpt" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Contact</label>
              <input type="text" name="takeoff_engineer_contact" id="takeoff_engineer_contact" value="<?php if(isset($details->engineer_contact)){echo $details->engineer_contact;}?>" class="inputinpt" />
            </div>


            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Tel.</label>
              <input type="text" name="takeoff_architect_tel" id="takeoff_architect_tel" placeholder="(000) - 000 - 0000" value="<?php if(isset($details->architect_tel)){echo $details->architect_tel;}?>" class="inputinpt phone_us" />
            </div>

             <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Tel.</label>
              <input type="text" name="takeoff_engineer_tel" id="takeoff_engineer_tel" placeholder="(000) - 000 - 0000" value="<?php if(isset($details->engineer_tel)){echo $details->engineer_tel;}?>" class="inputinpt phone_us" />
            </div>

             <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Fax.</label>
              <input type="text" name="takeoff_architect_fax" id="takeoff_architect_fax" placeholder="(000) - 000 - 0000" value="<?php if(isset($details->architect_fax)){echo $details->architect_fax;}?>" class="inputinpt phone_us" />
            </div>

            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Fax.</label>
              <input type="text" name="takeoff_engineer_fax" id="takeoff_engineer_fax" placeholder="(000) - 000 - 0000" value="<?php if(isset($details->engineer_fax)){echo $details->engineer_fax;}?>" class="inputinpt phone_us" />
            </div>
         

<div class="bottonserright" style="padding-bottom:20px;"> 
<a href="<?php echo site_url('kaizen/main'); ?>" class="back_dash">Back to Dashboard</a>

<a href="<?php echo site_url('kaizen/takeoff');?>" title="" class="web-red-btn cancil" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Cancel</span>';}else{echo '<span>Cancel</span>';} ?></a>

<!-- <a href="javascript:void(0);" title="Save" onClick="form_submit();");" class="web-red-btn save" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Update</span>';}else{echo '<span>Save</span>';} ?></a>-->


<a href="#" title="" class="web-red-btn next" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Next</span>';}else{echo '<span>Next</span>';} ?> >></a>




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
  </div>
  <div class="clear"></div>
  <?php $this->load->view($footer); ?>
</div>