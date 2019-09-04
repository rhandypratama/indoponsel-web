<?php require_once("main_header.php"); ?>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    
    <?php //require_once("left_menu.php"); ?>
    <?php require_once("top_bar.php"); ?>
    <?php //require_once("header.php"); ?>
    <?php require_once("search_box.php"); ?>
    
    <!--SECTION: UPCOMING SPORTS EVENTS-->
    <section>
        <div class="se lp">
            <div class="row">
                <!-- TITLE -->
                <div class="spe-title-1">
                    <h2>tentang <span>teknologi</span> di minggu ini</h2>
                    <div class="hom-tit">
                        <div class="hom-tit-1"></div>
                        <div class="hom-tit-2"></div>
                        <div class="hom-tit-3"></div>
                    </div>
                    <p>Jangan sampai terlewatkan update berita terbaru dari IndoPonsel</p>
                </div>

                <div class="event-left col-md-9" style="position:;">
                    <ul>
                        <?php foreach ($news_feed as $key => $v) { ?>
                        <li>
                            <div class="el-img">
                            <?php
                                $external_link = $v['main_image'];
                                if (@getimagesize($external_link)) {
                            ?>    
                                    <img class="img-responsive" src="<?php print $v['main_image']; ?>" alt="<?php print $v['title'].' | '.$this->config->item("web_title");?>" style="max-height:214px;">
                            <?php } else { ?>
                                    <!-- <img class="img-responsive" src="https://source.unsplash.com/random/300x151/?<?php echo $v['keyword']?>" alt="<?php print $v['title'];?>" style="max-height: 214px;"> -->
                                    <img class="img-responsive" src="https://ui-avatars.com/api/?name=<?php echo $v['title'];?>&background=0D8ABC&color=fff" alt="<?php print $v['title'];?>" style="max-height: 214px;">
                            <?php } ?>
                            </div>
                            <div class="el-con">
                                <span><?php print date('M. d, Y', strtotime($v['published'])); ?></span>
                                <h3 onclick="window.location='<?php print base_url();?>home/detailPost/<?php print trim($v['id']);?>'"><?php print $v['title']; ?></h3>
                                <p><?php print limit_text($v['text'], 20); ?></p>
                                <a href="<?php print base_url();?>home/detailPost/<?php print trim($v['id']);?>">Read More</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- RIGHT SIDE: FEATURE EVENTS -->
                <div class="event-right col-md-3">
                    <ul>
                        <li class="event-right-bg-1" style="padding: 8%;">
                            <h4 style="padding-bottom: 10px">Explore Brand</h4>
                            <!--ul style="padding-top: 10px;"-->
                                <?php foreach ($dataBrand as $key => $v) { 
                                    if($v['Brand'] != null) {
                                        print '<a href="'.base_url().'home/brand/'.trim($v['Brand']).'">'.$v['Brand'].'</a>';
                                ?>
                                    <!--li style="margin-top: 3px; margin-bottom: 3px; padding: 5px;"><a href="<?php print base_url();?>home/brand/<?php print trim($v['Brand']);?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php print $v['Brand']; ?></a></li-->
                                <?php }} ?>
                            <!--/ul-->
                            <!--p>The indoor sports mania is back again offering all sorts of indoor</p>
                            <a href="#">View More</a-->
                        </li>
                        
                    </ul>
                </div>

                <div class="col-md-3" style="padding-bottom: 45px;">
                    <h4>Gadget terpopuler</h4>
                    <div class="foot-pop top-me-ev" style="border-top:1px solid #d2d2d2; border-bottom:1px solid #d2d2d2; padding-bottom: 10px;">
                        <ul>
                            <?php foreach ($popularDevice as $key => $v) {?>
                            <li style="width:100%;">
                                <a href="<?php print base_url();?>home/detail/<?php print trim($v['id']);?>">
                                    <img src="<?php print $v['image'];?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="max-height: 70px; max-width: 60px;">
                                    <div class="foot-pop-eve top-me-text">
                                        <span><?php print $v['announced'];?></span>
                                        <h4><?php print $v['DeviceName']; ?></h4>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                            <!--li><a href="<?php print base_url();?>home/brand/<?php print trim($v['Brand']);?>">Show More >></a></li-->
                        </ul>
                    </div>
                </div>

                <div class="col-md-3" style="padding-bottom: 45px;">
                    <h4>Mungkin yang anda cari</h4>
                    <div class="foot-pop top-me-ev" style="border-top:1px solid #d2d2d2; border-bottom:1px solid #d2d2d2; padding-bottom: 10px;">
                        <ul>
                            <?php foreach ($relatedArticle as $key => $v) {?>
                            <li style="width:100%;">
                                <a href="<?php print base_url();?>home/detailPost/<?php print trim($v['id']);?>">
                                    <!--img src="<?php print $v['main_image'];?>" alt="" style="max-height: 70px; max-width: 60px;"-->
                                    <div class="foot-pop-eve top-me-text">
                                        <!--span><?php print $v['title'];?></span-->
                                        <h4 style="font-weight: 100; margin-top: 0px !important;"><?php print $v['title']; ?></h4>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                            <!--li><a href="<?php print base_url();?>home/brand/<?php print trim($v['Brand']);?>">Show More >></a></li-->
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <?php //require_once("footer1.php"); ?>
    <?php require_once("footer2.php"); ?>