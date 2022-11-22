
<?php 
session_start();
include "connection.php";
include "link.php";

if (isset($_SESSION['id'])) {
	
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
	        $qno = $_GET['n'];
	        if ($qno == 1) {
	        	$_SESSION['quiz'] = 1;
	        }
	        }
	        else {
	        	header('location: question.php?n='.$_SESSION['quiz']);
	        } 
	        if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == $qno) {
			$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
                 $_SESSION['quiz'] = $qno;
                 $checkqsn = "SELECT * FROM questions" ;
                 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
                 $countqsn = mysqli_num_rows($runcheck);
                 $time = time();
                 $_SESSION['start_time'] = $time;
                 $allowed_time = $countqsn * 0.05;
                 $_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time * 60) ;
                 

			}
			else {
				echo "<script> alert('something went wrong');
			window.location.href = 'home.php'; </script> " ;
			}
		}
		else {
		echo "<script> alert('error');
			window.location.href = 'home.php'; </script> " ;
	}
?>
<?php 
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);

?>
<html>
	<head>
		<title>PHP-kuiz</title>
		<link rel="stylesheet" type="text/css" href="\css\style.css">
	</head>
	<style>
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
.current{
	padding:10px;
	background: #86c6f7;
	border-left:0;
	margin: 20px 0 10px 0;
	border-bottom:1px solid black;
}
.container{
	width:60% !important;
	border:1px solid black;
	
}

</style>
	<body>
		<header>
			<div class="container">
				
				

		</header>
		<h2 class="m-5 text-center" >Your quiz:<div id="time"  >
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>
    <script>
       $(document).ready(function(){
        setInterval(function(){
        $("#show").load("timer.php");
        },0);
        });
    </script>
<p id="show"></p></div></h2>
		<script>

// $(document).ready(function(){
// 	setInterval(function(){
// 	  $("#show").load("timer.php");
// 	},1000);
// });
</script>


<p id="show" class="text-black"></p>
		<main>
			<div class= "container">
				<div class= "current">Question <?php echo $qno; ?> of <?php echo $totalqn; ?></div>
				<p class="question"><?php echo $question; ?></p>
				<form method="post" action="process.php">
					<ul class="choices">
					   <li><input name="choice" type="radio" value="a" required=""><?php echo $ans1; ?></li>
					   <li><input name="choice" type="radio" value="b" required=""><?php echo $ans2; ?></li>
					   <li><input name="choice" type="radio" value="c" required=""><?php echo $ans3; ?></li>
					   <li><input name="choice" type="radio" value="d" required=""><?php echo $ans4; ?></li>
					 
					</ul>
					<input type="submit" class="btn mb-3" value="Submit"> 
					<input type="hidden" name="number" value="<?php echo $qno;?>">
					<!-- <br>
					<br>
					<a href="results.php" class="btn">Stop Kqiz</a> -->
				</form>
			</div>
		</main>
</body>
</html>

<?php } 
else {
	header("location: home.php");
}
?>