<?php

session_start();
$mytime=80;
if(!isset($_SESSION["time"])){
    $_SESSION['time']=time();
}else{
    $diff = time()-$_SESSION['time'];
    $diff = $mytime-$diff;
    $hours= floor($diff/60);
    $minute= (int)($diff/60);
    $sec= $diff%60;
    $show = $hours.":".$minute.":".$sec;
    
    if($diff==0|| $diff<0){
       echo "timeout";
        session_destroy();
       // $_SESSION['score']= true;?>
      
<script>   window.location.replace("http://localhost/project/project/Final_project/Final_project/quiz_student/results.php"); </script>

      <?php  
    }else{
      echo $show;
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
<body>
    <!-- <div id="demo"></div> -->
    <!-- <script type="text/javascript">
        document.getElementById("demo").innerHTML=Math.floor(5.1);
    </script> -->
</body>
</html>