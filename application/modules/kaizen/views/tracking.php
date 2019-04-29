<?php
include_once(APPPATH.'libraries/class.Diff.php');

$old_value_str = $details[0]->old_value;
$old_value_arr = json_decode($old_value_str);
if(!empty($details[0]->new_value)){
	$new_value_str = $details[0]->new_value;
	$new_value_arr = json_decode($new_value_str);
}
$field_arr = json_decode($details[0]->field_arr);

 ?>
 <style>
 .diffDeleted div {
    border: 1px solid rgb(255,192,192);
    background: rgb(255,224,224);
}

.diffInserted div {
    border: 1px solid rgb(192,255,192);
    background: rgb(224,255,224);
}
.diffUnmodified{
  display:none;
}
.diff{
  width:100%;
  border-collapse: collapse;
}
.diff td,.diff th  {
    border-right-color: black;
    border-right-style: solid;
    border-right-width: 1px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    width: 50%;
}
.diff tr td:nth-child(2),.diff tr th:nth-child(2){
  border-right:none;
}
/*.maintable  {
    border: 1px solid black;
    	border-collapse: collapse;
}

.maintable th,.maintable td  {
  	border-collapse: collapse;
    border: 1px solid black;
}
td.diffDeleted  {
    	border-collapse: collapse;
  border-right:1px solid black;
  border-left:none;
  border-top:none;
  border-bottom:none;
 }*/
 </style>
  <?php if(!empty($details[0]->old_value)){
     $send_action = 'Edited';
 }else{
     $send_action = 'Added';
 }?>
 <h2 style="text-align:center"><?php echo $send_action; ?> by <?php echo $details[0]->update_by; ?> on <?php echo date("d M Y", strtotime($details[0]->created_date)); ?></h2>
 <div style="text-align:center;margin:10px 0px">
   <?
   //if($details[0]->update_by=='2webmin'){
     $where = array('id' => $details[0]->element_id);
     $element_detls = $this->model_common->select_row($details[0]->table_name,$where);

     if($details[0]->module_name=='cms_pages')
		 $urlvalue = base_url('/'.$element_detls[0]->page_link);
       // $urlvalue = base_url('/pages/'.$element_detls[0]->page_link);
     elseif($details[0]->module_name=='blog')
       $urlvalue = base_url('/news/details/'.$element_detls[0]->page_link);
     elseif($details[0]->module_name=='careers')
       $urlvalue = base_url('/careers/career_detail/'.$element_detls[0]->page_link);
     elseif($details[0]->module_name=='annual_highlight')
		 $urlvalue = base_url('/annual_highlights.html');
       // $urlvalue = base_url('/pages/annual_highlights.html');
     elseif($details[0]->module_name=='board')
		 $urlvalue = base_url('/board_of_directors.html');
       // $urlvalue = base_url('/pages/board_of_directors.html');
     elseif($details[0]->module_name=='beamline')
       $urlvalue = base_url('/beamlines.html');
     elseif($details[0]->module_name=='blog_category')
       $urlvalue = base_url('/news.html?category='.strtolower($element_detls[0]->title));
     else
       $urlvalue = '';

     if($urlvalue != ''){
       $pagelinkurl = "<a href='".$urlvalue."' target='_blank'>".$element_detls[0]->page_link."</a>";
       echo "Page Link :- ".$pagelinkurl;
     }
     //}
   ?>
