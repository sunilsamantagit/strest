<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
<style>
div.dataTables_length {
    padding-left: 2em;
    }
    div.dataTables_length,
    div.dataTables_filter {
        padding-top: 0.55em;
    }
    
    .page_title .rt-bg-block{
	background: none;
    border: 0;
    box-shadow: none;
	float: right;
}
.page_title .rt-column{
	padding: 0;
    background: none;
}
.page_title .rt-bg-block br{ display:none;}
.page_title .new-survey-btn-blue{
	background: #169bd5;
    color: #fff;
    width: auto;
}
.page_title .new-survey-btn-blue span{    
	color: #fff;
    background: none;
    padding: 10px 30px;
    font-size: 12px;
}
.lumb_sumb_table{   
	display: flex;
    flex-wrap: wrap;
}
.lumb_sumb_table .mid-block{ width:100%;}
.action_btn{ text-align:center !important;}
.action_btn a{ display:inline-block;color: #169bd5;position:relative; padding: 0 5px;}
.action_btn a:not(:last-child):after{ content:"|"; position:absolute; right:-6px; color:#333;}
.lumb_sumb_table table thead tr th{ background: #169bd5; border: 1px solid #333 !important;}
.lumb_sumb_table table tbody tr td{ border: 1px solid #333 !important;}
.lumb_sumb_table table.dataTable{ border-collapse: collapse}
</style>

<script type='text/javascript' src='<?php echo base_url(); ?>public/js/jquery.dataTables.min.js'></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery.dataTables.min.css" />
<div class="rightDiv">
	<div class="right-outer">
            <div class="page_title">
		<h3 class="title">Takeoff Line Entries List</h3>
               <?php $this->load->view($right); ?>
            </div>
                <a class="button" href="#popup1">Let me Pop up</a>
        <div class="clear"></div>
        
        <!--Search area end-->
        <div class="application-table-area lumb_sumb_table">
        	<div class="mid-block">
            	<div class="members-table member-group">
						<?php
		if($this->session->userdata('ERROR_MSG')==TRUE){
			echo '<div class="notific_error" id="myErrMessage">
					<h2 align="center" style="color:#fff;">'.$this->session->userdata('ERROR_MSG').'</h1></div>';
			$this->session->unset_userdata('ERROR_MSG');
		}
		if($this->session->userdata('SUCC_MSG')==TRUE){
			echo '<div class="notific_suc" id="mySuccMessage"><h2 align="center" style="color:#000;">'.$this->session->userdata('SUCC_MSG').'</h1></div>';
			$this->session->unset_userdata('SUCC_MSG');
		}
		?>
           <div ><h2 align="center" style="color:#31B12c;"  id="status_mesage"></h2></div>
                    <table cellspacing="0" cellpadding="0" border="0" id="pagi">
						<thead>
                        <tr>
                            <th>T<span class=""></span></th>
                            <th>QTY<span class=""></span></th>
                            <th>Material<span class=""></span></th>
                            <th>Spec<span class=""></span></th>
                            <th>Width (FT)<span class=""></span></th>
                            <th>Length (FT)<span class=""></span></th>
                            <th>WT (LB)<span class=""></span></th>
                            <th>MHS<span class=""></span></th>
			                <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
        							<?php
        			  if(empty($records)){
        				  ?>
        							<tr>
                                                                    <th align="center" valign="top" colspan="9">There are no Records.</th>
        							</tr>
        							<?php
        			  }
        			  else{
        			  $i=0;
        			  foreach($records as $row){
        				  $i++;				  
        			  ?>
        					<tr>
                            
                               
                             <td><?php if(!empty($row->type)) echo $row->type; ?></td>		
                             <td><?php if(!empty($row->qty)) echo $row->qty; ?></td>		
                             <td><?php if(!empty($row->material)) echo $row->material; ?></td>		
                             <td><?php if(!empty($row->spec)) echo $row->spec; ?></td>		
                             <td><?php if(!empty($row->width)) echo $row->width; ?></td>		
                             <td><?php if(!empty($row->length)) echo $row->length; ?></td>		
                             <td><?php if(!empty($row->weight)) echo $row->weight; ?></td>		
                             <td><?php if(!empty($row->mhs)) echo $row->mhs; ?></td>
                             
                	    <td class="action_btn">
                	     <a class="" href="<?php echo site_url("kaizen/takeoffline/doedit/".$row->id);?>"><span>Edit</span></a> <a href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','takeoffline');" class=""><span>Delete</span></a>
                                </a>
                              </td>		</tr>
        									
        							<?php
        			  }
        			  }
        			  ?>        
                        
						
                    </tbody></table>
            	</div>
                 <?php $this->load->view($footer); ?>
          </div>
             
            
        
    </div>
</div>

<!--right column end-->
<div class="clear"></div>
</div>
/*-----------------model--------------------*/
<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Here i am</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
          <div class="right-outer">
        <h3 class="title">Add Line Entry</h3>
        <div class="clear"></div>
    <div class="padbot40">

      
      <div class="mid-content web-cont-mid" style="border-radius: 25px;background-color: lightgray;">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <form action="http://localhost/strest/kaizen/takeoffline/addedit/0" name="cont" id="cont" enctype="multipart/form-data" method="post" accept-charset="utf-8">
               <input type="hidden" name="csrftestname" value="c51b0af7e946971250edd9afbafe7ec0">

<input type="hidden" name="takeoffline_id" value="0">

            <div class="single-column">
              <label class="question-label">Resource *</label>
              <select id="resource" name="resource" class="inputinpt validate[required]">
                <option value="Select Option">Select Option</option>
                <option value="ShopFab">ShopFab</option>
                <option value="SubFab">SubFab</option>
                <option value="Purchase">Purchase</option>                
              </select>
            </div>

            <div class="single-column">
              <label class="question-label">Entry Type *</label>
              <select id="entry_type" name="entry_type" class="inputinpt validate[required]">
                <option value="Select Option">Select Option</option>
                <option value="MainMumbr">MainMumbr</option>
                <option value="Lumpsum">Lumpsum</option>
                <option value="Detail">Detail</option>               
                <option value="Text">Text</option>
              </select>
            </div>

  <div id="mainMumbr" style="display: show;width: 100%;background-color: darkgray; padding: 15px;">
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
              <select id="size_id" name="size_id" class="inputinpt validate[required]">
              </select>
        </div>

        <div class="single-column">
              <label class="question-label">Width</label>
              <input type="text" name="width" id="width" value="<?php if(isset($details->width)){echo $details->width;}?>" class="inputinpt">
        </div>

        <div class="single-column">
              <label class="question-label">Lens</label>
              <input type="text" name="length" id="length" value="<?php if(isset($details->length)){echo $details->length;}?>" class="inputinpt">
        </div>
        <div class="half-sec">

        <div class="single-column half-colum">
              <label class="nameing-sec">Add ConnMat etc</label>
              <input type="text" name="connmat" id="connmat" value="<?php if(isset($details->connmat)){echo $details->connmat;}?>" class="input-value">
              <p class="half-sec-per">%</p>
        </div>

        <div class="single-column half-colum">
              <label class="nameing-sec">Weight</label>
              <input type="text" name="weight" id="weight" value="<?php if(isset($details->weight)){echo $details->weight;}?>" class="input-value">
               <p class="half-sec-per">lbs/each</p>
              
        </div>

        <div class="single-column half-colum">
              <label class="nameing-sec">Field -- Bolts</label>
              <input type="text" name="field_bolts" id="field_bolts" value="<?php if(isset($details->field_bolts)){echo $details->field_bolts;}?>" class="input-value">
        </div>

        <div class="single-column half-colum">
              <label class="nameing-sec">Welds</label>
              <input type="text" name="welds" id="welds" value="<?php if(isset($details->welds)){echo $details->welds;}?>" class="input-value">
              <p class="half-sec-per">in/each</p>
             
        </div>

        <div class="single-column half-colum">
              <label class="nameing-sec">MH/T Range</label>
              <input type="text" name="mh_t_range" id="mh_t_range" value="<?php if(isset($details->mh_t_range)){echo $details->mh_t_range;}?>" class="input-value">
        </div>

        <div class="single-column half-colum">
              <label class="nameing-sec">=</label>
              <input type="text" name="mh_total_range" id="mh_total_range" value="<?php if(isset($details->mh_t_range_total)){echo $details->mh_t_range_total;}?>" class="input-value">
              <p class="half-sec-per">MH/T Range</p>
            
        </div>
         </div>
        <div class="single-column">
              <label class="question-label">SF4&gt;Auxserv: Shop</label>
              <select id="auxserv_shop" name="auxserv_shop" class="inputinpt validate[required]">
                <option value="Select Option">Select Option</option>
                <option value="Standard Primer">Standard Primer</option>
                <option value="Not Required">Not Required</option>                 
              </select>
        </div>

        <div class="single-column">
              <label class="question-label qutity-sty">Quantity</label>
              <input type="text" name="quantity" id="quantity" value="<?php if(isset($details->quantity)){echo $details->quantity;}?>" class="inputinpt input-sty-qtyty">
              <p class="per-qutaty">MH/T Range</p>
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
              <input type="text" name="description" id="description" value="<?php if(isset($details->l_description)){echo $details->l_description;}?>" class="inputinpt">
            </div>

            <div class="single-column">
              <label class="question-label">Amount</label>
              $<input type="text" name="amount" id="amount" value="<?php if(isset($details->amount)){echo $details->amount;}?>" class="inputinpt">MHs
            </div>

  </div>

  <div id="text" style="display: none;width: 100%;background-color: darkgray;">              
            <b>Text</b>

              <div class="single-column">
              <label class="question-label">Description</label>
              <textarea id="text_description" name="text_description" value="" class="inputinpt"></textarea>
            </div>

  </div>

        <div class="single-column eract-marg-top">
              <label class="question-label">Erect</label>
              <select id="erect" name="erect" class="inputinpt">
                                <option value="">Select Option</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                              </select>
            </div>          



<div class="bottonserright" style="padding-bottom:20px;"> 

<a href="javascript:void(0);" title="Save" onclick="form_submit();" );"="" class="web-red-btn save" <span="">Save</a>


<a href="http://localhost/strest//kaizen/material" title="Cancel" class="web-red-btn cancil" <span="">Cancel</a>

 
<!--
        <div class="single-column" >
              <label class="question-label">Status:<span>*</span></label>
              <input type="radio" name="is_active" id="is_active" value="1" 
                                checked="checked"/>
              &nbsp;Active &nbsp;&nbsp;
              <input type="radio" name="is_active" id="is_active_1" value="0"  />
              &nbsp;Inactive &nbsp;&nbsp; </div>
          </div>     
        </div>-->


        <div class="bodybottom"> </div>
      </div>
    </form></div>    
  </div>
  <div class="clear"></div>
  <p class="footerCreate"> © <!--? echo date('Y');?--> STREST | Developed by <a href="http://2webdesign.com/">2webdesign</a></p>
<script>    
        jQuery(document).ready(function(){
                setTimeout(function(){ 
                    var docum = $(document).height()-60;
                    $('.leftDiv').height(docum);    
                  $('.rightDiv').height(docum); return false;}, 350);

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

$("#entry_type").change(function(){
    if($("#entry_type").val()=="MainMumbr")
    {
      $("#lumpsum").hide();
      $("#text").hide();
      $("#mainMumbr").show();
    }
    if($("#entry_type").val()=="Lumpsum")
    {
      $("#text").hide();
      $("#mainMumbr").hide();
      $("#lumpsum").show();      
    }
    if($("#entry_type").val()=="Text")
    {
      $("#lumpsum").hide();
      $("#mainMumbr").hide();
      $("#text").show();
    }
  });
$("#cont").validationEngine('attach', { promptPosition: "inline" });

});
function form_submit(){
    $('#cont').submit();
}
</script> </div></div></div>
        </div>
    </div>
</div>
/*--------------model-end--------------------*/
<style>
.clear{ clear: both; }
 .box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
 font-size: 14px;
    padding: 10px;
    float: right;
    color: #fff;
    background: #000;
    border: 2px solid #000;
    border-radius: 20px;
    text-decoration: none;
    cursor: pointer;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position:absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background:transparent;
  visibility: hidden;
  opacity: 0;

}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 70%;
  position: relative;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
      position: absolute;
    top: -10px;
    right: 0px;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
    height: 35px;
    border-radius: 50%;
    padding-top: 2px;
    width: 35px;
    border: #000 solid 1px;
}
.popup .close:hover {
  color: #666;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}

</style>
<script type="text/javascript">
    $(document).ready(function() {
    $('#pagi').dataTable( {
      "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
      "order": [[ 2, "asc" ]],
      "stateSave": true,
    "aoColumns": [
          null,
	  null,  
	  null,  
	  null,  
	  null,  
	  null,  
	  null,  
	  null,  
      { "bSortable": false }
  
    ],
    "fnDrawCallback": function () {
        var aTag = $("#pagi_wrapper");           
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }
    } );
	
	$("#mySuccMessage").show().delay(3000).fadeOut();
	$("#myErrMessage").show().delay(3000).fadeOut();
} );
</script>