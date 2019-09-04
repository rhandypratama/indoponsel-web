<?php require('template/header.php'); ?>
<body  class="sticky-header">
	<div class="body-innerwrapper">
	<header>
		<!-- top-bar -->
		<?php require_once('template/top_bar.php'); ?>

		<!-- navigation -->
		<?php require_once('template/navigation.php'); ?>
	</header>
	<!--====  End of Header  ====-->
	<?php require_once('template/page_title.php'); ?>

	<!--==================================
	=            START SLIDER            =
	===================================-->
	<!-- <section class="newedge-slider default img-overlay">
		<div class="newedge-slider-content">
		    <div id="main-slider" class="carousel slide" data-ride="carousel">
		        <div class="carousel-inner" role="listbox">
		            <div class="item active" style="background-image: url(/assets/img/slider/01.jpg);">
		                <div class="container">
		                    <div class="row">
		                        <div class="col-md-7 col-sm-7 col-xs-12 next-post">
		                            <div class="next-post-wrapper">
		                            	<div>
		                            		<p class="slide-cat">
		                            			<a href="article-categories.html"><span class="cat-icon cat-icon-color02"> L</span>Leadership</a>
		                            		</p>
		                            		<h2 class="slide-title">
		                            			<a href="single-article.html">Vestibulum eget felis nec purus commodo convallis</a>
		                            		</h2>
		                            	</div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="item" style="background-image: url(/assets/img/slider/02.jpg);">
		                <div class="container">
		                    <div class="row">
		                        <div class="col-md-7 col-sm-7 col-xs-12 next-post">
		                            <div class="next-post-wrapper">
		                            	<div>
		                            		<p class="slide-cat">
		                            			<a href="article-categories.html"><span class="cat-icon cat-icon-color03"> v</span>video</a>
		                            		</p>
		                            		<h2 class="slide-title">
		                            			<a href="single-article.html">Somp Bieber Deal Is Not Just Another Gimmick</a>
		                            		</h2>
		                            	</div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="item" style="background-image: url(/assets/img/slider/03.jpg);">
		                <div class="container">
		                    <div class="row">
		                        <div class="col-md-7 col-sm-7 col-xs-12 next-post">
		                            <div class="next-post-wrapper">
		                            	<div>
		                            		<p class="slide-cat">
		                            			<a href="article-categories.html">
		                            				<span class="cat-icon cat-icon-color06"> T</span>Tech
		                            			</a>
		                            		</p>
		                            		<h2 class="slide-title">
		                            			<a href="single-article.html">Wrence Tops World Best Dressed Women List 2015</a>
		                            		</h2>
		                            	</div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="item" style="background-image: url(/assets/img/slider/04.jpg);">
		                <div class="container">
		                    <div class="row">
		                        <div class="col-md-7 col-sm-7 col-xs-12 next-post">
		                            <div class="next-post-wrapper">
		                            	<div>
		                            		<p class="slide-cat">
		                            			<a href="#">
		                            				<span class="cat-icon cat-icon-color04"> B</span>Business
		                            			</a>
		                            		</p>
		                            		<h2 class="slide-title">
		                            			<a href="#">Kevin cow drumstick, turkey sirloin</a>
		                            		</h2>
		                            	</div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="container">
		        	<div class="customNavigation carousel-controls">
		        		<a class="left" data-target="#main-slider" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		        		<a class="right" data-target="#main-slider" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
		        	</div>
		        </div>
		    </div>
		</div>
	</section> -->
	<!--====  End of SLIDER  ====-->

	

	<!--==================================
	=            START MAIN WRAPPER      =
	===================================-->
	<section class="main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					
					<div class="comments-content">
						<div class="section-title">
							<h3 class="pull-left"><span class="cat-icon"><i class="fa fa-bell-o"></i></span>Berita tentang gadget di minggu ini</h3>
						</div>
						<ul class="media-list">
							
						<?php if ($news_feed) foreach ($news_feed as $key => $v) { 
							// $external_link = $v['main_image'];
							$url_title = convert_accented_characters(url_title($v['title'], "dash", TRUE));
						?>
							<li class="media each-comments">
								<div class="media-left">
									<a href="<?php echo base_url('home/detailPost/'.$url_title.'/'.$v['id']);?>"><img class="image-responsive" src="https://ui-avatars.com/api/?name=<?php echo $v['title'];?>&size=60&background=0D8ABC&color=fff" alt="<?php echo $v['title'];?>" class="media-object"></a>
								</div>
								<div class="media-body">
									<h4 class="headline wow fadeInDown"><img src="<?php echo $v['main_image']; ?>" style="width:20px; height:20px; margin-right:10px;"><a href="<?php echo base_url('home/detailPost/'.$url_title.'/'.$v['id']);?>" style="color:#547b9a;"><?php echo $v['title'];?></a></h4>
									<p class="date wow fadeInDown">
										<!-- <i class="fa fa-user"></i> <?php echo ucwords($v['username']);?>&nbsp;&nbsp; -->
										<i class="fa fa-clock-o"></i> <?php echo time_elapsed_string(date('Y-m-d H:i:s', strtotime($v['published'])));?>&nbsp;&nbsp;
										<!-- <i class="fa fa-arrow-right"></i> <?php echo $v['sub'];?> -->
									
									</p>
									<div class="comments-info">
										<p class="wow fadeInDown"><?php echo cutText($v['text'], 25);?></p>
									</div>
									<a href="<?php echo base_url('home/detailPost/'.$url_title.'/'.$v['id']);?>" class="link-color reply-arrow  wow fadeInDown">Read More</a>
								</div>
							</li>
							<?php } ?>
						</ul>

						<?php if ($news_feed) if (isset($link) && $link != '') { ?>
							<div class="comments-content"><div class="section-title"><div style="border-top: 1px solid #e9eaed">
								<?php echo $link; ?>
							</div></div></div>
						<?php } ?>
							
					</div>
				</div>
				
				<!-- WIDGET RIGHT SIDEBAR -->
				<div class="col-sm-3">
					<?php require_once('widget/popular_software.php'); ?>
					<?php require_once('widget/sub_categories.php'); ?>
					
				</div>
				<!-- END WIDGET RIGHT SIDEBAR -->
			
			</div>
		</div> <!-- //container -->
	</section>
	<!--====  End of MAIN WRAPPER  ====-->

	<?php require_once('template/footer.php'); ?>
	<?php require_once('template/mobile_menu.php'); ?>
	</div> <!-- //body-innerwrapper -->
	
	<?php require_once('template/load_javascript.php'); ?>

</html>