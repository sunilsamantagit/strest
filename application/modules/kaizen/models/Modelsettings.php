<?php 
class Modelsettings extends MY_Model{

	public function __construct()
    {
        $this->site_id=$this->session->userdata('SITE_ID');
		parent::__construct();

    }

		function getSingleRecordPageName($id){
		$sel_query=$this->db->where_in('id', $id);
		$sel_query=$this->db->select('*')->from('community_impact');
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

	public function update_category($table,$cat,$id){



		$sel_query=$this->db->where_in('id', $cat);
		$sel_query=$this->db->select('*')->from('community_impact');
		$sel_query = $this->db->get();
		if($sel_query->num_rows()>0)
		{
			$category=$sel_query->result();
			$cat_blog_id=explode(',',$category[0]->blog_id);
			array_push($cat_blog_id,$id);
			$result_array=array_unique($cat_blog_id);

			$final_blog_id=implode(',',$result_array);

			$update_data=array(
				'blog_id'=>$final_blog_id
			);
			$update_where=array(
				'id'=>$cat
			);

			$result=parent::update_row('community_impact',$update_data,$update_where);

	    if($result)
	      return true;
	    else
	      return false;
		}
		else
		{
			return false;
		}

		// $query = "UPDATE ".$this->db->dbprefix('community_impact')." SET blog_id = CONCAT(blog_id,'".$id."') WHERE id = '".$cat."'";
		// $result = $this->db->query($query);

		// $query = $this->db->query("UPDATE `".$this->db->dbprefix('community_impact')."`
		// 							SET blog_id = CONCAT(blog_id, `".$id."`)
		// 							WHERE `id`='".$cat."'");
		//
		// $result = $this->db->query($query);

    // $result=parent::update_row('community_impact',$update_data,$update_where);

    // if($result)
    //   return true;
    // else
    //   return false;
	}
}
