<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lokers extends CI_Model {
	public function getData($rowno, $rowperpage, $propinsi=null, $spesialisasi=null, $gajiMin=0, $keyword='', $sort='tgl_tayang', $order='DESC') {
		$this->db->select('*');
		// $this->db->from('jobstreet');
		$this->db->order_by($sort, $order);
		$this->db->order_by('id', 'DESC');
		
		$this->db->limit($rowperpage, $rowno); 
		
		if ($propinsi !== null) {
			// $this->db->where("propinsi_id IN (".$propinsi.")", NULL, false);
			$this->db->where_in('propinsi_id', $propinsi);
		}
		if ($spesialisasi !== null) {
			$this->db->where_in('sub_spesialisasi_id', $spesialisasi);
			// $this->db->where("sub_spesialisasi_id IN (".$spesialisasi.")", NULL, false);
		}
		if ($gajiMin != 0) {
			$this->db->where('salary_bawah >=', $gajiMin);
		}
		if ($keyword != '') {
			$this->db->like('posisi', $keyword);
			$this->db->or_like('nama_perusahaan', $keyword);
		}

		$sql = $this->db->get('jobstreet');	
		// $sql = $this->db->get();
		return $sql->result_array();
	}

	public function getrecordCount($propinsi=null, $spesialisasi=null, $gajiMin=0, $keyword='', $sort='tgl_tayang', $order='DESC') {	
		$this->db->select('count(*) as allcount');
		if ($propinsi !== null) {
			$this->db->where_in('propinsi_id', $propinsi);
			// $this->db->where("propinsi_id IN (".$propinsi.")", NULL, false);
		}
		if ($spesialisasi !== null) {
			$this->db->where_in('sub_spesialisasi_id', $spesialisasi);
			// $this->db->where("sub_spesialisasi_id IN (".$spesialisasi.")", NULL, false);
		}
		if ($gajiMin != 0) {
			$this->db->where('salary_bawah >=', $gajiMin);
		}
		if ($keyword != '') {
			$this->db->like('posisi', $keyword);
			$this->db->or_like('nama_perusahaan', $keyword);
		}
		$this->db->order_by($sort, $order);

		$query = $this->db->get('jobstreet');
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	
	function getAllPropinsi() {
		$this->db->select("b.*");
		$this->db->order_by("b.nama", "ASC");
		$this->db->from("propinsi b");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getAllSpesialisasi() {
		$this->db->select("a.*, b.nama as kategori");
		$this->db->join("spesialisasi b", "a.spesialisasi_id=b.id");
		$this->db->order_by("b.nama", "ASC");
		$this->db->from("sub_spesialisasi a");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getTotalJobBySpesialisasi() {
		$sql = $this->db->query('SELECT a.*, b.`nama` as kategori, (SELECT COUNT(DISTINCT c.id) FROM jobstreet c WHERE c.sub_spesialisasi_id=a.id) as totalJob
				FROM sub_spesialisasi a
				JOIN spesialisasi b ON a.`spesialisasi_id` = b.`id`
				ORDER BY b.`nama`')->result_array();
		return $sql;
	}

	function getAllKategori() {
		$this->db->select("a.*");
		// $this->db->join("spesialisasi b", "a.spesialisasi_id=b.id");
		$this->db->order_by("a.nama", "ASC");
		$this->db->from("spesialisasi a");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getJobByGaji() {
		$this->db->select("a.*");
		// $this->db->join("spesialisasi b", "a.spesialisasi_id=b.id");
		$this->db->order_by("a.salary_atas", "DESC");
		$this->db->limit(20);
		$this->db->from("jobstreet a");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getJobByPopuler() {
		$this->db->select("a.*");
		$this->db->order_by("a.viewed", "DESC");
		$this->db->limit(30);
		$this->db->from("jobstreet a");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getJobByCompany($namaPerusahaan, $notID) {
		$this->db->select("a.*");
		$this->db->where("a.nama_perusahaan", $namaPerusahaan);
		$this->db->where("a.id !=", $notID);
		$this->db->order_by("a.tgl_tayang", "DESC");
		$this->db->limit(10);
		$this->db->from("jobstreet a");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getJobByGajiSpesialisasi($subSpesialisasiId) {
		$this->db->select("a.*");
		$this->db->where("a.sub_spesialisasi_id", $subSpesialisasiId);
		$this->db->order_by("a.salary_atas", "DESC");
		$this->db->limit(20);
		$this->db->from("jobstreet a");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getJobBySpesialisasi() {
		$this->db->select("a.*");
		// $this->db->join("spesialisasi b", "a.spesialisasi_id=b.id");
		$this->db->order_by("a.salary_atas", "DESC");
		$this->db->limit(20);
		$this->db->from("jobstreet a");
		$sql = $this->db->get()->result_array();
		return $sql;
	}

	function getPost($keyword='', $limit=1) {
		$this->db->select("a.*");
		$this->db->limit($limit);
		// $this->db->join("posts_thread b", "a.uuid=b.posts_uuid AND a.id=b.posts_id");
		$this->db->order_by("a.tgl_tayang", "DESC");
		if ($keyword == '') {
			$sql = $this->db->get("jobstreet a")->result_array();	
		} 
		// else {
		// 	$sql = $this->db->get_where("posts a", array("a.keyword" => $keyword))->result_array();	
		// }
		return $sql;
	}

	function getTotalJob() {
		$this->db->select("COUNT(DISTINCT id) as total");
		$this->db->from("jobstreet");
		$sql = $this->db->get()->row();
		return $sql;
	}

	function getPostRandom($keyword='', $limit='') {
		$this->db->select("a.*, b.site, b.title_full, b.site_type, b.country, b.main_image, b.participants_count");
		$this->db->limit($limit);
		$this->db->join("posts_thread b", "a.uuid=b.posts_uuid AND a.id=b.posts_id");
		$this->db->order_by("RAND()");
		if ($keyword == '') {
			$sql = $this->db->get("posts a")->result_array();	
		} else {
			$sql = $this->db->get_where("posts a", array("a.keyword" => $keyword))->result_array();	
		}
		return $sql;
	}

	function getHeadlineNews($keyword='', $limit='') {
		$this->db->select("a.title");
		//$this->db->join("posts_thread b", "a.uuid=b.posts_uuid AND a.id=b.posts_id");
		$this->db->order_by("a.published", "DESC");
		$sql = $this->db->get_where("posts a", array("a.keyword" => $keyword), $limit)->result_array();
		return $sql;
	}

	function getDetailPost($id) {
		$this->db->select("a.*");
		// $this->db->join("posts_thread b", "a.uuid=b.posts_uuid AND a.id=b.posts_id");
		//$this->db->order_by("a.published", "DESC");
		$sql = $this->db->get_where("jobstreet a", array("a.id" => $id))->result_array();
		return $sql;
	}
	function getAllImagePost() {
		$this->db->select("b.main_image");
		$this->db->where("b.main_image !=", "");
		$this->db->from("posts_thread b");
		$sql = $this->db->get()->result_array();
		return $sql;
	}
	function getDetailPhone($id) {
		$this->db->select("a.*");
		$this->db->limit(1);
		//$this->db->order_by("a.published", "DESC");
		$sql = $this->db->get_where("gadget a", array("a.id" => $id))->result_array();
		return $sql;
	}
	function getAllPhone() {
		$this->db->select("a.image");
		$this->db->where("a.image !=", "");
		$this->db->from("gadget a");
		
		// $this->db->limit(1);
		//$this->db->order_by("a.published", "DESC");
		// $sql = $this->db->get_where("gadget a", array("a.image" => $id))->result_array();
		$sql = $this->db->get()->result_array();
		return $sql;
	}
	function getAllBrand() {
		$sql = $this->db->query("SELECT Brand FROM gadget GROUP BY Brand ORDER BY Brand ASC")->result_array();
		return $sql;
	}
	function getPhoneByBrand($q) {
		$this->db->select("a.id, a.announced, a.status, a.DeviceName, a.image");
		//$this->db->limit(1);
		//$this->db->order_by("a.published", "DESC");
		$sql = $this->db->get_where("gadget a", array("a.Brand" => $q))->result_array();
		return $sql;
	}
	function getTopViewed($limit=1) {
		$this->db->select("a.id, a.DeviceName, a.viewed, a.image, a.announced, a.status");
		$this->db->limit($limit);
		$this->db->order_by("a.viewed", "DESC");
		$sql = $this->db->get("gadget a")->result_array();
		//$sql = $this->db->get_where("gadget a", array("a.Brand" => $q))->result_array();
		return $sql;
	}
	function getRelatedDevice($brand='') {
		if ($brand != null || $brand != '') {
			$this->db->select("a.id, a.DeviceName, a.image, a.announced, a.Brand");
			$this->db->limit(5);
			$this->db->order_by("RAND()");
			$sql = $this->db->get_where("gadget a", array("a.Brand" => $brand))->result_array();
			//$sql = $this->db->get_where("gadget a", array("a.Brand" => $q))->result_array();
		} else {
			$this->db->select("a.id, a.DeviceName, a.image, a.announced, a.Brand");
			$this->db->limit(5);
			$this->db->order_by("RAND()");
			$sql = $this->db->get("gadget a")->result_array();
		}
		return $sql;
	}
	function getPopularDevice($brand='') {
		if ($brand != null || $brand != '') {
			$this->db->select("a.id, a.DeviceName, a.image, a.announced, a.Brand");
			$this->db->limit(5);
			$this->db->order_by("a.viewed", "DESC");
			$sql = $this->db->get_where("gadget a", array("a.Brand" => $brand))->result_array();
			//$sql = $this->db->get_where("gadget a", array("a.Brand" => $q))->result_array();
		} else {
			$this->db->select("a.id, a.DeviceName, a.image, a.announced, a.Brand");
			$this->db->limit(5);
			$this->db->order_by("a.viewed", "DESC");
			$sql = $this->db->get("gadget a")->result_array();
		}
		return $sql;
	}
	function getSearch($q, $limit=20) {
		$this->db->select("a.id, a.announced, a.status, a.DeviceName, a.image");
		$this->db->like("a.DeviceName", $q);
		$this->db->limit($limit);
		$this->db->order_by("a.viewed", "DESC");
		$sql = $this->db->get("gadget a")->result_array();
		return $sql;
	}
}