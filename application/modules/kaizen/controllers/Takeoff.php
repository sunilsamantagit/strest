<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Takeoff extends MY_Controller 
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
		
		$this->load->model('modeltakeoff');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	
	
	public function dolist(){
		$data = array();
		$where = array();
               
        $order_by = array('id' => 'DESC');
		$data_row = $this->modeltakeoff->select_row('takeoff',$where,$order_by);		
		$data['records']= $data_row;
		$this->load->view('kaizen/takeoff/takeoff_list',$data);		
	}
	
	public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$takeoff_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $takeoff_id;
		
		$where = array('is_active'=>1);
        $order_by = array('title' => 'asc');
	    
		
		$this->load->view('kaizen/takeoff/edit_takeoff',$data);		
	}
    
	public function addedit()
	{//echo "<pre>";print_r($_POST);exit;

		$posting_date=$this->input->post('takeoff_start_date');
        $date=date('Y-m-d',strtotime($posting_date));
        	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('takeoff_project_no', 'takeoff_quate_no', 'trim|required|xss_clean');
		
		
		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('takeoff_id','');
	 	$takeoff_detls ='';
	 	$uplod_img='';
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{
			$where = array(                           
                            'id' => $id
                        );
                $takeoff_detls = $this->modeltakeoff->select_row('takeoff',$where);
				
        		if(!empty($takeoff_detls)) 
                {
           $update_data = array(            
								'project_no'			=>	$this->input->post('takeoff_project_no'),
								'quote_no'				=>	$this->input->post('takeoff_quate_no'),
								'date'					=>	$date,
								'addenda'				=>	$this->input->post('takeoff_addenda'),
								'pricing_units'			=>	$this->input->post('pricing_units'),
								'project_title'			=>	$this->input->post('takeoff_project_title'),
								'erect'					=>	$this->input->post('erect'),
								'fob'					=>	$this->input->post('takeoff_fob'),
								'location'				=>	$this->input->post('takeoff_location'),
								'legal'					=>	$this->input->post('takeoff_legal'),
								'owner'					=>	$this->input->post('takeoff_owner'),
								'place'					=>	$this->input->post('takeoff_place'),
								'tel'					=>	$this->input->post('takeoff_tel'),
								'fax'					=>	$this->input->post('takeoff_fax'),
								'mobile'				=>	$this->input->post('takeoff_mobile'),
								'contact'				=>	$this->input->post('takeoff_contact'),
								'closing_bid_depository'=>	$this->input->post('closing_bid_depository'),
								'clo_rulings'			=>	$this->input->post('takeoff_rulings'),
								'clo_date_time'			=>	$this->input->post('takeoff_datetime'),
								'clo_place'				=>	$this->input->post('takeoff_clo_place'),
								'clo_GST'				=>	$this->input->post('takeoff_GST'),
								'clo_PST'				=>	$this->input->post('takeoff_GST'),
								'clo_other_tax'			=>  $this->input->post('takeoff_othertax'),
								'bid_bond'				=>	$this->input->post('bid_bond'),
								'perform_bond'			=>	$this->input->post('perform_bond'),
								'lab_mat_bond'			=>	$this->input->post('lab_mat_bond'),
								'holdback'				=>	$this->input->post('takeoff_holdback'),
								'architect_name'		=>	$this->input->post('takeoff_holdback'),
								'architect_place'		=>	$this->input->post('takeoff_architect_place'),
								'architect_contact'		=>	$this->input->post('takeoff_architect_contact'),
								'architect_tel'			=>	$this->input->post('takeoff_architect_tel'),
								'architect_fax'			=>	$this->input->post('takeoff_architect_fax'),
								'engineer_name'			=>	$this->input->post('takeoff_engineer_name'),
								'engineer_place'		=>	$this->input->post('takeoff_engineer_place'),
								'engineer_contact'		=>	$this->input->post('takeoff_engineer_contact'),
								'engineer_tel'			=>	$this->input->post('takeoff_engineer_tel'),
								'engineer_fax'			=>	$this->input->post('takeoff_engineer_fax'),
								'status'				=>	'1'
                                );                              
                
				$update_where = array('id' => $id);
				if($this->modeltakeoff->update_row('takeoff',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{				
					$session_data = array("SUCC_MSG"  => "Takeoff - Description Entries Updated Successfully");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Takeoff - Description Entries Not Updated");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{           
              $add_data = array(            
								'project_no'			=>	$this->input->post('takeoff_project_no'),
								'quote_no'				=>	$this->input->post('takeoff_quate_no'),
								'date'					=>	$date,
								'addenda'				=>	$this->input->post('takeoff_addenda'),
								'pricing_units'			=>	$this->input->post('pricing_units'),
								'project_title'			=>	$this->input->post('takeoff_project_title'),
								'erect'					=>	$this->input->post('erect'),
								'fob'					=>	$this->input->post('takeoff_fob'),
								'location'				=>	$this->input->post('takeoff_location'),
								'legal'					=>	$this->input->post('takeoff_legal'),
								'owner'					=>	$this->input->post('takeoff_owner'),
								'place'					=>	$this->input->post('takeoff_place'),
								'tel'					=>	$this->input->post('takeoff_tel'),
								'fax'					=>	$this->input->post('takeoff_fax'),
								'mobile'				=>	$this->input->post('takeoff_mobile'),
								'contact'				=>	$this->input->post('takeoff_contact'),
								'closing_bid_depository'=>	$this->input->post('closing_bid_depository'),
								'clo_rulings'			=>	$this->input->post('takeoff_rulings'),
								'clo_date_time'			=>	$this->input->post('takeoff_datetime'),
								'clo_place'				=>	$this->input->post('takeoff_clo_place'),
								'clo_GST'				=>	$this->input->post('takeoff_GST'),
								'clo_PST'				=>	$this->input->post('takeoff_GST'),
								'clo_other_tax'			=>  $this->input->post('takeoff_othertax'),
								'bid_bond'				=>	$this->input->post('bid_bond'),
								'perform_bond'			=>	$this->input->post('perform_bond'),
								'lab_mat_bond'			=>	$this->input->post('lab_mat_bond'),
								'holdback'				=>	$this->input->post('takeoff_holdback'),
								'architect_name'		=>	$this->input->post('takeoff_holdback'),
								'architect_place'		=>	$this->input->post('takeoff_architect_place'),
								'architect_contact'		=>	$this->input->post('takeoff_architect_contact'),
								'architect_tel'			=>	$this->input->post('takeoff_architect_tel'),
								'architect_fax'			=>	$this->input->post('takeoff_architect_fax'),
								'engineer_name'			=>	$this->input->post('takeoff_engineer_name'),
								'engineer_place'		=>	$this->input->post('takeoff_engineer_place'),
								'engineer_contact'		=>	$this->input->post('takeoff_engineer_contact'),
								'engineer_tel'			=>	$this->input->post('takeoff_engineer_tel'),
								'engineer_fax'			=>	$this->input->post('takeoff_engineer_fax'),
								'created_date'			=> date('Y-m-d'),
								'status'				=>	'1'
                                );
                               // print_r($add_data);echo "validation come";exit;
				$id = $this->modeltakeoff->insert_row('takeoff',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{                   
					$session_data = array("SUCC_MSG"  => "Takeoff - Description Entries Inserted Successfully");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Takeoff - Description Entries Not Inserted");
					$this->session->set_userdata($session_data);				
				}
			}
			redirect("kaizen/takeoff/doedit/".$id,'refresh');			
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
		$takeoff_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $takeoff_id
                        );
        $takeoff_detls = $this->modeltakeoff->select_row('takeoff',$where);                       
		if($takeoff_detls){
			$data['details'] = $takeoff_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}
		
		
		$this->load->view('kaizen/takeoff/edit_takeoff',$data);				
	}
        
        
        public function view()
	{
		$data = array();
		$takeoff_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $takeoff_id
                        );
        $takeoff_detls = $this->modeltakeoff->select_row('takeoff',$where);                       
		if($takeoff_detls){
			$data['details'] = $takeoff_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}
		
		
		$this->load->view('kaizen/takeoff/view_takeoff',$data);				
	}

	public function doduplicate()
	{
		$data = array();
		$takeoff_id=$this->uri->segment(4);
		$id=$this->modeltakeoff->get_data($takeoff_id);
		redirect('kaizen/takeoff/doedit/'.$id);
		//redirect(kaizen/takeoff/doedit/$id);

		//echo "<pre>";print_r($getdata);exit;
		/*
        $takeoff_detls = $this->modeltakeoff->select_row('takeoff',$where);



        foreach ($takeoff_detls as $row) {echo $row;
        	
        }
        if($takeoff_detls){
			$data['details'] = $takeoff_detls[0];
		}
		echo $takeoff_detls[0]['id'];
        print_r($details);exit;*/
		//$takeoff_detls = $this->modeltakeoff->clonedata_insert($id);
	}


	
	
	
	
}