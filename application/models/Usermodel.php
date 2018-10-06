<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {

	public function ChackLogin($input)
	{
		$data = $this->db
		->where('user_username', $input['user_username'])
		->where('user_password', $input['user_password'])
		->get('user')
		->result_array();
		unset($data[0]->user_password);
		return $data;
	}

	public function selectUser($input)
	{
		$this->db->select('user_id,user_personal_id,user_username,user_fname,user_lname,user_address, districts.DISTRICT_NAME as new_subdistrict, amphures.AMPHUR_NAME as new_district, provinces.PROVINCE_NAME as new_province,user_zipcode,user_tel,user_email,user_area,(select DISTRICT_NAME from districts where DISTRICT_ID = user_area) as new_area, user_type_id, user_register, user_last_update');
		$this->db->where('user_id', $input['user_id']);
		$this->db->from('user');
		$this->db->join('districts','user.user_subdistrict = districts.DISTRICT_ID','left');
		$this->db->join('amphures','user.user_district = amphures.AMPHUR_ID','left');
		$this->db->join('provinces','user.user_province = provinces.PROVINCE_ID','left');
		// $this->db->join('zipcodes','user.user_zipcode = zipcodes.id','left');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function selectUserForUpdate($id){
		$data = $this->db
		->where('user_id',$id)
		->get('user')
		->result_array();
		return $data;
	}

	public function updateUser($input)
	{
		// $id = $input['user_id'];
		// $id_personal = $input['user_personal_id'];
		// unset($input['user_id']);
		// unset($input['user_personal_id']);
		// $this->db->where('user_id', $id);
		$this->db->where('user_personal_id', $input['user_personal_id']);
		$this->db->update('user',$input);
		return $this->db->affected_rows();
	}

	public function updateUserId($input)
	{
		$this->db->where('user_id', $input['user_id']);
		$this->db->update('user',$input);
		return $this->db->affected_rows();
	}

	public function userType(){
		$data = $this->db
		->get('user_type')
		->result_array();
		return $data;
	}

	public function userOneType($id){
		$data = $this->db
		->where('user_type_id', $id)
		->get('user_type')
		->result_array();
		return $data;
	}

	public function selectUserType($id){
		$this->db->select('user_id,user_personal_id,user_username,user_fname,user_lname,user_address, districts.DISTRICT_NAME as new_subdistrict, amphures.AMPHUR_NAME as new_district, provinces.PROVINCE_NAME as new_province,zipcodes.zipcode as new_zipcode,user_tel,user_email,(select DISTRICT_NAME from districts where DISTRICT_ID = user_area) as new_area, user_type_id, user_register, user_last_update');
		$this->db->where('user_type_id', $id);
		$this->db->from('user');
		$this->db->join('districts','user.user_subdistrict = districts.DISTRICT_ID','left');
		$this->db->join('amphures','user.user_district = amphures.AMPHUR_ID','left');
		$this->db->join('provinces','user.user_province = provinces.PROVINCE_ID','left');
		$this->db->join('zipcodes','user.user_zipcode = zipcodes.id','left');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function userDelete($id){
		$this->db->where('user_id',$id)->delete('user');
	}

	public function AllProvince(){
		$data = $this->db
		->order_by('PROVINCE_NAME','asc')
		->get('provinces')
		->result_array();
		return $data;
	}
	public function AllDistrict($id){
		$data = $this->db
		->where('PROVINCE_ID', $id)
		->order_by('AMPHUR_NAME','asc')
		->get('amphures')
		->result_array();
		return $data;
	}
	public function AllSubdistrict($id){
		$data = $this->db
		->where('AMPHUR_ID', $id)
		->order_by('DISTRICT_NAME','asc')
		->get('districts')
		->result_array();
		return $data;
	}


//// load location
	public function getProvinces(){
      $this->db->select('PROVINCE_ID,PROVINCE_NAME');
			$this->db->order_by('PROVINCE_NAME','asc');
      $this->db->from('provinces');
      $query = $this->db->get();
      // the query mean select cat_id,category from category
      foreach($query->result_array() as $row){
         $data[$row['PROVINCE_ID']]=$row['PROVINCE_NAME'];
      }
      // the fetching data from database is return
      return $data;
   }
   //fill your cities dropdown depending on the selected city
   public function getDistricts($PROVINCE_ID=string){
      $this->db->select('AMPHUR_ID,AMPHUR_NAME');
			$this->db->order_by('AMPHUR_NAME','asc');
      $this->db->from('amphures');
      $this->db->where('PROVINCE_ID',$PROVINCE_ID);
      $query = $this->db->get();
      return $query->result();
   }

	 public function getSubDistricts($AMPHUR_ID=string){
      $this->db->select('DISTRICT_ID,DISTRICT_NAME');
			$this->db->order_by('DISTRICT_NAME','asc');
      $this->db->from('districts');
      $this->db->where('AMPHUR_ID',$AMPHUR_ID);
      $query = $this->db->get();
      return $query->result();
   }

	 public function userInsert($input)
	 {
	 	$this->db->insert('user', $input);
	 }






















	public function getMember($input){
		$data = $this->db
		->where('member_id !=', $input['member_id'])
		->where('tb_class_id', $input['tb_class_id'])
		->get('member')
		->result_array();
		return $data;
	}



	public function selectUserEdit($id)
	{
		$data = $this->db
		->where('member_id', $id)
		->get('member')
		->result_array();
		return $data;
	}

	public function selectAdvisors($input)
	{
		$data = $this->db
		->where('tb_class_id', $input['tb_class_id'])
		->where('member_type_id', 1)
		->get('member')
		->result_array();
		return $data;
	}

	public function selectUserAll($input)
	{
		$data = $this->db
		->where('member_type_id', 2)
		->where('tb_class_id', $input['tb_class_id'])
		->order_by('member_id', 'asc')
		->get('member')
		->result();
		return $data;
	}

	public function selectUserTeacher()
	{
		$data = $this->db
		->where('member_type_id', 1)
		->join('tb_class','member.tb_class_id = tb_class.tb_class_id','left')
		->order_by('member_id', 'asc')
		->get('member')
		->result_array();
		return $data;
	}
	public function selectUserStudent()
	{
		$this->db->select('member.member_id,member_name,member_phone,member_gpa,member_username,tb_class.tb_class_id,tb_class_name,tb_class_year,tb_class_major,(select member_name from member where member_id = tb_class_active) as tb_class_advisor');
    $this->db->where('member_type_id', 2);
    $this->db->from('member');
		$this->db->join('tb_class','member.tb_class_id = tb_class.tb_class_id','left');
		$this->db->order_by('member_id', 'asc');
    $query = $this->db->get()->result_array();
    return $query;
	}



	function insert($data)
	{
		$this->db->insert_batch('member', $data);
	}

}
