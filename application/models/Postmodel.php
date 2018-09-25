<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postmodel extends CI_Model {

		public function post_message($input){
			$this->db->insert('tb_post', $input);
			return $this->db->insert_id();
		}

		public function edit_message($input){
			$this->db->where('tb_post_id',$input['tb_post_id'])->update('tb_post', $input);
		}

		public function getPost($input){
			$this->db->select('tb_post_id,tb_post_date,tb_post_text,member.member_id,member.member_name,member.member_pic,tb_post.tb_class_id');
			$this->db->where('tb_post_id',$input['tb_post_id']);
			$this->db->from('tb_post');
			$this->db->join('member', 'tb_post.member_id = member.member_id','left');
			$this->db->order_by('tb_post_date','desc');
			$query = $this->db->get()->result_array();
			return $query;
		}

		public function getMessage($input){
		  $this->db->select('tb_post_id,tb_post_date,tb_post_text,member.member_id,member.member_name,member.member_pic,tb_post.tb_class_id');
			$this->db->where('tb_post.tb_class_id',$input['tb_class_id']);
		  $this->db->from('tb_post');
		  $this->db->join('member', 'tb_post.member_id = member.member_id','left');
			$this->db->order_by('tb_post_date','desc');
		  $query = $this->db->get()->result_array();
		  return $query;
		}

		public function deleteMessage($input){
			$this->db->where('tb_post_id',$input['tb_post_id'])->delete('tb_post');
		}

		public function getNotification($input){
			$this->db->select('notification_id,to_member_id,from_member_id,member.member_name,member.member_pic,notification_text,notification_date,notification_type,notification_fk');
			$this->db->where('to_member_id',$input['member_id']);
		  $this->db->from('notification');
		  $this->db->join('member', 'notification.from_member_id = member.member_id','left');
			$this->db->order_by('notification_date','desc');
		  $query = $this->db->get()->result_array();
		  return $query;
		}

		public function deleteNotification($input){
			$this->db
			->where('notification_type',1)
			->where('notification_fk',$input['tb_post_id'])
			->delete('notification');
		}

		public function addNotification($input){
			$this->db->insert('notification', $input);
		}

		public function addNotificationBatch($input){
			$this->db->insert_batch('notification', $input);
		}

		public function post_counsel($input){
			$this->db->insert('tb_counsel', $input);
			return $this->db->insert_id();
		}

		public function getCounsel($input){
		  $this->db->select('tb_counsel_id,tb_counsel_date,tb_counsel_text,member.member_id,member.member_name,member.member_pic,to_member_id,from_member_id');
			$this->db->where('from_member_id',$input['from_member_id']);
			$this->db->or_where('to_member_id',$input['from_member_id']);
		  $this->db->from('tb_counsel');
		  $this->db->join('member', 'tb_counsel.from_member_id = member.member_id','left');
			$this->db->order_by('tb_counsel_date','desc');
		  $query = $this->db->get()->result_array();
		  return $query;
		}

		public function getCounselTeacher($input){
		  $this->db->select('tb_counsel_id,tb_counsel_date,tb_counsel_text,member.member_id,member.member_name,member.member_pic,to_member_id,from_member_id');

			$this->db->group_start();
			$this->db->where('from_member_id',$input['from_member_id']);
			$this->db->where('to_member_id',$input['member_id']);
			$this->db->group_end();

			$this->db->or_group_start();
			$this->db->where('from_member_id',$input['member_id']);
			$this->db->where('to_member_id',$input['from_member_id']);
			$this->db->group_end();

		  $this->db->from('tb_counsel');
		  $this->db->join('member', 'tb_counsel.from_member_id = member.member_id','left');
			$this->db->order_by('tb_counsel_date','desc');
		  $query = $this->db->get()->result_array();
		  return $query;
		}

		public function reply_message($input){
			$this->db->insert('tb_reply', $input);
		}

		public function getReply($input){
		  $this->db->select('tb_reply_id,tb_reply_date,tb_reply_text,member.member_id,member.member_pic,member.member_name');
			$this->db->where('tb_post_id',$input['tb_post_id']);
		  $this->db->from('tb_reply');
		  $this->db->join('member', 'tb_reply.member_id = member.member_id','left');
			$this->db->order_by('tb_reply_date','desc');
		  $query = $this->db->get()->result_array();
		  return $query;
		}

}
