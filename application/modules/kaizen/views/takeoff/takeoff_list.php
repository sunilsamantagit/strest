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
    <h2 class="title">Takeoff - Listing</h2>
    <?php $this->load->view($right); ?>
  </div>
        <div class="clear"></div>
        
        <!--Search area end-->
        <div class="application-table-area lumb_sumb_table">
          <div class="mid-block">
              <div class="members-table member-group">
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
    <div id="pagi_wrapper" class="dataTables_wrapper no-footer">

           <div ><h2 align="center" style="color:#31B12c;"  id="status_mesage"></h2></div>
                    <table cellspacing="0" cellpadding="0" border="0" id="pagi">
            <thead>
              <tr>
                    <th style="text-align: center;">No.<span class=""></span></th>
                    <th width="35%">Quote No.<span class=""></span></th>
                    <th>Date<span class=""></span></th>
							      <th>Action</th>
              </tr>
            </thead>
            <tbody>                        
        							<?php
        			  if(empty($records)){
        				  ?>
        							<tr>
        								<td align="center" valign="top"><b>There are no Records.</b><br /></td>
        							</tr>
        							<?php
        			  }
        			  else{
        			  $i=0;
        			  foreach($records as $row){
        				  $i++;				  
        			  ?>
  <tr>
      <td><?php echo $i; ?></td>        
			<td><?php if(!empty($row->quote_no)) echo $row->quote_no; ?></td>
      <td><?php if(!empty($row->date)){echo $row->date; }?></td>
      <td class="action_btn">
         <a class="" href="<?php echo site_url("kaizen/takeoff/doedit/".$row->id);?>"><span>View</span></a>  
         <a class="" href="<?php echo site_url("kaizen/takeoff/doedit/".$row->id);?>"><span>Edit</span></a> 
         <a class="duplicate" href="<?php echo site_url("kaizen/takeoff/doduplicate/".$row->id);?>"><span>Duplicate</span></a> 
         <a class="" href="<?php echo site_url("kaizen/takeoff/takeoff_Print/".$row->id);?>"><span>Print</span></a>
        <a class="" href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','bh_takeoff');" class=""><span>Delete</span></a>
<!--
				  <a class="block-btn edit-btn" href="<?php echo site_url("kaizen/takeoff/takeoff_view/".$row->id);?>"><span>View</span></a>
          <a class="block-btn edit-btn" href="<?php echo site_url("kaizen/takeoff/takeoff_edit/".$row->id);?>"><span>Edit</span></a>
					<a class="block-btn edit-btn" href="<?php echo site_url("kaizen/takeoff/takeoff_duplicate/".$row->id);?>"><span>Duplicate</span></a>
					<a class="block-btn edit-btn" href="<?php echo site_url("kaizen/takeoff/takeoff_Print/".$row->id);?>"><span>Print</span></a>
					<a href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','home_block');" class="delete3 delete-red-btn"><span>Delete</span></a>

  -->
      </td>
						
							</tr>
        									
        			<?php
        			  }
        			  }
        			  ?>        
                        
                    </tbody>
					</table>
            	</div>
                 <?php $this->load->view($footer); ?>
          </div>        
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
      "order": [[ 2, "asc" ]],
      "stateSave": true,
    "aoColumns": [
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
} );
</script>