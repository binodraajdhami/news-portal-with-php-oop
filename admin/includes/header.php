<?php
    session_start();

    if(!isset($_SESSION['name'])){
        header('location:index.php');
    } elseif ($_SESSION['role'] == 'user') {
        header('location:front.php');
    }
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?> | Hamro News</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <!-- Table CSS -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <style>
        .error{
            color: red;
        }
        .success{
            color: green;
        }
    </style>

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./../">Hamro News</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i> <?php echo $_SESSION['name']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="dashboard.php">
                                <i class="fa fa-dashboard fa-fw"></i> Dashboard
                            </a>
                        </li>

                        <?php if($_SESSION['role'] == 'admin') { ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Category Management<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="create_category.php"><i class="fa fa-plus fa-fw"></i> Category Create</a>
                                </li>
                                <li>
                                    <a href="list_category.php"><i class="fa fa-list fa-fw"></i> Category List</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user') { ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-bar-chart-o fa-fw"></i> News Management<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="create_news.php"><i class="fa fa-plus fa-fw"></i> News Create</a>
                                </li>
                                <li>
                                    <a href="list_news.php"><i class="fa fa-list fa-fw"></i> News List</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['role'] == 'admin') { ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Role Management<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="create_category.php"><i class="fa fa-plus fa-fw"></i> Role Create</a>
                                </li>
                                <li>
                                    <a href="list_category.php"><i class="fa fa-list fa-fw"></i> Role List</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['role'] == 'admin') { ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-bar-chart-o fa-fw"></i> User Management<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="create_category.php"><i class="fa fa-plus fa-fw"></i> User Create</a>
                                </li>
                                <li>
                                    <a href="list_category.php"><i class="fa fa-list fa-fw"></i> User List</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </nav>