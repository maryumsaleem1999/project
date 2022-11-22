<?php 
session_start();
include "connection.php";
include "link.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
	<head>
		<title>Quiz Home</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<style>
	main {
	
    padding-bottom: 20px;
    background: white;
    color: black;
    height: 418px;
}
p{
	color:#86c6f7;
	font-weight: 900;
	font-size:20px;

}
.btn{
  /* border: 2px solid rgb(188, 187, 187); */
  color:white;
  background-color:rgb(134, 198, 247);

}
.btn:hover{
  background-color:rgb(134, 198, 247);
  border: none;
}
header {
    border-top: 3px #272726 solid;
    background: #86c6f7;
    color: white;
	border-bottom:0 !important;
}
footer{
	border-top: 3px #272726 solid;
	background: white;
	color: black;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
}
	</style>
	<body>
		<header>
			<div class="container">
				<h1>Quiz</h1>
			</div>
		</header>

		<main>
			<div class="container">
				
				<p>Are You Ready To Attempt Quiz?</p>
				<ul>
				    <li><strong>Number of questions: </strong><?php echo $total; ?></li>
				    <li><strong>Type: </strong>Multiple Choice</li>
				    <li><strong>Estimated time for each question: </strong><?php echo $total * 0.05 * 60; ?> seconds</li>
				     <!-- <li><strong>Score: </strong>   &nbsp; +1 point for each correct answer</li> -->
				</ul>
				<a href="question.php?n=1" class="btn">Start</a>
				<a href="exit.php" class="btn">Exit</a>

			</div>
		</main>

		

	</body>
</html>
<?php //unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>