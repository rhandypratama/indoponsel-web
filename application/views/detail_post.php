<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php require('template/left_menu.php'); ?>
		<?php require('template/right_menu.php'); ?>

		<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <!-- <h2 class="mt-2">List semua gadget <?php //echo $category; ?></h2>
			<p>Total <code class="highlighter-rouge"><?php //echo number_format($total_phone,0); ?></code> device dari brand <code class="highlighter-rouge"><?php //print $category; ?></code></p> -->
			<?php
                $data = $detail[0];
                // d($detail[0]); die;
                if (!is_null($data)) {
                    if ($data['author'] == '' || $data['author'] == null) {
                        $author = $data['site'];
                    } else {
                        $author = $data['author'];
                    }
                }
            ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 mt-4 mb-4">
                    <h3><?php echo $data['title']; ?></h3>
                    <div id="share" class="mt-3"></div>
                    <figure class="mt-3">
                        <!-- <img src=".../400x300" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."> -->
                        <?php
                            $external_link = $data['image'];
                            echo '<img class="figure-img img-fluid img-responsive" src="'.getImageLogo($external_link).'" alt="'.$data['title'].'" style="width: 100%; display: block;">';
                            // if (@getimagesize($external_link)) {
                            //     echo '<img class="figure-img img-fluid img-responsive" src="'.$data['main_image'].'" alt="'.$data['title'].'" style="width: 100%; display: block;">';
                            // } else {
                            //     echo '<img class="figure-img img-fluid img-responsive" data-src="holder.js/100px180/" alt="No Image" style="height: 140px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655f662a64%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655f662a64%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">';
                            // }
                        ?>
                        <figcaption class="figure-caption text-right">Sumber : <?php echo $author; ?></figcaption>
                    </figure>
                    <div id="main-content">
                        <!-- <p><span class="badge badge-light"><i class="fa fa-tag"></i> <?php //echo $data['site_type']?></span> <span class="badge badge-light"><i class="fa fa-clock-o"></i> <?php //echo time_elapsed_string(date('Y-m-d H:i:s', strtotime($data['published'])));?></span></p> -->
                        <p>
                            <span class="badge badge-light"><i class="fa fa-tag"></i> <?php echo $data['category']?></span> 
                            <span class="badge badge-light"><i class="fa fa-clock-o"></i> 
                                <?php 
                                    // $array_tgl = explode(' ', $data['date_post']); 
                                    // $str_tgl = trim($array_tgl[1]).'-'.trim($array_tgl[2]).'-'.trim($array_tgl[3]);
                                    // $date = DateTime::createFromFormat('d-M-Y', $str_tgl);
                                    // echo $date->format('Y-m-d').' '.trim($array_tgl[4]).':00'; //"prints" 2014 January
                                    echo $data['date_post']
                                ?>
                            </span>
                        </p>
                        <p><?php echo str_replace('Foto: Istimewa', '', $data['content']);?></p>
                    </div>
                </div>
			</div>
            
            <?php if (count($relatedArticle > 0)) { ?>
            <div class="row px-3">
                <div class="col-12 col-sm-12 col-md-12 mt-4 bd-callout bd-callout-info">
                    <h4>Artikel terkait</h4>
                    <p>Ini adalah daftar artikel yang mungkin anda cari:</p>
                    <ul>
                        <?php 
                            foreach ($relatedArticle as $v) { 
                                $url_title = convert_accented_characters(url_title($data['title'], "dash", TRUE));
                                echo '<li><a href="'.base_url('home/detailPost/'.$url_title.'/'.$v['id']).'">'.$v['title'].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <?php } ?>
			
		</main>
	</div>
</div>
<style>
    .jssocials-share-link { border-radius: 50%; }
</style>
<?php require('template/load_javascript.php'); ?>
<!-- <script type="text/javascript" src="<?php //print base_url(); ?>asset/js/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php //print base_url(); ?>asset/js/jquery-ui.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php //print base_url(); ?>asset/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php // print base_url(); ?>asset/js/custom.min.js?<?php //print rand();?>"></script>     -->
<!-- <script type="text/javascript" src="<?php //echo base_url(); ?>asset/js/home.js?<?php //print rand();?>"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<!-- <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" /> -->
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<!-- <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" /> -->
<script type="text/javascript">
    $(function() {
        $('.linksisip')
            .prev('br')
            .remove()
            .end();
        $('.clearfix').remove();
        $('.linksisip').remove();
        $("#main-content").find("a").contents().unwrap();
        $('.detail_tag').remove();
        $('.media_artikel').remove();
        $('img').addClass('img-fluid');

        var userAgent = window.navigator.userAgent;
        if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/Android/i) || userAgent.match(/webOS/i) || userAgent.match(/Blackberry/i) ) {
            $("#share").jsSocials({
                shares: ["whatsapp", "facebook", "googleplus", "twitter"],
                showLabel: false,
                showCount: false,
                shareIn: "blank"
            });
        } else {
            $("#share").jsSocials({
                shares: ["whatsapp", "facebook", "googleplus", "twitter"],
                showLabel: false,
                showCount: true,
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
    });
</script>
<?php require('template/footer.php'); ?>
