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
body{ background: #f7f7f7; font: 400 14px Helvetica,Arial,sans-serif; color: #73879C;}
.login_container{ width: 100%; max-width: 350px;margin: 5% auto 0;}
.login_title{ font: 400 25px Helvetica,Arial,sans-serif; letter-spacing: -.05em; line-height: 20px; margin: 10px 0 30px;position: relative; text-align: center;text-shadow: 0 1px 0 #fff; color: #73879C; width: 100%;}
.login_title:after, .login_title:before {
    content: "";
    height: 1px;
    position: absolute;
    top: 10px;
    width: 20%;
    background: #7e7e7e;
    background: linear-gradient(right,#7e7e7e 0,#fff 100%);
}
.login_title:before { left: 0;}
.login_title:after { right: 0;}
.form-group{ margin-bottom: 20px; }
.form-group .form-control{ box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,.08) inset; border: 1px solid #c8c8c8; width: 100%; border-radius: 3px; height: 34px; padding: 6px 12px; font-size: 14px; color: #73879C; box-sizing: border-box;}
.form-group .form-control:focus{-ms-box-shadow:0 0 2px #ed1c24 inset;-o-box-shadow:0 0 2px #ed1c24 inset;box-shadow:0 0 2px #A97AAD inset;background-color:#fff;border:1px solid #A878AF;outline:0}
.button_sec{ display: flex; justify-content: space-between;}
.submitBtn{color: #333;
    background-color: #fff;
    border-radius: 3px;
    padding: 6px 12px;
    font-weight: 400;
    line-height: 1.42857143;
    cursor: pointer;
    border: 1px solid #ccc;}
.submitBtn:hover, .submitBtn:focus{ color: #333; background-color: #d4d4d4; border-color: #8c8c8c;}
.forgot_link{ display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 13px;}
.back_login{ text-align: center; margin-top: 15px; font-size: 13px;}
.forgot_link .lost-password, .back_login a{ color: #007dff; display: inline-block; text-decoration: underline; }
.footer_sec{ border-top: 1px solid #D8D8D8; margin-top: 15px; padding-top: 10px; text-align: center;}
.footer_sec p{ font-size: 13px; }
.forgot_btn{ text-align: center; }
.forgot_text{ font-size: 14px; color: #868686; margin-bottom: 30px; text-align: center;}
</style>

</head>
<body>
<!--     <div class="body-header">
                <h1>STREST</h1>
    <h1>Stractural Steel Estimating Program</h1>
    </div> -->


<!--	<h1>Welcome to <?php echo $this->config->item('COMPANY_NAME'); ?></h1>-->
<!--        <image src="<?php echo base_url("public/images/logo.png"); ?>"/>-->

    <div id="body" class="login_container">
        
        <div id="loginDiv">
          <div class="login_title">Login</div>  
            <div id="err_div" style="color:red;"></div>
            <span id="error_div"></span>
        <span id="success_div"></span>
            <!-- <form  method="post" action="<?php echo base_url("kaizen/welcome/authentication/"); ?>" id="login_frm" /> -->
						<?php $attributes = array('id' => 'login_frm'); ?>
						<?php echo form_open('kaizen/welcome/authentication/',$attributes); ?>

        <div class="form-group">
            <input type="text" name="uname" id="uname" value="" class="form-control validate[required]" placeholder="User Name" />
        </div>
        <div class="form-group">
            <input type="text" name="uno" id="uname" value="" class="form-control validate[required]" placeholder="User No" />
        </div>
        <div class="form-group">
        	<input type="password" name="pwd" id="pwd" value="" class="form-control validate[required]" placeholder="Password" />
        </div>
        <div class="forgot_link">
            <label>
               <input type="checkbox" value="checkbox"><span>Remember me</span>
            </label>
	   		<a href="javascript:void(0);" class="lost-password" onclick="showHideDiv();">Lost your password?</a>
        </div>
         <div class="button_sec">
         	<div class="button-sub-sty"><input name="" type="submit" class="submitBtn submitBtn1" value="Cancel" /></div>
            <div class="button-sub-sty"><input name="" type="submit" class="submitBtn" value="Login" /></div>
        </div>   
        
    </div>
        
       
        
        <div id="frogotPassDiv">
        <!-- </form> -->
				<?php echo form_close(); ?>
           <!-- <a href="javascript:void(0);" class="forgot" onclick="showHideDiv();">Forgot Password</a>-->
        <!-- <form method="post" action="<?php echo base_url("kaizen/welcome/forgetpassword");?>" id="forgetpassword" style="display:none;"> -->
				<?php $attributes = array(
							'id' => 'forgetpassword',
							'style' => 'display:none;'
						); ?>
				<?php echo form_open('kaizen/welcome/forgetpassword',$attributes); ?> 
				<div class="login_title">Reset Password</div>
				<div class="forgot_text">Enter your registered email to receive a reset link.</div> 
          <div class="form-group">
            <input type="text" placeholder="Enter your Registered email ID" id="forget_password" name="forget_password" class="form-control validate[required,custom[email]]"/>
          </div>
          <div class="forgot_btn">
	          <input type="submit" value="Submit" class="submitBtn memberLogin"/>
	      </div>
          
          <div class="back_login"> 
          	<a href="javascript:void(0);" class="lost-password" onclick="showHideDiv2();">Go to login page?</a>
          </div>
        <!-- </form> -->
				<?php echo form_close(); ?>
        
        </div>
        
        <div class="footer_sec">
        	 <div class="login_title">STREST</div>
        	 <p>Stractural Steel Estimating Program</p>  
        </div>

	</div>
    
    
    <script>
            $(".submitBtn1").click(function() {
                $(this).closest('login_frm').find("input[type=text], textarea").val("");
            });
            
         function showHideDiv(){
		$('#forgetpassword').show();
		$('.ccc').show();
                $('#loginDiv').hide();
                $('.aaa').hide();
                $('.bbb').hide();
		}
                
                function showHideDiv2(){
		$('#loginDiv').show();
                 $('#forgetpassword').hide();
                 $('.ccc').hide();
                 $('.aaa').show();
                 $('.bbb').show();
		}


    </script>

  <script type="text/javascript">
    
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
                     $('.ccc').hide();
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
