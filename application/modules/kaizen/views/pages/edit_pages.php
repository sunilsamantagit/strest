<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
<script type="text/javascript" src="<?php echo site_url("public/ckeditor/ckeditor.js");?>"></script>
<link rel="stylesheet" href="<?php echo site_url("public/validator/css/validationEngine.jquery.css");?>" type="text/css"/>
<script src="<?php echo site_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo site_url("public/js/maxlength/jquery.plugin.js");?>"></script>
<script type="text/javascript" src="<?php echo site_url("public/js/maxlength/jquery.maxlength.js");?>"></script>
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
function goto_page(){
document.location.href = "<?php echo site_url("kaizen/pages/");?>";
}
function confirmdel_pages(id,page){
	if(confirm("Are you sure want to delete?")){
		window.location.href="<?php echo site_url("kaizen/pages/dodelete/");?>?deleteid="+id+"&ref="+page;
	}
	else{
		return false;
	}
}

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
    <h3 class="title">
      <?php if(isset($details->id) && $details->id >0){?>
      <h3 class="title">Edit
        <?php if(isset($details->title)){echo $details->title;}?>
      </h3>
      <?php }
    else {?>
      <h3 class="title">Add Pages</h3>
      <?php } ?>
    </h3>
    <div class="clear"></div>
    <div class="mid-block padbot40">
      <div class="mid-content web-cont-mid">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <?php
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/pages/addedit/'.$details->id,$attributes);
		  echo form_hidden('pages_id', $details->id);

		  ?>
            <?php
		if($this->session->userdata('ERROR_MSG')==TRUE){
			echo '<div class="notific_error">
					<h2 align="center" style="color:#fff;">'.$this->session->userdata('ERROR_MSG').'</h1></div>';
			$this->session->unset_userdata('ERROR_MSG');
		}
		if($this->session->userdata('SUCC_MSG')==TRUE){
			echo '<div class="notific_suc"><h2 align="center" style="color:#000;">'.$this->session->userdata('SUCC_MSG').'</h1></div>';
			$this->session->unset_userdata('SUCC_MSG');
		}
		?>
            <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
            <?php if($details->id>0 ) { ?>
            <div class="single-column" >
              <label class="question-label">Page Link </label>
              <?php
                         echo urlByPageLink($details->page_link).'.html';
              
//					$page_array=array('events','home','fishing','contest','family_activities','golf','contact','museums','hiking','watersports','hunting','winter','scenic_guide','where_to_stay','about','gallery','directory','membership');
//					if(!in_array($details->page_link,$page_array))
//					{
//						echo base_url("pages/".$details->page_link);
//					}
//					else
//					{
//						$page_array2=array('home');
//						if(!in_array($details->page_link,$page_array2))
//						{
//							echo base_url($details->page_link);
//						}
//						else
//						{
//							echo base_url();
//						}
//					}
				?>
            </div>
            <?php } ?>

            <div class="single-column" >
							<label class="labelname">Select location:</label>
							<select name="parent_id" id="parent_id" style="width:268px;" tabindex="1">
								<option value="0" <?php echo ((!isset($details->parent_id))?'selected="selected"':'')?> >-TOP-</option>
								<?php

								$OPT_MENU = '';
								$parent_id = 0;
								$menus_array = array();
								foreach ($page_list as $rs_menu_id){
									if($rs_menu_id->id!='1')
									{
										$menus_array[$rs_menu_id->id] = array('id' => $rs_menu_id->id,'title' => $rs_menu_id->title,'parent_id' => $rs_menu_id->parent_id,'page_link' => $rs_menu_id->page_link);
									}
								}
								if(empty($details->parent_id)){
									$details->parent_id = 0;
								}

								$optmenu = generate_opt_menu(0,$menus_array, $OPT_MENU, 0,$details->parent_id, $details->parent_id);
								echo $optmenu;
								?>
							</select>
						</div>
            <div class="single-column" >
              <label class="question-label">Enter Title  *</label>
              <input type="text" name="pages_title" id="pages_title" value="<?php if(isset($details->title)){echo $details->title;}?>" class="inputinpt  validate[required]"/>
            </div>
            <div class="single-column" >
              <label class="question-label">External Link</label>
              <input type="text" name="external_link" id="external_link" value="<?php if(isset($details->external_link)){echo $details->external_link;}?>" class="inputinpt  validate[optional,custom[url]]"/>
            </div>

            <div class="single-column" >
              <label class="question-label">Show In Top For Main Pages / Show In Right For Sub Pages:<span>*</span></label>
              <input type="radio" name="shown_in_top" id="shown_in_top" value="1" checked="checked"
                                <?php echo ((isset($details->shown_in_top) && $details->shown_in_top ==1)?'checked="checked"':'')?>/>
              &nbsp;Yes &nbsp;&nbsp;
              <input type="radio" name="shown_in_top" id="shown_in_top_1" value="0" <?php echo ((isset($details->shown_in_top) && $details->shown_in_top ==0)?'checked="checked"':'')?> />
              &nbsp;No &nbsp;&nbsp; </div>
              <div class="single-column">
              <label class="question-label">Show in Footer:<span>*</span></label>
              <input type="radio" name="shown_in_footer" id="shown_in_footer" value="1" checked="checked"
                                <?php echo ((isset($details->shown_in_footer) && $details->shown_in_footer ==1)?'checked="checked"':'')?>/>
              &nbsp;Yes &nbsp;&nbsp;
              <input type="radio" name="shown_in_footer" id="shown_in_footer_1" value="0" <?php echo ((isset($details->shown_in_footer) && $details->shown_in_footer ==0)?'checked="checked"':'')?> />
              &nbsp;No &nbsp;&nbsp; </div>

            <div class="single-column" >
              <label class="question-label">Position </label>
              <input type="text" name="display_order" id="display_order" value="<?php if(isset($details->display_order)){echo $details->display_order;}?>" class="inputinpt" />
            </div>


