<!-- SEARCH BOX -->
<section>
    <div class="hom-search lp" style="padding-top:30px; background: #27313a;">
        <div class="row">
            <div class="hom-search-inn">
                <form id="form1" action="<?php print base_url('home/search'); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-3 col-sm-6" style="padding:10px 15px;">
                            <!-- <select style="background-color: #efeaea; border: 1px solid #fff; height:39px; -webkit-appearance: inherit; padding:.4375pc .9375pc"> -->
                            <select id="cari_brand" style="font-size: initial; background-color: #fff; border: 1px solid #fff; height:39px; padding:.4375pc .9375pc;">
                                <option value="">- Pilih Brand -</option>
                                <?php 
                                foreach ($dataBrand as $key => $v) { 
                                    if($v['Brand'] != null) {
                                        echo '<option value="'.trim($v['Brand']).'">'.trim($v['Brand']).'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-9 col-sm-6">
                            <ul>
                                <!-- <li style="width:40%">
                                    <select style="background-color: #efeaea; border: 1px solid #fff; height:39px; -webkit-appearance: inherit; padding:.4375pc .9375pc">
                                        <option value="">- Pilih Brand -</option>
                                        <?php 
                                        // foreach ($dataBrand as $key => $v) { 
                                        //     if($v['Brand'] != null) {
                                        //         echo '<option value="'.trim($v['Brand']).'">'.trim($v['Brand']).'</option>';
                                            // }
                                        // }
                                        ?>
                                    </select>
                                </li> -->
                                <li>
                                    <input type="text" id="searchPhone" name="q" placeholder="Nama Ponsel">
                                </li>
                                <li>
                                    <input type="submit" id="btnSearch" value="CARI">
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>