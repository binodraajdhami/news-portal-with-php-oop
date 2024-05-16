<?php require_once "config.php"; 
	$categories = $categoryData->getCategoryByRank();
	@session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Onlinekhabar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="header-logo">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<a href="./">
								<img src="./images/logo.webp">
							</a>
						</div>
						<div class="col-sm-4">
							<form action="search.php" method="post" style="margin-top: 20px">
								<div class="row">
									<div class="col-sm-8">
										<input type="text" name="keywords" class="form-control" placeholder="Search news" required>
									</div>
									<div class="col-sm-4">
										<button name="search_btn" class="btn btn-success">Search</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-sm-4">
							<div style="margin-top: 20px; text-align: right;">

								<?php if(isset($_SESSION['username'])){ ?>
									
									<span><?php echo $_SESSION['username']; ?></span>
									<a href="logout.php" class="btn btn-danger">Logout</a>
								
								<?php } else{ ?>

									<a href="register.php" class="btn btn-success">Register</a>
									<a href="login.php" class="btn btn-primary">Login</a>

								<?php } ?>

								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Search</button>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-nav">
				<div class="container">
					<nav>
						<ul>
							<li>
								<a href="./">Home</a>
							</li>

							<?php foreach($categories as $item) { ?>
							<li>
								<a href="category.php?cat_id=<?php echo $item->id; ?>"><?php echo $item->name; ?></a>
							</li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</header>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Search News</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">

        		<form method="post" style="margin-bottom: 20px">
					<input type="text" name="keywords" id="keywords" class="form-control" placeholder="Search news" required>
				</form>

				<div id="searchlist" class="row">
					
				</div>

      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>