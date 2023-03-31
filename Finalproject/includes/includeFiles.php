<?php
if (isset($_SERVER["HTTP_X_REQUESTED_WITH"])) {
  include("config/db.php");
  include("includes/classes/Item.php");
  include("includes/classes/User.php");
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>';
  echo'<script src="../../../assets/js/index.js"></script>';
  echo'<link rel="stylesheet" href="assets/styles/style.css">';
} else {
  include("config/db.php");
  include("includes/classes/Item.php");
  include("includes/classes/User.php");
  include("includes/components/navs/headerNav.php");
  include("includes/components/navs/footerNav.php");
  $url = $_SERVER["REQUEST_URI"];
  echo "<script>changePage('$url')</script>";
  exit();
}
?>