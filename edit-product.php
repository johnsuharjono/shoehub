<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/edit-product.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  include_once 'includes/product-details.inc.php';
  include_once 'includes/functions.inc.php';
  require_once 'includes/dbh.inc.php';

  if (isset($_SESSION["role"]) && $_SESSION["role"] !== "admin") {
    header("location: ./index.php");
    exit();
  }

  $product_id = $_GET['id'];
  $row = fetch_details($conn, $product_id);
  $name = ucwords($row['name']);
  $price = $row['price'];
  $desc = $row['description'];
  $brand = ucwords($row['brand']);
  $category = ucwords($row['category']);
  $image_src = $row['image_src'];

  $result = fetch_sizes($conn, $product_id);
  $sizes = [];

  $allSizes = range(7, 13, 0.5);

  foreach ($allSizes as $size) {
    $sizes[] = ['size' => $size, 'quantity' => 0];
  }

  while ($row = mysqli_fetch_assoc($result)) {
    $size = $row['size'];
    $quantity = $row['quantity'];

    // Find and update the quantity in the $sizes array
    foreach ($sizes as &$sizeInfo) {
      if ($size == $sizeInfo['size']) {
        $sizeInfo['quantity'] = $quantity;
        break;
      }
    }
  }
  ?>

  <section class='edit-product-detail-wrapper'>
    <h1 class='edit-product-detail-title'><?php echo $brand; ?> - <?php echo $name; ?></h1>
    <form class='edit-product-detail-form' action='includes/edit-product.inc.php' method='post'>
      <div class="image-preview">
        <img id="image_preview" src="<?php echo $image_src; ?>" alt="Product Image">
      </div>

      <!-- Hidden input for product id -->
      <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

      <div class="product-detail-wrapper">
        <div class="edit-product-form-input-group">
          <div class="edit-product-form-input-wrapper name-input-wrapper">
            <label for='name'>Product Name:</label>
            <input type='text' name='name' value='<?php echo $name; ?>' placeholder='Product Name'>
          </div>
          <div class="edit-product-form-input-wrapper price-input-wrapper">
            <label for='price'>Product Price:</label>
            <input type='text' name='price' value='<?php echo $price; ?>' placeholder='Product Price'>
          </div>
        </div>


        <div class="edit-product-form-input-wrapper">
          <label for='description'>Product Description:</label>
          <textarea name='description' placeholder='Product Description'><?php echo $desc; ?></textarea>
        </div>
        <div class="edit-product-form-input-group">
          <div class="edit-product-form-input-wrapper brand-input-wrapper">
            <label for='brand'>Product Brand:</label>
            <input type='text' name='brand' value='<?php echo $brand; ?>' placeholder='Product Brand'>
          </div>
          <div class="edit-product-form-input-wrapper category-input-wrapper">
            <label for='category'>Product category:</label>
            <input type='text' name='category' value='<?php echo $category; ?>' placeholder='Product Brand'>
          </div>
        </div>


        <div class="edit-product-form-input-wrapper image-source-input-wrapper">
          <label for='image_src'>Image Source:</label>
          <input id="image-src-input" type='text' name='image_src' value='<?php echo $image_src; ?>' placeholder='Image Source'>
        </div>
      </div>

      <div class="edit-product-quantity-wrapper">
        <h2>Size and Quantity</h2>
        <div class="size-wrapper">
          <?php
          foreach ($sizes as $sizeData) {
            $size = $sizeData['size'];
            $quantity = $sizeData['quantity'];
            echo "
              <div class='edit-size-quantity-wrapper'>
                <label for='quantity_{$size}'>UK {$size}</label>
                <input type='number' name='sizeQuantity[$size]' value='{$quantity}' placeholder='Quantity' min='0'>
              </div>
            ";
          }
          ?>
        </div>
      </div>

      <div class="action-wrapper">
        <button class='global-button' type='submit'>Save Changes</button>
        <button class='global-button delete-button' type='button' name='delete' id='delete-button'>Delete Product</button>
      </div>
    </form>
  </section>

  <?php
  include_once 'components/footer.php';
  ?>
</body>

</html>

<script>
  document.getElementById("image-src-input").addEventListener("input", function() {
    const imageSrcInput = this.value;
    const imagePreview = document.getElementById("image_preview");
    imagePreview.src = imageSrcInput;
  });

  const deleteButton = document.getElementById("delete-button");

  deleteButton.addEventListener("click", function() {
    // Ask for confirmation before deleting
    const confirmed = confirm("Are you sure you want to delete this item?");

    if (confirmed) {
      // If user confirms, set the form action to the delete script
      document.querySelector('form').action = 'includes/delete-product.inc.php';
      // Submit the form
      document.querySelector('form').submit();
    }
  });
</script>