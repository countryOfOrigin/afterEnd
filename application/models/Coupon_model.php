<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Coupon_model extends CI_Model{
		public function add_coupon($uid,$cid){


		}
		public function get_coupon(){
			$this->db->from('coupon');
			$query=$this->db->get();
			return $query->result();
		}
	}
?>