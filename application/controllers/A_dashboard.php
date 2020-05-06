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
		// $data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
		$client = new GuzzleHttp\Client();
		$res = $client->request('GET', 'http://localhost/pemilu/database/user');
		// echo $res->getStatusCode();
		// echo $res->getHeader('content-type')[0];
		// echo $res->getBody();
		$data['users'] = json_decode($res->getBody());
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/userList', $data);
		// $this->load->view('testing/users', $data);
		$this->load->view('templates/footer');
	}

	public function getFieldList()
	{
		$data = $this->session->userdata('data');
		$data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		// $this->load->view('testing/users', $data);
		$this->load->view('templates/footer');
	}

	public function getCandidateList()
	{
		$data = $this->session->userdata('data');
		$data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		// $this->load->view('testing/users', $data);
		$this->load->view('templates/footer');
	}

	public function add_user(){
		$data = $this->session->userdata('data');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/add_user');
		$this->load->view('templates/footer');
	}

	public function post_add_user(){
		// $data = $this->input->post();
		$npm 		= $this->input->post('npm');
		$name 		= $this->input->post('name');
		$phone 		= $this->input->post('phone');
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		$majors_id 	= $this->input->post('majors_id');
		$role_id 	= $this->input->post('role_id');
		// $data_session = array(
		// 	'npm'			=> $this->input->post('npm'),
		// 	'role_id'				=> $this->input->post('role_id'),
		// );
		// $this->session->set_userdata('test', $data);
		$client = new GuzzleHttp\Client();
		$res = $client->request('POST', 'http://localhost/pemilu/database/user/', [
			'form_params' => [
				'npm' => "$npm",
				'name' => "$name",
				'phone' => "$phone",
				'email' => "$email",
				'password' => "$password",
				'majors_id' => "$majors_id",
				'role_id' => "$role_id"
			]
			// 'form_params' => $data
		]);
		echo $res->getStatusCode();
		echo $res->getHeader('content-type')[0];
		echo $res->getBody();
		redirect('a_dashboard/getUserList');
	}

	public function test(){
		$test = $this->session->userdata('test');
		// echo $test['npm'];
		// echo $test['role_id'];
		print_r($test);
	}
}