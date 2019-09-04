<!--Footer-->
<section>
    <!-- FOOTER: COPY RIGHTS -->
    <div class="fcopy">
        <!-- <div class="lp copy-ri row"> -->
            <!-- <div class="col-md-6 col-sm-12 col-xs-12">Copyright © 2018 IndoPonsel. All Right Reserved</div> -->
            <!--div class="col-md-6 foot-privacy">
                <ul>
                    <li>slipcoding@gmail.com</li>
                    <li><a href="<?php //print base_url();?>">Terms of use</a></li>
                    <li><a href="<?php //print base_url();?>">Security</a></li>
                    <li><a href="<?php //print base_url();?>">Policy</a></li>
                </ul>
            </div-->
        <!-- </div> -->
    </div>
</section>
    <!-- Google Analytics -->
    <?php //if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
        <script>
            // your analytics code here
            // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            //     (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            //     m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            // })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            // ga('create', 'UA-97173850-1', 'auto');
            // ga('send', 'pageview');
        </script>
    <?php //endif; ?>

    <!--== Bootstrap & Latest JS ==-->

    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/custom.min.js?<?php print rand();?>"></script>    
    <!-- <script type="text/javascript" src="<?php //print base_url(); ?>asset/js/home.min.js?<?php //print rand();?>"></script> -->
    <script type="text/javascript" src="<?php print base_url(); ?>asset/js/home.js?<?php print rand();?>"></script>
    </body>
</html>