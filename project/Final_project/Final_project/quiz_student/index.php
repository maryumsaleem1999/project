<?php
session_start();
include "connection.php";
include "link.php";
?>
<?php 
if (isset($_SESSION['id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['email'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from user WHERE email = '$email'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE user SET played_on = '$played_on' WHERE email = '$email' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
		header("location: home.php");
	}
	else {
		$played_on = date('Y-m-d H:i:s');
	$query = "INSERT INTO user(email,played_on) VALUES ('$email','$played_on')";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "SELECT * FROM user WHERE email = '$email' ";
		$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
		if (mysqli_num_rows($run2) > 0) {
			$row = mysqli_fetch_array($run2);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
			header("location: home.php");
		}
}
	else {
		echo "<script> alert('something is wrong'); </script>";
	}
}
}
else {
	echo "<script> alert('Invalid Email'); </script>";
}
}



?>
<html>
	<head>
		<title>PHP-kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<style>
	.btn{
  /* border: 2px solid rgb(188, 187, 187); */
  color:rgb(43, 39, 145);
  background:rgb(134, 198, 247);
  
}
.btn:hover{
  background-color:rgb(134, 198, 247);
  border: none;
}
 input[type=email]{
    border:none;
    border-bottom:1px solid rgb(43, 39, 145);
    background-color:#f8f9fc;
    border-radius:0px;
	margin-right:16px;
  }
  #wrapper #content-wrapper #content {
    flex: 1 0 auto;
    background-color: white;
}

	</style>
	<body>
		<header>
			<div class="container">
				<h1>PHP-kuiz</h1>
				<a href="index.php" class="start">Home</a>
				<a href="admin.php" class="start">Admin Panel</a>

			</div>
		</header>

		<main>
		<div class="container">
				<h2>Enter Your Email</h2>
				<form method="POST" action="">
				<input type="email" name="email" required="" >
				<input type="submit" name="submit" value="PLAY NOW">

			</div>


		</main>

		<footer>
			<div class="container">
				Copyright @ PHP-kuiz
			</div>
		</footer>

	</body>
</html>