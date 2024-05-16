<?php
	
	session_start();
    if(!isset($_SESSION['name'])){
        header('location:index.php');
    } elseif ($_SESSION['role'] == 'user') {
        header('location:front.php');
    }

    require_once "class/category.class.php";

    $category = new Category();

    $category->set('id',$_GET['id']);
    $category->remove();
    header('location:list_category.php');
   
?>