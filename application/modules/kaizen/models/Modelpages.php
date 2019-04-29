<?php
class Modelpages extends MY_Model{
	public function __construct()
    {
        parent::__construct();

				$this->field_arr = array(

								'0' => array(
													'title'   	 => 'Title',
													'field_name' => 'title',
													'field_type' => 'text'
												   ),
								'1' => array(
													'title'   		=> 'Content',
													'field_name'  => 'content',
													'field_type' 	=> 'text'
												   ),
								'2' => array(
													'title'   		=> 'Shown In Top',
													'field_name'  => 'shown_in_top',
													'field_type' 	=> 'text'
												   ),
								'3' => array(
													'title'   		=> 'Shown In Footer',
													'field_name' 	=> 'shown_in_footer',
													'field_type' 	=> 'text'
												   ),
								'4' => array(
													'title'   		=> 'External Link',
													'field_name' 	=> 'external_link',
													'field_type' 	=> 'text'
												   ),
								'5' => array(
													'title'   => 'Meta Title',
													'field_name'  => 'meta_title',
													'field_type' => 'text'
												   ),
								'6' => array(
													'title'   => 'Meta Description',
													'field_name' => 'meta_description',
													'field_type' => 'text'
												   ),
								'7' => array(
													'title'   => 'Sequence',
													'field_name'  => 'display_order',
													'field_type' => 'text'
												   ),
								'8' => array(
													'title'   => 'Status',
													'field_name' => 'is_active',
													'field_type' => 'text'
												   )
						   );
    }

	function getSingleRecordPageName($id){
		$sel_query=$this->db->where_in('id', $id);
		$sel_query=$this->db->select('*')->from('cms_pages');
		$sel_query = $this->db->get();

		if($sel_query)
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
