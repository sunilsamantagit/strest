<!--footer  section start--><?php //pre($site_settings); ?>
	<div class="ftnav">
		<div class="wrapper">
                    <?php echo $this->data['hooks_footerpages_list']; ?>
<!--			<ul>
				<li><a href="index.html" class="active">Home</a></li>
				<li><a href="about.html">About ISMA</a></li>
				<li><a href="#">Seed ID Guide</a></li>
				<li><a href="#">Technical Committees</a></li>
				<li><a href="authors.html">Authors</a></li>
				<li><a href="#">Members</a></li>
				<li><a href="#">Contact</a></li>
			</ul>-->
		</div>
	</div>
	<div class="footer">
		<div class="wrapper">
                  <?php if(!empty($this->data['site_settings']->edition) || (!empty($this->data['site_settings']->last_update)&& $this->data['site_settings']->last_update!='0000-00-00')){ ?>
        <p><?php if(!empty($this->data['site_settings']->edition)){ ?>EDITION <?php  echo $this->data['site_settings']->edition; }?> <?php if(!empty($this->data['site_settings']->last_update)&& $this->data['site_settings']->last_update!='0000-00-00'){ if(!empty($this->data['site_settings']->edition)){ echo '|'; }?> LAST UPDATED ON <?php  echo date("Y-m-d",strtotime($this->data['site_settings']->last_update)); }?></p>
                  <?php } ?>
			<div class="ftright">
                                <?php if(!empty($contact->contact_from_email)){ ?><p class="mail"><a href="mailto:<?php echo $contact->contact_from_email; ?>"><?php echo $contact->contact_from_email; ?></a></p><?php } ?>
                                <?php if(!empty($site_settings->footer_logo)){
                                $footer_logo = $site_settings->footer_logo;
                                }else{
                                $footer_logo = base_url('public/default/images/ft_logo_rt.png');
                                } ?>
				<a href="<?=site_url()?>"><img src="<?php echo $footer_logo; ?>" alt="" title="" class="ftlogo"></a>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="wrapper">
                        <?php if(!empty($site_settings->copy_right)) echo '<p>'.$site_settings->copy_right.'</p>' ?>
                    <p class="right">Website Designed & Developed by <a target="_blank" rel="nofollow" href="https://www.2webdesign.com/">2 Web Design</a></p>
		</div>
	</div>
	<!--footer  section end-->


</body>
</html>
