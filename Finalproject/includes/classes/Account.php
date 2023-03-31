<?php
class Account {

  private $conn;
  private $error_array;

public function __construct($conn) {
  $this->error_array = array();
  $this->conn = $conn;
  }

public function login ($email, $password) {
    $password = md5($password);
    $query = mysqli_query($this->conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($query) == 1) {
      return true;
    } else {
      array_push($this->error_array, Constants::$loginFailed);
      return false;
    }
}


public function register($name, $email,  $registerPassword, $confirmRegisterPassword) {

 $this->validateName($name);
 
 $this->validateEmails($email);
 $this->validatePasswords($registerPassword, $confirmRegisterPassword);

 if(empty($this->error_array)) {
  return $this->insertUserDetials( $email, $name, $registerPassword);
 } else {
  return false;
 }
}

public function getError ($error) {
  if(!in_array($error, $this->error_array)) {
    $error = "";
  }
  return "<span class='error_message'>{$error}</span>";
}

private function insertUserDetials($name, $email, $registerPassword) {
  $encryptedPW = md5($registerPassword);
  $date = date("Y-m-d"); 

  $result = mysqli_query($this->conn, "INSERT INTO users VALUES('', '$name', '$email', '$encryptedPW', '$date')");

  return $result;
}


private function validateName($name) {
  if(strlen($name) > 100 || strlen($name) < 2) {
    array_push($this->error_array, Constants::$nameLength);
    return;
  }
}

private function validateEmails($email) {


    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->error_array, Constants::$emailIsInvalid);
      return;
    }

    $checkEmailQuery = mysqli_query($this->conn, "SELECT email FROM users WHERE email='$email'");
if(mysqli_num_rows($checkEmailQuery) != 0) {
    array_push($this->error_array, Constants::$emailTaken);
    return;
}

}

private function validatePasswords($password, $confirmpassword) {
  
  if($password != $confirmpassword) {
      array_push($this->error_array, Constants::$passwordsDoNotMatch);
      return;
  }

  if(preg_match("/[^A-Za-z0-9]/", $password)) {
    array_push($this->error_array, Constants::$passwordsCanOnlyContain);
    return;
  }

  if(strlen($password) > 30 || strlen($password) < 5) {
    array_push($this->error_array, Constants::$passwordLength);
    return;
  }
}


}
?>