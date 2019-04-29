<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('common/model_common');
		$this->load->vars( array(
			'cta' => 'common/cta'
			//'contact_form' => 'common/contact_form'
		));

	}
public function google_map(){
	$id = $this->uri->segment(3);

	$this->data['default_lat'] = $this->data['site_settings']->latitude;
	$this->data['default_lng'] = $this->data['site_settings']->longitude;
	$this->data['address'] = $this->data['site_settings']->address;
	$this->data['id'] = $id;
	$this->load->view('common/google_map_dealers_v3',$this->data);
}
public function google_map_xml(){
	$this->data['default_lat'] = $this->data['site_settings']->latitude;
	$this->data['default_lng'] = $this->data['site_settings']->longitude;
	$this->data['contact_title'] = $this->config->item('COMPANY_NAME');

	 $this->data['address'] = strip_tags($this->data['site_settings']->address);

	$this->load->view('common/google_map_xml',$this->data);
}

public function contact_form(){
			$name			=	$this->input->post('name',TRUE);
			$email		=	$this->input->post('email',TRUE);
			$phone		=	$this->input->post('phone',TRUE);
			$comments	=	$this->input->post('comments',TRUE);

			$contact 	= $this->model_common->select_row('contact');
			$to_email = $contact[0]->contact_from_email;
		//echo $this->db->last_query();
			$err = array();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('phone', 'Phone Number', 'min_length[14]');
			$this->form_validation->set_rules('comments', 'Comments', 'trim|required|xss_clean');
			if($this->form_validation->run() == TRUE)
			{
				$this->load->library('email');
				$config['wordwrap'] = TRUE;
				$config['validate'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$message ='<!DOCTYPE HTML>
				<html>
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<title>'.$this->config->item("COMPANY_NAME").'</title>
				</head>
				<body>
				<table align="center" width="600" border="1" cellpadding="4" cellspacing="0">
				<tr><td><b>Name:</b></td><td>'.stripslashes($name).'</td></tr>
				<tr><td><b>Email:</b></td><td>'.$email.'</td></tr>
				<tr><td><b>Phone:</b></td><td>'.$phone.'</td></tr>';

				if(!empty($comments)){
					$message.='<tr><td valign="top"><b>Comments: </b></td><td>'.$comments.'</td></tr>';
				}
				$message.='</table>
				</body>
				</html>';

				$this->email->from("donotreply@kaizen2.ca");
				 //$this->email->to("trupti@2webdesign.com");
				$this->email->to($to_email);
				$this->email->reply_to($email);
				$this->email->subject("Message from contact form - ".$name);
				$this->email->message($message);
				$this->email->send();
				// echo $this->email->print_debugger(); die; exit;
				$err =  '';
				echo json_encode($err);
			}
			else{
				$err['name'] = form_error('name');
				$err['phone'] = form_error('phone');
				$err['email'] = form_error('email');
				$err['comments'] = form_error('comments');
				echo json_encode($err);
			}
		}

		public function blog_comment(){

			$first_name		=	$this->input->post('name',TRUE);
			$email				=	$this->input->post('email',TRUE);
			$suggestions	=	$this->input->post('comments',TRUE);
			$blog_id			=	$this->input->post('blog_id',TRUE);
			$err = array();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
			if($this->form_validation->run() == TRUE)
			{
				$add_data = array(
					'name' => $first_name,
					'email' => $email,
					'comments' => $suggestions,
					'post_id' => $blog_id,
					'user_agent' => $this->input->user_agent(),
					'user_ip' => $this->input->ip_address()
				);

				$id = $this->model_common->insert_row('blog_comment', $add_data);

				$this->load->library('email');

					$config['wordwrap'] = TRUE;
					$config['validate'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);

					$message ='<!DOCTYPE HTML>
					<html>
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<title></title>
					</head>
					<body>
					<table align="center" width="600" border="1" cellpadding="4" cellspacing="0">
					<tr><td><b>Name</b></td><td>'.stripslashes($first_name).'</td></tr>
					<tr><td><b>Email</b></td><td>'.$email.'</td></tr>
					<tr><td valign="top"><b>Comments</b></td><td>'.nl2br(strip_tags(stripslashes($suggestions))).'</td></tr>
					<tr><td valign="top" colspan="2">To approve this comment, Please  <a href="'.site_url("kaizen/blog_comments/doedit/".$id."?post_id=0").'">click here</a></td></tr>

					</table>
					</body>
					</html>';
					$cont_name	=	stripslashes($first_name);
					$cont_email =	$email;
					$to_email = $this->data['site_settings']->contact_email?$this->data['site_settings']->contact_email:'info@dakotadunescdc.com';
					$this->email->from($cont_email, $cont_name);
					$this->email->to($to_email);
					$this->email->bcc('yuan@2webdesign.com');
					$this->email->reply_to($email);
					$this->email->subject('Comment Posted from '.$this->config->item("COMPANY_NAME"));
					$this->email->message($message);
					$this->email->send();

				$err =  '';
				echo json_encode($err);
			}
			else{
				$err['name'] = form_error('first_name');
				$err['email'] = form_error('email');
				echo json_encode($err);
			}
		}
}
