<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/add-product.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>


<body>
  <?php
  include_once 'components/navbar.php';
  require_once 'includes/dbh.inc.php';

  if (isset($_SESSION["role"]) && $_SESSION["role"] !== "admin") {
    header("location: ./index.php");
    exit();
  }
  $sizes = [];

  $allSizes = range(7, 13, 0.5);

  foreach ($allSizes as $size) {
    $sizes[] = ['size' => $size, 'quantity' => 0];
  }
  ?>

  <section class='add-product-wrapper'>
    <h1 class='add-product-title'>Add Product</h1>
    <form class='add-product-form' action='includes/add-product.inc.php' method='POST'>
      <div class="image-preview">
        <img id="image_preview" src="https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg" alt="Product Image">
      </div>

      <div class="product-detail-wrapper">
        <div class="add-product-form-input-group">
          <div class="add-product-form-input-wrapper name-input-wrapper">
            <label for='name'>Product Name:</label>
            <input type='text' name='name' placeholder='Product Name' required>
          </div>
          <div class="add-product-form-input-wrapper price-input-wrapper">
            <label for='price'>Product Price:</label>
            <input type='text' name='price' placeholder='Product Price' required>
          </div>
        </div>


        <div class="add-product-form-input-wrapper">
          <label for='description'>Product Description:</label>
          <textarea name='description' placeholder='Product Description'></textarea>
        </div>
        <div class="add-product-form-input-group">
          <div class="add-product-form-input-wrapper brand-input-wrapper">
            <label for='brand'>Product Brand:</label>
            <input type='text' name='brand' placeholder='Product Brand' required>
          </div>
          <div class="add-product-form-input-wrapper category-input-wrapper">
            <label for='category'>Product category:</label>
            <input type='text' name='category' placeholder='Product Brand' required>
          </div>
        </div>


        <div class="add-product-form-input-wrapper image-source-input-wrapper">
          <label for='image_src'>Image Source:</label>
          <input id="image-src-input" type='text' name='image_src' placeholder='Image Source' required>
        </div>
      </div>

      <div class="add-product-quantity-wrapper">
        <h2>Size and Quantity</h2>
        <div class="size-wrapper">
          <?php
          foreach ($sizes as $sizeData) {
            $size = $sizeData['size'];
            $quantity = $sizeData['quantity'];
            echo "
              <div class='add-size-quantity-wrapper'>
                <label for='quantity_{$size}'>UK {$size}</label>
                <input type='number' name='sizeQuantity[$size]' value='{$quantity}' placeholder='Quantity' min='0'>
              </div>
            ";
          }
          ?>
        </div>

      </div>

      <div class="action-wrapper">
        <button class='global-button' type='submit'>Add product</button>
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
</script>