<?php require_once('layouts/header.php'); ?>
<section id="app">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<?php require_once('layouts/slider.php'); ?>
				</div>
				<div class="col s12 m8">
					<?php
					 if (count($_GET) < 2) {
					 	if (empty($_GET)) {
						 	require_once('layouts/home.php'); 
						 }elseif(isset($_GET['category'])){
						 	require_once('layouts/category.php'); 
						 }elseif(isset($_GET['post'])){
						 	require_once('layouts/post.php'); 
						 }elseif(isset($_GET['s'])){
						 	require_once('layouts/search.php'); 
						 }else{
						 	require_once('layouts/404.php'); 
						 }
					 }else{
					 	require_once('layouts/404.php');
					 }
					 ?>
				</div>
				<div class="col s12 m4">
					<?php require_once('layouts/sidebar.php'); ?>
				</div>
			</div>
		</div>
		
	</section>
<?php require_once('layouts/footer.php'); ?>