<?php
    
    session_start();
    if(!isset($_SESSION['name'])){
        header('location:index.php');
    } elseif ($_SESSION['role'] == 'user') {
        header('location:front.php');
    }

    require_once "class/news.class.php";

    $news = new News();

    $news->set('id',$_GET['id']);
    $news->remove();
    header('location:list_news.php');
   
?>