<?php

	require_once "common.class.php";

	class Comment extends Common{

		public $id, $news_id, $comment_text, $created_by, $created_at, $modified_by, $modified_at, $status;


		function save(){
			$sql = "insert into tbl_comments (news_id,comment_text,created_by,created_at,status) values($this->news_id,'$this->comment_text','$this->created_by','$this->created_at',1)";
			return $this->insert($sql);

		}

		function edit(){
			
		}

		function retrive(){
			
		}

		function remove(){
			$sql = "delete from tbl_comments where id=$this->id";
			return $this->delete($sql);
		}

		function get_comment_by_news(){
			$sql = "select * from tbl_comments where news_id=$this->news_id";
			return $this->select($sql);
		}

		function getCommentByIDByUsername(){
			$sql = "select * from tbl_comments where id=$this->id and created_by='$this->created_by'";
			return $this->getSingle($sql);
		}


	}

?>