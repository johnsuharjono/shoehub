<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_id = $_POST['product_id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $brand = $_POST['brand'];
  $image_src = $_POST['image_src'];
  $size_quantity = $_POST['sizeQuantity'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';


  edit_product_details($conn, $product_id, $name, $description, $price, $category, $brand, $image_src);
  edit_product_size_quantity($conn, $product_id, $size_quantity);
  header("location: ../manage-product.php");
  exit();
}
