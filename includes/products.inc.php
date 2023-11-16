<?php

function fetch_products($conn, $min_price, $max_price, $selected_brands, $selected_categories, $searchbar_input) {
  $price_filter_query = "WHERE price BETWEEN {$min_price} AND {$max_price}";
  $brand_filter_query = "";
  $category_filter_query = "";
  $search_filter_query = "AND name LIKE '%{$searchbar_input}%'";

  if (!empty($selected_brands)) {
    $brands_with_comma = implode("', '", $selected_brands);
    $brand_filter_query = "AND brand IN ('{$brands_with_comma}')";
  }
  if (!empty($selected_categories)) {
    $categories_with_comma = implode("', '", $selected_categories);
    $category_filter_query = "AND category IN ('{$categories_with_comma}')";
  }

  $filter_query = "{$price_filter_query} {$brand_filter_query} {$category_filter_query} {$search_filter_query}";

  $sql = "SELECT id, name, price, image_src, brand, category FROM product {$filter_query} ORDER BY name;";

  $result = mysqli_query($conn, $sql);

  $products = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $new_product = array(
      "id"=>$row["id"],
      "name"=>$row["name"],
      "price"=>$row["price"],
      "image_src"=>$row["image_src"],
      "brand"=>$row["brand"],
      "category"=>$row["category"]
    );
    array_push($products, $new_product);
  }

  mysqli_free_result($result);
  return $products;
}

function fetch_all_brands($conn) {
  $sql = "SELECT DISTINCT brand FROM product ORDER BY brand;";
  $result = mysqli_query($conn, $sql);
  
  return $result;
}

function fetch_all_categories($conn) {
  $sql = "SELECT DISTINCT category FROM product ORDER BY category;";
  $result = mysqli_query($conn, $sql);
  
  return $result;
}

function split_into_pages($array, $max_count) {
  $result = array();
  $current_subarray = array();

  foreach ($array as $item) {
    array_push($current_subarray, $item);

    if (count($current_subarray) === $max_count) {
      array_push($result, $current_subarray);
      $current_subarray = array();
    }
  }

  if (!empty($current_subarray)) {
    array_push($result, $current_subarray);
  }

  return $result;
}
