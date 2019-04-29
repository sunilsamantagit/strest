<?php
class Modeluser extends MY_Model{
	public function __construct()
    {
        parent::__construct();	
		$this->site_id=$this->session->userdata('SITE_ID');	
		$this->field_arr = array(
								
								'0' => array(
													'title'   => 'Full Name',
													'field_name' => 'full_name',
													'field_type' => 'text'
												   ),
								'1' => array(
													'title'   => 'User Level',
													'field_name'  => 'user_level',
													'field_type' => 'text'
												   ),
								'2' => array(
													'title'   => 'User Name',
													'field_name'  => 'user_name',
													'field_type' => 'text'
												   ),
								'3' => array(													
													'title'   => 'Email',
													'field_name' => 'user_email',
													'field_type' => 'text' 
												   ),	
								'4' => array(
													'title'   => 'Status',
													'field_name' => 'approved',
													'field_type' => 'text'
												   )			   					   			   				   					   
						   );		
    }
	
	//============Query Here===========//
}
?>