<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
    <form id="form1" action="<?php print base_url('loker/search'); ?>" method="POST" class="bd-search d-flex align-items-center">
        <?php
            if (isset($_SESSION['indoponsel']['keyword']) && $_SESSION['indoponsel']['keyword'] != '') {
                $q = $_SESSION['indoponsel']['keyword'];
            } else {
                $q = '';
            }
            // d($q)
        ?>
        <input type="search" class="form-control" id="keyword" name="keyword" placeholder="Job Posisi / Perusahaan" value="<?php echo $q; ?>" aria-label="Search for...">
        <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg></button>
    </form>

    <nav class="collapse bd-links" id="bd-docs-nav">
        <?php 
        $segment1 = $this->uri->segment(1);
        $segment2 = $this->uri->segment(2);
        if ($segment1 == 'loker' && ($segment2 != 'detailJob' && $segment2 != 'list_job_order_by_gaji' && $segment2 != 'list_job_order_by_spesialisasi' && $segment2 != 'list_job_populer' && $segment2 != 'tips_kirim_lamaran_kerja_via_email' && $segment2 != 'tips_interview_kerja' && $segment2 != 'kontak')) {
        ?>
        <div class="bd-toc-item active">
            
            <a class="bd-toc-link float-left d-inline pl-md-3 pr-md-2 px-3 py-2" href="#">Filter Pencarian</a>
            <a class="bd-toc-link float-right d-inline pl-md-2 pr-md-3 px-3 py-2 text-info" href="#" id="btn-clear-filter"><small>Clear Filter</small></a>
            
            <ul class="nav bd-sidenav" style="padding: 0.8rem 15px;">
                <li class="pb-2">
                    <select class="select-propinsi" id="propinsi" name="propinsi[]" class="form-control" multiple="multiple">
                        <?php 
                            foreach ($propinsi as $key => $v) { 
                                echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                            } 
                        ?>
                    </select>
                </li>
                <li class="pb-2">
                    <select class="select-spesialisasi" id="spesialisasi" name="spesialisasi[]" class="form-control" multiple="multiple">
                        <?php
                            if (isset($_SESSION['indoponsel']['subSpesialisasiId']) && $_SESSION['indoponsel']['subSpesialisasiId'] != '') {
                                $sub_sp_id = $_SESSION['indoponsel']['subSpesialisasiId'];
                            } else {
                                $sub_sp_id = '';
                            }
                        
                            $kategori = '';
                            foreach ($spesialisasi as $key => $v) {
                                if ($kategori != $v['spesialisasi_id']) {
                                    echo '<optgroup label="'.$v['kategori'].'">';
                                    if ($v['id'] == $sub_sp_id) {
                                        echo '<option value="'.$v['id'].'" selected>'.trim($v['nama']).'</option>';
                                    } else {
                                        echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                    }
                                    if ($kategori != '' && $kategori == $v['spesialisasi_id']) echo '</optgroup>';
                                } else {
                                    if ($v['id'] == $sub_sp_id) {
                                        echo '<option value="'.$v['id'].'" selected>'.trim($v['nama']).'</option>';
                                    } else {
                                        echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                    }
                                    // echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                }
                                $kategori = $v['spesialisasi_id'];
                            }
                        ?>
                    </select>
                </li>
                <li class="pb-2">
                    <input type="number" id="gaji_minimum" class="form-control" style="font-size:.8rem" placeholder="Gaji minimum (IDR)"/>
                </li>
                <li class="">
                    <button type="button" id="btn-cari-lowongan" class="btn btn-info btn-block">Cari Lowongan</button>
                </li>
            </ul>
        </div>
        <hr>
        <?php } ?>

        <div class="bd-toc-item active">
            <a class="bd-toc-link" href="<?php echo base_url('loker');?>">Telusuri Pekerjaan</a>
            <ul class="nav bd-sidenav">
                <li class=""><a href="<?php echo base_url('loker/list_job_order_by_gaji') ?>">Gaji terbesar</a></li>
                <li class=""><a href="<?php echo base_url('loker/list_job_order_by_spesialisasi') ?>">Spesialisasi</a></li>
                <li class=""><a href="<?php echo base_url('loker/list_job_populer') ?>">Paling diminati</a></li>
            </ul>
        </div>

        <div class="bd-toc-item active">
            <a class="bd-toc-link" href="#">Tips</a>
            <ul class="nav bd-sidenav">
                <li class=""><a href="<?php echo base_url('loker/tips_kirim_lamaran_kerja_via_email') ?>">Kirim lamaran via email</a></li>
                <li class=""><a href="<?php echo base_url('loker/tips_interview_kerja') ?>">Interview kerja</a></li>
            </ul>
        </div>
        
        <div class="bd-toc-item active">
            <a class="bd-toc-link" href="#">Bantuan</a>
            <ul class="nav bd-sidenav">
                <li class=""><a href="#" data-target="#exampleModalCenter" data-toggle="modal">Job Alert</a></li>
                <li class=""><a href="<?php echo base_url('loker/kontak') ?>">Hubungi kami</a></li>
            </ul>
        </div>
    </nav>

</div>

<!-- Modal Subscribe -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-danger text-light px-3 py-3">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3>Bingung mencari lowongan pekerjaan yang tepat buat anda?</h3>
                <p><small>kami akan membantu menemukan pekerjaan yang sesuai dengan keahlian anda dan tentunya kami prioritaskan dengan pekerjaan yang menawarkan gaji yang paling tinggi.
                </small></p>
                <hr style="border-color:rgba(255, 255, 255, 0.45) !important">
                <div id="alert-subscribe"></div>
                <p>
                <form id="subscribeForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><small>Lokasi</small></label>
                            <select class="select-propinsi-modal" id="propinsi-modal" name="propinsi-modal[]" class="form-control" multiple="multiple">
                                <?php 
                                    foreach ($propinsi as $key => $v) { 
                                        echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                    } 
                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label><small>Spesialisasi</small></label>
                            <select class="select-spesialisasi-modal" id="spesialisasi-modal" name="spesialisasi-modal[]" class="form-control" multiple="multiple">
                                <?php
                                    if (isset($_SESSION['indoponsel']['subSpesialisasiId']) && $_SESSION['indoponsel']['subSpesialisasiId'] != '') {
                                        $sub_sp_id = $_SESSION['indoponsel']['subSpesialisasiId'];
                                    } else {
                                        $sub_sp_id = '';
                                    }
                                    
                                    $kategori = '';
                                    foreach ($spesialisasi as $key => $v) {
                                        if ($kategori != $v['spesialisasi_id']) {
                                            echo '<optgroup label="'.$v['kategori'].'">';
                                            if ($v['id'] == $sub_sp_id) {
                                                echo '<option value="'.$v['id'].'" selected>'.trim($v['nama']).'</option>';
                                            } else {
                                                echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                            }
                                            if ($kategori != '' && $kategori == $v['spesialisasi_id']) echo '</optgroup>';
                                        } else {
                                            if ($v['id'] == $sub_sp_id) {
                                                echo '<option value="'.$v['id'].'" selected>'.trim($v['nama']).'</option>';
                                            } else {
                                                echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                            }
                                            // echo '<option value="'.$v['id'].'">'.trim($v['nama']).'</option>';
                                        }
                                        $kategori = $v['spesialisasi_id'];
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <label for="inputAddress"><small>Email *</small></label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email-modal">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="button" id="btn-subscribe">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>