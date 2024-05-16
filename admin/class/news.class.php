<?php
	
	require_once "common.class.php";

	class News extends Common{

		public $id, $name, $slug, $category_id, $short_discription, $long_description, $feature_key, $feature_image, $status, $created_by, $created_at, $modified_by, $modified_at;

		function save(){
			$sql = "insert into tbl_news (name,slug,category_id,short_discription,long_description,feature_key,feature_image,status,created_by,created_at) values('$this->name','$this->slug',$this->category_id,'$this->short_discription','$this->long_description',$this->feature_key,'$this->feature_image',$this->status,'$this->created_by','$this->created_at')";
			return $this->insert($sql);
		}

		function edit(){
			$sql = "update tbl_news set name='$this->name', slug='$this->slug', short_discription='$this->short_discription',  long_description='$this->long_description', feature_key=$this->feature_key, feature_image='$this->feature_image',  status=$this->status, modified_at='$this->modified_at', modified_by='$this->modified_by' where id=$this->id";
			return $this->update($sql);
		}

		function retrive(){
			$sql = "select * from tbl_news";
			return $this->select($sql);
		}

		function remove(){
			$sql = "delete from tbl_news where id=$this->id";
			$this->delete($sql);
		}

		function getNewsById(){
			$sql = "select * from tbl_news where id='$this->id'";
			return $this->getSingle($sql);
		}

		function getNewsBySlug(){
			$sql = "select * from tbl_news where slug='$this->slug'";
			return $this->getSingle($sql);
		}

		function getNewsByCategoryID($category_id){
			$sql = "select * from tbl_news where category_id=$category_id";
			return $this->select($sql);
		}

		function getNewsByCategoryIDForPagination($page){
			$offset = ($page -1) * CATEGORY_NEWS_COUNT;
			$sql = "select * from tbl_news where category_id=$this->category_id limit ".CATEGORY_NEWS_COUNT." offset $offset";
			return $this->select($sql);
		}

		function countNewsByCategoryID(){
			$sql = "select * from tbl_news where category_id=$this->category_id";
			return count($this->select($sql));
		}

		function get_single_news_by_category_id($id){
			$sql = "select * from tbl_news where status=1 and category_id=$id order by created_at DESC";
			return $this->getSingle($sql);
		}

		function getLimitedNews($limited){
			$sql = "select * from tbl_news where status=1 limit $limited";
			return $this->select($sql);
		}

		function get_limited_news_by_category_id($categoryId,$limited){
			$sql = "select * from tbl_news where status=1 and category_id=$categoryId limit $limited";
			return $this->select($sql);
		}

		function search_news($keywords){
			$sql = "select * from tbl_news where long_description like '%$keywords%' or short_discription like '%$keywords%' or name like '%$keywords%' ";
			return $this->select($sql);
		}

	}
?>