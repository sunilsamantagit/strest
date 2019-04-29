<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_class{
  var $page_link = "";
  var $services_arr = "";
  public function __construct(){
    $CI =& get_instance();
    $this->page_link = $CI->uri->segment(1);
    if(empty($this->page_link))
    {
      $this->page_link="home";
    }
    elseif($this->page_link=="pages"){
      $this->page_link = $CI->uri->segment(2);
    }
    elseif($this->page_link=="draft" || $this->page_link=="draft_home"){
      $this->page_link = "home";
    }
  }
  public function get_menu(){
    $CI =& get_instance();
    $CI->load->model('home/model_meta');
    $tot_banner = $CI->model_meta->count_cmspages();
    if($tot_banner){
      $cmspages_list_top = $CI->model_meta->get_top_list();
      $cmspages_list_footer = $CI->model_meta->get_footer_list();

      $data=array();

      $TOP_NAV_MENU = '';
      $cms_menu = $this->generate_menu(0,$cmspages_list_top, $TOP_NAV_MENU, 0);
      $CI->data['hooks_cmspages_list'] = $cms_menu;

      $TOP_NAV_MENU2 = '';
  		$cms_menu2 = $this->generate_menuf(0,$cmspages_list_footer, $TOP_NAV_MENU2, 0);
  		$CI->data['hooks_footerpages_list'] = $cms_menu2;

    }
  }

  public function generate_menu($parent,$menus_array, &$TOP_NAV_MENU, $level_depth=0){
    $has_childs = false;
    $level_depth++;
    foreach($menus_array as $key => $value){
      if ($value['parent_id'] == $parent){
        if ($has_childs === false){
          $has_childs = true;
          if($level_depth==1){$TOP_NAV_MENU .= "<ul class=\"nav\">\n";}
          else{$TOP_NAV_MENU .= "<ul>\n";}
        }

        $data_hover = "";

        if($this->page_link==$value['page_link']){$cl="class='active'"; }else{$cl="";}

        //Details by Page link
        $CI =& get_instance();
        $CI->load->model('home/model_meta');

        $dtls = $CI->model_meta->selectOne('cms_pages',array('page_link' =>$this->page_link));

        if(!empty($dtls->parent_id) && ($dtls->parent_id==$value['id'])){$cl3="class='active'"; }else{$cl3="";}

        if(!empty($value['external_link'])){
            $hrefVal = $value['external_link'];
            $new_tab = "target='_blank'";
        }else{
            $new_tab = "";
            if(!empty($value['page_link'])){ 
                $hrefVal = urlByPageLink($value['page_link']);
            }else{
                $hrefVal='javascript:void(0);';
            }

        }
        if($value['page_link']=="home"){
          $TOP_NAV_MENU .= '<li class="home" ><a '.$cl.' '.$data_hover.' href="'.site_url().'">' . $value['title'] . '</a>';
        }else{
          $TOP_NAV_MENU .= '<li class="'.$value['class'].'" ><a '.$cl.' '.$cl3.' '.$new_tab.' '.$data_hover.' href="'.$hrefVal.'" >' . $value['title'] . '</a>';
        }

        if($level_depth<1){$this->generate_menu($key,$menus_array,$TOP_NAV_MENU,$level_depth);}
        $TOP_NAV_MENU .= "</li>\n";
      }
    }
    if ($has_childs === true){$TOP_NAV_MENU .= "</ul>\n";}
    //echo $TOP_NAV_MENU;exit;
    return $TOP_NAV_MENU;
  }

  public function generate_menuf($parent,$menus_array, &$TOP_NAV_MENU, $level_depth=0){
    $has_childs = false;
    $level_depth++;
    foreach($menus_array as $key => $value){
      if(!empty($value['shown_in_footer']) && $value['shown_in_footer']=='1'){
        if ($has_childs === false){
          $has_childs = true;
          if($level_depth==1){$TOP_NAV_MENU .= "<ul>\n";}
          else{$TOP_NAV_MENU .= "<ul>\n";}
        }

        if($this->page_link==$value['page_link']){$cl="class='active'";}else{$cl="";}

        if(!empty($value['external_link'])){
          $hrefVal = $value['external_link'];
          $new_tab = "target='_blank'";
        } else {
          $new_tab = "";
          if(!empty($value['page_link'])){
            $hrefVal = urlByPageLink($value['page_link']);
        }else{
          $hrefVal='javascript:void(0);';
        }

}
        if($value['page_link']=="home"){
          $TOP_NAV_MENU .= '<li><a href="'.base_url().'" '.$cl.'>' . $value['title'] . '</a>';
          }else if(!empty($value['external_link'])) {
          $hrefVal = $value['external_link'];
          $TOP_NAV_MENU .= '<li><a href="'.$hrefVal.'" '.$cl.' '.$new_tab.'>' . $value['title'] . '</a>';
        }else{
          $TOP_NAV_MENU .= '<li><a href="'.$hrefVal.'" '.$cl.' '.$new_tab.'>' . $value['title'] . '</a>';
        }
        if($value['page_link']!="contact_us"){
          $TOP_NAV_MENU .= "</li>\n";
        }else{
          $TOP_NAV_MENU .= "</li>\n";
        }
      }
    }
    if ($has_childs === true){$TOP_NAV_MENU .= "</ul>\n";}

    return $TOP_NAV_MENU;
  }

}
