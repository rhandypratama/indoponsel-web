<!doctype html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5QWVSJ8');</script> -->
    <!-- End Google Tag Manager -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if ($this->uri->segment(1) == 'home') { ?>
        <meta name="description" content="Ingin mencari spesifikasi dan harga handphone terbaru <?php echo date('Y') ?>? di sini tempatnya. Dapatkan juga berita tentang handphone atau teknologi yang sedang viral">
    <?php } else if ($this->uri->segment(1) == 'loker') { 
        if ($this->uri->segment(2) == 'detailJob') {
    ?>
        <meta name="description" content="Lowongan kerja terbaru <?php echo date('Y').' sebagai '.$this->uri->segment(3) ?>">
    <?php } elseif ($this->uri->segment(2) == 'tips_kirim_lamaran_kerja_via_email') { ?>
        <meta name="description" content="Lowongan kerja terbaru <?php echo date('Y') ?>. Dapatkan tips mengirim lamaran kerja via email dengan tepat">
    <?php } elseif ($this->uri->segment(2) == 'tips_interview_kerja') { ?>
        <meta name="description" content="Lowongan kerja terbaru <?php echo date('Y') ?>. Dapatkan tips cerdas saat proses interview kerja">
    <?php } elseif ($this->uri->segment(2) == 'list_job_order_by_gaji') { ?>
        <meta name="description" content="Lowongan kerja terbaru <?php echo date('Y') ?>. Ini dia yang anda cari selama ini, daftar lowongan kerja dengan penghasilan terbesar">
    <?php } elseif ($this->uri->segment(2) == 'list_job_order_by_spesialisasi') { ?>
        <meta name="description" content="Lowongan kerja terbaru <?php echo date('Y') ?>. Temukan pekerjaan berdasarkan spesialisasi yang anda miliki">
    <?php }
    } 
    ?>
    <meta name="author" content="indoponsel">
	<meta name="generator" content="indoponsel v2.0">
	<?php 
		if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'brand') {
            $uri3 = ($this->uri->segment(3) != '') ? ' '.$this->uri->segment(3) : '';
			echo '<meta name="keywords" content="hp'.$uri3.', harga hp'.$uri3.', daftar harga'.$uri3.', spesifikasi'.$uri3.', spesifikasi dan harga hp'.$uri3.', spek handphone'.$uri3.', spec handphone'.$uri3.', harga dan spesifikasi handphone'.$uri3.' terbaru, harga dan spesifikasi handphone'.$uri3.' terbaru '.date('Y').', harga ponsel'.$uri3.', situs hp'.$uri3.', handphone, merk hp">';
        } else if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'detail') {
            if (!empty($dataDetail)) {
			    echo '<meta name="keywords" content="hp '.$dataDetail[0]['Brand'].', harga hp '.$dataDetail[0]['Brand'].', daftar harga '.$dataDetail[0]['Brand'].', spesifikasi '.$dataDetail[0]['DeviceName'].', spesifikasi dan harga hp '.$dataDetail[0]['DeviceName'].', spek handphone '.$dataDetail[0]['Brand'].', spec handphone '.$dataDetail[0]['Brand'].', harga dan spesifikasi handphone '.$dataDetail[0]['Brand'].' terbaru, harga dan spesifikasi handphone '.$dataDetail[0]['Brand'].' terbaru '.date('Y').', harga ponsel '.$dataDetail[0]['Brand'].', situs hp '.$dataDetail[0]['Brand'].', handphone, merk hp">';
            } else {
                echo '<meta name="keywords" content="spesifikasi dan harga hp, spek handphone, spec handphone, harga dan spesifikasi handphone terbaru, harga dan spesifikasi handphone terbaru '.date('Y').', harga ponsel, situs hp, handphone, merk hp">';
            }
        } else if ($this->uri->segment(1) == 'loker') {
            echo '<meta name="keywords" content="lowongan kerja '.date('Y').', lowongan kerja terbaru, lowongan, karir, kerja, job vacancy, loker terbaru">';
        } else {
            echo '<meta name="keywords" content="spesifikasi dan harga hp, spek handphone, spec handphone, harga dan spesifikasi handphone terbaru, harga dan spesifikasi handphone terbaru '.date('Y').', harga ponsel, situs hp, handphone, merk hp">';
        }
    ?>
    <title><?php isset($subTitle) ? print $subTitle : ''; ?></title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="/asset/template/css/font-awesome.min.css"> -->
	<!-- <link rel="stylesheet" href="/asset/css/jquery-ui.css?<?php //print rand();?>"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <!-- Documentation extras -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet"> -->
	<link href="https://getbootstrap.com/docs/4.1/assets/css/docs.min.css" rel="stylesheet">
	<link href="/asset/css/autocomplete-custom.css" rel="stylesheet">
    <!-- <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet"> -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        @media (max-width: 575.98px) {
            h1.bd-title {
                font-size: 1.2rem;
                padding-bottom: 6px;
            }
            h2.title-gaji-terbesar {
                font-size: 1.3rem;
                /* padding-bottom: 2px; */
            }
            .w-sm-100 {width: 100% !important;}
            .w-sm-80 {width: 80% !important;}
            .w-sm-75 {width: 75% !important;}
            .w-sm-60 {width: 60% !important;}
            .w-sm-50 {width: 50% !important;}
            .w-sm-40 {width: 40% !important;}
            .w-sm-25 {width: 25% !important;}
            .w-sm-20 {width: 20% !important;}
            .mt-sm-8 {margin-top: 8px !important;}

            .bd-navbar .navbar-nav .nav-link {
                padding-bottom: 10px!important;
                padding-top: 0px;
                margin-top: 6px!important;
            }
            .bd-navbar .navbar-nav .nav-link:hover {
                padding-bottom: 10px!important;
                padding-top: 0px;
                margin-top: 6px!important;
            }
            .bd-navbar .navbar-nav .nav-link.active {
                padding-bottom: 10px!important;
                padding-top: 0px;
                margin-top: 6px!important;
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            h1.bd-title {
                font-size: 1.5rem;
                padding-bottom: 6px;
            }
            h2.title-gaji-terbesar {
                font-size: 1.5rem;
                /* padding-bottom: 2px; */
            }
            .w-sm-landscape-100 {width: 100% !important;}
            .mt-sm-8 {margin-top: 8px !important;}
            .bd-navbar .navbar-nav .nav-link {
                padding-bottom: 10px!important;
                padding-top: 0px;
                margin-top: 6px!important;
            }
            .bd-navbar .navbar-nav .nav-link:hover {
                padding-bottom: 10px!important;
                padding-top: 0px;
                margin-top: 6px!important;
            }
            .bd-navbar .navbar-nav .nav-link.active {
                padding-bottom: 10px!important;
                padding-top: 0px;
                margin-top: 6px!important;
            }
        }
        
        @media (min-width: 768px) and (max-width: 991.98px) { 
            h1.bd-title {
                font-size: 1.5rem;
                padding-bottom: 6px;
            }
            h2.title-gaji-terbesar {
                font-size: 1.5rem;
                /* padding-bottom: 2px; */
            }
            .w-md-landscape-60 {width: 60% !important;}
            /* .mt-sm-8 {margin-top: 8px !important;} */
            .bd-navbar .navbar-nav .nav-link {
                padding-bottom: 14px!important;
                padding-top: 0px;
                margin-top: 10px!important;
            }
            .bd-navbar .navbar-nav .nav-link:hover {
                padding-bottom: 14px!important;
                padding-top: 0px;
                margin-top: 10px!important;
            }
            .bd-navbar .navbar-nav .nav-link.active {
                padding-bottom: 14px!important;
                padding-top: 0px;
                margin-top: 10px!important;
            }
        }

        .bd-navbar .navbar-nav .nav-link {
            color: #656565;
            padding-bottom: 14px;
            margin-top: 14px;
        }
        .bd-navbar .navbar-nav .nav-link:hover {
            color: #333;
            padding-bottom: 14px;
            margin-top: 14px;
        }
        .bd-navbar .navbar-nav .nav-link.active {
            /* color: #333; */
            /* color: #1A73E8; */
            /* border-bottom: 3px solid #1A73E8; */
            color: #17a2b8;
            border-bottom: 3px solid #17a2b8;
            padding-bottom: 14px;
            margin-top: 14px;
        }
        .select2-dropdown {
            z-index: 9001;
        }
        /* Input field */
        .select2-selection__rendered { 
            color: #000;
            font-size: .8rem;   
        }

        /* Around the search field */
        .select2-search { 
            
        }

        /* Search field */
        .select2-search input {  }

        /* Each result */
        .select2-results { 
            font-size: .8rem;
        }

        /* Higlighted (hover) result */
        .select2-results__option--highlighted {  }

        /* Selected option */
        .select2-results__option[aria-selected=true] {  }
    </style>
	<!-- Favicons -->
	<!-- <link rel="shortcut icon" href="/asset/images/fav.ico" type="image/x-icon"> -->
	<link rel="apple-touch-icon" sizes="57x57" href="/asset/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/asset/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/asset/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/asset/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/asset/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/asset/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/asset/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/asset/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/asset/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/asset/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/asset/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/asset/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/asset/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/asset/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/asset/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">
    <meta name="msapplication-config" content="https://getbootstrap.com/docs/4.1/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c"> -->

    <!-- Twitter -->
    <!-- <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@getbootstrap">
    <meta name="twitter:creator" content="@getbootstrap">
    <meta name="twitter:title" content="Introduction">
    <meta name="twitter:description" content="Get started with Bootstrap, the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.">
    <meta name="twitter:image" content="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-social-logo.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="index.html">
    <meta property="og:title" content="Introduction">
    <meta property="og:description" content="Get started with Bootstrap, the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://getbootstrap.com/docs/4.1/assets/brand/bootstrap-social.png">
    <meta property="og:image:secure_url" content="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> -->

	<!-- Google Analytics -->
    <?php //if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
        <script>
            // your analytics code here
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-97173850-1', 'auto');
            ga('send', 'pageview');
        </script>
    <?php //endif; ?>

    <script>
        var BASE_URL = "<?php print base_url();?>";
        
        // document.addEventListener('DOMContentLoaded', function () {
        //     if (!Notification) {
        //         alert('Desktop notifications not available in your browser.'); 
        //         return;
        //     }

        //     if (Notification.permission !== "granted") {
        //         Notification.requestPermission();
        //     } else {
        //         var notification = new Notification('Notification title', {
        //             icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
        //             body: "Hey there! You've been notified!",
        //         });

        //         notification.onclick = function () {
        //             window.open("http://stackoverflow.com/a/13328397/1269037");      
        //         };

        //     }
        // });
    </script>
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QWVSJ8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->