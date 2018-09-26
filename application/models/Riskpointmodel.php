<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riskpointmodel extends CI_Model {
	public function selectAllRiskpoint($input)
	{
		$this->db->select('riskpoint_id, riskpoint_name, riskpoint_detail, riskpoint_location, riskpoint_status.riskpoint_status_name, riskpoint_piority.riskpoint_piority_name, user_from_id, riskpoint_date, riskpoint_last_update, (select user_fname+" "+user_lname from user where user.user_id = user_from_id) as user_from_name , user_to_id, (select user_fname+" "+user_lname from user where user.user_id = user_to_id) as user_to_name');
		$this->db->where('riskpoint.user_from_id', $input['user_id']);
		$this->db->from('riskpoint');
		$this->db->join('riskpoint_piority','riskpoint.riskpoint_piority_id = riskpoint_piority.riskpoint_piority_id','left');
		$this->db->join('riskpoint_status','riskpoint.riskpoint_status_id = riskpoint_status.riskpoint_status_id','left');
		$this->db->order_by('riskpoint_id','desc');

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function selectRiskpoint($input){
		$this->db->select('riskpoint_id, riskpoint_name, riskpoint_detail, riskpoint_location, riskpoint_status_name, riskpoint_piority_name, riskpoint_date, riskpoint_last_update');
		$this->db->where('riskpoint_id', $input['riskpoint_id']);
		$this->db->from('riskpoint');
		$this->db->join('riskpoint_piority','riskpoint.riskpoint_piority_id = riskpoint_piority.riskpoint_piority_id','left');
		$this->db->join('riskpoint_status','riskpoint.riskpoint_status_id = riskpoint_status.riskpoint_status_id','left');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function selectRiskpointPic($input){
		$this->db->select('*');
		$this->db->where('riskpoint_id', $input['riskpoint_id']);
		$this->db->from('riskpoint_pic');
		$query = $this->db->get()->result_array();
		return $query;
	}
}
