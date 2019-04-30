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
    <a  href="<?php echo site_url(); ?>"><img width="60px;" height="60px;" src="<?php echo base_url("public/default/images/logo.png"); ?>" alt="<?php echo  $this->config->item("COMPANY_NAME");?>" title="<?php echo  $this->config->item("COMPANY_NAME");?>" class="logo" /></a>
    <div class="top-right">
    	<ul>

            <li>Welcome <?php echo $user_detls->first_name; ?>, </li>
            <li class="my_profile"><a href="<?php echo site_url("kaizen/user/doedit/".$user_detls->id);?>">My Profile</a> |</li>
            <li><a href="<?php echo site_url("kaizen/logout/");?>" class="log"> Log Out</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>

<!--Header end-->
