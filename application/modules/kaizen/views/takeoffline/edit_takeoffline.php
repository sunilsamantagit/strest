<?php //echo "<pre>";print_r($details);exit; ?>
<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
<link rel="stylesheet" href="<?php echo site_url("public/validator/css/validationEngine.jquery.css");?>" type="text/css"/>
<script src="<?php echo site_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/js/jquery.fancybox.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/js/jquery.mask.min.js");?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url("public/css/jquery.fancybox.css");?>" type="text/css"/>
<script>
$('.fancybox').fancybox({
  width:'1200',
  height: '800'
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$("#entry_type").change(function(){
    if($("#entry_type").val()=="MainMumbr")
    {
<<<<<<< HEAD
      $("#lumpsum").hide(1000);
      $("#text").hide();
      $("#mainMumbr").show(1000);
=======
      $("#lumpsum").hide();
      $("#text").hide();
      $("#mainMumbr").show();
>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201
    }
    if($("#entry_type").val()=="Lumpsum")
    {
      $("#text").hide();
<<<<<<< HEAD
      $("#mainMumbr").hide(1000);
      $("#lumpsum").show(1000);      
=======
      $("#mainMumbr").hide();
      $("#lumpsum").show();      
>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201
    }
    if($("#entry_type").val()=="Text")
    {
      $("#lumpsum").hide();
      $("#mainMumbr").hide();
      $("#text").show();
    }
  });
<<<<<<< HEAD
$('.datepicker').datepicker({
                                  autoclose: true,
                                  format: "dd-mm-yyyy hh:ii:ss",
                                  todayHighlight: true,
                                  orientation: "auto",
                                  todayBtn: true,
                                  todayHighlight: true,
                                 });

	$("#cont").validationEngine('attach', { promptPosition: "inline" });
=======

$("#shapes_management_id").change(function(){
  var shap_id=$("#shapes_management_id").val();
//alert(shap_id);
$("#size_id").text('');
$.ajax({
           url:"<?php echo site_url(); ?>/kaizen/takeoffline/shapes_size/"+shap_id,
           type:"GET",
           dataType:"JSON",
           success:function(data){
              $("#size_id").append('<option value="">Select Option</option>');
               for(var i=0;i<data['shap_details'].length;i++)
               {
                  $("#size_id").append('<option value="' + data['shap_details'][i].id + '">' + data['shap_details'][i].size_name + '</option>');
                  //$("#size_id").val(data['shap_details'][i].size_name);
               }
           }
        });

});
	$("#cont").validationEngine('attach', { promptPosition: "inline" });

>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201
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
<<<<<<< HEAD
$(document).ready(function(){

  
=======
$(document).ready(function(){  
>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201
     $('#inches').keyup(function (){
    this.value = this.value.replace(/[^0-9\.]/g,'');
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
    <h3 class="title">Add Line Entry</h3>
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
<<<<<<< HEAD
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

=======
		  echo form_open_multipart('kaizen/takeoffline/addedit/'.$details->id,$attributes);
		  echo form_hidden('takeoffline_id', $details->id);
		  ?>
>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201

            <div class="single-column">
              <label class="question-label">Resource *</label>
              <select id="resource" name="resource" class="inputinpt validate[required]" />
                <option value="Select Option">Select Option</option>
                <option value="ShopFab">ShopFab</option>
                <option value="SubFab">SubFab</option>
                <option value="Purchase">Purchase</option>                
              </select>
            </div>

            <div class="single-column">
              <label class="question-label">Entry Type *</label>
              <select id="entry_type" name="entry_type" class="inputinpt validate[required]" />
                <option value="Select Option">Select Option</option>
                <option value="MainMumbr">MainMumbr</option>
                <option value="Lumpsum">Lumpsum</option>
                <option value="Detail">Detail</option>               
                <option value="Text">Text</option>
              </select>
            </div>

<<<<<<< HEAD
  <div id="mainMumbr" style="display: show;">
      Main Mmbr
<?php print_r($shapesgrade); ?>
        <div class="single-column">
              <label class="question-label">Shape</label>
              <select id="spec_grade_id" name="spec_grade_id" class="inputinpt validate[required]" />
                <?php /* if(isset($details->spec_grade_id)){
                   foreach ($shapesgrade as $rows) { ?>
                      <option value="<?php echo $rows->id;?>"<?php if($rows->id==$details->spec_grade_id){?>selected<?php } ?>><?php echo $rows->shape_specification; ?></option>
               <?php }
                 } else { */
                    foreach ($shapesgrade as $rows) { ?>
                      <option value="<?php echo $rows->id;?>"><?php echo $rows->shape_specification; ?></option>
               <?php }
                // }?>
              </select>
        </div>

  </div>

            <div id="lumpsum" style="display: none;">
              Lump Sum Entry
            </div>

            <div id="text" style="display: none;">
              Text
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
              <label class="question-label">Status</label>
              <select id="status" name="status" class="inputinpt">
=======
  <div id="mainMumbr" style="display: show;width: 100%;background-color: darkgray;">
      <b>Main Mmbr</b>
        <div class="single-column">
              <label class="question-label">Shape</label>
              <select id="shapes_management_id" name="shapes_management_id" class="inputinpt validate[required]" />
                <option value="">Select Option</option>
                 <?php foreach ($shapesgrade as $rows) { ?>
                      <option value="<?php echo $rows->id;?>"><?php echo $rows->shape_specification; ?></option>
               <?php }?>
              </select>
        </div>

        <div class="single-column">
              <label class="question-label">Size</label>
              <select id="size_id" name="size_id" class="inputinpt validate[required]" />
              </select>
        </div>

        <div class="single-column">
              <label class="question-label">Width</label>
              <input type="text" name="width" id="width" value="<?php if(isset($details->width)){echo $details->width;}?>" class="inputinpt">
        </div>

        <div class="single-column">
              <label class="question-label">Lens</label>
              <input type="text" name="lens" id="lens" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
        </div>

        <div class="single-column">
              <label class="question-label">Add ConnMat etc</label>
              <input type="text" name="connmat" id="connmat" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">%
        </div>

        <div class="single-column">
              <label class="question-label">Weight</label>
              <input type="text" name="weight" id="weight" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
              lbs/each
        </div>

        <div class="single-column">
              <label class="question-label">Field -- Bolts</label>
              <input type="text" name="field_bolts" id="field_bolts" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
        </div>

        <div class="single-column">
              <label class="question-label">Welds</label>
              <input type="text" name="welds" id="welds" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
              in/each
        </div>

        <div class="single-column">
              <label class="question-label">MH/T Range</label>
              <input type="text" name="mh_t_range" id="mh_t_range" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
        </div>

        <div class="single-column">
              <label class="question-label">=</label>
              <input type="text" name="mh_total_range" id="mh_total_range" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
              MH/T Range
        </div>

        <div class="single-column">
              <label class="question-label">SF4>Auxserv: Shop</label>
              <select id="auxserv_shop" name="auxserv_shop" class="inputinpt validate[required]" />
                <option value="Select Option">Select Option</option>
                <option value="Standard Primer">Standard Primer</option>
                <option value="Not Required">Not Required</option>                 
              </select>
        </div>

        <div class="single-column">
              <label class="question-label">Quantity</label>
              <input type="text" name="quantity" id="quantity" value="<?php //if(isset($details->metric)){echo $details->metric;}?>" class="inputinpt">
              MH/T Range
        </div>

  </div>

  <div id="lumpsum" style="display: none;width: 100%;background-color: darkgray;">
          <b>Lump Sum Entry</b>

            <div class="single-column">
              <label class="question-label">Entry Type</label>
              <select id="lumbsum" name="lumbsum" class="inputinpt validate[required]" />
                <option value="">Select Option</option>
                 <?php foreach ($lumbsum as $lumb) { ?>
                      <option value="<?php echo $lumb->id;?>"><?php echo $lumb->lumbsum_name; ?></option>
               <?php }?>               
              </select>
            </div>

            <div class="single-column">
              <label class="question-label">Description</label>
              <input type="text" name="description" id="description" value="<?php //if(isset($details->size)){echo $details->size;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Amount</label>
              $<input type="text" name="amount" id="amount" value="<?php //if(isset($details->size)){echo $details->size;}?>" class="inputinpt">MHs
            </div>

  </div>

  <div id="text" style="display: none;width: 100%;background-color: darkgray;">              
            <b>Text</b>

              <div class="single-column">
              <label class="question-label">Description</label>
              <textarea id="text_description" name="text_description"  value="<?php //if(isset($details->size)){echo $details->size;}?>" class="inputinpt"></textarea>
            </div>

  </div>

        <div class="single-column">
              <label class="question-label">Erect</label>
              <select id="erect" name="erect" class="inputinpt">
>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201
                <?php /* if(isset($details->status)) {?>
                  <option value="Active"<?php if($details->status=="Active"){?>selected<?php } ?>>Active</option>
                  <option value="Inactive"<?php if($details->status=="Inactive"){?>selected<?php } ?>>Inactive</option>
                }else{ */?>
<<<<<<< HEAD
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <?php // } ?>
              </select>
            </div>
=======
                <option value="">Select Option</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <?php // } ?>
              </select>
            </div>          
>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201



<div class="bottonserright" style="padding-bottom:20px;"> 
<<<<<<< HEAD
<a href="<?php echo site_url('kaizen/main'); ?>" class="back_dash">Back to Dashboard</a>
=======

<a href="javascript:void(0);" title="Save" onClick="form_submit();");" class="web-red-btn save" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Update</span>';}else{echo '<span>Save</span>';} ?></a>

>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201

<a href="<?php echo site_url();?>/kaizen/material" title="Cancel" class="web-red-btn cancil" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Cancel</span>';}else{echo '<span>Cancel</span>';} ?></a>

<<<<<<< HEAD
 <a href="javascript:void(0);" title="Save" onClick="form_submit();");" class="web-red-btn save" 
 <?php if(isset($details->id) && ($details->id >0)){echo '<span>Update</span>';}else{echo '<span>Save</span>';} ?></a>

=======
 
>>>>>>> 9fb3c01f02f1a626d1d17081c4b6d2f2e6bda201
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