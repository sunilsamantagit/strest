<!--left section start-->
<div class="inner-left">
  <div class="left-menu">
    <?php if(!empty($inner_pages)){ ?>
      <ul>
        <?php foreach($inner_pages as $pages){ ?>

<?php if($pages->page_link == "corporate_overview" || $pages->page_link == "how_to_apply" || $pages->page_link == "vision_mission_values" || $pages->page_link == "board_members_and_staff" || $pages->page_link == "annual_reports" || $pages->page_link == "community_impact" || $pages->page_link == "contact") { ?>
        <?php $link = site_url($pages->page_link); ?>
      <?php }else{ ?>
      <?php $link = site_url("pages/".$pages->page_link); ?>
    <?php } ?>
<li><a href="<?php echo $link; ?>" <?php if(!empty($this->data['hooks_meta']->page_link) && ($this->data['hooks_meta']->page_link == $pages->page_link)){ ?>class='active' <?php } ?>><?php echo $pages->title; ?></a>
<?php } ?>
</ul>
<?php } ?>
      <div class="clear"></div>
    </div>
</div>
<!--left section end-->
