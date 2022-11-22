<?php //session_start(); ?>
<?php include "db_connect.php";
include "link.php";
include "studentnav.php";

// if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
		 Question added!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div> ' ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>
<style>
	#wrapper #content-wrapper #content {
    flex: 1 0 auto;
    background-color: white;
}
body{
	background-color:white;
}
	main {
    padding-bottom: 20px;
    background: white !important;
    color: black !important;
}
	 input[type='text']{
    border:none !important;
    border-bottom:1px solid rgb(43, 39, 145) !important;
    background-color:white !important;
    border-radius:0px !important;
	height:40px;
	font-size:20px;
  }


.btn {
    /* border: 2px solid rgb(188, 187, 187); */
    color:white;
    background-color: rgb(134, 198, 247);
    font-weight: bold;
    border-radius: 10px;
    padding: 10px;
}
.btn:hover{
  background-color:rgb(134, 198, 247);
  border: none;
}
p{
	font-size:20px;
}
select , option{
	font-size:15px;
}
.container{
	width: 60%;
	margin: 0 auto;
	overflow: auto;
	background-color: white;
	
}
	</style>

<!DOCTYPE html>
<html>
	<head>
		<title>ADD Questions</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body class="bg-white">
		<header style="background:white;">
			<div class="container mt-5 mb-3" >
				
				<a href="adminhome.php" class="btn">Home</a>
				<a href="add.php" class="btn">Add Question</a>
				<a href="allquestions.php" class="btn">All Questions</a>
				<a href="players.php" class="btn">Players</a>
				<!-- <a href="exit.php" class="start">Logout</a> -->
				
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Add a question...</h2>
				<form method="post" action="">

					<p>
						<label>Question</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Choice #1</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Choice #2</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Choice #3</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Choice #4</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Correct answer</label>
						<select name="answer">
                        <option value="a">Choice #1 </option>
                        <option value="b">Choice #2</option>
                        <option value="c">Choice #3</option>
                        <option value="d">Choice #4</option>
                    </select>
					</p>
					<p>
						
						<button type="submit" name="submit" class="btn  active" >Submit</button>
					</p>
				</form>
			</div>
		</main>

		

	</body>
</html>

<?php //} 
//else {
//	header("location: admin.php");
//}
?><?php //session_start(); ?>
<?php include "db_connect.php";
// if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully added'); </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>

