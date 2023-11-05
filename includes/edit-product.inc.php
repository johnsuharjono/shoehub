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

  echo "Product ID: $product_id <br>";
  echo "Name: $name <br>";
  echo "Price: $price <br>";
  echo "Category: $category <br>";
  echo "Description: $description <br>";
  echo "Brand: $brand <br>";
  echo "Image Source: $image_src <br>";
  echo "Size Quantity: <br>";
  echo var_dump($size_quantity);

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  $sql_query = "UPDATE product SET name = '$name', description = '$description', price = $price, category = '$category', brand = '$brand', image_src = '$image_src' WHERE id = $product_id";
  echo $sql_query;
  $status = edit_product_details($conn, $product_id, $name, $description, $price, $category, $brand, $image_src);
  echo "Status: $status";
  edit_product_size_quantity($conn, $product_id, $size_quantity);
  header("location: ../manage-product.php");
  exit();
}
