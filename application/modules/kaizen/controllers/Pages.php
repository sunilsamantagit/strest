<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends MY_Controller
{
	private $limit = 20;
	var $offset = 0;
	function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('web_admin_logged_in')) {
			redirect('kaizen/welcome','refresh');
		}
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'common/header',
		  'left' => 'common/left',
		  'footer' => 'common/footer',
		  'right' => 'common/right'
		));

		$this->load->model('modelpages');
	}
	public function index()
	{
		$this->dolist();
	}
	public function dolist(){
		$data = array();

        $where = array( );
        $order_by = array('title' => 'asc');
		$data_row = $this->modelpages->select_row('cms_pages',$where,$order_by);

		$data['records']= $data_row;
		$this->load->view('pages/pages_list',$data);
	}

	public function doadd(){
		$data = array();
    $data['details']= new stdClass;
		$pages_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $pages_id;
             
            $where = array('is_active'=>1);
            $order_by = array('title' => 'asc');
	    $data['page_list'] = $this->modelpages->select_row('cms_pages',$where,$order_by);
            
		$this->load->view('pages/edit_pages',$data);
	}

	public function addedit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pages_title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$parent_id=$this->input->post('parent_id',TRUE);
		$id=$this->input->post('pages_id','');
    $pages_title ='';
		$oldvalue = '';
		$newvalue = '';
		$editid = '';

		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)
		{
			$where = array('id' => $id);
      $pages_detls = $this->modelpages->select_row('cms_pages',$where);
      if(!empty($pages_detls))
			{

				$oldvalue = trackingNew($this->modelpages->field_arr,$id,'cms_pages','cms_pages',$editid,'edit');


                                $this->pages_title				=$this->input->post('pages_title',TRUE);
                                $this->meta_title					=$this->input->post('meta_title',TRUE);
                                $this->external_link			=$this->input->post('external_link',TRUE);
                                $this->shown_in_top				=$this->input->post('shown_in_top',TRUE);
                                $this->shown_in_footer		=$this->input->post('shown_in_footer',TRUE);
                $this->display_order			=$this->input->post('display_order',TRUE);
$this->meta_keyword				=$this->input->post('meta_keyword','');
$this->meta_description		=$this->input->post('meta_desc','');
                                $this->parent_id					=$this->input->post('parent_id',TRUE);
                                $this->content          	=$this->input->post('content');
                                
                                 $this->button_text		=$this->input->post('button_text');
                                $this->button_type		=$this->input->post('button_type',TRUE);
                                $this->page_link		=$this->input->post('page_link');
                                $this->external_url		=$this->input->post('external_url');
                                
                                $this->is_active					=$this->input->post('is_active',TRUE);

                                if($this->is_active===false){
                                        $this->is_active='1';
                                }

                                $update_data = array(
                                    'title' 						=> 	$this->pages_title,
                                    'content' 					=> 	$this->content,
                                    'parent_id'					=>	$this->parent_id,
                                    'external_link'   	=> 	$this->external_link,
                                    'shown_in_top' 			=> 	$this->shown_in_top,
                                    'shown_in_footer' 	=> 	$this->shown_in_footer,
                                    'display_order' 		=> 	$this->display_order,
                                    'meta_title' 				=> 	$this->meta_title ,
                                    'meta_keyword'			=> 	$this->meta_keyword,
                                    'meta_description' 	=> 	$this->meta_description,
                                    'button' 			        => $this->button_text,
                                    'button_type'               => $this->button_type,
                                    'selected_page_link' 		=> $this->page_link, 
                                    'external_url'              => $this->external_url,
                                    'is_active' 				=> 	$this->is_active
                                );
 // pre($update_data); pre($id); die;
				$update_where = array('id' => $id);
				if($this->modelpages->update_row('cms_pages',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{

					$newvalue = trackingNew($this->modelpages->field_arr,$id,'cms_pages','cms_pages',$editid,'edit');
					// var_dump($newvalue); die();
					if($oldvalue!=$newvalue){
						insert_tracking($this->modelpages->field_arr,$id, $oldvalue, $newvalue,'edit','cms_pages','cms_pages');
					}

					$session_data = array("SUCC_MSG"  => "Pages Updated Successfully.");
					$this->session->set_userdata($session_data);
				}
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{
					$session_data = array("ERROR_MSG"  => "Pages Not Updated.");
					$this->session->set_userdata($session_data);
				}
			}
			else
			{
                                $this->pages_title						=$this->input->post('pages_title',TRUE);
                                    $this->meta_title							=$this->input->post('meta_title',TRUE);
                                    $this->external_link					=$this->input->post('external_link',TRUE);
                                    $this->shown_in_top						=$this->input->post('shown_in_top',TRUE);
                            $this->shown_in_footer				=$this->input->post('shown_in_footer',TRUE);
                    $this->display_order					=$this->input->post('display_order',TRUE);
$this->meta_keyword						=$this->input->post('meta_keyword','');
$this->meta_description				=$this->input->post('meta_desc','');
$this->content          			=$this->input->post('content');


                                    $this->button_text		=$this->input->post('button_text');
                                $this->button_type		=$this->input->post('button_type',TRUE);
                                $this->page_link		=$this->input->post('page_link');
                                $this->external_url		=$this->input->post('external_url');
                                
                                    $this->parent_id							=$this->input->post('parent_id',TRUE);


                                $this->is_active							=$this->input->post('is_active',TRUE);

                                if($this->is_active===false){
                                        $this->is_active='1';
                                }

                                $add_data = array(
                                    'title' 						=> $this->pages_title,
                                    'content' 					=> $this->content,
                                    'parent_id'					=>	$this->parent_id,
                                    'external_link'   	=> $this->external_link,
                                    'shown_in_top' 			=> $this->shown_in_top,
                                    'shown_in_footer' 	=> $this->shown_in_footer,
                                    'display_order' 		=> $this->display_order,
                                    'meta_title' 				=> $this->meta_title ,
                                    'meta_keyword'			=> $this->meta_keyword,
                                    'meta_description' 	=> $this->meta_description,
																		'page_link' 				=> name_replaceCat('cms_pages',$this->pages_title),
                                    'button' 			        => $this->button_text,
                                    'button_type'               => $this->button_type,
                                    'selected_page_link' 		=> $this->page_link, 
                                    'external_url'              => $this->external_url,
                                    'is_active' 				=> $this->is_active

                                );
				$id = $this->modelpages->insert_row('cms_pages',$add_data);

				if($id)
				{

					if(!empty($this->modelpages->field_arr)){
						$newvalue = trackingNew($this->modelpages->field_arr,$id,'cms_pages','cms_pages',$editid,'add');
						insert_tracking($this->modelpages->field_arr,$id,$oldvalue, $newvalue,'add','cms_pages','cms_pages');
					}

					$session_data = array("SUCC_MSG"  => "Pages Inserted Successfully.");
					$this->session->set_userdata($session_data);
				}
				else
				{
					$session_data = array("ERROR_MSG"  => "Pages Not Inserted.");
					$this->session->set_userdata($session_data);
				}
			}
			redirect("kaizen/pages/doedit/".$id,'refresh');
		}
		else{
			if(!empty($id)){
			$this->doedit();
			}
			else{
				$this->doadd();
			}
		}
	}
	public function doedit($id)
	{
		$data = array();
		$data['details']= new stdClass;
		$pages_id=$this->uri->segment(4);
		$where = array( 'id' => $pages_id);
        $pages_detls = $this->modelpages->select_row('cms_pages',$where);
		if($pages_detls){
			$data['details'] = $pages_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}

            $where = array('is_active'=>1);
            $order_by = array('title' => 'asc');
	    $data['page_list'] = $this->modelpages->select_row('cms_pages',$where,$order_by);
		$this->load->view('pages/edit_pages',$data);
	}

}
