<nav id="navigation-bar" class="navigation hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-inline megamenu-parent">
                    <?php
                    $uri1 = $this->uri->segment(1); 
                    if ($uri1 == '' || $uri1 == 'downloads') {
                        echo '<li class="active"><a href="'.base_url().'">Downloads</a></li>
                        <li><a href="'.base_url('news').'">Tips & News</a></li>
                        <li><a href="'.base_url('topsoftware').'">The Most Popular Apps</a></li>
                        <li><a href="'.base_url('advertisement').'">Advertisement</a></li>
                        <li><a href="'.base_url('contactus').'">Contact Us</a></li>';
                    } else if ($uri1 == 'topsoftware') {
                        echo '<li><a href="'.base_url().'">Downloads</a></li>
                        <li><a href="'.base_url('news').'">Tips & News</a></li>
                        <li class="active"><a href="'.base_url('topsoftware').'">The Most Popular Apps</a></li>
                        <li><a href="'.base_url('advertisement').'">Advertisement</a></li>
                        <li><a href="'.base_url('contactus').'">Contact Us</a></li>';
                    } else if ($uri1 == 'news') {
                        echo '<li><a href="'.base_url().'">Downloads</a></li>
                        <li class="active"><a href="'.base_url('news').'">Tips & News</a></li>
                        <li><a href="'.base_url('topsoftware').'">The Most Popular Apps</a></li>
                        <li><a href="'.base_url('advertisement').'">Advertisement</a></li>
                        <li><a href="'.base_url('contactus').'">Contact Us</a></li>';
                    } else if ($uri1 == 'advertisement') {
                        echo '<li><a href="'.base_url().'">Downloads</a></li>
                        <li><a href="'.base_url('news').'">Tips & News</a></li>
                        <li><a href="'.base_url('topsoftware').'">The Most Popular Apps</a></li>
                        <li class="active"><a href="'.base_url('advertisement').'">Advertisement</a></li>
                        <li><a href="'.base_url('contactus').'">Contact Us</a></li>';
                    } else if ($uri1 == 'contactus') {
                        echo '<li><a href="'.base_url().'">Downloads</a></li>
                        <li><a href="'.base_url('news').'">Tips & News</a></li>
                        <li><a href="'.base_url('topsoftware').'">The Most Popular Apps</a></li>
                        <li><a href="'.base_url('advertisement').'">Advertisement</a></li>
                        <li class="active"><a href="'.base_url('contactus').'">Contact Us</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>