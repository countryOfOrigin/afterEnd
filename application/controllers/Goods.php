<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Goods extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('goods_model');
		}
		// 获取全部商品
		public function get_goods(){
			$arr=[];
			for ($i=1; $i < 9; $i++) { 
				$result=$this->goods_model->get_goods($i,6,null);
				array_push($arr,$result);
			}
			echo json_encode($arr);
		}
		// 商品分页
		public function paging(){
			$cls=$this->input->post('cls');
			$count=$this->input->post('count');
			$page=$this->input->post('page');
			if($cls){
				$result=$this->goods_model->paging($cls,$count,($page-1)*$count);
				if($count){
					$all=$this->goods_model->all_cls($cls);
					$sum=ceil($all/$count);
					$goods=$result;
					$result=[];
					$result['sum']=$sum;
					$result['goods']=$goods;
				}
				
				echo json_encode($result);
			}else{
				$result=$this->goods_model->paging_else($count,($page-1)*$count);
				if($count){
					$all=$this->goods_model->all_nocls();
					$sum=ceil($all/$count);
					$goods=$result;
					$result=[];
					$result['sum']=$sum;
					$result['goods']=$goods;
				}
				echo json_encode($result);
			}
		}
		// 给商品id返回信息
		public function info(){
			$gid=$this->input->get('gid');
			$result=$this->goods_model->info($gid);
			$result->url_all=explode(";",$result->url_all);
			$result->url_top=explode(";",$result->url_top);
			$comment=$this->goods_model->goods_comment($gid);
			$collection=$this->goods_model->goods_collection($gid);
			$collection=$collection?$collection:0;
			$result->comment=$comment;
			$result->collection=$collection;
			// echo "<pre>";
			// var_dump($result);
			// echo "</pre>";
			// die();
			echo json_encode($result);
		}
		// 给用户id返回收藏
		public function collection(){
			$uid=$this->input->get('uid');
			$result=$this->goods_model->collection($uid);
			echo json_encode($result);
		}
		// 最热商品信息
		public function hot_goods(){
			$result=$this->goods_model->hot_goods();
			echo json_encode($result);
		}
	}

?>