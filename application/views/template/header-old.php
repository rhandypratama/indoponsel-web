<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Copypastefile Gudang Download Software Fullversion Terbaru <?php echo date('Y');?> dan 100% Gratis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="21tqUTVun7-DvqcAq1T-31ZvVLQYo2qrcEfihinnY3w" />
	<?php 
		if ($this->uri->segment(1) == 'downloads' && $this->uri->segment(2) == 'detail') { 
			if (count($software[0]) > 0) {
				// $search  = array(0,1,2,3,4,5,6,7,8,9,'.');
				// echo trim((str_replace($search, '', $software[0]['title'])));
				echo '<meta name="description" content="Ingin download software terbaru versi gratis dan aman 100% dari berbagai virus serta software demo dari situs download yang bereputasi baik? di sini tempatnya">';
				echo '<meta name="keywords" content="download, download software, download aplikasi, download aplikasi gratis, free download, aplikasi terbaru '.date('Y').', aplikasi terbaru, download software gratis full version, download software terbaru '.date('Y').', download software gratis, copypastefile, download '.$software[0]['sub'].', '.$software[0]['sub'].' terbaru, download '.$software[0]['title'].' terbaru">';
				// echo '<meta name="keywords" content="download software terbaru '.date('Y').' gratis free copy paste file copypastefile apk windows mac smartphone fullversion '.$software[0]['sub'].' '.$software[0]['title'].'">';
			} else {
				// echo '<meta name="keywords" content="download software app terbaru '.date('Y').' gratis free copy paste file copypastefile apk windows mac smartphone fullversion">';
				echo '<meta name="description" content="Ingin download software terbaru versi gratis dan aman 100% dari berbagai virus serta software demo dari situs download yang bereputasi baik? di sini tempatnya">';
				echo '<meta name="keywords" content="download, download software, download aplikasi, download aplikasi gratis, free download, aplikasi terbaru '.date('Y').', aplikasi terbaru, download software gratis full version, download software terbaru '.date('Y').', download software gratis, copypastefile">';
			}
		} else if ($this->uri->segment(1) == 'downloads' && $this->uri->segment(2) == 'categories') { 
			if (count($software) > 0) {
				$search  = array('-');
				// echo trim((str_replace($search, '', $software[0]['title'])));
				echo '<meta name="description" content="Ingin download software terbaru versi gratis dan aman 100% dari berbagai virus serta software demo dari situs download yang bereputasi baik? di sini tempatnya">';
				echo '<meta name="keywords" content="download software, download aplikasi, download aplikasi gratis, free download, aplikasi terbaru '.date('Y').', aplikasi terbaru, download software gratis full version, download software terbaru '.date('Y').', download software gratis, copypastefile, download '.trim((str_replace($search, ' ', $software[0]['sub']))).'">';
				// echo '<meta name="keywords" content="download software terbaru '.date('Y').' gratis free copy paste file copypastefile apk windows mac smartphone fullversion '.$article[0]['title'].'">';
			} else {
				echo '<meta name="description" content="Ingin download software terbaru versi gratis dan aman 100% dari berbagai virus serta software demo dari situs download yang bereputasi baik? di sini tempatnya">';
				echo '<meta name="keywords" content="download, download software, download aplikasi, download aplikasi gratis, free download, aplikasi terbaru '.date('Y').', aplikasi terbaru, download software gratis full version, download software terbaru '.date('Y').', download software gratis, copypastefile">';
				// echo '<meta name="keywords" content="download software terbaru '.date('Y').' gratis free copy paste file copypastefile apk windows mac smartphone fullversion">';
			}
		} else if ($this->uri->segment(1) == 'news' && $this->uri->segment(2) == 'detail') { 
			if (count($article[0]) > 0) {
				echo '<meta name="description" content="'.$article[0]['title'].'">';
				if ($article[0]['tag'] != '') {
					echo '<meta name="keywords" content="'.str_replace(';;;', ',', $article[0]['tag']).'">';
				} else {
					echo '<meta name="keywords" content="download, download software, download aplikasi, download aplikasi gratis, free download, aplikasi terbaru '.date('Y').', aplikasi terbaru, download software gratis full version, download software terbaru '.date('Y').', download software gratis, copypastefile, '.$article[0]['title'].'">';					
				}
				// echo '<meta name="keywords" content="download software terbaru '.date('Y').' gratis free copy paste file copypastefile apk windows mac smartphone fullversion '.$article[0]['title'].'">';
			} else {
				echo '<meta name="description" content="Ingin download software terbaru versi gratis dan aman 100% dari berbagai virus serta software demo dari situs download yang bereputasi baik? di sini tempatnya">';
				echo '<meta name="keywords" content="download, download software, download aplikasi, download aplikasi gratis, free download, aplikasi terbaru '.date('Y').', aplikasi terbaru, download software gratis full version, download software terbaru '.date('Y').', download software gratis, copypastefile">';
				// echo '<meta name="keywords" content="download software terbaru '.date('Y').' gratis free copy paste file copypastefile apk windows mac smartphone fullversion">';
			}
		} else {
			echo '<meta name="description" content="Ingin download software terbaru versi gratis dan aman 100% dari berbagai virus serta software demo dari situs download yang bereputasi baik? di sini tempatnya">';
			echo '<meta name="keywords" content="download, download software, download aplikasi, download aplikasi gratis, free download, aplikasi terbaru '.date('Y').', aplikasi terbaru, download software gratis full version, download software terbaru '.date('Y').', download software gratis, copypastefile">';
			// echo '<meta name="keywords" content="download software terbaru '.date('Y').' gratis free copy paste file copypastefile apk windows mac smartphone fullversion">';
		}
	?>
	
	<link rel=”alternate” href=”<?php echo base_url(); ?>” hreflang=”id-ID” />
	<link rel="canonical" href="<?php echo base_url(); ?>" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Copypastefile Gudang Download Software Fullversion Terbaru <?php echo date('Y');?> dan 100% Gratis" />
	<meta property="og:description" content="Ingin download software terbaru versi gratis dan aman 100% dari berbagai virus serta software demo dari situs download yang bereputasi baik? di sini tempatnya" />
	<meta property="og:url" content="<?php echo base_url(); ?>" />
	<meta property="og:site_name" content="Copypastefile Gudang Download Software Fullversion Terbaru <?php echo date('Y');?> dan 100% Gratis" />
	<meta property="og:image" content="/asset/template/img/presets/preset1/logo.png" />
	<meta property="og:image:secure_url" content="/asset/template/img/presets/preset1/logo.png" />
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116535621-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-116535621-1');
	</script>

  	<!-- FAVICON -->
  	<link rel="apple-touch-icon" sizes="180x180" href="/asset/template/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/asset/template/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/asset/template/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="/asset/template/img/favicon/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
  	<!-- <link rel="shortcut icon" href="/assets/img/favicon.png"> -->

	<!-- CSS -->
	<link rel="stylesheet" href="/asset/template/css/bootstrap.min.css">
	<link rel="stylesheet" href="/asset/template/css/font-awesome.min.css">
	<link rel="stylesheet" href="/asset/template/css/cs-select.css">  
	<link rel="stylesheet" href="/asset/template/css/animate.css">  
	<link rel="stylesheet" href="/asset/template/css/nanoscroller.css">  
	<link rel="stylesheet" href="/asset/template/css/owl.carousel.css">  
	<link rel="stylesheet" href="/asset/template/css/flexslider.css">  
	<link rel="stylesheet" href="/asset/template/css/style.css">  
	<link rel="stylesheet" href="/asset/template/css/presets/preset1.css">  
	<link rel="stylesheet" href="/asset/template/css/responsive.css">  
	
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>