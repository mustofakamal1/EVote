<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_dashboard extends CI_Controller {

	public function index(){
		$this->load->view('templates/header');
		//$this->load->view('common/vote');
		$data = $this->session->userdata('data');
		$this->load->view('testing/userdata', $data);
	}
}