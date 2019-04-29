<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $this->config->item('COMPANY_NAME'); ?></title>
        <link rel="stylesheet" href="<?php echo base_url("public/validator/css/validationEngine.jquery.css");?>" type="text/css"/>
        <script src="<?php echo base_url("public/js/jquery-1.8.3.min.js");?>" type="text/javascript"></script>
<script src="<?php echo base_url("public/validator/js/languages/jquery.validationEngine-en.js");?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url("public/validator/js/jquery.validationEngine.js");?>" type="text/javascript" charset="utf-8"></script>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
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

	#body{
		margin: 0 15px 0 15px;
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
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to <?php echo $this->config->item('COMPANY_NAME'); ?></h1>
        <image src="<?php echo base_url("public/default/images/logo.png"); ?>" style="width:300px;" />
	<div id="body">
            <div id="err_div" style="color:red;"></div>
        <span id="success_div"></span>
         <form method="post" action="<?php echo site_url("kaizen/welcome/resetpasswordsave");?>" id="resetPassword">
         <input type="hidden" id="member_id" name="member_id" value="<?php echo $member_id; ?>">
         <div class="txtPlaceholder" style="margin-top:1%;margin-left:2%;">
         <div><b>Password</b></div>
         <input type="password" placeholder="Password" id="password" name="password" class="validate[required]"/>
         <div><b>Confirm Password</b></div>
         <input type="password" placeholder="Confirm Password" id="conpassword" name="conpassword" class="validate[required,equals[password]] "/>
         </div>
         <div class="fgt" style="margin-top:10px;margin-left:2%;font-size: 11px;">
         <input type="submit" value="Reset" class="memberLogin"/>
         </div>
        </form>
	</div>





</div>
<script type="text/javascript">
		function beforeCall(form, options){
			return true;
		}

		// Called once the server replies to the ajax form validation request
		function ajaxValidationCallback(status, form, json, options){
			if (status === true) {
				from_send(json);
			}
		}

		jQuery(document).ready(function(){
			jQuery("#resetPassword").validationEngine('attach',{
				relative: true,
				overflownDIV:"#divOverflown",
				promptPosition:"bottomLeft",
				ajaxFormValidation: true,
				ajaxFormValidationMethod: 'post',
				onAjaxFormComplete: ajaxValidationCallback
			});
		});

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
				jQuery("#resetPassword").html("");
				jQuery("#sucess_div").html("<h4 style='color:#97c14e'>Password reset successfully</h4>");
                                alert('Password reset successfully');
                                window.location="<?php echo base_url('kaizen'); ?>";
			}
			else
			{
				 jQuery("#sucess_div").html("");
				 jQuery("#error_div").html(vl);
				 jQuery(window).scrollTop($(".container").offset().top);
			}


		}
	</script>
</body>
</html>
