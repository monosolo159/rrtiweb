<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
	}

	public function login()
	{
		$input['admin_username'] = $this->input->post('txtusername');
		$input['admin_password'] = md5($this->input->post('txtpassword'));

		$query = $this->Adminmodel->login($input);
		// print_r($query);
		if (empty($query))
		{
			$_SESSION['ADMIN_LOGIN'] = 'USERNAME / PASSWORD ไม่ถูกต้อง';
			redirect('Home/login');
		} else {
			unset($_SESSION['ADMIN_LOGIN']);
			$_SESSION['ADMIN_NAME'] = $query[0]['admin_name'];
			$_SESSION['ADMIN_ID'] = $query[0]['admin_id'];

			redirect('Home/teacher');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('Home/login');
	}
}
