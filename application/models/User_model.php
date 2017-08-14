<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		public function check_num($num){
			$this->db->from('users');
			$this->db->where('telephone',$num);
			$query=$this->db->get();
			return $query->row();
		}
		public function insert_user($uname,$num,$psw){
			$arr=array(
				'name'=>$uname,
				'pass'=>$psw,
				'telephone'=>$num,
				'time'=>'now()'
				);
			$query=$this->db->insert('users',$arr);
			return $query;
		}
		public function login_user($num,$psw){
			$arr=array(
				'telephone'=>$num,
				'pass'=>$psw
				);
			$this->db->select('user_id');
			$this->db->select('name');
			$this->db->from('users');
			$this->db->where($arr);
			$query=$this->db->get();
			return $query->row();
		}
		public function get_user($uid){
			$this->db->select('url');
			$this->db->select('grade');
			$this->db->from('users');
			$this->db->where('user_id',$uid);
			$query=$this->db->get();
			return $query->row();
		}
		public function get_address($uid){
			$this->db->from('goods_receipt');
			$this->db->where('user_id',$uid);
			$query=$this->db->get();
			return $query->result();
		}
		public function get_address_by_aid($aid){
			$this->db->from('goods_receipt');
			$this->db->where('receipt_id',$aid);
			$query=$this->db->get();
			return $query->result();
		}
		public function delete_address($aid){
			$this->db->where('receipt_id',$aid);
			$query=$this->db->delete('goods_receipt');
			return $query;
		}
	}

?>