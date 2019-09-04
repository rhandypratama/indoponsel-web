<!DOCTYPE html>
<html lang="id">
<head>
    <title><?php isset($subTitle) ? print $subTitle : ''; ?> <?php //print $this->config->item("web_title"); ?></title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ingin mencari spesifikasi dan harga handphone terbaru? di sini tempatnya. Dapatkan juga berita tentang handphone atau teknologi yang sedang viral">
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
        } else {
            echo '<meta name="keywords" content="spesifikasi dan harga hp, spek handphone, spec handphone, harga dan spesifikasi handphone terbaru, harga dan spesifikasi handphone terbaru '.date('Y').', harga ponsel, situs hp, handphone, merk hp">';
        }
    ?>
    
    <link rel="alternate" href="<?php print base_url(); ?>" hreflang="id-ID" />

    <!-- FAV ICON(BROWSER TAB ICON) -->
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
    <!-- <link rel="shortcut icon" href="<?php //print base_url(); ?>asset/images/fav.ico" type="image/x-icon"> -->

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700%7CMontserrat:300,500%7COswald:400,500" rel="stylesheet">

    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="<?php print base_url(); ?>asset/css/font-awesome.min.css">

    <!-- ALL CSS FILES -->
    <link rel="stylesheet" href="<?php print base_url(); ?>asset/css/style.css?<?php print rand();?>">
    <link rel="stylesheet" href="<?php print base_url(); ?>asset/css/bootstrap.min.css?<?php print rand();?>">
    <link rel="stylesheet" href="<?php print base_url(); ?>asset/css/jquery-ui.css?<?php print rand();?>">

    <!-- MOB.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link rel="stylesheet" href="<?php print base_url(); ?>asset/css/mob.min.css?<?php print rand();?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <script type="text/javascript">
        var BASE_URL = "<?php print base_url();?>";
    </script>
</head>