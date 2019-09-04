<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu_loker.php'); ?>
		<?php // require('template/right_menu.php'); ?>

		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <!-- <h2 class="mt-2">Daftar lowongan kerja dengan gaji tertinggi</h2> -->
			<h5 class="pb-2 pt-3">Temukan pekerjaan berdasarkan spesialisasi yang anda miliki</h5>
			<hr>
            <?php 
                foreach ($spesialisasi as $k => $v) {
                    echo '<p><strong>'.$v['nama'].'</strong><p>';
                    echo '<ul>';
                    foreach ($subSpesialisasi as $k => $val) {
                        if ($v['id'] == $val['spesialisasi_id']) echo '<li><a href="'.base_url().'loker/searchJobBySpesialisasi/'.trim($val['id']).'">'.$val['nama'].'</a> <span class="badge badge-info badge-pill">'.number_format($val['totalJob'], 0, ',', '.').'</span></li>';
                    } 
                    echo '</ul>';
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
