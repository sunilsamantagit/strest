<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //echo 'aaaaaa';die;
//redirect('kaizen/main','refresh');
class MY_Controller extends CI_Controller {
  public function __construct(){ 
    parent::__construct(); 
    
   
//           if(get_cookie('uname')!=''){
//           $c_dyls = $this->model_common->selectOne('admin',array('user_name'=>get_cookie('uname')));
//        
//                                        $session_data = array(
//					   "web_admin_user_name"   => $c_dyls->user_name,
//					   "web_admin_user_id"     => $c_dyls->id,
//					   "SITE_ID"  	           => 1,
//					   "user_level"  	   => $c_dyls->user_level,
//					   "module"  	           => $c_dyls->module,
//					   "web_admin_logged_in"   => TRUE
//					 );
//
//					$this->model_login->update($c_dyls->id,$c_dyls->user_name);
//                                        $this->session->set_userdata($session_data);
//                                        
//                                        redirect("kaizen/main",'refresh');
//        
//    }
//   
//    elseif($this->session->userdata('web_admin_logged_in')!=TRUE) {
//            redirect('kaizen/welcome','refresh');
//    }else{redirect('kaizen/welcome','refresh');}
    
    
    
    
    
    
    $current_module = $this->router->fetch_module();
    $this->load->model('common/model_common');
    $this->load->model('common/model_login');
  }
  
  
  public function imagedelete(){
                $id=$this->input->get('deleteid', TRUE);
		$field_name=$this->input->get('field_name', TRUE);
		$table_name=$this->input->get('table_name', TRUE);
		$folder_name=$this->input->get('folder_name', TRUE);
		$module_name=$this->input->get('module_name', TRUE);
                
                $where = array(
                        'id' => $id
                    );
                $detls = $this->model_common->select_row($table_name,$where);
						
		if(!empty($detls))
		{ 
                        if(is_file(file_upload_absolute_path().$folder_name."/".$detls[0]->$field_name)){
					unlink(file_upload_absolute_path().$folder_name."/".$detls[0]->$field_name);
                        }
                        if(is_file(file_upload_absolute_path().$folder_name."/thumb_".$detls[0]->$field_name)){
					unlink(file_upload_absolute_path().$folder_name."/thumb_".$detls[0]->$field_name);
                        }
                        $update_data = array(
                                 $field_name =>''
                                );
                        $update_where = array('id' => $id);
                        $update = $this->model_common->update_row($table_name,$update_data,$update_where);
                        if($update)
                        {
                                $session_data = array("ERROR_MSG"  => "Image Remove Successfully.");
                                $this->session->set_userdata($session_data);	
                        }
                        else
                        {
                               
                        } 
		}	
		else
		{
			$session_data = array("ERROR_MSG"  => "Image Not deleted Successfully.");
			$this->session->set_userdata($session_data);
		}
                redirect("kaizen/".$module_name,'refresh');
  }
  function popup(){
		$folder_name =  $this->uri->segment(4);
		$width =  $this->uri->segment(5);
		$height =  $this->uri->segment(6);
		$this->data['folder_name'] = $folder_name;
		$this->data['imgwidth'] = $width;
		$this->data['imgheight'] = $height;
		$this->data['session'] = $this->uri->segment(7);		
		$this->load->view('kaizen/upload_crop',$this->data);
	}
  public function imagedeletecommon(){
    $id		=$this->input->post('deleteid');
    $field_name		=$this->input->post('fieldname');
    $table_name		=$this->input->post('tablename');
    $controller		=$this->input->post('controller'); 
    $folder_name = $this->input->post('folder_name');
    $field_id = $this->input->post('field_id');
            $where = array(
                    $field_id => $id
                );
            $detls = $this->model_common->select_row($table_name,$where);
            //print_r($detls); die();
            if(!empty($detls)){
              if(is_file(file_upload_absolute_path().$folder_name."/".$detls[0]->$field_name)){
                unlink(file_upload_absolute_path().$folder_name."/".$detls[0]->$field_name);
              }
              if(is_file(file_upload_absolute_path().$folder_name."/thumb_".$detls[0]->$field_name)){
                unlink(file_upload_absolute_path().$folder_name."/thumb_".$detls[0]->$field_name);
              }
              $update_data = array($field_name =>'');
              $update_where = array($field_id => $id);
              $update = $this->model_common->update_row($table_name,$update_data,$update_where);
              if($update){
                echo ""	;
              }
              else{
                echo "<p style='color:red;font-size: 14px;font-weight: bold;'>Image Not deleted Successfully.</p>";
              } 
          }
          else{
            echo "<p style='color:red;font-size: 14px;font-weight: bold;'>Image Not deleted Successfully.</p>";
          }
        }
		
