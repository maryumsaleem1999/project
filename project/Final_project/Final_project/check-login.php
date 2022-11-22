<?php
session_start();
include "db_connect.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role_id'])) {

	
	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
  
      $username = test_input($_POST['username']);
      $password = test_input($_POST['password']);
      $role_id = test_input($_POST['role_id']);
     
      

	if (empty($username)) {
		header("Location:login.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location:login.php?error=Password is Required");
	}else {

		// Hashing the password
		$password = md5($password);
        
        $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['role_id'] == $role_id) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role_id'] = $row['role_id'];
        		$_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
                
               
                                
             if($role_id== 2){
            
        
                header("location:teacher_courses.php");
             }else if($role_id== 1){
               header("location:Add_courses.php");
             }
             else if($role_id= 3){
               header("location:studentdashboard.php");
             }else{
                header("location:login.php?error=not login");

             }
            //  if($role_id='user'){
            //     header("location:userdashboard.php");
            //  }else{
            //     header("location:login.php?error=not login");

            //  }

        	}else {
        		header("Location:login.php?error=Incorrect User name or password");
        	}
        }else {
        	header("Location:login.php?error=Incorrect User name or password");
        }

	}
	
}else {
	header("Location:login.php");
}
?>





