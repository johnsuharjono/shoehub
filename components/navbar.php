<?php
session_start();
?>

<header class="main__nav">
  <div class="nav__logo">
    <a href="index.php">
      <img src="assets/logo.png" />
      <span class="nav__logo__text">ShoeHub</span>
    </a>
  </div>
  <nav class="nav__wrapper">
    <ul class="nav__links">
      <li><a href="products.php">Product</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact-us.php">Contact us</a></li>
      <?php
      if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
        echo "<li><a href='manage-product.php'>Manage Product</a></li>";
      }
      ?>
    </ul>

    <ul class="nav__links">
      <?php
      if (isset($_SESSION["userId"])) {
        $firstName = explode(" ", $_SESSION["userName"])[0];
        echo "<li><a href='cart.php'>Cart</a></li>";
        echo "<p class='nav__user'>Hello, " . $firstName . "!</p>";
        echo "<li><a href='includes/signout.inc.php'>Logout</a></li>";
      } else {
        echo "<li><a href='login.php'>Login</a></li>";
        echo "<li><a href='signup.php'>Signup</a></li>";
      }
      ?>
    </ul>
  </nav>
</header>