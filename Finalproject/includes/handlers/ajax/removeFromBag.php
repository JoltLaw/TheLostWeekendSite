<?php 
include("../../../config/db.php");


if(isset($_POST["id"]) && $_POST["id"] != "") {
  $id = $_POST["id"];
  $query = mysqli_query($conn, "DELETE FROM bagitems WHERE id='$id'");
  return;
} else {
  echo "Id was not passed into removeFromBag";
  exit();
}

?>