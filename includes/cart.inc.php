<?php

include_once '../components/navbar.php';
include_once './functions.inc.php';
require_once './dbh.inc.php';

if (isset($_GET['remove'])) {
  unset($_SESSION['cartItems'][$_GET['remove']]);
  header("location: ../cart.php");
  exit();
}

if (isset($_GET['add'])) {
  $product = $_SESSION['cartItems'][$_GET['add']];
  $quantity_in_stock = fetch_quantity($conn, $product['product_id'], $product['size']);

  if ($product['quantity'] < $quantity_in_stock) {
    $_SESSION['cartItems'][$_GET['add']]['quantity'] += 1;
    header("location: ../cart.php");
  } else {
    header("location: ../cart.php?error=max-quantity-reached&item={$_GET['add']}");
  }
  exit();
}

if (isset($_GET['subtract'])) {
  $product = $_SESSION['cartItems'][$_GET['subtract']];
  $quantity_in_stock = fetch_quantity($conn, $product['product_id'], $product['size']);

  if ($product['quantity'] > 1) {
    $_SESSION['cartItems'][$_GET['subtract']]['quantity'] -= 1;
  }

  if ($_SESSION['cartItems'][$_GET['subtract']]['quantity'] <= $quantity_in_stock) {
    header("location: ../cart.php");
  } else {
    header("location: ../cart.php?error=max-quantity-reached&item={$_GET['subtract']}");
  }
  exit();
}

if (isset($_GET['checkout'])) {
  foreach ($_SESSION['cartItems'] as $idx => $item) {
    if ($item['quantity'] > fetch_quantity($conn, $item['product_id'], $item['size'])) {
      header("location: ../cart.php?error=max-quantity-reached&item={$idx}");
      exit();
    }
  }

  $cart_items = $_SESSION['cartItems'];
  if (count($cart_items) < 1) {
    header("location: ../cart.php?error=empty-cart");
    exit();
  }

  successful_checkout($conn, $cart_items, $_SESSION['userId']);
  header("location: ../payment-successful.php");
}

function successful_checkout($conn, $cart_items, $user_id) {
  // DB orders logic
  $order_query = "INSERT INTO `order` (user_id, date) VALUES ($user_id, NOW());";
  mysqli_query($conn, $order_query);
  $order_id = mysqli_insert_id($conn);

  $order_item_query = "INSERT INTO order_item (order_id, product_id, product_size_id, quantity) VALUES ";

  $count = 0;
  foreach ($cart_items as $item) {
    $product_size_id = fetch_product_size_id($conn, $item['product_id'], $item['size']);

    $query = "($order_id, {$item['product_id']}, $product_size_id, {$item['quantity']})";
    $order_item_query = $order_item_query . $query;
    if ($count == count($cart_items) - 1) {
      $order_item_query = $order_item_query . ';';
    } else {
      $order_item_query = $order_item_query . ', ';
    }
    $count += 1;
  }

  mysqli_query($conn, $order_item_query);

  // DB products logic TODO
  

  // Email logic TODO


  // Clear cart
  $_SESSION["cartItems"] = array();
}

function fetch_product_size_id($conn, $product_id, $size) {
  $query = "SELECT id FROM product_size WHERE product_id = $product_id AND size = $size";
  $result = mysqli_query($conn, $query);
  return mysqli_fetch_assoc($result)['id'];
}
