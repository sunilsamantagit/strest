<?php
function pre($data){
    echo '<pre>';print_r($data);'</pre>';
}
function socialLinks(){
        $CI =& get_instance();
        $CI->load->model("common/model_common");
        $where = array(
            'site_id' => 1
        );
        $order_by = array(
            'sequence' => 'asc'
        );
        $social_settings = $CI->model_common->select_row("social_settings",$where,$order_by);
        //pre($social_settings);
        $default = array(
            1   => 'fb',
            2   => 'twit',
            3   => 'in',
            8   => 'inst',
            5   => 'utube',
            6   => 'pint',
            4   => 'gplus'
        );
        $html = '';
        if(!empty($social_settings)){
            foreach($social_settings as $sos){

              $tooltip='';
              if ($sos->social_menus_id==3) {
                $tooltip = 'LinkedIn';
              } elseif($sos->social_menus_id==8) {
                $tooltip = 'Instagram';
              }

                $class = '';
                if($default[$sos->social_menus_id]){
                    $class = $default[$sos->social_menus_id];
                }

				$html .= '<li >
                    	<a href="'.$sos->link.'" class="'.$class.'" target="_blank">
                      <span tile="'.$tooltip.'">'.$tooltip.'</span>
                      </a>
                    </li>';
            }
        }
        echo $html;

}


function socialLinksContact(){
        $CI =& get_instance();
        $CI->load->model("common/model_common");
        $where = array(
            'site_id' => 1
        );
        $order_by = array(
            'id' => 'asc'
        );
        $social_settings = $CI->model_common->select_row("social_settings",$where,$order_by);
        //pre($social_settings);
        $default = array(
            1   => 'fb',
            2   => 'twit',
            3   => 'inst',
            4   => 'google',
            5   => 'utube',
            6   => 'pint'
        );
        $html = '<li>';
        if(!empty($social_settings)){
            foreach($social_settings as $sos){
                //pre($sos);
                $class = '';
                /*if($default[$sos->social_menus_id]){
                    $class = $default[$sos->social_menus_id];
                }*/
				$html .= '<a href="#" target="_blank" class="fb"></a>';
            }
        }
		$html .= '</li>';
        echo $html;

}
function name_replaceCat($table,$string){
                $CI =& get_instance();
		$string = strip_tags(outputEscapeString($string));
		$string = preg_replace('/[^A-Za-z0-9\s\s]/', '', $string);
		$cat_replace = str_replace(" ","_",$string);
		$query = $CI->db->query("SELECT `id` FROM `".$CI->db->dbprefix($table)."` WHERE page_link like '%".$cat_replace."%'");
		$count=$query->num_rows();
		if($query->num_rows()>0){
			$cat_replace=$cat_replace.($count+1);
		}
		return strtolower($cat_replace);
	}
function uploadImage($field='',$upload_dir='',$file_type='gif|jpg|jpeg|png')
    {
        $CI =& get_instance();
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



        $CI->load->library('upload', $config); // LOAD FILE UPLOAD LIBRARY
        $CI->upload->initialize($config);
        if($CI->upload->do_upload($field_name)) // CREATE ORIGINAL IMAGE
		{
			$fInfo = $CI->upload->data();
			//$data['uploadInfo'] = $fInfo;

			return $fInfo['file_name']; // RETURN ORIGINAL IMAGE NAME
		}
		else // IF ORIGINAL IMAGE NOT UPLOADED
		{
			return false; // RETURN ORIGINAL IMAGE NAME
		}
}

function resizingImage($fileName='',$upload_rootdir='',$img_width='',$img_height='',$img_prefix = ''){

        $CI =& get_instance();
        if(!is_dir(file_upload_absolute_path().$upload_rootdir)){
                $oldumask = umask(0);
                mkdir(file_upload_absolute_path().$upload_rootdir, 0777); // or even 01777 so you get the sticky bit set
                umask($oldumask);
        }

        $config['image_library'] = 'gd2';
     	$config['source_image'] = file_upload_absolute_path().$upload_rootdir.$fileName;
        $config['new_image']	= file_upload_absolute_path().$upload_rootdir.$img_prefix.$fileName;

        $config['maintain_ratio'] = FALSE;
        $config['width'] = $img_width;
        $config['height'] = $img_height;
	$CI->load->library('image_lib', $config);
       	$CI->image_lib->initialize($config);
      	if(!$CI->image_lib->resize()){
            echo $CI->image_lib->display_errors();
        }
        else{
                return false;
        }



}

