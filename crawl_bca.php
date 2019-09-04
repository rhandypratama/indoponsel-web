<?php
    date_default_timezone_set('Asia/Jakarta');
    require_once 'application/vendor/autoload.php';
    use Goutte\Client;
    use GuzzleHttp\Client as GuzzleClient;
    
    try {
        // $goutteClient = new Client();
        $client = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60, // second
        ));
        $dataPost = array(
            'value(user_id)' => 'rhandyga0722',
            'value(pswd)' => '135791',
            'value(browser_info)' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36',
            'value(actions)' => 'logins',
            'value(user_ip)' => '114.124.169.148',
            'value(mobile)' => false,
        );
        $client->setClient($guzzleClient);
        $crawler = $client->request('POST', 'https://ibank.klikbca.com/login.jsp');
        // $crawler = $client->click($crawler->selectLink('Sign in')->link());
        $form = $crawler->selectButton('LOGIN')->form();
        $crawler = $client->submit($form, $dataPost);

        // $url = $crawler->filter('frameset > frameset > frame')->eq(1)->html();
        print '<pre>';
        var_dump($crawler);
        die;

        // $crawler->filter('.flash-error')->each(function ($node) {
        //     print $node->text()."\n";
        // });
        

        echo '=== PROSES COMPLETE ===';
    } catch (Exception $e) {
        print 'Error Bro: ' . $e->getMessage();
    }

?>