<?php 
include("../../../config/db.php");

if(!isset($_POST["name"])) {
  echo "ERROR: Could not set name";
  exit();
}

if(isset($_POST["name"]) && $_POST["name"] != "") {
  $email = $_POST["email"];

  $name = $_POST["name"];

  $updateQuery = mysqli_query($conn, "UPDATE users SET name = '$name' WHERE email='$email'");
  echo "Update successful";
}   
else {
  echo "You must provide an email";
}
?>