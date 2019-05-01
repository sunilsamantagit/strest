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
</style>
<script type='text/javascript' src='<?php echo base_url(); ?>public/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery.dataTables.min.css" />
<div class="rightDiv">
	<div class="right-outer">
    	<div class="right-outer">
		<h3 class="title">User</h3>
        <div class="clear"></div>

        <!--Search area end-->
        <div class="application-table-area">
        	<div class="mid-block">
            	<div class="members-table member-group">
						<?php
						if($this->session->userdata('ERROR_MSG')==TRUE){
							echo '<div class="notific_error">
									<h2 align="center" style="color:#f00;">'.$this->session->userdata('ERROR_MSG').'</h1></div>';
							$this->session->unset_userdata('ERROR_MSG');
						}
						if($this->session->userdata('SUCC_MSG')==TRUE){
				echo '<div class="notific_suc"><h2 align="center" style="color:#0a0;">'.$this->session->userdata('SUCC_MSG').'</h1></div>';
							$this->session->unset_userdata('SUCC_MSG');
						}
						?>
                    <table cellspacing="0" cellpadding="0" border="0" id="pagi">

						<thead><tr>
                            <th>Name<span class=""></span></th>
                            <th>User Name<span class=""></span></th>
                            <th>User Type<span class=""></span></th>
                            <th>Status<span class=""></span></th>
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
        			  foreach($records as $row){
        				  $i++;
        			  ?>

                    <tr>
                        <td><?php echo $row->first_name.' '.$row->last_name; ?></td>
                        <td><?php echo $row->user_name; ?></td>
                        <td><?php
                        if(!empty($row->user_level) && $row->user_level=='1'){echo 'Super Admin';}else{echo 'Admin'; }
                        ?></td>
                        <td><?php if($row->approved==1){ ?>
                    <a href="<?php echo site_url("kaizen/".$this->router->fetch_class()."/changeApproval/".$row->id."/admin");?>" title="Active"> <img src="<?php echo site_url("public/images/unlock_icon.gif");?>" alt="Active"/> </a>
                    <?php } else{ ?>
                    <a href="<?php echo site_url("kaizen/".$this->router->fetch_class()."/changeApproval/".$row->id."/admin");?>" title="Inactive"> <img src="<?php echo site_url("public/images/locked_icon.gif");?>" alt="Inactive"/></a>
                    <?php } ?>
                        </td>
                <td>
                    <a class="block-btn edit-btn" href="<?php echo site_url("kaizen/user/doedit/".$row->id);?>"><span>Edit</span></a> 
                    <?php if($row->user_level!=1){ ?>
                    <a href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','admin');" class="delete3 delete-red-btn"><span>Delete</span></a>
                    <?php } ?>
                    </td>
<!--                    <td>
    <a class="block-btn edit-btn" href="<?php echo site_url("kaizen/user/user_tracking/".$row->user_name);?>"><span style="background: none;" >View Tracking</span></a>
  </td>-->
  	</tr>
        							<?php
        			  }
        			  }
        			  ?>
                    </tbody></table>
            	</div>

          </div>

             <div class="rt-block">
             	  <?php $this->load->view($right); ?>
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
} );
</script>
