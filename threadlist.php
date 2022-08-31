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


<!-- for dispalying categories in jumbotron -->
 <?php
 $cd=$_GET['catid'];
  $sql="SELECT * FROM `category` WHERE id=$cd";
  $result = mysqli_query($conn,$sql); 

  while($row = mysqli_fetch_assoc($result)){

    $cat =  $row['catname'];
    $sub = $row['catdesc'];
  }

 ?>

<!-- for inserting in to the form -->
 <?php
 $method= $_SERVER['REQUEST_METHOD'];
 $show=false;

 if($method=='POST'){  
    $tsub=$_POST['subject'];
   $ttitle=$_POST['title'];
   $tsub = str_replace("<","&lt;", $tsub);
   $tsub = str_replace(">","&gt;", $tsub);

   
   $ttitle = str_replace("<","&lt;", $ttitle);
   $ttitle = str_replace(">","&gt;", $ttitle);



     $sno=$_POST["sno"];
    $sql = "INSERT INTO `test` (`t_sub`, `t_title`, `t_cat_id`, `t_user_id`, `date`) VALUES ('$tsub', '$ttitle', '$cd', '$sno', current_timestamp())";
   $result = mysqli_query($conn,$sql); 
   $show=true;
   if($show){
     echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
     <strong>Holy guacamole!</strong> You should check in on some of those fields below.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   </div>';
   }
 }
 ?>

<!-- jumbotron -->
<div class="container my-3">
            <!-- <div class="jumbotron">
             <h1 class="display4">Welcome to <?php echo $cat;?></h1>
              <p class="lead"><?php echo $sub;?></p>
                      <hr class="my4">
                    <P>No Spam / Advertising / Self-promote in the forums. ...
                      Do not post copyright-infringing material. ...
                      Do not post “offensive” posts, links or images. ...
                      Do not cross post questions. ...Remain respectful of other members at all times.</p>
               <a class="btn btn-primary btn-lg" href="#" role="button">Learn New</a> -->
       

      <div class="jumbotron">
        <h1 class="display-4">Welcome to <?php echo $cat;?></h1>
          <p class="lead"><?php echo $sub;?></p>
            <hr class="my-4">
          <p>No Spam / Advertising / Self-promote in the forums. ...
                              Do not post copyright-infringing material. ...
                              Do not post “offensive” posts, links or images. ...
                              Do not cross post questions. ...Remain respectful of other members at all times.</p>
        
      </div>
</div> 
     
<!-- form -->
  <?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){     
echo'<div class="container">
  <h2 class="py-2">Start a discussion</h2>
    <form action="' . $_SERVER["REQUEST_URI"]. '"  method="post">
    <div class="form-group">  
        <label for="exampleFormControltextarea1">Thread Title</label>
        <input type="text" class="form-control" name="subject" id="subject" rows="5" cols="40"></input>
        <small id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</small>
      </div>
      <input type="hidden"  name="sno" value="'. $_SESSION["sno"] .'">
      <div class="form-group">
        <label for="exampleInputEmail1">Elaborate your Concern</label>
        <textarea type="text" class="form-control" name="title" id="title" rows="5" cols="40"></textarea>
      
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>';
  }
  else
  {
echo'
<div class="container">
<h2 class="py-2">Start a discussion</h2>
<p class="lead">You are not logged in</p>
</div>';
}
?>   
     
<div class="container mb-5" id="stu">

                  <h2 class="py-2">Browse Questions</h2>
                    <?php
                    $cd=$_GET['catid'];
                      $sql="SELECT * FROM `test` WHERE t_cat_id=$cd";
                      $result = mysqli_query($conn,$sql); 
                      $not=true;
                      while($row = mysqli_fetch_assoc($result)){
                        $not=false;
                        $title =  $row['t_title'];
                        $sub = $row['t_sub'];
                        $id = $row['t_id'];
                        $t_time= $row['date'];
                        $t_uid= $row['t_user_id'];
                        $sl="SELECT user_email FROM `user` WHERE sno='$t_uid'";
                        $result2 = mysqli_query($conn,$sl); 
                        $row2 = mysqli_fetch_assoc($result2);
                        $mail = $row2['user_email'];
              
                   
                     echo '<div class="media my-3">
                      <img src="use.jpg" width="50px" class="mr-3" alt="...">
                  <div class="media-body">'.
                 
              '<h5 class="mt-0"><a href="thread.php?threadid=' .  $id . ' ">' . $sub . ' </a></h5>
              ' . $title . '
        </div>'.'<p class="font-weight-bold my-0">Asked By: ' . $mail . ' at ' . $t_time . '</p>'.
      '</div>';
                      
        }
                  // echo var_dump($not);
                  if($not){
                   echo ' <div class="alert alert-primary" role="alert">
                   <b> Be the first person to ask!</b>
                  </div>';
                  }
                  ?>



      
        </div>

 <?php 
   include 'footer.html';?>
</body>
</html>

