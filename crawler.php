<?php
    require_once('webhose.php');
    date_default_timezone_set("Asia/Jakarta");
    Webhose::config("898bbf47-68aa-4848-984b-8429dde06e30");
    
    function print_filterwebdata_titles($api_response) {
        if ($api_response == null) {
            echo "<p>Response is null, no action taken.</p>";
            return;
        }
        if (isset($api_response->posts)) {
            // $conn = new mysqli("127.0.0.1", "slipcodi_admin", "123456zxc", "slipcodi_berakal");
            $conn = new mysqli("127.0.0.1", "indp1859_indoponsel", "]reihAtjB*jS", "indp1859_indoponsel");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            print count($api_response->posts).'<br/>';
            foreach($api_response->posts as $post) {
                $uuid = (isset($post->uuid) && ($post->uuid) != null) ? str_replace("'", "", $post->uuid) : NULL;
                $author = (isset($post->author) && ($post->author) != null) ? str_replace("'", "", $post->author) : NULL;
                $published = (isset($post->published) && ($post->published) != null) ? date("Y-m-d H:i:s", strtotime($post->published)) : NULL;
                $title = (isset($post->title) && ($post->title) != null) ? str_replace("'", "", $post->title) : NULL;
                $text = (isset($post->text) && ($post->text) != null) ? str_replace("'", "", $post->text) : NULL;
                $highlightText = (isset($post->highlightText) && ($post->highlightText) != null) ? str_replace("'", "", $post->highlightText) : NULL;
                $highlightTitle = (isset($post->highlightTitle) && ($post->highlightTitle) != null) ? str_replace("'", "", $post->highlightTitle) : NULL;
                $language = (isset($post->language) && ($post->language) != null) ? str_replace("'", "", $post->language) : NULL;
                $rating = (isset($post->rating) && ($post->rating) != null) ? str_replace("'", "", $post->rating) : NULL;
                $crawled = (isset($post->crawled) && ($post->crawled) != null) ? date("Y-m-d H:i:s", strtotime($post->crawled)) : NULL;
                
                $filter = "SELECT id FROM posts WHERE uuid = '".$uuid."' LIMIT 1";
                $resultCari = $conn->query($filter);
                if ($resultCari->num_rows > 0) {
                    print $title.' <b>(SUDAH ADA)</b><br/>';
                } else {
                    $keyword = 'gadget';
                    $sqlPosts = "INSERT INTO posts(`uuid`,`author`,`published`,`title`,`text`,`highlightText`,`highlightTitle`, 
                                `language`,`rating`,`crawled`,`keyword`)
                                VALUES('$uuid','$author','$published','$title','$text','$highlightText','$highlightTitle',
                                '$language','$rating','$crawled','$keyword')";
                    if ($conn->query($sqlPosts) === TRUE) {
                        echo "SUCCESS 1 - ";
                        $last_id = (int) $conn->insert_id;
                        $url = (isset($post->thread->url) && ($post->thread->url) != null) ? str_replace("'", "", $post->thread->url) : NULL;
                        $site_full = (isset($post->thread->site_full) && ($post->thread->site_full) != null) ? str_replace("'", "", $post->thread->site_full) : NULL;
                        $site = (isset($post->thread->site) && ($post->thread->site) != null) ? str_replace("'", "", $post->thread->site) : NULL;
                        $site_section = (isset($post->thread->site_section) && ($post->thread->site_section) != null) ? str_replace("'", "", $post->thread->site_section) : NULL;
                        $site_categories = (isset($post->thread->site_categories) && ($post->thread->site_categories) != null) ? str_replace("'", "", $post->thread->site_categories) : NULL;
                        $section_title = (isset($post->thread->section_title) && ($post->thread->section_title) != null) ? str_replace("'", "", $post->thread->section_title) : NULL;
                        $title = (isset($post->thread->title) && ($post->thread->title) != null) ? str_replace("'", "", $post->thread->title) : NULL;
                        $title_full = (isset($post->thread->title_full) && ($post->thread->title_full) != null) ? str_replace("'", "", $post->thread->title_full) : NULL;
                        $replies_count = (int) (isset($post->thread->replies_count) && ($post->thread->replies_count) != null) ? str_replace("'", "", $post->thread->replies_count) : 0;
                        $participants_count = (int) (isset($post->thread->participants_count) && ($post->thread->participants_count) != null) ? str_replace("'", "", $post->thread->participants_count) : 0;
                        $site_type = (isset($post->thread->site_type) && ($post->thread->site_type) != null) ? str_replace("'", "", $post->thread->site_type) : NULL;
                        $country = (isset($post->thread->country) && ($post->thread->country) != null) ? str_replace("'", "", $post->thread->country) : NULL;
                        $spam_score = (float) (isset($post->thread->spam_score) && ($post->thread->spam_score) != null) ? str_replace("'", "", $post->thread->spam_score) : 0;
                        $main_image = (isset($post->thread->main_image) && ($post->thread->main_image) != null) ? str_replace("'", "", $post->thread->main_image) : NULL;
                        $performance_score = (int) (isset($post->thread->performance_score) && ($post->thread->performance_score) != null) ? str_replace("'", "", $post->thread->performance_score) : 0;
                        $domain_rank = (int) (isset($post->thread->domain_rank) && ($post->thread->domain_rank) != null) ? str_replace("'", "", $post->thread->domain_rank) : 0;
                        $sqlPostsThread = " INSERT INTO posts_thread(
                                            `posts_id`,`posts_uuid`,`url`,`site_full`,
                                            `site`,`site_section`,`site_categories`,`section_title`, 
                                            `title`,`title_full`,`published`,`replies_count`,
                                            `participants_count`,`site_type`,`country`,`spam_score`,
                                            `main_image`,`performance_score`,`domain_rank`)
                                            VALUES('$last_id','$uuid','$url','$site_full',
                                            '$site','$site_section','$site_categories','$section_title',
                                            '$title','$title_full','$published','$replies_count',
                                            '$participants_count','$site_type','$country','$spam_score',
                                            '$main_image','$performance_score','$domain_rank')";
                        if ($conn->query($sqlPostsThread) === TRUE) {
                            echo "SUCCESS 2<br/>";
                        } else {
                            echo "Error: ".$sqlPostsThread."<br>".$conn->error;
                        }
                    } else {
                        echo "Error: ".$sqlPosts."<br>".$conn->error;
                    }
                }
            }
            $conn->close(); 

        }
    }
    //Perform a "filterWebContent" query
    $keyword0 = 'android';
    $keyword1 = 'apple';
    $keyword2 = 'samsung';
    $keyword3 = 'nokia';
    $keyword4 = 'htc';
    $keyword5 = 'blackberry';
    $keyword6 = 'meizu';
    $keyword7 = 'oppo';
    $keyword8 = 'lenovo';
    $keyword9 = 'asus';
    $keyword10 = 'xiaomi';
    $keyword11 = 'huawei';
    $keyword12 = 'vivo';
    $keyword13 = 'iphone';
    $keyword14 = 'evercoss';
    $keyword15 = 'macbook';
    $params = array("q"=>'(title:"'.$keyword0.'" OR title:"'.$keyword1.'" OR title:"'.$keyword2.'" OR title:"'.$keyword3.'" OR title:"'.$keyword4.'" OR title:"'.$keyword5.'" OR title:"'.$keyword6.'" OR title:"'.$keyword7.'" OR title:"'.$keyword8.'" OR title:"'.$keyword9.'" OR title:"'.$keyword10.'" OR title:"'.$keyword11.'" OR title:"'.$keyword12.'" OR title:"'.$keyword13.'" OR title:"'.$keyword14.'" OR title:"'.$keyword15.'") (language:indonesian) (site:detik.com OR site:okezone.com OR site:tribunnews.com OR site:liputan6.com OR site:techinasia.com OR site:suara.com OR site:kompasiana.com OR site:jpnn.com) site_type:news');
    //$params = array("q"=>'(title:"'.$keyword.'") (language:indonesian) (site:detik.com OR site:okezone.com OR site:tribunnews.com OR site:liputan6.com) site_type:news');
    $result = Webhose::query("filterWebContent", $params);
    //print '<pre>';
    //print count($result->posts).'<br/>';
    //print_r($result);
    print_filterwebdata_titles($result);
?>