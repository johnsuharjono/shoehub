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
  <script src="js/shop-by-category.js" defer></script>
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  ?>

  <div class="content-wrapper">
    <!-- trending items -->
    <section class="trending-items-wrapper" aria-label="Trending Items">
      <h1>Trending Items</h1>
      <div class="carousel-wrapper">
        <div class="carousel" data-carousel>
          <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
          <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
          <ul data-slides>
            <?php
              require_once 'includes/dbh.inc.php';
              include_once 'includes/home.inc.php';

              $trending = fetch_trending($conn);
              for ($i = 0; $i < count($trending); $i++) {
                $brand = ucwords($trending[$i]['brand']);
                $data_active = '';
                if ($i === 0) {
                  $data_active = 'data-active';
                }
                echo "
                <li class='slide' $data_active onClick='handleRedirect({$trending[$i]['product_id']})'>
                  <h3 class='overlay-text'>{$brand} - {$trending[$i]['name']}</h3>
                  <img src='{$trending[$i]['image_src']}' alt='Trending Items $i' class='trending-items-image'>
                </li>
                ";
              }
            ?>
          </ul>
        </div>
      </div>
    </section>

    <section class="newest-items-wrapper">
      <div class="newest-items-header">
        <h1>Newest Additions</h1>
      </div>
      <div class="newest-items-grid">
        <!-- product card -->
        <?php
          $rows = fetch_newest($conn);
          for ($i = 0; $i < count($rows); $i++) {
            echo "
              <div class='product-card'>
                <div class='product-card-image'>
                  <img src='{$rows[$i]['image_src']}'>
                </div>
                <div class='product-card-content'>
                  <h3 class='product-card-title'>{$rows[$i]['name']}</h3>
                  <p class='product-card-price'>S$ {$rows[$i]['unit_price']}</p>
                  <button class='product-card-button' onClick='handleRedirect({$rows[$i]['product_id']})'>Go to Product</button>
                </div>
              </div>
            ";
          }
        ?>
    </section>

    <!-- category shop -->
    <section class="category-shop-wrapper">
      <div class="category-shop-header">
        <h1>Shop by category</h1>
        <a href="products.php">View all</a>
      </div>
      <div class="category-shop-grid">
        <div class="category-shop-card" id="casual-category-card">
          <div class="category-shop-card-image">
            <img src="https://source.unsplash.com/black-and-black-and-white-converse-all-star-high-top-sneakers-mWYhrOiAgmA">
          </div>
          <div class="category-shop-card-content">
            <h3 class="category-shop-card-title">Casual</h3>
          </div>
        </div>

        <div class="category-shop-card" id="running-category-card">
          <div class="category-shop-card-image">
            <img src="https://source.unsplash.com/white-black-and-red-nike-air-max-90-jLEGurepDco">
          </div>
          <div class="category-shop-card-content">
            <h3 class="category-shop-card-title">Running</h3>
          </div>
        </div>

        <div class="category-shop-card" id="luxury-category-card">
          <div class="category-shop-card-image">
            <img src="https://source.unsplash.com/q4ExhrHaSLY">
          </div>
          <div class="category-shop-card-content">
            <h3 class="category-shop-card-title">Luxury</h3>
          </div>
        </div>
    </section>
  </div>

  <?php
  include_once 'components/footer.php';
  ?>


</body>

</html>

<script>
  function handleRedirect(product_id) {
    window.location.href = `product-details.php?id=${product_id}`;
  }
</script>