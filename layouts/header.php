<?php require_once('libraries/functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Title -->
	<title>Newsletter</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<!-- Styles end -->
</head>
<body>
	<!-- Header start -->
	<header>
		<!-- Top Header start -->
		<div class="header-top">
			<div class="container">
				<div class="row no-margin">
					<div class="col s12 m6">
						<div class="header-top-menu">
							<ul>
								<li>
									<a href="javascript:void(0);">
										<i class="fa fa-phone"></i>
										+998(99) 804-02-26
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="fa fa-envelope"></i>
										nanotexnolagiya@mail.ru
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col s12 m6">
						<div class="search-wrapper right">
							<form action="/" method="GET">
								<input type="text" name="s" value="<?php echo (isset($_GET['s']) ? $_GET['s'] : ''); ?>" placeholder="Search..." />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Top header end -->

		<!-- Header start -->
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="logo">
							<h2>Logo</h2>
						</div>
					</div>
					<div class="col s12">
						<div class="header-menu">
							<ul>
								<li><a href="/" class="flow-text">Home</a></li>
						<?php 
							$categories = $db_conn->query("SELECT * FROM news_categories");
							if ($categories->num_rows > 0){
								while($category = $categories->fetch_assoc()){
						            if (is_array($category)) {
						            	if (count($category) != 0) {
						            		echo '<li><a href="/?category='.$category['id'].'" class="flow-text">'.$category['name'].'</a></li>';
						            	}
						            }
						        }
							}
						?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header end -->
	</header>
	<!-- Header end -->