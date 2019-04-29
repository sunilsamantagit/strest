<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view($header);?>
<!--body content start-->
<div class="home-content">
        <div class="wrapper">
                <div class="isma-mission">
                        <?php if(!empty($this->data['hooks_meta']->content)) echo outputEscapeString($this->data['hooks_meta']->content); ?>
                    <?php if(!empty($this->data['hooks_meta']->button) && !empty($this->data['hooks_meta']->selected_page_link) && $this->data['hooks_meta']->button_type==1){ ?>
                        <a href="<?php echo urlByPageLink($this->data['hooks_meta']->selected_page_link); ?>" class="btn"><?php echo $this->data['hooks_meta']->button; ?></a>
                    <?php }elseif(!empty($this->data['hooks_meta']->button) && !empty($this->data['hooks_meta']->external_url) && $this->data['hooks_meta']->button_type==2){ ?>
                        <a href="<?php echo $this->data['hooks_meta']->external_url; ?>" target="_blank" class="btn"><?php echo $this->data['hooks_meta']->button; ?></a>
                    <?php } ?>
                </div>
            <?php if($home_block_list){ ?>
                <div class="home-blocks">
                        <ul>
                            <?php $i=1; foreach($home_block_list as $home){ ?>
                                <li style="background: url(<?php echo str_replace(' ','%20',$home->home_block_photo); ?>) no-repeat center 0;">
                                        <div class="text-section">
                                                <?php if(!empty($home->title)) echo '<h2>'.$home->title.'</h2>'; ?>
                                                <?php if(!empty($home->excerpt)) echo '<p>'.nl2br($home->excerpt).'</p>'; ?>
                                            <?php if(!empty($home->button) && !empty($home->selected_page_link) && $home->button_type==1){ ?>
                                                <a href="<?php echo urlByPageLink($home->selected_page_link); ?>" class="btn<?php if($i==3 || $i==4) echo ' lock'; ?>"><?php echo $home->button; ?></a>
                                            <?php }elseif(!empty($home->button) && !empty($home->external_url) && $home->button_type==2){ ?>
                                            <a href="<?php echo $home->external_url; ?>" target="_blank" class="btn<?php if($i==3 || $i==4) echo ' lock'; ?>"><?php echo $home->button; ?></a>
                                            <?php } ?>
                                        </div>
                                </li>
                            <?php $i++; } ?>
                        </ul>
                </div>
                <div class="clear"></div>
            <?php } ?>
                <?php if(!empty($partner_list)){ ?>
                <div class="our-partners">
                        <h2><a href="<?php if(!empty($this->data['site_settings']->partner_link)) echo $this->data['site_settings']->partner_link; else echo 'javascript:void(0);'; ?>">Our Partners</a></h2>
						 <section class="variable slider">
							  <?php foreach($partner_list as $pat){ ?>
                            <?php if(!empty($pat->url)){ ?>
                                <div><a target="_blank" href="<?php echo $pat->url; ?>"><img src="<?php echo $pat->image; ?>" alt="<?php echo $pat->title; ?>" title="<?php echo $pat->title; ?>"></a></div>
                            <?php }else{ ?>
                                <div><img src="<?php echo $pat->image; ?>" alt="<?php echo $pat->title; ?>" title="<?php echo $pat->title; ?>"></div>
                            <?php } ?>
                            <?php } ?>
						</section>
                       <?php /*?> <ul>
                            <?php foreach($partner_list as $pat){ ?>
                            <?php if(!empty($pat->url)){ ?>
                                <li><a target="_blank" href="<?php echo $pat->url; ?>"><img src="<?php echo $pat->image; ?>" alt="<?php echo $pat->title; ?>" title="<?php echo $pat->title; ?>"></a></li>
                            <?php }else{ ?>
                                <li><img src="<?php echo $pat->image; ?>" alt="<?php echo $pat->title; ?>" title="<?php echo $pat->title; ?>"></li>
                            <?php } ?>
                            <?php } ?>
                        </ul><?php */?>
					<div class="clear"></div>
                </div>
                <?php } ?>
        </div>
</div> 
<!--body content end-->
<!--sponsors section start-->
<?php if(!empty($sponsor_list)){ ?>
<div class="our-sponsors">
        <div class="wrapper">
                <h2><a href="<?php if(!empty($this->data['site_settings']->sponsor_link)) echo $this->data['site_settings']->sponsor_link; else echo 'javascript:void(0);'; ?>">Our Sponsors</a></h2>
                <section class="variable slider">
                    <?php foreach($sponsor_list as $pat){ ?>
                        <?php if(!empty($pat->url)){ ?>
                            <div><a target="_blank" href="<?php echo $pat->url; ?>"><img src="<?php echo $pat->image; ?>" alt="<?php echo $pat->title; ?>" title="<?php echo $pat->title; ?>"></a></div>
                        <?php }else{ ?>
                            <div><img src="<?php echo $pat->image; ?>" alt="<?php echo $pat->title; ?>" title="<?php echo $pat->title; ?>"></div>
                        <?php } ?>
                        <?php } ?>
                </section>
        </div>
</div>
<?php } ?>
<!--sponsors section end-->
<?php $this->load->view($footer); ?>
