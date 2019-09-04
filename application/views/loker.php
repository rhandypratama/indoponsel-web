<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu_loker.php'); ?>
		<?php require('template/right_menu.php'); ?>
		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
			<!-- <h1 class="bd-title" id="content">Tersedia <strong>2.170</strong> lowongan kerja saat ini</h1> -->
			<h1 class="bd-title pb-0" id="content">Tersedia <strong><?php echo number_format($totalJob, 0, ",", "."); ?></strong> lowongan kerja saat ini</h1>
			<!-- <p class="bd-lead">Lowongan kerja bermutu - Perusahaan terkemuka - Terpercaya</p> -->
			<p class="d-none d-md-block d-lg-block d-xl-block">Lowongan kerja bermutu - Perusahaan terkemuka - Terpercaya</p>
			<!-- <script async src="https://cdn.carbonads.com/carbon.js?serve=CKYIKKJL&amp;placement=getbootstrapcom" id="_carbonads_js"></script> -->
			<div class="row d-block">
				<!-- <nav class="navbar navbar-light bg-primary" style="background-color:#e0e0e0!important"> -->
				<!-- <nav class="navbar navbar-light" style="background-color:#6e598e!important"> -->
				<nav class="navbar navbar-light" style="">
					<ul class="navbar-nav mr-auto w-sm-100 w-sm-landscape-100 w-md-landscape-60 w-75" style="border-bottom:3px solid">
						<li class="nav-item active">
							<a class="nav-link" href="#">Data lowongan kerja <span id="x"></span> - <span id="y"></span> dari <span id="z"></span></a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0 d-none d-md-block d-lg-block d-xl-block">
						<span class="navbar-text mr-sm-2">
							<a href="#" id="btn-order" title="Descending" class="text-info">
								<i class="fa fa-sort-numeric-desc"></i>
							</a>
						</span>
						<input type="hidden" id="order" value="DESC">
						<select class="form-control my-sm-0" id="sort" style="font-size:.8rem">
							<option value="tgl_tayang">Tanggal Posting</option>
							<option value="salary_bawah">Gaji</option>
							<!-- <option value="spesialisasi">Spesialisasi</option> -->
						</select>
						<!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
					</form>
				</nav>
			</div>

			<div class="row p-2" id="divMainData">
				<!-- <div class="card w-100 mb-2">
					<div class="card-body">
						<div class="media">
							<div class="media-body">
								<h5 class="card-title"><a href="#" class="card-link">Web TESTER</a></h5>
								<h6 class="card-subtitle mb-2 text-muted font-weight-light">PT. ABC Jaya Makmur<h6>
								<p class="card-text pl-4 mb-0"><small><i class="fa fa-map-marker"></i> <span class="pl-1">Denpasar</span></small></p>
								<p class="card-text pl-4"><small><i class="fa fa-dollar"></i> <span class="pl-1"><a href="#" class="card-link">lihat detail gaji</a></span></small></p>
							</div>
							<img class="ml-3" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1664d287328%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1664d287328%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.84375%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 64px; height: 64px;">
						</div>
						<p class="card-text font-weight-light">
						PT STAR COSMOS didirikan ditahun 1976 oleh Bpk. Ir. Alam Surjaputra. Pemilihan kata Cosmos berasal dari bahasa Yunani kuno, KOSMOS, yang berarti kehidupan di Jagad raya. Misi saat itu adalah sebagai alternative terhadap produk - produk rumah tangga dari Jepang Di tahun 1976 juga, kami mendirikan pabrik pertama kami didaerah Tangerang, yang beroperasi untuk memproduksi dan 
						</p>
					</div>
					<div class="card-footer">
						<small class="text-muted"><i class="fa fa-clock-o"></i> 3 mins ago</small>
					</div>
				</div> -->
			</div>

			<div class="row p-2">
				<div id="pagination"></div>
			</div>

		</main>
	</div>
