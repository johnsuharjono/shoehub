<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/product-details.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  ?>

  <?php
    include_once 'includes/product-details.inc.php';
    include_once 'includes/functions.inc.php';
    require_once 'includes/dbh.inc.php';

    $product_id = $_GET['id'];
    $row = fetch_details($conn, $product_id);
    $name = ucwords($row['name']);
    $price = $row['price'];
    $desc = $row['description'];
    $brand = ucwords($row['brand']);
    $image_src = $row['image_src'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $quantity = $_POST['quantity'];
      $size = $_POST['shoe-size'];

      if (!isset($_SESSION["userId"])) {
        header("location: ./product-details.php?id={$product_id}&error=not-signed-in");
        exit();
      }
      
      if (!isset($_POST['shoe-size'])) {
        header("location: ./product-details.php?id={$product_id}&error=size-not-selected");
        exit();
      }

      $quantity_in_stock = fetch_quantity($conn, $product_id, $size);
      if ($quantity > $quantity_in_stock) {
        header("location: ./product-details.php?id={$product_id}&error=max-quantity-reached-$quantity_in_stock");
        exit();
      }

      if (!add_to_cart($conn, $product_id, $name, $price, $size, $quantity, $image_src)) {
        header("location: ./product-details.php?id={$product_id}&error=max-quantity-reached-$quantity_in_stock");
      } else {
        header("location: ./product-details.php?id={$product_id}&error=none");  
      }
    }

    echo 
    "
      <section class='product-detail-wrapper'>
        <div class='product-detail-image-wrapper'>
          <img src='{$image_src}'>
        </div>

        <form class='product-detail-info-wrapper' action='product-details.php?id={$product_id}' method='POST'>
          <h1 class='product-detail-name'>{$brand} - {$name}</h1>
          <p class='product-detail-price'>S$ {$price}</p>
          <p class='product-detail-description'>{$desc}</p>

          <div class='product-detail-size-picker'>
            <label for='shoe-size'>Select Shoe Size:</label>
            <div class='product-detail-size-pill'>
    ";

    $result = fetch_sizes($conn, $product_id);
    while ($row = mysqli_fetch_assoc($result)) {
      $size = format_shoe_size($row['size']);
      $is_disabled = $row['quantity'] > 0 ? '' : 'disabled';
      $style = $row['quantity'] > 0 ? '' : 'background-color:#DDD;';

      echo 
      "
        <input type='radio' id='size-$size' name='shoe-size' value='$size' $is_disabled>
        <label for='size-$size' style='$style'>$size</label>
      ";
    }
    echo
    "
          </div>
        </div>

        <div class='product-detail-action-wrapper'>
          <div class='product-quantity'>
            <label for='quantity' style='display:none;'>Quantity:</label>
            <div class='quantity-input'>
              <button type='button' class='quantity-btn minus' onclick='decrementQuantity()'>-</button>
              <input type='number' id='quantity' name='quantity' value='1' min='1'>
              <button type='button' class='quantity-btn plus' onclick='incrementQuantity()'>+</button>
            </div>
          </div>

          <button class='global-button' type='submit'>
            Add to Cart
          </button>
        </div>
      ";

    if (isset($_GET["error"])) {
      if ($_GET["error"] === "size-not-selected") {
        echo "<p class='auth-form-error-message'>No size selected! Please select a size.</p>";
      } else if (substr($_GET["error"], 0, 21) === "max-quantity-reached-") {
        $quantity_in_stock = substr($_GET["error"], 21);
        echo "<p class='auth-form-error-message'>Quantity not available! Quantity in stock for selected size: $quantity_in_stock.</p>";
      } else if ($_GET["error"] === "not-signed-in") {
        echo "<p class='auth-form-error-message'>Please log in first to add items to cart!</p>";
      } else if ($_GET["error"] === "none") {
        echo "<p class='auth-form-success-message'>Item successfully added to cart.</p>";
      }
    }

    echo
    "
        </form>
      </section>
    ";
  ?>

  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>

<script>
  // Get the quantity input element
  const quantityInput = document.getElementById("quantity");

  // Function to increment the quantity
  function incrementQuantity() {
    quantityInput.value = parseInt(quantityInput.value) + 1;
  }

  // Function to decrement the quantity
  function decrementQuantity() {
    if (quantityInput.value > 1) {
      quantityInput.value = parseInt(quantityInput.value) - 1;
    }
  }
</script>