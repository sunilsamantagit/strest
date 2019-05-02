<?php
class Modeltakeoff extends MY_Model{
	public function __construct()
    {
        parent::__construct();	
    }

    public function get_data($takeoff_id)
    {
    	$this->db->select('*');
	    $this->db->from('strest_takeoff');
	    $this->db->where('id',$takeoff_id);
	    $data=$this->db->get()->result_array();
	    //echo "<pre>";print_r($data);
	    $query = $this->db->query('select max(id) as id from strest_takeoff')->result_array();
	    
	    $id=$query[0]['id']+1;
	    
	    $add_data = array(      'id'					=>  $id,
								'project_no'			=>	$data[0]['project_no'],
								'quote_no'				=>	$data[0]['quote_no'],								
								'date'					=>	$data[0]['date'],
								'addenda'				=>	$data[0]['addenda'],
								'pricing_units'			=>	$data[0]['pricing_units'],
								'project_title'			=>	$data[0]['project_title'],
								'erect'					=>	$data[0]['erect'],
								'fob'					=>	$data[0]['fob'],
								'location'				=>	$data[0]['location'],
								'legal'					=>	$data[0]['legal'],
								'owner'					=>	$data[0]['owner'],
								'place'					=>	$data[0]['place'],
								'tel'					=>	$data[0]['tel'],
								'fax'					=>	$data[0]['fax'],
								'mobile'				=>	$data[0]['mobile'],
								'contact'				=>	$data[0]['contact'],
								'closing_bid_depository'=>	$data[0]['closing_bid_depository'],
								'clo_rulings'			=>	$data[0]['clo_rulings'],
								'clo_date_time'			=>	$data[0]['clo_date_time'],
								'clo_place'				=>	$data[0]['clo_place'],
								'clo_GST'				=>	$data[0]['clo_GST'],
								'clo_PST'				=>	$data[0]['clo_PST'],
								'clo_other_tax'			=>  $data[0]['clo_other_tax'],
								'bid_bond'				=>	$data[0]['bid_bond'],
								'perform_bond'			=>	$data[0]['perform_bond'],
								'lab_mat_bond'			=>	$data[0]['lab_mat_bond'],
								'holdback'				=>	$data[0]['holdback'],
								'architect_name'		=>	$data[0]['architect_name'],
								'architect_place'		=>	$data[0]['architect_place'],
								'architect_contact'		=>	$data[0]['architect_contact'],
								'architect_tel'			=>	$data[0]['architect_tel'],
								'architect_fax'			=>	$data[0]['architect_fax'],
								'engineer_name'			=>	$data[0]['engineer_name'],
								'engineer_place'		=>	$data[0]['engineer_place'],
								'engineer_contact'		=>	$data[0]['engineer_contact'],
								'engineer_tel'			=>	$data[0]['engineer_tel'],
								'engineer_fax'			=>	$data[0]['engineer_fax'],
								'status'				=>	$data[0]['status']								
                                );
	    $this->db->insert('strest_takeoff',$add_data);
	    return $insert_id = $this->db->insert_id();

    }
/*
    public function clonedata_insert($id)
    {
    	$this->db->get('strest_takeoff');
    	$idc=$id+1;
    	$query = $this->db->query('INSERT INTO strest_takeoff SELECT * FROM strest_takeoff WHERE id ='.$id.' ON DUPLICATE KEY UPDATE id='.$idc);
    	return $query->result();
    }*/
	
}
?>