<p class="footerCreate"> &copy; <? echo date('Y');?> <?php echo $this->config->item('COMPANY_NAME'); ?> | Developed by <a href="http://2webdesign.com/">2webdesign</a></p>
<script>	
        jQuery(document).ready(function(){
  				setTimeout(function(){ 
  					var docum = $(document).height()-60;
  					$('.leftDiv').height(docum);	
                  $('.rightDiv').height(docum); return false;}, 350);
        });
</script> 