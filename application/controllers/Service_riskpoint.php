<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';


class Service_riskpoint extends REST_Controller
{
  function __construct(){
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
      die();
    }
    parent::__construct();
    //set config for test
    $this->config->load('rest');
    $this->config->set_item('rest_auth', 'none');//turn on rest auth
    $this->config->set_item('auth_source', '');//use config array for authentication
    $this->config->set_item('auth_override_class_method', array('wildcard_test_cases' => array('*' => 'basic')));
    // $this->load->library('email');
    $this->load->helper('url');
  }

  function selectAllRiskpoint_post()
  {
    $input = $this->post();
    $riskpoint = $this->Riskpointmodel->selectAllRiskpoint($input);
    $this->response($riskpoint, 200); // 200 being the HTTP response code
  }

  function selectRiskpoint_post()
  {
    $input = $this->post();
    $riskpoint = $this->Riskpointmodel->selectRiskpoint($input);
    $this->response($riskpoint, 200); // 200 being the HTTP response code
  }

  function selectRiskpointPic_post()
  {
    $input = $this->post();
    $riskpointpic = $this->Riskpointmodel->selectRiskpointPic($input);
    $this->response($riskpointpic, 200); // 200 being the HTTP response code
  }


  function updateRiskpoint_post()
  {
    // $input = $this->post();
    // // if(!empty($input['user_password'])){
    // //   $input['member_password'] = md5($input['member_password']);
    // // }
    // $user = $this->Usermodel->updateUser($input);
    // $this->response($user, 200); // 200 being the HTTP response code
  }

  function getPiority_post(){
    // $input = $this->post();
    $riskpointPiority = $this->Riskpointmodel->getPiority();
    $this->response($riskpointPiority, 200); // 200 being the HTTP response code
  }

  function insertRiskpoint_post(){
    $input = $this->post();
    $input['riskpoint_date'] = date("Y-m-d H:i:s");
    $input['riskpoint_last_update'] = date("Y-m-d H:i:s");
    $riskpoint = $this->Riskpointmodel->insertRiskpoint($input);
    $this->response($riskpoint, 200); // 200 being the HTTP response code
  }

  function uploadImage_post(){
    $this->load->library('image_lib');
    $target_path = "assets/img/riskpoint/";
    $input = $this->post();
    $input['riskpoint_pic_date'] = date("Y-m-d H:i:s");
    $input['riskpoint_pic_name'] = basename( $_FILES['file']['name']);
    $this->Riskpointmodel->insertRiskpointPic($input);
    $target_path = $target_path .  basename( $_FILES['file']['name']);
    // unlink($target_path);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {

      $config['image_library'] = 'gd2';
      $config['source_image'] = $target_path;
      $config['create_thumb'] = false;
      $config['maintain_ratio'] = TRUE;
      $config['width']     = 800;
      $config['height']   = 800;
      $config['new_image']   = $target_path;

      $this->image_lib->clear();
      $this->image_lib->initialize($config);
      $this->image_lib->resize();

      echo "Upload and move success";
    } else {
      echo $target_path;
      echo "There was an error uploading the file, please try again!";
    }
  }

}
