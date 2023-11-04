<?php

function fetch_details($conn, $id) {
  $sql_query = "SELECT name, price, description, brand, image_src FROM product WHERE id = {$id}";

  $result = mysqli_query($conn, $sql_query);
  return mysqli_fetch_assoc($result);
}

function fetch_sizes($conn, $product_id) {
  $sql_query = "SELECT size, quantity FROM product_size WHERE product_id = {$product_id} ORDER BY size";

  return mysqli_query($conn, $sql_query);
}

function fetch_quantity($conn, $product_id, $size) {
  $sql_query = "SELECT quantity FROM product_size WHERE product_id = $product_id AND size = $size";

  $result = mysqli_query($conn, $sql_query);
  if (mysqli_num_rows($result) == 0) {
    return 0;
  } else {
    return mysqli_fetch_assoc($result)['quantity'];
  }
}

class CartProduct {
  public $product_id;
  public $name;
  public $size;
  public $unit_price;
  public $quantity;
  public $image_src;

  public function __construct($product_id, $name, $size, $unit_price, $quantity, $image) {
      $this->product_id = $product_id;
      $this->name = $name;
      $this->size = $size;
      $this->unit_price = $unit_price;
      $this->quantity = $quantity;
      $this->image_src = $image;
  }
}

function add_to_cart($product_id, $name, $price, $size, $quantity, $image) {
  $product = new CartProduct($product_id, $name, $size, $price, $quantity, $image);
  array_push($_SESSION["cartItems"], $product);
}
