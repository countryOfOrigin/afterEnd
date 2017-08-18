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
		public function all_cls($cls){
			$this->db->from('goods');
			$this->db->join('goods_classification','goods_classification.good_id=goods.good_id');
			$this->db->where('goods_classification.class_name',$cls);
			$query=$this->db->count_all_results();
			return $query;
		}
		public function all_nocls(){
			$this->db->from('goods');
			$query=$this->db->count_all_results();
			return $query;
		}
		public function info($gid){
			$this->db->from('goods');
			$this->db->select('name');
			$this->db->select('price');
			$this->db->select('parameter');
			$this->db->select('url');
			$this->db->select('count');
			$this->db->select('url_all');
			$this->db->select('url_top');
			$this->db->where('good_id',$gid);
			$query=$this->db->get();
			return $query->row();
		}
		public function collection($uid){
			$this->db->from('goods');
			$this->db->join('collection','goods.good_id=collection.good_id');
			$this->db->where('collection.user_id',$uid);
			$this->db->select('goods.name');
			$this->db->select('goods.good_id');
			$this->db->select('goods.price');
			$this->db->select('goods.url');
			$query=$this->db->get();
			return $query->result();
		}
		public function hot_goods(){
			$this->db->from('goods');
			$this->db->limit(6);
			$this->db->order_by('sales_volume','DESC');
			$query=$this->db->get();
			return $query->result();
		}
		public function goods_comment($gid){
			$this->db->from('comment');
			$this->db->where('good_id',$gid);
			$query=$this->db->get();
			return $query->result();
		}
		public function goods_collection($gid){
			$this->db->from('collection');
			$this->db->where('good_id',$gid);
			$query=$this->db->count_all_results();
			return $query;
		}
	}

?>