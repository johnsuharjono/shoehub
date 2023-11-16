<?php

function fetch_orders($conn, $date) {
  $query = "SELECT id, user_id FROM `order` WHERE DATE(date) = STR_TO_DATE('$date', '%m/%d/%Y');";
  $result = mysqli_query($conn, $query);
   
  $orders = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $new_order = array(
      "order_id"=>$row['id'],
      "user_id"=>$row['user_id']
    );
    array_push($orders, $new_order);
  }

  mysqli_free_result($result);
  return $orders;
}

function fetch_buyer($conn, $user_id) {
  $query = "SELECT name, address FROM user WHERE id = $user_id;";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $buyer = array(
    "name"=>$row['name'],
    "address"=>$row['address']
  );
  mysqli_free_result($result);
  return $buyer;
}

function fetch_order_items($conn, $order_id) {
  $query = "SELECT product_id, product_size_id, quantity FROM order_item WHERE order_id = $order_id";
  $result = mysqli_query($conn, $query);

  $order_items = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $product_name_query = "SELECT name, price FROM product WHERE id = {$row['product_id']};";
    $inner_result = mysqli_query($conn, $product_name_query);
    $inner_row = mysqli_fetch_assoc($inner_result);
    $product_name = $inner_row['name'];
    $product_price = $inner_row['price'];

    $product_size_query = "SELECT size FROM product_size WHERE id = {$row['product_size_id']};";
    $inner_result = mysqli_query($conn, $product_size_query);
    $product_size = mysqli_fetch_assoc($inner_result)['size'];

    $new_item = array(
      "product_name"=>$product_name,
      "product_size"=>$product_size,
      "product_price"=>$product_price,
      "quantity"=>$row['quantity']
    );
    array_push($order_items, $new_item);
  }

  return $order_items;
}