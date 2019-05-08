<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Takeoff_price extends MY_Controller 
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
		
		$this->load->model('modeltakeoff_price');	
	}

	public function index()
	{	
		$this->doadd();	
	}
        
	
	public function doadd(){
                
		$data = array();
                $data['details']= new stdClass;
		$takeoff_price_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $takeoff_price_id;
                
		$this->load->view('kaizen/takeoff_price/edit_takeoff_price',$data);		
	}
        
        
       

	public function addedit()
	{
		//echo "<pre>";print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('resource', 'entry_type', 'trim|required|xss_clean');
				
		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('takeoff_price_id','');
	 	$takeoff_detls ='';
	 	$uplod_img='';

		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{
			$where = array(
                            'id' => $id
                        );
			
                $takeoff_price_detls = $this->modeltakeoff_price->select_row('takeoff_price',$where);
				
        		if(!empty($takeoff_price_detls)) 
                {
           		$update_data = array(
                				'resource'			=>	$this->input->post('resource'),
								'type'				=>	$this->input->post('entry_type'),
								'shapes_management'	=>	$this->input->post('shapes_management_id'),
								'size_id'			=>	$this->input->post('size_id'),
								'width'				=>	$this->input->post('width'),
								'length'				=>	$this->input->post('length'),
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
					if($this->modeltakeoff_price->update_row('takeoff_price',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
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
								'length'				=>	$this->input->post('length'),
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
					$id = $this->modeltakeoff_price->insert_row('takeoff_price',$add_data);
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
			redirect("kaizen/takeoff_price/doedit/".$id,'refresh');			
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
		$takeoff_price_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $takeoff_price_id
                        );
        $takeoff_price_detls = $this->modeltakeoff_price->select_row('takeoff_price',$where);                       
		if($takeoff_price_detls){
			$data['details'] = $takeoff_price_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}
		$data_shapesgrade = $this->modeltakeoff_price->select_row('shapes_management');
		$data['shapesgrade']= $data_shapesgrade;
		$data_lumbsum = $this->modeltakeoff_price->select_row('lumbsum');
		$data['lumbsum']= $data_lumbsum;		
		  
		$this->load->view('kaizen/takeoff_price/edit_takeoff_price',$data);				
	}
	
	
	
	
}