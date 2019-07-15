<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mked extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	// merubah value led
	public function update() {
		$data = array('value' => $this->input->post('value'));
		$where = array('id' => 1);
		$this->db->update('ked_now', $data, $where);
	}

	// menambah history led saat value diubah
	public function add_history() {
		$data = array('value' => $this->input->post('value'));
		$this->db->insert('ked_history', $data);
	}

	// mengambil data value led
	public function get() {
		$query = $this->db->get('ked_now');
		return $query->row();
	}

	// mengambil data history led
	public function get_history() {
		$query = $this->db->get('ked_history');
		return $query->result();
	}
}