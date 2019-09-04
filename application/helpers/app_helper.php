<?php
$CI = &get_instance();
function limit_text($text, $limit) {
  	if (str_word_count($text, 0) > $limit) {
      	$words = str_word_count($text, 2);
      	$pos = array_keys($words);
      	$text = substr($text, 0, $pos[$limit]) . '...';
  	}
  	return $text;
}

function d($r = array(), $f = true){
    echo "<pre>";
    print_r($r);
    echo "</pre>";
    if ($f == true) {
        die;
    }
}

function image_exists($url_image=''){
    $response = get_headers($url_image, 1);
	$file_exists = (strpos($response[0], "404") === false);
	if ($file_exists) {
		return true;
	} else {
		return false;
	}
}

function getImageLogo($url = "", $noimage = "") {
    if (trim($noimage) == "") {
        $no_image = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1655f662a64%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1655f662a64%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
    }
    $img = "";
    if (trim($url) != "") {
        if (@fopen($url, 'r')) {
            $img = $url;
        } else {
        //     $imgX = substr($url, strrpos($url, '/') + 1);
        //     $nurl = "./assets/images/logo/".$imgX;
        //     if (file_exists($nurl) && !is_dir($nurl)) {
        //         $img = "/assets/images/logo/".$imgX;
        //     } else {
        //         $img = $no_image;
        //     }
            $img = $no_image;
        }
    } else {
        $img = $no_image;
    }

    return $img;
}

function generatePagination($limit_per_page=20, $base_url='', $total_rows=0, $uri_segment=3) {
    $CI = &get_instance();
    $CI->load->library('pagination');
     
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $limit_per_page;
    $config['uri_segment'] = $uri_segment;
    $config['num_links'] = 2;
    $config['use_page_numbers'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    // $config['full_tag_open'] = '<ul class="pagination pull-right no-margin">';
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
    
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function cutText($string, $wordsreturned) {
    $retval = $string;
    $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
    $string = str_replace("\n", " ", $string);
    $array = explode(" ", $string);
    if (count($array) <= $wordsreturned) {
        $retval = $string;
    } else {
        array_splice($array, $wordsreturned);
        $retval = implode(" ", $array)." ...";
    }
    return $retval;
}

function str_lreplace($search, $replace, $subject) {
    $pos = strrpos($subject, $search);
    if($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}

function clean($string) {
    // $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens. 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function sendEmail($from, $name, $to, $subject, $message) {
    $CI = &get_instance();
    $CI->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://smtp.googlemail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "indoponsel66@gmail.com";
    $config['smtp_pass'] = "098asdASD";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $CI->email->initialize($config);
    $CI->email->set_mailtype("html");
    $CI->email->set_newline("\r\n");
    $CI->email->from($from, $name);
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    $CI->email->send();
}

function emailConfirmTemplate($email, $token) {
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
                    <h2>Subscribe Confirmation</h2>
                    <p class="lead">
                    Welcome to indoponsel,
                    your email <span class="text-danger">'.$email.'</span> request to subscribe. To verification your account please click verify button below
                    </p>
                    <p><a href="https://www.indoponsel.com/loker/subscribe_confirm/'.$token.'" target="_blank" class="btn btn-info">Verify</a></p>
                </div>
                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">Contact us <a href="mailto:support@indoponsel.com">support@indoponsel.com</a></p>
                </footer>
            </div>
        </body>
    </html>';
    return $html;
}

function emailSubscribeTemplate($job=array()) {
    // d(count($job));
    $htmlJob = '';
    $lead = 'Maaf hari ini kami tidak menemukan lowongan pekerjaan yang sesuai dengan minat anda';
    if (count($job) > 0) {
        $htmlJob .= '<ul style="text-align:left">';
        foreach ($job as $k => $v) {
            $url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
            $href = 'https://www.indoponsel.com/loker/detailJob/'.$url_title.'/'.trim($v['id']);
            $htmlJob .= '<li><a href="'.$href.'" target="_blank" title="'.$url_title.'">'.$v['posisi'].'</a> 
                <p style="margin-bottom:0px;">'.$v['nama_perusahaan'].'</p>
                <p style="margin-bottom:0px;"><small>'.$v['lokasi'].'</small></p>
                <p style="margin-bottom:1rem; margin-top:.4rem;"><small style="background: #fdd822;padding: .2rem;border-radius: .3rem;">> IDR '.number_format($v['salary_bawah'], 0, ",", ".").'</small></p>
            </li>';
        }
        $htmlJob .= '</ul>';
        $lead = count($job).' Lowongan pekerjaan yang sesuai dengan minat anda hari ini';
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