<div class="single-column">
    <label class="question-label">Content</label>
  <?php
                        if(!empty($details->content)){
                            $cont_txt1 = outputEscapeString($details->content);
                        }
                        else{
                            $cont_txt1 = "";
                        }?>
  <textarea id="content" name="content"  class="editor"><?php echo $cont_txt1;?></textarea>
</div>


              
              
              
              
        <?php  if($details->id==1){  ?>
        <div class="single-column">
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
        <?php } ?>

                   
                   
                   
                   
            <div class="single-column" >
              <label class="question-label">Status:<span>*</span></label>
              <input type="radio" name="is_active" id="is_active" value="1"
                                <?php echo ((isset($details->is_active) && $details->is_active ==1)?'checked="checked"':'')?>/>
              &nbsp;Active &nbsp;&nbsp;
              <input type="radio" name="is_active" id="is_active_1" value="0" <?php echo ((isset($details->is_active) && $details->is_active ==0)?'checked="checked"':'')?> />
              &nbsp;Inactive &nbsp;&nbsp; </div>

            <!--seo panel -->
            <div class="seopan">
              <h2><a href="javascript:void(0);" onclick="javascript:showseopanel('droplistseo');" class="expandable">SEO</a></h2>
              <div class="droplists" id="droplistseo">
                <table width="512" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="135" align="left" valign="top">Meta Title:</td>
                    <td width="349" align="left" valign="top"><input name="meta_title" id="meta_title" type="text" value="<?php if(isset($details->meta_title)){echo $details->meta_title;}?>" class="titlefiled" onkeyup="checkcharcount('meta_title','count1','bar1',72);"/>
                      <div id="barbox1">
                        <div id="bar1"></div>
                      </div>
                      <div id="count1">72</div>
                      <p class="chartxt"> Character Limit</p>
                      <div class="showhide1" style="display:none;">
                        <div class="seoimgdiv" style="top:57px;"> <a href="#" class="cross close"><img src="<?php echo base_url("public/images/cross-butt.jpg");?>" alt="" /></a>
                          <h2>Meta Title</h2>
                          <p> - Page titles should be descriptive and concise<br />
                            - Avoid keyword stuffing<br />
                            - Avoid repeated or boilerplate titles<br />
                            - Brand your titles, but concisely <br />
                          </p>
                        </div>
                      </div></td>
                    <td width="28" align="right" valign="top"><a href="javaScript:void(0);" onmouseover="showdiv(1)" onmouseout="hidediv(1);" class="newshow_hide"><img src="<?php echo site_url("public/images/q-icon.jpg");?>" alt="" width="22" height="22" /></a></td>
                  </tr>
                  <tr style="display:none;">
                    <td align="left" valign="top">Meta Keyword:</td>
                    <td align="left" valign="top"><textarea name="meta_keyword" id="meta_keyword" class="description"><?php if(isset($details->meta_keyword)){echo html_entity_decode(stripslashes($details->meta_keyword), ENT_QUOTES,'UTF-8');}?>
