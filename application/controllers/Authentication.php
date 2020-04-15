<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();		
		//$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('login_page');
	}

	function login() {
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);
		$your_url = "http://localhost/e-vote/database/user/$email/$password";
		$data['test'] = file_get_contents($your_url);
		$data['test'] = json_decode($data['test']);
		$this->session->set_flashdata('item', $data);
		// $where = array(
		// 	'email' => $email,
		// 	'password' => md5($password),
		// 	'role_id' => 1
		// 	);
		// $where2 = array(
		// 	'email' => $email,
		// 	'password' => md5($password),
		// 	'role_id' => 2
		// 	);
		//$cek = $this->m_login->cek_login("user",$where)->num_rows();
		//$cek2 = $this->m_login->cek_login("user",$where2)->num_rows();
		if ($cek > 0){

			$data_session = array(
				'email' => $email,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect("a_dashboard");

		}
		else if ($cek2 > 0) {
			$data_session = array(
				'email' => $email,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect("u_dashboard");
		}
		else {
			redirect("u_dashboard");
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('authentication'));
	}
}
