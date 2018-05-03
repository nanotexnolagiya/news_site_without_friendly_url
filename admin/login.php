<?php require_once('libraries/functions.php');
$errors = array();
if(check_token("/admin/login.php", "login", "post")){

	$email = htmlentities($_POST['email'], ENT_COMPAT, "UTF-8");

    $password = $_POST['password'];

	$sql = "SELECT * FROM news_users WHERE email = '".$db_conn->real_escape_string($email)."' AND password = '".md5($password)."'";

	$result_user = $db_conn->query($sql);

    if($result_user !== false){

    	$user = $result_user->fetch_assoc();

    	$_SESSION['user']['id'] = $row['id'];

        header("Location: /admin/");

        exit();
    }else{
    	$errors = ['Error email or password!'];
    }
}else{
	$errors = ['Error time!'];
}
if($_GET['action'] == "logout" && isset($_SESSION['user'])){

    unset($_SESSION['user']);

}

if(isset($_SESSION['user'])){

    header("Location: /admin/");

    exit();

}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Title -->
	<title>Login</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="../css/materialize.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<!-- Styles end -->
</head>
<body>
	<div class="login">
		<form method="POST" action="/admin/login.php">
			<span><b><i><input type="hidden" name="csrf_token" value="<?php echo get_token('login'); ?>"></i></b></span>
			<div class="row">
				<div class="input-field col s12">
					<input type="email" id="email" name="email" placeholder="E-mail" />
					<label for="email">E-mail</label>
				</div>
				<div class="input-field col s12">
					<input type="password" id="password" name="password" placeholder="Password" />
					<label for="password">Password</label>
				</div>
				<?php if (empty($errors)):  ?>
				<div class="col s12">
					<div class="alert collections">
						<?php 
						foreach ($errors as $error) {
							echo '<a class="collections-item">'.$error.'</a>';
						}
						?>
					</div>
				</div>
				<?php endif; ?>
				<div class="input-field col s12">
		        	<button class="btn waves-effect waves-light" type="submit" name="action">Save
					    <i class="material-icons right">send</i>
					  </button>
		        </div>
			</div>
		</form>
	</div>
</body>
<?php $db_conn->close(); ?>
<!-- Scripts -->
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<!-- Scripts end -->
</html>