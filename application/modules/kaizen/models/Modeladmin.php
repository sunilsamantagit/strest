<?php
class Modeladmin extends MY_Model{
	public function __construct()
    {
        parent::__construct();	
    }
	function getSingleRecordPageName($id){
		
		$sel_query=$this->db->where('site_id', 0); 
		$sel_query=$this->db->where_in('id', $id); 
		$sel_query=$this->db->select('*')->from('department');
		$sel_query = $this->db->get();
		
		if($sel_query->num_rows()>0)
		{		
			$res=$sel_query->result();		
			return $res;
		}
		else
		{
			
			return false;
		}	
		//echo $this->db->last_query();
	}	
        
        function get_user($department_id){
            
            
                $this->db->like('department_id', "~".$department_id."~");
		$sel_query=$this->db->select('*')->from('admin');
		$sel_query = $this->db->get();
                if($sel_query->num_rows()>0)
		{		
			$res=$sel_query->result();		
			return $res;
		}
		else
		{
			
			return false;
		}
        }
}
?>