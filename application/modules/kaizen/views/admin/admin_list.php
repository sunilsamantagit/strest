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
		<h3 class="title">Admin List</h3>
        <div class="clear"></div>
        <script>
            function form_submit(){
                $('#cont').submit();
            }
            </script>
        <!--Search area end-->
        <div class="application-table-area">
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
           <div ><h2 align="center" style="color:#31B12c;"  id="status_mesage"></h2></div>
            <table cellspacing="0" cellpadding="0" border="0" id="pagi">
              <thead>
                <tr>
                  <th>Name<span class=""></span></th>
                  <th>Username<span class=""></span></th>
                  
                  <th>Status<span class=""></span></th>
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
                  <td><?php echo $row->full_name; ?></td>
                  <td><?php echo $row->user_name; ?></td>
                  
                  <td>
				  <span id="status_td<?php echo $row->id; ?>"><?php if($row->is_active==1){ ?>
	<a href="javascript:void(0)" onclick="change_status('<?php echo $row->id; ?>','0','status_td','admin','admin')" title="Active"> <img src="<?php echo site_url("public/images/unlock_icon.gif");?>" alt="Active"/> </a>
												<?php } else{ ?>
<a href="javascript:void(0)" onclick="change_status('<?php echo $row->id; ?>','1','status_td','admin','admin')" title="Inactive"> <img src="<?php echo site_url("public/images/locked_icon.gif");?>" alt="Inactive"/></a>
												<?php } ?>
								     </span>
									 
                    </td>
                    </td>
                  <td>
                	<a class="block-btn edit-btn" href="<?php echo site_url("kaizen/admin/doedit/".$row->id);?>"><span>Edit</span></a> 
                    <a href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','admin');" class="delete3 delete-red-btn"><span>Delete</span></a>
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
	    "order": [[ 0, "asc" ]],	
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