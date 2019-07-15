<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ked extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Mked');
	}

	public function index() {
		$this->load->view('ked_control');
	}

	// update appliances value
	public function update() {
		$this->Mked->update("ked_now");
		$this->Mked->add_history("ked_history");
		redirect(base_url('ked'));
	}

	// data aktual led
	public function json() {
		$data = $this->Mked->get("ked_now");
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	// history value led
	public function json_history() {
		$data["appliance"] = $this->Mked->get_history("ked_history");
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
