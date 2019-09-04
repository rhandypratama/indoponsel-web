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
    
    try {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60, // second
        ));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.jobstreet.co.id/id/job-search/job-vacancy.php?area=1&option=1&job-source=1%2C64&classified=0&job-posted=0&src=46&pg=1&sort=1&order=0&srcr=46&ojs=9');
        
        $url = $crawler->filter('div.position-title > a.position-title-link')->extract('href');
        // $job_desc = $crawler->filterXPath('//ul[contains(@id, "job_desc_detail")]')->text();
        // echo count($job_desc) . '<pre>'; var_dump($job_desc); die;
        $x = 0;
        foreach ($url as $k => $v) {
            if (strlen($v) > 40) {
                $x++;

                // ID JOB LISTING
                $a = explode('/', $v);
                $id = substr($a[5], 0, strpos($a[5], '?'));
                $realId = substr($id, strrpos($id, '-') + 1);

                // $f = 'hhh = {"JobAd.JobFunc":"107","JobAd.Ind":38,}';
                // $f = substr($f, 0, strrpos($f, ',}') + 2);
                // echo '<pre>'; var_dump($f); die;

                
                $goutteClient = new Client();
                $guzzleClient = new GuzzleClient(array(
                    'timeout' => 120, // second
                ));
                $deepCrawler = $goutteClient->request('GET', $v);
                
                $posisi = $deepCrawler->filter('h1.job-position')->text();
                $company = $deepCrawler->filter('div.company_name')->text();
                
                try {
                    $logo = $deepCrawler->filter('div.logo_sm_wrap')->first()->html();
                } catch (Exception $e) {
                    $logo = '';
                }
                try {
                    $experience = $deepCrawler->filter('p.main_desc_detail > span')->eq(1)->text();
                } catch (Exception $e) {
                    $experience = '';
                }
                try {
                    $lokasi = $deepCrawler->filter('span.single_work_location')->text();
                } catch (Exception $e) {
                    $lokasi = 'Beberapa Lokasi Kerja';
                }

                // DESKRIPSI PEKERJAAN
                // try {
                //     $deskripsiPekerjaan = $deepCrawler->filter('body.dja > section.container')->eq(2)->filter('div.row > div')->eq(0)->filter('div.panel')->eq(0)->filter('div.panel-body')->html();
                // } catch (Exception $e) {
                //     $deskripsiPekerjaan = $deepCrawler->filter('body.dja > section.container')->eq(1)->filter('div.row > div')->eq(0)->filter('div.panel')->eq(0)->filter('div.panel-body')->html();
                // }

                try {
                    $deskripsiPekerjaan = $deepCrawler->filterXPath('//div[contains(@id, "job_description")]')->html();
                    $addHTML = '<div class="col-lg-12 col-md-12 col-sm-12"><h2 class="job-ads-h2"><span class="icon-edit-pencil"></span> DESKRIPSI PEKERJAAN</h2><div class="unselectable wrap-text" id="job_description">';
                    $deskripsiPekerjaan = $addHTML.$deskripsiPekerjaan.'</div></div>';
                    
                } catch (Exception $e) {
                    $deskripsiPekerjaan = '';
                }


                // GAMBARAN PERUSAHAAN
                try {
                    $gambaranPerusahaan = $deepCrawler->filter('body.dja > section.container')->eq(2)->filter('div.row > div')->eq(1)->filter('div.panel')->eq(0)->filter('div.panel-body')->html();
                } catch (Exception $e) {
                    $gambaranPerusahaan = $deepCrawler->filter('body.dja > section.container')->eq(1)->filter('div.row > div')->eq(1)->filter('div.panel')->eq(0)->filter('div.panel-body')->html();
                }
                try {
                    $waktuProsesLamaran = $deepCrawler->filterXPath('//p[contains(@id, "fast_average_processing_time")]')->text();
                } catch (Exception $e) {
                    $waktuProsesLamaran = '';
                }
                try {
                    $nomorPendaftaran = $deepCrawler->filterXPath('//span[contains(@id, "company_registration_number")]')->text();
                } catch (Exception $e) {
                    $nomorPendaftaran = '';
                }
                try {
                    $situs = $deepCrawler->filterXPath('//a[contains(@id, "company_website")]')->text();
                } catch (Exception $e) {
                    $situs = '';
                }
                try {
                    $industri = $deepCrawler->filterXPath('//p[contains(@id, "company_industry")]')->text();
                    // $industri = trim(str_replace('/', ' - ', $industri));
                    $industri = trim(str_replace('&', 'dan', $industri));
                } catch (Exception $e) {
                    $industri = '';
                }
                try {
                    $nomorTelepon = $deepCrawler->filterXPath('//p[contains(@id, "company_contact")]')->text();
                } catch (Exception $e) {
                    $nomorTelepon = '';
                }
                try {
                    $ukuranPerusahaan = $deepCrawler->filterXPath('//p[contains(@id, "company_size")]')->text();
                } catch (Exception $e) {
                    $ukuranPerusahaan = '';
                }
                try {
                    $waktuBekerja = $deepCrawler->filterXPath('//p[contains(@id, "work_environment_waktu_bekerja")]')->text();
                } catch (Exception $e) {
                    $waktuBekerja = '';
                }
                try {
                    $gayaBerpakaian = $deepCrawler->filterXPath('//p[contains(@id, "work_environment_gaya_berpakaian")]')->text();
                } catch (Exception $e) {
                    $gayaBerpakaian = '';
                }
                try {
                    $tunjangan = $deepCrawler->filterXPath('//p[contains(@id, "work_environment_tunjangan")]')->text();
                } catch (Exception $e) {
                    $tunjangan = '';
                }
                try {
                    $bahasaDigunakan = $deepCrawler->filterXPath('//p[contains(@id, "work_environment_bahasa_yang_digunakan")]')->text();
                } catch (Exception $e) {
                    $bahasaDigunakan = '';
                }
                try {
                    $facebookPerusahaan = $deepCrawler->filterXPath('//a[contains(@id, "company_facebook")]')->text();
                } catch (Exception $e) {
                    $facebookPerusahaan = '';
                }
                
                try {
                    // $alamat = $deepCrawler->filter('body.dja > section.container')->eq(2)->filter('div.row > div')->eq(0)->filter('div.panel > div.panel-body > div > div')->eq(1)->filter('p.add-detail-p')->text();
                    $alamat = $deepCrawler->filter('p.add-detail-p')->text();
                    // $alamat = $deepCrawler->filterXPath('//p[contains(@id, "address")]')->text();
                } catch (Exception $e) {
                    $alamat = '';
                }
                try {
                    // $informasiPerusahaan = $deepCrawler->filter('body.dja > section.container')->eq(2)->filter('div.row > div')->eq(1)->filter('div > div.panel')->eq(2)->filter('div.panel-body > div > div.company-overview')->text();
                    $informasiPerusahaan = $deepCrawler->filter('div.company-overview')->text();
                } catch (Exception $e) {
                    $informasiPerusahaan = '';
                }
                try {
                    $tgl_tayang = $deepCrawler->filterXPath('//p[contains(@id, "posting_date")]/span')->text();
                    $tgl_tayang = trim($tgl_tayang);
                    $tgl_tayang = date_create_from_format('d-F-Y', $tgl_tayang);
                } catch (Exception $e) {
                    $tgl_tayang = '';
                }
                try {
                    $tgl_tutup = $deepCrawler->filterXPath('//p[contains(@id, "closing_date")]')->text();
                    $tgl_tutup = trim($tgl_tutup);
                    $tgl_tutup = str_replace('Tutup pada ', '', $tgl_tutup);
                    $tgl_tutup = date_create_from_format('d-F-Y', $tgl_tutup);
                } catch (Exception $e) {
                    $tgl_tutup = '';
                }
                try {
                    $mengapaBergabung = $deepCrawler->filterXPath('//div[contains(@id, "why_join_us_all")]')->html();
                } catch (Exception $e) {
                    $mengapaBergabung = '';
                }

                // MENCARI ID SPESIALISASI
                try {
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
                            $spesialisasiId = $moe["JobAd.JobFunc"];
                            $locId = $moe["JobAd.Loc"];
                            $sal = $moe["JobAd.Salary"];
                            $salary = explode('-', $moe["JobAd.Salary"]);
                            $salaryBawah = isset($salary[0]) ? $salary[0] : 0;
                            $salaryAtas = isset($salary[1]) ? $salary[1] : 0;
                            if ($spesialisasiId == NULL) {
                                $moe = substr($moveme[3], strrpos($moveme[3], 'window.omniture_settings.contextData = ') + 39);
                                $moe = substr($moe, 0, strrpos($moe, '};') + 1);
                                $moe = json_decode($moe, true);
                                $spesialisasiId = $moe["JobAd.JobFunc"];
                                $locId = $moe["JobAd.Loc"];
                                $sal = $moe["JobAd.Salary"];
                                $salary = explode('-', $moe["JobAd.Salary"]);
                                $salaryBawah = isset($salary[0]) ? $salary[0] : 0;
                                $salaryAtas = isset($salary[1]) ? $salary[1] : 0;
                            }
                        }
                    } else {
                        $spesialisasiId = '';
                        $locId = '';
                        $salary = '';
                        $salaryBawah = 0;
                        $salaryAtas = 0;
                    }
                } catch (Exception $e) {
                    print 'Error Bro: ' . $e->getMessage();
                }
                
                // MENCARI PROPINSI_ID
                $propinsi = explode(' - ', trim($lokasi));
                if (count($propinsi) > 1) {
                    $strPropinsi = $propinsi[1];
                } else {
                    $strPropinsi = '';
                }
                
                $q = 'SELECT id FROM propinsi WHERE nama="'.$strPropinsi.'" LIMIT 1';
                $r = $conn->query($q);
                $propinsiId = mysqli_fetch_array($r, MYSQLI_BOTH)['id'];
                // echo '<pre>'; var_dump($lokasiId);

                $filter = 'SELECT id FROM jobstreet WHERE job_id="'.trim($realId).'" LIMIT 1';
                $resultCari = $conn->query($filter);
                $count = $resultCari->num_rows;
                if (($count) <= 0) {
                    try {
                        $conn->query("INSERT INTO jobstreet (job_id,
                            sub_spesialisasi_id,
                            loc_id,
                            propinsi_id,
                            salary,
                            salary_bawah,
                            salary_atas,
                            posisi,
                            nama_perusahaan,
                            pengalaman,
                            lokasi,
                            deskripsi_pekerjaan,
                            gambaran_perusahaan,
                            waktu_proses_lamaran,
                            nomor_pendaftaran,
                            situs,
                            nomor_telepon,
                            industri,
                            ukuran_perusahaan,
                            gaya_berpakaian,
                            tunjangan,
                            bahasa_digunakan,
                            waktu_bekerja,
                            facebook_perusahaan,
                            alamat,
                            informasi_perusahaan,
                            mengapa_bergabung,
                            logo,
                            `url`,
                            tgl_crawl,
                            tgl_tayang,
                            tgl_tutup) VALUES ('".trim($realId)."',
                            '".trim(str_replace("'", '"', $spesialisasiId))."',
                            '".trim(str_replace("'", '"', $locId))."',
                            '".trim(str_replace("'", '"', $propinsiId))."',
                            '".trim(str_replace("'", '"', $sal))."',
                            '".trim(str_replace("'", '"', $salaryBawah))."',
                            '".trim(str_replace("'", '"', $salaryAtas))."',
                            '".trim(str_replace("'", '"', $posisi))."',
                            '".trim(str_replace("'", '"', $company))."',
                            '".trim(str_replace("'", '"', $experience))."',
                            '".trim(str_replace("'", '"', $lokasi))."',
                            '".trim(str_replace("'", '"', $deskripsiPekerjaan))."',
                            '".trim(str_replace("'", '"', $gambaranPerusahaan))."',
                            '".trim(str_replace("'", '"', $waktuProsesLamaran))."',
                            '".trim(str_replace("'", '"', $nomorPendaftaran))."',
                            '".trim(str_replace("'", '"', $situs))."',
                            '".trim(str_replace("'", '"', $nomorTelepon))."',
                            '".trim(str_replace("'", '"', $industri))."',
                            '".trim(str_replace("'", '"', $ukuranPerusahaan))."',
                            '".trim(str_replace("'", '"', $gayaBerpakaian))."',
                            '".trim(str_replace("'", '"', $tunjangan))."',
                            '".trim(str_replace("'", '"', $bahasaDigunakan))."',
                            '".trim(str_replace("'", '"', $waktuBekerja))."',
                            '".trim(str_replace("'", '"', $facebookPerusahaan))."',
                            '".trim(str_replace("'", '"', $alamat))."',
                            '".trim(str_replace("'", '"', $informasiPerusahaan))."',
                            '".trim(str_replace("'", '"', $mengapaBergabung))."',
                            '".trim(str_replace("'", '"', $logo))."',
                            '".trim(str_replace("'", '"', $v))."',
                            '".date("Y-m-d H:i:s")."',
                            '".$tgl_tayang->format('Y-m-d')."',
                            '".$tgl_tutup->format('Y-m-d')."')");
                        echo 'Saving data ... '.($realId).'<br>';
                    } catch (Exception $e) {
                        echo 'Error saving process in database';
                    }
                } else {
                    echo '==> '.$realId.' Already exists<br>';
                }

                // echo '<pre>'; var_dump($v);
                // echo '<pre>'.$x.'. '; var_dump(($industri));
            }
        }

        echo '=== PROSES COMPLETE ===';
    } catch (Exception $e) {
        print 'Error Bro: ' . $e->getMessage();
    }

?>