<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
            
           
           $_SESSION = array();
           session_destroy();
           $this->session->sess_destroy();
   
		$this->session->unset_userdata('web_admin_user_name');
		$this->session->unset_userdata('web_admin_user_id');
		$this->session->unset_userdata('web_admin_logged_in');
		$this->session->unset_userdata('web_admin_user_level');
		$this->session->sess_destroy();
                
                delete_cookie('uname'); 
                delete_cookie('uno'); 
                delete_cookie('pwd'); 
                                
		redirect('kaizen/welcome','refresh');
	}
}