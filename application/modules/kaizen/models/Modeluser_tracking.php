<?php
class Modeluser_tracking extends MY_Model{
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
													'title'   => 'Emai',
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
	function getCountAll($curtable,$searchstring="",$pos=1){

		if(!empty($searchstring)){
			$this->db->like('category_id', $searchstring); 
		}
		
		$this->db->select('id')->from($this->db->dbprefix($curtable));
		$q = $this->db->get();
		$no_record=$q->num_rows();
		#echo $this->db->last_query();exit;	
		if($no_record){				
			return $no_record;	
		}
		else
		{
			#log_message('error',": ".$this->db->_error_message() );
			return false;
		}
	
	}

	function getAllDetails($curtable,$limit = NULL, $offset = NULL, $searchstring="",$pos=1){
				
		if(!empty($searchstring)){
			$this->db->like('category_id', $searchstring); 
		}
		
		$this->db->order_by('created_date', 'DESC'); 
		if(!empty($limit)){
			$sel_query = $this->db->get($this->db->dbprefix($curtable),$limit,$offset);	
		}
		else{
			$sel_query = $this->db->get($this->db->dbprefix($curtable));	
		}
		
		#echo $this->db->last_query();exit;
		if($sel_query->num_rows()>0)
		{		
			$res=$sel_query->result();		
			return $res;	
		}
		else
		{
			#log_message('error',": ".$this->db->_error_message() );
			return false;
		}	
		
	}
	
	//============Query Here===========//
}
?>