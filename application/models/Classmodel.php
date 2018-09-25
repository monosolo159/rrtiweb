<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classmodel extends CI_Model {



	public function getClassInsert()
	{
		$this->db->select('tb_class_id,tb_class_name,tb_class_year,tb_class_major');
    $this->db->where('tb_class_active','no');
    $this->db->from('tb_class');
    $query = $this->db->get()->result_array();
    return $query;
	}

	public function getClassInsertStudent()
	{
		$this->db->select('tb_class_id,tb_class_name,tb_class_year,tb_class_major');
    $this->db->from('tb_class');
    $query = $this->db->get()->result_array();
    return $query;
	}

	public function getClassEdit($id)
	{
		$this->db->select('tb_class_id,tb_class_name,tb_class_year,tb_class_major');
    $this->db->where('tb_class_active','no');
		$this->db->or_where('tb_class_active',$id);
    $this->db->from('tb_class');
    $query = $this->db->get()->result_array();
    return $query;
	}

	public function classInsert($input)
	{
		$data = $this->db->insert('tb_class',$input);
	}

	public function classDelete($id){
		$this->db->where('tb_class_id',$id)->delete('tb_class');
	}

	public function selectClass($id){
		return $this->db->where('tb_class_id',$id)->get('tb_class')->result_array();
	}

	public function classEdit($input){
		$this->db->where('tb_class_id',$input['tb_class_id'])->update('tb_class',$input);
	}

}
