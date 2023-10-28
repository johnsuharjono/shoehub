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
  <?php
  include_once 'components/navbar.php';
  ?>

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
              <div class="price-input-field">
                <span>Min</span>
                <span class="price-input-currency-wrapper">$
                  <input type="number" class="input-min" value="50">
                </span>
              </div>
              <div class="separator">-</div>
              <div class="price-input-field">
                <span>Max</span>
                <span class="price-input-currency-wrapper">$
                  <input type="number" class="input-max" value="300">
                </span>
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


    <div class="product-catalog">
      <!-- product card -->
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com/brown-nike-sneaker-on-yellow-textile-NOpsC3nWTzY">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com//unpaired-red-nike-sneaker-164_6wVEHfI">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com/white-black-and-red-nike-air-max-90-jLEGurepDco">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com/brown-nike-sneaker-on-yellow-textile-NOpsC3nWTzY">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com//unpaired-red-nike-sneaker-164_6wVEHfI">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com/white-black-and-red-nike-air-max-90-jLEGurepDco">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com/brown-nike-sneaker-on-yellow-textile-NOpsC3nWTzY">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com//unpaired-red-nike-sneaker-164_6wVEHfI">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>
      <div class="product-card">
        <div class="product-card-image">
          <img src="https://source.unsplash.com/white-black-and-red-nike-air-max-90-jLEGurepDco">
        </div>
        <div class="product-card-content">
          <h3 class="product-card-title">Product Title</h3>
          <p class="product-card-price">$ 99.99</p>
          <button class="product-card-button">Add to cart</button>
        </div>
      </div>

    </div>
  </div>

  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>