<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>
<?php // print_r($element_detls); exit; ?>
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
		<h3 class="title">Tracking</h3>
        <div class="clear"></div>
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
                <!--<ul class="pagination">
               <?php //echo $pagination; ?>
                  </ul>-->
                    <table cellspacing="0" cellpadding="0" border="0" id="pagi">
						<thead><tr>
                             <th>Module Name<span class=""></span></th>
                            <th>Item Name<span class=""></span></th>
                              <th>Changed By<span class=""></span></th>
                            <th>Date Changed<span class=""></span></th>
<!--                             <th>View Changes<span class=""></span></th>
-->                        </tr>
                        </thead>
                        <tbody>
        								<?php
        			  if(empty($user_tracking_detls)){
        				  ?>
        							<tr>
        								<td align="center" valign="top"><b>There are no Records.</b><br /></td>
        							</tr>
        							<?php
        			  }
        			  else{
        			  $i=0;
        			  foreach($user_tracking_detls as $row){
        				  $i++;
					  		$where = array(
                            'id' => $row->element_id
                        );
						$element_detls = array();
						//$element_detls = $this->modeluser_tracking->select_row($row->table_name,$where);
            $element_detls = $this->modeluser_tracking->selectOne($row->table_name,$where);

        			  ?>
                    <tr>
                        <td><?php echo $row->module_name; ?></td>
            <td><?php
						if(!empty($element_detls->title)){
						echo $element_detls->title;
						}else{
							$old_value_str = $row->old_value;
							$old_value_arr = json_decode($old_value_str);
              if($row->module_name=='site_settings'){
                  echo $old_value_arr->site_name;
              }else if($row->module_name=='admin'){
                  echo $old_value_arr->full_name;
              }else{
                  echo $old_value_arr->title." (Deleted)";
              }
						} ?>
                       </td>
               <td>
                   <?php
                   if(!empty($row->update_by)){
                       $user_n = $this->modeluser_tracking->selectOne('admin',array('user_name'=>$row->update_by));
                        echo $user_n->full_name;
                   }
                   ?>
               </td>
               <td><?php  echo date('Y-m-d h:i A', strtotime($row->created_date)); ?></td>
<?php /*?>               <td><?php if(!empty($row->id) && $this->session->userdata('user_level')==1){ echo getalltracking_user($row->id);  } ?> </td>
<?php */?>      	</tr>
       <?php }}  ?>
         </tbody></table>
         <!--<ul class="pagination" style="margin-bottom:20px;">
        <?php //echo $pagination; ?>
      </ul>-->
      <div style="clear:both;"></div>
            	</div>
                 <?php //$this->load->view($copyright); ?>
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
    "aoColumns": [
    null,
    null,
	   null,
    null

    ],
    "fnDrawCallback": function () {
        var aTag = $("#pagi_wrapper");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }
    } );
} );
</script>