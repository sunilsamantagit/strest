<?php  //pre($this->session->userdata['web_admin_user_id']);
$user_detls = $this->model_home->selectOne('admin',array('id'=>$this->session->userdata['web_admin_user_id']));
// pre($user_detls);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo  $this->config->item("COMPANY_NAME");?></title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css" />



<!--script section start-->
<script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/calender.css">
<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui-timepicker-addon.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery-ui-timepicker-addon.css">
<script>
  $(function() {
    $( ".datepicker" ).datetimepicker();
  });
  $(function() {
    $( ".onlydate" ).datepicker();
  });
   $(function() {
    $( ".timepicker" ).timepicker();
  });
</script>
<script>
    var base_url = "<?php echo site_url(); ?>";
    var current_class = "<?php echo $this->router->fetch_class(); ?>";
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>public/js/radio.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/dropdown.js"></script>

<!--script section end-->

</head>

<body>
<!--Header start-->

<div class="total-body">

<div class="header">
  <div id="menu_toggle"><i class="fa fa-angle-left"></i></div>
<!--    <a  href="<?php echo site_url(); ?>"><img width="60px;" height="60px;" src="<?php echo base_url("public/default/images/logo.png"); ?>" alt="<?php echo  $this->config->item("COMPANY_NAME");?>" title="<?php echo  $this->config->item("COMPANY_NAME");?>" class="logo" /></a>-->
    <!-- <div class="logo">
        <a href="<?php echo site_url('kaizen/main'); ?>">STREST</a>
    </div>  -->
    <div class="top-right">
        <span><img src="<?php echo base_url("public/images/user-icon.png"); ?>" alt="">Welcome <?php echo $user_detls->first_name; ?>, </span>
    	<ul>
            <li><a class="" href="<?php echo site_url("kaizen/user/doedit/".$user_detls->id);?>"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
            <li><a class="" href="<?php echo site_url("kaizen/settings");?>"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a></li>
            <li><a href="<?php echo site_url("kaizen/logout");?>" class=""><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>

    <!--Header end-->
<style>
.web-red-btn, .new-survey-btn-blue{ text-transform: inherit;font-size: 13px;}
.mid-content{ min-height:inherit;}
.web-cont-mid{ padding-bottom: 0px !important;}
#webcont-form form .single-column{ overflow: inherit;}
.formError.inline { position: absolute !important; left: 100px !important;  bottom: -14px; top: auto !important;}
.formError.inline .formErrorContent{color: #ee0101;background: none;padding: 0}
.formError.inline .formErrorContent br{ display:none;}
.top-right ul li a{ display: inline-block;}
.top-right ul li a:hover{ text-decoration: none;}
</style>

<script>
$(document).ready(function(){
  $("#menu_toggle").click(function(){
    $("body").toggleClass("sidebar_close");
  });
});
</script>
