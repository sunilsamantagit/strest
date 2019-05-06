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
		<h3 class="title">Admin Management</h3>
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
                            <th>NO.<span class=""></span></th>
                            <th>User Name<span class=""></span></th>
                            <th>User ID<span class=""></span></th>
                            <th>Date<span class=""></span></th>
			   <th>Action</th>
<!--                            <th>View Tracking</th>-->
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
                                  $slno=1;
        			  foreach($records as $row){
        				  $i++;
        			  ?>

                    <tr>
<!--                        <td><?php echo $row->first_name.' '.$row->last_name; ?></td>-->
                        <td><?php echo $slno; ?></td>
                        <td><?php echo $row->user_name; ?></td>
                        <td><?php echo $row->user_id; ?></td>
                        <td><?php echo date("m-d-Y", strtotime($row->date)); ?></td>
<!--                        <td><?php if(!empty($row->user_level) && $row->user_level=='1'){echo 'Super Admin';}else{echo 'Admin'; } ?></td>-->
<!--                        <td><?php if($row->approved==1){ ?>
                    <a href="<?php echo site_url("kaizen/".$this->router->fetch_class()."/changeApproval/".$row->id."/admin");?>" title="Active"> <img src="<?php echo site_url("public/images/unlock_icon.gif");?>" alt="Active"/> </a>
                    <?php } else{ ?>
                    <a href="<?php echo site_url("kaizen/".$this->router->fetch_class()."/changeApproval/".$row->id."/admin");?>" title="Inactive"> <img src="<?php echo site_url("public/images/locked_icon.gif");?>" alt="Inactive"/></a>
                    <?php } ?>
                        </td>-->
                <td class="action_btn">
                    <a class="" href="<?php echo site_url("kaizen/user/doedit/".$row->id);?>"><span>Edit</span></a> 
                    <?php if($row->user_level!=1){ ?>
                    <a href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','admin');" class=""><span>Delete</span></a>
                    <?php } ?>
                    </td>
<!--                    <td>
    <a class="block-btn edit-btn" href="<?php echo site_url("kaizen/user/user_tracking/".$row->user_name);?>"><span style="background: none;" >View Tracking</span></a>
  </td>-->
  	</tr>
        							<?php
        			  $slno++;}
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
<script type="text/javascript">
    $(document).ready(function() {
    $('#pagi').dataTable( {
      "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
    "aoColumns": [
    null,
    null,
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