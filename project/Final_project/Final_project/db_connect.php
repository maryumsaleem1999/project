
<?php 
$server= "localhost";
$user= "root";
$password="";
$db = "lms";
$conn = mysqli_connect($server,$user,$password,$db);

if($conn){
   //echo "connect";

}else{
    echo "not connect";
}
?>