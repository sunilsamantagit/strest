<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Material extends MY_Controller 
{
	private $limit = 20;
	var $offset = 0;
	function __construct()
	{
		parent::__construct();		 
		
		if( ! $this->session->userdata('web_admin_logged_in')) {
			redirect('kaizen/welcome','refresh');
		}
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'common/header',
		  'left' => 'common/left',
          'right' => 'common/right',
		  'footer' => 'common/footer'
		));
		
		$this->load->model('modelmaterial');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	
	
	public function dolist(){
		$data = array();
		$where = array();
               
        $order_by = array('id' => 'DESC');
		$data_row = $this->modelmaterial->select_row('material',$where,$order_by);		
		$data['records']= $data_row;
		$this->load->view('kaizen/material/material_list',$data);		
	}
	
	public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$material_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $material_id;
		
		$where = array('is_active'=>1);
        $order_by = array('title' => 'asc');
	    
	    $data_shapesgrade = $this->modelmaterial->select_row('shapes_management');
		$data_shapes = $this->modelmaterial->select_row('shapes_size');
		$data['shapesgrade']= $data_shapesgrade;
		$data['shapes']= $data_shapes;
		
		$this->load->view('kaizen/material/edit_material',$data);		
	}
    
	public function addedit()
	{	
		$this->load->library('form_validation');
		echo $this->form_validation->set_rules('material_name','spec_grade_id', 'trim|required|xss_clean');
		
		//echo $this->input->post('material_name');
		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('material_id','');
		//echo $id;exit;
	 	$material_detls ='';
	 	$uplod_img='';
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{
			$where = array(                           
                            'id' => $id
                        );
                $material_detls = $this->modelmaterial->select_row('material',$where);
				
        		if(!empty($material_detls)) 
                {
           $update_data = array(            
								'material_name'			=>	$this->input->post('material_name'),
								'spec_grade_id'				=>	$this->input->post('spec_grade_id'),
								//'date'					=>	$date,
								'shape_id'				=>	$this->input->post('shape_id'),
								'inches'			=>	$this->input->post('inches'),
								'metric'			=>	$this->input->post('metric'),
								'size'					=>	$this->input->post('size'),
								'unit_weight'				=>	$this->input->post('unit_weight'),
								'unit_cost'					=>	$this->input->post('unit_cost'),
								'surface'					=>	$this->input->post('surface'),
								'labor'					=>	$this->input->post('labor'),
								'status'					=>	$this->input->post('status')
                                );                              
                
				$update_where = array('id' => $id);
				if($this->modelmaterial->update_row('takeoff',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{				
					$session_data = array("SUCC_MSG"  => "Material Function Entries Updated Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Material Function Entries Not Updated.");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{           
              $add_data = array(            
								'material_name'			=>	$this->input->post('material_name'),
								'spec_grade_id'				=>	$this->input->post('spec_grade_id'),
								//'date'					=>	$date,
								'shape_id'				=>	$this->input->post('shape_id'),
								'inches'			=>	$this->input->post('inches'),
								'metric'			=>	$this->input->post('metric'),
								'size'					=>	$this->input->post('size'),
								'unit_weight'				=>	$this->input->post('unit_weight'),
								'unit_cost'					=>	$this->input->post('unit_cost'),
								'surface'					=>	$this->input->post('surface'),
								'labor'					=>	$this->input->post('labor'),
								'status'					=>	$this->input->post('status')
                                );
                               // print_r($add_data);echo "validation come";exit;
				$id = $this->modelmaterial->insert_row('material',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{                   
					$session_data = array("SUCC_MSG"  => "Material Function Entries Inserted Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Material Function Entries Not Inserted.");
					$this->session->set_userdata($session_data);				
				}
			}
			redirect("kaizen/material/doedit/".$id,'refresh');			
		}
		else{ echo "validation false";exit;
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
		$material_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $material_id
                        );
        $takeoff_detls = $this->modelmaterial->select_row('material',$where);                       
		if($takeoff_detls){
			$data['details'] = $takeoff_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}

		$data_shapesgrade = $this->modelmaterial->select_row('shapes_management');
		$data_shapes = $this->modelmaterial->select_row('shapes_size');
		$data['shapesgrade']= $data_shapesgrade;
		$data['shapes']= $data_shapes;
		
		
		$this->load->view('kaizen/material/edit_material',$data);				
	}
}