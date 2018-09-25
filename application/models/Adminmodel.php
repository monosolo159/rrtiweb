<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {
	public function login($input)
	{
		return $this->db
		->where('admin_username',$input['admin_username'])
		->where('admin_password',$input['admin_password'])
		->get('admin')->result_array();
	}
}
