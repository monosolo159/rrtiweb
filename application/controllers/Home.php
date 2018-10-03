<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
	}
	public function loadview($value)
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view($value['view'],$value['result']);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$value = array(
			'result' => array(
			),
			'view' => 'dashboard'
		);
		$this->loadview($value);
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function dashboard()
	{
		// print_r('asdasd');
		$value = array(
			'result' => array(
			),
			'view' => 'dashboard'
		);
		$this->loadview($value);
	}
























	public function c_class(){
		$query = $this->Classmodel->getClassInsertStudent();
		$value = array(
			'result' => array(
				'c_class' => $query
			),
			'view' => 'class_list'
		);
		$this->loadview($value);
	}

	public function class_insert(){
		$value = array(
			'result' => array(
			),
			'view' => 'class_insert'
		);
		$this->loadview($value);
	}

	public function class_edit(){
		$id = $this->uri->segment(3);
		$query = $this->Classmodel->selectClass($id);
		$value = array(
			'result' => array(
				'c_class' => $query
			),
			'view' => 'class_edit'
		);
		$this->loadview($value);
	}

	public function teacher_edit(){
		$id = $this->uri->segment(3);
		$c_class = $this->Classmodel->getClassEdit($id);
		$query = $this->Usermodel->selectUserEdit($id);
		$value = array(
			'result' => array(
				'teacher' => $query,
				'c_class' => $c_class
			),
			'view' => 'teacher_edit'
		);
		$this->loadview($value);
	}


	public function teacher()
	{
		$query = $this->Usermodel->selectUserTeacher();
		$value = array(
			'result' => array(
				'teacher' => $query
			),
			'view' => 'teacher_list'
		);
		$this->loadview($value);
	}

	public function student()
	{
		$query = $this->Usermodel->selectUserStudent();
		$value = array(
			'result' => array(
				'student' => $query
			),
			'view' => 'student_list'
		);
		$this->loadview($value);
	}

	public function student_edit()
	{
		$id = $this->uri->segment(3);
		$c_class = $this->Classmodel->getClassInsertStudent();
		$query = $this->Usermodel->selectUserEdit($id);
		$value = array(
			'result' => array(
				'student' => $query,
				'c_class' => $c_class
			),
			'view' => 'student_edit'
		);
		$this->loadview($value);
	}

	public function member_pic()
	{
		$id = $this->uri->segment(3);
		$query = $this->Usermodel->selectUserEdit($id);
		$value = array(
			'result' => array(
				'member' => $query
			),
			'view' => 'member_pic'
		);
		$this->loadview($value);
	}


	public function student_password()
	{
		$id = $this->uri->segment(3);
		$query = $this->Usermodel->selectUserEdit($id);
		$value = array(
			'result' => array(
				'student' => $query
			),
			'view' => 'student_password'
		);
		$this->loadview($value);
	}

	public function student_insert(){
		$query = $this->Classmodel->getClassInsertStudent();
		$value = array(
			'result' => array(
				'cclass' => $query
			),
			'view' => 'student_insert'
		);
		$this->loadview($value);
	}

	public function teacher_insert(){
		$query = $this->Classmodel->getClassInsert();
		$value = array(
			'result' => array(
				'cclass' => $query
			),
			'view' => 'teacher_insert'
		);
		$this->loadview($value);
	}

	public function teacher_password()
	{
		$id = $this->uri->segment(3);
		$query = $this->Usermodel->selectUserEdit($id);
		$value = array(
			'result' => array(
				'teacher' => $query
			),
			'view' => 'teacher_password'
		);
		$this->loadview($value);
	}

	public function teacher_import(){
		$value = array(
			'result' => array(
			),
			'view' => 'teacher_import'
		);
		$this->loadview($value);
	}

	public function student_import(){
		$value = array(
			'result' => array(
			),
			'view' => 'student_import'
		);
		$this->loadview($value);
	}


}
