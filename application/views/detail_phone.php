<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu.php'); ?>
		<?php require('template/right_menu.php'); ?>

		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <!-- <h2 class="mt-2">List semua gadget <?php //echo $category; ?></h2>
			<p>Total <code class="highlighter-rouge"><?php //echo number_format($total_phone,0); ?></code> device dari brand <code class="highlighter-rouge"><?php //print $category; ?></code></p> -->
			
            <?php 
                    if (count($dataDetail) > 0) {
                        foreach ($dataDetail as $key => $v) {
                            echo '<div class="row shadow-lg px-3 mb-4 bg-white rounded">';
                            echo '<div class="col-12 col-sm-12 col-md-2 mt-4">';
                            // echo '<div class="col-4 col-sm-2 col-md-2 mt-4">';
                            $external_link = $v['image'];
                            $arrLink = explode('/', $external_link);
                            $imgName = isset($arrLink[5]) ? trim($arrLink[5]) : '1.jpg';
                            $img = '/asset/images/cdn2/'.$imgName;
                            // if (@getimagesize($external_link)) {
                            // if (@getimagesize('/home/indp1859/public_html'.$img)) {
                            echo '<img class="img-fluid mw-30 mr-3" src="'.getImageLogo($external_link).'" alt="'.$v['DeviceName'].'" style="display: block;">';
                            // if (file_exists('/home/indp1859/public_html'.$img)) {
                            //     // echo '<img class="img-thumbnail img-responsive" src="'.$img.'" alt="'.$v['DeviceName'].'" style="width: 100%; display: block;">';
                            //     echo '<img class="img-fluid mw-30 mr-3" src="'.$img.'" alt="'.$v['DeviceName'].'" style="display: block;">';
                            // } else {
                            //     echo '<img class="img-fluid mr-3" data-src="holder.js/100px180/" alt="No Image" style="width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655f662a64%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655f662a64%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">';
                            // } 
                            echo '</div>';
                ?>
                            <!-- <div class="col-8 col-sm-10 col-md-10 mt-4 mb-4"> -->
                            <div class="col-12 col-sm-12 col-md-10 mt-4 mb-4">
                                <h3 class="mt-2"><?php echo $v['DeviceName']; ?></h3>
                                
                                <!-- <span class="badge badge-warning">Released on <code class="highlighter-rouge"><?php print $v['announced']; ?></code></span>
                                <span class="badge badge-warning">Status : <?php echo $v['status'];?></span>
                                <span class="badge badge-warning">Total view <code class="highlighter-rouge"><?php echo $v['viewed'];?></code></span> -->
                                <ul>
                                    <!-- <li class="list-unstyled"><div id="share"></div></li> -->
                                    <li>Released pada <code class="highlighter-rouge"><?php print $v['announced']; ?></code></li>
                                    <li>Status : <?php echo $v['status'];?></li>
                                    <li>Total dilihat <code class="highlighter-rouge"><?php echo $v['viewed'];?></code></li>
                                    <li class="list-unstyled"><p class="mb-0 mt-2" style="font-size:1rem"><i class="fa fa-share-alt"></i><span class="pl-1"> Share gratis ke</span> <div id="share"></div></p>
                                </ul>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Spesifikasi Detail</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Harga</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 mt-4">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                        <?php if (!empty($bukalapak)) { ?>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 mt-4">
                                                <h6 class="mb-3">Harga barang terkait di <span class="text-danger"><strong>Bukalapak</strong></span></h6>
                                                <ul class="list-unstyled">
                                                <?php 
                                                    // d($bukalapak);
                                                    foreach ($bukalapak as $v) {
                                                        $mainURL = $v['main_url'].$v['url'];
                                                        $affiliateURL = 'http://bukalapak.go2cloud.org/aff_c?offer_id=15&aff_id=7593&url='.$mainURL.'%3Fho_offer_id%3D{offer_id}%26ho_trx_id%3D{transaction_id}%26affiliate_id%3D{affiliate_id}%26utm_source%3Dhasoffers%26utm_medium%3Daffiliate%26utm_campaign%3D{offer_id}%26ref%3D{referer}';
                                                        // $affiliateURL = 'https://www.bukalapak.com/p/handphone/hp-smartphone/8svciu-jual-iphone-5s-16gb?ho_offer_id=15&ho_trx_id=1023dd2f029b2714c899669a0624e3&affiliate_id=7593&utm_source=hasoffers&utm_medium=affiliate&utm_campaign=15&ref=';
                                                        echo '<div class="card bg-white w-100 mb-2 shadow-sm">
                                                            <div class="card-body p-2">
                                                            <li class="media">
                                                                <img class="mr-3 img-thumbnail" src="'.$v['img'].'" alt="Generic placeholder image">
                                                                <div class="media-body">
                                                                    <h6 class="mt-0 mb-0"><small>'.$v['name'].'</small></h6>
                                                                    <p><span class="badge badge-warning mr-2">IDR '.number_format($v['price'], 0, ",", ".").'</span>
                                                                    <small><a href="'.$affiliateURL.'" target="_blank">Kunjungi Toko</a></small></p>
                                                                </div>
                                                        </li>
                                                        </div></div>';
                                                    } 
                                                    
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php //if (!empty($lazada)) { ?>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 mt-2">
                                                <h6 class="mb-3">Harga barang terkait di <span class="text-danger"><strong>Lazada</strong></span></h6>
                                                <ul class="list-unstyled">
                                                    <li class="media">
                                                        <!-- <img class="mr-3 img-thumbnail" src="'.$v->image.'" alt="Lazada Image" style="width: 60px; height:60px"> -->
                                                        <div class="media-body">
                                                            <p class="mt-0 mb-0">Dapatkan harga diskon termurah se-Indonesia hanya di lazada <a href="https://c.lazada.co.id/t/c.Zrqk" target="_blank">Lihat harga</a></p>
                                                            <!-- <p><span class="badge badge-warning mr-2">IDR '.number_format($v->offers->price, 0, ",", ".").'</span> -->
                                                            
                                                        </div>
                                                    </li>
                                                <?php 
                                                    // d($lazada);
                                                    // foreach ($lazada as $k => $v) { 
                                                    //     if ($k < 9) {
                                                    //         echo '<div class="card bg-white w-100 mb-2 shadow-sm">
                                                    //         <div class="card-body p-2">
                                                    //         <li class="media">
                                                    //                 <img class="mr-3 img-thumbnail" src="'.$v->image.'" alt="Lazada Image" style="width: 60px; height:60px">
                                                    //                 <div class="media-body">
                                                    //                     <h6 class="mt-0 mb-0"><small>'.$v->name.'</small></h6>
                                                    //                     <p><span class="badge badge-warning mr-2">IDR '.number_format($v->offers->price, 0, ",", ".").'</span>
                                                    //                     <small><a href="'.$v->url.'" target="_blank">Kunjungi Toko</a></small></p>
                                                    //                 </div>
                                                    //         </li></div></div>';
                                                    //     }
                                                    // } 
                                                    
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php //} ?>

                                    </div>
                                </div>

                                <small><em>*Kami tidak menjamin bahwa semua informasi di atas adalah benar 100%. Untuk memastikannya silahkan langsung lihat di official vendor masing - masing</em></small>
                                </div>
                                <!-- <h4>Free Share</h4> -->

                            </div>
                            
                            <div class="row px-3">
                                <div class="col-12 col-sm-6 col-md-6 mt-4 bd-callout bd-callout-info">
                                    <h4>Gadget terkait</h4>
                                    <p>Ini adalah daftar gadget yang mungkin anda cari:</p>
                                    <ul>
                                        <?php 
                                            if (count($relatedDevice > 0)) {
                                                foreach ($relatedDevice as $v) {
                                                    $url_title = convert_accented_characters(url_title($v['DeviceName'], "dash", TRUE));
                                                    echo '<li><a href="'.base_url('home/detail/'.$url_title.'/'.$v['id']).'">'.$v['DeviceName'].'</a></li>';
                                                } 
                                            }
                                        ?>
                                    </ul>
                                </div>
                            
                                <div class="col-12 col-sm-6 col-md-6 mt-4 bd-callout bd-callout-info">
                                    <h4>Paling populer dari <?php print $currentBrand; ?></h4>
                                    <p>Ini adalah daftar gadget yang paling populer:</p>
                                    <ul>
                                        <?php 
                                            if (count($popularDevice > 0)) {
                                                foreach ($popularDevice as $v) {
                                                    $url_title = convert_accented_characters(url_title($v['DeviceName'], "dash", TRUE));
                                                    echo '<li><a href="'.base_url('home/detail/'.$url_title.'/'.$v['id']).'">'.$v['DeviceName'].'</a></li>';
                                                } 
                                            }
                                        ?>
                                    </ul>
                                </div>

                            </div>
					
				<?php }} ?>
			</div>
			
		</main>
	</div>
</div>
<style>
    .jssocials-share-link { border-radius: 50%; }
</style>
<?php require('template/load_javascript.php'); ?>
<!-- <script type="text/javascript" src="<?php print base_url(); ?>asset/js/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php print base_url(); ?>asset/js/jquery-ui.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php //print base_url(); ?>asset/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php // print base_url(); ?>asset/js/custom.min.js?<?php //print rand();?>"></script>     -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/home.js?<?php //print rand();?>"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<!-- <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" /> -->
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<!-- <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" /> -->
<script type="text/javascript">
    $(function() {
        var userAgent = window.navigator.userAgent;
        if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/Android/i) || userAgent.match(/webOS/i) || userAgent.match(/Blackberry/i) ) {
            $("#share").jsSocials({
                shares: ["whatsapp", "facebook", "twitter", "googleplus"],
                showLabel: false,
                showCount: false,
                shareIn: "blank"
            });
        } else {
            $("#share").jsSocials({
                shares: ["whatsapp", "facebook", "twitter", "googleplus"],
                showLabel: false,
                showCount: false,
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
<?php require('template/footer.php'); ?>
