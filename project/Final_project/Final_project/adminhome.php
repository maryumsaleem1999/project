<?php 

// if (isset($_SESSION['admin'])) {
	include "studentnav.php";
?>


<style>
	
	a.start {
    display: inline-block;
    color: #fffafa !important;
    background: #456aff !important;
    border-left: 7px #272726 solid;
    padding: 6px 13px;
}
	.start{
  /* border: 2px solid rgb(188, 187, 187); */
  color:rgb(43, 39, 145);
  background-color:rgb(134, 198, 247);
}
.start:hover{
  background-color:rgb(134, 198, 247);
  border: none;
  text-decoration:none;
}
	</style>

<!DOCTYPE html>
<html>
	<head>
		<title>ALL QUIZES</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header class="bg-white ">
			<div class="container">
				<div class="m-5">
				<a href="adminhome.php" class="btn ">Home</a>
				<a href="add.php" class="btn">Add Question</a>
				<a href="allquestions.php" class="btn">All Questions</a>
				<a href="players.php" class="btn">Players</a>
				<!-- <a href="exit.php" class="start">Logout</a> -->
</div>
			</div>
		</header>

		<main class="bg-white">
			<div class="container">
				<h2 class="text-dark">ALL QUIZES:</h2>
				</div>
				</main>
				</body>
				</html>

				 <?php //} 
				// else {
				// header("location: admin.php");
				//} 
				?>