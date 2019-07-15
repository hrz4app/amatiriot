<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jed extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Mjed');
	}

	public function index() {
		$this->load->view('jed_control');
	}

	// update appliances value
	public function update() {
		$this->Mjed->update("jed_now");
		$this->Mjed->add_history("jed_history");
		redirect(base_url('jed'));
	}

	// data aktual led
	public function json() {
		$data = $this->Mjed->get("jed_now");
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	// history value led
	public function json_history() {
		$data["appliance"] = $this->Mjed->get_history("jed_history");
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
