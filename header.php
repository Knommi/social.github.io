<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">I Discuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-hashpopup="true aria-expanded="false">
     Top
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

          $sql="SELECT catname, id FROM `category` LIMIT 3";
          $result = mysqli_query($conn,$sql); 
          while($row = mysqli_fetch_assoc($result)){
          echo '<a class="dropdown-item" href="threadlist.php?catid=' . $row['id'] . '">' . $row['catname'] . '</a>';
          }
          echo '</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contacts</a>
        </li>
      </ul>
      <div class="row mx-2">';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="form-inline my-2 my-lg-2" method="get" action="search.php">
        <input class="form-control mr-sm-2" name="such" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        <p class="text-light my-0 mx-2">Welcome ' . $_SESSION['useremail']. '</p>
        <a href="logout.php" class="btn btn-outline-danger ml-2">Logout</a>
        </form>';
      }
      else{
      echo '
     <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#logmodal">Login</button>
     <button class="btn btn-outline-info mx-2" data-toggle="modal" data-target="#sinmodal">Sign up</button>

    </div>';
  }
   echo '</div>
  </div>
</nav>';

include 'logmodal.php';
include 'sinmodal.php';

if(isset($_GET['signupsuccess']))
// if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
//   echo "yes";
// }
//   echo"<div class="alert alert-warning alert-dismissible fade show" role="alert">
//   <strong>Holy guacamole!</strong> You should check in on some of those fields below.
//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
// </div>";
// }


?>
