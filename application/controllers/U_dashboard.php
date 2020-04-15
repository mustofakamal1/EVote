<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_dashboard extends CI_Controller {

	public function index(){
		$this->load->view('templates/header');
		//$this->load->view('common/vote');
		$data['test'] = $this->session->flashdata('item');
		$this->load->view('admin/dashboard', $data);
	}
}