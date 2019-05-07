<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller
{
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
		  'footer' => 'common/footer'
		));
		$this->load->model('modelsettings');
	}

	public function index()
	{
		$data = array();
                $where = array(
                    'id' => 1
                        );
		$res_arr = $this->modelsettings->select_row('site_settings',$where);
                if(!empty($res_arr[0])){
                    $data['details'] = $res_arr[0];
                }else{
                    $data['details'] = array();
                }
                 $where = array(
                    'id' => $this->session->userdata('web_admin_user_id')
                        );
                $where_social = array(
                            'site_id' => 1
                        );
                $order_by = array('sequence' =>'desc');
                $social_settings_arr = $this->modelsettings->select_row('social_settings',$where_social,$order_by);
                $data['social_settings_arr'] = $social_settings_arr;
                $where_user = array('id' => $this->session->userdata('web_admin_user_id'));
                $data['user_details'] =$this->modelsettings->select_row('admin',$where_user);
		$this->load->view('settings/settings',$data);
	}

	public function save()
	{
		$data = array();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('site_name', 'Site Name', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="validation_msg">', '</span>');
		if($this->form_validation->run() == TRUE) // IF MENDATORY FIELDS VALIDATION TRUE(SERVER SIDE)
		{
			//$getFile=$this->modelsettings->getSingleRecord('1');
                        $where = array(
                            'id' => 1
                        );
                        $q = $this->modelsettings->select_row('site_settings',$where);

												$where = array(
                            'id' => 1
                        );

    $this->site_name								= $this->input->post('site_name',TRUE);
    $this->url									= $this->input->post('url',TRUE);
    $this->copy_right								= $this->input->post('copy_right',TRUE);
    $this->contact_email							= $this->input->post('contact_email',TRUE);
    $this->header_email								= $this->input->post('header_email',TRUE);
    $this->header_phone								= $this->input->post('header_phone',TRUE);
    $this->address								= $this->input->post('address',TRUE);
    $this->partner_link								= $this->input->post('partner_link',TRUE);
    $this->sponsor_link								= $this->input->post('sponsor_link',TRUE);
$this->forgot_password_email							= $this->input->post('forgot_password_email',TRUE);
$this->site_verification									= $this->input->post('site_verification','');
$this->analytics_code											= $this->input->post('analytics_code','');
$this->header_logo												= $this->input->post('header_logo',TRUE);
    $this->footer_logo												= $this->input->post('footer_logo',TRUE);
$this->profile_id											= $this->input->post('profile_id',TRUE);
$this->meta_title											= $this->input->post('meta_title','');
$this->meta_keyword											= $this->input->post('meta_keyword','');
$this->meta_desc											= $this->input->post('meta_desc','');
    $this->latitude											= $this->input->post('latitude',TRUE);
    $this->longitude											= $this->input->post('longitude',TRUE);
    $this->header_button_text											= $this->input->post('header_button_text',TRUE);
    $this->header_button_url											= $this->input->post('header_button_url',TRUE);
    $this->is_show_header											= $this->input->post('is_show_header',TRUE);
    $this->header_button_text2											= $this->input->post('header_button_text2',TRUE);
    $this->header_button_url2											= $this->input->post('header_button_url2',TRUE);
    $this->is_show_header2											= $this->input->post('is_show_header2',TRUE);
    $this->edition											= $this->input->post('edition',TRUE);
    
      $this->last_update		=$this->input->post('last_update',TRUE);
     $phptime = strtotime($this->last_update);
     $last_update = date ("Y-m-d", $phptime);

                        $upd_data = array(
                            'site_name' 							=>	$this->site_name,
                            'url' 								=>	$this->url,
                            'copy_right' 							=>	$this->copy_right,
                            'site_verification'						=> 	$this->site_verification,
                            'analytics_code'							=> 	$this->analytics_code,
                            'header_logo' 			 					=> 	$this->header_logo,
                            'footer_logo' 			 					=> 	$this->footer_logo,
                            'header_email'								=>	$this->header_email,
                            'header_phone'								=>	$this->header_phone,
                            'profile_id' 									=> 	$this->profile_id,
                            'forgot_password_email' 			=> 	$this->forgot_password_email,
                            'contact_email' 							=> 	$this->contact_email,
                            'address' 										=> 	$this->address,
                            'partner_link' 										=> 	$this->partner_link, 
                            'sponsor_link' 										=> 	$this->sponsor_link, 
                            'meta_title' 									=> 	$this->meta_title,
                            'meta_description' 						=> 	$this->meta_desc,
                            'latitude'										=>	$this->latitude,
                            'longitude'										=>	$this->longitude,
                            'header_button_text'										=>	$this->header_button_text,
                            'header_button_url'										=>	$this->header_button_url,
                            'is_show_header'										=>	$this->is_show_header,
                            'header_button_text2'										=>	$this->header_button_text2,
                            'header_button_url2'										=>	$this->header_button_url2,
                            'is_show_header2'										=>	$this->is_show_header2,
                            'edition'										=>	$this->edition,
                             'last_update' 					=> $last_update,
                           'meta_keyword' 								=> 	$this->meta_keyword
                        );
                        $this->password_hint=$this->input->post('password',TRUE);
                        $this->password=SHA1($this->password_hint);
                        $update_data=array('pwd'=>$this->password,
                                            'pwd_hint'=>$this->password_hint
                            );
                        $where_userdata=array('id' => $this->session->userdata('web_admin_user_id'));
                        $this->modelsettings->update_row("admin",$update_data,$where_userdata);

												$return = $this->modelsettings->update_row("site_settings",$upd_data,$where);
                       // echo "<pre>";print_r($_POST);exit;
                        $count = $this->input->post("count");
                        if(!empty($count)){
                            for($i=1;$i<=$count;$i++){
                                $social_menus_id = $this->input->post("predifine_link_".$i);
                                $url = $this->input->post("url_".$i);
                                $sequence = $this->input->post("sequence_".$i);
                                $social_settings_id = $this->input->post("social_settings_id_".$i);

                                if(!empty($social_menus_id) && !empty($url) && !empty($sequence)){
                                    $social_arr = array(
                                                    'social_menus_id' => $social_menus_id,
                                                    'link' => $url,
                                                    'site_id' => 1,
                                                    'sequence' => $sequence
                                    );
                                    if(!empty($social_settings_id)){
                                        $update_where = array('id' => $social_settings_id);
                                        $this->modelsettings->update_row('social_settings',$social_arr,$update_where);
                                    }else{

                                         $this->modelsettings->insert_row('social_settings',$social_arr);
                                    }
                                }
                            }
                        }
			$session_data = array("SUCC_MSG"  => "Settings Updated Successfully.");
			$this->session->set_userdata($session_data);
			redirect("kaizen/settings/",'refresh');
		}
		else
		{
			$this->index();
		}
	}

        public function add_file(){
					$data = array();

					$count = $this->input->post("count");
					$url = $this->input->post("url");
					$predifine_link = $this->input->post("predifine_link");
					$sequence = $this->input->post("sequence");
					$social_settings_id = $this->input->post("social_settings_id");

					$data['count'] = $count;
					$data['url'] = $url;
					$data['predifine_link'] = $predifine_link;
					$data['social_settings_id'] = $social_settings_id;
					$data['sequence'] = $sequence;
					$where = array(
                            'site_id' => 1,
                            'is_active' =>1
                        );
          $social_menus_arr = $this->modelsettings->select_row('social_menus',$where);
          $data['social_menus_arr'] = $social_menus_arr;

          if(empty($social_settings_id)){
                   $where_social = array(
                                'site_id' => 1
                            );
                }else{
                    $where_social = array(
                                'site_id' => 1,
                                'id !=' => $social_settings_id
                            );
                }
          $social_settings_arr = $this->modelsettings->select_row('social_settings',$where_social);
          $data['social_settings_arr'] = $social_settings_arr;

		$this->load->view('settings/file_div_information',$data);
	}

	 public function deleteSocial(){
        $id = $this->input->post('social_settings_id');
        $this->db->where('id', $id);
        $this->db->delete('social_settings');
    }
    function uploadpdf($field='',$upload_dir='',$file_type='pdf')
    {
        $field_name=$field;

        if(!is_dir(file_upload_absolute_path().$upload_dir)){
                $oldumask = umask(0);
                mkdir(file_upload_absolute_path().$upload_dir, 0777); // or even 01777 so you get the sticky bit set
                umask($oldumask);
        }

        $config['upload_path'] = file_upload_absolute_path().$upload_dir;
        $config['allowed_types'] = $file_type;
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';

        $this->load->library('upload', $config); // LOAD FILE UPLOAD LIBRARY
        $this->upload->initialize($config);
        if($this->upload->do_upload($field_name)) // CREATE ORIGINAL IMAGE
		{
			$fInfo = $this->upload->data();
			//$data['uploadInfo'] = $fInfo;

			return $fInfo['file_name']; // RETURN ORIGINAL IMAGE NAME
		}
		else // IF ORIGINAL IMAGE NOT UPLOADED
		{
			return false; // RETURN ORIGINAL IMAGE NAME
		}
}

}
