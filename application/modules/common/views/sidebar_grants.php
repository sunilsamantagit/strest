<!--left section start-->
<div class="inner-left">
  <div class="left-menu">
    <?php if(!empty($page_list)){
      ?>
      <ul>
        <?php foreach($page_list as $sidebar){ ?>
<li><a href="<?php echo site_url("pages/".$sidebar->page_link); ?>"><?php echo $sidebar->title; ?></a></li>
<?php } ?>
</ul>
<?php } ?>
      <div class="clear"></div>
    </div>
    <div class="how-to-apply">
      <h3>How To Apply</h3>
      <p>Learn how to apply for the grants</p>
      <a href="<?php echo site_url('pages/how_to_apply');?>" class="btn">Read More</a>
    </div>
</div>
<!--left section end-->
