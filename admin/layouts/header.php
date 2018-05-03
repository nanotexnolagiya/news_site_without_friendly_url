<?php require_once('libraries/functions.php');
if(!isset($_SESSION['user'])){

    header("Location: /admin/login.php");

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
	<title>Dashboard</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="../css/materialize.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<!-- Styles end -->
</head>
<body>
<div id="preloader" class="preloader-wrapper big">
	<div class="spinner-layer spinner-blue-only">
	  <div class="circle-clipper left">
	    <div class="circle"></div>
	  </div><div class="gap-patch">
	    <div class="circle"></div>
	  </div><div class="circle-clipper right">
	    <div class="circle"></div>
	  </div>
	</div>
</div>
<!-- Dropdown Structure -->
<nav>
  <div class="nav-wrapper">
    <a href="/" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li><a href="/admin/login.php?action=logout">Loguot</a></li>
    </ul>
  </div>
</nav>