<?php
class Modeltakeoff extends MY_Model{
	public function __construct()
    {
        parent::__construct();	
    }

    public function get_data($takeoff_id)
    {
    	$this->db->select('project_no, quote_no, date, addenda, pricing_units, project_title, erect, fob, location, legal, owner, place, tel, fax, mobile, contact, closing_bid_depository, clo_rulings, clo_date_time, clo_place, clo_GST, clo_PST, clo_other_tax, bid_bond, perform_bond, lab_mat_bond, holdback, architect_name, architect_place, architect_contact, architect_tel, architect_fax, engineer_name, engineer_place, engineer_contact, engineer_tel, engineer_fax, status');
	    $this->db->from('bh_takeoff');
	    $this->db->where('id',$takeoff_id);
	    $data=$this->db->get()->result_array();
	    //echo "<pre>";print_r($data);
	    $query = $this->db->query('select max(id) as id from bh_takeoff')->result_array();
	    
	    echo $query[0]['id'];
	    $id=$query[0]['id']+1;
	    
	    $add_data = array(      'id'					=>  $id,
								'project_no'			=>	$data[0]['project_no'],
								'quote_no'				=>	$data[0]['quote_no'],
								/*
								'date'					=>	$data[0]['quote_no'],
								'addenda'				=>	$data[0]['quote_no'],
								'pricing_units'			=>	$data[0]['quote_no'],
								'project_title'			=>	$data[0]['quote_no'],
								'erect'					=>	$data[0]['quote_no'],
								'fob'					=>	$data[0]['quote_no'],
								'location'				=>	$data[0]['quote_no'],
								'legal'					=>	$data[0]['quote_no'],
								'owner'					=>	$data[0]['quote_no'],
								'place'					=>	$data[0]['quote_no'],
								'tel'					=>	$data[0]['quote_no'],
								'fax'					=>	$data[0]['quote_no'],
								'mobile'				=>	$data[0]['quote_no'],
								'contact'				=>	$data[0]['quote_no'],
								'closing_bid_depository'=>	$data[0]['quote_no'],
								'clo_rulings'			=>	$data[0]['quote_no'],
								'clo_date_time'			=>	$data[0]['quote_no'],
								'clo_place'				=>	$data[0]['quote_no'],
								'clo_GST'				=>	$data[0]['quote_no'],
								'clo_PST'				=>	$data[0]['quote_no'],
								'clo_other_tax'			=>  $data[0]['quote_no'],
								'bid_bond'				=>	$data[0]['quote_no'],
								'perform_bond'			=>	$data[0]['quote_no'],
								'lab_mat_bond'			=>	$data[0]['quote_no'],
								'holdback'				=>	$data[0]['quote_no'],
								'architect_name'		=>	$data[0]['quote_no'],
								'architect_place'		=>	$data[0]['quote_no'],
								'architect_contact'		=>	$data[0]['quote_no'],
								'architect_tel'			=>	$data[0]['quote_no'],
								'architect_fax'			=>	$data[0]['quote_no'],
								'engineer_name'			=>	$data[0]['quote_no'],
								'engineer_place'		=>	$data[0]['quote_no'],
								'engineer_contact'		=>	$data[0]['quote_no'],
								'engineer_tel'			=>	$data[0]['quote_no'],
								'engineer_fax'			=>	$data[0]['quote_no'],
								'status'				=>	$data[0]['quote_no']
								*/
                                );

	    //echo $id;exit;


	    $this->db->insert('bh_takeoff',$add_data);
    	//$data =$this->db->get('bh_takeoff')
    //					->where('id',$takeoff_id);
    	//return $data->result();
    }
/*
    public function clonedata_insert($id)
    {
    	$this->db->get('bh_takeoff');
    	$idc=$id+1;
    	$query = $this->db->query('INSERT INTO bh_takeoff SELECT * FROM bh_takeoff WHERE id ='.$id.' ON DUPLICATE KEY UPDATE id='.$idc);
    	return $query->result();
    }*/
	
}
?>