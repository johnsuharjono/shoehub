<?php

function fetch_details($conn, $id)
{
  $sql_query = "SELECT name, price, description, brand, category, image_src FROM product WHERE id = {$id}";

  $result = mysqli_query($conn, $sql_query);
  return mysqli_fetch_assoc($result);
}

function fetch_sizes($conn, $product_id)
{
  $sql_query = "SELECT size, quantity FROM product_size WHERE product_id = {$product_id} ORDER BY size";

  return mysqli_query($conn, $sql_query);
}

function add_to_cart($conn, $product_id, $name, $price, $size, $quantity, $image)
{
  include_once './functions.inc.php';
  foreach ($_SESSION['cartItems'] as $idx => $item) {
    if ($item['product_id'] == $product_id && $item['size'] == $size) {
      if (fetch_quantity($conn, $product_id, $size) < $quantity + $item['quantity']) {
        return false;
      }
      $_SESSION['cartItems'][$idx]['quantity'] += $quantity;
      return true;
    }
  }

  $product = array("product_id" => $product_id, "name" => $name, "size" => $size, "unit_price" => $price, "quantity" => $quantity, "image_src" => $image);
  array_push($_SESSION["cartItems"], $product);
  return true;
}
