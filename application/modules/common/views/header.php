<!DOCTYPE html>
<html lang = "en">
<head>
<?php //pre($this->data['hooks_meta']);
if(!empty($this->data['hooks_meta']->meta_title))
{
        echo '<title>'.$this->data['hooks_meta']->meta_title.'</title>'."\n";
}
elseif(!empty($this->data['hooks_meta']->title))
{
        echo '<title>'.$this->data['hooks_meta']->title.'</title>'."\n";
}
else
{
        echo '<title>'.$this->data['site_settings']->site_name.'</title>'."\n";
}
if(!empty($meta_keyword))
{
        $meta_keywords= $meta_keyword;
}
else if(!empty($this->data['hooks_meta']->meta_keyword))
{
        $meta_keywords= $this->data['hooks_meta']->meta_keyword;
}
else
{
        $meta_keywords= $this->data['site_settings']->meta_keyword;
}
if(!empty($meta_description))
{
        $meta_descriptions= $meta_description;
}
else if(!empty($this->data['hooks_meta']->meta_description))
{
        $meta_descriptions= $this->data['hooks_meta']->meta_description;
}
else
{
        $meta_descriptions= $this->data['site_settings']->meta_description;
}
$mainpage_link = $this->uri->segment(1);
$meta = array(
        array('name' => 'robots', 'content' => 'index, follow, all'),
        array('name' => 'description', 'content' => $meta_descriptions),
        array('name' => 'keywords', 'content' => $meta_keywords),
        array('name' => 'X-UA-Compatible', 'content' => 'IE=edge', 'type' => 'equiv'),
        array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')

);
$page_link = xss_clean($this->uri->segment(1));
if($page_link=='pages')
{
        $page_link = xss_clean($this->uri->segment(2));
}
echo meta($meta);
?>
<?php if(!empty($this->data['site_settings']->site_verification)){ ?>
        <meta name="google-site-verification" content="<?php echo $this->data['site_settings']->site_verification; ?>" />
        <?php } ?>
<?php if(empty($this->session->userdata('cart_id'))){
    $var=time().rand(0000,9999);
    $session_data = array("cart_id"  => md5($var));
    $this->session->set_userdata($session_data);
}
#echo $this->session->userdata('cart_id');
?>
<!--font section start-->
 <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<!--font section end-->
<!--css section start-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/default/css/style.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/default/css/slider.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/default/css/slick.css'); ?>"/>
<!--css section end-->

<!--script section start-->
<script>var base_url='<?php echo base_url();?>';</script>
<script src="<?php echo base_url('public/default/js/jquery-1.8.3.min.js'); ?>"></script>
<script src="<?php echo base_url('public/default/js/responsiveslides.min.js'); ?>"></script>
<script>
        $(function() {
        $(".rslides").responsiveSlides({
                        pager: true,
                        nav: true,
                        auto: true
                });
        });
</script>
<script type='text/javascript' src='<?php echo base_url('public/default/js/custom.js'); ?>'></script>
<script type='text/javascript' src='<?php echo base_url('public/default/js/slick.js'); ?>'></script>
<script type="text/javascript">
    $(document).on('ready', function() {

        $(".variable").slick({
				autoplay:true,
  				autoplaySpeed:2000,
                dots: false,
                infinite: true,
                variableWidth: true,
				centerMode: true
				//slidesToScroll: 1
        });

    });
</script>
<!--script section end-->
</head>
<!--header section start-->
<div class="header">
        <div class="wrapper">
            <?php if(!empty($site_settings->header_logo)){
            $header_logo = $site_settings->header_logo;
            }else{
            $header_logo = base_url('public/default/images/logo.png');
            } ?>
                <a href="<?php echo site_url();?>"><img src="<?php echo $header_logo; ?>" alt="<?php echo $site_settings->site_name; ?>" title="<?php echo $site_settings->site_name; ?>" class="logo"></a>
                <div class="top-right">
                        <ul class="top-social">
                                <?php socialLinks(); ?>
<!--                                <li><a href="#" target="_blank" class="in"></a></li>
                                <li><a href="#" target="_blank" class="inst"></a></li>-->
                        </ul>
                    <?php if($this->data['site_settings']->is_show_header==1 && !empty($this->data['site_settings']->header_button_text) && !empty($this->data['site_settings']->header_button_url)){ ?>
                        <a href="<?php echo $this->data['site_settings']->header_button_url; ?>" class="btn"><?php echo $this->data['site_settings']->header_button_text; ?></a>
                    <?php } ?>
                    <?php if($this->data['site_settings']->is_show_header2==1 && !empty($this->data['site_settings']->header_button_text2) && !empty($this->data['site_settings']->header_button_url2)){ ?>
                        <a href="<?php echo $this->data['site_settings']->header_button_url2; ?>" class="btn"><?php echo $this->data['site_settings']->header_button_text2; ?></a>
                    <?php } ?>
                </div>
        </div>
</div>
<!--header section end-->
	
	
<!--navigation section start-->
<div class="navigation">
        <div class="wrapper">
                <ul class="nav">
                    <?php echo $this->data['hooks_cmspages_list']; ?>
<!--                        <li class="home"><a href="index.html" class="active">Home</a></li>
                        <li class="about"><a href="about.html">About ISMA</a></li>
                        <li class="guide"><a href="#">Seed ID Guide</a></li>
                        <li class="tech"><a href="#">Technical Committees</a></li>
                        <li class="authors"><a href="authors.html">Authors</a></li>
                        <li class="members"><a href="#">Members</a></li>
                        <li class="contact"><a href="#">Contact</a></li>-->
                </ul>
        </div>
        <div class="clear"></div>
</div>
<!--navigation section end-->

<!--banner section start-->
<?php if($this->data['hooks_meta']->page_link=='home'){ ?>
<?php if(!empty($banner_list)){ ?>
<div class="banner">
    <ul class="rslides">
        <?php foreach($banner_list as $banner){ ?>
        <?php if(!empty($banner->banner_photo)){ ?>
        <li>
                <img src="<?php echo $banner->banner_photo; ?>" alt="" title="">
                <?php if(!empty($banner->title) || !empty($banner->banner_text)){ ?>
                <div class="wrapper">
                        <?php if(!empty($banner->title)) echo '<h1>'.$banner->title.'</h1>'; ?>
                        <?php if(!empty($banner->banner_text)) echo outputEscapeString($banner->banner_text); ?>
                </div>
                <?php } ?>
        </li>
        <?php } } ?>
    </ul>
</div>
<?php } ?>
<?php }else{ ?>
<?php if(!empty($commonbanner)){ ?>
<div class="inner-banner">
    <img src="<?php echo $commonbanner->banner_photo; ?>" alt="" title="">
    <div class="wrapper">
            <h1><?php echo $this->data['hooks_meta']->title; ?></h1>
    </div>
</div>
<?php } ?>
<?php } ?>
<!--banner section end-->
