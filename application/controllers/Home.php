<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model(array('homes'));
		$this->load->helper(array('url'));

		session_start();
	}

	public function get_current_page_phone_search_null($start, $limit) {
		if ($start == 0) {
			$this->db->limit($limit);	
		} else {
			$offset = ($start - 1) * $limit;
			$this->db->limit($limit, $offset);
		}
        $query = $this->db
            ->select('a.id, a.DeviceName, a.viewed, a.image, a.announced, a.status')
			->from('gadget a')
			->order_by('a.viewed', 'DESC')
            ->get();
    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function get_current_page_phone_search($cari='', $start, $limit) {
		if ($start == 0) {
			$this->db->limit($limit);	
		} else {
			$offset = ($start - 1) * $limit;
			$this->db->limit($limit, $offset);
		}
        $query = $this->db
            ->select('a.id, a.announced, a.status, a.DeviceName, a.image')
			->from('gadget a')
			->like("a.DeviceName", $cari)
            ->order_by('a.viewed', 'DESC')
            ->get();
    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function get_current_page_phone($brand, $start, $limit) {
		if ($start == 0) {
			$this->db->limit($limit);	
		} else {
			$offset = ($start - 1) * $limit;
			$this->db->limit($limit, $offset);
		}
        $query = $this->db
            ->select('a.id, a.announced, a.status, a.DeviceName, a.image')
            ->from('gadget a')
            ->where('a.Brand', $brand)
            ->order_by('a.id', 'DESC')
            ->order_by('a.DeviceName', 'ASC')
            ->get();
    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	
	public function get_total_phone_search_null() {
        $query = $this->db->query('SELECT count(a.id) as total FROM gadget a');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row;
            }
        } else {
            return array('total' => 0);
        }
	}

	public function get_total_phone_search($cari='') {
        $query = $this->db->query('SELECT count(a.id) as total 
            FROM gadget a 
            WHERE a.DeviceName LIKE "%'.$cari.'%"');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row;
            }
        } else {
            return array('total' => 0);
        }
	}

	public function get_total_phone_by_category($brand) {
        $query = $this->db->query('SELECT count(a.id) as total 
            FROM gadget a 
            WHERE a.Brand="'.$brand.'"');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row;
            }
        } else {
            return array('total' => 0);
        }
	}

	// public function getNewsFeed() {
	// 	$data['news_feed'] = $this->homes->getPost('', '20');
	// 	foreach ($data['news_feed'] as $key => $v) {
	// 		$url_title = convert_accented_characters(url_title($v['title'], "dash", TRUE));
	// 		$external_link = $v['main_image'];
	// 		$imgK = substr(strrchr($external_link, "/"), 1);
	// 		$imgF = (!is_null(substr($imgK, 0, strpos($imgK, '?')))) ? substr($imgK, 0, strpos($imgK, '?')) : '1.jpg';
	// 		// if ($imgF == null || trim($imgF == '')) {
	// 		// 	// $varIMG = '<img class="card-img-top" src="'.$v['main_image'].'" alt="'.$v['title'].' | '.$this->config->item("web_title").'" style="height: 200px; width: 100%; display: block;">';
	// 		// 	$varIMG = '<img class="img-thumbnail img-responsive" data-src="holder.js/100px180/" alt="No Image" style="width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655f662a64%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655f662a64%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">';
	// 		// } else {
	// 			$img = '/asset/images/post/'.$imgF;
	// 			// d($img);
	// 			if (@getimagesize('/home/indp1859/public_html'.$img)) {
	// 			// if (file_exists('/home/indp1859/public_html'.$img)) {
	// 				$varIMG = '<img class="card-img-top" src="'.$img.'" alt="'.$v['title'].' | '.$this->config->item("web_title").'" style="height: 200px; width: 100%; display: block;">';
	// 			} else { 
	// 				$varIMG = '<img class="card-img-top" src="'.$v['main_image'].'" alt="'.$v['title'].' | '.$this->config->item("web_title").'" style="height: 200px; width: 100%; display: block;">';
	// 			}
	// 		// }
	// 		$feed[] = '<div class="card">'.$varIMG.'
	// 			<div class="card-body">
	// 				<h6 class="card-title">'.$v['title'].'</h6>
	// 				<p class="card-text"><small class="text-muted"><i class="fa fa-clock-o"></i> '.time_elapsed_string(date('M. d, Y', strtotime($v['published']))).'</small></p>
	// 				<p class="card-text"><small>'.limit_text($v['text'], 20).'</small></p>
	// 				<a href="'.base_url().'home/detailPost/'.$url_title.'/'.trim($v['id']).'" class="btn btn-primary"><small>Baca Selengkapnya</small></a>
	// 			</div>
	// 		</div>';
	// 	}
	// 	$this->output
    //     	->set_content_type('application/json')
    //     	->set_output(json_encode($feed));
	// }

	public function getNewsFeed() {
		$data['news_feed'] = $this->homes->getPost('', '30');
		foreach ($data['news_feed'] as $key => $v) {
			$url_title = convert_accented_characters(url_title($v['title'], "dash", TRUE));
			$img = $v['image_thumb'];
			$varIMG = '<img class="card-img-top" src="'.getImageLogo($img).'" alt="'.$v['title'].' | '.$this->config->item("web_title").'" style="height: 200px; width: 100%; display: block;">';
			$content = limit_text(trim(strip_tags($v['content'])), 30);
			$content = substr($content, strrpos($content, ' - ') + 3);
			// $content = substr($content, 0, strpos($content, ' - '));

			$feed[] = '<div class="card">'.$varIMG.'
				<div class="card-body">
					<h6 class="card-title">'.$v['title'].'</h6>
					<p class="card-text"><small class="text-muted"><i class="fa fa-clock-o"></i> '.$v['date_post'].'</small></p>
					<p class="card-text" style="font-size:.85rem;">'.$content.'</p>
					<a href="'.base_url().'home/detailPost/'.$url_title.'/'.trim($v['id']).'" class="btn btn-info"><small>Baca Selengkapnya</small></a>
				</div>
			</div>';
		}
		$this->output
        	->set_content_type('application/json')
        	->set_output(json_encode($feed));
	}

	public function index() {
		unset($_SESSION['indoponsel']['sort']);
		unset($_SESSION['indoponsel']['order']);
		unset($_SESSION['indoponsel']['keyword']);
		unset($_SESSION['indoponsel']['subSpesialisasiId']);

		$data['subTitle'] = 'IndoPonsel - Berita terbaru tentang dunia teknologi';
		$data['dataBrand'] = $this->homes->getAllBrand();
		// $data['topViewed'] = $this->homes->getTopViewed(10);

		// $data['randomPost'] = $this->homes->getPostRandom('', '3');
		// $data['news_feed'] = $this->homes->getPost('', '20');
		// $data['relatedArticle'] = $this->homes->getPostRandom('', '10');
		//$data['headline_news'] = $this->homes->getHeadlineNews('android', '20');
		//print '<pre>'; print_r($data['dataBrand']); die;
		$data['popularDevice'] = $this->homes->getPopularDevice();
		$this->load->view('home', $data);
	}
	function autocompletePhone() {
		$q = trim($this->input->get("searchText"));
		$max = trim($this->input->get("maxResults"));
		$brand = trim($this->input->get("brand"));
		// die($brand);
		if (is_null($brand) || $brand == '') {
			$sql = $this->db->query("SELECT id,DeviceName,image FROM gadget WHERE DeviceName LIKE '%".$q."%' LIMIT $max");
		} else {
			$sql = $this->db->query("SELECT id,DeviceName,image FROM gadget WHERE Brand='".$brand."' AND DeviceName LIKE '%".$q."%' LIMIT $max");
		}
		die(json_encode($sql->result_array()));
	}

	function crawlBukalapak($q) {
		$host = 'https://www.bukalapak.com';
        $search_pattern = 'https://www.bukalapak.com/omniscience/v2?user=f8a18227c94cd649709e4a871487de11&word='.$q.'&key=25c3f808da5affd86ec8009613718042';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$search_pattern);
        $result=curl_exec($ch);
        curl_close($ch);
        $arrProd = json_decode($result, true);
        $arrTotal = count($arrProd['product']);
        for($i = 0; $i < $arrTotal; $i++) {
            $arrProd['product'][$i]['main_url'] = $host;
        }
        $d['result_bukalapak'] = $arrProd['product'];
        $d['result_bukalapak'] = $arrProd['product'];
		return $d['result_bukalapak'];
		// echo '<pre>'; var_dump($d['result_bukalapak']); die;
		
	}

	function crawlShopee($q) {
		try {
			$keyword = preg_replace('/\s/','+',$q);
			$url = 'https://shopee.co.id/search?keyword='.$keyword;
			// $search_pattern = 'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='.$q.'&limit=50&newest=0&order=desc&page_type=search';
			$html = file_get_contents($url);
			$dom = new DOMDocument();
			libxml_use_internal_errors(TRUE);
			if(!empty($html)) {
				//$dom->loadHTML($html);
				d($url);
				$dom->loadHTML($html);
				libxml_clear_errors();
				// d($dom);
				$html_xpath = new DOMXPath($dom);
				$html_list = array();
				//d($html_xpath);
				//*[@id="main"]/div/div[2]/div[2]/div/div[1]/div[2]/div[2]/div[2]/div/div[2]/div[1]/a/div
				#main > div > div.shopee-page-wrapper > div:nth-child(2) > div > div.search-page > div.container.search-page__body-wrapper > div.search-page__search-result > div.shopee-search-item-result > div > div.row.shopee-search-item-result__items > div:nth-child(1) > a > div
				// $html_and_type = $html_xpath->query('//*[@id="main"]/div/div[2]/div[2]/div/div[1]/div[2]/div[2]/div[2]/div/div[2]/div[1]/a/div'); 
				// $html_and_type = $html_xpath->query('//div[@class="shopee-search-item-result"]'); 
				$html_and_type = $html_xpath->query('//body//script[not(@src)][@type="application/ld+json"]'); 
				d($html_and_type);
				if($html_and_type->length > 0){	
					foreach ($html_and_type as $k => $tag) {
						// var_dump($tag->nodeValue);
						if (($tag->nodeValue) != NULL || ($tag->nodeValue) != '') $moveme[] = $tag->nodeValue;
					}
				}
				// d(($moveme));
				$result = json_decode($moveme[1])->itemListElement;
			} else {
				$result = array();
			}
		
		} catch (Exception $e) {
			echo 'Error Shopee: ' . $e->getMessage();
		}
	}

	function crawlLazada($q) {
		try {
			// // LAZADA
			$host = 'http://www.lazada.co.id/';
			// $keyword_awal = 'iphone 7';
			$keyword = preg_replace('/\s/','+',$q);
			// $search_pattern = 'http://www.lazada.co.id/apple/?q=';
			$search_pattern = 'http://www.lazada.co.id/catalog/?q=';
			$url = $search_pattern.''.$keyword.'&searchredirect='.$keyword;
			// d(parse_url($url));
			// d(($url));
			$html = file_get_contents($url);
			$dom = new DOMDocument();
			libxml_use_internal_errors(TRUE);
			// d($html);
			if(!empty($html)) {
				//$dom->loadHTML($html);
				// d($url);
				$dom->loadHTML($html);
				libxml_clear_errors();
				// d($dom);
				$html_xpath = new DOMXPath($dom);
				$html_list = array();
				//d($html_xpath);
				// $html_and_type = $html_xpath->query('//div[@class="c-card-product"]'); 
				$html_and_type = $html_xpath->query('//body//script[not(@src)][@type="application/ld+json"]'); 
				// d($html_and_type);
				// $moveme = [];
				if($html_and_type->length > 0){	
					foreach ($html_and_type as $k => $tag) {
						// var_dump($tag->nodeValue); die;
						if (($tag->nodeValue) != NULL || ($tag->nodeValue) != '') $moveme[] = $tag->nodeValue;
					}

					// foreach($html_and_type as $pat){
					// 	//$image = trim($html_xpath->query('a/div[@class="c-card-product__head"]/div[@class="c-card-product__image]/figure/img/[src]', $pat)->item(0)->nodeValue);
					// 	$name = trim($html_xpath->query('a/div[@class="c-card-product__head"]/div[@class="c-card-product__name"]', $pat)->item(0)->nodeValue);
					// 	$link = trim($html_xpath->query('a/@href', $pat)->item(0)->nodeValue);
					// 	$seller = trim($html_xpath->query('a/div[@class="c-card-product__footer"]/div[@class="c-card-product-seller"]/div[@class="c-card-product-seller__name"]', $pat)->item(0)->nodeValue);
					// 	$price = trim($html_xpath->query('a/div[@class="c-card-product__footer"]/div[@class="c-card-product__price"]/div[@class="c-product__discount-price"]', $pat)->item(0)->nodeValue);
					// 	$loc = trim($html_xpath->query('a/div[@class="c-card-product__footer"]/div[@class="c-card-product-seller"]/div[@class="c-card-product-seller__location"]', $pat)->item(0)->nodeValue);
					// 	$html_list[] = array('image' => '', 'name' => $name, 'link' => $host.'/'.$link, 'seller' => $seller, 'loc' => $loc, 'price' => $price);
					// }
				}
				// d(($moveme));
				if (isset($moveme[1])) {
					$result = json_decode($moveme[1])->itemListElement;
				} else {
					$result = array();
				}
					// $d['result_lazada'] = $html_list;
				// $d['source_lazada'] = $host;
			} else {
				$result = array();
				// $d['result_lazada'] = array();
				// $d['source_lazada'] = $host;
			}
			// d($result);
			return $result;
		} catch (Exception $e) {
			print 'Error Bro: ' . $e->getMessage();
		}



		// try {
		// 	$goutteClient = new Client();
		// 	$guzzleClient = new GuzzleClient(array(
		// 		'timeout' => 60,
		// 	));
		// 	$goutteClient->setClient($guzzleClient);
		// 	$crawler = $goutteClient->request('GET', 'https://www.lazada.co.id/catalog/?q='.$q.'&_keyori=ss&from=input');
		// 	// $category = 'News';
			
		// 	// $url = $crawler->filter('div.c1_t2i > div.c2prKC > div.c3e8SH > div.c5TXIP > div.c3KeDq > div.c16H9d')->extract('_text');
			
		// 	$doc = DOMDocument::loadHTML('https://www.lazada.co.id/catalog/?q=oppoa83&_keyori=ss&from=input');
		// 	// $doc = new DOMDocument();
        // 	// $doc->loadHTML('https://www.lazada.co.id/catalog/?q=oppo a83&_keyori=ss&from=input');
		// 	$xpath = new DOMXPath($doc);
		// 	$query = "//*[@id='root']/div/div[3]/div[1]/div/div[1]/div[3]/div[1]/div/div/div[1]/div[1]/a";
		// 	$entries = $xpath->query($query);
		// 	foreach ($entries as $entry) {
		// 		$url[] = "Found: " . $entry->getAttribute("href");
		// 	}
		// 	// $url = $crawler->filter('div.c1_t2i')->extract('_text');
		// 	// $image_thumb = str_replace('"', '', $crawler->filter('ul.feed > li > article > a > span > span > img')->extract('src'));
		// 	// $sub_title = str_replace('"', '', $crawler->filter('ul.feed > li > article > a > span.sub_judul')->extract('_text'));
		// 	d($url);
		// 	// echo '<pre>'; var_dump($url); die;
		// 	// foreach ($url as $k => $v) {
		// 	//     $crawler = $goutteClient->request('GET', $v);
		// 	//     $div_image = $crawler->filter('div.media_artikel > img')->extract('src');
		// 	//     if (count($div_image) > 0) {
		// 	//         $image = str_replace('"', '', $div_image[0]);
		// 	//         $tanggal = str_replace('"', '', trim($crawler->filter('div.jdl > span.date')->first()->text()));
		// 	//         $judul = str_replace('"', '', trim($crawler->filter('div.jdl > h1')->first()->text()));
		// 	//         $res = str_replace('"', '', trim($crawler->filter('div.detail_text')->first()->html()));
		// 	//         $res = str_replace("OA_show('parallaxindetail');", "", $res);
		// 	//         $res = str_replace("OA_show('newstag');", "", $res);
		// 	//         $res = str_replace("OA_show('hiddenquiz');", "", $res);
		// 	//         $author = str_replace('"', '', trim($crawler->filter('div.jdl > span.author')->first()->html()));
		// 	//         $tag = str_replace('"', '', $crawler->filter('div.detail_tag > a')->extract('_text'));
		// 	//         $tag = implode(';;;', $tag);
		
		// 	//         $filter = 'SELECT id FROM posts WHERE date_post="'.$tanggal.'" AND title="'.$judul.'" AND author="'.$author.'" LIMIT 1';
		// 	//         $resultCari = $conn->query($filter);
		// 	//         $count = $resultCari->num_rows;
		// 	//         if (($count) <= 0) {
		// 	//             $conn->query('INSERT INTO posts (`image`, `category`, `image_thumb`, `date_post`, `date_crawl`, `title`, `url`, `content`, `author`, `tag`) VALUES ("'.$image.'", "'.$category.'", "'.$image_thumb[$k].'", "'.$tanggal.'", "'.date('Y-m-d H:i:s').'", "'.$judul.'", "'.$v.'", "'.$res.'", "'.$author.'", "'.$tag.'")'); 
		// 	//             echo 'PROSES MENYIMPAN DATA ... '.$k.'<br>';
		// 	//         } else {
		// 	//             echo 'TIDAK ADA DATA YANG DI CRAWL<br>';
		// 	//         }
		// 	//     }
		// 	// }
		// 	// echo '<pre>'; var_dump($image); die;
			
		// 	echo '=== PROSES COMPLETE ===';
		// } catch (Exception $e) {
		// 	print 'Error Bro: ' . $e->getMessage();
		// }
		
	}

	function crawlBlibli($q) {
		try {
			$goutteClient = new Client();
			$guzzleClient = new GuzzleClient(array('timeout' => 60));
			$goutteClient->setClient($guzzleClient);
			$crawler = $goutteClient->request('GET', 'https://www.blibli.com/jual/iphone-7?s=iphone-7');
			d('123');
			
			// d($crawler);
			// $url = $crawler->filter('div.product-detail-wrapper > a')->extract('href');
			echo '=== PROSES COMPLETE ===';
		} catch (Exception $e) {
			print 'Error Bro: ' . $e->getMessage();
		}
		
	}

	function detail($title, $id=null) {
		if ($id == null || $id == "") redirect(base_url(), 'refresh');
		
		$data['dataBrand'] = $this->homes->getAllBrand();
		// var_dump($data['brand']);
		$data['topViewed'] = $this->homes->getTopViewed(10);
		$data['randomPost'] = $this->homes->getPostRandom('', '5');
		$data['dataDetail'] = $this->homes->getDetailPhone($id);

		// d($data['dataDetail']);
		if (!empty($data['dataDetail'])) {
			$keyword = $data['dataDetail'][0]['DeviceName'];
			$data['bukalapak'] = $this->crawlBukalapak($keyword);
			$data['lazada'] = $this->crawlLazada($keyword);
			
			$data['subTitle'] = 'Spec of '.$data['dataDetail'][0]['DeviceName'].' - Tool for make decision in buying phones';
			$data['relatedDevice'] = $this->homes->getRelatedDevice($data['dataDetail'][0]['Brand']);
			$data['popularDevice'] = $this->homes->getPopularDevice($data['dataDetail'][0]['Brand']);

			$data['currentBrand'] = $data['dataDetail'][0]['Brand'];
			if ($data['dataDetail'][0]['is_sync'] == 0) {
				require_once(APPPATH."libraries/fonoapi-v1.php");
				$apiKey = "08084a92e90bffea415468cdab7db16ef1191841a206e2da";
				$fonoapi = fonoApi::init($apiKey);
				try {
					$res = $fonoapi::getDevice($data['dataDetail'][0]['DeviceName']);
					// d($res); 
					// die('9090909');
					foreach ($res as $mobile) {
						$sound_c 		= (!empty($mobile->sound_c)) ? $mobile->sound_c : '';
				    	$phonebook 		= (!empty($mobile->phonebook)) ? $mobile->phonebook : '';
				    	$call_records 	= (!empty($mobile->call_records)) ? $mobile->call_records : '';
				    	$features_c 	= (!empty($mobile->features_c)) ? $mobile->features_c : '';
				    	$memory_c 		= (!empty($mobile->memory_c)) ? $mobile->memory_c : '';
				    	$languages 		= (!empty($mobile->languages)) ? $mobile->languages : '';
				    	$colors 		= (!empty($mobile->colors)) ? $mobile->colors : '';
				    	$alarm 			= (!empty($mobile->alarm)) ? $mobile->alarm : '';
				    	$camera_c 		= (!empty($mobile->camera_c)) ? $mobile->camera_c : '';
				    	$clock	 		= (!empty($mobile->clock)) ? $mobile->clock : '';
				    	$stand_by	 	= (!empty($mobile->stand_by)) ? $mobile->stand_by : '';
				    	$talk_time	 	= (!empty($mobile->talk_time)) ? $mobile->talk_time : '';
				    	$games	 		= (!empty($mobile->games)) ? $mobile->games : '';
				    	$display_c	 	= (!empty($mobile->display_c)) ? $mobile->display_c : '';
				    	$java	 		= (!empty($mobile->java)) ? $mobile->java : '';
				    	$gps	 		= (!empty($mobile->gps)) ? $mobile->gps : '';
				    	$battery_c	 	= (!empty($mobile->battery_c)) ? $mobile->battery_c : '';
				    	$announced	 	= (!empty($mobile->announced)) ? $mobile->announced : '';
				    	$radio	 		= (!empty($mobile->radio)) ? $mobile->radio : '';
				    	$gprs	 		= (!empty($mobile->gprs)) ? $mobile->gprs : '';
				    	$resolution	 	= (!empty($mobile->resolution)) ? $mobile->resolution : '';
				    	$weight	 		= (!empty($mobile->weight)) ? $mobile->weight : '';
				    	$alert_types	= (!empty($mobile->alert_types)) ? $mobile->alert_types : '';
				    	$edge			= (!empty($mobile->edge)) ? $mobile->edge : '';
				    	$_3_5mm_jack_	= (!empty($mobile->_3_5mm_jack_)) ? $mobile->_3_5mm_jack_ : '';
				    	$wlan			= (!empty($mobile->wlan)) ? $mobile->wlan : '';
				    	$bluetooth		= (!empty($mobile->bluetooth)) ? $mobile->bluetooth : '';
				    	$card_slot		= (!empty($mobile->card_slot)) ? $mobile->card_slot : '';
				    	$DeviceName		= (!empty($mobile->DeviceName)) ? $mobile->DeviceName : '';
				    	$Brand			= (!empty($mobile->Brand)) ? $mobile->Brand : '';
				    	$technology		= (!empty($mobile->technology)) ? $mobile->technology : '';
				    	$status			= (!empty($mobile->status)) ? $mobile->status : '';
				    	$dimensions		= (!empty($mobile->dimensions)) ? $mobile->dimensions : '';
				    	$sim			= (!empty($mobile->sim)) ? $mobile->sim : '';
				    	$type			= (!empty($mobile->type)) ? $mobile->type : '';
				    	$loudspeaker_	= (!empty($mobile->loudspeaker_)) ? $mobile->loudspeaker_ : '';
				    	$messaging		= (!empty($mobile->messaging)) ? $mobile->messaging : '';
				    	$_2g_bands		= (!empty($mobile->_2g_bands)) ? $mobile->_2g_bands : '';
				    	$browser		= (!empty($mobile->browser)) ? $mobile->browser : '';
				    	$sensors		= (!empty($mobile->sensors)) ? $mobile->sensors : '';
				    	$cpu			= (!empty($mobile->cpu)) ? $mobile->cpu : '';
				    	$internal		= (!empty($mobile->internal)) ? $mobile->internal : '';
				    	$os				= (!empty($mobile->os)) ? $mobile->os : '';
				    	$keyboard		= (!empty($mobile->keyboard)) ? $mobile->keyboard : '';
				    	$primary_		= (!empty($mobile->primary_)) ? $mobile->primary_ : '';
				    	$video			= (!empty($mobile->video)) ? $mobile->video : '';
				    	$secondary		= (!empty($mobile->secondary)) ? $mobile->secondary : '';
				    	$speed			= (!empty($mobile->speed)) ? $mobile->speed : '';
				    	$network_c		= (!empty($mobile->network_c)) ? $mobile->network_c : '';
				    	$chipset		= (!empty($mobile->chipset)) ? $mobile->chipset : '';
				    	$gpu			= (!empty($mobile->gpu)) ? $mobile->gpu : '';
				    	$loudspeaker	= (!empty($mobile->loudspeaker)) ? $mobile->loudspeaker : '';
				    	$audio_quality	= (!empty($mobile->audio_quality)) ? $mobile->audio_quality : '';
				    	$multitouch		= (!empty($mobile->multitouch)) ? $mobile->multitouch : '';
				    	$_3g_bands		= (!empty($mobile->_3g_bands)) ? $mobile->_3g_bands : '';
				    	$_4g_bands		= (!empty($mobile->_4g_bands)) ? $mobile->_4g_bands : '';
				    	$body_c			= (!empty($mobile->body_c)) ? $mobile->body_c : '';
				    	$size			= (!empty($mobile->size)) ? $mobile->size : '';
				    	$protection		= (!empty($mobile->protection)) ? $mobile->protection : '';
				    	$features		= (!empty($mobile->features)) ? $mobile->features : '';
				    	$nfc			= (!empty($mobile->nfc)) ? $mobile->nfc : '';
				    	$usb			= (!empty($mobile->usb)) ? $mobile->usb : '';
				    	$music_play		= (!empty($mobile->music_play)) ? $mobile->music_play : '';
				    	$sar_us			= (!empty($mobile->sar_us)) ? $mobile->sar_us : '';
				    	$sar_eu			= (!empty($mobile->sar_eu)) ? $mobile->sar_eu : '';
				    	$camera			= (!empty($mobile->camera)) ? $mobile->camera : '';
				    	$display		= (!empty($mobile->display)) ? $mobile->display : '';
				    	$performance	= (!empty($mobile->performance)) ? $mobile->performance : '';
				    	$price			= (!empty($mobile->price)) ? $mobile->price : '';
				    	$primary_		= str_replace("'", '"', $primary_);
				    	$secondary		= str_replace("'", '"', $secondary);
				    	//print $sound_c. " === ";
						// Brand='".$Brand."', 
				    	$this->db->query("UPDATE gadget SET 
				    		technology='".$technology."',
							gprs='".$gprs."', 
							edge='".$edge."', 
							announced='".$announced."',
							status='".$status."', 
							dimensions='".$dimensions."', 
							weight='".$weight."',
							sim='".$sim."', 
							type='".$type."', 
							size='".$size."', 
							resolution='".$resolution."',
							display_c='".$display_c."', 
							card_slot='".$card_slot."', 
							phonebook='".$phonebook."',
							call_records='".$call_records."', 
							camera_c='".$camera_c."', 
							alert_types='".$alert_types."',
							loudspeaker_='".$loudspeaker_."', 
							sound_c='".$sound_c."', 
							wlan='".$wlan."',
							bluetooth='".$bluetooth."', 
							gps='".$gps."', 
							usb='".$usb."', 
							radio='".$radio."',
							messaging='".$messaging."', 
							browser='".$browser."', 
							clock='".$clock."',
							alarm='".$alarm."', 
							games='".$games."', 
							languages='".$languages."',
							java='".$java."', 
							features_c='".$features_c."', 
							battery_c='".$battery_c."',
							stand_by='".$stand_by."', 
							talk_time='".$talk_time."',
							colors='".$colors."', 
							sar_us='".$sar_us."', 
							sar_eu='".$sar_eu."', 
							memory_c='".$memory_c."', 
							sensors='".$sensors."', 
							cpu='".$cpu."',
							internal='".$internal."', 
							os='".$os."', 
							body_c='".$body_c."', 
							keyboard='".$keyboard."',
							primary_='".$primary_."', 
							video='".$video."', 
							secondary='".$secondary."',
							speed='".$speed."', 
							music_play='".$music_play."', 
							network_c='".$network_c."', 
							chipset='".$chipset."', 
							features='".$features."',
							protection='".$protection."', 
							gpu='".$gpu."', 
							loudspeaker='".$loudspeaker."', 
							audio_quality='".$audio_quality."', 
							nfc='".$nfc."', 
							camera='".$camera."', 
							display='".$display."', 
							performance='".$performance."', 
							multitouch='".$multitouch."', 
							_2g_bands='".$_2g_bands."', 
							_3_5mm_jack_='".$_3_5mm_jack_."', 
							_3g_bands='".$_3g_bands."',
							_4g_bands='".$_4g_bands."',
							price='".$price."',
							is_sync=1,  
							viewed=viewed+1 
							WHERE concat_ws(' ',Brand,DeviceName)='".$DeviceName."' AND Brand='".$Brand."'");
						}
					$data['dataDetail'] = $this->homes->getDetailPhone($id);
				} catch (Exception $e) {
					// echo "ERROR BRO : " . $e->getMessage();
					redirect(base_url('404'), 'refresh');
				}
			} else {
				$this->db->query("UPDATE gadget SET viewed=viewed+1 WHERE id='".$data['dataDetail'][0]['id']."'");
			}
		} else {
			// redirect(base_url(), 'refresh');
		}

		//print_r($dataDetail); die;
		$this->load->view('detail_phone', $data);
	}

	function brand($q='') {
		if ($q==null || $q=='') redirect(base_url(), 'refresh');
		try {
			$data['subTitle'] = 'All '.$q.' Phones';
			$data['dataBrand'] = $this->homes->getAllBrand();
			$data['topViewed'] = $this->homes->getTopViewed(10);
			$data['randomPost'] = $this->homes->getPostRandom('', '3');
			// $data['phoneByBrand'] = $this->homes->getPhoneByBrand($q);
			$data['popularDevice'] = $this->homes->getPopularDevice($q);
			$data['category'] = $q;

			$limit_per_page = 36;
			$segment = 4;
			$start_index = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
			// d($start_index);
			$data['phoneByBrand'] = $this->get_current_page_phone($q, $start_index, $limit_per_page);
			$base_url = base_url().'/home/brand/'.$q;
			$data['total_phone'] = $this->get_total_phone_by_category($q)['total'];
			$data['link'] = generatePagination($limit_per_page, $base_url, $data['total_phone'], $segment);
					
			
			$this->load->view('phone_by_brand', $data);
	
		} catch (Exception $e) {
			print 'Error Bro: ' . $e->getMessage();
		}
	}

	function detailPost($title, $id='') {
		// $id = str_replace("'", "", $id);
		// $pop = '';
		// if ($id==null || $id=='') redirect(base_url(), 'refresh');
		// try {
		// 	$data['detail'] = $this->homes->getDetailPost($id);
		// 	if (count($data['detail']) > 0) {
		// 		$this->db->query("UPDATE posts SET viewed=viewed+1 WHERE id='".$id."'");
		// 	}
		// 	$data['subTitle'] = 'IndoPonsel - '.$data['detail'][0]['title'];
		// 	$data['dataBrand'] = $this->homes->getAllBrand();
		// 	$data['topViewed'] = $this->homes->getTopViewed(10);
		// 	$data['randomPost'] = $this->homes->getPostRandom('', '3');
		// 	$data['relatedArticle'] = $this->homes->getPostRandom('', '5');
		// 	$data['popularDevice'] = $this->homes->getPopularDevice($pop);
		// 	$this->load->view('detail_post', $data);

		// } catch (Exception $e) {
		// 	print 'Error Bro: ' . $e->getMessage();
		// }

		$id = str_replace("'", "", $id);
		$pop = '';
		if ($id==null || $id=='') redirect(base_url(), 'refresh');
		try {
			$data['detail'] = $this->homes->getDetailPost($id);
			if (count($data['detail']) > 0) {
				$this->db->query("UPDATE artikel SET viewed=viewed+1 WHERE id='".$id."'");
			}
			$data['subTitle'] = 'indoponsel - '.$data['detail'][0]['title'];
			$data['dataBrand'] = $this->homes->getAllBrand();
			$data['topViewed'] = $this->homes->getTopViewed(10);
			$data['randomPost'] = $this->homes->getPostRandom('', '3');
			$data['relatedArticle'] = $this->homes->getPostRandom('', '5');
			$data['popularDevice'] = $this->homes->getPopularDevice($pop);
			$this->load->view('detail_post', $data);

		} catch (Exception $e) {
			print 'Error Bro: ' . $e->getMessage();
		}
	}

	function search() {
		$q = trim($this->input->post('q'));
		$query = '';
		$data['subTitle'] = 'Phone finder result - Tool for make decision in buying phones';
		$data['dataBrand'] = $this->homes->getAllBrand();
		$data['topViewed'] = $this->homes->getTopViewed(10);
		$data['randomPost'] = $this->homes->getPostRandom('', '3');
		$data['popularDevice'] = $this->homes->getPopularDevice($query);
		$data['q'] = $q;
		
		if ($q==null || $q=='') {
			$limit_per_page = 10;
			$segment = 3;
			$start_index = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
			$base_url = base_url().'/home/search';

			// $data['result'] = $this->get_current_page_phone_search_null($start_index, $limit_per_page);
			// // $data['result'] = $this->homes->getTopViewed(50);
			// $data['total_phone'] = $this->get_total_phone_search_null()['total'];

			$data['result'] = $this->get_current_page_phone_search($q, $start_index, $limit_per_page);
			$data['total_phone'] = $this->get_total_phone_search($q)['total'];
			$data['link'] = generatePagination($limit_per_page, $base_url, $data['total_phone'], $segment);
		} else {
			$data['result'] = $this->homes->getSearch($q, 50);
			$data['total_phone'] = $this->get_total_phone_search($q)['total'];
		}
		$this->load->view('page_search', $data);
	}

	function page_not_found() {
		$data['subTitle'] = 'Page not found - Tool for make decision in buying phones';
		$data['dataBrand'] = $this->homes->getAllBrand();
		$data['topViewed'] = $this->homes->getTopViewed(10);
		$data['randomPost'] = $this->homes->getPostRandom('', '3');
		$data['result'] = $this->homes->getTopViewed(20);
		$this->load->view('404', $data);
	}

	function downloadAllImage() {
		$link = $this->homes->getAllPhone();
		// d(count($link));
		// d(trim(explode('/', $link[0]['image'])[5]));
		foreach ($link as $k => $v) {
			// $img = '/Users/rhandypratama/Documents/php/indoponsel/asset/images/cdn2/'.trim(explode('/', $v['image'])[5]);
			$img = '/home/indp1859/public_html/asset/images/cdn2/'.trim(explode('/', $v['image'])[5]);
			if (!file_exists($img)) {
				file_put_contents($img, file_get_contents($v['image']));
			}
			// die();
		}
    
	}

	function downloadAllImagePost() {
		$link = $this->homes->getAllImagePost();
		foreach ($link as $k => $v) {
			$imgK = substr(strrchr($v['main_image'], "/"), 1);
			$imgF = substr($imgK, 0, strpos($imgK, '?'));
			$img = '/home/indp1859/public_html/asset/images/post/'.$imgF;
			if (!file_exists($img)) {
				file_put_contents($img, file_get_contents($v['main_image']));
			}
		}
	}
}
