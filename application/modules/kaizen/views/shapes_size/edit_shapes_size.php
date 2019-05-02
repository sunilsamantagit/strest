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
	$("#cont").validationEngine('attach', { promptPosition: "inline" });
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
.add_lumbsum .mid-block{ width:100%;}
.add_lumbsum #member-form form{ display:block;}
.add_lumbsum #webcont-form .single-column label{ padding-left:0;}
.add_lumbsum #webcont-form .single-column select{ height:36px;}
.add_lumbsum .bottonserright{ padding:0 15px; box-sizing: border-box; margin-top:100px;}
.add_lumbsum .bottonserright .back_dash{ color:#159bd5;}
#webcont-form form .single-column { float: left;}
.add_lumbsum .bottonserright { padding-top: 13%;}
.web-cont-mid {
    padding: 34px 0 0px !important;
}
</style>
<div class="rightDiv">
  <div class="right-outer add_lumbsum">
    <?php if(isset($details->id) && $details->id >0){?>
    <h2 class="title">Shapes Size - Edit</h2>
      <?php if(isset($details->title)){
		     $count_e = mb_strlen( $details->title);
							      $last_space_e = '';
							      $last_space_e = strrpos(substr($details->title, 0, 80), ' ');
								  $trimmed_text_e = substr($details->title, 0, $last_space_e);
		 echo preg_replace('/<[^>]*>/', '', $details->title); if($count_e>80){ echo "..."; }}?>
    </h3>
    <?php }
    else {?>
    <h2 class="title">Shapes Size - Add</h2>
    <?php } ?>
    <div class="clear"></div>
    <div class="mid-block padbot40">
      <div class="mid-content web-cont-mid" style="border-radius: 25px;background-color: lightgray;">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <?php 
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/shapes_size/addedit/'.$details->id,$attributes);
		  echo form_hidden('shape_id', $details->id);		  
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
              <label class="question-label">Size Name<span>*</span></label>
              <input type="text" name="size_name" id="size_name" value="<?php if(isset($details->size_name)){echo $details->size_name;}?>" class="inputinpt validate[required]" />
            </div>
						
						
			<!--<?php //echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <div class="single-column">
              <label class="question-label">Shape<span>*</span></label>
              <input type="text" name="shape" id="shape" value="<?php// if(isset($details->shape)){echo $details->shape;}?>" class="inputinpt validate[required]" />
            </div>-->
			
					
				<div class="single-column" >
                    <label class="single-column">Shape<span></span></label>
                    <select name="shape" id="shape"  class="inputinpt validate[required]">
                            
					<?php if(isset($details->row)){
						foreach ($shapes_management as $rows) { ?>
						<option value="<?php echo $rows->shape_specification;?>"<?php if($rows->shape_specification==$details->row){?>selected<?php } ?>><?php echo $rows->shape_specification; ?></option>
					<?php }
					     	} else { 
						foreach ($shapes_management as $rows) { ?>
						<option value="<?php echo $rows->shape_specification;?>"><?php echo $rows->shape_specification; ?></option>
					<?php } }?>
					</select>
				</div>
					
			<div class="single-column" >
                    <label class="single-column">Status<span></span></label>
                    <select name="shape_status" id="shape_status"  class="inputinpt validate[required]">
                                        
                    <option value="1" <?php echo ((isset($details->status) && $details->status ==1)?'selected':'')?> >Active</option>
                    <option value="2" <?php echo ((isset($details->status) && $details->status ==2)?'selected':'')?>>Inactive</option>
                    </select>
            </div>


	<div class="bottonserright" style="padding-bottom:20px;"> 
		<a href="<?php echo site_url('kaizen/main'); ?>" class="back_dash">Back to Dashboard</a>

		 <a href="<?php echo site_url('kaizen/shapes_size'); ?>" class="web-red-btn cancil" onClick="form_submit();"><span>Cancel</span></a> <?php //echo form_close();?>

		 <a href="javascript:void(0);" class="web-red-btn save" onClick="form_submit();"><span>Save</span></a> <?php echo form_close();?> 

	</div>


		 </div>     
        </div>





       
      </div>
    </div>
    
  </div>
  <div class="clear"></div>
  <?php $this->load->view($footer); ?>
</div>