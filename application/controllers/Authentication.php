<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();		
		//$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('common/login_page');
	}

	function login() {
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);
		$email = "admin@gmail.com";
		$password = "21232f297a57a5a743894a0e4a801fc3";
		// $your_url = "http://localhost/pemilu/database/user/$email/$password";
		// $data['json'] = file_get_contents($your_url);
		// $data['test'] = json_decode($data['json']);
		$client = new GuzzleHttp\Client();
		$res = $client->request('GET', "http://localhost/pemilu/database/user/$email/$password/");
		$data['test'] = json_decode($res->getBody());
		$login['id'] =  $data['test'] -> id;
		$login['npm'] =  $data['test'] -> npm;
		$login['name'] =  $data['test'] -> name;
		$login['phone'] =  $data['test'] -> phone;
		$login['email'] =  $data['test'] -> email;
		$login['password'] =  $data['test'] -> password;
		$login['majors_id'] =  $data['test'] -> majors_id;
		$login['role_id'] =  $data['test'] -> role_id;
		// $this->session->set_flashdata($data);
		$cek = strcmp($email, $login['email']) || strcmp($password, $login['password']) 
		|| strcmp(1, $login['role_id']);
		$cek2 = strcmp($email, $login['email']) || strcmp($password, $login['password']) 
		|| strcmp(1, $login['role_id']);

		if ($cek == 0){
			$data_session['user'] = $login;
			$this->session->set_userdata('data', $data_session);
			redirect("a_dashboard");
		}
		else if ($cek2 == 0) {
			$data_session['user'] = $login;
			$this->session->set_userdata('data', $data_session);
			redirect("u_dashboard");
		}
		else {
			redirect('authentication');
			// redirect("u_dashboard");
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('authentication');
	}
}
