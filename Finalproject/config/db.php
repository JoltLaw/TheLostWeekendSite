<?php 

ob_start();
session_start();

$timezone = date_default_timezone_set("America/Denver");

$conn = mysqli_connect("localhost", "TLW", "T3llYourFr3inds", "thelostweekend");

if(mysqli_connect_errno()) {
  echo "failed to connect: " . mysqli_connect_errno();
} 
?>