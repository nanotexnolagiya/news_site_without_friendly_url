<?php
require_once('layouts/header.php');

?>
<div class="row">
	<div class="col s12 m3">
		<div class="collection">
			<a href="/admin/" class="collection-item <?php echo (empty($_GET) ? 'active' : ''); ?>">
				Dashboard
				<i class="material-icons right">send</i>
			</a>
			<a href="/admin/?page=category" class="collection-item <?php echo (@$_GET['page'] == 'category' ? 'active' : ''); ?>">
				Categories
				<i class="material-icons right">send</i>
			</a>
			<a href="/admin/?page=post" class="collection-item <?php echo (@$_GET['page'] == 'post' ? 'active' : ''); ?>">
				Posts
				<i class="material-icons right">send</i>
			</a>
		</div>
	</div>
	<div class="col s12 m9">
		<?php 
		if (empty($_GET)) {
			require_once('layouts/home.php');
		}elseif(isset($_GET['page']) && $_GET['page'] == 'category' && !isset($_GET['edit']) && !isset($_GET['add'])){
			require_once('layouts/category.php');
		}elseif(isset($_GET['page']) && $_GET['page'] == 'category' && isset($_GET['edit'])){
			require_once('layouts/category-edit.php');
		}elseif(isset($_GET['page']) && $_GET['page'] == 'category' && isset($_GET['add'])){
			require_once('layouts/category-add.php');
		}elseif(isset($_GET['page']) && $_GET['page'] == 'post' && !isset($_GET['edit']) && !isset($_GET['add'])){
			require_once('layouts/post.php');
		}elseif(isset($_GET['page']) && $_GET['page'] == 'post' && isset($_GET['edit'])){
			require_once('layouts/post-edit.php');
		}elseif(isset($_GET['page']) && $_GET['page'] == 'post' && isset($_GET['add'])){
			require_once('layouts/post-add.php');
		}else{
			require_once('layouts/404.php');
		}

		 ?>
	</div>
</div>
<?php require_once('layouts/footer.php'); ?>