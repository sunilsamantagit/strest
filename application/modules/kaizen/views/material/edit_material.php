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

	$("#cont").validationEngine('attach', { promptPosition: "inline" });

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
              <input type="text" name="material_name" id="material_name" value="<?php if(isset($details->material_name)){echo $details->material_name;}?>" class="inputinpt validate[required]" />
            </div>

            <div class="single-column">
              <label class="question-label">Spec Grade</label>
              <select id="spec_grade_id" name="spec_grade_id" class="inputinpt validate[required]" />
                <?php if(isset($details->spec_grade_id)){
                   foreach ($shapesgrade as $rows) { ?>
                      <option value="<?php echo $rows->id;?>"<?php if($rows->id==$details->spec_grade_id){?>selected<?php } ?>><?php echo $rows->shape_specification; ?></option>
               <?php }
                 } else { 
                    foreach ($shapesgrade as $rows) { ?>
                      <option value="<?php echo $rows->id;?>"><?php echo $rows->shape_specification; ?></option>
               <?php }
                 }?>
              </select>

            </div>
            
            <div class="single-column">
              <label class="question-label">Shape</label>
              <select id="shape_id" name="shape_id" class="inputinpt validate[required]" />
                <?php if(isset($details->shape_id)){
                   foreach ($shapes as $shape) { ?>
                      <option value="<?php echo $shape->id;?>"<?php if($shape->id==$details->shape_id){?>selected<?php } ?>><?php echo $shape->size_name; ?></option>
               <?php }
                 }else {
                foreach ($shapes as $shape) { ?>
                      <option value="<?php echo $shape->id;?>"><?php echo $shape->size_name; ?></option>
               <?php }
                }
                 ?>
              </select>
            </div>


            <div class="single-column">
              <label class="question-label">Inches</label>
              <input type="text" name="inches" id="inches" value="<?php if(isset($details->inches)){echo $details->inches;}?>" class="inputinpt" />
            </div>

            <div class="single-column">
              <label class="question-label">Metric</label>
              <input type="text" name="metric" id="metric" value="<?php if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Size</label>
              <input type="text" name="size" id="size" value="<?php if(isset($details->size)){echo $details->size;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Unit Weight(lbs/lin.ft)</label>
              <input type="text" name="unit_weight" id="unit_weight" value="<?php if(isset($details->unit_weight)){echo $details->unit_weight;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Unit Cost ($/lb)</label>
              <input type="text" name="unit_cost" id="unit_cost" value="<?php if(isset($details->unit_cost)){echo $details->unit_cost;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Surface(sq.ft./lin.ft.)</label>
             <input type="text" name="surface" id="surface" value="<?php if(isset($details->surface)){echo $details->surface;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Labor(hr./lb.)</label>
              <input type="text" name="labor" id="labor" value="<?php if(isset($details->labor)){echo $details->labor;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Labor(hr./lb.)</label>
              <select id="status" name="status" class="inputinpt">
                <option value="Active"<?php if(isset($details->status)){if($details->status=="Active"){ ?> selected <?php }}?>>Active</option>
                <option value="Inactive"<?php if(isset($details->status)){if($details->status=="Inactive"){ ?> selected <?php  }}?>>Inactive</option>
              </select>
            </div>



<div class="bottonserright" style="padding-bottom:20px;"> 
<a href="<?php echo site_url('kaizen/main'); ?>" class="back_dash">Back to Dashboard</a>

<a href="<?php echo site_url();?>/kaizen/material" title="Cancel" class="web-red-btn cancil" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Cancel</span>';}else{echo '<span>Cancel</span>';} ?></a>

 <a href="javascript:void(0);" title="Save" onClick="form_submit();");" class="web-red-btn save" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Update</span>';}else{echo '<span>Save</span>';} ?></a>

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