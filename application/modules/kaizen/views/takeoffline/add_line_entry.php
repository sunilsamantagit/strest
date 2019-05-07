<link rel="stylesheet" href="<?php echo site_url("public/validator/css/validationEngine.jquery.css"); ?>" type="text/css"/>
<script src="<?php echo site_url("public/validator/js/languages/jquery.validationEngine-en.js"); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url("public/validator/js/jquery.validationEngine.js"); ?>" type="text/javascript" charset="utf-8"></script>
<script>
     function closediv(){
          $(document.body).removeClass('modal_open');
        $('#close_div').remove();
        
    }
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
</script>
<div class="popup" id="close_div">
        <h2>Here i am</h2>
        <a class="close" href="#" onclick="closediv();" >&times;</a>
        <div class="content">
          <div class="right-outer">
        <h3 class="title">Add Line Entry</h3>
        <div class="clear"></div>
    <div class="padbot40">

      
      <div class="mid-content web-cont-mid" style="border-radius: 25px;background-color: lightgray;">
        <div id="webcont-form">
          <div id="member-form" class="midarea">
            <form action="<?php echo site_url('kaizen/takeoffline/add_new_entry'); ?>" name="cont" id="cont" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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



<input type="submit" name="submit" value="Add / Update">
<input type="submit" name="submit" onclick="closediv();" value="Cancel">
    </form></div>    
  </div>
  <div class="clear"></div>
  
 </div></div></div>
        </div>
    </div>
