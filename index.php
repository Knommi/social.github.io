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


 
 <!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!- Indicators -->
        <!-- <ul class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul> -->

        <!-- The slideshow -->
        <!-- <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/2400x700/?motivation" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x700/?celebrities,quotes" class="d-block w-100" >
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x700/?computer" class="d-block w-100" >
          </div>
        </div> -->

        <!-- Left and right controls -->
        <!-- <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a> -->
  <!-- </div> --> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ul>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/2400x700/?motivation" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x700/?celebrities,quotes" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x700/?computer" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
</div>
        
        





 
 <div class="container my-3" id="stu">
            <h3 class="text-center">WElCome</h3>
                <div class="row my-4">
    <?php  
        $sql="SELECT * FROM `category`";
      $result = mysqli_query($conn,$sql); 
      while($row = mysqli_fetch_assoc($result)){
          // echo $row['id'];
          // echo $row['catname'];
          $cid = $row['id'];
          $cat =  $row['catname'];
          $desc = $row['catdesc'];
          echo '<div class="col-md-4"><div class="card" style="width: 18rem;">
          <img src="https://source.unsplash.com/500x400/?' . $cat . ',computer" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title"><a href="threadlist.php?catid=' . $cid. ' "> '.$cat.'</a></h5>
            <p class="card-text">' . substr($desc,0,100) . '...</p>
            <a href="threadlist.php?catid=' . $cid. '" class="btn btn-primary">View threads</a>
          </div>
        </div></div>';

        }
        
        
        ?>

      
    </div>
 </div>
 <?php   include 'footer.html';?>
</body>
</html>