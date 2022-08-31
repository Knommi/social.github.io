<!DOCTYPE html>
<html lang="en">
<head>
<style>
.container {
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


 <!-- Seaech results -->

 <!-- search starts -->
 <div class="container my-3">
 <h1 class="py-3">Search results <b><em> "<?php echo $_GET['such']?>"</em></b></h1>
 
 <?php
 $noresult=true;
 $shortcut = $_GET["such"];
 $sql="SELECT * FROM `test` WHERE t_sub='$shortcut' OR t_title='$shortcut'";
 $result = mysqli_query($conn,$sql); 

 while($row = mysqli_fetch_assoc($result)){
      $title =  $row['t_title'];
      $sub = $row['t_sub'];
      $th_id = $row['t_id'];
      $t_time= $row['date'];
      $t_uid= $row['t_user_id'];
      $sl="SELECT user_email FROM `user` WHERE sno='$t_uid'";
      $result2 = mysqli_query($conn,$sl); 
      $row2 = mysqli_fetch_assoc($result2);
      $mail = $row2['user_email'];
    $url= "thread.php?threadid=" . $th_id;
    $noresult=false;

    echo '<div class="media my-3">
                      <img src="use.jpg" width="50px" class="mr-3" alt="...">
                  <div class="media-body">
              <h3><a href="' . $url . '" class="text-primary">' . $sub . '</a></h3>
              <p>' . $title . '</p>
       </div>'.'<p class="font-weight-bold my-0">Asked By: ' . $mail . ' at ' . $t_time . '</p>'.
      '</div>';
    }
      if($noresult){
          echo ' <div class="alert alert-primary" role="alert">
          <h4><b> No Results Found</b></h4>
          <h6><i><ul><li>Make sure that all words are spelled correctly.</li>
          <li>Try different keywords.</li>
          <li>Try more general keywords.</li></ul></i></h6>
         </div>';
         
     
      }
?>

 </div>

 
 
 


 
 <?php   include 'footer.html';?>
</body>
</html>