function uploadDocument($field='',$upload_dir='',$file_type='*')
    {
        $CI =& get_instance();
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



        $CI->load->library('upload', $config); // LOAD FILE UPLOAD LIBRARY
        $CI->upload->initialize($config);
        if($CI->upload->do_upload($field_name)) // CREATE ORIGINAL IMAGE
		{
			$fInfo = $CI->upload->data();
			//$data['uploadInfo'] = $fInfo;

			return $fInfo['file_name']; // RETURN ORIGINAL IMAGE NAME
		}
		else // IF ORIGINAL IMAGE NOT UPLOADED
		{
			return false; // RETURN ORIGINAL IMAGE NAME
		}
}

        function get_video_url($video_url=''){
                $play=strpos($video_url,"vimeo");
                if($play>0){
                    $video_arr=explode("com/",$video_url);
                    $str=$video_arr[1];
                    $video_str="http://player.vimeo.com/video/".$str."?rel=0";
                }else{
                    $video_str=$video_url;
                }
                return $video_str;
        }

        function get_video_image($video_url=''){
                $play=strpos($video_url,"vimeo");
                if($play>0){
                    $video_arr=explode("com/",$video_url);
                    $imgid=$video_arr[1];
                    $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
                    $img_str=$hash[0]['thumbnail_medium'];
                }else{
                    $video_arr=explode('embed/',$video_url);
                    $imgarr=explode('?list=',$video_arr[1]);
                    $imgid=$imgarr[0];
                    $img_str='http://img.youtube.com/vi/'.$imgid.'/default.jpg';
                }
                return $img_str;
        }

        function urlByPageLink($page_link=''){
            if($page_link == "authors") {
                return site_url($page_link);
            }else{
                return site_url("pages/".$page_link);
            }
        }


//function tracking($field_arr,$id,$table_name,$module_name,$editid='',$action='')
//{
//  $CI =& get_instance();
//  $CI->load->model("common/model_common");
//  $field_str = '';
//  foreach($field_arr as $field){
//    $field_str[] = $field['field_name'];
//  }
//  $old_value_str = '';
//  $new_value_str = '';
//  if(!empty($field_str) && !empty($id)){
//    $field_str_new = implode(", ",$field_str);
//
//    $CI->db->select($field_str_new);
//    $CI->db->where('id', $id);
//    $query = $CI->db->get($table_name);
//    $value_obj = $query->row();
//    $value_str = json_encode($value_obj);
//  }
//  if(empty($editid) && $action == 'edit'){
//    $old_value_str = $value_str;
//  }else{
//    $new_value_str = $value_str;
//  }
//  if(!empty($old_value_str)){
//    $data = array(
//      'element_id' 				=> $id,
//      'old_value' 				=> $old_value_str,
//      'action' 				=> $action,
//      'table_name' 			=> $table_name,
//      'module_name' 			=> $module_name,
//      'update_by' 			=> $CI->session->userdata('web_admin_user_name'),
//      'created_date' 			=> date("Y-m-d H:i:s"),
//      'field_arr'				=> json_encode($field_arr)
//    );
//  }else{
//    $data = array(
//      'element_id' 				=> $id,
//      'new_value' 				=> $new_value_str,
//      'action' 				=> $action,
//      'table_name' 			=> $table_name,
//      'module_name' 			=> $module_name,
//      'update_by' 			=> $CI->session->userdata('web_admin_user_name'),
//      'created_date' 			=> date("Y-m-d H:i:s"),
//      'field_arr'				=> json_encode($field_arr)
//    );
//  }
//  //sendmail($data);
//  if(!empty($editid)){
//    if($old_value_str != $new_value_str){
//      $update_where = array('id' => $editid);
//      $CI->model_common->update_row('tracking',$data,$update_where);
//      //sendmail($editid);
//    }
//    return $editid;
//  }else{
//    $editid = $CI->model_common->insert_row('tracking',$data);
//    //sendmail($editid);
//    return $editid;
//  }
//
//}

