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
    
    function filterData($tanggal, $judul, $author) {
        try {
            global $conn;
            $filter = 'SELECT id FROM artikel WHERE date_post="'.$tanggal.'" AND title="'.$judul.'" AND author="'.$author.'" LIMIT 1';
            $resultCari = $conn->query($filter);
            $count = $resultCari->num_rows;
            if ($count <= 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Error Filter Data: ' . $e->getMessage();
        }
    }

    try {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array('timeout' => 60));
        $goutteClient->setClient($guzzleClient);

        // $crawler = $goutteClient->request('GET', 'https://inet.detik.com/games');
        // $crawler = $goutteClient->request('GET', 'https://inet.detik.com/gadget');
        // $crawler = $goutteClient->request('GET', 'https://inet.detik.com/tips-tricks');
        // $category = 'Tips & Trick';
        $crawler = $goutteClient->request('GET', 'https://inet.detik.com/gadget');
        $category = 'News';
        
        $url = $crawler->filter('ul.feed > li > article > a')->extract('href');
        $image_thumb = str_replace('"', '', $crawler->filter('ul.feed > li > article > a > span > span > img')->extract('src'));
        // $sub_title = str_replace('"', '', $crawler->filter('ul.feed > li > article > a > span.sub_judul')->extract('_text'));
        
        // echo '<pre>'; var_dump($url); die;
        foreach ($url as $k => $v) {
            $deepCrawler = $goutteClient->request('GET', $v);
            $div_image = $deepCrawler->filter('div.media_artikel > img')->extract('src');
            if (count($div_image) > 0) {
                $image = str_replace('"', '', $div_image[0]);
                $tanggal = str_replace('"', '', trim($deepCrawler->filter('span.date')->text()));
                $array_tgl = explode(' ', $tanggal);
                if ($array_tgl[2] == 'Mei') $array_tgl[2] = 'May'; 
                if ($array_tgl[2] == 'Agu') $array_tgl[2] = 'Aug'; 
                if ($array_tgl[2] == 'Okt') $array_tgl[2] = 'Oct'; 
                if ($array_tgl[2] == 'Des') $array_tgl[2] = 'Dec'; 
                $str_tgl = trim($array_tgl[1]).'-'.trim($array_tgl[2]).'-'.trim($array_tgl[3]);
                $date = date_create_from_format('d-M-Y', $str_tgl);
                // var_dump($date); die;
                $tgl_posting = date_format($date, 'Y-m-d').' '.trim($array_tgl[4]).':00';

                $judul = str_replace('"', '', trim($deepCrawler->filter('div.jdl > h1')->text()));
                $res = str_replace('"', '', trim($deepCrawler->filter('div.detail_text')->html()));
                $res = str_replace("OA_show('parallaxindetail');", "", $res);
                $res = str_replace("OA_show('newstag');", "", $res);
                $res = str_replace("OA_show('hiddenquiz');", "", $res);
                $author = str_replace('"', '', trim($deepCrawler->filter('span.author')->text()));
                $tag = str_replace('"', '', $deepCrawler->filter('div.detail_tag > a')->extract('_text'));
                $tag = implode(';;;', $tag);
                // print '<pre>'; print_r($tag);
                $filter = filterData($tanggal, $judul, $author);
                if ($filter) {
                    $conn->query('INSERT INTO artikel (`image`, `category`, `image_thumb`, `date_post`, `date_post_ori`, `date_crawl`, `title`, `url`, `content`, `author`, `tag`) VALUES ("'.$image.'", "'.$category.'", "'.$image_thumb[$k].'", "'.$tanggal.'" , "'.$tgl_posting.'", "'.date('Y-m-d H:i:s').'", "'.$judul.'", "'.$v.'", "'.$res.'", "'.$author.'", "'.$tag.'")'); 
                    echo 'PROSES MENYIMPAN DATA ... '.$judul.'<br>';
                } else {
                    echo 'TIDAK ADA DATA YANG DI CRAWL<br>';
                }
            }
        }
        echo '=== PROSES COMPLETE ===';
    } catch (Exception $e) {
        print 'Error Bro: ' . $e->getMessage();
    }
    $conn->close();
?>