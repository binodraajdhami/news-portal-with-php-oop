<?php
	session_start();
	
	$loggedInUser =  $_SESSION['username'];
	$commmentID = $_GET['commment_id'];
	$returnLink = $_GET['return_link'];

	require_once "admin/class/comment.class.php";
	$comment = new Comment();
	
	$comment->set('created_by',$loggedInUser);
	$comment->set('id',$commmentID);

	$result = $comment->getCommentByIDByUsername();

	if(!$result){
		return header('location:index.php');
	} else{
		$comment->remove();
		header("location:./news.php?news_slug=".$returnLink);
	}


?>