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
  <script src="js/price-range-slider.js" defer></script>
</head>

<body>
  <header class="main__nav">
    <div class="nav__logo">
      <a href="#">
        <img src="assets/logo.png" />
        <span class="nav__logo__text">ShoeHub</span>
      </a>
    </div>
    <nav>
      <ul class="nav__links">
        <li><a href="#">Product</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>
    </nav>
  </header>

  <div class="layout">
    <div class="sidebar-filter">
      <form id="filter-form" action="" method="POST">
        <section class="filter-wrapper">
          <div class="filter-header-wrapper">
            <h3>Filter</h3>
            <a href="#" id="clear-filter">Clear</a>
          </div>

          <div>
            <input class="filter-search-input" id="search" placeholder="search..." />
          </div>

          <!-- Category filter -->
          <div class="filter-checkbox-wrapper">
            <h4 class="">Category:</h4>
            <div class="checkbox-container">
              <div class="filter-form-field">
                <input type="checkbox" id="running" name="category[]" value="running">
                <label class="" for="running">Running</label>
              </div>
              <div class="filter-form-field">
                <input type="checkbox" id="casual" name="category[]" value="casual">
                <label class="" for="casual">Casual</label>
              </div>
              <div class="filter-form-field">
                <input type="checkbox" id="luxury" name="category[]" value="luxury">
                <label class="" for="luxury">Luxury</label>
              </div>
            </div>
          </div>

          <!-- Brand filter -->
          <div class="filter-checkbox-wrapper">
            <h4 class="">Brand:</h4>
            <div class="checkbox-container">
              <div class="filter-form-field">
                <input type="checkbox" id="nike" name="brand[]" value="nike">
                <label class="" for="nike">Nike</label>
              </div>
              <div class="filter-form-field">
                <input type="checkbox" id="adidas" name="brand[]" value="adidas">
                <label class="" for="adidas">Adidas</label>
              </div>
              <div class="filter-form-field">
                <input type="checkbox" id="puma" name="brand[]" value="puma">
                <label class="" for="puma">Puma</label>
              </div>
              <div class="filter-form-field">
                <input type="checkbox" id="newbalance" name="brand[]" value="newbalance">
                <label class="" for="newbalance">New Balance</label>
              </div>
            </div>
          </div>

          <div class="filter-price">
            <h4 class="">Price filter:</h4>
            <div class="price-input">
              <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" value="50">
              </div>
              <div class="separator">-</div>
              <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" value="300">
              </div>
            </div>

            <div class="slider-wrapper">
              <div class="slider">
                <div class="progress"></div>
              </div>
              <div class="range-input">
                <input type="range" class="range-min" min="0" max="1000" value="50" step="1">
                <input type="range" class="range-max" min="0" max="1000" value="300" step="1">
              </div>
            </div>
          </div>

          <div class="submit-filter-button-container">
            <input type="submit" name="SUBMIT" value="APPLY" class="global-button submit-filter-button">
          </div>
        </section>
      </form>
    </div>
    <div class="product-catalog"></div>
  </div>

  <footer>
    <div class="footer-logo">
      <img src="assets/logo.png" />
      <span class="footer-logo-text">ShoeHub</span>
    </div>

    <div class="footer-address">
      <h3>22 Nanyang Avenue, Singapore 639810</h3>
    </div>

    <div class="footer-links">
      <a href="#">About</a>
      <a href="#">Shop running</a>
      <a href="#">Shop casual</a>
      <a href="#">Shop luxury</a>
    </div>

    <div class="footer-social-media footer-links">
      <a href="#">Instagram</a>
      <a href="#">Twitter</a>
      <a href="#">Facebook</a>
      <a href="#">Tiktok</a>
    </div>

    <div class="footer-contact">
      <p>+65 8123 4567</p>
      <p>contact@shoehub.com</p>
    </div>

    <div class="footer-copyright">
      © 2023 ShoeHub. All rights reserved.
    </div>
  </footer>

</body>

</html>