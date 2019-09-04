<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loker extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('lokers');
		$this->load->helper(array('url'));
		$this->load->library('pagination');
		// $this->load->library('session');
		session_start();
	}

	public function index() {
		$data['subTitle'] = 'Lowongan kerja terbaru tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();
		$data['totalJob'] = $this->lokers->getTotalJob()->total;
		// $data['segment'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$_SESSION['indoponsel']['sort'] = 'tgl_tayang';
		$_SESSION['indoponsel']['order'] = 'DESC';
		$this->load->view('loker', $data);
	}

	public function search() {
		$data['subTitle'] = 'Lowongan kerja terbaru tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();
		$data['totalJob'] = $this->lokers->getTotalJob()->total;
		$data['keyword'] = $this->input->post('keyword');
		
		// SIMPAN SEMUA PARAMETER FILTER KE SESSION
		$_SESSION['indoponsel']['keyword'] = $data['keyword'];
		$this->load->view('loker', $data);
	}

	public function searchJobBySpesialisasi($subSpesialisasiId) {
		// if ($subSpesialisasiId == '') redirect('')
		$data['subTitle'] = 'Lowongan kerja terbaru tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();
		$data['totalJob'] = $this->lokers->getTotalJob()->total;
		$data['subSpesialisasiId'] = $subSpesialisasiId;
		
		// SIMPAN SEMUA PARAMETER FILTER KE SESSION
		$_SESSION['indoponsel']['subSpesialisasiId'] = $data['subSpesialisasiId'];
		// d($_SESSION);
		$this->load->view('loker', $data);
	}

	public function loadRecord($rowno=0) {
		$data['filter']['propinsi'] = $this->input->get('propinsi');
		$data['filter']['spesialisasi'] = $this->input->get('spesialisasi');
		$data['filter']['gajiMin'] = (float)$this->input->get('gajiMin');
		
		$data['filter']['keyword'] = $this->input->get('keyword');
		if ($data['filter']['keyword'] == '') $data['filter']['keyword'] = '';
		$_SESSION['indoponsel']['keyword'] = $data['filter']['keyword'];
		
		$data['filter']['sort'] = $this->input->get('sort');
		if ($data['filter']['sort'] == '') $data['filter']['sort'] = 'tgl_tayang';
		$_SESSION['indoponsel']['sort'] = $data['filter']['sort'];
		
		$data['filter']['order'] = $this->input->get('order');
		if ($data['filter']['order'] == '') $data['filter']['order'] = 'DESC';
		$_SESSION['indoponsel']['order'] = $data['filter']['order'];

		// Row per page
		$rowperpage = 20;
	
		// Row position
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
	 
		// All records count
		$allcount = $this->lokers->getrecordCount($data['filter']['propinsi'], $data['filter']['spesialisasi'], $data['filter']['gajiMin'], $data['filter']['keyword'], $data['filter']['sort'], $data['filter']['order']);
	
		// Get records
		$users_record = $this->lokers->getData($rowno, $rowperpage, $data['filter']['propinsi'], $data['filter']['spesialisasi'], $data['filter']['gajiMin'], $data['filter']['keyword'], $data['filter']['sort'], $data['filter']['order']);

		// Pagination Configuration
		$config['base_url'] = base_url().'loker/loadRecord';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
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
		
		// Initialize
		$this->pagination->initialize($config);
	
		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = (int)$rowno;
		
		if (!empty($users_record)) {
			foreach ($users_record as $key => $v) {
				$url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
				$customLogo = substr($v['logo'], strpos($v['logo'], 'data-original=') + 15);
				$logo = substr($customLogo, 0, strpos($customLogo, '">'));
				if (($logo != NULL) || ($logo != '')) {
					$img = '<img class="ml-3" alt="Logo perusahaan" src="'.$logo.'" style="width: 64px; height: 64px;">';
				} else {
					$img = '';
				}
				$infoPerusahaan = str_replace('â€“', '-', $v['informasi_perusahaan']);
				$infoPerusahaan = str_replace('Â', '', $infoPerusahaan);
				// $infoPerusahaan = str_replace('&nbsp;', '', $infoPerusahaan);
				// $infoPerusahaan = preg_replace("/&nbsp;/",'',$infoPerusahaan);
				$infoPerusahaan = trim($infoPerusahaan);
				$data['feed'][] = '<div class="card bg-white w-100 mb-2 shadow-lg rounded">
					<div class="card-body">
						<div class="media">
							<div class="media-body">
								<h5 class="card-title"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'" class="card-link">'.$v['posisi'].'</a></h5>
								<h6 class="card-subtitle mb-0 text-muted font-weight-light">'.$v['nama_perusahaan'].'</h6>
								<p class="card-text pl-2 mb-0"><small><i class="fa fa-map-marker"></i> <span class="pl-1">'.$v['lokasi'].'</span></small></p>
								<p class="card-text pl-2"><small><i class="fa fa-dollar"></i> <span class="pl-1"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'" class="card-link">lihat detail gaji</a></span></small></p>
							</div>
							'.$img.'
						</div>
						<p class="card-text font-weight-light d-none d-md-block d-lg-block d-xl-block">'.limit_text($infoPerusahaan, 30).'</p>
					</div>
					<div class="card-footer bg-white">
						<small class="text-muted"><i class="fa fa-clock-o"></i><span class="pl-1">'.time_elapsed_string(date('Y-m-d H:i:s', strtotime($v['tgl_tayang']))).'</span></small>
					</div>
				</div>';
			}
		} else {
			$data['feed'] = [];
		}

		$data['z'] = (int)$allcount;
		// $data['x'] = (int)$this->uri->segment(3) + 1;
		$data['x'] = (int)$rowno + 1;

		if ($rowno + $rowperpage > $allcount) {
			$data['y'] = (int)$allcount;
		} else {
			$data['y'] = (int)$rowno + (int)$rowperpage;
		}
		// if ($this->uri->segment(3) + $config['per_page'] > $config['total_rows']) {
		// 	$data['y'] = $config['total_rows'];
		// } else {
		// 	$data['y'] = (int)$this->uri->segment(3) + $config['per_page'];
		// }

		echo json_encode($data);
	 
	}

	// public function getAllLoker() {
	// 	$limit_per_page = 20;
	// 	$segment = 3;
	// 	// $start_index = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
	// 	$start_index = $this->input->post('segment');
	// 	// d($start_index);
	// 	$data['allLoker'] = $this->get_current_page($start_index, $limit_per_page);
	// 	// $data['allLoker'] = $this->get_current_page(1, 20);
	// 	// d($data['allLoker']);
	// 	$base_url = base_url().'/loker/index/';
	// 	$data['totalJob'] = $this->lokers->getTotalJob()->total;
	// 	// $data['total_phone'] = $this->get_total_phone_by_category($q)['total'];
	// 	$data['link'] = generatePagination($limit_per_page, $base_url, $data['totalJob'], $segment);
	// 	// $data['link'] = generatePagination(20, $base_url, 41, 3);
	// 	// d($data['allLoker']);
	// 	// $data['allLoker'] = $this->lokers->getPost('', '20');
	// 	foreach ($data['allLoker'] as $key => $v) {
	// 		$url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
			
	// 		// <img class="ml-3" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1664d287328%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1664d287328%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.84375%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 64px; height: 64px;">
	// 		$customLogo = substr($v['logo'], strpos($v['logo'], 'data-original=') + 15);
	// 		$logo = substr($customLogo, 0, strpos($customLogo, '">'));
	// 		if (($logo != NULL) || ($logo != '')) {
	// 			$img = '<img class="ml-3" alt="Logo perusahaan" src="'.$logo.'" style="width: 64px; height: 64px;">';
	// 		} else {
	// 			$img = '';
	// 		}
	// 		$data['feed'][] = '<div class="card bg-white w-100 mb-2"><div class="card-body"><div class="media"><div class="media-body"><h5 class="card-title"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'" class="card-link">'.$v['posisi'].'</a></h5><h6 class="card-subtitle mb-2 text-muted font-weight-light">'.$v['nama_perusahaan'].'<h6><p class="card-text pl-4 mb-0"><small><i class="fa fa-map-marker"></i> <span class="pl-1">'.$v['lokasi'].'</span></small></p><p class="card-text pl-4"><small><i class="fa fa-dollar"></i> <span class="pl-1"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'" class="card-link">lihat detail gaji</a></span></small></p></div>
	// 			'.$img.'
	// 			</div><p class="card-text font-weight-light d-none d-md-block d-lg-block d-xl-block">'.limit_text($v['informasi_perusahaan'], 30).'</p></div><div class="card-footer"><small class="text-muted"><i class="fa fa-clock-o"></i><span class="pl-1">'.time_elapsed_string(date('Y-m-d H:i:s', strtotime($v['tgl_tayang']))).'</span></small></div></div>';
	// 	}
	// 	$this->output
    //     	->set_content_type('application/json')
    //     	->set_output(json_encode($data));
	// }

	function detailJob($title, $id='') {
		// $data['subTitle'] = 'Detail lowongan kerja';
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();

		$id = str_replace("'", "", $id);
		if ($id==null || $id=='') redirect(base_url('loker'), 'refresh');
		try {
			$data['detail'] = $this->lokers->getDetailPost($id);
			// d($data['detail']);
			$data['jobTerkait'] = array();
			if (count($data['detail']) > 0) {
				$this->db->query("UPDATE jobstreet SET viewed=viewed+1 WHERE id='".$id."'");
				$data['jobTerkait'] = $this->lokers->getJobByCompany($data['detail'][0]['nama_perusahaan'], $id);
			}
			$data['subTitle'] = 'Lowongan kerja terbaru '.date("Y").' sebagai '.$data['detail'][0]['posisi'];
			$this->load->view('detail_loker', $data);

		} catch (Exception $e) {
			print 'Error Bro: ' . $e->getMessage();
		}
	}

	function list_job_order_by_gaji() {
		$data['subTitle'] = 'Daftar lowongan kerja dengan penghasilan terbesar tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();
		// $data['subSpesialisasi'] = $this->lokers->getTotalJobBySpesialisasi();
		$data['job'] = $this->lokers->getJobByGaji();
		$this->load->view('list_job_gaji', $data);
	}

	function list_job_order_by_spesialisasi() {
		$data['subTitle'] = 'Lowongan kerja berdasarkan spesialisasi tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllKategori();
		$data['subSpesialisasi'] = $this->lokers->getTotalJobBySpesialisasi();
		$this->load->view('list_job_spesialisasi', $data);
	}

	function list_job_populer() {
		$data['subTitle'] = 'Lowongan kerja paling diminati tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();
		$data['job'] = $this->lokers->getJobByPopuler();
		$this->load->view('list_job_populer', $data);
	}

	function tips_kirim_lamaran_kerja_via_email() {
		$data['subTitle'] = 'Tips mengirim lamaran kerja via email tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();
		$this->load->view('tips_lamaran_via_email', $data);
	}
	
	function tips_interview_kerja() {
		$data['subTitle'] = 'Tips interview kerja tahun '.date('Y');
		$data['propinsi'] = $this->lokers->getAllPropinsi();
		$data['spesialisasi'] = $this->lokers->getAllSpesialisasi();
		$this->load->view('tips_interview_kerja', $data);
	}

	function kontak() {
		$data['subTitle'] = 'Butuh bantuan cari lowongan kerja '.date('F').' '.date('Y').'? hubungi kami di sini';
		$this->load->view('kontak', $data);
	}

	public function loadJobByGajiSpesialisasi() {
		$data['filter']['spesialisasi'] = $this->input->post('subSpesialisasiId');
		$users_record = $this->lokers->getJobByGajiSpesialisasi($data['filter']['spesialisasi']);
		// d($users_record);
		if (!empty($users_record)) {
			foreach ($users_record as $key => $v) {
				$url_title = convert_accented_characters(url_title($v['posisi'], "dash", TRUE));
				if (strlen($key+1) == 1) {
					$no = '0'.($key+1);
				} else {
					$no = ($key+1);
				}
				// $data['feed'][] = '<div class="media mb-2 mt-2 border-bottom pb-0">
				// 	<div class="align-self-center mr-3 bg-danger rounded-circle pt-1 pb-1 pl-2 pr-2" style="color: white;font-weight: 400;font-size: 1rem;"><em>'.$no.'</em></div>
				// 	<div class="media-body">
				// 		<p class="mt-0 mb-0"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'">'.$v['posisi'].'</a></p>
				// 		<p class="mt-0 mb-0"><small>'.$v['nama_perusahaan'].'</small></p>
				// 		<p class="mt-0 mb-2"><small><i class="fa fa-dollar pr-1"></i></small><span class="badge badge-warning">Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".").'</span></p>
				// 	</div>
				// </div>';
				$data['feed'][] = '<div class="card bg-white w-100 mb-2 shadow-lg rounded">
					<div class="card-body">
						<div class="media">
							<div class="media-body">
								<h6 class="card-title"><a href="'.base_url().'loker/detailJob/'.$url_title.'/'.trim($v['id']).'" class="card-link">'.$v['posisi'].'</a></h6>
								<h6 class="card-subtitle mb-0 text-muted font-weight-light">'.$v['nama_perusahaan'].'</h6>
								<p class="pl-2 mb-0 mt-0 pt-0 d-none d-md-block d-lg-block d-xl-block"><small><i class="fa fa-map-marker"></i> <span class="pl-1">'.$v['lokasi'].'</span></small></p>
								<p class="pl-2 mb-0 mt-0 pt-0"><small><i class="fa fa-dollar"></i></small> <span class="pl-1"><span class="badge badge-warning">'.'Rp '.number_format($v['salary_bawah'],0, ",", ".").' - Rp '.number_format($v['salary_atas'],0, ",", ".").'</span></span></p>
							</div>
							<div class="ml-3 mr-3 bg-danger rounded-circle pt-1 pb-1 pl-2 pr-2" style="color: white;font-weight: 400;font-size: 1.3rem;"><em>'.$no.'</em></div>
						</div>
					</div>
				</div>';
			}
		} else {
			$data['feed'] = [];
		}
		echo json_encode($data);
	}

	public function siteVerify() {
		$secret = '6LeMZXYUAAAAALjxF8nQj-Ljtt5Z00uQrpe1nvif';
		$nama = trim(stripslashes($this->input->post('nama')));
		$email = trim(stripslashes($this->input->post('email')));
		$filterEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
		if ($filterEmail == false) {
			echo json_encode(array(
				'success' => false,
				'message' => 'Email tidak valid, mohon isikan email sesuai dengan ketentuan. Contoh : example@example.com',
			));
		} else {
			$message = trim(stripslashes($this->input->post('message')));
			$response = trim($this->input->post('response'));
			$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
			$captcha_success = json_decode($verify);
			// d($captcha_success);
			if ($captcha_success->success == false) {
				echo json_encode(array(
					'success' => false,
					'message' => 'Verifikasi captcha tidak valid (duplicated). Mohon reload / refresh halaman kembali',
				));
			} else if ($captcha_success->success == true) {
				$data = array(
					'nama' => $nama,
					'email' => $email,
					'message' => $message,
					'tgl_submit' => date('Y-m-d H:i:s'),
					'ip_address' => get_client_ip(),
				);
				$this->db->insert('contact_us', $data);
				echo json_encode(array(
					'success' => true,
					'message' => 'Data sudah terkirim, permintaan anda sedang kami proses. Pastikan email yang anda kirim masih aktif untuk mengetahui respon dari kami. Terimakasih!'
				));
				
				$to = array('slipcoding@gmail.com', 'support@indoponsel.com');
				$subject = 'INDOPONSEL - CONTACT US';

				sendEmail($email, $nama, $to, $subject, $message);
			}		
		}
	}

	function subscribe_confirm($token) {
		if (is_null($token) || trim($token) == '') redirect(base_url('loker'), 'refresh');
		$this->db->select("*");
		$this->db->where("token", $token);
		$this->db->limit(1);
		$this->db->from("subscribe");
		$sql = $this->db->get()->result_array();
		if (count($sql) > 0) {
			$subscribeId = $sql[0]['id'];
			$email = $sql[0]['email'];
			$data = array('is_verify' => 1);
			$this->db->update('subscribe', $data, array('id' => $subscribeId));
			$response['header'] = 'Selamat';
			$response['pesan'] = 'Email anda <span class="text-danger">'.$email.'</span> berhasil diverifikasi';
			$this->load->view('verify_account', $response);
		} else {
			$response['header'] = 'Maaf';
			$response['pesan'] = 'Proses verifikasi email tidak valid';
			$this->load->view('verify_account', $response);
		}
	}

	public function subscribe() {
		$data['propinsi'] = $this->input->post('propinsi');
		// var_dump($data); die;
		$data['spesialisasi'] = $this->input->post('spesialisasi');
		$data['email'] = trim($this->input->post('email'));
		
		$filterEmail = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
		if ($filterEmail == false || $data['email'] == '') {
			echo json_encode(array(
				'success' => false,
				'message' => 'Email tidak valid, mohon isikan email sesuai dengan ketentuan. Contoh : example@gmail.com',
			));
		} else {
			$data['token'] = md5('support@indoponsel.com'.$data['email']);
			$this->db->select("id");
			$this->db->where("email", $data['email']);
			$this->db->limit(1);
			$this->db->from("subscribe");
			$sql = $this->db->get()->result_array();
			if (count($sql) > 0) {
				$subscribeId = $sql[0]['id'];
				$data = array(
					'propinsi_id' => !is_null($data['propinsi']) ? implode(',', $data['propinsi']) : 'all',
					'spesialisasi_id' => !is_null($data['spesialisasi']) ? implode(',', $data['spesialisasi']) : 'all',
					'tgl_update' => date('Y-m-d H:i:s'),
					'token' => $data['token']
				);
				$this->db->update('subscribe', $data, array('id' => $subscribeId));
				echo json_encode(array(
					'success' => true,
					'message' => 'Selamat! Email ini sudah pernah terdaftar sebelumnya dan permintaan anda akan kami proses. Pastikan email yang anda kirim masih aktif untuk mengetahui respon dari kami. Terimakasih'
				));
			} else {
				$data = array(
					'propinsi_id' => !is_null($data['propinsi']) ? implode(',', $data['propinsi']) : 'all',
					'spesialisasi_id' => !is_null($data['spesialisasi']) ? implode(',', $data['spesialisasi']) : 'all',
					'email' => $data['email'],
					'tgl_subscribe' => date('Y-m-d H:i:s'),
					'ip_address' => get_client_ip(),
					'token' => $data['token'],
				);
				$this->db->insert('subscribe', $data);
				echo json_encode(array(
					'success' => true,
					'message' => 'Selamat! permintaan anda sedang kami proses. Pastikan email yang anda kirim masih aktif untuk mengetahui respon dari kami. Terimakasih'
				));
			}
			$from = 'support@indoponsel.com';
			$name = 'support@indoponsel.com';
			$subject = 'Confirmation Status';
			$isiEmail = emailConfirmTemplate($data['email'], $data['token']);
			sendEmail($from, $name, $data['email'], $subject, $isiEmail);
		}
	}

	function tes() {
		$job = $this->get_job_by_propinsi_spesisialisasi('30500', '108,138');
		echo emailSubscribeTemplate($job);
	}

	function send_email_daily() {
		$this->db->select("*");
		$this->db->where("is_verify", 1);
		$this->db->from("subscribe");
		$sql = $this->db->get()->result_array();
		// d($sql);
		if (count($sql) > 0) {
			foreach ($sql as $key => $v) {
				$propinsi = trim($v['propinsi_id']);
				$spesialisasi = trim($v['spesialisasi_id']);
				$job = $this->get_job_by_propinsi_spesisialisasi($propinsi, $spesialisasi);
				if (count($job) > 0) {
					$from = 'support@indoponsel.com';
					$name = 'indoponsel';
					$subject = 'Job alert daily from indoponsel';
					$isiEmail = emailSubscribeTemplate($job);
					sendEmail($from, $name, $v['email'], $subject, $isiEmail);
				} else {
					echo 'tidak ada email untuk ==> '.$v['email'].'<br>';
				}
			}
		}
	}

	function get_job_by_propinsi_spesisialisasi($propinsi='all', $spesialisasi='all') {
		$now = date('Y-m-d');
		// $now = '2018-10-08';
		// d($now);
		$this->db->select("*");
		$this->db->from("jobstreet");
		$this->db->where("DATE(tgl_crawl)", $now);
		if ($propinsi !== 'all') {
			$this->db->where("propinsi_id IN (".$propinsi.")", NULL, false);
			// $this->db->where_in('propinsi_id', $propinsi);
		}
		if ($spesialisasi !== 'all') {
			$this->db->where("sub_spesialisasi_id IN (".$spesialisasi.")", NULL, false);
			// $this->db->where_in('asub_spesialisasi_id', $spesialisasi);
		}
		$this->db->order_by('salary_atas', 'DESC');
		$this->db->limit(3);
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	public function clearFilter() {
		unset($_SESSION['indoponsel']['subSpesialisasiId']);
		$_SESSION['indoponsel']['keyword'] = '';
		$_SESSION['indoponsel']['sort'] = 'tgl_tayang';
		$_SESSION['indoponsel']['order'] = 'DESC';
		echo json_encode(array('success' => true));
	}

	function updatePropinsiId() {
		$this->db->select("id,lokasi");
		$this->db->where("propinsi_id =", NULL);
		$this->db->from("jobstreet");
		$sql = $this->db->get()->result_array();
		foreach ($sql as $key => $value) {
			$propinsi = explode(' - ', $value['lokasi']);
			if (count($propinsi) > 1) {
				$strPropinsi = $propinsi[1];
			} else {
				$strPropinsi = '';
			}
			$this->db->select("id");
			$this->db->where("nama =", $strPropinsi);
			$this->db->limit(1);
			$this->db->from("propinsi");
			$propinsiId = $this->db->get()->row();
			if (!is_null($propinsiId)) {
				$propinsiId = $propinsiId->id;
				$this->db->query('UPDATE jobstreet SET propinsi_id="'.$propinsiId.'" WHERE id="'.$value['id'].'"');
			}
		}
	}

	function printSession() {
		echo '<pre>';
		print_r($_SESSION);
	}

}
