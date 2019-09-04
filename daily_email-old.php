<?php
    date_default_timezone_set('Asia/Jakarta');
                    
    require_once 'application/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    define('UTF8_ENABLED', TRUE);

    function get_job_by_propinsi_spesisialisasi($propinsi='all', $spesialisasi='all') {
		$now = date('Y-m-d');
        // $now = '2018-10-08';
        $q = 'SELECT * FROM jobstreet WHERE DATE(tgl_crawl)="'.$now.'"';
        if ($propinsi !== 'all') {
            $q .= ' AND (`propinsi_id` IN('.$propinsi.')';
		}
		if ($spesialisasi !== 'all') {
            $q .= ' AND (`sub_spesialisasi_id` IN('.$spesialisasi.')';
        }
        $q .= ' ORDER BY `salary_atas` DESC LIMIT 3';
        
        // $conn1 = new mysqli("127.0.0.1", "root", "", "slipcoding");
        $conn1 = new mysqli("127.0.0.1", "indp1859_indoponsel", "]reihAtjB*jS", "indp1859_indoponsel");
        if ($conn1->connect_error) die("Connection failed: " . $conn->connect_error);
        $sql = $conn1->query($q);
        // echo '<pre>'; var_dump($q); die;
        $conn1->close();
        return $sql;
    }
    
    function transliterateString($txt) {
        $transliterationTable = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE', 'ḃ' => 'b', 'Ḃ' => 'B', 'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C', 'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E', 'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F', 'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G', 'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H', 'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I', 'ĵ' => 'j', 'Ĵ' => 'J', 'ķ' => 'k', 'Ķ' => 'K', 'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L', 'ṁ' => 'm', 'Ṁ' => 'M', 'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE', 'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R', 'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS', 'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T', 'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE', 'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W', 'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e', 'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
        return str_replace(array_keys($transliterationTable), array_values($transliterationTable), $txt);
    }
    function url_title($str, $separator = '-', $lowercase = FALSE){
		if ($separator === 'dash'){
			$separator = '-';
		} elseif ($separator === 'underscore') {
			$separator = '_';
		}
		$q_separator = preg_quote($separator, '#');
		$trans = array(
			'&.+?;'			=> '',
			'[^\w\d _-]'		=> '',
			'\s+'			=> $separator,
			'('.$q_separator.')+'	=> $separator
		);
		$str = strip_tags($str);
		foreach ($trans as $key => $val) {
			$str = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $str);
		}

		if ($lowercase === TRUE) {
			$str = strtolower($str);
		}
		return trim(trim($str, $separator));
	}

    function emailSubscribeTemplate($job=array()) {
        // echo '<pre>'; var_dump($job); die;
        $htmlJob = '';
        $lead = 'Maaf hari ini kami tidak menemukan lowongan pekerjaan yang sesuai dengan minat anda';
        // if (count($job) > 0) {
        if ($job) {
            $htmlJob .= '<ul style="text-align:left">';
            foreach ($job as $k => $v) {
                // $url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
                $url_title = transliterateString(url_title($v['posisi'], "dash", TRUE));
                $href = 'https://www.indoponsel.com/loker/detailJob/'.$url_title.'/'.trim($v['id']);
                $htmlJob .= '<li><a href="'.$href.'" target="_blank" title="'.$url_title.'">'.$v['posisi'].'</a> 
                    <p style="margin-bottom:0px;">'.$v['nama_perusahaan'].'</p>
                    <p style="margin-bottom:0px;"><small>'.$v['lokasi'].'</small></p>
                    <p style="margin-bottom:1rem; margin-top:.4rem;"><small style="background: #fdd822;padding: .2rem;border-radius: .3rem;">> IDR '.number_format($v['salary_bawah'], 0, ",", ".").'</small></p>
                </li>';
            }
            $htmlJob .= '</ul>';
            $lead = $job->num_rows.' Lowongan pekerjaan yang sesuai dengan minat anda hari ini';
        }
        
        $html = '
        <!doctype html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">
                <title>Subscribe Confirmation</title>
                <!--link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script-->
                <style>
                    body {
                        margin: 0;
                        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                        font-size: 1rem;
                        font-weight: 400;
                        line-height: 1.5;
                        color: #212529;
                        text-align: left;
                    }
                    .h2, h2 {
                        font-size: 2rem;
                    }
                    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
                        margin-bottom: .5rem;
                        font-family: inherit;
                        font-weight: 500;
                        line-height: 1.2;
                        color: inherit;
                        margin-top: 0;
                    }
                    .lead {
                        font-size: 1.25rem;
                        font-weight: 300;
                    }
                    p {
                        margin-top: 0;
                        margin-bottom: 1rem;
                    }
                    .bg-light {
                        background: #f8f9fa!important;
                    }
                    .text-danger {
                        color: #dc3545!important;
                    }
                    .btn-info {
                        color: #fff;
                        background-color: #17a2b8;
                        border-color: #17a2b8;
                    }
                    .btn {
                        cursor: pointer;
                        display: inline-block;
                        font-weight: 400;
                        text-align: center;
                        white-space: nowrap;
                        vertical-align: middle;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        border: 1px solid transparent;
                        padding: .375rem .75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        border-radius: .25rem;
                        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                    }
                    a {
                        color: #007bff;
                        text-decoration: none;
                        background-color: transparent;
                        -webkit-text-decoration-skip: objects;
                    }
                    .container {
                        max-width: 960px;
                        width: 100%;
                        padding-right: 15px;
                        padding-left: 15px;
                        margin-right: auto;
                        margin-left: auto;
                        padding-bottom: 30px;
                    }
                    .text-center {
                        text-align: center!important;
                    }
                    .pb-5, .py-5 {
                        padding-bottom: 3rem!important;
                    }
                    .pt-5, .py-5 {
                        padding-top: 3rem!important;
                    }
                    .text-muted {
                        color: #6c757d!important;
                    }
                    .mb-1, .my-1 {
                        margin-bottom: .25rem!important;
                    }
                </style>
            </head>
            <body class="bg-light">
                <div class="container">
                    <div class="py-5 text-center">
                        <img class="d-block mx-auto mb-4" src="https://www.indoponsel.com/asset/images/logo5.png" alt="indoponsel" width="72" height="72"-->
                        <h4 style="margin-top:1rem">Job alert daily from indoponsel</h4>
                        <hr>
                        <p class="lead">'.$lead.'</p>
                        <p>'.$htmlJob.'</p>
                        <p><a href="https://www.indoponsel.com/loker" target="_blank">Lihat lowongan kerja lainnya</a></p>
                    </div>
                    <footer class="text-muted text-center text-small">
                        <p class="mb-1">Contact us <a href="mailto:support@indoponsel.com">support@indoponsel.com</a></p>
                    </footer>
                </div>
            </body>
        </html>';
        return $html;
    }

    // $conn = new mysqli("127.0.0.1", "root", "", "slipcoding");
    $conn = new mysqli("127.0.0.1", "indp1859_indoponsel", "]reihAtjB*jS", "indp1859_indoponsel");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $s = 'SELECT * FROM subscribe WHERE is_verify="1"';
    $sql = $conn->query($s);
    // echo '<pre>'; var_dump($subscribe); die;
    if ($sql->num_rows > 0) {
        while($v = $sql->fetch_assoc()) {
            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            $propinsi = $v['propinsi_id'];
            $spesialisasi = $v['spesialisasi_id'];
            $job = get_job_by_propinsi_spesisialisasi($propinsi, $spesialisasi);
            // echo '<pre>'; var_dump($job); die;
            if (count($job) > 0) {
                $from = 'support@indoponsel.com';
                $name = 'indoponsel';
                $subject = 'Job alert daily from indoponsel';
                $isiEmail = emailSubscribeTemplate($job);
                $mail = new PHPMailer(true);
                try {
                    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'ssl://smtp.googlemail.com';            // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'indoponsel66@gmail.com';                 // SMTP username
                    $mail->Password = 'p4m3kasan';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to
                    $mail->setFrom($from, $name);
                    $mail->addAddress($v['email']);     // Add a recipient
                    // $mail->addAddress('ellen@example.com');               // Name is optional
                    $mail->addReplyTo($from, $name);
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $isiEmail;
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent to ==> '.$v['email'].'<br>';
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            } else {
                echo 'tidak ada email untuk ==> '.$v['email'].'<br>';
            }
        }
    }

    $conn->close();