<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Comment_model extends CI_Model{
		public function get_comment($gid){
			$this->db->from('comment');
			$this->db->join('users','comment.user_id=users.user_id');
			$this->db->where('comment.good_id',$gid);
			$this->db->select('comment.content');
			$this->db->select('comment.selection');
			$this->db->select('comment.time');
			$this->db->select('users.name');
			$this->db->select('users.url');
			$query=$this->db->get();
			return $query->result();
		}
		public function check_collection($gid,$uid){
			$this->db->from('collection');
			$this->db->where('user_id',$uid);
			$this->db->where('good_id',$gid);
			$query=$this->db->get();
			return $query->row();
		}
		public function add_collection($gid,$uid,$now){
			$this->db->set('user_id',$uid);
			$this->db->set('good_id',$gid);
			$this->db->set('time',$now);
			$query=$this->db->insert('collection');
			return $query;
		}
		public function remove_collection($gid,$uid){
			$this->db->where('user_id',$uid);
			$this->db->where('good_id',$gid);
			$query=$this->db->delete('collection');
			return $query;
		}
	}
?>