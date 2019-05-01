<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lumbsum extends MY_Controller 
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
		
		$this->load->model('modellumbsum');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	
	
	public function dolist(){
		$data = array();
		$where = array();
               
        $order_by = array('id' => 'asc');
		$data_row = $this->modellumbsum->select_row('bh_lumbsum',$where,$order_by);
		$data['records']= $data_row;
//echo '<pre>';print_r($data['records']);exit;
		$this->load->view('kaizen/lumbsum/lumbsum_list',$data);		
	}
	
	public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$lumbsum_id=$this->uri->segment(4);
		$data['details']->status = 1;
		$data['details']->id = $lumbsum_id;
		
		$where = array('status'=>1);
        $order_by = array('title' => 'asc');
	 //echo '<pre>';print_r($data['data']);exit;   
	//echo "<pre>"; print_r($data); exit();	
		$this->load->view('kaizen/lumbsum/edit_lumbsum',$data);		
	}
    
	public function addedit()
	{
//echo "<pre>"; print_r($_POST);exit;
		
		/*$add_data1 = array(
							'lumbsum_name'	=>	$this->input->post('lumbsum_entry_name'),
							'status'		=>	$this->input->post('lumbsum_status')
				
						);
						
		$id = $this->modellumbsum->insert_row('lumbsum',$add_data1);
		if($id) { 
		echo "Lumb Sum Inserted Successfully..";
			$session_data = array("SUCC_MSG"  => "Lumb Sum Inserted Successfully.");
			$this->session->set_userdata($session_data);					
		}	
		redirect("kaizen/lumbsum/",'refresh');*/
	//.........................new..............................\\	
	
//print_r($add_data1);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('lumbsum_entry_name', 'Title', 'trim|required|xss_clean');
		
		
		//$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('lumbsum_id','');
	 	//$takeoff_detls ='';
	 	//$uplod_img='';
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{	
			$where = array(
                           
                            'id' => $id
                        );
                $lumbsum_detls = $this->modellumbsum->select_row('lumbsum',$where);
				
        		if(!empty($lumbsum_detls)) 
                {
                   
	//echo "<pre>"; print_r($_POST);exit;		                     
                                $this->lumbsum_name  =$this->input->post('lumbsum_entry_name',TRUE);
                                $this->status		 =$this->input->post('lumbsum_status',TRUE); 
                                if($this->status===false){
                                        $this->status='1';
                                }
							
			 
								
                                $update_data = array(
                                  
                                    'lumbsum_name' => $this->lumbsum_name,
                                    'status'       => $this->status
                                );
                                
                
				$update_where = array('id' => $id);
				if($this->modellumbsum->update_row('lumbsum',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{
				
					$session_data = array("SUCC_MSG"  => "Lumb Sum Entries Updated Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Lumb Sum Entries Not Updated.");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{           
                                $this->lumbsum_name         =$this->input->post('lumbsum_entry_name',TRUE);
                                $this->status     =$this->input->post('lumbsum_status',TRUE); 
                             if($this->status===false){
                                $this->status='1';
                }
					
                             
			
              
                $add_data = array(
                                    
                                    'lumbsum_name' 	   => $this->lumbsum_name,
                                    'status'           => $this->status
                                );
                                
				$id = $this->modellumbsum->insert_row('lumbsum',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{ 
                   
					$session_data = array("SUCC_MSG"  => "Lumb Sum Entries Inserted Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Lumb Sum Entries Not Inserted.");
					$this->session->set_userdata($session_data);				
				}
			}
			redirect("kaizen/lumbsum/",'refresh');
			//redirect("kaizen/lumbsum/doedit/".$id,'refresh');			
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
		$lumbsum_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $lumbsum_id
                        );
        $lumbsum_detls = $this->modellumbsum->select_row('lumbsum',$where);                       
		if($lumbsum_detls){
			$data['details'] = $lumbsum_detls[0];
		}
		else{
			$data['details']->status = 1;
			$data['details']->id = 0;
		}
		
		
		$this->load->view('kaizen/lumbsum/edit_lumbsum',$data);				
	}
	
	
	
	
}