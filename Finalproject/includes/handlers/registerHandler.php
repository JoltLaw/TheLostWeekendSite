<?php 


function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText);
  return $inputText;
}

function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}




if(isset($_POST["registerEmail"])) {
  var_dump($_POST);
  $name = sanitizeFormString($_POST["name"]);
  $email = sanitizeFormString($_POST["registerEmail"]);
  $registerPassword = sanitizeFormPassword($_POST["password1"]);
  $confirmRegisterPassword = sanitizeFormPassword($_POST["password2"]);


 $wasSuccessful = $account->register( $name, $email, $registerPassword, $confirmRegisterPassword);

  if($wasSuccessful) {
    $_SESSION['userLoggedIn'] = $email;
    header("Location: index.php" );
  }
}
?>