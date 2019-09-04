<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu.php'); ?>
		<?php require('template/right_menu.php'); ?>

		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
			<h1 class="bd-title" id="content">Berita tentang <strong><span class="element text-uppercase"></span></strong> di minggu ini</h1>
			<p class="bd-lead">Pantau terus untuk mendapatkan berita - berita terbaru dari indoponsel</p>
			<!-- <script async src="https://cdn.carbonads.com/carbon.js?serve=CKYIKKJL&amp;placement=getbootstrapcom" id="_carbonads_js"></script> -->
			<?php
				// $longURLLazada = 'https://c.lazada.co.id/t/c.Zrq9';
				// echo '<a href="'.$longURLLazada.'" target="_blank" title="Lazada Promo"><img alt="Lazada" class="img-fluid" src="https://media.go2speed.org/brand/files/lazada/8254/ID_XiaomiA1Oct2017_728x90.jpg"></a>';
			?>
			<div class="row" id="divMainData"></div>
		</main>
	</div>
</div>
<?php require('template/load_javascript.php'); ?>
<script type="text/javascript">
	var localCache = {
		data: {},
		remove: function (url) {
			delete localCache.data[url];
		},
		exist: function (url) {
			return localCache.data.hasOwnProperty(url) && localCache.data[url] !== null;
		},
		get: function (url) {
			console.log('Getting in cache for url : ' + url);
			return localCache.data[url];
		},
		set: function (url, cachedData, callback) {
			localCache.remove(url);
			localCache.data[url] = cachedData;
			if ($.isFunction(callback)) callback(cachedData);
		}
	};

	
	$(function() {
		var options = {
			strings: ["smartphone", "laptop", "teknologi", "apps", "gadget"],
			typeSpeed: 100,
			backDelay: 2000,
			startDelay: 1000,
			loop: true,
		}
		var typed = new Typed(".element", options);

		var divMainData = $('#divMainData').html('<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-4"><img src="/asset/images/Ripple-1.7s-200px.svg" /></div>');
		
		// $.ajaxSetup({ cache: true });
		var url = BASE_URL + 'home/getNewsFeed';
		$.ajax({
			url: url,
            type: "GET",
            dataType: "json",
			// beforeSend: function () {
            //     console.log(localCache.data[url]);
            //     if (localCache.exist(url)) {
            //         doSomething(localCache.get(url));
            //         return false;
            //     }
            //     return true;
            // },
            success: function (data) {
                // console.log(data);
				// localCache.set(url, data, doSomething);
				divMainData.html('<div class="card-columns mt-4 px-3">'+data+'</div>');
				$(".card-columns").contents().filter(function () {
					return this.nodeType != 1;
				}).replaceWith("");
				// console.log(localCache.data[url]);

            },
			error: function (e) {
				console.log(e);
			}
		});

	});

	function doSomething(data) {
		console.log(data);
	};

</script>
<?php require('template/footer.php'); ?>