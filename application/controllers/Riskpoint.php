<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riskpoint extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!isset($_SESSION)) {
			session_start();
		}
		$this->load->model('Riskpointmodel');
	}

	public function riskpoint_delete(){
		$id = $this->uri->segment(3);
		$this->Riskpointmodel->riskpointDelete($id);
		redirect('Home/riskpoint/');
	}


	public function riskpointEdit(){
		$input = $this->input->post();
		$this->Riskpointmodel->riskpointEdit($input);
		redirect('Home/riskpoint_manage/'.$input['riskpoint_id']);
	}


}
