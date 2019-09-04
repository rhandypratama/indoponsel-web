<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu_loker.php'); ?>
		<?php // require('template/right_menu.php'); ?>

		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <!-- <h2 class="mt-2">Daftar lowongan kerja dengan gaji tertinggi</h2> -->
            <h2 class="mt-2 mb-4 title-gaji-terbesar">Temukan pekerjaan yang anda impikan sekarang juga!</h5>
            <div class="row">

                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <span class="pt-3"><strong>Top 20 lowongan pekerjaan dengan tawaran gaji tertinggi bersadarkan spesialisasi</strong></span>
                    <div class="mt-2">
                        <select class="form-control mt-4" id="sp-job" name="sp-job">
                            <?php
                                echo '<option></option>';
                                $kategori = '';
                                foreach ($spesialisasi as $key => $v) {
                                    if ($kategori != $v['spesialisasi_id']) {
                                        echo '<optgroup label="'.$v['kategori'].'">';
                                        echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                        if ($kategori != '' && $kategori == $v['spesialisasi_id']) echo '</optgroup>';
                                    } else {
                                        echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                    }
                                    $kategori = $v['spesialisasi_id'];
                                }
                            ?>
                        </select>
                    </div>
                    <!-- <div class="mb-2 pb-2 border-bottom"></div> -->
                    <div class="mt-2 mb-4" id="data-gaji-spesialisasi"></div>
                </div>

                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <!-- <details> -->
                    <span><strong>Top 20 semua lowongan pekerjaan dengan tawaran gaji tertinggi</strong></span>
                    <div class="mb-2 pb-2"></div>
                    <?php 
                        if (count($job) > 0) {
                            // echo '<div class="list-group pb-4">';
                            foreach ($job as $key => $v) {
                                $url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
                                if (strlen($key+1) == 1) {
                                    $no = '0'.($key+1);
                                } else {
                                    $no = ($key+1);
                                }
                    ?>          
                                <div class="card bg-white w-100 mb-2 shadow-lg rounded">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h6 class="card-title"><a href="<?php echo base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id'])?>" class="card-link"><?php echo $v['posisi'];?></a></h6>
                                                <h6 class="card-subtitle mb-0 text-muted font-weight-light"><?php echo $v['nama_perusahaan'];?></h6>
                                                <p class="pl-2 mb-0 mt-0 pt-0 d-none d-md-block d-lg-block d-xl-block"><small><i class="fa fa-map-marker"></i> <span class="pl-1"><?php echo $v['lokasi'];?></span></small></p>
                                                <p class="pl-2 mb-0 mt-0 pt-0"><small><i class="fa fa-dollar"></i></small> <span class="pl-1"><span class="badge badge-warning"><?php echo 'Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".");?></span></span></p>
                                            </div>
                                            <div class="ml-3 mr-3 bg-info rounded-circle pt-1 pb-1 pl-2 pr-2" style="color: white;font-weight: 400;font-size: 1.3rem;"><em><?php echo $no; ?></em></div>
                                            <!-- <img class="ml-3" alt="Logo perusahaan" src="https://siva.jsstatic.com/id/65598/images/sol/65598_logo_0_485848.jpg" style="width: 64px; height: 64px;"> -->
                                        </div>
                                    </div>
                                </div>
                
                                <!-- <div class="media mb-0 mt-0 pb-0 border-bottom">
                                    <div class="align-self-center mr-3 bg-info rounded-circle pt-1 pb-1 pl-2 pr-2" style="color: white;font-weight: 400;font-size: 1rem;"><em><?php echo $no; ?></em></div>
                                    <div class="media-body">
                                        <p class="mt-0 mb-0"><a style="font-size: .9rem" href="<?php echo base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id'])?>"><?php echo $v['posisi'];?></a></p>
                                        <p class="mt-0 mb-0"><small><i class="fa fa-building pr-1"></i><?php echo $v['nama_perusahaan'];?></small></p>
                                        <p class="mt-0 mb-0"><small><i class="fa fa-map-marker pr-1"></i><?php echo $v['lokasi'];?></small></p>
                                        <p class="mt-0 mb-2"><small><i class="fa fa-dollar pr-1"></i></small><span class="badge badge-warning"><?php echo 'Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".");?></span></p>
                                    </div>
                                </div> -->
                                
                                <!-- <a href="<?php echo base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id'])?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <p class="mb-1"><?php echo $v['posisi'];?></p>
                                        <small class="text-muted d-none d-md-block d-lg-block d-xl-block"><?php echo time_elapsed_string(date('Y-m-d H:i:s', strtotime($v['tgl_tayang']))); ?></small>
                                    </div>
                                    <p class="mb-1 d-none d-md-block d-lg-block d-xl-block"><small><?php echo $v['nama_perusahaan'];?></small></span></p>
                                    <p class="mb-1"><span class="badge badge-warning"><?php echo 'Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".");?></span></p>
                                    <small class="text-muted"><i class="fa fa-map-marker"></i> <span class="pl-1"><?php echo $v['lokasi']; ?></span></small>
                                </a> -->
                                                        
                    <?php }
                        // echo '</div>';
                        // echo '</details>';
                    } ?>
                </div>

            </div>
            
			
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

        // $('.select-propinsi').select2({
		// 	width: '100%',
		// 	placeholder: 'Semua Lokasi',
		// });
		$('#sp-job').select2({
			width: '100%',
			placeholder: 'Pilih Spesialisasi',
		});
        $('.select2-search__field').css('width', '100%');
        
        $("#sp-job").on('change', function(e) {
            e.preventDefault();
            $('#data-gaji-spesialisasi').html('<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-4"><img src="/asset/images/Ripple-1.7s-200px.svg"></div>');
            var subSpesialisasiId = $(this).select2('data')[0]['id'];
            $.ajax({
				url: '<?=base_url()?>loker/loadJobByGajiSpesialisasi',
				type: 'post',
				data:{
					subSpesialisasiId: subSpesialisasiId,
				},
				dataType: 'json',
				success: function(response){
					// console.log(response)
                    if (response.feed.length > 0) {
						$('#data-gaji-spesialisasi').html(response.feed);
					} else {
						$('#data-gaji-spesialisasi').html('<p class="p-2 text-danger">Data yang anda cari tidak ditemukan</p>');
					}
				}
			});
        });
    });
</script>
<?php require('template/footer.php'); ?>
