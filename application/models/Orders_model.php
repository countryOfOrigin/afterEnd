<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Orders_model extends CI_Model{
		public function get_all($uid){
			$this->db->from('orders');
			$this->db->join('goods','goods.good_id=orders.good_id');
			$this->db->where('user_id',$uid);
			$this->db->select('orders.time,orders.state,goods.url,orders.order_id,goods.name,goods.price,orders.count');
			// $this->db->select('goods.url');
			// $this->db->select('orders.order_id');
			// $this->db->select('goods.name');
			// $this->db->select('goods.price');
			// $this->db->select('orders.count');
			$query=$this->db->get();
			return $query->result();
		}
		public function get_state($uid,$state){
			$this->db->from('orders');
			$this->db->join('goods','goods.good_id=orders.good_id');
			$this->db->where('user_id',$uid);
			$this->db->where('state',$state);
			$this->db->select('orders.time,orders.state,goods.url,orders.order_id,goods.name,goods.price,orders.count');
			$query=$this->db->get();
			return $query->result();
		}
	}


?>