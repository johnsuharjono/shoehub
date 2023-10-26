<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/home.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="js/carousel.js" defer></script>
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

  <div class="content-wrapper">
    <!-- trending items -->
    <section class="trending-items-wrapper" aria-label="Trending Items">
      <h1>Trending items</h1>
      <div class="carousel-wrapper">
        <div class="carousel" data-carousel>
          <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
          <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
          <ul data-slides>
            <li class="slide" data-active>
              <img src="https://source.unsplash.com/pair-of-black-and-white-air-jordan-13-shoes-on-gray-surface-w83s82yd3Fk" alt="Trending Items #1">
            </li>
            <li class="slide">
              <img src="https://source.unsplash.com/blue-pink-and-white-adidas-athletic-shoe-on-white-display-table-4JHMt29fvj8" alt="Trending Items #2">
            </li>
            <li class="slide">
              <img src="https://source.unsplash.com//unpaired-orange-and-white-nike-air-huarache-JzJSybPFb3s" alt="Trending Items #3">
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="items-on-sale-wrapper">
      <div class="items-on-sale-header">
        <h1>Items on sale</h1>
        <a href="#">View all</a>
      </div>
      <div class="items-on-sale-grid">
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
    </section>

    <!-- category shop -->
    <section class="category-shop-wrapper">
      <div class="category-shop-header">
        <h1>Shop by category</h1>
        <a href="#">View all</a>
      </div>
      <div class="category-shop-grid">
        <div class="category-shop-card">
          <div class="category-shop-card-image">
            <img src="https://source.unsplash.com/black-and-black-and-white-converse-all-star-high-top-sneakers-mWYhrOiAgmA">
          </div>
          <div class="category-shop-card-content">
            <h3 class="category-shop-card-title">Casual</h3>
          </div>
        </div>

        <div class="category-shop-card">
          <div class="category-shop-card-image">
            <img src="https://source.unsplash.com/white-black-and-red-nike-air-max-90-jLEGurepDco">
          </div>
          <div class="category-shop-card-content">
            <h3 class="category-shop-card-title">Running</h3>
          </div>
        </div>

        <div class="category-shop-card">
          <div class="category-shop-card-image">
            <img src="https://source.unsplash.com/q4ExhrHaSLY">
          </div>
          <div class="category-shop-card-content">
            <h3 class="category-shop-card-title">Luxury</h3>
          </div>
        </div>
    </section>
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