</div>
 <?php //echo Diff::toTable(Diff::compare($string1,$string2));
 ?>
 <table style="width:auto;border-color:black;border-collapse:collapse" align="center" class="maintable" border="1px" >
  <tr >
    <th>Field Name</th>
    <td colspan="2">
    <table class="diff">
      <tbody><tr>
        <th >Old Value</th>
        <th >New Value</th>
      </tr>
    </tbody></table>
  </td>
    <!--<th >Current Value</th> -->

  </tr>
  <?php if(!empty($field_arr)){ ?>
  	<?php
		$i=0;

		foreach($field_arr as $fa){
		$i++;
			$field_name = $fa->field_name;
			$field_type = $fa->field_type;
			$relational_type = '';
			$relational_val = '';
			$relational_val_arr_s = array();
			if(!empty($field_type) && ($field_type == "relational")){
				$relational_type = $fa->relational_type;
			}
	?>
          <tr>
            <td ><?php echo $fa->title; ?></td>
            <? /*
            <td>
				<?php $relational_val_arr_s ='';
					 if(!empty($field_type) && ($field_type == "image") && !empty($fa->upload_path) && !empty($main_table_details[0]->$field_name)){
						 	//echo $fa->upload_path;
							//echo !empty($main_table_details[0]->$field_name)?$main_table_details[0]->$field_name:'';
							?>
                            <img style="width:50px;height:50px;" src="<?php echo $fa->upload_path.$main_table_details[0]->$field_name; ?>"  />
                            <?php
					 }else if(!empty($field_type) && ($field_type == "relational") && !empty($relational_type)){

							 $relational_val = $main_table_details[0]->$field_name;
                             $relational_table = $fa->relational_table;
							 if(!empty($relational_type) && ($relational_type == "multiselect") && !empty($relational_val)){

								 $relational_val_arr = explode(",",$relational_val);

								 foreach($relational_val_arr as $rvr){
										 $where = array(
											'id' => $rvr
										 );
										 $rel_details = $this->model_common->select_row($relational_table,$where);
										 if(!empty($rel_details[0]->title)){
											 $relational_val_arr_s[] = $rel_details[0]->title;
										 }

								 }
								 echo !empty($relational_val_arr_s)?outputEscapeString(implode(",",$relational_val_arr_s)):'';
                             }elseif(!empty($relational_type) && ($relational_type == "select") && !empty($relational_val)){
                                 $where = array(
											'id' => $relational_val
										 );
										 $rel_details = $this->model_common->select_row($relational_table,$where);
										 if(!empty($rel_details[0]->title)){
											 $relational_val_arr_s[] = $rel_details[0]->title;
										 }
                                   echo !empty($relational_val_arr_s)?outputEscapeString(implode(",",$relational_val_arr_s)):'';
                             }

					 }else{
							// echo !empty($main_table_details[0]->$field_name)?outputEscapeString($main_table_details[0]->$field_name):'';
							echo !empty($main_table_details[0]->$field_name)?outputEscapeString($main_table_details[0]->$field_name):'';
					 }
				?>
            </td> */?>


                	<?php
                  $relational_val_arr_s ='';
                  $oldvalue_withdiff = '';
                  $newvalue_withdiff = '';
    					 if(!empty($field_type) && ($field_type == "image") && !empty($fa->upload_path) && !empty($old_value_arr->$field_name)){
    						 	//echo $fa->upload_path;
    							//echo !empty($main_table_details[0]->$field_name)?$main_table_details[0]->$field_name:'';
    							?>
                                <img style="width:50px;height:50px;" src="<?php echo $fa->upload_path.$old_value_arr->$field_name; ?>"  />
                                <?php
    					 }else if(!empty($field_type) && ($field_type == "relational")){
    							 $relational_val = $old_value_arr->$field_name;
                                 $relational_table = $fa->relational_table;
    							 if(!empty($relational_type) && ($relational_type == "multiselect") && !empty($relational_val)){

    								 $relational_val_arr = explode(",",$relational_val);

    								 foreach($relational_val_arr as $rvr){
    										 $where = array(
    											'id' => $rvr
    										 );
    										 $rel_details = $this->model_common->select_row($relational_table,$where);
    										 if(!empty($rel_details[0]->title)){
    											 $relational_val_arr_s[] = $rel_details[0]->title;
    										 }

    								 }
    								// echo !empty($relational_val_arr_s)?outputEscapeString(implode(",",$relational_val_arr_s)):'-';
                     $oldvalue_withdiff = !empty($relational_val_arr_s)?outputEscapeString(implode(",",$relational_val_arr_s)):'-';

                    }
                    elseif(!empty($relational_type) && ($relational_type == "select") && !empty($relational_val) ){
                                     $where = array(
    											'id' => $relational_val
    										 );
    										 $rel_details = $this->model_common->select_row($relational_table,$where);
    										 if(!empty($rel_details[0]->title)){
    											 $relational_val_arr_s = $rel_details[0]->title;
    										 }
                      //echo (!empty($relational_val_arr_s))?outputEscapeString($relational_val_arr_s):'-';
                    $oldvalue_withdiff = (!empty($relational_val_arr_s))?outputEscapeString($relational_val_arr_s):'-';
    							 }else{
    								 //echo "-";
                     $oldvalue_withdiff = "-";
    							 }
    					 }else{
    						 	//echo !empty($old_value_arr->$field_name)?outputEscapeString($old_value_arr->$field_name):'-';
    							$oldvalue_withdiff = !empty($old_value_arr->$field_name)?outputEscapeString($old_value_arr->$field_name):'-';

    				     }
    				?>
                	<?php
                  $relational_val_arr_s ='';
    					 if(!empty($field_type) && ($field_type == "image") && !empty($fa->upload_path) && !empty($new_value_arr->$field_name) && ($old_value_arr->$field_name != $new_value_arr->$field_name)){
    						 	//echo $fa->upload_path;
    							//echo !empty($main_table_details[0]->$field_name)?$main_table_details[0]->$field_name:'';
    							?>
                                <img style="width:50px;height:50px;" src="<?php echo $fa->upload_path.$new_value_arr->$field_name; ?>"  />
                                <?php
    					 }else if(!empty($field_type) && ($field_type == "relational") && !empty($new_value_arr->$field_name) && ($old_value_arr->$field_name != $new_value_arr->$field_name)){
    							 $relational_val = $new_value_arr->$field_name;
    							 if(!empty($relational_type) && ($relational_type == "multiselect") && !empty($relational_val)){

    								 $relational_val_arr = explode(",",$relational_val);
    								 $relational_table = $fa->relational_table;
    								 foreach($relational_val_arr as $rvr){
    										 $where = array(
    											'id' => $rvr
    										 );
    										 $rel_details = $this->model_common->select_row($relational_table,$where);
    										 if(!empty($rel_details[0]->title)){
    											 $relational_val_arr_s[] = $rel_details[0]->title;
    										 }

    								 }
    								 //echo !empty($relational_val_arr_s)?outputEscapeString(implode(",",$relational_val_arr_s)):'-';
                     $newvalue_withdiff = !empty($relational_val_arr_s)?outputEscapeString(implode(",",$relational_val_arr_s)):'-';
    							 }else{
    								 //echo "-";
                     $newvalue_withdiff = "-";
    							 }
    					 }else{
    							//echo (!empty($new_value_arr->$field_name) && ($old_value_arr->$field_name != $new_value_arr->$field_name))?outputEscapeString($new_value_arr->$field_name):'-';
                  $newvalue_withdiff = (!empty($new_value_arr->$field_name) && ($old_value_arr->$field_name != $new_value_arr->$field_name))?outputEscapeString($new_value_arr->$field_name):'-';

    					 }
    				?>
            <td colspan="2">

              <?php
                    //echo outputEscapeString(Diff::toTable(Diff::compare($oldvalue_withdiff,$newvalue_withdiff),'',''));
              echo outputEscapeString(Diff::toTable(Diff::compare($oldvalue_withdiff,$newvalue_withdiff),'',''));

              ?>


            </td>
          </tr>
    <?php } ?>
  <?php } ?>
</table>

 <script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
 <script>
	$(document).ready(function() {
    //(".diffUnmodified").closest('tr')
    var $row = $(".diffUnmodified").closest('tr');
    $row.remove();

	});
 </script>
