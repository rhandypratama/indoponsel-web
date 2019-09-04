<div class="popular-news">
    <div class="section-title">
        <h3> <span class="cat-icon"><i class="fa fa-bell-o"></i></span>Latest Software Updated</h3>
    </div>
    <ul class="popular-news-list">
        <?php 
            if (count($latestSoftware > 0)) {
                $style = 'display: -webkit-box; display: -ms-flexbox; display: flex;';
                foreach ($latestSoftware as $v) { 
                    $url_title = convert_accented_characters(url_title($v['title'], "dash", TRUE));
                    echo '
                        <li style="'.$style.'">
                            <img src="'.$v['image'].'" style="width:16px; height:16px; margin-right:10px;" alt="'.$v['title'].'">
                            <a href="'.base_url('downloads/detail/'.$url_title.'/'.$v['id']).'">'.$v['title'].'</a>
                        </li>';
                } 
            }
        ?>
    </ul>
</div>