<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function vote(){
		$this->load->view('header');
		$this->load->view('user/vote');
	}

}
