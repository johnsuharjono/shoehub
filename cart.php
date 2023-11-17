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
      if (count($_SESSION["cartItems"]) < 1) {
        echo "<div class='empty-cart-text'>Cart is empty.</div>";
      }
      ?>

      <?php
      $cart_items = $_SESSION['cartItems'];
      $subtotal = 0;

      foreach ($cart_items as $idx => $item) {
        $current_subtotal = $item['unit_price'] * $item['quantity'];
        $subtotal += $current_subtotal;

        echo "
            <div class='card-wrapper'>
              <div class='card'>
                <div class='card-image'>
                  <img src='{$item['image_src']}'>
                </div>
                <div class='card-text'>
                  <h3 name='product-name'>{$item['name']}</h3>
                  <div class='card-description'>
                    <p>Size: {$item['size']}</p>
                    <p>Price: S\${$item['unit_price']}</p>
                  </div>
                  <div class='counter-wrapper'>
                    <a class='counter-minus counter-item' href='./includes/cart.inc.php?subtract=$idx'>-</a>
                    <span class='counter-number counter-item'>{$item['quantity']}</span>
                    <a class='counter-plus counter-item' href='./includes/cart.inc.php?add=$idx'>+</a>
                  </div>
        ";
        if (isset($_GET['error']) && $_GET['error'] == 'max-quantity-reached' && isset($_GET['item']) && $idx == $_GET['item']) {
          echo "<p class='auth-form-warning-message'>Maximum quantity reached.</p>";
        }
        echo
        "
                </div>
                <div class='card-misc'>
                  <a class='remove-card' href='./includes/cart.inc.php?remove=$idx'>remove</a>
                  <div class='card-price'>
                    <h3>\${$current_subtotal}</h3>
                  </div>
                </div>
              </div>
              <hr />
            </div>
          ";
      }

      $service_charge = $subtotal * 0.08;
      $order_total = $subtotal + $service_charge + 20;
      ?>

      <div class='price-wrapper'>
        <div class='price'>
          <div class='price-breakdown'>
            <div class='row'>
              <span class='description'>Total</span>
              <span><?php echo "S$$subtotal" ?></span>
            </div>
            <div class='row'>
              <span class='description'>Service charge (8%)</span>
              <span><?php echo "S$$$service_charge" ?></span>
            </div>
            <div class='row'>
              <span class='description'>Shipping costs</span>
              <span>S$20</span>
            </div>
          </div>
          <div>
            <div class='row'>
              <h5 class='description'>Order Total</h5>
              <h5><?php echo "S$$order_total" ?></h5>
            </div>
            <hr />
          </div>
          <a href='./includes/cart.inc.php?checkout=1'>
            <button class='checkout-button'>Checkout</button>
          </a>
          <?php
            if (isset($_GET["error"]) && $_GET["error"] == 'empty-cart') {
              echo "<p class='auth-form-error-message' style='text-align: center'>Cart is empty.</p>"; 
            }
          ?>
        </div>
      </div>
    </div>

  </div>



  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>