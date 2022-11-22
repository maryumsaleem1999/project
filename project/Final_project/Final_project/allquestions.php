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
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

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
			<div class="container mt-5 mb-3"  >
			
				<a href="adminhome.php" class="btn">Home</a>
				<a href="add.php" class="btn">Add Question</a>
				<a href="allquestions.php" class="btn">All Questions</a>
				<a href="players.php" class="btn">Players</a>
				
				
			</div>
		</header>

		<div>
	<h1 class="mt-5"> All Questions</h1>
	<table class="data-table" id="myTable">
		<thead>
			<tr>
				<th>Q.NO</th>
				<th>Question</th>
				<th>Option1</th>
				<th>Option2</th>
				<th>Option3</th>
				<th>Option4</th>
				<th>Correct Answer </th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
</div>
        <?php 
            
            $query = "SELECT * FROM questions ORDER BY qno DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td> <a href='editquestion.php?qno=$qno'> Edit </a></td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
	<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>

<?php //} 
// else {
// 	header("location: admin.php");
// }
?>


