<?php

	define("DB_HOST", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_DATABASE", "db_phpclass");
	
	abstract class Common{

		abstract function save();
		abstract function edit();
		abstract function retrive();
		abstract function remove();

		function validate($value){
			$value = htmlentities($value);
			$db_connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			$value = $db_connect->real_escape_string($value);
			return $value;
		}

		function set($key, $value){
			$this->$key = $this->validate($value);
		}

		function get($key){
			return $this->$key;
		}

		function insert($sql){
			$db_connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			$result = $db_connect->query($sql);
			if($result == 1){
				return true;
			} else{
				return false;
			}
		}

		function select($sql){
			$db_connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			$result = $db_connect->query($sql);
			$datas = [];
			if($result->num_rows > 0){
				while ($d = $result->fetch_object()) {
					array_push($datas, $d);
				}
			} else{
				return $datas;
			}
			return $datas;
		}

		function getSingle($sql){
			$db_connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			$result = $db_connect->query($sql);
			if($result->num_rows > 0){
				return $result->fetch_object();
			}
		}

		function delete($sql){
			$db_connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			return $db_connect->query($sql);
		}

		function update($sql){
			$db_connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			$result = $db_connect->query($sql);
			if($result == 1){
				return true;
			} else{
				return false;
			}
		}
	}
?>