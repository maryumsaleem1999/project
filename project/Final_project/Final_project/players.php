<?php session_start(); ?>
<?php include "db_connect.php";
include "link.php";
//if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<style>

.btn{
  /* border: 2px solid rgb(188, 187, 187); */
  color:white;
  background-color:rgb(134, 198, 247);
}
.btn:hover{
  background-color:rgb(134, 198, 247);
  border: none;
}
	</style>
	<body>
		<header class="bg-white">
			<div class="container mt-5 mb-4">
			
				<a href="adminhome.php" class="btn">Home</a>
				<a href="add.php" class="btn">Add Question</a>
				<a href="allquestions.php" class="btn">All Questions</a>
				<a href="players.php" class="btn">Players</a>
				<!-- <a href="exit.php" class="start">Logout</a> -->
				
			</div>
		</header>

		
	<h1> All STUDENTS</h1>
	<table class="data-table">
		<caption class="title">STUDENTS WHO ATTEMPT QUIZ</caption>
		<thead>
			<tr>
			<!-- <th>Player Id</th> -->
			<th>Email</th>
			<th>Played On</th>
			<!-- <th>Score</th> -->
			</tr>
		</thead>
		<tbody>
		<?php 
            
            $query = "SELECT * FROM user ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                 $id = $row['id'];
                $email = $row['email'];
                $played_on = $row['played_on'];
                // $score = $row['score'];
                echo "<tr>";
                // echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$played_on</td>";
                // echo "<td>$score</td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

<?php// } 
// else {
// 	header("location: admin.php");
// }
?>

