<?php
	
	// defiend constant value
	define('ADMIN_FOLDER', 'admin');
	define('CATEGORY_NEWS_COUNT', 2);

	// import classes
	require_once ADMIN_FOLDER."/class/news.class.php";
	require_once ADMIN_FOLDER."/class/category.class.php";
	require_once ADMIN_FOLDER."/class/comment.class.php";

	// make object of classes
	$categoryData = new Category();
	$newsData = new News();
	$comment = new Comment();

?>