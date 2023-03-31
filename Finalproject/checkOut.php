<?php 


include("includes/includeFiles.php");
if (!$_SESSION["userLoggedIn"]) {
  echo "<script>changePage('/')</script>";
}

$account = new User($conn, $_SESSION["userLoggedIn"]);

  $total = 0;
  $items = $account->getBagItems();
        foreach ($items as $item) {
           $product = new Item($conn, $item[1]);
            $total = $total + $product->getPrice();
        }

?>

<div id="content">
  <div class="twoFoldPage">
  <div class="cartItemsContainer">
    <?php $items = $account->getBagItems();
          $index = 0;
        foreach ($items as $item):?>

           <?php
           $product = new Item($conn, $item[1]);?>
           <div class="checkoutItemCard" id="<?php echo $item[4]; ?>">
            <img src=<?php echo $product->getImgs();?> alt="">
            <div class="pdInfo">
            <h3><?php echo $product->getName(); ?></h3>
            <p><?php echo $product->getDis(); ?></p>
            </div>
            <div class="productInfoContainer">
              <span class="price"><?php echo $product->getPrice() ?></span>
              <div class="colorObject" style="background-color: <?php echo $item[2] ?>"></div>
              <span><?php echo $item[3] ?></span>
              <span class="removeSpan red" onclick="removeFromBag('<?php echo $item[4]; ?>', '<?php echo $product->getPrice(); ?>')">Remove</span>
            </div>
           </div>
           <?php $index++; ?>
        <?php endforeach;?>
  </div>
  <div class="orderFinInfo">
    <h2>Total: <span id="total"><?php echo $total;?></span></h2>
    <hr>
  </div>
  </div>
  <div class="checkoutBar">

    <button class="btn" onclick='placeOrder("<?php echo $account->getName(); ?>" , <?php  echo json_encode($items)?>, <?php echo $account->getId(); ?>)'>Order</button>
  </div>
</div>