<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function dashboard()
	{
		$this->load->library('session');
		if($this->session->userdata('role')=='staff'){
			$id = $this->session->userdata('user_id');
			$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];
			$data['project'] = $this->model_project->view_mydata()->result();
			$data['user'] = $this->model_user->cek_dosen($id);
			$this->load->view('dosen/header',$data);
			$this->load->view('dosen/dashboard_dosen', $data);
			$this->load->view('footer');
		}else{
			redirect('welcome/login');
		}
		
	}
}