<?php
    date_default_timezone_set('Asia/Jakarta');

    // require_once 'application/vendor/autoload.php';
    // use Goutte\Client;
    // use GuzzleHttp\Client as GuzzleClient;
    $url  = 'http://www.google.com/search?q=ripple10&oq=ripple10';
    // try {
    //     $goutteClient = new Client();
    //     $guzzleClient = new GuzzleClient(array(
    //         'timeout' => 60, // second
    //     ));
    //     $goutteClient->setClient($guzzleClient);
    //     $crawler = $goutteClient->request('GET', $url);
    //     $linkTitle = $crawler->filter('.r a')->extract('href');
    //     print '<pre>';
    //     var_dump($linkTitle);


    //     echo '=== PROSES COMPLETE ===';
    // } catch (Exception $e) {
    //     print 'Error Bro: ' . $e->getMessage();
    // }

    include("simple_html_dom.php");
    // $in = "Beautiful Bangladesh";
    // $in = str_replace(' ','+',$in); // space is a +
    // $url  = 'http://www.google.com/search?hl=en&tbo=d&site=&source=hp&q='.$in.'&oq='.$in.'';

    print $url."<br>";

    $html = file_get_html($url);

    // $linkObjs = $html->find('h3.r a'); 
    $descr = $html->find('span.st');

    // foreach ($linkObjs as $linkObj) {
    //     $title = trim($linkObj->plaintext);
    //     $link  = trim($linkObj->href);

    //     // if it is not a direct link but url reference found inside it, then extract
    //     if (!preg_match('/^https?/', $link) && preg_match('/q=(.+)&amp;sa=/U', $link, $matches) && preg_match('/^https?/', $matches[1])) {
    //         $link = $matches[1];
    //     } else if (!preg_match('/^https?/', $link)) { // skip if it is not a valid link
    //         continue;
    //     }

    //     // $descr = $html->find('span.st',$i); // description is not a child element of H3 thereforce we use a counter and recheck.
    //     // $descr = $html->find('span.st'); // description is not a child element of H3 thereforce we use a counter and recheck.
    //     // $i++;
    //     $data[] = array(
    //         'title' => $title,
    //         'link' => $link
    //     );
    // }

    foreach ($descr as $linkObj) {
        $title = trim($linkObj->plaintext);
        $data[] = $title;
    }

    print '<pre>';
    var_dump($data);
?>