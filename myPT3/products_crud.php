<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
        $stmt = $conn->prepare("INSERT INTO tbl_products_a170997_pt3(fld_product_num,
        fld_product_name, fld_product_price, fld_product_type, fld_product_developer,
        fld_product_size, fld_product_date, fld_product_quantity) VALUES(:pid, :name, :price, :type,
        :developer, :size, :ldate, :quantity)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':developer', $developer, PDO::PARAM_STR);
      $stmt->bindParam(':size', $size, PDO::PARAM_STR);
      $stmt->bindParam(':ldate', $date, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
       
      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $type =  $_POST['type'];
      $developer = $_POST['developer'];
      $size = $_POST['size'];
      $date = $_POST['ldate'];
      $quantity = $_POST['quantity'];

       
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
        $stmt = $conn->prepare("UPDATE tbl_products_a170997_pt3 SET fld_product_num = :pid,
        fld_product_name = :name, fld_product_price = :price, fld_product_type = :type, 
        fld_product_developer = :developer, fld_product_size = :size, fld_product_date = :ldate, fld_product_quantity = :quantity
        WHERE fld_product_num = :oldpid");


      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':developer', $developer, PDO::PARAM_STR);
      $stmt->bindParam(':size', $size, PDO::PARAM_STR);
      $stmt->bindParam(':ldate', $date, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $type =  $_POST['type'];
      $developer = $_POST['developer'];
      $size = $_POST['size'];
      $date = $_POST['ldate'];
      $quantity = $_POST['quantity'];
      $oldpid = $_POST['oldpid'];

     
      $stmt->execute();
    
    
    // header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a170997_pt3 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a170997_pt3
        WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>