<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Welcome extends CI_Controller {

	public function __construct() {
            parent::__construct();
            // Set master content and sub-views
            $this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'kaizen/common/header_login',
		  'footer' => 'kaizen/common/footer_login'
		));
            $this->load->model("model_login");
	}

	public function index(){
		if($this->session->userdata('web_admin_logged_in')==TRUE) {
			redirect('kaizen/main','refresh');
		}
		$data['error'] = "Please login with your credentials";


		$this->load->view('login/login', $data);
	}

	public function authentication(){
		$this->load->helper('security');
		$username = xss_clean($this->input->post('uname'));
		$password = xss_clean($this->input->post('pwd'));

		if($username == "" || $password == "")
		{

                        $err['uname'] =  'Invalid Username/Password';
                        echo json_encode($err);
		}
		else
		{

                        $where = array(
                            'user_name' => $username,
                            'pwd' => SHA1($password),
                            'approved' => '1'

                        );

                        $result= $this->model_login->select_row('admin',$where);

			if(!empty($result))
			{
					$session_data = array(
					   "web_admin_user_name"  	=> $username,
					   "web_admin_user_id"  	=> $result[0]->id,
					   "SITE_ID"  	=> 1,
					   "user_level"  	=> $result[0]->user_level,
					   "module"  	=> $result[0]->module,
					   "web_admin_logged_in"	=> TRUE
					);

					$this->model_login->update($result[0]->id,$username);

					$this->session->set_userdata($session_data);
					$err =  '';
					echo json_encode($err);
			}
			else
			{
				//$this->model_login->update(0,$username);
				$err['uname'] =  'Invalid Username/Password';
                                echo json_encode($err);
			}
		}
	}

        function forgetpassword(){
			//$this->load->model('kaizen/model_login');
			$email		= $this->input->post('forget_password',TRUE);

			$where_memdetails = array('user_email' => $email);
        	$memdetails = $this->model_login->select_row('admin',$where_memdetails);

			$where_admindetails = array('id' => '1');
        	//$admindetails = $this->model_login->select_row('site_settings',$where_admindetails);

			if(!empty($memdetails)){
				$this->load->library('email');
				$config['wordwrap'] = TRUE;
				$config['validate'] = TRUE;
				$config['mailtype'] = 'html';
				$message="Hi, ".$memdetails[0]->full_name." <a href=".site_url('kaizen/welcome/resetpassword/'.urlencode(base64_encode($memdetails[0]->id))).">Click here to reset password</a>";
				$this->email->initialize($config);
				//$admin = $admindetails[0]->email;
                                $admin = 'admin@forgotpassword.com';
				$this->email->from($admin);
				$this->email->to($email);
				$this->email->subject("Forgot Password");
				$this->email->message($message);
				$this->email->send();
				$err =  '';
                                //echo json_encode($err);
                                echo 1;
			}else{
				$err['data_insert_error'] = "<h4 align='center' style='color:red'><br/>Please Provide Correct Email Id...</h4>";
				echo json_encode($err);
			}
		}

		function resetpassword(){
                    //echo base64_decode(urldecode($this->uri->segment(4))); exit;
			$data = array();
			$data['member_id'] = base64_decode(urldecode($this->uri->segment(4)));
			$this->load->view('login/resetpassword_view', $data);
		}

	function resetpasswordsave(){
			//$this->load->model('kaizen/model_login');
			$member_id		= $this->input->post('member_id',TRUE);
			$member_password		= $this->input->post('password',TRUE);

			$upd_data = array('pwd' => SHA1($member_password),'pwd_hint' => $member_password);
            $where_cond=array('id' => $member_id);

			if($this->model_login->update_row('admin',$upd_data,$where_cond)){
			$err[] =  '';
            echo json_encode($err);
			}
			else
			{
			 $err['data_insert_error'] = "<h4 align='center' style='color:color:#71bf43'><br/>Please Try Again...</h4>";
			 echo json_encode($err);
			}
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
