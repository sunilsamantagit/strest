<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if( ! $this->session->userdata('web_admin_logged_in')) {redirect('kaizen/welcome','refresh');
		}
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'kaizen/common/header',
		  'left' => 'kaizen/common/left',
		  'footer' => 'kaizen/common/footer'
		));
	}

	function index()
	{
		$where = array( 'action' => 'edit' );
    $order_by = array('created_date'=>'desc');
    $tracking_result = $this->model_home->select_row('tracking',$where,$order_by,10);
    $data['user_tracking_detls'] = $tracking_result;

		if($this->session->userdata('web_admin_logged_in'))
		{
			if(!$this->session->userdata('SITE_ID'))
			{
			$this->session->set_userdata(array('SITE_ID'=>'1'));
			}
            $where = array('id'=>'1');

            $site_settings = $this->model_home->select_row('site_settings',$where);
            $data['site_settings'] = $site_settings;

			$this->load->view('dashboard/dashboard_view',$data);
		}
		else
		{
			redirect('kaizen/welcome','refresh');
		}
	}
	function ajax_site()
	{
		if($this->session->userdata('web_admin_logged_in'))
		{

			$site	=	$this->input->post('site',TRUE);
			if(!empty($site))
			{
				$this->session->set_userdata(array('SITE_ID'=>$site));
			}
			else
			{
				$this->session->set_userdata(array('SITE_ID'=>'1'));
			}

		echo $this->session->userdata('SITE_ID');
		}
		else
		{
			redirect('kaizen/welcome','refresh');
		}
	}


}
