<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Takeoff extends MY_Controller 
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
		
		$this->load->model('modeltakeoff');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	
	
	public function dolist(){
		$data = array();
		$where = array();
               
        $order_by = array('display_order' => 'asc');
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
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('takeoff_title', 'Title', 'trim|required|xss_clean');
		
		
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
                   
			                     
                                $this->title		=$this->input->post('takeoff_title',TRUE);
                                $this->is_active		=$this->input->post('is_active',TRUE); 
                                if($this->is_active===false){
                                        $this->is_active='1';
                                }
							
			 
								
                                $update_data = array(
                                  
                                    'title'                             => $this->title,
                                    'is_active' 			=> $this->is_active
                                );
                                
                
				$update_where = array('id' => $id);
				if($this->modeltakeoff->update_row('takeoff',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{
				
					$session_data = array("SUCC_MSG"  => "Home Block Updated Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Home Block Not Updated.");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{           
                                $this->title                    =$this->input->post('takeoff_title',TRUE);
                                $this->is_active		=$this->input->post('is_active',TRUE); 
                             if($this->is_active===false){
                                $this->is_active='1';
                }
					
                             
			
              
                $add_data = array(
                                    
                                    'title' 			        => $this->title,
                                    'page_link'                 => name_replaceCat('home_block',$this->title),
                                    'is_active'                 => $this->is_active
                                );
                                
				$id = $this->modeltakeoff->insert_row('takeoff',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{ 
                   
					$session_data = array("SUCC_MSG"  => "Home Block Inserted Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Home Block Not Inserted.");
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
	
	
	
	
}