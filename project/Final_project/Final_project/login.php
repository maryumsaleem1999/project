<?php
    include "link.php";
   //echo md5('12345');
    if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .h3, h3 {
    font-size: 2rem;
    position: relative;
    bottom: 191px;
    color:#053700
    
}
    </style>
<body>
 <div class="container d-flex justify-content-center align-items-center" style="min-height:110vh;">
<div class="row">
    <div class="col-lg-6">
    <img src="fuuastlogo.png" class="" style="width: 400px; position: relative;
       bottom: 97px; left:70px;" >
       <h3 class="text-center">Federal Urdu University Of Arts Science And Technology</h3>
    
    </div>
<div class="col-lg-6">
<form class=" border shadow p-3 rounded" style="width:450px;" action="check-login.php" method="POST">

<h1 class="text-center" style="color:#053700;">FUUAST Login</h1>
<?php if(isset($_GET['error'])) {?>
    <div class="alert alert-success" role="alert">
   <?=$_GET['error']?>
</div><?php
}?>

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group mb-3">
    <label for="exampleFormControlSelect1">Select User Type</label>
    <select class="form-control" name="role_id" id="exampleFormControlSelect1">
      <option value="1">Admin</option>
      <option value="2">Teacher</option>
      <option value="3">Student</option> 
    </select>
  
    <button type="submit"  class="btn btn-primary mt-4">Login</button>
</form>
</div>
</div>
</div> 
</body>
</html>
<?php }else{
	header("Location:login.php");
} ?>