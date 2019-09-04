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
            'timeout' => 60,
        ));
        $goutteClient->setClient($guzzleClient);

        
        // // $crawler = $goutteClient->request('GET', 'https://inet.detik.com/games');
        // // $crawler = $goutteClient->request('GET', 'https://inet.detik.com/gadget');
        // // $crawler = $goutteClient->request('GET', 'https://inet.detik.com/tips-tricks');
        // // $category = 'Tips & Trick';
        // $crawler = $goutteClient->request('GET', 'https://inet.detik.com');
        // $category = 'News';
        
        // $url = $crawler->filter('ul.feed > li > article > a')->extract('href');
        // $image_thumb = str_replace('"', '', $crawler->filter('ul.feed > li > article > a > span > span > img')->extract('src'));
        // $sub_title = str_replace('"', '', $crawler->filter('ul.feed > li > article > a > span.sub_judul')->extract('_text'));
        
        // // echo '<pre>'; var_dump($url); die;
        // foreach ($url as $k => $v) {
        //     $crawler = $goutteClient->request('GET', $v);
        //     $div_image = $crawler->filter('div.media_artikel > img')->extract('src');
        //     if (count($div_image) > 0) {
        //         $image = str_replace('"', '', $div_image[0]);
        //         $tanggal = str_replace('"', '', trim($crawler->filter('div.jdl > span.date')->first()->text()));
        //         $judul = str_replace('"', '', trim($crawler->filter('div.jdl > h1')->first()->text()));
        //         $res = str_replace('"', '', trim($crawler->filter('div.detail_text')->first()->html()));
        //         $res = str_replace("OA_show('parallaxindetail');", "", $res);
        //         $res = str_replace("OA_show('newstag');", "", $res);
        //         $res = str_replace("OA_show('hiddenquiz');", "", $res);
        //         $author = str_replace('"', '', trim($crawler->filter('div.jdl > span.author')->first()->html()));
        //         $tag = str_replace('"', '', $crawler->filter('div.detail_tag > a')->extract('_text'));
        //         $tag = implode(';;;', $tag);
    
        //         $filter = 'SELECT id FROM posts WHERE date_post="'.$tanggal.'" AND title="'.$judul.'" AND author="'.$author.'" LIMIT 1';
        //         $resultCari = $conn->query($filter);
        //         $count = $resultCari->num_rows;
        //         if (($count) <= 0) {
        //             $conn->query('INSERT INTO posts (`image`, `category`, `image_thumb`, `date_post`, `date_crawl`, `title`, `url`, `content`, `author`, `tag`) VALUES ("'.$image.'", "'.$category.'", "'.$image_thumb[$k].'", "'.$tanggal.'", "'.date('Y-m-d H:i:s').'", "'.$judul.'", "'.$v.'", "'.$res.'", "'.$author.'", "'.$tag.'")'); 
        //             echo 'PROSES MENYIMPAN DATA ... '.$k.'<br>';
        //         } else {
        //             echo 'TIDAK ADA DATA YANG DI CRAWL<br>';
        //         }
        //     }
        // }
        // // echo '<pre>'; var_dump($image); die;
        echo '=== PROSES COMPLETE ===';
    } catch (Exception $e) {
        print 'Error Bro: ' . $e->getMessage();
    }

?>