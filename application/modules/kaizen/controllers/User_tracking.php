<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_tracking extends MY_Controller 
{
	private $limit = 20;
	var $offset = 0;
	function __construct()
	{
		parent::__construct();		 
				
		if( ! $this->session->userdata('web_admin_logged_in')) {
			redirect('kaizen/welcome','refresh');
		}
        if($this->session->userdata('user_level')!=1){
            redirect('kaizen/welcome','refresh');
        }
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'common/header',
		  'left' => 'common/left',
		  'footer' => 'common/footer',
          'copyright' => 'common/copyright'
		));
		$this->load->model('modeluser_tracking');	
		$this->load->library('pagination');
	}

	public function index()
	{	
		$offsets = (($this->uri->segment(4)) ? $this->uri->segment(4) : 1);
		if($offsets>1){$this->offset = (($offsets - 1)*$this->limit);}else{$this->offset = ($offsets - 1);}
		$searchstring = xss_clean(rawurldecode($this->input->get('q')));
		$this->dolist($searchstring);		
	}
	

	public function pagination($searchstring="",$total_row=0){
		$config['use_page_numbers'] = TRUE;		
		if(!empty($searchstring)){
			$config['uri_segment'] = 5;
			$config['base_url'] = site_url("kaizen/user_tracking/dosearch/".rawurlencode($searchstring)."/");
		}
		else{
			$config['uri_segment'] = 4;
			$config['base_url'] = site_url("kaizen/user_tracking/index/");
		}
		$config['total_rows'] = $total_row;
		$config['per_page'] = $this->limit;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['first_tag_open'] = '<li>';	
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		return $config;
	}
	
	
	public function dolist($searchstring=""){
		$data = array();
        $where = array();
		
		$total_row = $this->modeluser_tracking->getCountAll("tracking",$searchstring);
		$this->pagination($searchstring,$total_row);
		$data['q'] = $searchstring;
		
        $order_by = array('created_date' => 'desc');
        // $user_tracking_detls = $this->modeluser_tracking->select_row('tracking',$where,$order_by);
		$user_tracking_detls = $this->modeluser_tracking->getAllDetails("tracking",$this->limit,$this->offset,$searchstring);
		
		// $this->pagination($total_row);
		if($user_tracking_detls){
			$data['user_tracking_detls'] = $user_tracking_detls;
		}
		else{
			$data['user_tracking_detls']->approved = 1;
			$data['user_tracking_detls']->id = 0;
		}
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('kaizen/user_tracking_list',$data);		
	}
}