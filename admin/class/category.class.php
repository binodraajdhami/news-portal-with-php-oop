<?php

	require_once "common.class.php";

	class Category extends Common{

		public $id, $name, $rank, $status, $created_at, $created_by, $modified_at, $modified_by;

		function save(){
			$sql = "insert into tbl_categories (name,rank,status,created_at,created_by) values('$this->name',$this->rank,$this->status,'$this->created_at','$this->created_by')";
			return $this->insert($sql);
		}

		function retrive(){
			$sql = "select * from tbl_categories";
			return $this->select($sql);
		}

		function remove(){
			$sql = "delete from tbl_categories where id=$this->id";
			return $this->delete($sql);
		}

		function fetchSigle(){
			$sql = "select * from tbl_categories where id=$this->id";
			return $this->select($sql);
		}

		function edit(){
			$sql = "update tbl_categories set name='$this->name', rank=$this->rank, status=$this->status, created_at='$this->created_at', created_by='$this->created_by', modified_at='$this->modified_at', modified_by='$this->modified_by' where id=$this->id";
			return $this->update($sql);
		}

		function getCategoryByRank(){
			$sql = "select * from tbl_categories order by rank";
			return $this->select($sql);

		}

	}


?>