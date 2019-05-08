<?php $this->load->view($header); ?>
<?php $this->load->view($left); ?>

<script src="<?php echo base_url("public/js/jquery.fancybox.js"); ?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url("public/css/jquery.fancybox.css"); ?>" type="text/css"/>

<script>
    $('.fancybox').fancybox({
        width: '1200',
        height: '800'
    });
    
function addAnothercontent(id){alert(id);
  $(document.body).addClass('modal_open');
	jQuery.ajax({
			  type: "POST",
        async: false,
				url : '<?php echo site_url("kaizen/takeoffline/doadd");?>',
        data: {id:id},
				dataType : "html",
				success: function(data)
				{
					if(data)
					{
							jQuery("#add_content").prepend(data); 
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



<script type='text/javascript' src='<?php echo base_url(); ?>public/js/jquery.dataTables.min.js'></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery.dataTables.min.css" />
<div class="rightDiv">
	<div class="right-outer">
            <div class="page_title">
		<h3 class="title">Takeoff Line Entries List</h3>
               <?php // $this->load->view($right); ?>
                <a href="javascript:void(0);" class="new-survey-btn-blue button" onclick="addAnothercontent('');" ><span>Add Line Entry</span></a>
            </div>
<!--                <a class="button" href="#popup1">Let me Pop up</a>-->
               
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
                     <div id="add_content" class=""></div>
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
                         <a class="" href="javascript:void(0);" onclick="addAnothercontent('<?php echo $row->id; ?>');"><span>Edit</span></a>

                	     <a class="" href="<?php echo site_url("kaizen/takeoffline/doedit/".$row->id);?>"><span>Edit</span></a> 
                         <a href="javascript:void(0);" title="Delete" onclick="rowdelete('<?php echo $row->id; ?>','takeoffline');" class=""><span>Delete</span></a>
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

.new-survey-btn-blue.button{ float: right; margin-top: 10px;}

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
  margin: 30px auto;
  padding: 25px;
  background: #fff;
  border-radius: 5px;
  width: 100%;
  max-width: 800px;
  box-sizing: border-box;
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

body.modal_open{ overflow: hidden;}
.modal_open #add_content{ position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 9999; overflow-y: auto;}
</style>