<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_dashboard extends CI_Controller {
	public function index()
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
			// echo $data['user']['role_id'];
		}
	}

	public function getUser($id)
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			// $data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
			$client = new GuzzleHttp\Client();
			$res = $client->request('GET', "http://localhost/pemilu/database/user/0/0/$id");
			// echo $res->getStatusCode();
			// echo $res->getHeader('content-type')[0];
			// echo $res->getBody();
			$data['getUser'] = json_decode($res->getBody());
			// echo empty($data['getUser']);
			// $this->load->view('templates/header');
			// $this->load->view('templates/sidebar', $data);
			// $this->load->view('admin/candidate_list', $data);
			// $this->load->view('testing/users', $data);
			// $this->load->view('templates/footer');
			// echo $res->getBody();
			return $data['getUser']->id;
		}
		else {
			redirect('authentication');
		}
	}

	public function getUserList()
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1 || 2) {
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
		else {
			redirect('authentication');
		}
	}

	public function getFieldList()
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/dashboard', $data);
			// $this->load->view('testing/users', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function getCandidateList()
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/candidate/"));
			$data['field'] = json_decode(file_get_contents("http://localhost/pemilu/database/field/"));
			$data['position'] = json_decode(file_get_contents("http://localhost/pemilu/database/position/"));
			$array = array();
			$i = 0;
			foreach ($data['users'] as $object) {
				$data['canlist'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/0/0/$object->user_id"));
				// $data['users']['name'] = $data['canlist']->name;
				// $test = array_merge(array($data['users'][$i]), array($data['canlist']));
				$data['users'][$i]->name = $data['canlist']->name;
				$i++;
			}
			// $test = $data;
			// $this->session->set_userdata('test', $test);
			// redirect('A_dashboard/test');
			// print_r($data['users']);
			// echo $data['users'][0]['name'];
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/candidate_list', $data);
			// $this->load->view('testing/users', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function add_user(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$data['role'] = json_decode(file_get_contents("http://localhost/pemilu/database/role/"));
			$data['majors'] = json_decode(file_get_contents("http://localhost/pemilu/database/majors/"));
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/add_user');
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function post_add_user(){
		// $data = $this->input->post();
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$npm 		= $this->input->post('npm');
			$name 		= $this->input->post('name');
			$phone 		= $this->input->post('phone');
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');
			$password 	= md5("$password");
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
		else {
			redirect('authentication');
		}
	}

	public function del_user($id){
		// $test = $this->session->userdata('test');
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
		$client = new GuzzleHttp\Client();
		$res = $client->request('DELETE', "http://localhost/pemilu/database/user/$id");
		redirect('a_dashboard/getUserList');
		}
		else {
			redirect('authentication');
		}
	}

	public function add_candidate(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
			$data['candidate'] = json_decode(file_get_contents("http://localhost/pemilu/database/candidate/"));
			$data['field'] = json_decode(file_get_contents("http://localhost/pemilu/database/field/"));
			$data['position'] = json_decode(file_get_contents("http://localhost/pemilu/database/position/"));
			$arr = array();
			foreach ($data['candidate'] as $object) {
				array_push($arr, $object->user_id);
			}
			$data['can'] = $arr;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/add_candidate', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function post_add_candidate(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$user_id 	= $this->input->post('user_id');
			$field_id 		= $this->input->post('field_id');
			$position_id 		= $this->input->post('position_id');
		$client = new GuzzleHttp\Client();
		$res = $client->request('POST', 'http://localhost/pemilu/database/candidate/', [
			'form_params' => [
				'user_id' => "$user_id",
				'field_id' => "$field_id",
				'position_id' => "$position_id",
			]
			// 'form_params' => $data
		]);
		echo $res->getStatusCode();
		echo $res->getHeader('content-type')[0];
		echo $res->getBody();
		redirect('a_dashboard/getCandidateList');
			}
		else {
			redirect('authentication');
		}
	}

	public function del_candidate($id){
		// $test = $this->session->userdata('test');
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
		$client = new GuzzleHttp\Client();
		$res = $client->request('DELETE', "http://localhost/pemilu/database/candidate/$id");
		redirect('a_dashboard/getCandidateList');
		}
		else {
			redirect('authentication');
		}
	}

	public function voting_list()
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$data['position'] = json_decode(file_get_contents("http://localhost/pemilu/database/position/"));
			$client = new GuzzleHttp\Client();
			$res = $client->request('GET', 'http://localhost/pemilu/database/field');
			// echo $res->getStatusCode();
			// echo $res->getHeader('content-type')[0];
			// echo $res->getBody();
			$data['field'] = json_decode($res->getBody());
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/vote_list', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function change_field($id, $state){
		// $test = $this->session->userdata('test');
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
		$client = new GuzzleHttp\Client();
		$state = !$state;
		$res = $client->request('PUT', "http://localhost/pemilu/database/field/$id", [
			'form_params' => [
				'state' => "$state",
			]
		]);
		redirect('a_dashboard/voting_list');
		}
		else {
			redirect('authentication');
		}
	}

	public function edit_candidate($id){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$candidate = json_decode(file_get_contents("http://localhost/pemilu/database/candidate/$id"));
			$user = json_decode(file_get_contents("http://localhost/pemilu/database/user/0/0/$candidate->user_id"));
			$field = json_decode(file_get_contents("http://localhost/pemilu/database/field/$candidate->field_id"));
			$position = json_decode(file_get_contents("http://localhost/pemilu/database/position/$candidate->position_id"));
			$data['field'] = json_decode(file_get_contents("http://localhost/pemilu/database/field/"));
			$data['position'] = json_decode(file_get_contents("http://localhost/pemilu/database/position/"));
			$data['id'] = $id;
			// $data['user_id'] = $candidate->id;
			$data['name'] = $user->name;
			$data['f_id'] = $field->id;
			$data['p_id'] = $position->id;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit_candidate', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function put_edit_candidate(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$id 		= $this->input->post('user_id');
			$field_id 		= $this->input->post('field_id');
			$position_id 		= $this->input->post('position_id');
			// $data_session = array(
			// 	'npm'			=> $this->input->post('npm'),
			// 	'role_id'				=> $this->input->post('role_id'),
			// );
			// $this->session->set_userdata('test', $data);
			$client = new GuzzleHttp\Client();
			$res = $client->request('PUT', "http://localhost/pemilu/database/candidate/$id", [
				'form_params' => [
					'field_id' => "$field_id",
					'position_id' => "$position_id",
				]
				// 'form_params' => $data
			]);
			echo $res->getStatusCode();
			echo $res->getHeader('content-type')[0];
			echo $res->getBody();
			redirect('a_dashboard/getCandidateList');
			}
		else {
			redirect('authentication');
		}
	}

	public function add_vote(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$data['field'] = json_decode(file_get_contents("http://localhost/pemilu/database/field/"));
			$data['position'] = json_decode(file_get_contents("http://localhost/pemilu/database/position/"));
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/add_vote');
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function add_pos(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$data['position'] = json_decode(file_get_contents("http://localhost/pemilu/database/position/"));
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/add_pos');
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function post_add_vote(){
		// $data = $this->input->post();
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$field 		= $this->input->post('field');
			$state 	= false;
			// $data_session = array(
			// 	'npm'			=> $this->input->post('npm'),
			// 	'role_id'				=> $this->input->post('role_id'),
			// );
			// $this->session->set_userdata('test', $data);
			$client = new GuzzleHttp\Client();
			$res = $client->request('POST', 'http://localhost/pemilu/database/field/', [
				'form_params' => [
					'field' => "$field",
					'state' => "$state"
				]
			]);
			echo $res->getStatusCode();
			echo $res->getHeader('content-type')[0];
			echo $res->getBody();
			redirect('a_dashboard/voting_list');
		}
		else {
			redirect('authentication');
		}
	}

	public function post_add_pos(){
		// $data = $this->input->post();
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
			$position 		= $this->input->post('position');
			// $data_session = array(
			// 	'npm'			=> $this->input->post('npm'),
			// 	'role_id'				=> $this->input->post('role_id'),
			// );
			// $this->session->set_userdata('test', $data);
			$client = new GuzzleHttp\Client();
			$res = $client->request('POST', 'http://localhost/pemilu/database/position/', [
				'form_params' => [
					'position' => "$position"
				]
			]);
			echo $res->getStatusCode();
			echo $res->getHeader('content-type')[0];
			echo $res->getBody();
			redirect('a_dashboard/voting_list');
		}
		else {
			redirect('authentication');
		}
	}

	public function del_vote($id){
		// $test = $this->session->userdata('test');
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
		$client = new GuzzleHttp\Client();
		$res = $client->request('DELETE', "http://localhost/pemilu/database/field/$id");
		redirect('a_dashboard/voting_list');
		}
		else {
			redirect('authentication');
		}
	}

	public function del_pos($id){
		// $test = $this->session->userdata('test');
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1) {
		$client = new GuzzleHttp\Client();
		$res = $client->request('DELETE', "http://localhost/pemilu/database/position/$id");
		redirect('a_dashboard/voting_list');
		}
		else {
			redirect('authentication');
		}
	}

	public function test(){
		$test = $this->session->userdata('test');
		$array = [];
		foreach ($test['field'] as $object) {
			$array += array($object->id => $object->field);
		} 
		// echo $test['npm'];
		// echo $test['role_id'];
		print_r($array);
	}
}