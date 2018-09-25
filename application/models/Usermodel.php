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
		$this->db->select('user_id,user_fname,user_lname,user_address, districts.DISTRICT_NAME as new_subdistrict, amphures.AMPHUR_NAME as new_district, provinces.PROVINCE_NAME as new_province,zipcodes.zipcode as new_zipcode,user_tel,user_email,(select DISTRICT_NAME from districts where DISTRICT_ID = user_area) as new_area');
		$this->db->where('user_id', $input['user_id']);
		$this->db->from('user');
		$this->db->join('districts','user.user_subdistrict = districts.DISTRICT_ID','left');
		$this->db->join('amphures','user.user_district = amphures.AMPHUR_ID','left');
		$this->db->join('provinces','user.user_province = provinces.PROVINCE_ID','left');
		$this->db->join('zipcodes','user.user_zipcode = zipcodes.id','left');
		// $this->db->join('member_type','member.member_type_id = member_type.member_type_id');
		$query = $this->db->get()->result_array();


		// $this->db->select('*');
		// $this->db->where('user_id', $input['user_id']);
		// $this->db->from('user');
		// $query = $this->db->get()->result_array();

		return $query;
	}






















	public function memberInsert($input)
	{
		$this->db->insert('member', $input);
	}

	public function updateUser($input)
	{
		$id = $input['member_id'];
		unset($input['member_id']);
		$this->db->where('member_id', $id);
		$this->db->update('member',$input);
		return $this->db->affected_rows();
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

	public function memberDelete($id){
		$this->db->where('member_id',$id)->delete('member');
	}

	function insert($data)
	{
		$this->db->insert_batch('member', $data);
	}

}
