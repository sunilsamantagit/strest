<?php $this->load->view($header); ?>
<?php echo $this->load->view($left); ?>
<?php
echo link_tag("public/validator/css/validationEngine.jquery.css")."\n";
?>
<script type="text/javascript" src="<?php echo site_url("public/ckeditor/ckeditor.js");?>"></script>
<script src="<?php echo base_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>
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
      	'width'		: 900,
      	'height'	: 600,
      	'type'		: 'iframe',
              'autoScale'    	: false
          });
    });
	 function closedivimage(div_id){
	 	$('#'+div_id).remove();
	 }
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cont").validationEngine('attach', { promptPosition: "inline" });
});

function form_submit()
{
	$('#cont').submit();
	return true;
}
</script>
<script>
function addAnotherFile(url,predifine_link,sequence,social_settings_id){
	var count = $('#count').val();
	var count_val = parseInt(count)+1;
	$('#count').val(count_val);
	$.ajax({
			  type: "POST",
        async: false,
				url : '<?php echo site_url("kaizen/settings/add_file/");?>',
				data: {count:count,url:url,predifine_link:predifine_link,social_settings_id:social_settings_id,sequence:sequence},
				dataType : "html",
				success: function(data)
				{
					if(data)
					{
							$("#socialdiv").prepend(data);
					}
					else
					{
						//alert("Sorry, Some problem is there. Please try again.");
					}
				},
				error : function()
				{
					alert("Sorry, The requested property could not be found.");
				}
			});
}
</script>
<div class="rightDiv">
	<div class="right-outer">
    	<div class="clear"></div>
      <h3 class="title">Website Setting</h3><div class="bread-crumb"><ul><li>Edit Setting Details</li></ul></div>

      <?php
		  $attributes = array('name' => 'cont', 'id' => 'cont');
		  echo form_open_multipart('kaizen/settings/save',$attributes);
		  ?>
      <?php
		if($this->session->userdata('ERROR_MSG')==TRUE){
			echo '<div class="notific_error">
					<h2 align="center" style="color: #009900;">'.$this->session->userdata('ERROR_MSG').'</h1></div>';
			$this->session->unset_userdata('ERROR_MSG');
		}
		if($this->session->userdata('SUCC_MSG')==TRUE){
			echo '<div class="notific_suc"><h2 align="center" style="color: #009900;">'.$this->session->userdata('SUCC_MSG').'</h1></div>';
			$this->session->unset_userdata('SUCC_MSG');
		}
		?>
        <div class="clear"></div>

      <?php echo validation_errors('<div class="notific_error">', '</div>'); ?>
        <div class="padbot40">
            <div id="webcont-form">
        		<div id="member-form" class="midarea">
        	<div class="mid-block">
                    <div class="mid-content noBotPadd">
                    <div class="single-column">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Site Name: *</label>
                                <input type="text" name="site_name" id="site_name" value="<?php if(isset($details->site_name)){echo $details->site_name;}?>" class="validate[required]" />
                            </li>
                        </ul>
                    </div>

                    <div class="single-column">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Site URL: *</label>
                                <input type="text" name="url" id="url" value="<?php if(isset($details->url)){echo $details->url;}?>" />
                            </li>
                        </ul>
                    </div>

                    <div class="single-column">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Copy Right: *</label>
                                <input type="text" name="copy_right" id="copy_right" value="<?php if(isset($details->copy_right)){echo $details->copy_right;}?>" class="validate[required]" />
                            </li>
                        </ul>
                    </div>

                         <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Password: </label>
                                <input type="text" name="password" id="password" value="<?php if(isset($user_details[0]->pwd_hint)){echo $user_details[0]->pwd_hint;}?>" class="validate[required]"/>
                            </li>
                        </ul>
                    </div>

                    <div class="single-column" style="display:none;">
                    <ul>
                        <li class="fullWidth">
                            <label class="labelname">Header Phone number:* </label>
                            <input type="text" name="header_phone" id="header_phone" value="<?php if(isset($details->header_phone)){echo $details->header_phone;}?>"/>
                        </li>
                    </ul>
                </div>

                    <div class="single-column" style="display:none;">
                    <ul>
                        <li class="fullWidth">
                            <label class="labelname">Header email:* </label>
                            <input type="text" name="header_email" id="header_email" value="<?php if(isset($details->header_email)){echo $details->header_email;}?>" class="validate[required,custom[email]]"/>
                        </li>
                    </ul>
                </div>

                        <div class="single-column">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname" style="width: 120px;">Contact email:*</label>
                                <input type="text" name="contact_email" id="contact_email" value="<?php if(isset($details->contact_email)){echo $details->contact_email;}?>" class="validate[required,custom[email]]"/>
                            </li>
                        </ul>
                    </div>

                    <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Forgot password email:* </label>
                                <input type="text" name="forgot_password_email" id="forgot_password_email" value="<?php if(isset($details->forgot_password_email)){echo $details->forgot_password_email;}?>" class="validate[required,custom[email]]"/>
                            </li>
                        </ul>
                    </div>

                    <div class="single-column" style="display:none;">
                        <label class="labelname">Header logo <span class="sizetxt">- Size Requirement:  190 X 147 px ( W x H )</span></label>
                        <input id="header_logo" name="header_logo" value="<?php if(!empty($details->header_logo)) echo $details->header_logo; ?>" type="text">
                        <a href="<? echo front_base_url().'filemanager/dialog.php?type=1&field_id=header_logo&relative_url=1'?>?>" class="btn iframe-btn" type="button">Open File Manager</a>
                        <div id="banner_photodiv">
                        <?php
                        if(!empty($details->header_logo)){
                          $head_img=$details->header_logo;
                        }else{
                          $head_img=base_url('public/images.png');
                        }?>
                        <img id="img_sceen" src="<?php echo $head_img;?>" style="background:white;" width="150" height="100"/>
                      </div>
                    </div>

                    <div class="single-column" style="display:none;">
                        <label class="labelname">Footer logo <span class="sizetxt">- Size Requirement:  190 X 147 px ( W x H )</span></label>
                        <input id="footer_logo" name="footer_logo" value="<?php if(!empty($details->footer_logo)) echo $details->footer_logo; ?>" type="text">
                        <a href="<? echo front_base_url().'filemanager/dialog.php?type=1&field_id=footer_logo&relative_url=1'?>?>" class="btn iframe-btn" type="button">Open File Manager</a>
                        <div id="banner_photodiv">
                        <?php
                        if(!empty($details->footer_logo)){
                          $head_img=$details->footer_logo;
                        }else{
                          $head_img=base_url('public/images.png');
                        }?>
                        <img id="img_sceen" src="<?php echo $head_img;?>" style="background:white;" width="150" height="100"/>
                      </div>
                    </div>

                    <div class="single-column" style="display:none;">
                      <ul>
                          <li class="fullWidth">
                        <label class="question-label">Address: </label>
                        <input type="text" name="address" id="address" value="<?php if(isset($details->address)){echo $details->address;}?>"/>
                      </li>
                  </ul>
                </div><!--/.single-column-->

                    <div class="single-column" style="display:none;">
                    <ul>
                        <li class="fullWidth">
                            <label class="labelname">Latitude: </label>
                            <input type="text" name="latitude" id="latitude" value="<?php if(isset($details->latitude)){echo $details->latitude;}?>"/>
                        </li>
                    </ul>
                </div>

                <div class="single-column" style="display:none;">
                <ul>
                    <li class="fullWidth">
                        <label class="labelname">Longitude: </label>
                        <input type="text" name="longitude" id="longitude" value="<?php if(isset($details->longitude)){echo $details->longitude;}?>"/>
                    </li>
                </ul>
            </div>

                
                
                
                
                
                
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Header Button Text:</label>
                                <input type="text" name="header_button_text" id="header_button_text" value="<?php if(isset($details->header_button_text)){echo $details->header_button_text;}?>" class="validate[optional]" />
                            </li>
                        </ul>
                    </div>
                
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Header Button URL: </label>
                                <input type="text" name="header_button_url" id="header_button_url" value="<?php if(isset($details->header_button_url)){echo $details->header_button_url;}?>" class="validate[optional,custom[url]]" />
                            </li>
                        </ul>
                    </div>
                
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Is Show Header Button?: </label>
                                <input type="checkbox" name="is_show_header" id="is_show_header" value="1" <?php if(!empty($details->is_show_header)){echo 'checked';}?> class="validate[optional]" />
                            </li>
                        </ul>
                    </div>
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Second Header Button Text:</label>
                                <input type="text" name="header_button_text2" id="header_button_text2" value="<?php if(isset($details->header_button_text2)){echo $details->header_button_text2;}?>" class="validate[optional]" />
                            </li>
                        </ul>
                    </div>
                
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Second Header Button URL: </label>
                                <input type="text" name="header_button_url2" id="header_button_url2" value="<?php if(isset($details->header_button_url2)){echo $details->header_button_url2;}?>" class="validate[optional,custom[url]]" />
                            </li>
                        </ul>
                    </div>
                
                
                
                
                
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Partner Link: </label>
                                <input type="text" name="partner_link" id="partner_link" value="<?php if(isset($details->partner_link)){echo $details->partner_link;}?>" class="validate[optional,custom[url]]" />
                            </li>
                        </ul>
                    </div>
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Sponsor Link: </label>
                                <input type="text" name="sponsor_link" id="sponsor_link" value="<?php if(isset($details->sponsor_link)){echo $details->sponsor_link;}?>" class="validate[optional,custom[url]]" />
                            </li>
                        </ul>
                    </div>
                
                
                
                
                <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Is Show Second Header Button?: </label>
                                <input type="checkbox" name="is_show_header2" id="is_show_header2" value="1" <?php if(!empty($details->is_show_header2)){echo 'checked';}?> class="validate[optional]" />
                            </li>
                        </ul>
                    </div>
                
                
                
                 <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Edition:</label>
                                <input type="text" name="edition" id="edition" value="<?php if(isset($details->edition)){echo $details->edition;}?>" class="validate[optional]" />
                            </li>
                        </ul>
                    </div>
                
                 <div class="single-column" style="display:none;">
                        <ul>
                            <li class="fullWidth">
                                <label class="labelname">Last Update:</label>
                                <input type="text" name="last_update" id="last_update" value="<?php if(isset($details->last_update)){echo date("m/d/Y",strtotime($details->last_update));}?>" class="onlydate validate[optional]" />
                            </li>
                        </ul>
                    </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                    <!--Google Analytics panel -->
                    <div class="seopan">
                        <h2><a href="javascript:showseopanel('droplistseo');" class="expandable">Google Analytics</a></h2>
                        <div class="droplists" id="droplistseo" style="display:none;">
                            <div class="single-column">
                                <ul>
                                    <li class="fullWidth">
                                        <label class="labelname">Google Site Verification:</label>
                                        <input name="site_verification" id="site_verification" type="text" value="<?php if(isset($details->site_verification)){echo $details->site_verification;}?>" class="titlefiled"  />
                                    </li>
                                </ul>
                            </div>

                            <div class="single-column">
                                <ul>
                                    <li class="fullWidth">
                                        <label class="labelname">Google Analytics Code:</label>
                                        <textarea name="analytics_code" id="analytics_code" class="description"><?php if(isset($details->analytics_code)){echo html_entity_decode(stripslashes($details->analytics_code), ENT_QUOTES,'UTF-8');}?></textarea>
                                    </li>
                                </ul>
                            </div>

                            <div class="single-column">
                                <ul>
                                    <li class="fullWidth">
                                        <label class="labelname">Profile ID:</label>
                                        <input name="profile_id" id="profile_id" type="text" value="<?php if(isset($details->profile_id)){echo $details->profile_id;}?>" class="titlefiled"  />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="seopan">
	<h2><a href="javascript:void(0);" onclick="javascript:showseopanel('droplistseopanel');" class="expandable">SEO</a></h2>
        <div class="droplists" id="droplistseopanel" style="display:none;">
                            <div class="single-column" >
                                <label class="question-label">Meta Title</label>
                                <input name="meta_title" id="meta_title" type="text" value="<?php if(isset($details->meta_title)){echo $details->meta_title;}?>" class="titlefiled" />
                            </div>
                            <div class="single-column" >
                                <label class="question-label">Meta Keyword</label>
                                <textarea name="meta_keyword" id="meta_keyword" class="description"><?php if(isset($details->meta_keyword)){echo html_entity_decode(stripslashes($details->meta_keyword), ENT_QUOTES,'UTF-8');}?>
