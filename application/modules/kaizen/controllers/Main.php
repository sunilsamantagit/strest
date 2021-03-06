<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('web_admin_logged_in') && get_cookie('uname')=='') {
                    redirect('kaizen/welcome','refresh');
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
            
                 if(get_cookie('uname')!=''){
                $c_dyls = $this->model_common->selectOne('admin',array('user_name'=>get_cookie('uname')));
        
                                        $session_data = array(
					   "web_admin_user_name"   => $c_dyls->user_name,
					   "web_admin_user_id"     => $c_dyls->id,
					   "SITE_ID"  	           => 1,
					   "user_level"  	   => $c_dyls->user_level,
					   "module"  	           => $c_dyls->module,
					   "web_admin_logged_in"   => TRUE
					 );

					//$this->model_login->update($c_dyls->id,$c_dyls->user_name);
                                        $this->session->set_userdata($session_data);
                                        
                                        
        
    }
   
    
            
            
            
            
          // echo $this->session->userdata('web_admin_logged_in');die;
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
