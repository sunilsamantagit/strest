<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends MY_Controller
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

		$this->load->model('modelsettings');
	}

	public function index()
	{
		$this->dolist();
	}

	public function dolist(){
		$data = array();
		$where = array();

    $order_by = array('display_order' => 'asc');
		$data_row = $this->modelsettings->select_row('membership',$where,$order_by);
		$data['records']= $data_row;

		$this->load->view('kaizen/membership/membership_list',$data);
	}

	public function doadd(){
		$data = array();
    $data['details']= new stdClass;
		$membership_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $membership_id;

		$where = array('is_active'=>1);
    $order_by = array('title' => 'asc');
	  $data['page_list'] = $this->modelsettings->select_row('cms_pages',$where,$order_by);

		$this->load->view('kaizen/membership/edit_membership',$data);
	}

	public function addedit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('membership_title', 'Title', 'trim|required|xss_clean');


		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('membership_id','');
	 	$membership_detls ='';
	 	$uplod_img='';
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)
		{
			$where = array(
                            'id' => $id
                        );
            $membership_detls = $this->modelsettings->select_row('membership',$where);
						$update_data = array(
                                'title' 	=> $this->input->post('membership_title',TRUE),
                                'type'  	=> $this->input->post('type',TRUE),
                                'price' 	=> $this->input->post('price',TRUE),
                                'display_order' => empty($this->input->post('display_order',TRUE))?'0':$this->input->post('display_order',TRUE),
                                'is_active' 	=> $this->input->post('is_active',TRUE)
                            );//pre($update_data);die();
    		if(!empty($membership_detls))
            {
				$update_where = array('id' => $id);
				if($this->modelsettings->update_row('membership',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{
					$session_data = array("SUCC_MSG"  => "Member and Sponsor updated successfully.");
					$this->session->set_userdata($session_data);
				}
				else
				{
					$session_data = array("ERROR_MSG"  => "Member and Sponsor is not updated.");
					$this->session->set_userdata($session_data);
				}
			}
			else
			{
                $id = $this->modelsettings->insert_row('membership',$update_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{

					$session_data = array("SUCC_MSG"  => "Member and Sponsor inserted successfully.");
					$this->session->set_userdata($session_data);
				}
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{
					$session_data = array("ERROR_MSG"  => "Member and Sponsor is not inserted.");
					$this->session->set_userdata($session_data);
				}
			}
			redirect("kaizen/membership/doedit/".$id,'refresh');
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
		$membership_id=$this->uri->segment(4);
		$where = array(
                    'id' => $membership_id
                  );
        $membership_detls = $this->modelsettings->select_row('membership',$where);
		if($membership_detls){
			$data['details'] = $membership_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}

		  $where1 = array('is_active'=>1);
                $order_by = array('title' => 'asc');
		$data['page_list'] = $this->modelsettings->select_row('cms_pages',$where1,$order_by);

		$this->load->view('kaizen/membership/edit_membership',$data);
	}
}
