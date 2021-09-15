<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('from_validation');
	}

	 public function index(){
		$this->load->view('templates/auth_header');
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
	}

	public function registration()
	{
		$this->from_validation->set_rules('name', 'Name', 'required|trim');
		$this->from_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if( $this->from_validation->run() == false)
		{
			$data['title'] = 'WPU user Registration';
		 $this->load->view('templates/auth_header', $data);
		 $this->load->view('auth/registration');
		 $this->load->view('templates/auth_footer');
		}else {
	    	echo 'data berhasi';
		}
	}
}

?>