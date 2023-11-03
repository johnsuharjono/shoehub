<?php

function fetch_details($conn, $id) {
  $sql_query = "SELECT name, price, description, brand, image_src FROM product WHERE id = {$id}";

  $result = mysqli_query($conn, $sql_query);
  return mysqli_fetch_assoc($result);
}
