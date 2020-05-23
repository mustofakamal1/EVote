<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_dashboard extends CI_Controller {

	public function index()
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 2) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}	
	}

	public function vote_list()
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 2) {
			// $data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
			$client = new GuzzleHttp\Client();
			$res = $client->request('GET', 'http://localhost/pemilu/database/field');
			$res2 = $client->request('GET', "http://localhost/pemilu/database/vote_history");
			// $ress = $client->request('GET', 'http://localhost/pemilu/database/position');
			// $res1 = $client->request('GET', 'http://localhost/pemilu/database/candidate');
			// $res2 = $client->request('GET', 'http://localhost/pemilu/database/user');
			// echo $res->getStatusCode();
			// echo $res->getHeader('content-type')[0];
			// echo $res->getBody();
			$data['field'] = json_decode($res->getBody());
			$data['votes'] = json_decode($res2->getBody());
			// $data['position'] = json_decode($ress->getBody());
			// $data['candidate'] = json_decode($res1->getBody());
			// $data['users'] = json_decode($res2->getBody());
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/voting', $data);
			// $this->load->view('testing/users', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function vote_list_field($id)
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 2) {
			// $data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
			$client = new GuzzleHttp\Client();
			$res = $client->request('GET', "http://localhost/pemilu/database/field/$id");
			$ress = $client->request('GET', "http://localhost/pemilu/database/position");
			$res1 = $client->request('GET', "http://localhost/pemilu/database/candidate");
			$res2 = $client->request('GET', "http://localhost/pemilu/database/user");
			$res3 = $client->request('GET', "http://localhost/pemilu/database/vote_history");
			// echo $res->getStatusCode();
			// echo $res->getHeader('content-type')[0];
			// echo $res->getBody();
			$data['field'] = json_decode($res->getBody());
			$data['position'] = json_decode($ress->getBody());
			$data['candidate'] = json_decode($res1->getBody());
			$data['users'] = json_decode($res2->getBody());
			$data['votes'] = json_decode($res3->getBody());
			$data['id'] = $id;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/voting_now', $data);
			// $this->load->view('testing/users', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function votes($field_id)
	{
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 2) {
			// $data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
			// $user_id 		= $this->input->post('user_id');
			// $candidate_id 		= $this->input->post('candidate_id');
			$input = $this->input->post();
			$user_id = $data['user']['id'];
			$client = new GuzzleHttp\Client();
			$res2 = $client->request('GET', "http://localhost/pemilu/database/vote_history");
			$votes = json_decode($res2->getBody());
			foreach($votes as $vot){
				if($vot->user_id == $data['user']['id'] && $vot->field_id == $field_id){
					redirect('u_dashboard/vote_list');
				}
			}
			foreach($input as $index => $candidate_id){
			$res = $client->request('POST', "http://localhost/pemilu/database/vote_history/", [
				'form_params' => [
					'user_id' => "$user_id",
					'candidate_id' => "$candidate_id",
					'field_id' => "$field_id",
				]
			]);
			}
			redirect('u_dashboard/vote_list');
		}
		else {
			redirect('authentication');
		}
	}

	public function result(){
		$test = $this->session->userdata('test');
		$candidate_id = $this->input->post('candidate_id');
		$user_id = $this->input->post('user_id');
		$input = $this->input->post();
		// foreach ($test['field'] as $object) {
		// 	$array += array($object->id => $object->field);
		// } 
		// echo $candidate_id;
		// echo $user_id;
		// echo $input;
		// echo $test['role_id'];
		print_r($input);
	}

	public function test(){
		$test = $this->session->userdata('test');
		$candidate_id = $this->input->post('candidate_id');
		$user_id = $this->input->post('user_id');
		$input = $this->input->post();
		// foreach ($test['field'] as $object) {
		// 	$array += array($object->id => $object->field);
		// } 
		// echo $candidate_id;
		// echo $user_id;
		// echo $input;
		// echo $test['role_id'];
		print_r($input);
	}
}