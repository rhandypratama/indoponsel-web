<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
    <form id="form1" action="<?php print base_url('home/search'); ?>" method="POST" class="bd-search d-flex align-items-center">
        <!-- <input type="search" class="form-control" id="search-input" placeholder="Search..." aria-label="Search for..." autocomplete="off" data-siteurl="https://getbootstrap.com" data-docs-version="4.1"> -->
            <select id="cari_brand" class="d-none">
                <option value="">- Pilih Brand -</option>
            </select>
            <input type="search" id="searchPhone" name="q" class="form-control autocomplete" placeholder="Search gadget ..." aria-label="Search for...">
        <!-- <input type="text" id="searchPhone" name="q" placeholder="Nama Ponsel"> -->
        <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg></button>
    </form>

    <nav class="collapse bd-links" id="bd-docs-nav">
        <div class="bd-toc-item active">
            <!-- <ul class="nav bd-sidenav flex-row ml-md-auto d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Explore Brand</a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="bd-versions"> -->
                        <?php 
                            // foreach ($dataBrand as $key => $v) { 
                            //     if($v['Brand'] != null) {
                            //         echo '<a href="'.base_url().'home/brand/'.trim($v['Brand']).'" class="dropdown-item" href="#">'.$v['Brand'].'</a>';
                            //     }
                            // } 
                        ?>
                    <!-- </div>
                </li>
            </ul> -->

            <!-- <div class="dropdown bd-toc-link">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Explore Brand</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
                    <?php 
                        // foreach ($dataBrand as $key => $v) { 
                        //     if($v['Brand'] != null) {
                        //         // print '<a href="'.base_url().'home/brand/'.trim($v['Brand']).'">'.$v['Brand'].'</a>';
                        //         echo '<a href="'.base_url().'home/brand/'.trim($v['Brand']).'" class="dropdown-item" href="#">'.$v['Brand'].'</a>';
                        //     }
                        // } 
                    ?>
                <!-- </div>
            </div> -->
            
            <a class="bd-toc-link" href="#">Explore Brand</a>
            <ul class="nav bd-sidenav">
                <?php 
                    foreach ($dataBrand as $key => $v) { 
                        if($v['Brand'] != null) {
                            echo '<li><a href="'.base_url().'home/brand/'.trim($v['Brand']).'">'.$v['Brand'].'</a></li>';
                        }
                    } 
                ?>
            </ul>
        </div>

        <div class="bd-toc-item active d-none d-md-block d-lg-block d-xl-block">        
            <a class="bd-toc-link" href="#">Gadget Terpopuler</a>
            <ul class="nav bd-sidenav list-unstyled">
                <?php 
                    if (count($popularDevice > 0)) {
                        // $style = 'display: -webkit-box; display: -ms-flexbox; display: flex;';
                        foreach ($popularDevice as $v) { 
                            $url_title = convert_accented_characters(url_title($v['DeviceName'], "dash", TRUE));
                            echo '<li class="media">';

                            $external_link = $v['image'];
                            $arrLink = explode('/', $external_link);
                            $imgName = isset($arrLink[5]) ? trim($arrLink[5]) : '1.jpg';
                            $img = '/asset/images/cdn2/'.$imgName;
                            // if (@getimagesize($external_link)) {
                            // if (@getimagesize('/home/indp1859/public_html'.$img)) {
                            if (file_exists('/home/indp1859/public_html'.$img)) {
                                echo '<img class="img-thumbnail mr-2 ml-4 mt-2" src="'.$img.'" alt="'.$v['DeviceName'].' | '.$this->config->item("web_title").'" style="height: 32px; width: 32px; display: block;">';
							} else {
                                echo '<img class="img-thumbnail mr-2 ml-4 mt-2" data-src="holder.js/60px180/" alt="No Image" style="height: 32px; width: 32px; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655f662a64%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655f662a64%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">';
							}

                            // $external_link = $v['image'];
                            // if (@getimagesize($external_link)) {
                            //     echo '<img class="img-thumbnail mr-2 ml-4 mt-2" src="'.$v['image'].'" alt="'.$v['DeviceName'].'" style="height: 32px; width: 32px; display: block;">';
                            // } else {
                            //     echo '<img class="img-thumbnail mr-2 ml-4 mt-2" data-src="holder.js/100px180/" alt="No Image" style="height: 32px; width: 32px; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655f662a64%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655f662a64%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">';
                            // }
                            // <img alt="'.$v['DeviceName'].'" class="img-thumbnail mr-2 ml-4 mt-2" src="'.$v['image'].'" style="width: 32px; height: 32px;">
                            echo '<div class="media-body mt-2"><small><a class="text-secondary" href="'.base_url('home/detail/'.$url_title.'/'.$v['id']).'">'.$v['DeviceName'].'</a></small></div>
                            </li>';
                            // <img alt="'.$v['DeviceName'].'" class="mr-3 ml-4 mt-2" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655c18ea66%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655c18ea66%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.84375%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                            // echo '
                            //     <li style="'.$style.'">
                            //         <img src="'.$v['image'].'" style="width:16px; height:16px; margin-right:10px;" alt="'.$v['DeviceName'].'">
                            //         <a href="'.base_url('downloads/detail/'.$url_title.'/'.$v['id']).'">'.$v['DeviceName'].'</a>
                            //     </li>';
                        } 
                    }
                ?>
            </ul>
        </div>
    </nav>

</div>