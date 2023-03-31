<?php
// include("includes/includeFiles.php");
include("includes/classes/Constants.php");
include("includes/classes/Account.php");

var_dump($_POST);
function getInputValue($name) {
  if(isset($_POST["$name"])) {
    echo $_POST["$name"];
  }
} 
?>

<div class="formsContainer">
 
 <form action="test.php" method="post" id="loginForm">

   <div class="inputContainer">
   <label for="loginEmail">Email</label>
   <input value="<?php getInputValue('loginEmail')?>" type="email" name="loginEmail" id="loginEmail" placeholder="Email...">
   </div>

 <div class="inputContainer">
   <label for="loginPassword">Password</label>
   <input type="Password" name="loginPassword" id="loginPassword">
 </div>
 
     <button class="btn" type="submit" name="loginBtn">Login</button>
     <span class="formSwitchLink" role="link" id="registerFormBtn">Sign up</span>
 </form>
 


 <form action="test.php" method="post" id="registerForm" >
   <div class="inputContainer">
   <label for="registerEmail">Email</label>
   <input type="email" value="<?php getInputValue('registerEmail')?>" name="registerEmail" id="registerEmail" placeholder="Email..." required="true">
   </div>

   <div class="inputContainer">
   <label for="name">Name</label>
   <input type="text" value="<?php getInputValue('name')?>" name="name" id="name" placeholder="Name..." required="true">
   </div>

   <div class="inputContainer">
   <label for="password1">Password</label>
   <input type="password"  name="password1" id="password1" required="true">
   </div>

   <div class="inputContainer">
     <label for="password2" >Confirm Password</label>
       <input type="password"  name="password2" id="password2" required="true">
   </div>

   <button type="submit" class="btn"  id="registerBtn" value="registerBtn">Register</button>
   <span class="formSwitchLink" role="link" name="loginFormBtn">Login</span>
   </form>


</div>