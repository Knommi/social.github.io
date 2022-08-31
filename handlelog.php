<?php
$showerr="false";
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'connect.php';
$email=$_POST['lemail'];
$pass=$_POST['lpass'];

$exist = "SELECT * FROM `user` WHERE user_email = '$email'";
$result = mysqli_query($conn,$exist); 
$numrows = mysqli_num_rows($result);
if($numrows==1){
   $row=mysqli_fetch_assoc($result);
   if(password_verify($pass,$row['user_pass'])){
       session_start();
       $_SESSION['loggedin']="true";
       $_SESSION['sno']= $row['sno'];
       $_SESSION['useremail']=$email;
       echo "logged in". $email;
    //    header("Location:index.php");
    //    exit();
          }
  
            header("Location:index.php");
    }
    header("Location:index.php");
}  
?>