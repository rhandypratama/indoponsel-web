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
        // var_dump($detail[0]); die;
        if (!is_null($data)) {
            if ($data['author'] == '' || $data['author'] == null) {
                $author = $data['site'];
            } else {
                $author = $data['author'];
            } 
    ?>
            <section>
                <div class="lp">
                    <!--div class="spe-title-1">
                        <h2>Fundraising for Sports <span>Clubs &amp; Charities</span></h2>
                        <div class="hom-tit">
                            <div class="hom-tit-1"></div>
                            <div class="hom-tit-2"></div>
                            <div class="hom-tit-3"></div>
                        </div>
                        <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities. Headlining the calendar is the Dubai World Cup</p>
                    </div-->
                    <div class="ela">
                        <div class="a21">
                            <img src="<?php print $data['main_image']; ?>" alt="<?php print $data['title'].' | '.$this->config->item("web_title");?>">
                        </div>
                        <div class="a22 home-join pad-red-bot-0 pad-red-bot-pad-0">
                            <h2><?php print $data['title']; ?></h2>
                            <span class="spor-eve-sp"><?php print date('M d Y', strtotime($data['published'])) .", Sumber : ".$author;?></span>
                            <p style="line-height: 30px"><?php print $data['text'];?></p>
                            <!--ul>
                                <li><a href="join-our-club.html" class="joc">Join Our Club</a>
                                </li>
                                <li><a href="join-club.html" class="md">Make Donations</a>
                                </li>
                            </ul-->
                        </div>
                    </div>
                    
                </div>
            </section>
    <?php 
        } else { 
    ?>
            <section>
                <div class="lp">
                    <div class="spe-title-1">
                        <h2>halaman yang anda cari tidak <span>ditemukan</span></h2>
                        <div class="hom-tit">
                            <div class="hom-tit-1"></div>
                            <div class="hom-tit-2"></div>
                            <div class="hom-tit-3"></div>
                        </div>
                        <p>Jika ingin mencari berita update terkini tentang gadget silahkan kembali ke <a href="<?php echo base_url(); ?>">menu home</a>. Dan jika ingin mencari spesifikasi lengkap smartphone silahkan klik button search di atas</p>
                    </div>
                    
                </div>
            </section>
    <?php } ?>
    <section>
        <div class="lp spe-bot-red-3">
            <div class="ela">
                <h3>Related Article</h3>
                <div class="hom-top-trends row">
                    <?php 
                        // print '<pre>'; print_r($relatedArticle); 
                        foreach ($relatedArticle as $key => $v) {?>
                            <div class="col-md-3">
                                <div class="hom-trend">
                                    <div class="hom-trend-img">
                                    <?php 
                                        $external_link = $v['main_image'];
                                        if (@getimagesize($external_link)) {
                                        // echo  “image exists “;
                                        // } else {
                                        // echo  “image does not exist “;
                                        // }
                                        
                                        // $response = get_headers($v['main_image'], 2);
                                        // $file_exists = (strpos($response[0], "404") === false);
                                        // // d($response);
                                        // if ($file_exists) { 
                                    ?>
                                        <img class="img-responsive" src="<?php print $v['main_image'];?>" alt="<?php print $this->config->item("web_title").' - '.$v['title'];?>" style="max-height: 151px;">
                                    <?php } else { ?>
                                        <!-- <img class="img-responsive" src="https://source.unsplash.com/random/300x151/?<?php echo $v['keyword']?>" alt="<?php print $v['title'];?>" style="max-height: 151px;"> -->
                                        <img class="img-responsive" src="https://ui-avatars.com/api/?name=<?php echo $v['title'];?>&background=0D8ABC&color=fff" alt="<?php print $v['title'];?>" style="max-height: 151px;">
                                    <?php } ?>
                                    </div>
                                    <div class="hom-trend-con">
                                        <span><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php print date('M. d, Y', strtotime($v['published']));?></span>
                                        <a href="<?php print base_url();?>home/detailPost/<?php print trim($v['id']);?>">
                                            <h4 style="white-space:inherit !important; font-weight:500; font-size: 1pc;"><?php print $v['title_full'];?></h4>
                                        </a>
                                        <p><?php print limit_text($v['title'], 20); ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                    

                    <!-- RIGHT SIDE: FEATURE EVENTS -->
                    <div class="event-right col-md-3">
                        <ul>
                            <li class="event-right-bg-1" style="padding: 8%;">
                                <h4 style="padding-bottom: 10px">Explore Brand</h4>
                                    <?php foreach ($dataBrand as $key => $v) { 
                                        if($v['Brand'] != null) {
                                            print '<a href="'.base_url().'home/brand/'.trim($v['Brand']).'">'.$v['Brand'].'</a>';
                                    ?>
                                    <?php }} ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php //require_once("footer1.php"); ?>
    <?php require_once("footer2.php"); ?>