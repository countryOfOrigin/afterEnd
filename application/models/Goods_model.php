<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Goods_model extends CI_Model{
		public function get_goods($i,$count,$num){

			$this->db->limit($count,$num);
			$this->db->from('goods');
			$this->db->join('goods_classification','goods_classification.good_id=goods.good_id');
			$this->db->join('classification','goods_classification.class_name=classification.class_name');
			$this->db->where('classification.class_id',$i);
			$this->db->select('goods.good_id');
			$this->db->select('goods.name');
			$this->db->select('goods.price');
			$this->db->select('goods.url');
			$query=$this->db->get();
			return $query->result();
		}
		public function paging($cls,$count,$num){

			$this->db->limit($count,$num);
			$this->db->from('goods');
			$this->db->join('goods_classification','goods_classification.good_id=goods.good_id');
			$this->db->join('classification','goods_classification.class_name=classification.class_name');
			$this->db->where('goods_classification.class_name',$cls);
			$this->db->select('goods.good_id');
			$this->db->select('goods.name');
			$this->db->select('goods.price');
			$this->db->select('goods.url');
			$query=$this->db->get();
			return $query->result();
		}
		public function paging_else($count,$num){

			$this->db->limit($count,$num);
			$this->db->from('goods');
			$this->db->join('goods_classification','goods_classification.good_id=goods.good_id');
			$this->db->join('classification','goods_classification.class_name=classification.class_name');
			$this->db->select('goods.good_id');
			$this->db->select('goods.name');
			$this->db->select('goods.price');
			$this->db->select('goods.url');
			$query=$this->db->get();
			return $query->result();
		}
	}

?>