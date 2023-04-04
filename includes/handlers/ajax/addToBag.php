<?php 
include("../../../config/db.php");


if(!isset($_POST["productId"])) {
  echo "productId was not passed into addToBag";
  exit();
}

if(!isset($_POST["accountId"])) {
  echo "accountId was not passed into addToBag";
  exit();
}

if (!isset($_POST["productColor"])) {
  echo "productColor was not passed into addToBag";
}

if(isset($_POST["productId"]) && isset($_POST["accountId"]) && $_POST["productId"] != "" && $_POST["accountId"] != "") {
  $item = $_POST["productId"];
  $user = $_POST["accountId"];
  $color = $_POST["productColor"];
  $size = $_POST["productSize"];
  echo $item;
  echo $user;
  $result = mysqli_query($conn, "INSERT INTO bagitems(userId, itemId, color, size ) VALUES('$user', '$item', '$color', '$size')");
  return $result;
}

?>