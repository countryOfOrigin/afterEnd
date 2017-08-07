<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		function public check_num($num){
			$this->db->from('users');
			$this->db->where('telephone',$num);
			$query=$this->db->get();
			return $query->row();
		}
		function public insert_user($uname,$num,$psw){
			$query=$this->db->
			$query=$this->db->insert('users',$arr);
			return $query;
		}
	}

?>