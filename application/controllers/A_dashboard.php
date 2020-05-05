<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_dashboard extends CI_Controller {
	public function index()
	{
		$data = $this->session->userdata('data');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function getUserList()
	{
		$data = $this->session->userdata('data');
		$data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		// $this->load->view('testing/users', $data);
		$this->load->view('templates/footer');
	}
}