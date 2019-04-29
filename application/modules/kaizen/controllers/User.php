<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
	private $limit = 20;
	var $offset = 0;
	function __construct()
	{
		parent::__construct();

		if( ! $this->session->userdata('web_admin_logged_in')) {
			redirect('kaizen/welcome','refresh');
		}
//        if($this->session->userdata('user_level')!=1){
//            redirect('kaizen/welcome','refresh');
//        }
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'common/header',
		  'left' => 'common/left',
                  'right' => 'common/right',
		  'footer' => 'common/footer',
                 'copyright' => 'common/copyright'
		));

		$this->load->model('modeluser');
	}

	public function index()
	{

		$this->dolist();
	}



	public function dolist(){
            
            if($this->session->userdata('user_level')!=1) {
                redirect('kaizen/welcome','refresh');
		}
                
        //pre($this->session->all_userdata());
		$data = array();

            $where = array();
        $order_by = array('id' => 'asc');
		$data_row = $this->modeluser->select_row('admin',$where,$order_by);
		$data['records']= $data_row;
        //pre($data);
		$this->load->view('kaizen/user/user_list',$data);
	}

	public function doadd(){
		$data = array();
    $data['details']= new stdClass;
		$contact_id=$this->uri->segment(4);
		$data['details']->approved = 1;
		$data['details']->id = $contact_id;

		$this->load->view('user/edit_user',$data);
	}

	public function addedit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
		$editid = '';

		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('user_id','');
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)
		{
			$where = array(
                      'id' => $id
                    );
                        $user_detls = $this->modeluser->select_row('admin',$where);
        		if(!empty($user_detls))
                {

			//$editid = tracking($this->modeluser->field_arr,$id,'admin','admin',$editid,'edit');
                                $this->user_title		=$this->input->post('user_title',TRUE);
                                $this->first_name		=$this->input->post('first_name',TRUE);
                                $this->last_name		=$this->input->post('last_name',TRUE);
                                $this->change_password	=$this->input->post('change_password');
                                $this->user_level		=$this->input->post('user_level',TRUE);
                                $this->user_name        =$this->input->post('user_name');
                                $this->user_email       =$this->input->post('user_email');
                                $this->approved         =$this->input->post('approved',TRUE);

							$this->change_password;
                            if($this->approved===false){
                                    $this->approved='1';

                            }
                            if($this->change_password==1){
                                $this->pwd              =$this->input->post('pwd');
                                $update_data = array(
                                   'full_name'                 => $this->user_title,
                                   'first_name'                 => $this->first_name,
                                   'last_name'                 => $this->last_name,
                                    'user_name'                 => $this->user_name,
                                    'user_email'                => $this->user_email,
                                    'user_level'                => $this->user_level,
                                    'pwd'                       => SHA1($this->pwd),
                                    'pwd_hint'                  => $this->pwd,
                                    'date'                      => date('Y-m-d'),
                                    'approved'          		=> $this->approved
                                    );
                            }else{
                                $update_data = array(
                                    'full_name'                 => $this->user_title,
                                    'first_name'                 => $this->first_name,
                                    'last_name'                 => $this->last_name,
                                    'user_name'                 => $this->user_name,
                                    'user_email'                => $this->user_email,
                                    'user_level'                => $this->user_level,
                                    'date'                      => date('Y-m-d'),
                                    'approved'          		=> $this->approved
                                );
                            }
				$update_where = array('id' => $id);
				if($this->modeluser->update_row('admin',$update_data,$update_where)){
					tracking($this->modeluser->field_arr,$id,'admin','admin',$editid,'edit');
					$session_data = array("SUCC_MSG"  => "User Updated Successfully.");
					$this->session->set_userdata($session_data);
				}else{
					$session_data = array("ERROR_MSG"  => "User Not Updated.");
					$this->session->set_userdata($session_data);
				}
			} else {
                                $this->user_title		=$this->input->post('user_title',TRUE);
                                $this->first_name		=$this->input->post('first_name',TRUE);
                                $this->last_name		=$this->input->post('last_name',TRUE);
                                $this->user_level		=$this->input->post('user_level',TRUE);
                                $this->user_name        =$this->input->post('user_name');
                                $this->pwd              =$this->input->post('pwd');
                                $this->user_email       =$this->input->post('user_email');
                                $this->approved         =$this->input->post('approved',TRUE);

                if($this->approved===false){
                        $this->approved='1';
                }

                $add_data = array(
                                'full_name'                 => $this->user_title,
                                'first_name'                 => $this->first_name,
                                 'last_name'                 => $this->last_name,
                                'user_name'                 => $this->user_name,
                                'user_email'                => $this->user_email,
                                'user_level'                => $this->user_level,
                                'pwd'                       => SHA1($this->pwd),
                                'pwd_hint'                  => $this->pwd,
                                'date'                      => date('Y-m-d'),
                                'approved'          		=> $this->approved
                );

				$id = $this->modeluser->insert_row('admin',$add_data);
				if($id){
					if(!empty($this->modeluser->field_arr)){
                    	tracking($this->modeluser->field_arr,$id,'admin','admin',$editid,'add');
					}
					$session_data = array("SUCC_MSG"  => "User Created Successfully.");
					$this->session->set_userdata($session_data);
				}else{
					$session_data = array("ERROR_MSG"  => "User Not Created.");
					$this->session->set_userdata($session_data);
				}

			}
			redirect("kaizen/user/doedit/".$id,'refresh');
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
            $contact_id=$this->uri->segment(4);
           // echo $this->session->userdata('web_admin_user_id').'----'.$contact_id;die;
                
              if($this->session->userdata('user_level')==2){
              if($this->session->userdata('web_admin_user_id')==$contact_id) {
                
                }else{redirect('kaizen/welcome','refresh');}
              }
            
	
            $data = array();	

		$where = array(
                            'id' => $contact_id
                        );
        $contact_detls = $this->modeluser->select_row('admin',$where);
		if($contact_detls){
			$data['details'] = $contact_detls[0];
		}
		else{
			$data['details']->approved = 1;
			$data['details']->id = 0;
		}
		$this->load->view('user/edit_user',$data);

	}
        
	public function user_tracking()
	{
		$data = array();
		$user_username=$this->uri->segment(4);

		$where = array(
                            'update_by' => $user_username
							//'action' => 'edit'
                        );
		$data['tracking_username'] = $user_username;
        $user_tracking_detls = $this->modeluser->select_row('tracking',$where);
		if($user_tracking_detls){
			$data['user_tracking_detls'] = $user_tracking_detls;
		}
		else{
			//$data['user_tracking_detls']->approved = 1;
			//$data['user_tracking_detls']->id = 0;
		}
		//echo $this->db->last_query();
		$this->load->view('tracking_user',$data);

	}
}
