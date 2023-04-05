<?php


$server ="localhost";
$user    ="root";
$senha      ="";
$database     ="consultas";


$conn = mysqli_connect($server,$user,$senha,$database);
mysqli_set_charset ( $conn , 'utf8' );
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_select_db($conn,$database);

?>











