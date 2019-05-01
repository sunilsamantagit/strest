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
<script src="<?php echo base_url("public/js/maxlength/jquery.plugin.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/js/maxlength/jquery.maxlength.js");?>" type="text/javascript" charset="utf-8"></script>
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
    <h3 class="title">Add Takeoff Line Entries</h3>
    <?php } ?>
    <div class="clear"></div>
    <div class="mid-block padbot40">
      <div class="mid-content web-cont-mid">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <?php 
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/takeoffline/addedit/'.$details->id,$attributes);
		  echo form_hidden('takeoffline_id', $details->id);
		  
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
              <label class="question-label">Title<span> *</span></label>
              <input type="text" name="takeoffline_title" id="takeoffline_title" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt validate[required]" />
            </div>
              
              <div class="single-column">
              <label class="question-label">Excerpt </label>
              <?php
                                    if(!empty($details->excerpt)){
                                        $cont_txt1 = outputEscapeString($details->excerpt);
                                    }
                                    else{
                                        $cont_txt1 = "";
                                    }?>
              <textarea id="excerpt" name="excerpt" class="editor" style="resize:none;min-height:50px;max-height:50px;""><?php echo $cont_txt1;?></textarea>
            </div>
          
               <script>
                $('#excerpt').maxlength({max: 100});
            </script> 
              
              <div class="single-column" >
	          <label class="question-label">Photo - Size Requirement:  281 x 283 px ( W x H )</label><p class="sizetxt"></p>
	          <input id="htmlfile1" name="htmlfile1" value="<?php if(!empty($details->takeoffline_photo)) echo $details->takeoffline_photo; ?>" type="text">
	          <a href="<? echo front_base_url().'filemanager/dialog.php?type=1&field_id=htmlfile1&relative_url=1'?>?>" class="btn iframe-btn" type="button">Open File Manager</a> 
                  <div id="banner_photodiv">
                  <?php
                  if(!empty($details->takeoffline_photo)){
                    $head_img=$details->takeoffline_photo;
                  }else{
                    $head_img=base_url('public/images.png');
                  }?>
                  <img id="img_sceen" src="<?php echo $head_img;?>" style="background:white;" width="150" height="100"/>
                </div>
	        </div>
              


<div class="single-column" >
              <label class="question-label">Button Text<span> *</span></label>
              <input type="text" name="button_text" id="button_text" value="<?php if(isset($details->button)){echo $details->button;}?>" class="inputinpt validate[required]" />
            </div>

<div class="single-column">
                 <label class="labelname">Button Type<span> *</span></label>
     <input type="radio" id="button_type" name="button_type" value="1" <?php if(!empty($details->button_type) && $details->button_type == '1'){echo "checked";} ?>  onclick="show_page_div('button_page_div','button_ext_div');" class="inputinpt validate[required]"/> Select Page
    <input type="radio" id="button_type" name="button_type" value="2" <?php if(!empty($details->button_type) && $details->button_type == '2'){echo "checked";} ?>  onclick="show_ext_div('button_page_div','button_ext_div');"  class="inputinpt validate[required]"/> External Link
                   </div>
                   
                   <script>
                   function show_page_div(a,b){ 
					   document.getElementById(a).style.display = '';
					   document.getElementById(b).style.display = 'none';
				   }
				   function show_ext_div(a,b){
					   document.getElementById(a).style.display = 'none';
					   document.getElementById(b).style.display = '';
				   }
                   </script>
                   <div class="single-column" id="button_page_div" style="display:<?php if(!empty($details->button_type) && $details->button_type == '1'){echo  ''; }else{echo  'none';} ?>;">
              <label class="question-label">Select Page *:</label>
              <select name="page_link" id="page_link" class="inputinpt validate[required]">
                  <option value="" >-Select Pages-</option>
           <?php if(!empty($page_list)) { 
                  foreach($page_list as $page){
                  if($page->id!=1) { ?>
   <option value="<?php echo $page->page_link; ?>" <?php if(!empty($details->selected_page_link) && ($details->selected_page_link == $page->page_link)){echo "selected"; }else{ echo ""; } ?> ><?php echo $page->title; ?></option>
                  <?php } } } ?>
              </select>
            </div>
                   <div class="single-column" id="button_ext_div" style="display:<?php if(!empty($details->button_type) && $details->button_type == '2'){echo  ''; }else{echo  'none';} ?>;">
              <label class="question-label">External Link URL *:</label>
              <input type="text" name="external_url" id="external_url" value="<?php if(!empty($details->external_url) && $details->button_type == '2'){ echo $details->external_url;} ?>" class="inputinpt validate[required,custom[url]]" />
            </div>
              
            <div class="single-column" >
                <label class="question-label">Display Order<span>*</span></label>
              <input type="text" name="display_order" id="display_order" value="<?php if(isset($details->display_order)){echo $details->display_order;}?>" class="inputinpt validate[required,custom[integer]]" />
            </div>

            <div class="single-column" >
              <label class="question-label">Status:<span>*</span></label>
              <input type="radio" name="is_active" id="is_active" value="1" 
                                <?php echo ((isset($details->is_active) && $details->is_active ==1)?'checked="checked"':'')?>/>
              &nbsp;Active &nbsp;&nbsp;
              <input type="radio" name="is_active" id="is_active_1" value="0" <?php echo ((isset($details->is_active) && $details->is_active ==0)?'checked="checked"':'')?> />
              &nbsp;Inactive &nbsp;&nbsp; </div>
            <div class="bottonserright" style="padding-bottom:20px;"> <a href="javascript:void(0);" title="Delete"
             onClick="rowdelete('<?php echo $details->id; ?>','takeoffline');" class="web-red-btn" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a> <a href="javascript:void(0);" class="web-red-btn" onClick="form_submit();">
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