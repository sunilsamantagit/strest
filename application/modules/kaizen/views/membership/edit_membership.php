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
     $(function() {
     $('.iframe-btn').fancybox({
        'width'     : 900,
        'height'    : 600,
        'type'      : 'iframe',
        'autoScale' : false
          });
    });
   function closedivimage(div_id){
    $('#'+div_id).remove();
   }
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cont").validationEngine();
	});
function form_submit(){
    $('#cont').submit();
}
</script>
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
    <h3 class="title">Add Member and Sponsor</h3>
    <?php } ?>
    <div class="clear"></div>
    <div class="mid-block padbot40">
      <div class="mid-content web-cont-mid">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <?php
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/membership/addedit/'.$details->id,$attributes);
		  echo form_hidden('membership_id', $details->id);
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
              <label class="question-label">Title<span> *</span> </label>
              <input type="text" name="membership_title" id="membership_title" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>
              
              
               <div class="single-column" >
              <label class="question-label">Status:<span>*</span></label>
              <input type="radio" name="type" id="type" value="1" class="inputinpt validate[required]" 
                                <?php echo ((isset($details->type) && $details->type ==1)?'checked="checked"':'')?>/>
              &nbsp;Membership &nbsp;&nbsp;
              <input type="radio" name="type" id="type_1" value="2" <?php echo ((isset($details->type) && $details->type ==2)?'checked="checked"':'')?> />
              &nbsp;Sponsorship &nbsp;&nbsp; </div>
              
              
              <div class="single-column">
              <label class="question-label">Price *</label>
              <input type="text" name="price" id="price" value="<?php if(isset($details->price)){echo $details->price;}?>" class="inputinpt validate[required,custom[number]]" />
            </div>

            

            <div class="single-column" >
              <label class="question-label">Display Order<span></span></label>
              <input type="text" name="display_order" id="display_order" value="<?php if(isset($details->display_order)){echo $details->display_order;}?>" class="inputinpt validate[optional,custom[integer]]" />
            </div>

            <div class="single-column" >
              <label class="question-label">Status:<span>*</span></label>
              <input type="radio" name="is_active" id="is_active" value="1"
                                <?php echo ((isset($details->is_active) && $details->is_active ==1)?'checked="checked"':'')?>/>
              &nbsp;Active &nbsp;&nbsp;
              <input type="radio" name="is_active" id="is_active_1" value="0" <?php echo ((isset($details->is_active) && $details->is_active ==0)?'checked="checked"':'')?> />
              &nbsp;Inactive &nbsp;&nbsp; </div>

            <div class="bottonserright" style="padding-bottom:20px;"> <a href="javascript:void(0);" title="Delete"
             onClick="rowdelete('<?php echo $details->id; ?>','membership');" class="web-red-btn" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a> <a href="javascript:void(0);" class="web-red-btn" onClick="form_submit();">
                          <span>Save</span></a> <?php echo form_close();?> </div>
          </div>
        </div>
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
