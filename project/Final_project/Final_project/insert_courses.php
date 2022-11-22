<?php
    include "link.php";
    include "db_connect.php";
    include "studentnav.php";
    ?>

<?php
if(isset($_POST['submit'])){
  
    $teacher_name=$_POST['teacher'];
    $semester=$_POST['semester'];
    $course_heading=$_POST['heading'];
    $course_des=$_POST['description'];
  
  // $select = "SELECT * FROM `teacher_courses`";
  // $sql=mysqli_query($conn , $select);
  // while($row= mysqli_fetch_assoc($sql)){
  //   // $semesterr=$row['semesters'];
  //   // $t_id= $row['id'];
  //   // $id= $row['courses_assign_teacher'];
  // }
    $sql1="SELECT * FROM `teacher_courses` ";
    $result=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_assoc($result)){
   $t_id= $row['id'];
    }
   $sql1="SELECT * FROM `teacher_courses` ";
   $result=mysqli_query($conn,$sql1);
   while($row=mysqli_fetch_assoc($result)){
  $id= $row['courses_assign_teacher'];
   
    }
  
  if($t_id ==$id){
echo "already";
  }else{
    $sql= "INSERT INTO `teacher_courses` (courses_heading, courses_des, semesters ,courses_assign_teacher) VALUES ('$course_heading', '$course_des', '$semester','$teacher_name')";
     $insert=mysqli_query($conn , $sql);
  
       echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
       Your Course is Added!
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>';
  } 
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  .form-group{
    width:70%;
    display:block;
    margin-left:auto;
    margin-right:auto;
    color:rgb(43, 39, 145);
    font-size:20px;
    font-weight:bold;
    
  } 
  input[type=text]{
    border:none;
    border-bottom:1px solid rgb(43, 39, 145);
    background-color:#f8f9fc;
    border-radius:0px;
  }
  .btn{
border: 2px solid rgb(188, 187, 187); 
  color:rgb(43, 39, 145);
  background-color:rgb(134, 198, 247);
  font-weight:bold;
}
.btn:hover{
  background-color:rgb(134, 198, 247);
  border: none;
}

</style>
<body>
    

<form action="insert_courses.php" method="POST"> 
<div class="form-group">
    <label for="exampleFormControlSelect1">Add Semester</label>
    <select class="form-control" name="semester" id="exampleFormControlSelect1">
    <?php $select = "SELECT * FROM `semesters`";
  $sql=mysqli_query($conn , $select);
  while($row= mysqli_fetch_assoc($sql)){?>
    <option value="<?php echo $row['semesters']; ?>"><?php echo $row['semesters']; ?></option> 
 <?php }
  ?> 
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Add Heading</label>
    <input type="text" name="heading" class="form-control" id="exampleInputPassword1" Required>
 </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Add Descriptions</label>
    <input type="text" name="description" class="form-control" id="exampleInputPassword1" Required></div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Select Teacher</label>
    <select class="form-control" name="teacher" id="exampleFormControlSelect1">
   <?php
  //  $t_name = $_SESSION['name'];
  //  $t_role_id = $_SESSION['role_id'];
   $t_role_id = 2;
    $select = "SELECT * FROM `users` Where role_id ='{$t_role_id}'";
  $sql=mysqli_query($conn , $select);
  while($row= mysqli_fetch_assoc($sql)){
  
    ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option> 
 <?php }
  ?>   
  </select>
    <div class="row">
     <div class="col-lg-4 mt-5">
     <button name="submit" class="btn  active  " role="button" aria-pressed="true" style="color:rgb(43, 39, 145); background-color:rgb(134, 198, 247);  ">Add Course</button></div>
     <div class="col-lg-4 mt-5 ">
     <a href="add_teachers.php" class="btn  active  " role="button" aria-pressed="true" style="color:rgb(43, 39, 145); background-color:rgb(134, 198, 247);   ">ADD Teachers Details</a></div>
     <div class="col-lg-4 mt-5">
     <a href="Add_courses.php" class="btn  active  " role="button" aria-pressed="true" style="color:rgb(43, 39, 145); background-color:rgb(134, 198, 247);  ">Go To Add Courses</a></div>
  </div>
    </div>
  

  
</form>

</body>
</html>