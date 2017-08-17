<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Coupon_model extends CI_Model{
		public function add_coupon($uid,$cid){
			$this->db->set('user_id',$uid);
			$this->db->set('coupon_id',$cid);
			$query=$this->db->insert('user_coupon');
			return $query;
		}
		public function get_coupon($now){
			$this->db->from('coupon');
			$this->db->where('deadline >',$now);
			$query=$this->db->get();
			return $query->result();
		}
		public function check($uid,$cid){
			$this->db->from('user_coupon');
			$this->db->where('user_id',$uid);
			$this->db->where('coupon_id',$cid);
			$query=$this->db->get();
			return $query->row();
		}
		public function get_owncoupon($uid,$now){
			$this->db->from('user_coupon');
			$this->db->join('coupon','user_coupon.coupon_id=coupon.coupon_id');
			$this->db->where('user_coupon.user_id',$uid);
			$this->db->where('coupon.deadline >',$now);
			$query=$this->db->get();
			return $query->result();
		}
	}
?>