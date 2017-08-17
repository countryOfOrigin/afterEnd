<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Search_model extends CI_Model{
		public function hot_search(){
			$this->db->from('search');
			$this->db->limit(10);
			$this->db->order_by('times','DESC');
			$this->db->select('content');
			$query=$this->db->get();
			return $query->result();
		}
		public function check_search($ipt){
			$this->db->from('search');
			$this->db->where('content',$ipt);
			$query=$this->db->get();
			return $query->row();
		}
		// public function fuzzy_search($ipt){
		// 	$this->db->from('')
		// }
		public function update_search($ipt,$times){
			$this->db->where('content',$ipt);
			$this->db->set('times',$times);
			$query=$this->db->update('search');
			return $query;
		}
		public function insert_search($ipt,$times){
			$this->db->set('content',$ipt);
			$this->db->set('times',$times);
			$query=$this->db->insert('search');
			return $query;
		}
		public function fuzzy_search($ipt){
			$this->db->from('goods');
			$this->db->like('name',$ipt);
			$this->db->order_by('sales_volume','DESC');
			$query=$this->db->get();
			return $query->result();
		}
	}

?>