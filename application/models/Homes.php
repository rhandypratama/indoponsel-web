<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homes extends CI_Model {
	function getPost($keyword='', $limit='') {
		// $this->db->select("a.*, b.site, b.title_full, b.site_type, b.country, b.main_image, b.participants_count");
		// $this->db->limit($limit);
		// $this->db->join("posts_thread b", "a.uuid=b.posts_uuid AND a.id=b.posts_id");
		// $this->db->order_by("a.published", "DESC");
		// if ($keyword == '') {
		// 	$sql = $this->db->get("posts a")->result_array();	
		// } else {
		// 	$sql = $this->db->get_where("posts a", array("a.keyword" => $keyword))->result_array();	
		// }
		$this->db->select("a.*");
		$this->db->limit($limit);
		$this->db->order_by("a.date_post_ori", "DESC");
		$sql = $this->db->get("artikel a")->result_array();	
		return $sql;
	}

	function getPostRandom($keyword='', $limit='') {
		// $this->db->select("a.*, b.site, b.title_full, b.site_type, b.country, b.main_image, b.participants_count");
		// $this->db->limit($limit);
		// $this->db->join("posts_thread b", "a.uuid=b.posts_uuid AND a.id=b.posts_id");
		// $this->db->order_by("RAND()");
		// if ($keyword == '') {
		// 	$sql = $this->db->get("posts a")->result_array();	
		// } else {
		// 	$sql = $this->db->get_where("posts a", array("a.keyword" => $keyword))->result_array();	
		// }

		$this->db->select("a.*");
		$this->db->limit($limit);
		$this->db->order_by("RAND()");
		$sql = $this->db->get("artikel a")->result_array();	
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
		// $this->db->select("a.*, b.site, b.title_full, b.site_type, b.country, b.main_image, b.participants_count");
		// $this->db->join("posts_thread b", "a.uuid=b.posts_uuid AND a.id=b.posts_id");
		// $sql = $this->db->get_where("posts a", array("a.id" => $id))->result_array();
		$this->db->select("a.*");
		$sql = $this->db->get_where("artikel a", array("a.id" => $id))->result_array();
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