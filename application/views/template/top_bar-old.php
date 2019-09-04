<div id="newedge-top-bar">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-xs-4 col-sm-3 col-md-3 hidden-sm hidden-xs">
                <a href="<?php echo base_url();?>"><img src="/asset/template/img/presets/preset1/logo.png" alt="logo"></a>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="top-right">
                    <div class="newedge-date">
                        <span><?php echo date('D, d F Y'); ?></span>
                    </div>
                    <div class="newedge-language">
                        <select class="cs-select cs-skin-border">
                            <option value="Dekstop" selected>Dekstop</option>
                            <option value="Mobile">Mobile</option>
                        </select>
                    </div>
                    <div class="newedge-search">
                        <div class="search-icon-wrapper">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="search-wrapper">
                            <form action="<?php echo base_url('downloads/resultSearch');?>" method="post">
                                <input name="searchword" maxlength="200" class="inputboxnewedge-top-search" type="text" size="20" placeholder="Search file ...">
                                <i id="search-close" class="fa fa-close"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<!-- navigation mobile version -->
<div id="mobile-nav-bar" class="mobile-nav-bar">
    <div class="container">
        <div class="row">
            <div class="visible-sm visible-xs col-sm-12">
                <div id="logo" class="mobile-logo pull-left">
                    <a href="<?php echo base_url(); ?>"><img src="/asset/template/img/presets/preset1/logo.png" alt="logo"></a>
                </div>
                <a id="offcanvas-toggler" class="pull-right" href="#"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
</div>