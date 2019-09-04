<!-- TOP BAR -PHONE EMAIL AND TOP MENU -->
<section class="i-head-top">
    <div class="i-head row">
        <!-- TOP CONTACT INFO -->
        <div class="i-head-left i-head-com col-md-6">
            <ul>
                <!-- <li><a href="<?php print base_url();?>">slipcoding</a></li> -->
                <!-- <li><a href="<?php print base_url();?>"><img src="/asset/images/indoponsel.png" alt=""></a></a></li> -->
            </ul>
        </div>
        <!-- TOP FIXED MENU -->
        <div class="i-head-right i-head-com col-md-6 col-sm-12 col-xs-12">
            <ul>
                <!--li class="top-scal"><a href="booking.html"><i class="fa fa-ticket" aria-hidden="true"></i> Ticket Booking</a></li-->
                <li class="top-scal-1"><a href="<?php print base_url();?>"><i class="fa fa-registered" aria-hidden="true"></i> HOME</a></li>
                <li><a href="#" class="tr-menu"><i class="fa fa-chevron-down" aria-hidden="true"></i> Browse</a>
                    <div class="cat-menu">

                        <div class="col-md-3 col-sm-6 cm1 mob-hid">
                            <h4>Popular Brand</h4>
                            <ul>
                                <?php foreach ($dataBrand as $key => $v) { 
                                    if($v['Brand'] != null) {
                                ?>
                                    <li><a href="<?php print base_url();?>home/brand/<?php print trim($v['Brand']);?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php print $v['Brand']; ?></a></li>
                                <?php }} ?>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 cm1 mob-hid">
                            <h4>Top 10 User Viewed</h4>
                            <ul>
                                <?php foreach ($topViewed as $key => $v) {
                                    $url_title = convert_accented_characters(url_title($v['DeviceName'], "dash", TRUE));
                                    print '<li><a href="'.base_url().'home/detail/'.$url_title.'/'.$v['id'].'"><i class="fa fa-angle-right" aria-hidden="true"></i> '.$v['DeviceName'].' <b>('. number_format($v['viewed']).')</b></a></li>';
                                } ?>
                            </ul>

                        </div>
                        <div class="col-md-6">
                            <h4>Trending Feeds</h4>
                            <div class="foot-pop top-me-ev">
                                <ul>
                                    <?php 
                                        // print '<pre>'; print_r($randomPost);
                                        // print $v['main_image'].'=================='; die;
                                        foreach ($randomPost as $key => $v) {
                                    ?>
                                    <li>
                                        <a href="<?php print base_url();?>home/detailPost/<?php print trim($v['id']);?>">
                                        <?php 
                                            $external_link = $v['main_image'];
                                            if (@getimagesize($external_link)) {
                                            // if (file_exists(trim($v['main_image']))) { 
                                        ?>
                                            <img src="<?php print $v['main_image'];?>" alt="">
                                        <?php } else { ?>
                                            <!-- <img src="https://source.unsplash.com/random/80x44/?<?php echo $v['keyword']?>" alt="<?php print $v['title'];?>"> -->
                                            <img src="https://ui-avatars.com/api/?name=<?php echo $v['keyword'];?>&background=0D8ABC&color=fff" alt="<?php print $v['title'];?>">
                                        <?php } ?>
                                            <!-- <img src="<?php //print $v['main_image'];?>" alt=""> -->
                                            <div class="foot-pop-eve top-me-text">
                                                <span><?php print $v['keyword']; ?></span>
                                                <h4><?php print $v['title']; ?></h4>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</section>

<!-- <section>
    <div class="page-head">
        <div class="lp inn-head-pad">
            <div class="row">
                <div class="col-md-4 top-head">
                    <a href="main.html"><img src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="col-md-3 top-search">
                    <form>
                        <ul>
                            <li>
                                <input type="text" placeholder="Search Here..">
                            </li>
                            <li>
                                <input type="submit" value="search">
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="col-md-5">
                    <ul class="top-soc">
                        <li>
                            <h4>Follow Us : </h4>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook fb1"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter tw1"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-google-plus gp1"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-whatsapp wa1"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-envelope-o sh1"></i></a>
                        </li>
                    </ul>
                    <ul class="brea-top">
                        <li><a href="#">Breadcrumb:</a>
                        </li>
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#" class="brea-act">Training</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->
