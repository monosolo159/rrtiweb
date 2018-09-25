<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!isset($_SESSION)) {
			session_start();
		}
		$this->load->model('Usermodel');
		$this->load->library('csvimport');
	}

	public function memberInsert()
	{
		$input = $this->input->post();
		$input['member_password'] = md5($input['member_password']);
		$this->Usermodel->memberInsert($input);
		redirect('Home/student');
	}

	public function teacherInsert()
	{
		$input = $this->input->post();
		if(count($this->Usermodel->selectUserEdit($input['member_id']))>0){
			redirect('Home/teacher_insert/errorid');
		}
		if($input['member_password_confirm']==$input['member_password']){
			unset($input['member_pic']);
			unset($input['member_password_confirm']);
			$input['member_pic'] = $input['member_id'].".jpg";
			move_uploaded_file($_FILES["member_pic"]["tmp_name"],"assets/img/profiles/".$input['member_id'].".jpg");

			$input['member_password'] = md5($input['member_password']);
			$this->Usermodel->memberInsert($input);

			$class['tb_class_id'] = $input['tb_class_id'];
			$class['tb_class_active'] = $input['member_id'];
			$this->Classmodel->classEdit($class);
			redirect('Home/teacher');
		}else{
			redirect('Home/teacher_insert/error');
		}

	}

	public function teacherEdit(){
		$input = $this->input->post();
		$this->Usermodel->updateUser($input);

		$class['tb_class_id'] = $input['tb_class_id'];
		$class['tb_class_active'] = $input['member_id'];
		$this->Classmodel->classEdit($class);
		redirect('Home/teacher');
	}

	public function studentEdit(){
		$input = $this->input->post();
		$this->Usermodel->updateUser($input);
		redirect('Home/student');
	}

	public function teacherPassword(){
		$input = $this->input->post();
		$input['member_password'] = md5($input['member_password']);
		$this->Usermodel->updateUser($input);
		redirect('Home/teacher');
	}

	public function studentPassword(){
		$input = $this->input->post();
		$input['member_password'] = md5($input['member_password']);
		$this->Usermodel->updateUser($input);
		redirect('Home/student');
	}

	public function teacher_delete(){
		$id = $this->uri->segment(3);
		$classid = $this->uri->segment(4);
		$class['tb_class_id'] = $classid;
		$class['tb_class_active'] = 'no';
		$this->Classmodel->classEdit($class);
		$this->Usermodel->memberDelete($id);
		redirect('Home/teacher');
	}

	public function student_delete(){
		$id = $this->uri->segment(3);
		$this->Usermodel->memberDelete($id);
		redirect('Home/student');
	}

	public function classInsert()
	{
		$input = $this->input->post();
		$this->Classmodel->classInsert($input);
		redirect('Home/c_class');
	}

	public function class_delete(){
		$id = $this->uri->segment(3);
		$this->Classmodel->classDelete($id);
		redirect('Home/c_class');
	}

	public function classEdit(){
		$input = $this->input->post();
		$this->Classmodel->classEdit($input);
		redirect('Home/c_class');
	}

	public function studentInsert()
	{
		$input = $this->input->post();

		unset($input['member_pic']);
		$input['member_pic'] = $input['member_id'].".jpg";
		move_uploaded_file($_FILES["member_pic"]["tmp_name"],"assets/img/profiles/".$input['member_id'].".jpg");

		$input['member_username'] = $input['member_id'];
		$input['member_password'] = md5($input['member_password']);
		$this->Usermodel->memberInsert($input);
		redirect('Home/student');
	}

	public function teacher_import()
	{
		$typeid = $this->input->post();
		move_uploaded_file($_FILES["imgfiles"]["tmp_name"],"assets/uploads/member.csv");
		$objCSV = fopen("assets/uploads/member.csv", "r");
		while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
			$data[] = array(
				'member_id' => $objArr[0],
				'member_name' => iconv("tis-620", "utf-8", $objArr[1]),
				'member_phone'  => $objArr[2],
				'member_username'   => $objArr[0],
				'member_password'   => md5($objArr[0]),
				'member_type_id'   => $typeid['member_type_id']
			);
		}
		$this->Usermodel->insert($data);
		fclose($objCSV);
		redirect('Home/teacher');
	}

	public function student_import()
	{
		$typeid = $this->input->post();
		move_uploaded_file($_FILES["imgfiles"]["tmp_name"],"assets/uploads/member.csv");
		$objCSV = fopen("assets/uploads/member.csv", "r");
		while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
			$data[] = array(
				'member_id' => $objArr[0],
				'member_name' => iconv("tis-620", "utf-8", $objArr[1]),
				// 'member_phone'  => $objArr[2],
				'member_gpa'  => $objArr[2],
				'tb_class_id'  => $objArr[3],
				'member_username'   => $objArr[0],
				'member_password'   => md5($objArr[0]),
				'member_type_id'   => $typeid['member_type_id']
			);
		}
		$this->Usermodel->insert($data);
		fclose($objCSV);
		redirect('Home/student');
	}

	public function member_pic(){
		$input = $this->input->post();
		unset($input['member_pic']);
		$input['member_pic'] = $input['member_id'].".jpg";
		move_uploaded_file($_FILES["member_pic"]["tmp_name"],"assets/img/profiles/".$input['member_id'].".jpg");
		$this->Usermodel->updateUser($input);
		redirect('Home/member_pic/'.$input['member_id']);
	}

}
