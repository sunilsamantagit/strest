<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shapes_size extends MY_Controller 
{
	private $limit = 20;
	var $offset = 0;
	function __construct()
	{
		parent::__construct();		 
		
		if(!$this->session->userdata('web_admin_logged_in') && get_cookie('uname')=='') {
			redirect('kaizen/welcome','refresh');
		}
		$this->load->vars( array(
		  'global' => 'Available to all views',
		  'header' => 'common/header',
		  'left' => 'common/left',
          'right' => 'common/right',
		  'footer' => 'common/footer'
		));
		
		$this->load->model('modelshapes_size');	
	}

	public function index()
	{	
		$this->dolist();	
	}
	
	
	
	public function dolist(){
		$data = array();
		$where = array();
        $order_by = array('id' => 'desc');
		$data_row = $this->modelshapes_size->select_row('shapes_size',$where,$order_by);
		$data['records']= $data_row;
//echo '<pre>';print_r($data['records']);exit;
		$data_shapes = $this->modelshapes_size->select_row('shapes_management');
		$data['shapes_management']= $data_shapes;
//echo '<pre>';print_r($data['shapes_management']);exit;
		$this->load->view('kaizen/shapes_size/shapes_size_list',$data);	
	}
	
	public function doadd(){
		$data = array();
        $data['details']= new stdClass;
		$shape_id=$this->uri->segment(4);
		$data['details']->status = 1;
		$data['details']->id = $shape_id;
		
		$where = array('status'=>1);
        $order_by = array('title' => 'asc');
	    
		$data_shapes = $this->modelshapes_size->select_row('shapes_management');
		$data['shapes_management']= $data_shapes;
//echo '<pre>';print_r($data['shapes_management']);exit;
		$this->load->view('kaizen/shapes_size/edit_shapes_size',$data);		
	}
    
	public function addedit()
	{
//echo "<pre>"; print_r($_POST);exit;

/*$add_data1 = array(
							'size_name'	=>	$this->input->post('size_name'),
							'shape'	=>	$this->input->post('shape'),
							'status'		=>	$this->input->post('shape_status')
				
						);
						
		$id = $this->modelshapes_size->insert_row('shapes_size',$add_data1);
		if($id) { 
		echo " Inserted Successfully..";
			$session_data = array("SUCC_MSG"  => " Inserted Successfully.");
			$this->session->set_userdata($session_data);					
		}	
		redirect("kaizen/shapes_size/",'refresh');*/
	//.........................new..............................\\	
	
//print_r($add_data1);
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('size_name', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('shape', 'Title', 'trim|required|xss_clean');
		
		//$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		$id=$this->input->post('shape_id','');
	 	
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)  
		{	
			$where = array(
                           
                            'id' => $id
                        );
                $shapes_detls = $this->modelshapes_size->select_row('shapes_size',$where);
				
        		if(!empty($shapes_detls)) 
                {
                   
	//echo "<pre>"; print_r($_POST);exit;		                     
                                $this->size_name     =$this->input->post('size_name',TRUE);
								$this->shape         =$this->input->post('shape',TRUE);
								$this->inches_short  =$this->input->post('inches_short',TRUE);
								$this->metric_short  =$this->input->post('metric_short',TRUE);
								$this->inches_long   =$this->input->post('inches_long',TRUE);
								$this->metric_long   =$this->input->post('metric_long',TRUE);
								$this->size          =$this->input->post('size',TRUE);
								$this->unit_weight   =$this->input->post('unit_weight',TRUE);
								$this->unit_cost     =$this->input->post('unit_cost',TRUE);
								$this->surface       =$this->input->post('surface',TRUE);
								$this->labor         =$this->input->post('labor',TRUE);
                                $this->status	     =$this->input->post('shape_status',TRUE); 
                                if($this->status===false){
                                        $this->status='1';
                                }
							
			 
								
                                $update_data = array(
                                  
                                    'size_name'      => $this->size_name,
									'shape'          => $this->shape,
									'inches_short'   => $this->inches_short,
									'metric_short'   => $this->metric_short,
									'inches_long'    => $this->inches_long,
									'metric_long'    => $this->metric_long,
									'size'           => $this->size,
									'unit_weight'    => $this->unit_weight,
									'unit_cost'      => $this->unit_cost,
									'surface'        => $this->surface,
									'labor'          => $this->labor,
                                    'status'         => $this->status
                                );
                                
                
				$update_where = array('id' => $id);
				if($this->modelshapes_size->update_row('shapes_size',$update_data,$update_where)) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{
				
					$session_data = array("SUCC_MSG"  => "Shapes Size Entries Updated Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else 
				{	
					$session_data = array("ERROR_MSG"  => "Shapes Size Entries Not Updated.");
					$this->session->set_userdata($session_data);				
				}
			}
			else 
			{           
                                $this->size_name       =$this->input->post('size_name',TRUE);
								 $this->shape          =$this->input->post('shape',TRUE);
								 $this->inches_short   =$this->input->post('inches_short',TRUE);
								$this->metric_short    =$this->input->post('metric_short',TRUE);
								$this->inches_long     =$this->input->post('inches_long',TRUE);
								$this->metric_long     =$this->input->post('metric_long',TRUE);
								$this->size            =$this->input->post('size',TRUE);
								$this->unit_weight     =$this->input->post('unit_weight',TRUE);
								$this->unit_cost       =$this->input->post('unit_cost',TRUE);
								$this->surface         =$this->input->post('surface',TRUE);
								$this->labor           =$this->input->post('labor',TRUE);
                                $this->status          =$this->input->post('shape_status',TRUE); 
                             if($this->status===false){
                                $this->status='1';
                }
					
                             
			
              
                $add_data = array(
                                    
                                    'size_name'      => $this->size_name,
                                    'shape'          => $this->shape,
									'inches_short'   => $this->inches_short,
									'metric_short'   => $this->metric_short,
									'inches_long'    => $this->inches_long,
									'metric_long'    => $this->metric_long,
									'size'           => $this->size,
									'unit_weight'    => $this->unit_weight,
									'unit_cost'      => $this->unit_cost,
									'surface'        => $this->surface,
									'labor'          => $this->labor,
                                    'status'         => $this->status
                                );
                                
				$id = $this->modelshapes_size->insert_row('shapes_size',$add_data);
				if($id) // IF UPDATE PROCEDURE EXECUTE SUCCESSFULLY
				{ 
                   
					$session_data = array("SUCC_MSG"  => "Shapes Size Entries Inserted Successfully.");
					$this->session->set_userdata($session_data);					
				}			
				else // IF UPDATE PROCEDURE NOT EXECUTE SUCCESSFULLY
				{	
					$session_data = array("ERROR_MSG"  => "Shapes Size Entries Not Inserted.");
					$this->session->set_userdata($session_data);				
				}
			}
			//redirect("kaizen/shapes_size/doedit/".$id,'refresh');	
			redirect("kaizen/shapes_size/",'refresh');				
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
		$shape_id=$this->uri->segment(4); 		
		$where = array(
                            'id' => $shape_id
                        );
        $shapes_detls = $this->modelshapes_size->select_row('shapes_size',$where);                       
		if($shapes_detls){
			$data['details'] = $shapes_detls[0];
		}
		else{
			$data['details']->status = 1;
			$data['details']->id = 0;
		}
//echo '<pre>';print_r($data['details']);exit;
		
		$data_shapes = $this->modelshapes_size->select_row('shapes_management');
		$data['shapes_management']= $data_shapes;
		
		$this->load->view('kaizen/shapes_size/edit_shapes_size',$data);				
	}
	
	
	
	
}