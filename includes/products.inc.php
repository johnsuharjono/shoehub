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

  return $result;
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