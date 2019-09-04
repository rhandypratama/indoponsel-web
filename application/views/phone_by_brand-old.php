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
    
    <!--SECTION: EVENTS AND POINTS-->
    <section class="ev-po">
        <div class="lp">
            <div class="row">
                <div class="col-md-8 eve-res">
                    <div class="events ev-po-1 ev-po-com">
                        <div class="ev-po-title">
                            <h3>Telusuri semua gadget "<?php print $category; ?>"</h3>
                            <p>Total <span style="color:#f8c133;"><?php echo number_format($total_phone,0); ?></span> device dari <span style="color:#f8c133;"><?php print $category; ?></span></p>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th style="widht:40%">Device</th>
                                    <!-- <th class="e_h1">Announced</th> -->
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                                <?php 
                                    // d($phoneByBrand); 
                                    foreach ($phoneByBrand as $key => $v) { 
                                ?>
                                <tr onclick="window.location='<?php print base_url(); ?>home/detail/<?php print $v['id'];?>'">
                                    <td>
                                        <?php if ($v['image'] != '') { ?>
                                        <img src="<?php print $v['image']; ?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="max-width: 30px;">
                                        <?php } else { ?>
                                            <img class="image-responsive" src="https://ui-avatars.com/api/?name=<?php echo $v['DeviceName'];?>&size=30&background=0D8ABC&color=fff" alt="<?php echo $v['DeviceName'];?>" style="max-width: 30px;">
                                        <!-- <img src="<?php print $v['image']; ?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="max-width: 30px;"> -->
                                        <?php } ?>
                                        <div class="h-tm-ra1" style="margin-top: 35px;">
                                            <h4><?php print $v['DeviceName'];?></h4><!--span>AUG 23RD, 2017</span-->
                                        </div>
                                    </td>
                                    <!-- <td class="e_h1"><?php //print $v['announced']; ?></td> -->
                                    <td class="e_h1"><?php print $v['status']; ?></td>
                                    <td><a href="<?php print base_url(); ?>home/detail/<?php print $v['id'];?>" class="link-btn reg-btn">View More</a></td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                        <div style="margin-bottom:58px;">
                            <?php if (isset($link) && $link != '') { echo $link; } ?>
                        </div>
                    </div>
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
                    <h4>Terpopuler dari <?php print $category; ?></h4>
                    <div class="foot-pop top-me-ev" style="border-top:1px solid #d2d2d2; border-bottom:1px solid #d2d2d2; padding-bottom: 0px;">
                        <ul>
                            <?php foreach ($popularDevice as $key => $v) {?>
                            <li style="width:100%; background-color: #fff; margin-top: 0px; padding: 12px; border-bottom: 1px solid #ccc5c5">
                                <a href="<?php print base_url();?>home/detail/<?php print trim($v['id']);?>">
                                    <img src="<?php print $v['image'];?>" alt="" style="max-height: 70px; max-width: 60px;">
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
            </div>
        </div>
    </section>

    <?php //require_once("footer1.php"); ?>
    <?php require_once("footer2.php"); ?>