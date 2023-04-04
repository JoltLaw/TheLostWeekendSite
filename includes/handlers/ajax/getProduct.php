<?php 

include("config/db.php");

if(isset($_GET["catagory"])) {
  $catagory = $_GET["catagory"];

  echo "<script>console.log('$catagory')</script>";
}

?>