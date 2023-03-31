<?php 

class Item {

  private $conn;

  private $id;

  private $name;

  private $price;

  private $colors;

  private $dis;

  private $images;

  private $materials;

  private $sizes;

  private $desingedBy;

  private $catagories;

  public function __construct($conn, $id) {
    $this->conn = $conn;
    $this->id = $id;

    $query = mysqli_query($this->conn, "SELECT * FROM products WHERE id='$this->id'");
    $item = mysqli_fetch_array($query);

    $this->name = $item["name"];
    $this->price = $item["price"];
    $this->colors = json_decode($item["colors"]);
    $this->dis = $item["dis"];
    $this->images = $item["images"];
    $this->materials = $item["materials"];
    $this->sizes = $item["sizes"];
    $this->desingedBy = $item["designedBy"];
    $this->catagories = $item["catagories"];
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getPrice() {
    return $this->price;
  }

  public function getColors() {
    return $this->colors;
  }

  public function getDis () {
    return $this->dis;
  }

  public function getImgs () {
    return $this->images;
  }

  public function getMaterials() {
    return $this->materials;
  }

  public function getSizes() {
   $rawSizes = $this->sizes;
   $sizes = json_decode($rawSizes);
    return $sizes;
  }

  public function getDesigner() {
    return $this->desingedBy;
  }

  public function getCatagories () {
    return $this->catagories;
  }



}


?>