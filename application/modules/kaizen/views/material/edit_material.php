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

	$("#cont").validationEngine();

$('#material_GST').keyup(function (){
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$('#material_PST').keyup(function (){
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$('#material_othertax').keyup(function (){
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
    <h3 class="title">Add - Material Function</h3>
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
		  echo form_open_multipart('kaizen/material/addedit/'.$details->id,$attributes);
		  echo form_hidden('material_id', $details->id);		  
		  ?>
          <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Material Name</label>
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Spec Grade</label>
              <select id="pricing_units" name="pricing_units" class="inputinpt">
                <?php foreach ($shapesgrade as $rows) {?>                 
                 <option value="<?php echo $rows->id; ?>"><?php echo $rows->id; ?></option>
                <?php }?>
              </select>

            </div>
            
            <div class="single-column">
              <label class="question-label">Shape</label>
              
              <select id="pricing_units" name="pricing_units" class="inputinpt">
                <?php foreach ($shapesgrade as $rows) {?>                 
                 <option value="<?php echo $rows->id; ?>"><?php echo $rows->id; ?></option>
                <?php }?>
              </select>

            </div>

            <div class="single-column">
              <label class="question-label">Inches</label>
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Metric</label>
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Size</label>
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Unit Weight(lbs/lin.ft)</label>
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Unit Cost ($/lb)</label>
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Surface(sq.ft./lin.ft.)</label>
             <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Labor(hr./lb.)</label>
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->project_no)){echo $details->project_no;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Labor(hr./lb.)</label>
              <select id="pricing_units" name="pricing_units" class="inputinpt">
                <option value="English"<?php if(isset($details->addenda)){if($details->addenda=="English"){ ?> selected <?php }}?>>English</option>
                <option value="Metric"<?php if(isset($details->addenda)){if($details->addenda=="Metric"){ ?> selected <?php  }}?>>Metric</option>
              </select>
            </div>



<div class="bottonserright" style="padding-bottom:20px;"> 
<a href="#" class="back_dash">Back to Dashboard</a>

<a href="<?php echo site_url();?>/kaizen/material" title="Cancel" class="web-red-btn cancil" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Cancel</span>';}else{echo '<span>Cancel</span>';} ?></a>

 <a href="javascript:void(0);" title="Save" onClick="form_submit();");" class="web-red-btn save" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Update</span>';}else{echo '<span>Save</span>';} ?></a>


<a href="#" title="Next"class="web-red-btn next" 
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
        </div>-->


        <div class="bodybottom"> </div>
      </div>
    </div>    
  </div>
  <div class="clear"></div>
  <?php $this->load->view($footer); ?>
</div>