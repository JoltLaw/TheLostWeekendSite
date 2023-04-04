<?php 

class User {

  private $conn; 

  private $email;

  public function __construct($conn, $email) {
    $this->conn = $conn;
    $this->email = $email;
    }

  public function getEmail () {
    return $this->email;
  }

  public function getName () {
    $query = mysqli_query($this->conn, "SELECT name FROM users WHERE email='$this->email'");
    $row = mysqli_fetch_array($query);
    return $row["name"];
  }

  public function getId () {
    $query = mysqli_query($this->conn, "SELECT id FROM users WHERE email='$this->email'");
    $row = mysqli_fetch_array($query);
    return $row["id"];
  }

  public function getBagItemNumber() {
    $id = $this->getId();
    $query = mysqli_query($this->conn, "SELECT * FROM bagitems WHERE userId='$id'");
    $result = mysqli_num_rows($query);
    return $result;
  }

  public function getBagItems() {
    $id = $this->getId();
    $query = mysqli_query($this->conn, "SELECT * FROM bagitems WHERE userId='$id'");
    $result =  mysqli_fetch_all($query);
    return $result;
  }
  
}
?>