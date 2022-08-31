<?php   
$showerr="false";
if($_SERVER['REQUEST_METHOD']=="POST"){

 include 'connect.php';
 $email=$_POST['email'];
 $pass=$_POST['spass'];
 $cpass=$_POST['scpass'];

 $exist = "SELECT * FROM `user` WHERE user_email = '$email'";
 $result = mysqli_query($conn,$exist); 
 $rows = mysqli_num_rows($result);
 if($rows>0){
     $showerr="Email alread exists";
 }

 elseif($pass==$cpass)
    {
        $hash =password_hash($pass, PASSWORD_DEFAULT);   
        $sql="INSERT INTO `user` (`user_email`, `user_pass`, `date`) VALUES 
        ('$email', '$hash', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        if($result){
            $alert=true;
            header("Location:index.php?signupsuccess=true");
            exit();
        }     
    }

    // else{
    //     $showerr="password aren't matched";
    
    //     }
    
    header("Location:index.php?signupsuccess=false&error=$showerr");
}
?>