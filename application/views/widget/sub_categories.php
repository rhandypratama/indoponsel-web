<div class="popular-news mtt30">
    <div class="section-title">
        <h3> <span class="cat-icon"><i class="fa fa-folder-open"></i></span>Explore Brands</h3>
    </div>
    <ul class="popular-news-list" style="padding-left:2px;">
        <?php 
            if (count($dataBrand > 0)) {
                foreach ($dataBrand as $v) {
                    if($v['Brand'] != null) {
                        // $url_title = convert_accented_characters(url_title($v['Brand'], "dash", TRUE)); 
                        // print '<a href="'.base_url().'home/brand/'.trim($v['Brand']).'">'.$v['Brand'].'</a>';
                        echo '<li style="padding-bottom:0px;">
                        <i class="fa fa-arrow-right" style="padding-right:6px;"></i>
                        <a style="display:inline !important" href="'.base_url('home/brand/'.$url_title).'">'.$v['Brand'].'</a>
                        </li>';
                    }
                } 
            }
        ?>
    </ul>
</div>