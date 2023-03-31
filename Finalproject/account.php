<?php
include("includes/includeFiles.php");
// include("includes/classes/User.php");


if (!$_SESSION["userLoggedIn"]) {
  echo "<script>changePage('/')</script>";
} else {
  $account = new User($conn, $_SESSION["userLoggedIn"]);
}
?>

<div id="mainContent">

<div class="content">

<div class="acountData">

  <h1><?php echo $account->getName(); ?></h1>


  <div class="optionsMenu">

<span id="accountInfoSpan">Acount Information</span>
<div class="accountInfo">

  <div>
    <label for="changeEmail">Change email</label>
    <input type="text" name="changeEmail" class="changeEmail" value="<?php echo $account->getEmail(); ?>">
    <span class="message"></span>
    <button class="btn" onclick="changeEmail('changeEmail', '<?php echo $account->getId(); ?>')" >Change</button>
  </div>

  <div>
      <label for="changeName">Change name</label>
      <input type="text" class="changeName" name="changeName" value="<?php echo $account->getName(); ?>">
      <span class="message"></span>
      <button class="btn" onclick="updateName('changeName', '<?php echo $account->getEmail(); ?>')">Save</button>
    </div>

  <div>
      <label for="currentPW">Current password</label>
      <input type="password" name="currentPW" class="currentPW">
      <label for="NewPW1">New password</label>
      <input type="password" name="NewPW1" class="NewPW1">
      <label for="NewPW2">Confirm new password</label>
      <input type="password" name="NewPW2" class="NewPW2">
      <span class="message"></span>
      <button class="btn" onclick="changePassword('currentPW', 'NewPW1', 'NewPW2', '<?php echo $account->getEmail(); ?>') ">Change</button>
  </div>
  </div>

  </div>

  
  <button class="btn" onclick="logout()">Logout</button>
  <button class="btn" onclick="deleteAccount('<?php echo $account->getId(); ?>')">Delete Account</button>
  
  <?php echo "<script>
    $('.accountInfo').hide();
  
  </script>" ?>
</div>
</div>
</div>
</div>