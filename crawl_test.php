<?php
    date_default_timezone_set('Asia/Jakarta');
    require_once 'application/vendor/autoload.php';
    use Goutte\Client;
    use GuzzleHttp\Client as GuzzleClient;

    $conn = new mysqli("127.0.0.1", "root", "", "slipcoding");
    // $conn = new mysqli("127.0.0.1", "copw6463_copypastefile", "%oJb4e!L{K[D", "copw6463_copypastefile");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    try {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60, // second
        ));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.jobstreet.co.id/id/job-search/job-vacancy.php?area=1&option=1&job-source=1%2C64&classified=0&job-posted=0&src=46&pg=1&sort=1&order=0&srcr=46&ojs=9');
        
        $url = $crawler->filter('div.position-title > a.position-title-link')->extract('href');
        // echo count($url) . '<pre>'; var_dump($url); die;
        $x = 0;
        foreach ($url as $k => $v) {
            if (strlen($v) > 40) {
                $x++;

                $html = file_get_contents($v);
                $dom = new DOMDocument();
                libxml_use_internal_errors(TRUE);
                if(!empty($html)) {
                    $dom->loadHTML($html);
                    libxml_clear_errors();
                    $html_xpath = new DOMXPath($dom);
                    $html_list = array();
                    $html_and_type = $html_xpath->query('//body//script[not(@src)][@type="text/javascript"]'); 
                    // echo '<pre>'.$x.'. '; var_dump(($html_and_type));
                    if($html_and_type->length > 0){	
                        foreach ($html_and_type as $k => $tag) {
                            // echo '<pre>'; var_dump($tag);
                            if (($tag->nodeValue) != NULL || ($tag->nodeValue) != '') $moveme[$k] = $tag->nodeValue;
                        }

                        $moe = substr($moveme[2], strrpos($moveme[2], 'window.omniture_settings.contextData = ') + 39);
                        $moe = substr($moe, 0, strrpos($moe, '};') + 1);
                        $moe = json_decode($moe, true);
                        $spesialisasiId[$v] = $moe["JobAd.JobFunc"];
                        $locId[] = $moe["JobAd.Loc"];
                        $salary[] = $moe["JobAd.Salary"];
                        if ($spesialisasiId == NULL) {
                            $moe = substr($moveme[3], strrpos($moveme[3], 'window.omniture_settings.contextData = ') + 39);
                            $moe = substr($moe, 0, strrpos($moe, '};') + 1);
                            $moe = json_decode($moe, true);
                            $spesialisasiId[$v] = $moe["JobAd.JobFunc"];
                            $locId[] = $moe["JobAd.Loc"];
                            $salary[] = $moe["JobAd.Salary"];
                        }
                    }
                } else {
                    $spesialisasiId = '';
                    $locId = '';
                    $salary = '';
                }
                
                
            }
        }
        echo '<pre>'; var_dump($spesialisasiId); die;

        echo '=== PROSES COMPLETE ===';
    } catch (Exception $e) {
        print 'Error Bro: ' . $e->getMessage();
    }

?>