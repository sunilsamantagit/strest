<?php
class Modelhome_block extends MY_Model{
	public function __construct()
    {
        parent::__construct();	
    }
	function getSingleRecordPageName($id){
		
		$sel_query=$this->db->where_in('id', $id); 
		$sel_query=$this->db->select('*')->from('cms_pages');
		$sel_query = $this->db->get();
		
		if($sel_query->num_rows()>0)
		{		
			$res=$sel_query->result();		
			return $res;
		}
		else
		{
			//log_message('error',": ".$this->db->_error_message() );
			return false;
		}	
		
	}	
}
?>