  public function rowdelete(){
        $id=$this->input->get('deleteid', TRUE);
        $table_name=$this->input->get('table_name', TRUE);
        $module_name=$this->input->get('module_name', TRUE);
        $where = array(
                    'id' => $id

                );
        $this->model_common->delete_row($table_name,$where);
        //$this->session->set_flashdata('message','Successfull deleted');
        $session_data = array("SUCC_MSG"  => "Successfully deleted");
	$this->session->set_userdata($session_data);
        redirect("kaizen/".$module_name,'refresh');
  }
  
  
  
  public function statusChange(){
	  $fetch_class = $this->uri->segment(2, 0);
      $data_id = $this->uri->segment(4, 0);
      $table_name = $this->uri->segment(5, 0);
      
      if(!empty($data_id) && !empty($table_name)){
        $where = array(
                            'id' => $data_id
                        );
        $data_details = $this->model_common->select_row($table_name,$where);
        if(!empty($data_details[0])){
            if($data_details[0]->is_active == 1){
                $update_data = array('is_active' =>0);
            }else{
                $update_data = array('is_active' =>1);
            }
            $update_where = array('id' => $data_id);
            if($this->model_common->update_row($table_name,$update_data,$update_where)){
				
			    if($data_details[0]->is_active ==0 && $fetch_class=='homepage_welcome_block')
				{
					$this->activeinactive($data_id,1,$table_name);
				}
				 elseif($data_details[0]->is_active ==0 && $fetch_class=='featured_block')
				{
					$this->activeinactive($data_id,'3',$table_name);
				}
                $session_data = array("SUCC_MSG"  => "Status Changed Successfully.");
				$this->session->set_userdata($session_data);
            }else{
                $session_data = array("ERROR_MSG"  => "Status Not Changed Successfully.");
                $this->session->set_userdata($session_data);
            }
                
        }else{
                $session_data = array("ERROR_MSG"  => "Status Not Changed Successfully.");
                $this->session->set_userdata($session_data);
        }       
      }else
        {
                $session_data = array("ERROR_MSG"  => "Status Not Changed Successfully.");
                $this->session->set_userdata($session_data);
        }
      redirect("kaizen/".$this->router->fetch_class(),'refresh');
  }
  
 public function ajaxChangeStatus(){
    $id         =$this->input->post('id');
    $status		=$this->input->post('status');
    $field_id	=$this->input->post('field_id');
    $table		=$this->input->post('table');
    $controller		=$this->input->post('controller');
    $update_where = array('id'=>$id);
    $update_data = array('is_active'=>$status);
    if($this->model_common->update_row($table,$update_data,$update_where)){
        if($status==0){
            $status=1;
        }else{
            $status = 0;
        }
        echo 1; 
    }else{
        echo 0;
    }
}
public function ajaxChangeFeature(){
    $id         =$this->input->post('id');
    $status   =$this->input->post('status');
    $field_id =$this->input->post('field_id');
    $table    =$this->input->post('table');
    $controller   =$this->input->post('controller');
    $update_where = array('id'=>$id);//echo $status;
    if($status){
      $update_data = array('is_feature'=>0);
    }else{
      $update_data = array('is_feature'=>1);
    }
    if($this->model_common->update_row($table,$update_data,$update_where)){//echo $this->db->last_query();
        echo 1; 
    }else{
        echo 0;
    }
}

