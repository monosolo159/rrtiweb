<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';


class Service_post extends REST_Controller
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

  function PostMessage_post()
  {
    $input = $this->post();
    $input['tb_post_date'] = date("Y-m-d H:i:s");
    $output = $this->Postmodel->post_message($input);
    $this->youMemberToSend($input);

    $user = $this->Usermodel->getMember($input);
    foreach ($user as $key) {
      $data[] = array(
        'to_member_id' => $key['member_id'],
        'from_member_id' => $input['member_id'],
        'notification_text'  => $input['tb_post_text'],
        'notification_date'  => date("Y-m-d H:i:s"),
        'notification_type'  => 1,
        'notification_fk'   => $output
      );
    }

    $this->Postmodel->addNotificationBatch($data);

    $post_message = $this->Postmodel->getMessage($input);
    $this->response($post_message, 200); // 200 being the HTTP response code
  }

  function getMessage_post(){
    $input = $this->post();
    $post_message = $this->Postmodel->getMessage($input);
    $this->response($post_message, 200); // 200 being the HTTP response code
  }

  function getPost_post(){
    $input = $this->post();
    $post_post = $this->Postmodel->getPost($input);
    $this->response($post_post, 200); // 200 being the HTTP response code
  }

  function deleteMessage_post(){
    $input = $this->post();
    $this->Postmodel->deleteMessage($input);
    $this->Postmodel->deleteNotification($input);
    $this->response('', 200); // 200 being the HTTP response code
  }

  function EditMessage_post(){
    $input = $this->post();
    $this->Postmodel->edit_message($input);
    $this->response('', 200); // 200 being the HTTP response code
  }

  function PostCounsel_post()
  {
    $input = $this->post();
    $user = $this->Usermodel->selectAdvisors($input);
    $input['tb_counsel_date'] = date("Y-m-d H:i:s");
    if (count($user)>0) {
      $input['to_member_id'] = $user[0]['member_id'];
    }
    unset($input['tb_class_id']);

    $output = $this->Postmodel->post_counsel($input);

    $noti['to_member_id'] = $input['to_member_id'];
    $noti['from_member_id'] = $input['from_member_id'];
    $noti['notification_text'] = $input['tb_counsel_text'];
    $noti['notification_date'] = date("Y-m-d H:i:s");
    $noti['notification_type'] = 2;
    $noti['notification_fk'] = $output;
    $this->Postmodel->addNotification($noti);

    $this->youMemberToSend($input);
    $post_counsel = $this->Postmodel->getCounsel($input);
    $this->response($post_counsel, 200); // 200 being the HTTP response code
  }

  function PostCounselAdvisors_post()
  {
    $input = $this->post();
    $input['tb_counsel_date'] = date("Y-m-d H:i:s");
    unset($input['tb_class_id']);
    $output = $this->Postmodel->post_counsel($input);

    $noti['to_member_id'] = $input['to_member_id'];
    $noti['from_member_id'] = $input['from_member_id'];
    $noti['notification_text'] = $input['tb_counsel_text'];
    $noti['notification_date'] = date("Y-m-d H:i:s");
    $noti['notification_type'] = 2;
    $noti['notification_fk'] = $output;
    $this->Postmodel->addNotification($noti);

    $this->youMemberToSend($input);
    $post_counsel = $this->Postmodel->getCounsel($input);
    $this->response($post_counsel, 200); // 200 being the HTTP response code
  }

  function getCounsel_post(){
    $input = $this->post();
    $post_counsel = $this->Postmodel->getCounsel($input);
    $this->response($post_counsel, 200); // 200 being the HTTP response code
  }

  function getCounselTeacher_post(){
    $input = $this->post();
    $post_counsel = $this->Postmodel->getCounselTeacher($input);
    // $i=0;
    // foreach ($post_counsel as $key) {
    //   if($key['to_member_id']!=$input['member_id'] && $key['from_member_id']!=$input['member_id']){
    //     unset($post_counsel[$i]);
    //   }
    //   $i++;
    // }
    $this->response($post_counsel, 200); // 200 being the HTTP response code
  }

  function ReplyMessage_post()
  {
    $input = $this->post();
    $input['tb_reply_date'] = date("Y-m-d H:i:s");
    $this->Postmodel->reply_message($input);
    $this->youMemberToSend($input);
    $reply_message = $this->Postmodel->getReply($input);
    $this->response($reply_message, 200); // 200 being the HTTP response code
  }

  function getReply_post(){
    $input = $this->post();
    $reply_message = $this->Postmodel->getReply($input);
    $this->response($reply_message, 200); // 200 being the HTTP response code
  }

  function youMemberToSend($post_message){
		$query = $this->Usermodel->getMember($post_message);
		$myUser = array();
		foreach ($query as $key) {
			if($key['member_device_token']!='' && $key['member_id']!=$post_message['member_id']){
				array_push($myUser,$key['member_device_token']);
			}
		}

    // $member = $this->Usermodel->getMember($post_message);
    $this->sendNotification($myUser,$post_message);
  }

  function sendNotification($myUser,$post_message){
    $this->load->library('curl');
    $API_URL = "https://onesignal.com/api/v1/notifications";
    $APP_ID  = '3ce81eb6-3098-4af6-88bd-d03cb868b53d';
    $API_KEY = 'ZmI1OGEwOWEtNzRjMi00YWMxLTk1YWItNWI5ZjcyZjY3ODM2';
    // $linkLogo = base_url('upload/images/notification/notification_icon.png');
    $content = array(
          "en" => $post_message['tb_post_text']);
    $fields = array(
    			'app_id' => $APP_ID,
          // 'alert' => "Testtest has requested to be your friend.",
    			'include_player_ids' => $myUser,
    			'data' => array("foo" => "bar","vibrat",1),
    			'ios_badgeType' => 'Increase',
    			'ios_badgeCount' => 1,
          // 'ios_sound' => $sound+".wav",
          // 'android_sound' => "parkingwarning",
          // 'android_sound' => $sound,
          'groupKey' =>1,
          'groupMessage'=>1,
          'groupedNotifications'=>1,
          // 'android_sound' => "parkingwarning",
          // 'small_icon' => "ic_stat_logo",
          // 'large_icon' => "ic_stat_logo",
          // 'large_icon' => $linkLogo,
          // 'android_background_layout' => array("headings_color" => "FF0000FF","contents_color" => "FFFF0000"),
          'android_accent_color' => "FFFF0000",
    			'contents' => $content
    		);

    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $API_URL);
    $headers = array(
        'Content-type: application/json',
        'Authorization: Basic '.$API_KEY,
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    var_dump($response);
  }

  function getNotification_post(){
    $input = $this->post();
    $noti = $this->Postmodel->getNotification($input);
    $this->response($noti, 200); // 200 being the HTTP response code
  }


}
