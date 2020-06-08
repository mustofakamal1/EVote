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
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 1 || 2) {
			// $data['users'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/"));
			$client = new GuzzleHttp\Client();
			$res = $client->request('GET', "http://localhost/pemilu/database/field/");
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
			$data['vote_history'] = json_decode($res3->getBody());
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/result', $data);
			// $this->load->view('testing/users', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function profile(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 2) {
			$data['majors'] = json_decode(file_get_contents("http://localhost/pemilu/database/majors/"));
			// $data['user_id'] = $candidate->id;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/profile', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('authentication');
		}
	}

	public function put_profile(){
		$data = $this->session->userdata('data');
		if($data['user']['role_id'] == 2) {
			$id 		= $data['user']['id'];
			$password 	= $this->input->post('password');
			if(strcmp(md5($password), $data['user']['password']) != 0 || empty($password)){
				redirect('u_dashboard/profile');
			}
			$npassword 	= $this->input->post('newpassword');
			$array = array(
			'npm' 		=> $this->input->post('npm'),
			'name' 		=> $this->input->post('name'),
			'phone' 	=> $this->input->post('phone'),
			'email' 	=> $this->input->post('email'),
			'majors_id' => $this->input->post('majors_id')
			);
			if(!empty($npassword)){
				$array['password'] = md5($npassword);
			}
			$client = new GuzzleHttp\Client();
			$res = $client->request('PUT', "http://localhost/pemilu/database/user/$id", [
				'form_params' => $array
				// 'form_params' => $data
			]);
			$config['upload_path']          = './assets/user/profile';
			$config['allowed_types']        = 'jpg';
			$config['file_name']            = $id;
			$config['overwrite']			= true;
			$config['max_size']             = 1024; // 1MB
			// $this->load->library('upload', $config);
			$this->load->library('upload'); 
			$this->upload->initialize($config);
			$this->upload->do_upload('image_profile');

			$data['user'] = "";
			$data['user'] = json_decode(file_get_contents("http://localhost/pemilu/database/user/0/0/$id"), true);
			unset($_SESSION['data']);
			$this->session->set_userdata('data', $data);
			// echo $res->getStatusCode();
			// echo $res->getHeader('content-type')[0];
			// echo $res->getBody();
			redirect('u_dashboard/profile');
			}
		else {
			redirect('authentication');
		}
	}

	public function test(){
		// $test = $this->session->userdata('data');
		// $candidate_id = $this->input->post('candidate_id');
		// $user_id = $this->input->post('user_id');
		// $input = $this->input->post();
		// $client = new GuzzleHttp\Client();
		// $res3 = $client->request('GET', "http://localhost/pemilu/database/vote_history");
		// $data['votes'] = json_decode($res3->getBody());
		// foreach ($test['field'] as $object) {
		// 	$array += array($object->id => $object->field);
		// } 
		// echo $candidate_id;
		// echo $user_id;
		// echo $input;
		// echo $test['role_id'];
		// print_r($test);
		// foreach($data['votes'] as $vote){
		// 	echo $vote->candidate_id;
		// }
		$this->load->view('testing/upload');
	}

	public function image(){
		$config['upload_path']          = './assets/user/profile';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = 'test';
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $this->load->library('upload', $config);
		$this->load->library('upload'); 
		$this->upload->initialize($config);
		$this->upload->do_upload('image_profile');
		if (!$this->upload->do_upload('profile_image')) {
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('testing/upload', $error);
		} else {
			$data = array('image_metadata' => $this->upload->data());

			$this->load->view('testing/image', $data);
		} 
	}
}