  public function checkDuplicateValue() {
      $id = $this->input->post('id');
      $table = $this->input->post('table');
      $field = $this->input->post('field');
      $value = $this->input->post('currentData');
      $where = array(
                            'id!=' => $id,
                            '`'.$field.'`' => $value,
                            'approved' =>1
                        );
      //pre($where);
      $data_details = $this->model_common->select_row($table,$where);
      if(!empty($data_details)){
          echo 'Already Exist';
      }else{
          echo '0';
      }
  }
  public function changeApproval(){
	  $fetch_class = $this->uri->segment(2, 0);
      $data_id = $this->uri->segment(4, 0);
      $table_name = $this->uri->segment(5, 0);
      
      if(!empty($data_id) && !empty($table_name)){
        $where = array(
                            'id' => $data_id
                        );
        $data_details = $this->model_common->select_row($table_name,$where);
        if(!empty($data_details[0])){
            if($data_details[0]->approved == 1){
                $update_data = array(
                        'approved' =>0
                       );
            }else{
                $update_data = array(
                        'approved' =>1
                       );
            }
            $update_where = array('id' => $data_id);
            if($this->model_common->update_row($table_name,$update_data,$update_where)){
                $session_data = array("SUCC_MSG"  => "Approved Successfully.");
				$this->session->set_userdata($session_data);
            }else{
                $session_data = array("ERROR_MSG"  => "Un-Approved Successfully.");
                $this->session->set_userdata($session_data);
            }
                
        }else{
                $session_data = array("ERROR_MSG"  => "Un-Approved Successfully.");
                $this->session->set_userdata($session_data);
        }       
      }else
        {
                $session_data = array("ERROR_MSG"  => "Un-Approved Successfully.");
                $this->session->set_userdata($session_data);
        }
      redirect("kaizen/".$this->router->fetch_class(),'refresh');
  }
  public function featureChange(){
	  $fetch_class = $this->uri->segment(2, 0);
      $data_id = $this->uri->segment(4, 0);
      $table_name = $this->uri->segment(5, 0);
      
      if(!empty($data_id) && !empty($table_name)){
        $where = array(
                            'id' => $data_id
                        );
        $data_details = $this->model_common->select_row($table_name,$where);
        if(!empty($data_details[0])){
            if($data_details[0]->is_featured == 1){
                $update_data = array(
                        'is_featured' =>0
                       );
            }else{
                $update_data = array(
                        'is_featured' =>1
                       );
            }
            $update_where = array('id' => $data_id);
            if($this->model_common->update_row($table_name,$update_data,$update_where)){
			    if($data_details[0]->is_featured ==0 && $fetch_class=='gallery')
				{
					$this->activeinactivefeature($data_id,1,$table_name);
				}
                $session_data = array("SUCC_MSG"  => "Feature Changed Successfully.");
				$this->session->set_userdata($session_data);
            }else{
                $session_data = array("ERROR_MSG"  => "Feature Not Changed Successfully.");
                $this->session->set_userdata($session_data);
            }
        }else{
                $session_data = array("ERROR_MSG"  => "Feature Not Changed Successfully.");
                $this->session->set_userdata($session_data);
        }       
      }else
        {
                $session_data = array("ERROR_MSG"  => "Feature Not Changed Successfully.");
                $this->session->set_userdata($session_data);
        }
      redirect("kaizen/".$this->router->fetch_class(),'refresh');
  }
  function activeinactive($id,$limit,$table)
  {
		$count = 1;
		$update_data  = array('is_active'=>0);  
		$activedata = $this->model_common->getAllActivedata($table);
		foreach($activedata as $data)
		{
			$update_where = array('id' => $data->id);
			if($data->id != $id)
			{
				   $count++;
				   if(!empty($limit))
				   {	
					   if(!empty($data->is_active))
					   {
							if($count > $limit )
							{
								$this->model_common->update_row($table,$update_data,$update_where);
							}
					   }
				   }
			}
		 }
	}
  function activeinactivefeature($id,$limit,$table){
			$count = 0;
			$activedata = $this->model_common->getAllFeaturedata($table);
			foreach($activedata as $data){
				$update_data  = array('is_featured'=>0);  
				$update_where = array('id' => $data->id);
				if($data->id != $id){
					
				   if(!empty($limit))
				   {
					   if(!empty($data->is_featured))
					   {
								if($count > $limit){
										$this->model_common->update_row($table,$update_data,$update_where);
								}
						$count++;
					   }
				   }
				   else
				   {
					   $this->model_common->update_row($table,$update_data,$update_where);
				   }
				  
				}
			}
	}
	public function newcrop(){
		$image_id = $this->input->get("image_id");
		$folder_name = $this->input->get("folder_name");
		$img_sceen = $this->input->get("img_sceen");
		$prev_img = $this->input->get("prev_img");		
		$height = $this->input->get("height");
		$width = $this->input->get("width");
        
		$controller = $this->input->get("controller");
		
		$data['image_id'] = $image_id;
		$data['folder_name'] = $folder_name;
		$data['img_sceen'] = $img_sceen;
		$data['prev_img'] = $prev_img;
		
        $data['height'] = $height;
		$data['width'] = $width;
        
		$data['controller'] = $controller;
		$this->load->view("kaizen/crop",$data);	
	}
	
	public function saveimage(){
		$imageData = $this->input->post("result_img");	
		$upload_dir = $this->input->post("folder_name");
        $filteredData=substr($imageData, strpos($imageData, ",")+1);
        $unencodedData=base64_decode($filteredData);
        $image_name = uniqid().'.png';
        $fp = fopen(file_upload_absolute_path().$upload_dir.'/'.$image_name, 'wb' );
        fwrite( $fp, $unencodedData);
        fclose( $fp );
        echo $image_name;
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */