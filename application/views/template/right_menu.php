<div class="d-none d-xl-block col-xl-2 bd-toc">
    <!-- <ul class="section-nav">
        <li class="toc-entry toc-h2"><a href="#quick-start">Quick start</a>
        <ul>
        <li class="toc-entry toc-h3"><a href="#css">CSS</a></li>
        <li class="toc-entry toc-h3"><a href="#js">JS</a></li>
        </ul>
        </li>
        <li class="toc-entry toc-h2"><a href="#starter-template">Starter template</a></li>
        <li class="toc-entry toc-h2"><a href="#important-globals">Important globals</a>
        <ul>
        <li class="toc-entry toc-h3"><a href="#html5-doctype">HTML5 doctype</a></li>
        <li class="toc-entry toc-h3"><a href="#responsive-meta-tag">Responsive meta tag</a></li>
        <li class="toc-entry toc-h3"><a href="#box-sizing">Box-sizing</a></li>
        <li class="toc-entry toc-h3"><a href="#reboot">Reboot</a></li>
        </ul>
        </li>
        <li class="toc-entry toc-h2"><a href="#community">Community</a></li>
    </ul> -->
    <!-- <div id="SC_TBlock_578100" class="SC_TBlock">loading...</div>  -->
    <?php
        $uri1 = $this->uri->segment(1);
        $uri2 = $this->uri->segment(2);
        $keyword = '';
        if ($uri1 == 'home' && $uri2 == 'brand') {
            $keyword = $this->uri->segment(3);
            $longURLBukalapak = 'https://www.bukalapak.com/c/handphone/hp-smartphone?search%5Bkeywords%5D='.$keyword.'&ho_offer_id=15&ho_trx_id=10295f93ffe559d74f92ceccb6b279&affiliate_id=7593&utm_source=hasoffers&utm_medium=affiliate&utm_campaign=15&ref=';
        } else {
            $longURLBukalapak = 'http://bukalapak.go2cloud.org/aff_c?offer_id=15&aff_id=7593';
        }
        // $longURLLazada = 'https://c.lazada.co.id/t/c.Zrq9';
        // http://bukalapak.go2cloud.org/aff_c?offer_id=15&aff_id=7593&url=https%3A%2F%2Fwww.bukalapak.com%2Fc%2Fhandphone%2Fhp-smartphone%3Fsearch%255Bkeywords%255D%3Dapple%26ho_offer_id%3D{offer_id}%26ho_trx_id%3D{transaction_id}%26affiliate_id%3D{affiliate_id}%26utm_source%3Dhasoffers%26utm_medium%3Daffiliate%26utm_campaign%3D{offer_id}%26ref%3D{referer}
        // http://bukalapak.go2cloud.org/aff_c?offer_id=15&aff_id=7593&aff_sub=iphone&url=https%3A%2F%2Fwww.bukalapak.com%2Fc%2Fhandphone%2Fhp-smartphone%3Fho_offer_id%3D{offer_id}%26ho_trx_id%3D{transaction_id}%26affiliate_id%3D{affiliate_id}%26utm_source%3Dhasoffers%26utm_medium%3Daffiliate%26utm_campaign%3D{offer_id}%26aff_sub%3D{aff_sub}%26ref%3D{referer}
        // <a href="http://bukalapak.go2cloud.org/aff_c?offer_id=15&aff_id=7593" target="_blank" title="JuaraHemat">      <img alt="JuaraHemat" src="https://s2.bukalapak.com/affiliate/offers/200X200_200_x_200_1539176713.jpg"></a>
        
        // echo '<ul class="section-nav"><li class="toc-entry toc-h2">';
        // echo '<a href="'.$longURLLazada.'" target="_blank" title="Lazada Promo"><img alt="Lazada" style="max-width:180px" class="mx-auto d-block" src="https://media.go2speed.org/brand/files/lazada/8254/ID_XiaomiA1Oct2017_300x250.jpg"></a>';
        // echo '</li>';
        // echo '<li class="toc-entry toc-h2">';
        echo '<a href="'.$longURLBukalapak.'" target="_blank" title="Bukalapak Promo"><img alt="Bukalapak" style="max-width:184px" class="mx-auto d-block" src="https://s2.bukalapak.com/affiliate/offers/200X200_200_x_200_1539176713.jpg"></a>';
        // echo '</li>';
        // echo '<a href="'.$longURLBukalapak.'" target="_blank" title="Generic Banner"><img alt="Generic Banner" class="rounded mx-auto d-block" src="https://s3.bukalapak.com/affiliate/offers/160x600_160_x_600_1532074415.jpg"></a>';
        // echo '<a href="'.$longURLBukalapak.'" target="_blank" title="Generic Banner"><img alt="Generic Banner" src="https://s2.bukalapak.com/affiliate/offers/Wide_skyscraper_160_x_600_160_x_600_1521725255.jpg"></a><img src="https://bukalapak.go2cloud.org/aff_i?offer_id=15&file_id=33&aff_id=7593" width="1" height="1" />';
    ?>
    <div id="SC_TBlock_578100" class="SC_TBlock mx-auto d-block"><img src="/asset/images/Ripple-1.5s-200px.svg" /></div> 
</div>
