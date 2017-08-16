<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Search_model extends CI_Model{
		public function hot_search(){
			$this->db->from('search');
			$this->db->limit(10);
			$this->db->order_by('times','DESC');
			$query=$this->db->get();
			return $query->result();
		}
	}

?>