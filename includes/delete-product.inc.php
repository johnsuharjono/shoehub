<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  header("location: ../manage-product.php");
  $product_id = $_POST['product_id'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  delete_product($conn, $product_id);
}
