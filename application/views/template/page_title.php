<?php if ($this->uri->segment(2) == 'resultSearch') { ?>
    <section id="page-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-wrapper">
                    <div class="container">
                        <h2 class="pull-left title"> <span class="cat-icon">S </span> Search File</h2>
                        <ol class="breadcrumb pull-right">
                            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><?php echo ucwords($this->uri->segment(1)); ?></a></li>
                            <li>Search File</li>
                            <!-- <li class="active"><?php //echo ucwords($software[0]['title']); ?></li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else if ($this->uri->segment(1) == 'news') { ?>
    <section id="page-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-wrapper">
                    <div class="container">
                        <h2 class="pull-left title"> <span class="cat-icon">T </span> Tips & News</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else if ($this->uri->segment(1) == 'downloads' || $this->uri->segment(1) == '') { ?>
    <section id="page-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-wrapper">
                    <div class="container">
                        <h2 class="pull-left title"> <span class="cat-icon">D </span> Downloads</h2>
                        <?php if ($this->uri->segment(2) == 'categories') { ?>
                            <ol class="breadcrumb pull-right">
                                <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><?php echo ucwords($this->uri->segment(1)); ?></a></li>
                                <li>Categories</li>
                                <li class="active"><?php echo ucwords($this->uri->segment(3)); ?></li>
                            </ol>
                        <?php } ?>
                        <?php if ($this->uri->segment(2) == 'detail') { ?>
                            <ol class="breadcrumb pull-right">
                                <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><?php echo ucwords($this->uri->segment(1)); ?></a></li>
                                <li class="active"><?php echo ucwords($this->uri->segment(3)); ?></li>
                            </ol>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else if ($this->uri->segment(1) == 'topsoftware') { ?>
    <section id="page-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-wrapper">
                    <div class="container">
                        <h2 class="pull-left title"> <span class="cat-icon">T </span> The Most Popular Apps</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else if ($this->uri->segment(1) == 'advertisement') { ?>
    <section id="page-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-wrapper">
                    <div class="container">
                        <h2 class="pull-left title"> <span class="cat-icon">A </span> Advertisement</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else if ($this->uri->segment(1) == 'contactus') { ?>
    <section id="page-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-wrapper">
                    <div class="container">
                        <h2 class="pull-left title"> <span class="cat-icon">C </span> Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section id="page-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-wrapper">
                    <div class="container">
                        <h2 class="pull-left title"> <span class="cat-icon"><?php echo substr($software[0]['sub'], 0, 1); ?> </span> <?php echo $software[0]['sub']; ?></h2>
                        <ol class="breadcrumb pull-right">
                            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><?php echo ucwords($this->uri->segment(1)); ?></a></li>
                            <li><?php echo ucwords($this->uri->segment(3)); ?></li>
                            <!-- <li class="active"><?php //echo ucwords($software[0]['title']); ?></li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>