function getalltracking($element_id,$module_name){
  $CI =& get_instance();
  $CI->load->model("common/model_common");
  if(!empty($element_id) && !empty($module_name)){
    $where = array(
      'element_id' => $element_id,
      'module_name' => $module_name
    );
    $order_by = array('id' => 'desc');

    $all_details = $CI->model_common->select_row('tracking',$where,$order_by); //pre($all_details);
    if(!empty($all_details[0])){
      $str = '<div class="rt-block manage-box">
      <div class="rt-bg-block">
      <h2>Tracking Details</h2>
      <ul class="web-cont-rt-list">
      ';
      /*    $str .= "<script type='text/javascript' src='".base_url("public/js/jquery.fancybox.js")."'></script>";*/
      //	$str .= '<link type="text/css" href="'.base_url("public/css/jquery.fancybox.css").'" rel="stylesheet">';
      $str .= '<li id="cms1">';
      $str .= '<span>';
      $str .= 'last edited by '.$all_details[0]->update_by.' on '.date("d M Y", strtotime($all_details[0]->created_date));;
      $str .= '</span>';
      $str .= '<a class="" target="_blank" href="'.base_url("kaizen/tracking/details/".$all_details[0]->id).'">View changes</a>';
      $str .= '</li></ul>';

      if(count($all_details) > 1){
        $str .= '<a id="mc" href="javascript:void(0);" onclick="showli();">View History</a>';
        $str .= '<ul class="web-cont-rt-list">';
        $ic = 0;
        foreach($all_details as $ad){
          if($ic > 0){
            $str .= '<li id="cms2" class="cms2" style="display:none;">';
            $str .= '<span>';
            $str .= 'edited by '.$ad->update_by.' on '.date("d M Y", strtotime($ad->created_date));;
            $str .= '</span>';
            $str .= '<a class="" target="_blank" href="'.base_url("kaizen/tracking/details/".$ad->id).'">View changes</a>';
            $str .= '</li>';
          }
          $ic++;
        }
        $str .= '</ul>';
      }

      $str .= '			</ul>
      </div>
      </div><script> function showli(){
        $(".cms2").show();
        $("#mc").hide();
      }$(document).ready(function() {

        $("a.fancybox").fancybox();

      });</script>';
      echo $str;
    }
  }
}


function getalltracking_user($id){
  $CI =& get_instance();
  $CI->load->model("common/model_common");
  //if(!empty($element_id) && !empty($module_name)){
  $where = array(
    'id' => $id
  );
  //$order_by = array('id' => 'desc');
  $str = '';

  $all_details = $CI->model_common->select_row('tracking',$where); //pre($all_details);
  if(!empty($all_details[0])){

    //$str .= '<li id="cms1">';
    //	$str .= '<span>';
    //$str .= 'last edited by '.$all_details[0]->update_by.' on '.date("d M Y", strtotime($all_details[0]->created_date));;
    //$str .= '</span>';
    $str .= '<a target="_blank" href="'.base_url("kaizen/tracking/details/".$all_details[0]->id).'" class="block-btn edit-btn"><span style="background: none;" >View changes</span></a>';
    //$str .= '</li></ul>';


    $str .= '			</ul>
    <script> function showli(){
      $(".cms2").show();
      $("#mc").hide();
    }</script>';
    echo $str;
  }
  //}
}

function trackingNew($field_arr,$id,$table_name,$module_name,$editid='',$action=''){
  $CI =& get_instance();
  $CI->load->model("common/model_common");
  $field_str = array();
  foreach($field_arr as $field){
    $field_str[] = $field['field_name'];
  }
  $old_value_str = '';
  $new_value_str = '';
  if(!empty($field_str) && !empty($id)){
    $field_str_new = implode(", ",$field_str);

    $CI->db->select($field_str_new);
    $CI->db->where('id', $id);
    $query = $CI->db->get($table_name);
    if($query){
    $value_obj = $query->row();
  }else{
    $value_obj = '';
  }
    $value_str = '';
    $value_str = json_encode($value_obj);
  }
  if(empty($editid) && $action == 'edit'){
    return $value_str;
  }else{
    return $value_str;
  }
}
function insert_tracking($field_arr,$id, $oldvalue = '', $newvalue = '',$action,$table_name,$module_name){
  $CI =& get_instance();

  $CI->load->model("common/model_common");
  $data = array(
    'element_id' 				=> $id,
    'old_value' 				=> $oldvalue,
    'new_value' 				=> $newvalue,
    'action' 				=> $action,
    'table_name' 			=> $table_name,
    'module_name' 			=> $module_name,
    'update_by' 			=> $CI->session->userdata('web_admin_user_name'),
    'created_date' 			=> date("Y-m-d H:i:s"),
    'field_arr'				=> json_encode($field_arr)
  );
  $editid = $CI->model_common->insert_row('tracking',$data);
  //sendmail($editid,$action,$module_name);
  return $editid;
}


?>
