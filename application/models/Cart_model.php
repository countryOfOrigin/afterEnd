<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Cart_model extends CI_Model{
		public function check_cart($uid,$gid){
			$this->db->from('shopping_cart');
			$this->db->where('user_id',$uid);
			$this->db->where('good_id',$gid);			
			$query=$this->db->get();
			return $query->row();
		}
		public function update_cart($uid,$gid,$count){
			$this->db->where('user_id',$uid);
			$this->db->where('good_id',$gid);
			$this->db->set('count',$count);
			$query=$this->db->update('shopping_cart');
			return $query;
		}
		public function insert_cart($uid,$gid,$count){
			$this->db->set('user_id',$uid);
			$this->db->set('good_id',$gid);
			$this->db->set('count',$count);
			$query=$this->db->insert('shopping_cart');
			return $query;
		}
	}	

?>