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
		$this->load->library('guzzle');
		$namaProject				= $this->input->post('name');
		$deskripsi					= $this->input->post('deskripsi');
		$prasyarat					= $this->input->post('prasyarat');
		$batasPendaftaran			= $this->input->post('batasPendaftaran');
		$kuota						= $this->input->post('kuota');
		$pengampu					= $this->session->userdata('name');
		$id_pengampu				= $this->session->userdata('user_id');

		$data = array(
			'nama_project'			=> $namaProject,
			'deskripsi'				=> $deskripsi,
			'prasyarat'				=> $prasyarat,
			'batas_pendaftaran'		=> $batasPendaftaran,
			'kuota'					=> $kuota,
			'pengampu'				=> $pengampu,
			'id_pengampu' 			=> $id_pengampu,
		);
		$this->model_project->input_data($data, 'tb_project');
		// redirect('dosen/dashboard');
	}
}