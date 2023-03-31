<?php 
 include("includes/includeFiles.php"); 

 echo "<script>pdColor = undefined;</script>";


if (isset($_SESSION["userLoggedIn"])) {
  $account = new User($conn, $_SESSION["userLoggedIn"]);
}
 
 if(isset($_GET["id"])) {
   $product = new Item($conn, $_GET["id"]);
}
 ?>

 <div class="content">
  <div class="productCard">
    <div class="productImg">
      <img src=<?php echo $product->getImgs(); ?> alt="">
    </div>
    <div>
      <div class="productInfo">
        <h2><?php echo $product->getName(); ?></h2>
        <!-- Fix the price tag so that it shows -->
        <p class="price"><?php $product->getPrice(); ?></p>
        <h4>Designed By: <?php echo $product->getDesigner(); ?></h4>

        <p><?php echo $product->getDis(); ?></p>
        <div class="colorsNbtns">
        <div class="colors"><?php 
        
        $colors = ($product->getColors());

        foreach ($colors as $color) {
          
          echo "<div class='colorObject' style='background-color: " . $color . "'></div>";
        }
        
        ?>
        </div>
        <div class="btnsContainer">
          <?php if(isset($_SESSION["userLoggedIn"])): ?>
            <button class="btn" onclick="addToBag('<?php echo $_GET['id'] ?>', '<?php echo $account->getId() ?>')">Add to bag</button>
          <?php endif; ?>  
          <button class="btn" onclick="buyNow('<?php echo $_GET['id'] ?>');">Buy Now</button>
        </div>
        </div>
        <div class="sizes">
          <ul class="sizeList">
            <?php $sizes = $product->getSizes(); 
              foreach ($sizes as $size):?>
                <li><?php echo $size; ?></li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
 </div>
