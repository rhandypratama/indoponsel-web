<?php require_once("main_header.php"); ?>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    
    <?php //require_once("left_menu.php"); ?>
    <?php //require_once("top_bar.php"); ?>
    <?php //require_once("header.php"); ?>
    <?php //require_once("search_box.php"); ?>
    
    <!--SECTION: EVENTS AND POINTS-->
    <section class="ev-po">
        <div class="lp">
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 30px;">
                    <h2>(404) <span style="font-size: 30px;">halaman yang anda cari </span>tidak ditemukan ...</h2><br/><br/>
                </div>
                <!-- <div class="col-md-8 eve-res">
                    <div class="events ev-po-1 ev-po-com">
                        <div class="ev-po-title">
                            <h3>Alternatif Pencarian</h3>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th>Device</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                                <?php foreach ($result as $key => $v) { ?>
                                <tr>
                                    <td><img src="<?php print $v['image']; ?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>">
                                        <div class="h-tm-ra1" style="margin-top: 35px;">
                                            <h4><?php print $v['DeviceName'];?></h4>
                                        </div>
                                    </td>
                                    <td class="e_h1"><?php print $v['status']; ?></td>
                                    <td><a href="<?php print base_url(); ?>home/detail/<?php print $v['id'];?>" class="link-btn reg-btn">View More</a></td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div> -->
                
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

                <!--div class="col-md-3" style="padding-bottom: 45px;">
                    <h4>Popular Devices From <?php print $category; ?></h4>
                    <div class="foot-pop top-me-ev" style="border-top:1px solid #d2d2d2; border-bottom:1px solid #d2d2d2; padding-bottom: 10px;">
                        <ul>
                            <?php foreach ($popularDevice as $key => $v) {?>
                            <li style="width:100%;">
                                <a href="<?php print base_url();?>home/detail/<?php print trim($v['id']);?>">
                                    <img src="<?php print $v['image'];?>" alt="" style="max-height: 70px; max-width: 60px;">
                                    <div class="foot-pop-eve top-me-text">
                                        <span><?php print $v['announced'];?></span>
                                        <h4><?php print $v['DeviceName']; ?></h4>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div-->
            </div>
        </div>
    </section>
    
    <?php //require_once("footer1.php"); ?>
    <?php require_once("footer2.php"); ?>