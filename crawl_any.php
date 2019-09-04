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
        $client->setClient($guzzleClient);
        $crawler = $client->request('GET', 'http://sipsn.menlhk.go.id/?q=bank-sampah');
        // $crawler = $client->click($crawler->selectLink('Sign in')->link());
        // $form = $crawler->selectButton('LOGIN')->form();
        // $crawler = $client->submit($form, $dataPost);

        $data['head1'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(0)->text());
        $data['head2'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(1)->text());
        $data['head3'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(2)->text());
        $data['head4'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(3)->text());
        $data['head5'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(4)->text());
        $data['head6'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(5)->text());
        $data['head7'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(6)->text());
        $data['head8'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(7)->text());
        $data['head9'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(8)->text());
        $data['head10'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(9)->text());
        $data['head11'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(10)->text());
        $data['head12'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(11)->text());
        $data['head13'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(12)->text());
        $data['head14'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(13)->text());
        $data['head15'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(14)->text());
        $data['head16'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(15)->text());
        $data['head17'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(16)->text());
        $data['head18'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(17)->text());
        $data['head19'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(18)->text());
        $data['head20'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(19)->text());
        $data['head21'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(20)->text());
        $data['head22'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(21)->text());
        $data['head23'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(22)->text());
        $data['head24'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(23)->text());
        $data['head25'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(24)->text());
        $data['head26'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(25)->text());
        $data['head27'] = trim($crawler->filter('table.views-table > thead > tr > th')->eq(26)->text());
        $tes= $crawler->filter('tr.views-row-first');
        echo '<pre>';
        print_r(count($tes));
        

        echo '=== PROSES COMPLETE ===';
    } catch (Exception $e) {
        print 'Error Bro: ' . $e->getMessage();
    }

?>