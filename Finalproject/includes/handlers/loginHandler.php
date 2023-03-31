<?php 

if(isset($_REQUEST["loginEmail"])) {
  $email = $_POST["loginEmail"];
  $password = $_POST["loginPassword"];


  $result = $account->login($email, $password);

  var_dump($result);

  if($result) {
    $_SESSION['userLoggedIn'] = $email;
    header("Location: index.php");
    return;
  }
}
?>