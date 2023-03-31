<?php 
// This page is for displaying a catalog of content that falls under a catagory.


include("includes/includeFiles.php"); 

if (!isset($_GET["catagory"])) {
  $pageTitle = "No catagory entered";
  echo "<script>changePage('homePage.php')</script>";
  exit();
}


$catagory = $_GET["catagory"];
$results;

if ($catagory == "New") {
  $query = mysqli_query($conn, "SELECT id FROM products ORDER BY id DESC LIMIT 12");
} else {
  $query = mysqli_query($conn, "SELECT id FROM products WHERE catagories='$catagory'");
}

 $pageTitle = $_GET["catagory"];

 $results = mysqli_fetch_all($query);
?>



<div class="content">
  <div class="centerWraper">
    <div class="openingImg">
      <h1><?php echo $pageTitle; ?></h1>
    </div>

    <div class="itemCatalog">


    <?php 
    $i = 0;
    
    while($i < sizeof($results)):
   ?>
        <?php 
          $item = new Item($conn, $results[$i][0]);
        ?>
       <div class="catagoryItem" onclick="changePage('productPage.php?id=<?php echo $item->getId(); ?>')">
        <div class="catagoryItemImgContainer">
        <img src=<?php echo $item->getImgs(); ?> alt="">
        </div>
        <h3 class="itemName"><?php echo $item->getName(); ?></h3>
        <span class="price">$<?php echo $item->getPrice(); ?></span>
        <div class="colors"><?php 
        
        $colors = ($item->getColors());

        foreach ($colors as $color) {
          echo "<div class='colorObject' style='background-color: " . $color . "'></div>";
        }
        
        ?>
      </div>
        <p class="dis"><?php echo $item->getDis(); ?></p>
       </div>  

      <?php $i = $i + 1; ?>
    <?php endwhile; ?>

    </div>
  </div>
</div>