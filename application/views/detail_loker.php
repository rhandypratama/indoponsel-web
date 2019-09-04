<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu_loker.php'); ?>
		<?php require('template/right_menu.php'); ?>

		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <?php 
                if (count($detail) > 0) {
                    foreach ($detail as $key => $v) {
                        echo '<div class="row shadow-lg px-3 mb-1 mt-0 bg-white">';
                        // echo '<div class="col-4 col-sm-2 col-md-2 mt-4">';
                        echo '<div class="col-12 col-sm-12 col-md-2 mt-4">';
                        $customLogo = substr($v['logo'], strpos($v['logo'], 'data-original=') + 15);
                        $logo = substr($customLogo, 0, strpos($customLogo, '">'));
                        if (($logo != NULL) || ($logo != '')) {
                            // echo '<img class="ml-3" alt="Logo perusahaan" src="'.$logo.'" style="width: 64px; height: 64px;">';
                            echo '<img class="img-fluid ml-3" alt="Logo perusahaan" src="'.$logo.'">';
                        } else {
                            echo '<img class="ml-3" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1664d287328%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1664d287328%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.84375%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 64px; height: 64px;">';
                        }
                        echo '</div>';
            ?>
                            <!-- <div class="col-8 col-sm-10 col-md-10 mt-4 mb-4"> -->
                            <div class="col-12 col-sm-12 col-md-10 mt-4 mb-4">
                                <h4 class="mt-2 d-inline"><?php echo $v['posisi']; ?></h4>
                                <span class="d-none d-md-inline d-lg-inline d-xl-inline pull-right"><small>Total dilihat <code class="highlighter-rouge"><?php echo number_format($v['viewed'],0,",",".");?></code></small></span>
                                <h6 class="mt-0 mb-4"><?php echo $v['nama_perusahaan']; ?></h6>
                                
                                <!-- <span class="badge badge-warning">Released on <code class="highlighter-rouge"><?php print $v['announced']; ?></code></span>
                                <span class="badge badge-warning">Status : <?php echo $v['status'];?></span>
                                <span class="badge badge-warning">Total view <code class="highlighter-rouge"><?php echo $v['viewed'];?></code></span> -->
                                <!-- <ul> -->
                                    <!-- <li class="list-unstyled"><div id="share"></div></li> -->
                                    <p class="mb-2" style="font-size:1rem"><i class="fa fa-map-marker"></i> <span class="pl-1"> <?php echo $v['lokasi'] ?></span></p>
                                    <!-- <p class="mb-2 font-weight-light" style="font-size:0.9rem"><i class="fa fa-industry"></i> <span class="pl-1"> <?php echo $v['industri'] ?></span></p> -->
                                    <p class="mb-2" style="font-size:1rem"><i class="fa fa-suitcase"></i> <span class="pl-1"> <?php echo $v['pengalaman'] ?></span></p>
                                    <p class="mb-2" style="font-size:1rem"><i class="fa fa-dollar"></i> <span class="pl-1"><span class="badge badge-warning"><?php echo 'Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".");?></span> <i class="fa fa-question-circle" id="tooltip-gaji" data-toggle="tooltip" data-placement="right" title="Gaji yang tertera disini sifatnya tidak mengikat tergantung pada skill dan pengalaman anda. Untuk informasi lebih lanjut bisa di negosiasikan pada saat interview"></i></p>
                                    <p class="mb-2" style="font-size:1rem"><i class="fa fa-calendar-check-o"></i><span class="pl-1">Tanggal posting <span class="badge badge-info"><?php echo date('d-m-Y', strtotime($v['tgl_tayang'])) ?></span></span></p>
                                    <!-- <p class="mb-2" style="font-size:1rem"><i class="fa fa-calendar-minus-o"></i><span class="pl-1">Tanggal tutup <span class="badge badge-danger"><?php echo date('d-m-Y', strtotime($v['tgl_tutup'])) ?></span></span></p> -->
                                    <p class="mb-2 mt-0" style="font-size:1rem"><i class="fa fa-share-alt"></i><span class="pl-1"> Share gratis ke</span> <div id="share"></div></p>
                                <!-- </ul> -->
                            </div>
                        </div>

                        <div class="row shadow-lg px-3 mb-1 bg-white" stlye="overflow-x:scrool">
                            <div class="col-12 col-sm-12 col-md-6 mt-4 mb-4">
                                <?php 
                                    $desc = $v['deskripsi_pekerjaan'];
                                    $filter_error = strpos($desc, 'apply_button');
                                    if ($filter_error === false) {
                                        $desc = str_replace('<h2', '<h5', $desc);
                                        $desc = str_replace('<div class="col-lg-12 col-md-12 col-sm-12">', '', $desc);
                                        $desc = str_lreplace('</div>', '', $desc);
                                        $desc = trim(preg_replace('/ +/', ' ', $desc));
                                        // $desc = iconv('UTF-8', 'ISO-8859-1//IGNORE', $desc);
                                        
                                        // $desc = preg_replace('/ +/', ' ', $desc);
                                        $desc = str_replace("Â", "", $desc);
                                        echo $desc;
                                    } else {
                                        echo '<h5 class="job-ads-h2">DESKRIPSI PEKERJAAN</h5> -';
                                    } 
                                ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 mt-md-4 mb-4">
                                <h5 class="job-ads-h2">GAMBARAN PERUSAHAAN</h5>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Waktu proses lamaran</strong></p>
                                <p class="mb-3"><?php if (trim($v['waktu_proses_lamaran']) == '') {echo '-';} else {echo trim($v['waktu_proses_lamaran']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Nomor pendaftaran</strong></p>
                                <p class="mb-3"><?php if (trim($v['nomor_pendaftaran']) == '') {echo '-';} else {echo trim($v['nomor_pendaftaran']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Website</strong></p>
                                <div style="overflow:auto">
                                    <p class="mb-3">
                                        <?php 
                                            if (trim($v['situs']) == '') {
                                                echo '-';
                                            } else {
                                                echo '<a target="_blank" href="'.trim($v['situs']).'">'.trim($v['situs']).'</a>';
                                            } 
                                            ?>
                                    </p>
                                </div>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Facebook</strong></p>
                                <div style="overflow:auto">
                                    <p class="mb-3">
                                        <?php 
                                        if (trim($v['facebook_perusahaan']) == '') {
                                            echo '-';
                                        } else {
                                            echo '<a target="_blank" href="'.trim($v['facebook_perusahaan']).'">'.trim($v['facebook_perusahaan']).'</a>';
                                        } 
                                        ?>
                                    <?php //if (trim($v['facebook_perusahaan']) == '') {echo '-';} else {echo trim($v['facebook_perusahaan']);} ?>
                                    </p>
                                </div>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Nomor Telepon</strong></p>
                                <p class="mb-3"><?php if (trim($v['nomor_telepon']) == '') {echo '-';} else {echo trim($v['nomor_telepon']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Industri</strong></p>
                                <p class="mb-3"><?php if (trim($v['industri']) == '') {echo '-';} else {echo trim($v['industri']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Ukuran Perusahaan</strong></p>
                                <p class="mb-3"><?php if (trim($v['ukuran_perusahaan']) == '') {echo '-';} else {echo trim($v['ukuran_perusahaan']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Gaya Berpakaian</strong></p>
                                <p class="mb-3"><?php if (trim($v['gaya_berpakaian']) == '') {echo '-';} else {echo trim($v['gaya_berpakaian']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Tunjangan</strong></p>
                                <p class="mb-3"><?php if (trim($v['tunjangan']) == '') {echo '-';} else {echo trim($v['tunjangan']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Bahasa digunakan</strong></p>
                                <p class="mb-3"><?php if (trim($v['bahasa_digunakan']) == '') {echo '-';} else {echo trim($v['bahasa_digunakan']);} ?></p>
                                <p class="mb-0" style="font-size:0.85rem"><strong>Waktu bekerja</strong></p>
                                <p class="mb-3"><?php if (trim($v['waktu_bekerja']) == '') {echo '-';} else {echo trim($v['waktu_bekerja']);} ?></p>
                                
                            </div>
                        </div>

                        <div class="row shadow-lg px-3 mb-1 bg-white" stlye="overflow-x:scrool">
                            <div class="col-12 col-sm-12 col-md-12 mt-4 mb-4">
                                <h5 class="job-ads-h2">ALAMAT PERUSAHAAN</h5>
                                <p class=""><?php if (trim($v['alamat']) == '') {echo '-';} else {echo trim($v['alamat']);} ?></p>
                                <?php if (trim($v['alamat']) != '') { 
                                    echo '<iframe frameborder="0" style="border:0" class="w-100 h-300" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDmNP5ugIPdjH22li4pWBsq0I96lFObEQQ&q='.trim($v['alamat']).'"></iframe>';
                                } ?>
                            </div>
                        </div>

                        <div class="row shadow-lg px-3 mb-1 bg-white">
                            <div class="col-12 col-sm-12 col-md-6 mt-4 mb-4" stlye="overflow-x:scrool">
                                <h5 class="job-ads-h2">INFORMASI PERUSAHAAN</h5>
                                <p style="overflow:auto"><?php if (trim($v['informasi_perusahaan']) == '') {echo '-';} else {echo trim(str_replace("Â", "", $v['informasi_perusahaan']));} ?></p>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 mt-md-4 mb-4">
                                <h5 class="job-ads-h2">MENGAPA HARUS BERGABUNG</h5>
                                <?php 
                                    $why = $v['mengapa_bergabung'];
                                    $why = str_replace('<h2', '<h5', $why);
                                    $why = str_replace("Â", "", $why);
                                    echo $why; 
                                ?>
                            </div>
                        </div>				
                <?php }} 
                
                if (count($jobTerkait) > 0) {
                ?>
                    <div class="row shadow-lg px-3 mb-1 bg-white">
                        <div class="col-12 col-sm-12 col-md-12 pl-3 pr-3 mt-4 mb-4">
                            <h6 class="pb-0 pt-0"><strong><code class="highlighter-rouge"><?php echo count($jobTerkait); ?></code></strong> lowongan kerja lainnya dari <strong><?php echo $v['nama_perusahaan'] ?></strong></h6>
                            <hr class="mb-0">
                            <?php 
                                foreach ($jobTerkait as $key => $v) {
                                    $url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
                                    if (strlen($key+1) == 1) {
                                        $no = '0'.($key+1);
                                    } else {
                                        $no = ($key+1);
                                    }
                                    echo '<div class="media border-bottom mb-0 mt-0 pb-1 pt-1">
                                        <div class="media-body">
                                            <p class="mt-0 mb-0"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'">'.$v['posisi'].'</a> <span class="badge badge-warning d-table d-md-inline d-lg-inline d-xl-inline">Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".").'</span></p>
                                            <p class="mt-0 mb-0"><small><i class="fa fa-map-marker"></i> '.$v['lokasi'].'</small></p>
                                        </div>
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 pl-0 pr-0 mt-4">
                        <button type="button" id="btn-back" class="btn btn-info btn-block">< Kembali ke halaman utama</button>
                    </div>
                </div>
			<!-- </div> -->
			
		</main>
	</div>
</div>
<style>
    .jssocials-share-link { border-radius: 50%; }
</style>
<?php require('template/load_javascript.php'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
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
        
        // $('.job-ads-h2').css('font-size', '1.2rem!important');

        $('.select-propinsi').select2({
			width: '100%',
			placeholder: 'Semua Lokasi',
		});
		$('.select-spesialisasi').select2({
			width: '100%',
			placeholder: 'Semua Spesialisasi',
		});
        // $('.select2-search__field').css('width', '100%');
        $('#tooltip-gaji').click(function() {
            $(this).tooltip('show');
        })
        $('#btn-back').click(function(){
            // parent.history.back();
            // return false;
            window.location.href = BASE_URL+'loker';
        });
        
    });
</script>
<?php require('template/footer.php'); ?>
