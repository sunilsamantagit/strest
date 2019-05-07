<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Takeoffline extends MY_Controller 
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
		
		$this->load->model('modeltakeoffline');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	public function dolist(){
		$data = array();
		$where = array();
               
        $order_by = array('display_order' => 'asc');
		$data_row = $this->modeltakeoffline->select_row('takeoffline',$where,$order_by);
		$data['records']= $data_row;		
		$this->load->view('kaizen/takeoffline/takeoffline_list',$data);		
	}
	
	public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$takeoffline_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $takeoffline_id;

	    $data_shapesgrade = $this->modeltakeoffline->select_row('shapes_management');
		$data['shapesgrade']= $data_shapesgrade;
		$data_lumbsum = $this->modeltakeoffline->select_row('lumbsum');
		$data['lumbsum']= $data_lumbsum;		
		$this->load->view('kaizen/takeoffline/edit_takeoffline',$data);		
	}
    
	public function shapes_size($shap_id)
	{
		$where = array('shape'=> $shap_id);
        $order_by = array('id' => 'asc');
		$data['shap_details'] = $this->modeltakeoffline->select_row('shapes_size',$where,$order_by);
		echo json_encode($data);
	}

	public function addedit()
	{
		//echo "<pre>";print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('resource', 'entry_type', 'trim|required|xss_clean');
				
		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('takeoffline_id','');
	 	$takeoff_detls ='';
	 	$uplod_img='';

		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{
			$where = array(
                            'id' => $id
                        );
			
                $takeoffline_detls = $this->modeltakeoffline->select_row('takeoffline',$where);
				
        		if(!empty($takeoffline_detls)) 
                {
           		$update_data = array(
                				'resource'			=>	$this->input->post('resource'),
								'type'				=>	$this->input->post('entry_type'),
								'shapes_management'	=>	$this->input->post('shapes_management_id'),
								'size_id'			=>	$this->input->post('size_id'),
								'width'				=>	$this->input->post('width'),
								'lens'				=>	$this->input->post('lens'),
								'connmat'			=>	$this->input->post('connmat'),
								'weight'			=>	$this->input->post('weight'),
								'field_bolts'		=>	$this->input->post('field_bolts'),
								'welds'				=>	$this->input->post('welds'),
								'mh_t_range'		=>	$this->input->post('mh_t_range'),
								'mh_t_range_total'	=>	$this->input->post('mh_total_range'),
								'auxserv_shop'		=>	$this->input->post('auxserv_shop'),
								'quantity'			=>	$this->input->post('quantity'),
								'lumbsum'			=>	$this->input->post('lumbsum'),
								'l_description'		=>	$this->input->post('description'),
								'amount'			=>	$this->input->post('amount'),
								'text_description'	=>	$this->input->post('text_description'),
								'is_active'			=>	$this->input->post('erect')
							);
					$update_where = array('id' => $id);
					if($this->modeltakeoffline->update_row('takeoffline',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
					{				
						$session_data = array("SUCC_MSG"  => "Takeoffline - Description Entries Updated Successfully");
						$this->session->set_userdata($session_data);					
					}			
					else 
					{	
						$session_data = array("ERROR_MSG"  => "Takeoffline - Description Entries Not Updated");
						$this->session->set_userdata($session_data);				
					}
				}
				else
				{
	              $add_data = array(
                				'resource'			=>	$this->input->post('resource'),
								'type'				=>	$this->input->post('entry_type'),
								'shapes_management'	=>	$this->input->post('shapes_management_id'),
								'size_id'			=>	$this->input->post('size_id'),
								'width'				=>	$this->input->post('width'),
								'lens'				=>	$this->input->post('lens'),
								'connmat'			=>	$this->input->post('connmat'),
								'weight'			=>	$this->input->post('weight'),
								'field_bolts'		=>	$this->input->post('field_bolts'),
								'welds'				=>	$this->input->post('welds'),
								'mh_t_range'		=>	$this->input->post('mh_t_range'),
								'mh_t_range_total'	=>	$this->input->post('mh_total_range'),
								'auxserv_shop'		=>	$this->input->post('auxserv_shop'),
								'quantity'			=>	$this->input->post('quantity'),
								'lumbsum'			=>	$this->input->post('lumbsum'),
								'l_description'		=>	$this->input->post('description'),
								'amount'			=>	$this->input->post('amount'),
								'text_description'	=>	$this->input->post('text_description'),
								'is_active'			=>	$this->input->post('erect')
							);
					$id = $this->modeltakeoffline->insert_row('takeoffline',$add_data);
					if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
					{                   
						$session_data = array("SUCC_MSG"  => "Takeoffline - Entries Inserted Successfully");
						$this->session->set_userdata($session_data);					
					}			
					else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
					{	
						$session_data = array("ERROR_MSG"  => "Takeoffline - Entries Not Inserted");
						$this->session->set_userdata($session_data);				
					}
				}
			redirect("kaizen/takeoffline/doedit/".$id,'refresh');			
		}
		else{echo "false";exit;
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
		$takeoffline_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $takeoffline_id
                        );
        $takeoffline_detls = $this->modeltakeoffline->select_row('takeoffline',$where);                       
		if($takeoffline_detls){
			$data['details'] = $takeoffline_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}
		$data_shapesgrade = $this->modeltakeoffline->select_row('shapes_management');
		$data['shapesgrade']= $data_shapesgrade;
		$data_lumbsum = $this->modeltakeoffline->select_row('lumbsum');
		$data['lumbsum']= $data_lumbsum;		
		  
		$this->load->view('kaizen/takeoffline/edit_takeoffline',$data);				
	}
	
	
	
	
}