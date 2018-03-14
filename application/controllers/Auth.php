<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//echo do_hash('uniqlo1234');
		//echo do_hash('admin');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
	public function index()
	{
		$this->load->view('login');
	}



	public function do_login()
	{
		$config = array(
			array(
				'field' => 'username',
				'label' => 'username',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'password',
				'rules' => 'required'
			),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$rs = $this->db->where(array(
				'username' => $this->input->post('username'),
				'password' => do_hash($this->input->post('password'))
			))->get('user');
			if ($rs->num_rows() > 0) {
				$this->session->set_userdata('id', $rs->row()->id);
			}
		}

		redirect('');
	}

	public function facebook()
	{

	}
}
