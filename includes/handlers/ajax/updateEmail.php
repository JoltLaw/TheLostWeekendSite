<?php 

include("../../../config/db.php");

if(!isset($_POST["email"])) {
  echo "Error new email could not be set";
  exit();
}

if(isset($_POST["email"]) && $_POST["email"] != "") {
  $newEmail = $_POST["email"];
  $id = $_POST["id"];

  $updateQuery = mysqli_query($conn, "UPDATE users SET email = '$newEmail' WHERE id='$id'");
  $_SESSION["userLoggedIn"] = $newEmail;
  echo "Update was successful";
} else {
  echo "You must provide an email";
}

?>