</textarea>
                      <div id="barbox2">
                        <div id="bar2"></div>
                      </div>
                      <div id="count2">200</div>
                      <p class="chartxt" style="float:left;">Character Limit</p>
                      <div class="showhide2" style="display:none;">
                        <div class="seoimgdiv" style="top:107px;"> <a href="#" class="cross close"><img src="<?php echo site_url("public/images/cross-butt.jpg");?>" alt="" /></a>
                          <h2>SEO Heading</h2>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                        </div>
                      </div></td>
                    <td align="right" valign="top"><a href="javaScript:void(0);" onmouseover="showdiv(2)" onmouseout="hidediv(2);" class="newshow_hide"><img src="<?php echo site_url("public/images/q-icon.jpg");?>" alt="" width="22" height="22" /></a></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">Meta Description:</td>
                    <td align="left" valign="top"><textarea name="meta_desc" id="meta_desc" class="description" onkeyup="checkcharcount('meta_desc','count3','bar3',200);"><?php if(isset($details->meta_description)){echo html_entity_decode(stripslashes($details->meta_description), ENT_QUOTES,'UTF-8');}?>
</textarea>
                      <div id="barbox3">
                        <div id="bar3"></div>
                      </div>
                      <div id="count3">200</div>
                      <p class="chartxt" style="float:left;">Character Limit</p>
                      <div class="showhide3" style="display:none;">
                        <div class="seoimgdiv" style="top:107px;"> <a href="#" class="cross close"><img src="<?php echo site_url("public/images/cross-butt.jpg");?>" alt="" /></a>
                          <h2>Meta Description</h2>
                          <p> - This will only be shown in search results if the search engine can not come up with a better description.<br />
                            - Differentiate the descriptions for different pages. Identical or similar descriptions on every page of a site aren't helpful when individual pages appear in the web results.<br />
                            - Use quality descriptions.<br />
                          </p>
                        </div>
                      </div></td>
                    <td align="right" valign="top"><a href="javaScript:void(0);" onmouseover="showdiv(3)" onmouseout="hidediv(3);" class="newshow_hide"><img src="<?php echo site_url("public/images/q-icon.jpg");?>" alt="" width="22" height="22" /></a></td>
                  </tr>
                </table>
                <?php echo form_hidden("sbmt","1");?> </div>
            </div>
            <!--seo panel -->
            <div class="bottonserright" style="padding-bottom:20px;"> <a href="javascript:void(0);" title="Delete" onClick="rowdelete('<?php echo $details->id; ?>','cms_pages');" class="web-red-btn" <?php if(isset($details->id) && $details->id >0){}else{echo 'style="display:none;"';}?>> <span>Delete</span> </a> <a href="javascript:void(0);" class="web-red-btn" onClick="form_submit();"><span>Save</span></a> <?php echo form_close();?> </div>
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
<script type="text/javascript">

	var editor, html = '';
	if (editor ){
   	editor.destroy();
	editor = null;
	}
    CKEDITOR.replace( 'content' ,{
	width : '95%',
	//contentsCss : '<?php echo site_url("public/kaizen/css/style_ck.css");?>',
	filebrowserBrowseUrl : '<?php echo site_url("public/ckfinder/ckfinder.html");?>',
	filebrowserUploadUrl : '<?php echo site_url("public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files");?>',
	filebrowserImageUploadUrl : '<?php echo site_url("public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images");?>',
	filebrowserFlashUploadUrl : '<?php echo site_url("public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash");?>'
});

</script>

 <script type="text/javascript">

function showdiv(val){
    if(val == '1'){
        $('#divurl').show();
    }else{
        $('#divurl').hide();
    }
}

function showseopanel(){
	$('.droplists').slideToggle('slow');
}
function showdiv(id){
	$('.showhide'+id).fadeIn('slow');
}
function hidediv(id){
	$('.showhide'+id).fadeOut('slow');
}
function checkcharcount(id,id2,id3,id4){
	var box=$("#"+id).val();
	var main = box.length *100;
	var value= (main / id4);
	var count= id4 - box.length;
	if(box.length <= id4){
		$('#'+id2).html(count);
		$('#'+id3).animate({"width": value+'%',}, 1);
	}
	else{
		$(this).attr('maxlength',id4);
		$('#'+id).maxlength({max:id4});
	}
	return true;
}

checkcharcount('meta_title','count1','bar1',72);
checkcharcount('meta_keyword','count2','bar2',200);
checkcharcount('meta_desc','count3','bar3',200);
</script>
<script type="text/javascript">
     $(function() {

					$("#MoveRight,#MoveLeft").click(function(event) {
						var id = $(event.target).attr("id");
						var selectFrom = id == "MoveRight" ? "#cat_id" : "#selected_id";
						var moveTo = id == "MoveRight" ? "#selected_id" : "#cat_id";

						var selectedItems = $(selectFrom + " :selected").toArray();
						$(moveTo).append(selectedItems);

					});
					});
</script>
