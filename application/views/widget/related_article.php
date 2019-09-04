<div class="popular-news mtt30">
    <div class="section-title">
        <h3> <span class="cat-icon"><i class="fa fa-folder-open"></i></span>Related Feeds</h3>
    </div>
    <ul class="popular-news-list" style="padding-left:2px;">
        <?php 
            if (count($related > 0)) {
                foreach ($related as $v) {
                    $url_title = convert_accented_characters(url_title($v['title'], "dash", TRUE)); 
                    echo '<li style="padding-bottom:12px;">
                    <!--i class="fa fa-arrow-right" style="padding-right:6px;"></i-->
                    <a style="display:inline !important; font-size:14px; font-weight:600;" href="'.base_url('news/detail/'.$url_title.'/'.$v['id']).'">'.$v['title'].'</a>
                    </li>';
                } 
            }
        ?>
    </ul>
</div>