</textarea>
                            </div>
                            <div class="single-column" >
                                <label class="question-label">Meta Description</label>
                                <textarea name="meta_desc" id="meta_desc" class="description" ><?php if(isset($details->meta_description)){echo html_entity_decode(stripslashes($details->meta_description), ENT_QUOTES,'UTF-8');}?>
</textarea>
                            </div>

		<?php echo form_hidden("sbmt","1");?> </div>
</div>
                    <div class="seopan" style="display:none;">
                        <h2><a href="javascript:showseopanel('droplistsocialmedia');" class="expandable">Social Media</a></h2>
                        <div class="droplists" id="droplistsocialmedia" style="display:none;">
                            <a onclick="addAnotherFile('','')" href="javascript:void(0);" class="temp-btn" style="width:15%"><img style="float: left;margin-top: 3px;margin-left: 10px;width: 22px;" src="<?php echo base_url(); ?>public/images/plus-icon.png">Add Social Media</a>

                            <input type="hidden" name="count" id="count" value="1" />
                            <div id="socialdiv">
                            </div>
                        </div>
                    </div>
                        <?php echo form_hidden("sbmt","1");?> </div>

                    <!--Google Analytics panel -->
        </div>
        <div class="rt-block">
        <div class="rt-bg-block">
            <div class="rt-column search-side">
                <br>
                <a class="temp-btn " href="javascript:void(0);" onclick="form_submit();" >Update</a>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <?php echo $this->load->view($footer); ?>
          </div>
             </div>
     <!--<a href="javascript:void(0);" class="darkgreybtn" onclick="form_submit();"><span>UPDATE</span></a> -->
      <input type="hidden" name="save_draft" id="save_draft" value="0" />
      <?php echo form_close();?>
</div>

<script type="text/javascript">

function showdiv(id){
	$('.showhide'+id).fadeIn('slow');
}

function hidediv(id){
	$('.showhide'+id).fadeOut('slow');
}


function confirmdel(id,field){
	if(confirm("Are you sure want to delete image?")){
		window.location.href="<?php echo site_url("kaizen/settings/dodeleteimg/");?>?deleteid="+id+'&field='+field;
	}
	else{
		return false;
	}
}
<?php if(!empty($social_settings_arr)){ ?>
    <?php foreach($social_settings_arr as $ssa){ ?>
            addAnotherFile('<?php echo $ssa->link ; ?>','<?php echo $ssa->social_menus_id ; ?>','<?php echo $ssa->sequence ; ?>','<?php echo $ssa->id ; ?>');
    <?php } ?>
<?php } ?>
</script>
<?php //$this->load->view($footer); ?>
