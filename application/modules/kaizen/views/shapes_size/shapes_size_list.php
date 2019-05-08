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
	
	#pagi {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#pagi td, #pagi th {
  border: 1px solid #ddd;
  padding: 8px;
}



#pagi th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #0B94FA;
  color: black;
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
	
</style>
<script type='text/javascript' src='<?php echo base_url(); ?>public/js/jquery.dataTables.min.js'></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery.dataTables.min.css" />
<div class="rightDiv">
	<div class="right-outer">
	<div class="page_title">
		<h2 class="title">Shapes Size Management</h2>
		<?php $this->load->view($right); ?>
	</div>
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
			echo '<div class="notific_suc" id="mySuccMessage"><h2 align="center" style="color:#0a0;">'.$this->session->userdata('SUCC_MSG').'</h1></div>';
			$this->session->unset_userdata('SUCC_MSG');
		}
		?>
           <div ><h2 align="center" style="color:#31B12c;"  id="status_mesage"></h2></div>
                    <table cellspacing="0" cellpadding="0" border="0" id="pagi">
						<thead><tr>
                            <th style="text-align: center;">No.<span class=""></span></th>
                            <th width="35%">Shape Name<span class=""></span></th>
                            <th>Shape Specification<span class=""></span></th>
							<th>Inserted Date<span class=""></span></th>
							<th>Action<span class=""></span> </th>
                        </tr>
                        </thead>
                        <tbody>
                        
        							<?php
        			  if(empty($records)){
        				  ?>
        							<tr>
        								<th align="center" valign="top" colspan="5"><b>There are no Records.</b><br /></th>
        							</tr>
        							<?php
        			  }
        			  else{
        			  $i=1; //echo "<pre>";print_r($records);
        			  foreach($records as $row){
				
        			  ?>
        					<tr>
                            
                            <td style="text-align: center;"><?php echo $i; ?></td>   
							<td style="text-align: center;"><?php if(!empty($row->size_name)) echo $row->size_name; ?></td>
			
		<?php /*echo "<pre>";print_r($shapes_management);exit;*/ foreach($shapes_management as $rows){
		if($rows->id==$row->shape)  { ?>
							<td style="text-align: center;"><?php if(!empty($row->shape)) echo $rows->shape_specification; } } ?></td>
							
                            <td style="text-align: center;"><?php if(!empty($row->date)) { $originalDate = $row->date;
							$newDate = date("m-d-Y", strtotime($originalDate)); echo $newDate; } ?></td>
        			        
							<!--<td>    
							 <span id="status_td<?php echo $row->id; ?>"><?php if($row->is_active==1){ ?>
	<a href="javascript:void(0)" onclick="change_status('<?php echo $row->id; ?>','0','status_td','home_block','home_block')" title="Active"> <img src="<?php echo site_url("public/images/unlock_icon.gif");?>" alt="Active"/> </a>
								<?php } else{ ?>
<a href="javascript:void(0)" onclick="change_status('<?php echo $row->id; ?>','1','status_td','home_block','home_block')" title="Inactive"> <img src="<?php echo site_url("public/images/locked_icon.gif");?>" alt="Inactive"/></a>
								<?php } ?>
							 </span>
							</td>-->
							
                		<td class="action_btn">
                			<a class="" href="<?php echo site_url("kaizen/shapes_size/doedit/".$row->id);?>"><span>Edit</span></a>
							<a href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','shapes_size');" class=""><span>Delete</span></a>
                        </td>
						
							</tr>
        									
        			<?php
        			 $i++;	 }
        			  }
        			  ?>        
                        
                    </tbody>
					</table>
            	</div>
                 <?php $this->load->view($footer); ?>
          </div>
            
        
    </div>
</div>

<!--right column end-->
<div class="clear"></div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    $('#pagi').dataTable( {
      "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
      "order": [[ 0, "asc" ]],
    //  "stateSave": true,
    "aoColumns": [
    null,
    { "bSortable": false },
	  null,  
	    { "bSortable": false },
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