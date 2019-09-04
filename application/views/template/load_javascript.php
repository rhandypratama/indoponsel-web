<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script>window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->

<script type="text/javascript" src="/asset/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/asset/js/jquery-ui.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<!-- <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script><script src="https://getbootstrap.com/docs/4.1/assets/js/docs.min.js"></script> -->
<?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/home.js?<?php echo rand();?>"></script>
<?php } ?>
<!-- Google Analytics -->
<?php //if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
<!-- <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-116535621-1', 'auto');
    ga('send', 'pageview');
</script> -->
<?php //endif; ?>
<!-- End Google Analytics -->

<script type="text/javascript">
    (sc_adv_out = window.sc_adv_out || []).push({
        id : "578100",
        domain : "n.ads3-adnow.com"
    });

    // Function called if AdBlock is not detected
    function adBlockNotDetected() {
        // alert('Adblock disabled');
    }
    // Function called if AdBlock is detected
    function adBlockDetected() {
        alert('Our website is made possible by displaying online advertisements. Please consider supporting us by disabling your AdBlocker.');
        location.reload();
        return false;
    }

    // We look at whether FuckAdBlock already exists.
    if(typeof fuckAdBlock !== 'undefined' || typeof FuckAdBlock !== 'undefined') {
        // If this is the case, it means that something tries to usurp are identity
        // So, considering that it is a detection
        setTimeout(() => {
			adBlockDetected();
		}, 1000 * 4);
    } else {
        // Otherwise, you import the script FuckAdBlock
        var importFAB = document.createElement('script');
        importFAB.onload = function() {
            // If all goes well, we configure FuckAdBlock
            fuckAdBlock.onDetected(adBlockDetected)
            fuckAdBlock.onNotDetected(adBlockNotDetected);
        };
        importFAB.onerror = function() {
            // If the script does not load (blocked, integrity error, ...)
            // Then a detection is triggered
            setTimeout(() => {
                adBlockDetected();
            }, 1000 * 4);
        };
        importFAB.integrity = 'sha256-xjwKUY/NgkPjZZBOtOxRYtK20GaqTwUCf7WYCJ1z69w=';
        importFAB.crossOrigin = 'anonymous';
        importFAB.src = 'https://cdnjs.cloudflare.com/ajax/libs/fuckadblock/3.2.1/fuckadblock.min.js';
        document.head.appendChild(importFAB);
    }
</script>
<script type="text/javascript" src="//st-n.ads3-adnow.com/js/a.js"></script>