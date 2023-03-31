<?php 
include("../../../config/db.php");

if(isset($_POST["accountId"])) {
  $accountId = $_POST["accountId"];

  $accountQuery = mysqli_query($conn, "DELETE FROM users WHERE id='$accountId'");
  $bagQuery = mysqli_query($conn, "DELETE FROM bagItems WHERE user='$accountId'");
} else {
  echo "accountId was not passed into deleteAccount.php";
}

?>