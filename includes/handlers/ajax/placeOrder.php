<?php 
include("../../../config/db.php");


if(isset($_POST["name"]) &&  isset($_POST["items"]) ) {
  
  $name = $_POST["name"];
  $items = $_POST["items"];
  $date = date("Y-m-d"); 
  
  
  if(isset($_POST["userId"])) {
    $id = $_POST["userId"];
    $bagQuery = mysqli_query($conn, "DELETE FROM bagitems WHERE userId='$id'");
  }
  
  
  $orderQuery = mysqli_query($conn, "INSERT INTO orders VALUES('','$name', '$items', '$date')");
  
  

  return;


} else {
  echo "The correct data was not put into place order";
  exit();
}
?>