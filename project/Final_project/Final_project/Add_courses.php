<?php
include "studentnav.php";
include "link.php";
include "db_connect.php";


?>
<?php
if(isset($_GET['Delete'])){
  $id=$_GET['Delete'];
  $sql = "DELETE FROM `teacher_courses` WHERE `id` = $id";
  $result = mysqli_query($conn, $sql);
  if($result){
      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
   Deleted Successfully!
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
  }
}
if(isset($_POST['snoEdit'])){
  $editno=$_POST['snoEdit'];
  $editcourse=$_POST['course'];
  $editteacher=$_POST['teacher'];
  $editcat=$_POST['category'];
  $editdes=$_POST['description'];
    $sql = "UPDATE `teacher_courses` SET `courses_heading` = '$editcourse' , `courses_des` = '$editdes' , `courses_cat`='$editcat',`courses_assign_teacher`='$editteacher' WHERE `teacher_courses`.`id` = $editno";
    $result = mysqli_query($conn , $sql);
    if($result){
      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
     Updated successfully!
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
      
    }else{
      echo "not updated";
    }
}else{
  if(isset($_POST['submit'])){
    $teacher_name=$_POST['teacher'];
    $course_cat=$_POST['category'];
    $course_heading=$_POST['course'];
    $course_des=$_POST['description'];
    $sql= "INSERT INTO `teacher_courses` (courses_heading, courses_des, courses_cat, courses_assign_teacher) VALUES ('$course_heading', '$course_des', '$course_cat','$teacher_name')";
      $insert=mysqli_query($conn , $sql);
  if($insert){
      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
       Added!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }else {
      echo "not";
  }
  }
}
?>
<style>

.number {
   
    width:25px;
    height: 25px;
    border:0.5px solid rgb(188, 187, 187);
    text-align:center;
    border-radius: 10px;
    font-size: 15px;;

}
.btn{
  /* border: 2px solid rgb(188, 187, 187); */
  color:rgb(43, 39, 145);
}
.btn:hover{
  background-color:rgb(134, 198, 247);
  border: none;
}
.head{
    /* height:auto; */
    border:0px;
    border-top:1px solid black;
    position:relative;
    bottom:24px;
    background-color:rgb(198, 203, 245);
}
.headings{
    margin-top:40px;
    margin-left:40px;
}
input[type=checkbox], input[type=radio] {
    box-sizing: border-box;
    padding: 0;
    width: 20px;
    height: 20px;
    position: relative;
    left: 243px;
    top: 2px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <title>Courses</title>
</head>
<body>
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="Add_courses.php" method="POST" > 
        <input type="hidden" class="hidden" id="snoEdit" name="snoEdit">
  <div class="form-group">
    <label for="exampleInputEmail1">Courses</label>
    <input type="text" name="course" class="form-control" id="course" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Teacher</label>
    <input type="text" name="teacher" class="form-control" id="teacher" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">category</label>
    <input type="text" name="category" class="form-control" id="category" aria-describedby="emailHelp" required>
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" name="description" class="form-control" id="description" Required>
    
    <div class="row">
     <div class="col-lg-6 mt-5">
    <button name="submit" class="btn  active  " role="button" aria-pressed="true" style="color:rgb(43, 39, 145); background-color:rgb(134, 198, 247);  ">Update details</button></div>
  </div>  
</div>
</form>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Header -->
<div class="head">
<div class="headings">
<div class="row">
  <div class="col-sm-6">
    <h5>ADD COURSES</h5>
  </div>
  
  <div class=" row d-flex col-sm-6 text-center">
 
  <a href="insert_courses.php" class="btn btn-lg active  " role="button" aria-pressed="true" style="background-color:rgb(134, 198, 247); color:white; position:relative; bottom:20px; left:25px;">ADD</a>

  </div>
</div>
</div>
</div>





<div class="container">
<table class="table ml-2 mr-2 mb-3" id="myTable">
  <thead>
    <tr>
      
      <th scope="col">Courses</th>
      <th scope="col">teacher</th>
      <th scope="col">Semesters</th>
      <th scope="col">Course description</th>

    </tr>
  </thead>
  
  <tbody>
  <?php
    $sql="SELECT * FROM `teacher_courses`";
    $result=mysqli_query($conn,$sql);
    while($row= mysqli_fetch_assoc($result)){
    // echo $row['id'];
    // echo $row['courses_heading'];
   
    $teacher=$row['courses_assign_teacher'];
    $heading= $row['courses_heading'];
    $semester= $row['semesters'];
    $des= $row['courses_des'];
    
   $string = strip_tags($des);
   if(strlen($string)>50){
    $srtingcut=substr($string,0,100);
    $endpoint=strrpos($srtingcut,' ');
    $string=$endpoint?substr($srtingcut,0,$endpoint):substr($srtingcut,0);
    $string.='...';
    
   }
   
   
   ?>
 
    <div class="col-sm-4">
    <tr>
      
      <td><?php echo $heading; ?></td>
      <?php $select = "SELECT * FROM `users` WHERE `id` = $teacher";
      $query=mysqli_query($conn , $select);
     
      while($row1 = mysqli_fetch_assoc($query)){?>
      <td><?php echo $row1['name'];?></td>
      <?php } ?>
      <td><?php echo $semester; ?>   </td>
      <td><?php echo $string; ?></td>
      
       <!-- <td><button class="Edit btn bg-white" id=<?php //echo $row['id']?>>Edit</button></td>
    <td><button class="Delete btn bg-white"  id=<?php //echo $row['id']?> name="delete">Delete</button></td>  
    -->
    </tr>
    </div>
 <?php }
    ?>
    
    
  </tbody>
 </table>
  </div>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
     edits = document.getElementsByClassName('Edit');
   Array.from(edits).forEach((element) => {
     element.addEventListener("click", (e)=>{
     console.log("Edit");
     tr= e.target.parentNode.parentNode;
     courses = tr.getElementsByTagName("td")[0].innerText;
     teachers =tr.getElementsByTagName("td")[1].innerText;
     categorys =tr.getElementsByTagName("td")[2].innerText;
     descriptions =tr.getElementsByTagName("td")[3].innerText;
    
     console.log(course, teacher,category,description);
     course.value = courses;
     teacher.value = teachers;
     category.value = categorys;
     description.value = descriptions;
     snoEdit.value = e.target.id;
     console.log(e.target.id);
     $('#EditModal').modal('toggle');
    })
   })

   deletes = document.getElementsByClassName('Delete');
   Array.from(deletes).forEach((element) => {
     element.addEventListener("click", (e)=>{
     console.log("Delete");
     id= e.target.id.substr(0);
     if(confirm("Are you sure you want to delete this??")){
      console.log ("yes");
      window.location = `Add_courses.php?Delete=${id}`;
     }
     else{
      console.log ("no") ;
     }
     
     })
   })
    </script>
</body>
</html>






