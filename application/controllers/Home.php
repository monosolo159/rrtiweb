<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('thaidate');
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

	public function user()
	{
		if ($_SESSION['USER_TYPE']!=1) {
			redirect('home/dashboard');
		}
		$id = $this->uri->segment(3);
		$query = $this->Usermodel->selectUserType($id);
		$user_type = $this->Usermodel->userOneType($id);
		$value = array(
			'result' => array(
				'user' => $query,
				'user_type' => $user_type,
				'thaidate' => $this->thaidate
			),
			'view' => 'user_list'
		);
		$this->loadview($value);
	}

	public function user_password(){
		$input['user_id'] = $this->uri->segment(3);
		$user = $this->Usermodel->selectUser($input);
		$user_type = $this->Usermodel->userOneType($input['user_id']);

		$value = array(
			'result' => array(
				'user' => $user,
				'user_type' => $user_type
			),
			'view' => 'user_password'
		);
		$this->loadview($value);
	}

	public function user_edit(){
		$id = $this->uri->segment(3);
		$user = $this->Usermodel->selectUserForUpdate($id);

		$province = $this->Usermodel->AllProvince();
		$district = $this->Usermodel->AllDistrict($user[0]['user_province']);
		$subdistrict = $this->Usermodel->AllSubdistrict($user[0]['user_district']);
		$usertype = $this->Usermodel->userType();
		$area = $this->Usermodel->AllSubdistrict(532);

		$value = array(
			'result' => array(
				'user' => $user,
				'province' => $province,
				'district' => $district,
				'subdistrict' => $subdistrict,
				'usertype' => $usertype,
				'area' => $area
			),
			'view' => 'user_edit'
		);
		$this->loadview($value);
	}

	public function user_pic()
	{
		$id = $this->uri->segment(3);
		$query = $this->Usermodel->selectUserForUpdate($id);
		$value = array(
			'result' => array(
				'user' => $query
			),
			'view' => 'user_pic'
		);
		$this->loadview($value);
	}

	public function user_insert(){

		$province = $this->Usermodel->AllProvince();
		$usertype = $this->Usermodel->userType();
		$area = $this->Usermodel->AllSubdistrict(532);
		$provinces = $this->Usermodel->getProvinces();
		$data['countryDrop'] =

		$value = array(
			'result' => array(
				'usertype' => $usertype,
				'province' => $province,
				'area' => $area,
				'provincesDrop' => $provinces
			),
			'view' => 'user_insert'
		);
		$this->loadview($value);
	}


	public function buildDropDistricts()
	{
		echo $PROVINCE_ID = $this->input->post('id',TRUE);
		$districtData['districtDrop']=$this->Usermodel->getDistricts($PROVINCE_ID);
		$output = null;
		foreach ($districtData['districtDrop'] as $row)
		{
			$output .= "<option value='".$row->AMPHUR_ID."'>".$row->AMPHUR_NAME."</option>";
		}
		echo $output;
	}

	public function buildDropSubDistricts()
	{
		echo $AMPHUR_ID = $this->input->post('id',TRUE);
		$subDistrictData['subDistrictDrop']=$this->Usermodel->getSubDistricts($AMPHUR_ID);
		$output = null;
		foreach ($subDistrictData['subDistrictDrop'] as $row)
		{
			$output .= "<option value='".$row->DISTRICT_ID."'>".$row->DISTRICT_NAME."</option>";
		}
		echo $output;
	}


	public function riskpoint()
	{
		if($_SESSION['USER_TYPE']==1){
			$query = $this->Riskpointmodel->selectAllRiskpointAdmin();
			$value = array(
				'result' => array(
					'riskpoint' => $query,
					'thaidate' => $this->thaidate
				),
				'view' => 'riskpoint_list'
			);
		}else if($_SESSION['USER_TYPE']!=1){
			$query = $this->Riskpointmodel->selectAllRiskpointToArea($_SESSION['USER_AREA']);
			$value = array(
				'result' => array(
					'riskpoint' => $query,
					'thaidate' => $this->thaidate
				),
				'view' => 'riskpoint_list'
			);
		}

		$this->loadview($value);
	}

	public function riskpoint_manage(){
		$id['riskpoint_id'] = $this->uri->segment(3);
		$query = $this->Riskpointmodel->selectRiskpoint($id);
		$query_pic = $this->Riskpointmodel->selectRiskpointPic($id);
		$query_status = $this->Riskpointmodel->getRiskpointStatus();


		$value = array(
			'result' => array(
				'riskpoint' => $query,
				'riskpoint_pic' => $query_pic,
				'riskpoint_status' => $query_status
			),
			'view' => 'riskpoint_manage'
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
