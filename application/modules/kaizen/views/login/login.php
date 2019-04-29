<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $this->config->item('COMPANY_NAME'); ?></title>
        <link rel="stylesheet" href="<?php echo base_url("public/validator/css/validationEngine.jquery.css");?>" type="text/css"/>
        <script src="<?php echo base_url("public/js/jquery-1.8.3.min.js");?>" type="text/javascript"></script>
<script src="<?php echo base_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>
<link rel="icon" href="<?php echo base_url("public/default/images/favicon.ico"); ?>" type="image/gif" sizes="16x16" />
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		/*margin: 40px;*/
        margin-top: -100px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #000;
		background-color: transparent;
		/*border-bottom: 1px solid #D0D0D0;*/
		font-size: 35px;
		font-weight: normal;
		margin: 0 0 45px 0;
		padding: 14px 15px 10px 15px;
                line-height:35px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
    	margin: 35px 15px;
	}

	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container{
		margin: 10px;
		/*border: 1px solid #D0D0D0;*/
                padding-top: 20px;
		margin: 10% auto 0;
    	text-align: center;
    	width: 45%;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	#uname{
		border: 1px solid #dddee0;
		color: #787878;
		display: block;
		font-family: "Open Sans",sans-serif;
		font-size: 12px;
		font-weight: 400;
		height: 45px;
		padding: 0 2%;
		width: 45%;
		margin:15px auto 30px;

	}
	#pwd,#forget_password{
		border: 1px solid #dddee0;
		color: #787878;
		display: block;
		font-family: "Open Sans",sans-serif;
		font-size: 12px;
		font-weight: 400;
		height: 45px;
		padding: 0 2%;
		width: 45%;
		margin:15px auto 30px;
	}

	.submitBtn {
		background-color: #4AA6DB;;
		border: 2px solid #4AA6DB;;
		border-radius: 5px;
		color: #fff;
		display: inline-block;
		padding: 5px 20px;
		font-size:13px;
		cursor:pointer;
		transition: all 0.5s ease-in-out 0s;
		font-weight:700;
	}
	.submitBtn:hover {
		background-color: #000;
		border: 2px solid #000;
		color: #fff;
	}
	.forgot{
		color:#535353;
		padding:8px 20px;
		text-decoration:none;
		margin:10px 0 20px;
		transition: all 0.5s ease-in-out 0s;
		display:inline-block;
		font-size:16px;
		font-weight:700;
	}
	.forgot:hover{
		color:#535353;
	}
	#login_frm > div {
    font-size: 18px;
}

	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to <?php echo $this->config->item('COMPANY_NAME'); ?></h1>
        <image src="<?php echo base_url("public/images/logo.png"); ?>"/>
	<div id="body">
            <div id="err_div" style="color:red;"></div>
            <span id="error_div"></span>
        <span id="success_div"></span>
            <!-- <form  method="post" action="<?php echo base_url("kaizen/welcome/authentication/"); ?>" id="login_frm" /> -->
						<?php $attributes = array('id' => 'login_frm'); ?>
						<?php echo form_open('kaizen/welcome/authentication/',$attributes); ?>
                <div>User Name</div>
                <input type="text" name="uname" id="uname" value="" class="validate[required]" />
                <div>Password</div>
                <input type="password" name="pwd" id="pwd" value="" class="validate[required]" />
                <div></div>
                <input name="" type="submit" class="submitBtn" value="Login" />
        <!-- </form> -->
				<?php echo form_close(); ?>
            <a href="javascript:void(0);" class="forgot" onclick="showHideDiv();">Forgot Password</a>
        <!-- <form method="post" action="<?php echo base_url("kaizen/welcome/forgetpassword");?>" id="forgetpassword" style="display:none;"> -->
				<?php $attributes = array(
							'id' => 'forgetpassword',
							'style' => 'display:none;'
						); ?>
				<?php echo form_open('kaizen/welcome/forgetpassword',$attributes); ?>
          <div class="fgt">
            <input type="text" placeholder="Enter your Registered email ID" id="forget_password" name="forget_password" class="validate[required,custom[email]]"/>
          </div>
          <input type="submit" value="Submit" class="memberLogin"/>
        <!-- </form> -->
				<?php echo form_close(); ?>
	</div>


</div>
<script type="text/javascript">
    function showHideDiv(){
		$('#forgetpassword').show();
		}
		// Called once the server replies to the ajax form validation request
		function ajaxValidationCallback(status, form, json, options){
			if (status === true) {
				//alert(status)
				from_send(json);
			}
		}

                function ajaxValidationCallback1(status, form, json, options){
			if (status === true) {
				//alert(status)
                                from_sendforgetpassword(json);
			}
		}

		jQuery(document).ready(function(){
			jQuery("#login_frm").validationEngine('attach',{
				relative: true,
				overflownDIV:"#divOverflown",
				promptPosition:"bottomLeft",
				ajaxFormValidation: true,
				ajaxFormValidationMethod: 'post',
				onAjaxFormComplete: ajaxValidationCallback
			});
                        jQuery("#forgetpassword").validationEngine('attach',{
				relative: true,
				overflownDIV:"#divOverflown",
				promptPosition:"bottomLeft",
				ajaxFormValidation: true,
				ajaxFormValidationMethod: 'post',
				onAjaxFormComplete: ajaxValidationCallback1
			});
		});
		function showval(id,val)
		{
			if(val==$("#"+id).val())
			{
				jQuery("#"+id).val('');
			}
			else if($("#"+id).val()=='')
			{
				jQuery("#"+id).val(val);
			}
		}
		function from_send(json){
			var vl ='';
			jQuery(json).each(function(i,val){
				jQuery.each(val,function(k,v){
					if(v!=""){
						vl+=v;
					}

			});
			});
			if(vl=="")
			{
				window.location.href = '<?php echo site_url("kaizen/main"); ?>';
			}
			else
			{
				 jQuery("#err_div").html(vl);

			}
		}

                function from_sendforgetpassword(json){
			var vl ='';
			jQuery(json).each(function(i,val){
				jQuery.each(val,function(k,v){
					if(v!=""){
						vl+=v;
					}

			});
			});
			if(vl=="")
			{
				jQuery("#error_div").html("");
				jQuery("#success_div").html("<h4 align='center' style='color:color:#71bf43'><br/>Password reset link is sent to your email.Please Check Your email</h4>");
				jQuery(window).scrollTop($("#container").offset().top);
				//window.location="<?php echo base_url('kaizen'); ?>";
			}
			else
			{
				 jQuery("#success_div").html("<h4 align='center' style='color:color:#71bf43'><br/>Please Enter Correct email id.</h4>");
				 jQuery("#error_div").html(vl);
				 //jQuery("#captcha").attr("src", '<?php echo base_url("cool_captcha/index");?>/'+Math.random()+'.png');
				 jQuery(window).scrollTop($("#container").offset().top);
			}
		}

	</script>
</body>
</html>