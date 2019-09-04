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
    <?php
        $data = $detail[0];
        if ($data['author'] == '' || $data['author'] == null) {
            $author = $data['site'];
        } else {
            $author = $data['author'];
        } 
    ?>
    <!-- SECTION: TRAINING -->
    <section>
        <div class="training img-pag-foot">
            <div class="tr-pro">
                <div class="inn-title" style="margin-bottom: 4.125pc;"">
                    <div class="inn-ev-date-left" style="width:15%;">
                        <h4><?php print date('d', strtotime($data['published']));?></h4>
                        <span><?php print date('M Y', strtotime($data['published']));?></span>
                    </div>
                    <h2> <?php print $data['title']; ?><!--span>League 2017</span--></h2>
                    <!--div class="share-btn">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a>
                            </li>
                            <li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a>
                            </li>
                        </ul>
                    </div-->
                </div>
                <div class="inn-all-com inn-all-list tp-1">
                    <div style="text-align: center"><img src="<?php print $data['main_image'];?>" /></div>
                    <ul style="padding-bottom: 10px;">
                        <li style="font-style: italic;">Sumber : <?php print $author; ?>, Topic : <?php print $data['keyword']; ?></li>
                    </ul>
                    <!--h4>League Details</h4-->
                    <p style="line-height: 35px; color:#000;"><?php print $data['text'];?></p>
                    
                    <!--div class="inn-tickers">
                        <a href="booking.html" class="inn-reg-com inn-reg-book"><i class="fa fa-ticket" aria-hidden="true"></i> Ticket Booking</a>
                        <a href="team-register.html" class="inn-reg-com inn-reg-link"><i class="fa fa-registered" aria-hidden="true"></i> Register Now</a>
                    </div-->
                </div>
                <!--div class="inn-all-com inn-all-list inn-pad-top-5 tp-1">
                    <h4>Team Rankings</h4>
                    <p>Becoming a gym certified personal fitness trainer is your foundation for success. gym is the only personal trainer certification program that integrates a complete approach to fitness, wellness and business skills.</p>
                    <a href="#" class="inn-te-ra-link">Click to view full team ranking</a>
                </div-->
            </div>
        </div>
    </section>
    <!--SECTION: BLOG POSTS-->
    <section>
        <div class="blog row">
            <div class="lp">
                <!-- BLOG POST: POST DATE -->
                <div class="blog-1 col-md-2">
                    <span>Latest Posts</span>
                    <h4>25</h4>
                    <span>Augest 2016</span>
                </div>
                <!-- BLOG POST: POST NAME & DESCRIPTION -->
                <div class="blog-2 col-md-8">
                    <ul>
                        <li>
                            <a href="#">
                                <h4>WESTERN SYDNEY WANDERERS VS URAWA RED DIAMONDS</h4>
                            </a>
                        </li>
                        <li>
                            <p>In efficitur nisi et condimentum mattis. Duis et aliquet purus, quis congue elit. Cras volutpat dapibus molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec posuere mollis augue, a accumsan libero egestas sit amet.Vestibulum posuere erat tortor, porta tempus leo condimentum sed. </p>
                        </li>
                    </ul>
                </div>
                <!-- BLOG POST: POST COMMENTS,TAG AND SOCIAL MEDIA -->
                <div class="blog-3 col-md-2">
                    <ul>
                        <li><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</li>
                        <li><i class="fa fa-tag" aria-hidden="true"></i> Tag</li>
                        <li><i class="fa fa-share-alt" aria-hidden="true"></i> Share This</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    
    <?php //require_once("footer1.php"); ?>
    <?php require_once("footer2.php"); ?>