<?php $fetch_class =  $this->router->fetch_class(); ?>
<?php $edit_function = $this->uri->segment(3); ?>

<div class="rt-bg-block">
  <div class="rt-column search-side">
    <br>
    <?php if(!empty($fetch_class) && $fetch_class != "")  {?>

      <a class="new-survey-btn-blue " href="<?php echo site_url("kaizen/".$fetch_class."/doadd/0"); ?>" <?php if ($fetch_class=='blog_comments' || $fetch_class=='order') { echo "style='display:none'" ;}?>  ><span><?php if($fetch_class=='takeoffline') {?>Add Line Entry<?php }else{ ?>Add New<?php }?></span></a><br><br>
      <?php } ?>

      <?php  if(!empty($edit_function)) {  ?>
        <a class="new-survey-btn-backbutton" href="<?php echo site_url("kaizen/".$fetch_class); ?>">
          <span>Back To Listing</span>
        </a>
        <br><br>
        <?php } ?>
        <?php if($fetch_class == 'banner' || $fetch_class == 'commonbanner')  {?>
                  <a class="temp-btn" href="<?php echo site_url("kaizen/banner"); ?>">Home Banner List</a>
                  <a class="temp-btn" href="<?php echo site_url("kaizen/commonbanner"); ?>">Pages Banner List</a>
        <?php } ?>

                  <?php if($fetch_class == 'blog_comments' || $fetch_class == 'blog')  { ?>
                    <a class="temp-btn" href="<?php echo site_url("kaizen/blog"); ?>">Blog List</a>
                    <a class="temp-btn" href="<?php echo site_url("kaizen/blog_comments"); ?>">Blog Comments List</a>
                  <?php } ?>

                  <?php if($fetch_class == 'directory_category' || $fetch_class == 'browse_directory')  { ?>
                    <a class="temp-btn" href="<?php echo site_url("kaizen/browse_directory"); ?>">Directory List</a>
                    <a class="temp-btn" href="<?php echo site_url("kaizen/directory_category"); ?>">Directory Category List</a>
                  <?php } ?>


</div></div>
