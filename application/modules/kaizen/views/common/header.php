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
<!--    <a  href="<?php echo site_url(); ?>"><img width="60px;" height="60px;" src="<?php echo base_url("public/default/images/logo.png"); ?>" alt="<?php echo  $this->config->item("COMPANY_NAME");?>" title="<?php echo  $this->config->item("COMPANY_NAME");?>" class="logo" /></a>-->
    <a  href="<?php echo site_url(); ?>"><h2>STREST</h2></a>
    <div class="top-right">
        <span><img src="<?php echo base_url("public/images/user-icon.png"); ?>" alt="">Welcome <?php echo $user_detls->first_name; ?>, </span>
    	<ul>
            <li class="my_profile"><a href="<?php echo site_url("kaizen/user/doedit/".$user_detls->id);?>">My Profile</a></li>
            <li class="my_profile"><a href="<?php echo site_url("kaizen/settings");?>">Setting</a></li>
            <li><a href="<?php echo site_url("kaizen/logout");?>" class="log"> Logout</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>

    <!--Header end-->
<style>
.top-right{ position:relative; margin-bottom: 0;}
.top-right span{ display: block; cursor: pointer; padding-bottom: 5px; position: relative; padding-right: 13px; line-height: 18px;}
.top-right span:after{ content:""; border: solid black; border-width: 0 2px 2px 0; display: inline-block; padding: 3px; transform: rotate(45deg); position: absolute; right: 0; top: 4px;}
.top-right ul{ display:none; position: absolute; width: 160px; right: 0; top: 100%; background: #fff;box-shadow: 0px 1px 5px -3px rgba(0,0,0,0.75);}
.top-right ul li{ width:100%; padding: 10px 15px; box-sizing: border-box; border-bottom: 1px solid #ddd;}
.top-right:hover ul{ display: block;}
.top-right ul li a{ display: block;}
.top-right span img{width: 18px;
    height: 18px;
    display: inline-block;
    border-radius: 50%;
    vertical-align: middle; margin-right: 5px;
</style>
