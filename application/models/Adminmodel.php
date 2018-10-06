<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {
	public function login($input)
	{
		return $this->db
		->where('user_username',$input['user_username'])
		->where('user_password',$input['user_password'])
		->where('user_type_id !=',5)
		->get('user')->result_array();
	}
}
