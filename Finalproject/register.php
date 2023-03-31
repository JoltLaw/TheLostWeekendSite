<?php 
include("config/db.php");
include("includes/classes/Constants.php");
include("includes/classes/Account.php");
$account = new Account($conn);
include("includes/handlers/registerHandler.php");
include("includes/handlers/loginHandler.php");
function getInputValue($name) {
  if(isset($_POST["$name"])) {
    echo $_POST["$name"];
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/styles/style.css">
  <title>Login or Signup</title>
</head>
<body>
<div class="formsContainer">
 
 <form action="register.php" method="post" id="loginForm">

   <div class="inputContainer">
   <span><?php echo $account->getError(Constants::$loginFailed) ?></span>
   <label for="loginEmail">Email</label>
   <input value="<?php getInputValue('loginEmail')?>" type="email" name="loginEmail" id="loginEmail" placeholder="Email...">
   </div>

 <div class="inputContainer">
   <label for="loginPassword">Password</label>
   <input type="Password" name="loginPassword" id="loginPassword">
 </div>
 
     <button id class="btn" type="submit" name="loginBtn">Login</button>
     <span class="formSwitchLink" role="link" id="registerFormBtn">Sign up</span>
 </form>
 


 <form action="register.php" method="post" id="registerForm" >
   <div class="inputContainer">
   <label for="registerEmail">Email</label>
   <input type="email" value="<?php getInputValue('registerEmail')?>" name="registerEmail" id="registerEmail" placeholder="Email..." required="true">
   <span><?php echo $account->getError(Constants::$emailIsInvalid) ?></span>
   <span><?php echo $account->getError(Constants::$emailTaken) ?></span>
   </div>

   <div class="inputContainer">
   <label for="name">Name</label>
   <input type="text" value="<?php getInputValue('name')?>" name="name" id="name" placeholder="Name..." required="true">
   <span><?php echo $account->getError(Constants::$nameLength) ?></span>
   </div>

   <div class="inputContainer">
   <label for="password1">Password</label>
   <input type="password"  name="password1" id="password1" required="true">
   <span><?php echo $account->getError(Constants::$passwordsCanOnlyContain) ?></span>
   <span><?php echo $account->getError(Constants::$passwordLength) ?></span>
   </div>

   <div class="inputContainer">
     <label for="password2" >Confirm Password</label>
       <input type="password"  name="password2" id="password2" required="true">
         <span><?php echo $account->getError(Constants::$passwordsDoNotMatch) ?></span>
   </div>

   <button type="submit" class="btn"  id="registerBtn" value="registerBtn">Register</button>
   <span class="formSwitchLink" role="link" name="loginFormBtn" id="loginFormBtn">Login</span>
   </form>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 <script src="assets/js/register.js"></script>


 <?php if(isset($_POST["registerBtn"])) {
     echo '<script>$(document).ready(function() { 
       $("#registerForm").show();
       $("#loginForm").hide();
       })
       </script>';
 }
  else {
     echo '<script>$(document).ready(function() { 
       $("#registerForm").hide();
       $("#loginForm").show();
     })
     </script>';
 }; ?>
</body>
</html>


  