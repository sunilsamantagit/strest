<?php
$this->output->set_content_type('application/xml');
?>
<markers>
	<marker name="<?php echo str_replace("&","&amp;",$contact_title);?>" address="<?php echo strip_tags($address);?>" lat="<?php echo $default_lat;?>" lng="<?php echo $default_lng;?>" type="branch" />

</markers>
