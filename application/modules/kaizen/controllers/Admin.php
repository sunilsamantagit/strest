<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MY_Controller 
{
	private $limit = 20;
	var $offset = 0;
	function __construct()
	{
		parent::__construct();	
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'common/header',
		  'left' => 'common/left',
          'right' => 'common/right',
		  'footer' => 'common/footer'
		));
		$this->load->model('modeladmin');	
	}
	public function index()
	{	
		$this->dolist();	
	}
	public function dolist(){
                
		$data = array();
               
		$where = array();
		$order_by = array('id' => 'asc');
		$data_row = $this->modeladmin->select_row('admin',$where,$order_by);
		$data['records']= $data_row;
                
		$this->load->view('admin/admin_list',$data);		
	}
    public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$admin_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $admin_id;	
        	
		$this->load->view('admin/edit_admin',$data);		
	}
   
	public function addedit()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('full_name', 'Name', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_name', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('admin_id','');
        $selected_id=$this->input->post('selected_id','');
        $this->page_id=implode(',',$selected_id).',';//var_dump($this->page_id);die();
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{	
				$where = array('id' => $id);
                $admin_detls = $this->modeladmin->select_row('admin',$where);
				
        		if(!empty($admin_detls)) 
                {
								
								
                                $this->full_name		=$this->input->post('full_name',TRUE);
								$this->user_name		=$this->input->post('user_name',TRUE);
								$this->pwd				=$this->input->post('pwd',TRUE);
                                $this->is_active		=$this->input->post('is_active',TRUE); 
                                if($this->is_active===false){
                                        $this->is_active='1';
                                }
                                $update_data = array(
                                    'full_name' 			=> $this->full_name,
									'user_name' 			=> $this->user_name,
									'pwd' 					=> SHA1($this->pwd),
									'pwd_hint' 				=> $this->pwd,
                                    'is_active' 			=> $this->is_active
                                );
                                
                #echo "<pre>";print_r($update_data);exit;
				$update_where = array('id' => $id);
				if($this->modeladmin->update_row('admin',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{
					
					$session_data = array("SUCC_MSG"  => "Users Updated Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Users Not Updated.");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{ 
						$this->full_name		=$this->input->post('full_name',TRUE);
						$this->user_name		=$this->input->post('user_name',TRUE);
						$this->pwd				=$this->input->post('pwd',TRUE);
                        $this->is_active		=$this->input->post('is_active',TRUE); 

                                
                        if($this->is_active===false){
                            $this->is_active='1';
                        }
                $add_data = array(
                                   'full_name' 			=> $this->full_name,
									'user_name' 		=> $this->user_name,
                                    'is_active' 		=> $this->is_active,
									'pwd' 				=> SHA1($this->pwd),
									'pwd_hint' 			=> $this->pwd,
									'date' 				=> date('Y-m-d'),
                                );
                #echo "<pre>";print_r($add_data);exit;               
				$id = $this->modeladmin->insert_row('admin',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{ 
                    
					$session_data = array("SUCC_MSG"  => "Users Inserted Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Users Not Inserted.");
					$this->session->set_userdata($session_data);				
				}
				
			}//echo $this->db->last_query();die();
			redirect("kaizen/admin/doedit/".$id,'refresh');
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
		$admin_id=$this->uri->segment(4);
		$where = array('id' => $admin_id );
        $admin_detls = $this->modeladmin->selectOne('admin',$where);
		if($admin_detls){
			$data['details'] = $admin_detls;
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}
		
		$this->load->view('admin/edit_admin',$data);		
	}
   public function checkusername(){
            $user_name = $this->input->post('user_name');
          
            $where = array('user_name' => $user_name);
      		if($this->modeladmin->selectOne('admin',$where))
			{
              echo '0';
      		} 
            else
			{
              echo '1';
            }
    }	 
}