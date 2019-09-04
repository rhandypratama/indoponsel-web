<?php
    date_default_timezone_set('Asia/Jakarta');
    require_once 'application/vendor/autoload.php';
    use Goutte\Client;
    use GuzzleHttp\Client as GuzzleClient;

    // $conn = new mysqli("127.0.0.1", "root", "", "slipcoding");
    $conn = new mysqli("127.0.0.1", "indp1859_indoponsel", "]reihAtjB*jS", "indp1859_indoponsel");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    function myFilter($string) {
        return strpos($string, '/en/') === false;
    }

    try {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
        ));
        $goutteClient->setClient($guzzleClient);
        
        $q = 'SELECT * FROM crawl_setting ORDER BY id ASC';
        $setting = $conn->query($q);
        foreach ($setting as $key => $set) {
            $crawler = $goutteClient->request('GET', $set['url']);
            $image_thumb = str_replace('"', '', $crawler->filter('div.makers > ul > li > a > img')->extract('src'));
            $device_name = str_replace('"', '', $crawler->filter('div.makers > ul > li > a > strong > span')->extract('_text'));
            
            // echo '<pre>'; var_dump($device_name); die;
            echo '==> BRAND '.$set['brand'].' <==<br>';
            foreach ($device_name as $k => $v) {
                // $name = $set['brand'].' '.$v;
                $name = $v;
                $filter = 'SELECT id FROM gadget WHERE DeviceName="'.$name.'" AND brand="'.$set['brand'].'" LIMIT 1';
                $resultCari = $conn->query($filter);
                $count = $resultCari->num_rows;
                if (($count) <= 0) {
                    $conn->query('INSERT INTO gadget (`DeviceName`, `brand`, `image`) VALUES ("'.$name.'", "'.$set['brand'].'", "'.$image_thumb[$k].'")'); 
                    echo 'PROSES MENYIMPAN DATA '.$v.' ...<br>';
                } else {
                    echo '=> '.$v.' (SUDAH ADA DATA DI DATABASE)<br>';
                }
            }
        }
        

        echo '======== PROSES COMPLETE ========';
    } catch (Exception $e) {
        print 'Error Bro: ' . $e->getMessage();
    }

?>