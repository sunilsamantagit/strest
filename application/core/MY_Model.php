<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
  protected $table_prefix = '';
  public function __construct(){
    parent::__construct();
  }

	public function dolist_common($tablename,$viewname){
		if(empty($tablename) || empty($viewname))
			return false;

		$data = array();
		$update_where = array();
		$data_row = $this->select_row($tablename,$update_where);
		$data['records']= $data_row;
		$this->load->view($viewname,$data);
	}

	public function doedit_common($tablename,$viewname,$where){
		$data = array();
		$q = $this->custom_m->select_row($tablename,$where);

		$data['details']= $q['0'];

		$this->load->view($viewname,$data);
	}

	public function getDetailsById($tablename,$idname,$idvalue,$statusname="",$statusvalue=""){
    $idwhere = '';
    $statuswhere = '';
    if(!empty($statusname) && !empty($statusvalue)){
      $statuswhere = " AND ".$statusname."=".$statusvalue;
    }

    if(!empty($idname) && !empty($idvalue)){
      $idwhere = $idname."=".$idvalue;
    }
    else{
      return false;
      echo "error";
    }

    if(!empty($idwhere)){
		  $query = $this->db->query("SELECT * FROM ".$this->db->dbprefix($tablename)." WHERE ".$idwhere.$statuswhere);
  		if ($query->num_rows()) {
        return $query->row();
      }
      else{
        return false;
      }
    }
    else{
      return false;
      echo "error 1";
    }

	}
    function selectOne($table,$where=array()){
    if(!empty($where)){
      foreach($where as $key => $val){
          $this->db->where($key, $val);
      }
    }
    $query = $this->db->get($this->db->dbprefix($table));
	#echo $this->db->last_query();
    if($query->row()){
			return $query->row();
		}else{
			return false;
		}
	}



	function getAllDataByField($table_name,$update_where,$extra_cond=''){
	 $where_cond = array();
			$where_cond = implode(' AND ', array_map(function ($value, $key) {  return $key . " ='" . $value . "'"; }, $update_where, array_keys($update_where)));
			if(!empty($extra_cond)){
				$where_cond .= " ".$extra_cond;
				}
		$query = $this->db->get_where($table_name, $where_cond);
		//echo $this->db->last_query(); exit;
		 if($query->row()){
			return $query->result();
		}else{
			return false;
		}
	}
	function getAllDataByField_distinct($table_name,$update_where,$distinctField=''){
	 $this->db->distinct();
 $this->db->select($distinctField);
			//$where_cond = implode(' AND ', array_map(function ($value, $key) {  return $key . " ='" . $value . "'"; }, $update_where, array_keys($update_where)));

			if(!empty($update_where)){
    $where_cond = implode(' AND ', array_map(function ($value, $key) {
      return $key . " ='" . $value . "'"; }, $update_where, array_keys($update_where))
    ); // do not change anything in this string.
    }else{
        $where_cond = array();
    }

		$query = $this->db->get_where($table_name, $where_cond);
		//echo $this->db->last_query(); exit;
		 if($query->row()){
			return $query->result();
		}else{
			return false;
		}
	}

	function insert_row($table_name,$insert_data){
		$this->db->insert($this->db->dbprefix($table_name), $insert_data);
		return 	$this->db->insert_id();
	}

	function update_row($table_name,$update_data,$update_where){
		$where_cond = '';
    if(empty($update_where))
      return false;

    $where_cond = implode(' AND ', array_map(function ($value, $key) {
      return $key . " ='" . $value . "'"; }, $update_where, array_keys($update_where))
    ); // do not change anything in this string.

    $this->db->where($where_cond);
    if($this->db->update($table_name,$update_data)){
      // echo $this->db->last_query(); exit;
			return true;
		}else{
      // echo $this->db->last_query(); exit;
			return false;
		}
	}
	function delete_row($table_name,$update_where){
		$where_cond = '';
    if(empty($update_where))
      return false;

    $where_cond = implode(' AND ', array_map(function ($value, $key) {
      return $key . " ='" . $value . "'"; }, $update_where, array_keys($update_where))
    ); // do not change anything in this string.

    $this->db->where($where_cond);
    if($this->db->delete($table_name)){
			return true;
		}else{
			return false;
		}
	}
  function getCountAll($table_name,$update_where){
		$where_cond = implode(' AND ', array_map(function ($value, $key) {
      return $key . " ='" . $value . "'"; }, $update_where, array_keys($update_where))
    );
    $query = $this->db->get_where($table_name, $where_cond);

    return $query->num_rows();
}

	function select_row($table_name,$update_where=array(),$order_by =  array(),$limit='',$where_like=array(),$where_not=array()){
     if(!empty($where_like)){
      foreach($where_like as $key => $val){
		  $this->db->or_like($key, $val);
      }
    }
    if(!empty($update_where)){
      foreach($update_where as $key => $val){
          $this->db->where($key, $val);
    }
    }
	if(!empty($where_not)){
      foreach($where_not as $key => $val){
		  $this->db->where("`".$key."` !=",$val);
//		  $this->db->where_not_in("`".$key."`",$val);
    }
    }
    if(!empty($order_by)){
        foreach($order_by as $key => $val){
            $this->db->order_by($key, $val);
        }
    }
	if(!empty($limit)){
		 	$this->db->limit($limit, 0);
    }
    $query = $this->db->get($table_name);
    //echo $this->db->last_query();
    #if($query->row()){
         if($query){
			return $query->result();
		}else{
			return false;
		}
	}

  	function select_rowdistinct($table_name,$update_where=array(),$order_by =  array(),$limit=''){
		$where_cond = '';

    if(!empty($update_where)){
      foreach($update_where as $key => $val){
          $this->db->where($key, $val);
      }
    }else{
        $where_cond = array();
    }
    if(!empty($order_by)){
        foreach($order_by as $key => $val){
            $this->db->order_by($key, $val);
        }
    }
	if(!empty($limit)){
		 	$this->db->limit($limit, 0);
    }
	//For Distinct fetch by `is_order`
    $this->db->distinct();
	$this->db->group_by('display_order');


    $query = $this->db->get($table_name);
    if($query->row()){
			return $query->result();
		}else{
			return false;
		}
	}


 	public function performaction($action,$tablename,$data,$update_where)	{

    if(empty($action))
      return false;

    if($action == 'Insert'){
      $id=$this->insert_row($tablename,$data);
      return $id;
    }
    else if($action == 'Update'){
      $id=$this->update_row($tablename,$data,$update_where);
      return $id;
    }
    else if($action == 'Delete'){
      $id=$this->delete_row($tablename,$update_where);
      return $id;
    }
    else{
      return "Something is wrong.";
    }
 	}

  public function uploadImage($foldername,$field='',$orglogo_photo1){
		$upload_dir=$foldername;
		$field_name=$field;

    if(is_uploaded_file($_FILES[$field_name]['tmp_name'])){ // if image file upload at the updating
			if(!empty($orglogo_photo1) && is_file(file_upload_absolute_path().$upload_dir.$orglogo_photo1)){
				unlink(file_upload_absolute_path().$upload_dir.$orglogo_photo1);
			}
    }






  		if(!is_dir(file_upload_absolute_path().$upload_dir)){
  			$oldumask = umask(0);
  			mkdir(file_upload_absolute_path().$upload_dir, 0777); // or even 01777 so you get the sticky bit set
  			umask($oldumask);
  		}
		 	$config['upload_path'] = file_upload_absolute_path().$upload_dir;
  		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|ppt|pptx|xls|xlsx';
      $config['max_size'] = '5000';
      $config['max_width'] = '2500';
      $config['max_height'] = '2500';

      $this->load->library('upload', $config); // LOAD FILE UPLOAD LIBRARY
  		$this->upload->initialize($config);

  		$data['upload_data'] = '';

      if($this->upload->do_upload($field_name)){ // CREATE ORIGINAL IMAGE
  			$fInfo = $this->upload->data();
  			$data['uploadInfo'] = $fInfo;
  			return $fInfo['file_name']; // RETURN ORIGINAL IMAGE NAME
  		}
      else{ // IF ORIGINAL IMAGE NOT UPLOADED
        //echo $this->upload->display_errors(); die();
  			return false; // RETURN ORIGINAL IMAGE NAME
      }
  }



  function getAllActivedata($table){
		$sel_query = $this->db->get_where($this->db->dbprefix($table), array('is_active'=>1));
		if($sel_query->num_rows()>0)
		{
			$res=$sel_query->result();
			return $res;
		}
		else
		{
			log_message('error',": ".$this->db->_error_message() );
			return false;
		}

	}
  function getAllFeaturedata($table){
		$sel_query = $this->db->get_where($this->db->dbprefix($table), array('is_featured'=>1));
		if($sel_query->num_rows()>0)
		{
			$res=$sel_query->result();
			return $res;
		}
		else
		{
			log_message('error',": ".$this->db->_error_message() );
			return false;
		}

	}


function activeinactive($id,$limit,$table)
  {
		$count = 1;
		$update_data  = array('is_active'=>0);
		$activedata = $this->model_common->getAllActivedata($table);
		foreach($activedata as $data)
		{
			$update_where = array('id' => $data->id);
			if($data->id != $id)
			{
				   $count++;
				   if(!empty($limit))
				   {
					   if(!empty($data->is_active))
					   {
							if($count > $limit )
							{
								$this->model_common->update_row($table,$update_data,$update_where);
							}
					   }
				   }
			}
		 }
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
