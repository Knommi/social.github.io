<!DOCTYPE html>
<html lang="en">
<head>
<style>
#stu {
min-height: 433px;
}
</style>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php   include 'connect.php';?>
 <?php   include 'header.php';?>


 <?php
 $cd=$_GET['threadid'];
  $sql="SELECT * FROM `test` WHERE t_id=$cd";
  $result = mysqli_query($conn,$sql); 

  while($row = mysqli_fetch_assoc($result)){
    $title =  $row['t_title'];
    $sub = $row['t_sub'];
    $tuserid= $row['t_user_id'];


    $sl="SELECT user_email FROM `user` WHERE sno='$tuserid'";
    $result2 = mysqli_query($conn,$sl); 
    $row2 = mysqli_fetch_assoc($result2);
    $posted = $row2['user_email'];
  }

 ?>


<?php
 $method= $_SERVER['REQUEST_METHOD'];
 $show=false;
//  echo $method;
 if($method=='POST'){  
    $comment=$_POST['comment'];
    
    $comment = str_replace("<","&lt;",$comment);
    $comment = str_replace(">","&gt;",$comment);
    $sno=$_POST["sno"];
    $sql = "INSERT INTO `comment` (`c_content`, `t_id`, `c_time`, `comment_by`) VALUES ('$comment', '$cd', current_timestamp(), '$sno')";
   $result = mysqli_query($conn,$sql); 
   $show=true;
   if($show){
     echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
     <strong>Thankyou! Your comment is submitted</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   </div>';
   }
 }
 ?>

  <div class="container my-3">
            <!-- <div class="jumbotron">
             <h1 class="display4"><?php echo $sub;?></h1>
              <p class="lead"><?php echo $title;?></p>
                      <hr class="my4">
                    <P>No Spam / Advertising / Self-promote in the forums. ...
                      Do not post copyright-infringing material. ...
                      Do not post “offensive” posts, links or images. ...
                      Do not cross post questions. ...Remain respectful of other members at all times.</p>
      <p>Posted By:<b>-fdsfd</b></p>
         -->
         <div class="jumbotron">
        <h1 class="display-4"><?php echo $sub;?></h1>
          <p class="lead"><?php echo $title;?></p>
          <hr class="my-4">
          <p>No Spam / Advertising / Self-promote in the forums. ...
                              Do not post copyright-infringing material. ...
                              Do not post “offensive” posts, links or images. ...
                              Do not cross post questions. ...Remain respectful of other members at all times.</p>
                              <p>Posted by:-<b><?php echo $posted;?></b></p>
        
            </div>
        </div>

<?php 
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){     
      echo'<div class="container">
      <h2 class="py-2">Post a comment</h2>
        <form action="' . $_SERVER["REQUEST_URI"] . '"  method="post">
      
          <div class="form-group">
            <label for="exampleInputEmail1">Type your comment</label>
              <textarea type="text" class="form-control" name="comment" id="comment" rows="5" cols="40"></textarea>
              <input type="hidden"  name="sno" value="'. $_SESSION["sno"] .'">
              </div>
          
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
      </div>';
            
        }
        else
        {
          echo'
      <div class="container">
      <h2 class="py-2">Post a comment</h2>
      <p class="lead">You are not logged in</p>
      </div>';
      }
?>   



<div class="container" id="stu">

                  <h2 class="py-2">Discussions</h2>
                  <?php
                      $cd=$_GET['threadid'];
                        $sql="SELECT * FROM `comment` WHERE t_id=$cd";
                        $result = mysqli_query($conn,$sql); 
                        $not =true;
                        while($row = mysqli_fetch_assoc($result)){
                          $not =false;
                          $id = $row['c_id'];
                          $cont =  $row['c_content'];
                          $c_time =  $row['c_time'];
                          $cby= $row['comment_by'];

                          $sl="SELECT user_email FROM `user` WHERE sno='$cby'";
                          $result2 = mysqli_query($conn,$sl); 
                          $row2 = mysqli_fetch_assoc($result2);
                          $mail = $row2['user_email'];

                          echo' <div class="media my-3">
                          <img src="use.jpg" width="50px" class="mr-3" alt="...">
                      <div class="media-body">
                      
                      <p class="font-weight-bold my-0">'. $mail .' at ' . $c_time . '</p>
                ' . $cont . '
            </div>
          </div>';
    
                      }
                         
                       

                  ?>
                   
                  <?php if($not)
                  {
                   echo ' <div class="alert alert-primary" role="alert">
                   <b> Be the first person to ask!</b>
                  </div>';
                  }
                  ?>

        </div>

 <?php   include 'footer.html';?>
</body>
</html>