<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu.php'); ?>
		<?php require('template/right_menu.php'); ?>
		
		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
			<div class="shadow p-3 mb-4 bg-white rounded">
				<h2 class="mt-2">Hasil pencarian <?php if ($q!="") echo '"'.$q.'"'; ?></h2>
				<p>Total <code class="highlighter-rouge"><?php echo number_format($total_phone,0); ?></code> device</p>
                <p>Jika belum menemukan, harap masukkan kata kunci yang lebih spesifik lagi.</p>
                <p><?php if ($q=="") echo 'Hanya gadget yang paling populer yang akan ditampilkan';?></p>
            </div>
			<div class="row">
			<?php 
				// d($link);
				$totalRow = count($result);
				foreach ($result as $key => $v) {
					$url_title = convert_accented_characters(url_title($v['DeviceName'], "dash", TRUE));
					// $img = base_url().'asset/images/cdn2/'.trim(explode('/', $v['image'])[5]);
					// d(explode('/', $v['image']));
					if ($totalRow == ($key+1)) {
						echo '<div class="col-6 col-sm-2 col-md-2 mt-2 mb-4">';
					} else {
						echo '<div class="col-6 col-sm-2 col-md-2 mt-2 mb-2">';
					}
				?>
					<!-- <div class="card-group"> -->
						<div class="card">
							<?php
								$external_link = $v['image'];
								$arrLink = explode('/', $external_link);
								$imgName = isset($arrLink[5]) ? trim($arrLink[5]) : '1.jpg';
								$img = '/asset/images/cdn2/'.$imgName;
								// if (@getimagesize($external_link)) {
								// if (@getimagesize('/home/indp1859/public_html'.$img)) {
								if (file_exists('/home/indp1859/public_html'.$img)) {
							?>    
									<!-- <img class="card-img-top img-fluid img-responsive" src="<?php //print $v['image']; ?>" alt="<?php //print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="height: 160px; width: 100%; display: block;"> -->
									<img class="card-img-top img-fluid img-responsive" src="<?php print $img; ?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="height: 160px; width: 100%; display: block;">
							<?php } else { ?>
									<!-- <img class="card-img-top img-fluid img-responsive" src="<?php //print $v['image']; ?>" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="height: 160px; width: 100%; display: block;"> -->
									<img class="card-img-top img-fluid img-responsive" data-src="holder.js/60px180/" alt="No Image" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655f662a64%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655f662a64%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
									<!-- <img class="card-img-top" src="https://ui-avatars.com/api/?name=<?php echo $v['DeviceName'];?>&background=0D8ABC&color=fff" alt="<?php print $v['DeviceName'].' | '.$this->config->item("web_title");?>" style="height: 180px; width: 100%; display: block;"> -->
							<?php } ?>
                            <!-- <div class="card-header"><small><a class="text-dark" href="<?php print base_url(); ?>home/detail/<?php print $v['id'];?>"><?php print $v['DeviceName']; ?></a></small></div> -->
                            <!-- <div class="card-body"> -->
								<!-- <h5 class="card-title"><?php print $v['DeviceName']; ?></h5> -->
								<!-- <p class="card-text"><small><?php print $v['DeviceName']; ?></small></p> -->
								<!-- <a href="<?php print base_url(); ?>home/detail/<?php print $v['id'];?>" class="btn btn-primary">Detail Selengkapnya</a> -->
							<!-- </div> -->
							<div class="card-footer text-center">
								<small class="text-muted"><a class="text-dark" href="<?php print base_url(); ?>home/detail/<?php print $url_title;?>/<?php print $v['id'];?>"><strong><?php print $v['DeviceName']; ?></strong></a></small>
							</div>
						</div>
					</div>
					<!-- </div> -->
				<?php 
						// if ($key <> 0 && $key) {
						// if (($key % 3) == 0) {
						// 	echo '</div>';
						// }
					} 
				?>
			</div>
			
		</main>
	</div>
</div>
<?php require('template/load_javascript.php'); ?>
