<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tracking extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();		 
		
		if( ! $this->session->userdata('web_admin_logged_in')) {
			redirect('kaizen/welcome','refresh');
		}
    $this->load->model('modeltracking');
		$this->load->model("common/model_common");	
	}
	public function details()
	{	
		$tacking_id = $this->uri->segment(4);
		$where = array(
						'id' => $tacking_id
					);
		$data['details'] = $this->model_common->select_row('tracking',$where);
		if(!empty($data['details'][0]->element_id) && !empty($data['details'][0]->table_name)){
				//echo $data['details'][0]->element_id;
				$where = array(
						'id' => $data['details'][0]->element_id
					);
				$data['main_table_details'] = $this->model_common->select_row($data['details'][0]->table_name,$where);
					
		}
		$this->load->view("kaizen/tracking",$data);
	}

}