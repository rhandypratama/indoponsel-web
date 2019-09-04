<div class="popular-news">
    <div class="section-title">
        <h3> <span class="cat-icon"><i class="fa fa-download"></i></span>Gadget Terpopuler</h3>
    </div>
    <ul class="popular-news-list">
        <?php 
            if (count($popularDevice > 0)) {
                $style = 'display: -webkit-box; display: -ms-flexbox; display: flex;';
                foreach ($popularDevice as $v) { 
                    $url_title = convert_accented_characters(url_title($v['DeviceName'], "dash", TRUE));
                    echo '
                        <li style="'.$style.'">
                            <img src="'.$v['image'].'" style="width:16px; height:16px; margin-right:10px;" alt="'.$v['DeviceName'].'">
                            <a href="'.base_url('downloads/detail/'.$url_title.'/'.$v['id']).'">'.$v['DeviceName'].'</a>
                        </li>';
                } 
            }
        ?>
    </ul>
</div>