</div>
<?php require('template/load_javascript.php'); ?>
<script type="text/javascript">
	function defaultFilter() {
		$('#keyword').val('').trigger('change');
		$('.select-propinsi').select2({
			width: '100%',
			placeholder: 'Semua Lokasi'
		});
		$('.select-spesialisasi').select2({
			width: '100%',
			placeholder: 'Semua Spesialisasi'
		});
		$('.select-propinsi').val(null).trigger('change');
		$('.select-spesialisasi').val(null).trigger('change');
		$('#gaji_minimum').val('');
	}

	$(function() {
		var divMainData = $('#divMainData');
		loadPagination(0);

		$('#btn-cari-lowongan').on('click', function(e){
       		e.preventDefault();
			// var propinsi = $('#propinsi').val();
			// var spesialisasi = $('#spesialisasi').val();
			// var gajiMin = $('#gaji_minimum').val();
			loadPagination(0);
		});

		 $('#btn-clear-filter').click(function (e) {
			e.preventDefault();
			$.ajax({
				url: BASE_URL + 'loker/clearFilter',
				type: 'POST',
				data: {
					id: 1,
				},
				dataType: "json",
				success: function (response) {
					// console.log(response);
					defaultFilter();
					// loadPagination(0);
				},
				error: function (e) {
					console.log('error', e);
				}

			});
		});


		$('#btn-order').on('click', function(e){
       		e.preventDefault();
			var order = $('#order').val();
			if (order == 'DESC') {
				$('#order').val('ASC');
				$(this).html('<i class="fa fa-sort-numeric-asc"></i>');
			} else {
				$('#order').val('DESC');
				$(this).html('<i class="fa fa-sort-numeric-desc"></i>');
			}
			loadPagination(0);
		}); 

		// Detect pagination click
		$('#pagination').on('click','a',function(e){
       		e.preventDefault(); 
       		var pageno = $(this).attr('data-ci-pagination-page');
       		loadPagination(pageno);
     	});

		function convertToRupiah(angka) {
			var rupiah = '';		
			var angkarev = angka.toString().split('').reverse().join('');
			for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
			return rupiah.split('',rupiah.length-1).reverse().join('');
		}
		
		function convertToAngka(rupiah){
			return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
		}

		// Load pagination
		function loadPagination(pagno){
			var propinsi = $('#propinsi').val();
			var spesialisasi = $('#spesialisasi').val();
			var gajiMin = $('#gaji_minimum').val();
			var keyword = $('#keyword').val();
			var sort = $('#sort').val();
			var order = $('#order').val();
			// console.log(keyword);
			// return false;
			divMainData.html('<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-4"><img src="/asset/images/Ripple-1.7s-200px.svg" /></div>');
			$.ajax({
				url: '<?=base_url()?>loker/loadRecord/'+pagno,
				type: 'get',
				data:{
					propinsi: propinsi,
					spesialisasi: spesialisasi,
					gajiMin: gajiMin,
					keyword: keyword,
					sort: sort,
					order: order,
				},
				dataType: 'json',
				success: function(response){
					if (response.feed.length > 0) {
						divMainData.html(response.feed);
					} else {
						divMainData.html('<p class="p-2 text-danger">Data yang anda cari tidak ditemukan</p>');
					}
					$('#x').text(convertToRupiah(response.x));
					$('#y').text(convertToRupiah(response.y));
					$('#z').text(convertToRupiah(response.z));
					$('#pagination').html(response.pagination);
					// console.log(response)

				}
			});
		}		
		
		$('.select-propinsi').select2({
			width: '100%',
			placeholder: 'Semua Lokasi',
		});
		$('.select-spesialisasi').select2({
			width: '100%',
			placeholder: 'Semua Spesialisasi',
		});
		$('.select2-search__field').css('width', '100%');
		// $('.select-spesialisasi').select2('data', {id: 100, text: 'Lorem Ipsum', selected: true});
		
		setTimeout(() => {
			$('#exampleModalCenter').modal('show');
		}, 1000 * 60 * 1);
	});
</script>
<?php require('template/footer.php'); ?>