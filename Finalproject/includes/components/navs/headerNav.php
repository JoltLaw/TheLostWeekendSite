
<?php 


if(isset($_SESSION["userLoggedIn"])) {
  $account = new User($conn, $_SESSION["userLoggedIn"]);

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/images/SiteLogo.png" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="../../../assets/js/index.js"></script>
  <link rel="stylesheet" href="assets/styles/style.css">
  <title>Home</title>
</head>
<body>
<header>
    <nav class="headerNav"> 
      <div class="siteName">
      <span role="link" tabindex="0" onclick="changePage('/homePage.php')">The Lost Weekend</span>
      </div>
      <div class="pageLinks">
        <span class="headerNavOption" role="link" tabindex="0" onclick="changePage('/catagory.php?catagory=Street')">Street</span> 
        <span class="headerNavOption" role="link" tabindex="0" onclick="changePage('/catagory.php?catagory=Athletic')">Athletic</span> 
        <span class="headerNavOption" role="link" tabindex="0" onclick="changePage('/catagory.php?catagory=Essentials')">Essentials</span> 
      </div> 
      <div class="userLinks">
        <?php if(isset($_SESSION["userLoggedIn"])): ?>
        
          <span><a href='account.php' ><?php echo $account->getName()?></a></span>
          <span><a href='checkOut.php'>Bag: <span id="bagCount"><?php echo$account->getBagItemNumber()?><span></a></span>

        <?php else: ?>
          <span><a href='register.php'>Login/Signup</a></span>
       <?php endif; ?>
      </div>
    </nav>
  </header>
  <div id="modal">
  </div>
  <div id='mainContent'>
