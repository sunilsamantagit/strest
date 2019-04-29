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
		$name	=	$this->input->post('name',TRUE);
		$email		=	$this->input->post('email',TRUE);
		$phone		=	$this->input->post('phone',TRUE);
		$subject	=	$this->input->post('subject',TRUE);
		$comments	=	$this->input->post('message',TRUE);
		$response = $_POST['g-recaptcha-response'];
		$secret = '6LcLrG8UAAAAACRJqSB_kqyBDJH1O27wm1YHvKZs';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response);
		$responseData = json_decode($verifyResponse);
                if($responseData->success){
                
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
		
		$this->form_validation->set_error_delimiters('');
                
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
					<table align="center" width="600" border="1" cellpadding="4" cellspacing="0">'; 
			if(!empty($name)){
                $message.='<tr><td><b>Name:</b></td><td>'.$name.'</td></tr>';
            }
			if(!empty($phone)){
                $message.='<tr><td><b>Phone No:</b></td><td>'.$phone.'</td></tr>';
            }
            
            if(!empty($email)){
                $message.='<tr><td><b>Email:</b></td><td>'.$email.'</td></tr>';
            }
			if(!empty($subject)){
                $message.='<tr><td><b>Subject:</b></td><td>'.$subject.'</td></tr>';
            }
			if(!empty($comments)){
                $message.='<tr><td><b>Message:</b></td><td>'.$comments.'</td></tr>';
            }
            $message.='</table>
					</body>
					</html>';
            $this->email->from($email, stripslashes($this->config->item("COMPANY_NAME")));
            $this->email->to($this->data['site_settings']->contact_email);
            $this->email->subject('Contact from '.outputEscapeString($this->config->item("COMPANY_NAME")));
            $this->email->message($message);
			$this->email->send();
            $err =  '';
				echo json_encode($err);
		}
			else{
			 $err['name'] = form_error('name');
			 $err['email'] = form_error('email');
			 $err['message'] = form_error('message');
			 echo json_encode($err);
			}
	
	}else{
		$data['error'] = "*Please check the captcha checkbox.";
		echo json_encode($data);
	}
         
        }

        
        public function addtocart(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('qty', 'Quantity', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pid', 'Membership Type', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('');
            if($this->form_validation->run() == TRUE){
                $cartdtls=$this->model_common->selectOne('cart',array('pid'=>$this->input->post('pid',TRUE),'cart_id'=>$this->session->userdata('cart_id')));
                if(!empty($cartdtls)){
                    $quantity=$cartdtls->qty+$this->input->post('qty',TRUE);
                    if($this->model_common->update_row('cart',array('qty'=>$quantity),array('pid'=>$this->input->post('pid',TRUE),'cart_id'=>$this->session->userdata('cart_id')))){
                        $err =  '';
                        echo json_encode($err);
                    }else{
                        $err['error'] =  'Something wrong please try again later';
                        echo json_encode($err);
                    }
                }else{
                    $cartdata['cart_id']=$this->session->userdata('cart_id');
                    $cartdata['pid']=$this->input->post('pid',TRUE);
                    $cartdata['qty']=$this->input->post('qty',TRUE);
                    if($this->model_common->insert_row('cart',$cartdata)){
                        $err =  '';
                        echo json_encode($err);
                    }else{
                        $err['error'] =  'Something wrong please try again later';
                        echo json_encode($err);
                    }
                }
            }else{
                $err['pid'] = form_error('pid');
                $err['qty'] = form_error('qty');
                echo json_encode($err);
            }
        }



}
