<?php
include "link.php";
include "db_connect.php";
include "studentnav.php";
?>
<?php
if(isset($_POST['submit'])){
    $teacher_name=$_POST['t_name'];
    $teacher_username=$_POST['t_username'];
    $teacher_email=$_POST['t_email'];
    $teacher_department=$_POST['t_department'];
    $teacher_password=$_POST['t_password'];
    $teacher_cpassword=$_POST['t_cpassword'];
    $teacher_role = 2;
    if ($teacher_password == $teacher_cpassword) {
      $sql= "INSERT INTO users (role_id, username, email, password, name, department) VALUES ('{$teacher_role}', '{$teacher_username}', '{$teacher_email}', MD5('{$teacher_password}'), '{$teacher_name}', '$teacher_department');";
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
    }else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       Password do not Match
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
    width:50%;
    display:block;
    margin-left:auto;
    margin-right:auto;
    color:rgb(43, 39, 145);
    font-size:20px;
    font-weight:bold;
    
  } 
  input[type=text], input[type=email]{
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
<form action="add_teachers.php" method="POST" class="mt-5"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="t_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" name="t_username" class="form-control" id="exampleInputPassword1" Required>
  </div>  
  <div class="form-group">
    <label for="exampleInputPassword1">Email Address</label>
    <input type="email" name="t_email" class="form-control" id="exampleInputPassword1" Required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Department</label>
    <input type="text" name="t_department" class="form-control" id="exampleInputPassword1" Required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="t_password" class="form-control" id="exampleInputPassword1" Required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="t_cpassword" class="form-control" id="exampleInputPassword1" Required>
  </div>
  <div class="form-group">
    <div class="row">
     <div class="col-lg-6 mt-5">
     <button name="submit" class="btn  active  " role="button" aria-pressed="true" style="color:rgb(43, 39, 145); background-color:rgb(134, 198, 247);  ">Add  details</button></div>
     <div class="col-lg-6 mt-5">
     <a href="show_teachers_dep.php" class="btn  active  " role="button" aria-pressed="true" style="color:rgb(43, 39, 145); background-color:rgb(134, 198, 247);  ">Check details</a></div>

  </div>
  
</div>

  
</form>    

</body>
</html>