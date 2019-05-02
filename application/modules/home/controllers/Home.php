<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	var $data = array();
	public function __construct() {
	   parent::__construct();
	   $this->load->vars( array(
		  'header' => 'common/header',
		  'footer' => 'common/footer'
		));
		$this->load->model('home/model_home');
                header("Location: http://www.saskatoonmetal-test.com.php72-4.lan3-1.websitetestlink.com/kaizen/main"); 
	}


public function index(){
	//redirect('kaizen/welcome');
	header("Location: http://www.saskatoonmetal-test.com.php72-4.lan3-1.websitetestlink.com/kaizen/main"); 
        $where=array('is_active'=>1);
        $order_by=array('display_order'=>'asc');
       // $this->data['banner_list']=  $this->model_home->select_row('banner',$where,$order_by);
        
	$where2=array('is_active'=>1);
	$order2=array('display_order'=>'asc');
	//$this->data['home_block_list']=  $this->model_home->select_row('home_block',$where2,$order2);
        
	$where2=array('is_active'=>1);
	$order2=array('display_order'=>'asc');
	//$this->data['partner_list']=  $this->model_home->select_row('partners',$where2,$order2);
        
	$where2=array('is_active'=>1);
	$order2=array('display_order'=>'asc');
	//$this->data['sponsor_list']=  $this->model_home->select_row('sponsors',$where2,$order2);
        
	$this->load->view('home',$this->data);
  }
}
