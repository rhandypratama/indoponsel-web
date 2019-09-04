<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu_loker.php'); ?>
		<?php require('template/right_menu.php'); ?>

		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <!-- <h2 class="mt-2">Daftar lowongan kerja dengan gaji tertinggi</h2> -->
			<h5 class="pb-2 pt-3">Daftar lowongan kerja yang paling diminati di tahun <?php echo date('Y'); ?></h5>
            <?php 
                foreach ($job as $key => $v) {
                    $url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
                    if (strlen($key+1) == 1) {
                        $no = '0'.($key+1);
                    } else {
                        $no = ($key+1);
                    }
                    echo '<div class="card bg-white w-100 mb-2 shadow-lg rounded">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="card-title"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'" class="card-link">'.$v['posisi'].'</a> (<code class="highlighter-rouge">'.number_format($v['viewed'],0,",",".").'</code>)</h6>
                                    <h6 class="card-subtitle mb-0 text-muted font-weight-light">'.$v['nama_perusahaan'].'</h6>
                                    <p class="pl-2 mb-0 mt-0 pt-0 d-none d-md-block d-lg-block d-xl-block"><small><i class="fa fa-map-marker"></i> <span class="pl-1">'.$v['lokasi'].'</span></small></p>
                                    <p class="pl-2 mb-0 mt-0 pt-0"><small><i class="fa fa-dollar"></i></small> <span class="pl-1"><span class="badge badge-warning">'.'Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".").'</span></span></p>
                                </div>
                            </div>
                        </div>
                    </div>';

                    // echo '<div class="media border-bottom mb-0 mt-0 pb-1 pt-1">
                    //     <div class="align-self-center mr-3 bg-info rounded-circle pt-1 pb-1 pl-2 pr-2" style="color: white;font-weight: 400;font-size: 0.8rem;"><em>'.$no.'</em></div>
                    //     <div class="media-body">
                    //         <p class="mt-0 mb-0"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'">'.$v['posisi'].'</a> (<code class="highlighter-rouge">'.number_format($v['viewed'],0,",",".").'</code>)</p>
                    //         <p class="mt-0 mb-0"><small>'.$v['nama_perusahaan'].'</small></p>
                    //     </div>
                    // </div>';

                    // echo '<div class="d-inline mr-2 bg-info rounded-circle pt-1 pb-1 pl-2 pr-2" style="color: white;font-weight: 400;font-size: 0.7rem;"><em>'.$no.'</em></div>';
                    // echo '<p class="d-inline"><a href="">'.$v['posisi'].'</a><p>';
                }
            ?>
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
                shares: ["twitter", "facebook", "googleplus", "whatsapp"],
                showLabel: false,
                showCount: false,
                shareIn: "blank"
            });
        } else {
            $("#share").jsSocials({
                shares: ["twitter", "facebook", "googleplus", "whatsapp"],
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
        $('.select2-search__field').css('width', '100%');
        $('#btn-back').click(function(){
            // parent.history.back();
            // return false;
            window.location.href = BASE_URL+'loker';
        });
    });
</script>
<?php require('template/footer.php'); ?>
