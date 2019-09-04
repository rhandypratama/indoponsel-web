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
                <?php if (count($dataDetail) > 0) { ?>
                <div class="event-left col-md-9">
                    <ul>
                        <?php foreach ($dataDetail as $key => $v) {?>
                        <li style="border-bottom: 0px;">
                            <div class="el-img">
                                <div class="detail_phone"><img class="img-responsive" src="<?php print $v['image'];?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>"></div>
                            </div>
                            <div class="el-con">
                                <span class="release-on">Released on <?php print $v['announced']; ?></span>
                                <h3><i class="fa fa-check" aria-hidden="true" style="background-color: #f0c419;"></i> <?php print '('.$v['Brand'].') '.$v['DeviceName'];?></h3>
                                <!-- <h3><i class="fa fa-check" aria-hidden="true" style="background-color: #f0c419;"></i> <?php // print $v['DeviceName'];?></h3> -->
                                <p><?php print $v['status'];?>. Total view <b><?php print $v['viewed'];?></b></p>
                                <!--a href="soccer.html">Compare</a><a href="soccer.html">Ticket Booking</a><a href="soccer.html">Read More</a-->

                                <table width="100%" class="table">
                                    <tr>
                                        <td width="10%" rowspan="8" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">NETWORK</td>
                                        <td width="15%" style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Technology</td>
                                        <td width="75%" style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['technology']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">2G Bands</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['_2g_bands']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">3G Bands</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['_3g_bands']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">4G Bands</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['_4g_bands']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"></td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['network_c']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Speed</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['speed']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">GRPS</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['gprs']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">EDGE</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['edge']; ?></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">LAUNCH</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Announced</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['announced']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Status</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['status']; ?></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">BODY</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Dimensions</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['dimensions']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Weight</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['weight']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">SIM</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['sim']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"></td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['body_c']; ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="6" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">DISPLAY</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Type</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['type']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Size</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['size']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Resolution</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['resolution']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Multitouch</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['multitouch']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Protection</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['protection']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"></td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['display_c']; ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="4" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">PLATFORM</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">OS</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['os']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Chipset</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['chipset']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">CPU</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['cpu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">GPU</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['gpu']; ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">MEMORY</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Card Slot</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['card_slot']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Internal</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['internal']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td rowspan="4" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">CAMERA</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Primary</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['primary_']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Features</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['features']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Video</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['video']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Secondary</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['secondary']; ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="4" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">SOUND</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Alert Type</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['alert_types']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Loudspeaker</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['loudspeaker_']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">3.5mm Jack</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['_3_5mm_jack_']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"></td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['sound_c']; ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="6" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">COMMS</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">WLAN</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['wlan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Bluetooth</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['bluetooth']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">GPS</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['gps']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">NFC</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['nfc']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Radio</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['radio']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">USB</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['usb']; ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="5" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">FEATURES</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Sensors</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['sensors']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Messaging</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['messaging']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Browser</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['browser']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Java</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['java']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"></td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['features_c']; ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="4" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">BATTERY</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"></td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['battery_c']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Stand-by</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['stand_by']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Talk Time</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['talk_time']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Music Play</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['music_play']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td rowspan="4" width="15%" style="background-color: #fcfcfc; padding:5px; font-size:14px; color:#de1e1e; border: 1px solid #d2d2d2">MISC</td>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Colors</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['colors']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">SAR</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['sar_us']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">SAR EU</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['sar_eu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fcfcfc; padding:5px; font-size:13px; color:#000; border: 1px solid #d2d2d2">Price</td>
                                        <td style="padding: 5px; font-size:13px; color:#000; border: 1px solid #d2d2d2"><?php print $v['price']; ?></td>
                                    </tr>


                                </table>
                                <span style="background:#fff; color: #989797; font-size: 11px;">*We can not guarantee that the information on this page is 100% correct</span>
                                <h4>Free Share</h4>
                                <div id="share"></div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- RIGHT SIDE: FEATURE EVENTS -->
                <div class="col-md-3" style="padding-bottom: 45px;">
                    <h4>Related Device</h4>
                    <div class="foot-pop top-me-ev" style="border-top:1px solid #d2d2d2; border-bottom:1px solid #d2d2d2;">
                        <ul>
                            <?php foreach ($relatedDevice as $key => $v) {?>
                            <li style="width:100%;">
                                <a href="<?php print base_url();?>home/detail/<?php print trim($v['id']);?>">
                                    <?php 
                                        $external_link = $v['image'];
                                        if (@getimagesize($external_link)) {
                                    ?>
                                        <img src="<?php print $v['image'];?>" alt="<?php print $v['DeviceName'].' - '.$this->config->item("web_title");?>" style="max-height: 70px; max-width: 60px;">
                                    <?php } else { ?>
                                        <img src="https://ui-avatars.com/api/?name=<?php echo $v['DeviceName'];?>&background=0D8ABC&color=fff" alt="<?php print $v['DeviceName'].' - '.$this->config->item("web_title");?>" style="max-height: 70px; max-width: 60px;">
                                    <?php } ?>
                                
                                    <!-- <img src="<?php print $v['image'];?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="max-height: 70px; max-width: 60px;"> -->
                                    <div class="foot-pop-eve top-me-text">
                                        <span><?php print $v['Brand'];?></span>
                                        <h4><?php print $v['DeviceName']; ?></h4>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                            <li><a href="<?php print base_url();?>home/brand/<?php print trim($v['Brand']);?>">Show More >></a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-md-3" style="padding-bottom: 45px;">
                    <h4>Popular From <?php print $currentBrand; ?></h4>
                    <div class="foot-pop top-me-ev" style="border-top:1px solid #d2d2d2; border-bottom:1px solid #d2d2d2;">
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
                            <li><a href="<?php print base_url();?>home/brand/<?php print trim($v['Brand']);?>">Show More >></a></li>
                        </ul>
                    </div>
                </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <div class="spe-title-1">
                            <h2>gadget yang anda cari tidak <span>ditemukan</span></h2>
                            <div class="hom-tit">
                                <div class="hom-tit-1"></div>
                                <div class="hom-tit-2"></div>
                                <div class="hom-tit-3"></div>
                            </div>
                            <p>Jika ingin mencari update berita terkini tentang gadget silahkan kembali ke <a href="<?php echo base_url(); ?>">menu home</a>. Dan jika ingin mencari spesifikasi lengkap smartphone silahkan klik button <strong>search</strong> di atas</p>
                        </div>
                    </div>
                <?php } ?>
                <!--div class="event-right col-md-3">
                    <ul>
                        <li class="event-right-bg-2">
                            <h4>Popular From </h4>
                            <p></p>
                            <a href="#">View More</a>
                        </li>
                        <li class="event-right-bg-3 pad-red-bot-0">
                            <h4>The Triathlon Series Race Five Kurnell</h4>
                            <p>The indoor sports mania is back again offering all sorts of indoor</p>
                            <a href="#">View More</a>
                        </li>
                    </ul>
                </div-->
            </div>
        </div>
    </section>
    

    <!--Footer-->
    <section>
        <div class="fcopy">
            <div class="lp copy-ri row">
                <div class="col-md-6 col-sm-12 col-xs-12">Copyright © 2018 IndoPonsel. All Right Reserved</div>
            </div>
        </div>
    </section>
    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-97173850-1', 'auto');
        ga('send', 'pageview');
    </script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/jquery-ui.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/custom.min.js?<?php print rand();?>"></script>    
    <!-- <script type="text/javascript" src="<?php //print base_url(); ?>asset/js/home.min.js?<?php //print rand();?>"></script> -->
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/home.js?<?php print rand();?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" />
    
    <script type="text/javascript">
		$(function() {
            var userAgent = window.navigator.userAgent;
            if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/Android/i) || userAgent.match(/webOS/i) || userAgent.match(/Blackberry/i) ) {
                $("#share").jsSocials({
                    shares: ["twitter", "facebook", "googleplus", "whatsapp"],
                    showLabel: false,
                    showCount: false,
                    shareIn: "blank"
                });
            } else {
                $("#share").jsSocials({
                    shares: ["twitter", "facebook", "googleplus", "whatsapp"],
                    showLabel: true,
                    showCount: true,
                    shareIn: "blank"
                });
            }
            $('.jssocials-share-label').css('background', 'none');
            $('.jssocials-share-logo').css('color', '#fff');
            // $("#share").jsSocials({
            //     shares: ["twitter", "facebook", "googleplus", "whatsapp"],
            //     showLabel: true,
            //     showCount: true,
            //     shareIn: "blank"
            // });
        });
    </script>

    </body>
</html>