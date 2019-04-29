<?php
class Model_meta extends MY_Model{
	var $page_link = "";
	//var $site_id='';
	var $membership_id;
	public function __construct(){
		parent::__construct();
		// $this->site_id=$this->config->item("SITE_ID");

			$this->page_link = xss_clean($this->uri->segment(1));
			$page_arr = array('news');
			if(empty($this->page_link)){
				$this->page_link = "home";
			}
			elseif(in_array($this->page_link,$page_arr)){
				$this->page_link = xss_clean($this->uri->segment(1));
			}
			elseif($this->page_link=="pages"){
				$this->page_link = xss_clean($this->uri->segment(2));
			}

			elseif($this->page_link=="draft" || $this->page_link=="draft_home"){
				$this->page_link = "home";
			}

	}
	public function getNaviBar($pageid=0){
		$result=array();
		$query = $this->db->query("SELECT * FROM `".$this->db->dbprefix('cms_pages')."` WHERE id='".$pageid."' LIMIT 0,1");
		if($query->num_rows()>0){
			$page=$query->row();
			$result[]=['id'=>$page->id,'title'=>$page->title,'page_link'=>$page->page_link];
			$id=$page->parent_id;
			while($this->db->query("SELECT * FROM `".$this->db->dbprefix('cms_pages')."` WHERE id='".$id."' LIMIT 0,1")->num_rows()>0){
				$page=$this->db->query("SELECT * FROM `".$this->db->dbprefix('cms_pages')."` WHERE id='".$id."' LIMIT 0,1")->row();
				array_unshift($result,array('id'=>$page->id,'title'=>$page->title,'page_link'=>$page->page_link));//var_dump($result);die();
				$id=$page->parent_id;
			}
			return $result;
		}else{
			return false;
		}

	}

	public function count_meta(){

		$query = $this->db->query("SELECT `id` FROM `".$this->db->dbprefix('cms_pages')."` WHERE page_link='".$this->page_link."' LIMIT 0,1");
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}

	}

	public function meta_list(){
		$query = $this->db->query("SELECT *,'1' as page_type FROM `".$this->db->dbprefix('cms_pages')."`WHERE page_link='".$this->page_link."'  LIMIT 0,1");
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}

	}
	public function site_settings(){
		$query = $this->db->query("SELECT * FROM `".$this->db->dbprefix('site_settings')."`WHERE `id`=1 ");
		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}
	

	public function count_cmspages(){
		$query = $this->db->query("SELECT `id` FROM `".$this->db->dbprefix('cms_pages')."` LIMIT 0,10");
		#echo $this->db->last_query();exit;
		if($query->num_rows()>0){
			return true;
		}
		else{
//			log_message('error',": ".$this->db->_error_message() );
			return false;
		}
	}

	public function cmspages_list_top($conds=""){
		$query = $this->db->query("SELECT `id`,`title`,`external_link`,`parent_id`,`page_link`,`shown_in_top`,`class` FROM `".$this->db->dbprefix('cms_pages')."` WHERE `is_active`=1 and `shown_in_top`=1   ".$conds." order by `display_order`>0 desc, `display_order` asc");
		if($query){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function cmspages_list_footer($conds=""){
		$query = $this->db->query("SELECT `id`,`title`,`external_link`,`parent_id`,`page_link`,`shown_in_footer` FROM `".$this->db->dbprefix('cms_pages')."` WHERE `is_active`=1  ".$conds." order by `display_order`>0 desc, `display_order` asc");
		if($query){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getcontact(){
		$query = $this->db->query("SELECT * FROM `".$this->db->dbprefix('contact')."` ");
		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function getevents(){
		$query = $this->db->query("SELECT * FROM `".$this->db->dbprefix('events')."` ");

		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function cmspages_top_header(){
		$query = $this->db->query("SELECT `id`,`title`,`parent_id`,`page_link` FROM `".$this->db->dbprefix('cms_pages')."` WHERE `is_active`=1 and `top_header` = 1    order by `display_order`>0 desc, `display_order` asc");
		if($query){
			return $query->result();
		}
		else{
			return false;
		}
	}



	public function get_top_list() {
		$cmsmenu = $this->cmspages_list_top();
		$menus_array = array();
		foreach ($cmsmenu as $rs_menu_id){ //pre($rs_menu_id);

			$menus_array[$rs_menu_id->id] = array('id' => $rs_menu_id->id,'title' => $rs_menu_id->title,'parent_id' => $rs_menu_id->parent_id,'page_link' => $rs_menu_id->page_link,'external_link' => $rs_menu_id->external_link,'shown_in_top' => $rs_menu_id->shown_in_top,'class' => $rs_menu_id->class);

		}

		return $menus_array;
	}


	public function get_footer_list() {
		$cmsmenu = $this->cmspages_list_footer();
		$menus_array = array();
		foreach ($cmsmenu as $rs_menu_id){
			$menus_array[$rs_menu_id->id] = array('id' => $rs_menu_id->id,'title' => $rs_menu_id->title,'parent_id' => $rs_menu_id->parent_id,'page_link' => $rs_menu_id->page_link,'external_link' => $rs_menu_id->external_link,'shown_in_footer' => $rs_menu_id->shown_in_footer);


		}
		return $menus_array;
	}

	function getSingleRecordPageName($id){

		$sel_query=$this->db->where('site_id', 1);
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

			return false;
		}

	}

	public function getmemberpagesFromCms($parent_id=''){
		if($query = $this->db->query("SELECT * FROM `".$this->db->dbprefix('cms_pages')."` WHERE `is_active`='1' and `parent_id`='".$parent_id."' order by display_order > 0 desc,display_order asc  "))
		{
			#echo $this->db->last_query();
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_calltoaction($pages_id){
			if($query = $this->db->query("SELECT * FROM `".$this->db->dbprefix('calltoaction')."` WHERE FIND_IN_SET( '".$pages_id."',pages_id) and `is_active`='1'  order by `is_order`>0 desc, `is_order` asc" ))
            {

                $res = $query->result();
                if(!empty($res))
                {
                    return $res;
                }
                else{
                    return false;
                }
            }
		}

}
?>
