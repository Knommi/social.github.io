<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="mydb";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("Sorry!Did not connected!" . mysqli_connect_error());
}

?>