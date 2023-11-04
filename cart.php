<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/cart.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="js/quantity-counter.js" defer></script>
  <script src="js/checkout-logic.js" defer></script>
</head>

<body>
  <?php
  include_once 'components/navbar.php';  
  ?>

  <div class="cart-wrapper">
    <div class="cart">
      <h2 class="my-cart-text">My Cart</h2>
      <hr />

      <?php
        class CartProduct {
          public $product_id;
          public $name;
          public $size;
          public $unit_price;
          public $quantity;
          public $image_src;
      
          public function __construct($product_id, $name, $size, $unit_price, $quantity, $image) {
              $this->product_id = $product_id;
              $this->name = $name;
              $this->size = $size;
              $this->unit_price = $unit_price;
              $this->quantity = $quantity;
              $this->image_src = $image;
          }
        }

        $cart_items = $_SESSION['cartItems'];
        foreach ($cart_items as $item) {
          echo "
            <div class='card-wrapper'>
              <div class='card'>
                <div class='card-image'>
                  <img src='$item->image_src'>
                </div>
                <div class='card-text'>
                  <h3>$item->name</h3>
                  <p>Size: $item->size</p>
                  <div class='counter-wrapper'>
                    <span class='counter-minus'>-</span>
                    <span class='counter-number'>$item->quantity</span>
                    <span class='counter-plus'>+</span>
                  </div>
                </div>
                <div class='card-misc'>
                  <span class='remove'>remove</span>
                  <div class='card-price'>
                    <h3>\$$item->unit_price</h3>
                  </div>
                </div>
              </div>
              <hr />
            </div>
          ";
        }
      ?>

      <div class='price-wrapper'>
        <div class='price'>
          <div class='price-breakdown'>
            <div class='row'>
              <span class='description'>Subtotal</span>
              <span>$10</span>
            </div>
            <div class='row'>
              <span class='description'>Service charge</span>
              <span>$10</span>
            </div>
            <div class='row'>
              <span class='description'>Shipping costs</span>
              <span>$10</span>
            </div>
          </div>
          <div>
            <div class='row'>
              <h5 class='description'>Order Total</h5>
              <h5>$10</h5>
            </div>
            <hr />
          </div>
          <a href='payment-successful.php'>
            <button class='checkout-button'>Checkout</button>
          </a>
        </div>
      </div>
    </div>

  </div>



  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>