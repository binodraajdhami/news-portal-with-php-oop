<?php

	require_once "common.class.php";

	class User extends Common{

		public $name, $email, $username, $password, $role, $status, $image;

		function save(){

		}

		function edit(){
			
		}

		function retrive(){
			
		}

		function remove(){
			
		}

		function adminLogin(){
			$this->password = md5($this->password);
			$db_connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			$sql = "select * from tbl_users where status=1 and email='$this->email' and password='$this->password'";
			$result = $db_connect->query($sql);

			if($result->num_rows > 0){
				$user = $result->fetch_object();
				session_start();
				$_SESSION['name'] = $user->name;
				$_SESSION['email'] = $user->email;
				$_SESSION['username'] = $user->username;
				$_SESSION['role'] = $user->role;
				$_SESSION['image'] = $user->name;

				if($user->role == 'admin'){
					header('location:dashboard.php');
				} else{
					header('location:./../index.php');
				}

			} else{
				return '<p style="color:red">Invalid Email/Password!</p>';
			}
		}

		function userLogin(){
			$this->password = md5($this->password);
			$sql = "select * from tbl_users where status=1 and email='$this->email' and password='$this->password'";
			$user = $this->getSingle($sql);

			if($user){
				session_start();
				$_SESSION['name'] = $user->name;
				$_SESSION['email'] = $user->email;
				$_SESSION['username'] = $user->username;
				$_SESSION['role'] = $user->role;
				$_SESSION['image'] = $user->name;

				if($user->role != 'admin'){
					header('location:index.php');
				} else{
					header('location:./admin/dashboard.php');
				}

			} else{
				return '<p style="color:red">Invalid Email/Password!</p>';
			}
		}

		function userRegister(){
			$this->password = md5($this->password);
			$sql = "insert into tbl_users (name,email,username,password,role,status) values('$this->name','$this->email','$this->username','$this->password','user',1)";
			return $this->insert($sql);

		}

	}

?>