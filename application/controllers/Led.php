<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Led extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Mled');
	}

	public function index() {
		$this->load->view('led_control');
	}

	// update appliances value
	public function update() {
		$this->Mled->update("led_now");
		$this->Mled->add_history("led_history");
		redirect(base_url('led'));
	}

	// data aktual led
	public function json() {
		$data = $this->Mled->get("led_now");
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	// history value led
	public function json_history() {
		$data["appliance"] = $this->Mled->get_history("led_history");
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
