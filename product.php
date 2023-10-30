<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/product.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  ?>

  <section class="product-detail-wrapper">
    <div class="product-detail-image-wrapper">
      <img src="https://source.unsplash.com/NOpsC3nWTzY">
    </div>

    <div class="product-detail-info-wrapper">
      <h1 class="product-detail-name">Nike Air Max 270 React</h1>
      <p class="product-detail-price">Rp 1.999.000</p>
      <p class="product-detail-description">Lorem ipsum do
        lor sit amet consectetur adipisicing
        elit. Quisquam, voluptatum
        voluptatibus. Quisquam, voluptatum
        voluptatibus.</p>


      <div class="product-detail-size-picker">
        <label for="shoe-size">Select Shoe Size:</label>
        <div class="product-detail-size-pill">
          <input type="radio" id="size-6" name="shoe-size" value="6">
          <label for="size-6">6</label>

          <input type="radio" id="size-7" name="shoe-size" value="7">
          <label for="size-7">7</label>

          <input type="radio" id="size-8" name="shoe-size" value="8">
          <label for="size-8">8</label>

          <input type="radio" id="size-9" name="shoe-size" value="9">
          <label for="size-9">9</label>

          <input type="radio" id="size-10" name="shoe-size" value="10">
          <label for="size-10">10</label>

          <input type="radio" id="size-11" name="shoe-size" value="11">
          <label for="size-11">11</label>

        </div>
      </div>

      <div class="product-detail-action-wrapper">
        <div class="product-quantity">
          <label for="quantity" style="display:none;">Quantity:</label>
          <div class="quantity-input">
            <button class="quantity-btn minus" onclick="decrementQuantity()">-</button>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
            <button class="quantity-btn plus" onclick="incrementQuantity()">+</button>
          </div>
        </div>
        <button class="global-button">Add to Cart</button>
      </div>

    </div>
  </section>

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