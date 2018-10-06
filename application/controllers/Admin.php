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
		$input['user_username'] = $this->input->post('txtusername');
		$input['user_password'] = md5($this->input->post('txtpassword'));

		$query = $this->Adminmodel->login($input);
		// print_r($query);
		if (empty($query))
		{
			$_SESSION['USER_LOGIN'] = 'ชื่อผู้ใช้, รหัสผ่าน หรือสิทธิ์การใช้งานไม่ถูกต้อง';
			redirect('Home/login');
		} else {
			unset($_SESSION['USER_LOGIN']);
			$_SESSION['USER_NAME'] = $query[0]['user_fname'].' '.$query[0]['user_lname'];
			$_SESSION['USER_ID'] = $query[0]['user_id'];
			$_SESSION['USER_TYPE'] = $query[0]['user_type_id'];
			$_SESSION['USER_AREA'] = $query[0]['user_area'];

			redirect('Home/riskpoint');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('Home/login');
	}
}
