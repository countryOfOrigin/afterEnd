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
				'pass'=>$pwd,
				'telephone'=>$num,
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
		// public function get_user(){

		// }
	}

?>