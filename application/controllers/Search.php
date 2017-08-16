<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Search extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('search_model');
		}
		public function hot_search(){
			$result=$this->search_model->hot_search();
			echo "<pre>";
			var_dump($result);	
			echo "</pre>";
		}
	}
?>