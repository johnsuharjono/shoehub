<?php

function fetch_newest($conn) {
  $query = "SELECT id, name, price, image_src FROM product ORDER BY date_added DESC LIMIT 3;";

  $result = mysqli_query($conn, $query);

  $rows = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $new = array("product_id"=>$row["id"], "name"=>$row["name"], "unit_price"=>$row["price"], "image_src"=>$row["image_src"]);
    array_push($rows, $new);
  }
  mysqli_free_result($result);
  return $rows;
}

// Most total sales regardless size - 3
function fetch_trending($conn) {
  $query = "SELECT product_id FROM order_item GROUP BY product_id ORDER BY SUM(quantity) DESC LIMIT 3;";

  $result = mysqli_query($conn, $query);
  $products = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $product_query = "SELECT id, name, price, brand, image_src FROM product WHERE id = {$row['product_id']}";
    $product_result = mysqli_query($conn, $product_query);
    $product = mysqli_fetch_assoc($product_result);
    $new = array(
      "product_id"=>$product['id'],
      "name"=>$product['name'],
      "unit_price"=>$product['price'],
      "brand"=>$product['brand'],
      "image_src"=>$product['image_src']
    );
    array_push($products, $new);
    mysqli_free_result($product_result);
  }
  mysqli_free_result($result);
  return $products;
}
