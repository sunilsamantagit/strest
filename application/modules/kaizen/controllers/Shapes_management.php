<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shapes_management extends MY_Controller 
{
	private $limit = 20;
	var $offset = 0;
	function __construct()
	{
		parent::__construct();		 
		
		if(!$this->session->userdata('web_admin_logged_in') && get_cookie('uname')=='') {
			redirect('kaizen/welcome','refresh');
		}
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'common/header',
		  'left' => 'common/left',
          'right' => 'common/right',
		  'footer' => 'common/footer'
		));
		
		$this->load->model('modelshapes_management');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	
	
	public function dolist(){
		$data = array();
		$where = array();
        $order_by = array('id' => 'desc');
		$data_row = $this->modelshapes_management->select_row('shapes_management',$where,$order_by);
		$data['records']= $data_row;
//echo '<pre>';print_r($data['records']);exit;
		$this->load->view('kaizen/shapes_management/shapes_management_list',$data);		
	}
	
	public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$shape_id=$this->uri->segment(4);
		$data['details']->status = 1;
		$data['details']->id = $shape_id;
		
		$where = array('status'=>1);
        $order_by = array('title' => 'asc');
	    
		
		$this->load->view('kaizen/shapes_management/edit_shapes_management',$data);		
	}
    
	public function addedit()
	{
//echo "<pre>"; print_r($_POST);exit;

/*$add_data1 = array(
							'shape_name'	=>	$this->input->post('shape_name'),
							'shape_specification'	=>	$this->input->post('shape_specification'),
							'status'		=>	$this->input->post('shape_status')
				
						);
						
		$id = $this->modelshapes_management->insert_row('shapes_management',$add_data1);
		if($id) { 
		echo " Inserted Successfully..";
			$session_data = array("SUCC_MSG"  => " Inserted Successfully.");
			$this->session->set_userdata($session_data);					
		}	
		redirect("kaizen/shapes_management/",'refresh');*/
	//.........................new..............................\\	
	
//print_r($add_data1);
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('shape_name', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('shape_specification', 'Title', 'trim|required|xss_clean');
		
		//$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('shape_id','');
	 	//$takeoff_detls ='';
	 	//$uplod_img='';
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{	
			$where = array(
                           
                            'id' => $id
                        );
                $shapes_detls = $this->modelshapes_management->select_row('shapes_management',$where);
				
        		if(!empty($shapes_detls)) 
                {
                   
	//echo "<pre>"; print_r($_POST);exit;		                     
                                $this->shape_name 		    =$this->input->post('shape_name',TRUE);
								$this->shape_specification  =$this->input->post('shape_specification',TRUE);
                                $this->status		        =$this->input->post('shape_status',TRUE); 
                                if($this->status===false){
                                        $this->status='1';
                                }
							
			 
								
                                $update_data = array(
                                  
                                    'shape_name'          => $this->shape_name,
									'shape_specification' => $this->shape_specification,
                                    'status'              => $this->status
                                );
                                
                
				$update_where = array('id' => $id);
				if($this->modelshapes_management->update_row('shapes_management',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{
				
					$session_data = array("SUCC_MSG"  => "Shapes Management Entries Updated Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Shapes Management Entries Not Updated.");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{           
                                $this->shape_name            =$this->input->post('shape_name',TRUE);
								 $this->shape_specification  =$this->input->post('shape_specification',TRUE);
                                $this->status                =$this->input->post('shape_status',TRUE); 
                             if($this->status===false){
                                $this->status='1';
                }
					
                             
			
              
                $add_data = array(
                                    
                                    'shape_name' 	       => $this->shape_name,
                                    'shape_specification'  => $this->shape_specification,
                                    'status'               => $this->status
                                );
                                
				$id = $this->modelshapes_management->insert_row('shapes_management',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{ 
                   
					$session_data = array("SUCC_MSG"  => "Shapes Management Entries Inserted Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Shapes Management Entries Not Inserted.");
					$this->session->set_userdata($session_data);				
				}
			}
			//redirect("kaizen/shapes_management/doedit/".$id,'refresh');	
			redirect("kaizen/shapes_management/",'refresh');				
		}
		else{
			if(!empty($id)){
			$this->doedit();
			}
			else{
				$this->doadd();
			}
		}
	}
	public function doedit()
	{
		$data = array();
		$shape_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $shape_id
                        );
        $shapes_detls = $this->modelshapes_management->select_row('shapes_management',$where);                       
		if($shapes_detls){
			$data['details'] = $shapes_detls[0];
		}
		else{
			$data['details']->status = 1;
			$data['details']->id = 0;
		}
		
		
		$this->load->view('kaizen/shapes_management/edit_shapes_management',$data);				
	}
	
	
	
	
}