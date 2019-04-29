<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Metalist
{

  public function get_meta()
  {
    $CI =& get_instance();
    $CI->load->model('home/model_meta');
    $CI->load->model('home/model_home');
    $tot_meta = $CI->model_meta->count_meta();

    if($tot_meta)
    {
      $meta_list = $CI->model_meta->meta_list();
      $data=array();
      $CI->data['hooks_meta'] = $meta_list;
      $site_setting = $CI->model_meta->site_settings();
      $CI->data['site_settings']=$site_setting;
      $CI->data['contact']=$CI->model_meta->selectOne('contact',array('id'=>1));
     // $commonbanner = $CI->model_meta->commonbanner($meta_list->id);
    //  $CI->data['commonbanner']=$commonbanner;
      
     // pre($meta_list);
    if(!empty($meta_list->parent_id)) {
        $where=array('parent_id'=>$meta_list->parent_id,'is_active'=>1,'shown_in_top'=>1);
        $order_by=array('display_order'=>'asc');
        $CI->data['subpage_list']=$CI->model_meta->select_row('cms_pages',$where,$order_by);
        $where=array('id'=>$meta_list->parent_id);
        $page_details=$CI->model_meta->selectOne('cms_pages',$where);
        $CI->data['parent_title']=$page_details->title;
    }else{
        $where=array('parent_id'=>$meta_list->id,'is_active'=>1,'shown_in_top'=>1);
        $order_by=array('display_order'=>'asc');
        $CI->data['subpage_list']=$CI->model_meta->select_row('cms_pages',$where,$order_by);
        $CI->data['parent_title']=$meta_list->title;
    }

    }
    else
    {
      $site_setting = $CI->model_meta->site_settings();
      $data=array();
      $CI->data['hooks_meta'] = $site_setting;
      $meta_list = $site_setting;
    //  $commonbanner = $CI->model_meta->commonbanner('%');
    //  $CI->data['commonbanner']=$commonbanner;
      $CI->data['site_settings']=$site_setting;
      $CI->data['contact']=$CI->model_meta->selectOne('contact',array('id'=>1));
      
      //pre($meta_list);
    if(!empty($meta_list->parent_id)) {
        $where=array('parent_id'=>$meta_list->parent_id,'is_active'=>1);
        $order_by=array('display_order'=>'asc');
        $CI->data['subpage_list']=$CI->model_meta->select_row('cms_pages',$where,$order_by);
        $where=array('id'=>$meta_list->parent_id);
        $page_details=$CI->model_meta->selectOne('cms_pages',$where);
        $CI->data['parent_title']=$page_details->title;
    }else{
        $where=array('parent_id'=>$meta_list->id,'is_active'=>1);
        $order_by=array('display_order'=>'asc');
        $CI->data['subpage_list']=$CI->model_meta->select_row('cms_pages',$where,$order_by);
        $CI->data['parent_title']=$meta_list->title;
    }

    }

    $CI->data['mem_first_nations'] = $CI->model_meta->select_row('first_nations',array('is_active'=>'1','is_type'=>'1'),array('display_order'=>'asc'));
    $CI->data['other_first_nations'] = $CI->model_meta->select_row('first_nations',array('is_active'=>'1','is_type'=>'0'),array('display_order'=>'asc'));
    // $sidebar_pages=$CI->model_meta->select_row('cms_pages',array('is_active'=>'1','id'=>'8'),array('display_order'=>'asc'));
    //
    // $selected_page_id_arr=explode(',',$sidebar_pages[0]->page_id);
    //             $selected_page_id = array();
    //             foreach($selected_page_id_arr as $select_id){
    //                 $select_id_ar = explode('~',$select_id);
    //                 if(!empty($select_id_ar[1]))
    //                         $selected_page_id[] = $select_id_ar[1];
    //             }
    //             $page_list = $CI->model_meta->getSingleRecordPageName($selected_page_id);
    //         		$CI->data['page_list'] =$page_list;

    $CI->data['inner_pages'] = $CI->model_meta->select_row('cms_pages',array('is_active'=>'1','parent_id'=>'2'),array('display_order'=>'asc'));

    $socialmedia=$CI->model_meta->select_row('social_settings');
    $sclist='';
    if(!empty($socialmedia)){
      foreach ($socialmedia as $value) {
        switch ($value->social_menus_id) {
          case 1:
            $class='fb';
            break;
          case 2:
            $class='twit';
            break;
          case 5:
            $class='utube';
            break;

          default:
            # code...
            break;
        }
        $sclist.='<li><a href="'.$value->link.'" target="_blank" class="'.$class.'"></a></li>';
      }
      $CI->data['socialmedia_list']=$sclist;
    }

  }
}
