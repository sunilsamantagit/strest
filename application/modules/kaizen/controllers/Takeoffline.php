<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Takeoffline extends MY_Controller 
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
          'right' => 'common/right',
		  'footer' => 'common/footer'
		));
		
		$this->load->model('modeltakeoffline');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	
	
	public function dolist(){
		$data = array();
		$where = array();
               
        $order_by = array('display_order' => 'asc');
		$data_row = $this->modeltakeoffline->select_row('takeoffline',$where,$order_by);
		$data['records']= $data_row;
		$this->load->view('kaizen/takeoffline/takeoffline_list',$data);		
	}
	
	public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$takeoffline_id=$this->uri->segment(4);
		$data['details']->is_active = 1;
		$data['details']->id = $takeoffline_id;
		
		$where = array('is_active'=>1);
        $order_by = array('title' => 'asc');
	    $data['page_list'] = $this->modeltakeoffline->select_row('cms_pages',$where,$order_by);	
		
		$this->load->view('kaizen/takeoffline/edit_takeoffline',$data);		
	}
    
	public function addedit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('takeoffline_title', 'Title', 'trim|required|xss_clean');
		
		
		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('takeoffline_id','');
	 	$takeoffline_detls ='';
	 	$uplod_img='';
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{	
			$where = array(
                           
                            'id' => $id
                        );
                $takeoffline_detls = $this->modeltakeoffline->select_row('takeoffline',$where);
				
        		if(!empty($takeoffline_detls)) 
                {
                   
			                     
                                $this->title		=$this->input->post('takeoffline_title',TRUE);
                                $this->excerpt		=$this->input->post('excerpt',TRUE);
                                $this->htmlfile1             =$this->input->post('htmlfile1',TRUE);
                                $this->display_order		=$this->input->post('display_order');
                                 $this->button_text		=$this->input->post('button_text');
                                $this->button_type		=$this->input->post('button_type',TRUE);
                                $this->page_link		=$this->input->post('page_link');
                                $this->external_url		=$this->input->post('external_url');
                                $this->is_active		=$this->input->post('is_active',TRUE); 
                                if($this->is_active===false){
                                        $this->is_active='1';
                                }
							
			 /*    $uplod_img = $this->input->post("htmlfile1",TRUE);
                             $orgimgpath=$takeoffline_detls[0]->takeoffline_photo;
							   if(!empty($uplod_img) && $uplod_img!=$orgimgpath)
								{
						if(!empty($orgimgpath) && is_file(file_upload_absolute_path().'takeoffline_photo/'.$orgimgpath))
									{
								unlink(file_upload_absolute_path().'takeoffline_photo/'.$orgimgpath);
									}
                                } */
								
                                $update_data = array(
                                  
                                    'title'                             => $this->title,
                                    'excerpt'                             => $this->excerpt,
                                    'takeoffline_photo'                      => $this->htmlfile1,                                    
                                    'display_order' 			=> $this->display_order,
                                    'button'                            => $this->button_text,
                                    'button_type' 			=> $this->button_type,
                                    'selected_page_link' 		=> $this->page_link, 
                                    'external_url' 			=> $this->external_url,
                                    'is_active' 			=> $this->is_active
                                );
                                
                
				$update_where = array('id' => $id);
				if($this->modeltakeoffline->update_row('takeoffline',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{
				
					$session_data = array("SUCC_MSG"  => "Takeoff Line Entries Updated Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Takeoff Line Entries Not Updated.");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{           
                                $this->title                    =$this->input->post('takeoffline_title',TRUE);
                                $this->excerpt                    =$this->input->post('excerpt',TRUE);
                                $this->htmlfile1                =$this->input->post('htmlfile1',TRUE);
                                $this->display_order		=$this->input->post('display_order');
                                $this->button_text		=$this->input->post('button_text');
                                $this->button_type		=$this->input->post('button_type',TRUE);
                                $this->page_link		=$this->input->post('page_link');
                                $this->external_url		=$this->input->post('external_url');
                                $this->is_active		=$this->input->post('is_active',TRUE); 
                             if($this->is_active===false){
                                $this->is_active='1';
                }
					
                               /*  $uplod_img = '';	
				$uplod_img = $this->input->post("htmlfile1",TRUE); */
			
              
                $add_data = array(
                                    
                                    'title' 			        => $this->title,
                                    'excerpt' 			        => $this->excerpt,
                                    'takeoffline_photo'              => $this->htmlfile1,                                      
                                    'display_order' 			=> $this->display_order, 
                                    'button' 			        => $this->button_text,
                                    'button_type'               => $this->button_type,
                                    'selected_page_link' 		=> $this->page_link, 
                                    'external_url'              => $this->external_url,
                                    'page_link'                 => name_replaceCat('takeoffline',$this->title),
                                    'is_active'                 => $this->is_active
                                );
                                
				$id = $this->modeltakeoffline->insert_row('takeoffline',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{ 
                   
					$session_data = array("SUCC_MSG"  => "Takeoff Line Entries Inserted Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Takeoff Line Entries Not Inserted.");
					$this->session->set_userdata($session_data);				
				}
			}
			redirect("kaizen/takeoffline/doedit/".$id,'refresh');			
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
	public function doedit()
	{
		$data = array();
		$takeoffline_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $takeoffline_id
                        );
        $takeoffline_detls = $this->modeltakeoffline->select_row('takeoffline',$where);                       
		if($takeoffline_detls){
			$data['details'] = $takeoffline_detls[0];
		}
		else{
			$data['details']->is_active = 1;
			$data['details']->id = 0;
		}
		
		  $where1 = array('is_active'=>1);
                $order_by = array('title' => 'asc');
		$data['page_list'] = $this->modeltakeoffline->select_row('cms_pages',$where1,$order_by);
		
		$this->load->view('kaizen/takeoffline/edit_takeoffline',$data);				
	}
	
	
	
	
}