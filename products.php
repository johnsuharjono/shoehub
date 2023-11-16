<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/products.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="js/price-range-slider.js" defer></script>
  <script src="js/pagination.js" defer></script>
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  include_once 'includes/products.inc.php';
  require_once 'includes/dbh.inc.php';
  ?>

  <div class="layout">
    <div class="sidebar-filter">
      <form id="filter-form" action="products.php" method="GET">
        <section class="filter-wrapper">
          <div class="filter-header-wrapper">
            <h3>Filter</h3>
            <a href="products.php" id="clear-filter">Clear</a>
          </div>

          <div>
            <input class="filter-search-input" id="search" placeholder="search..." name="searchbar-input" value="<?php echo isset($_GET['searchbar-input']) ? $_GET['searchbar-input'] : ''; ?>" />
          </div>

          <!-- Category filter -->
          <div class="filter-checkbox-wrapper">
            <h4 class="">Category:</h4>
            <div class="checkbox-container">
              <?php
              $result = fetch_all_categories($conn);
              while ($row = mysqli_fetch_assoc($result)) {
                $raw_category = $row['category'];
                $lowercase_category = strtolower($raw_category);
                $display_category = ucwords($lowercase_category);

                $is_checked = '';
                if (isset($_GET['category']) && in_array($lowercase_category, $_GET['category'])) {
                  $is_checked = 'checked';
                }

                echo "
                    <div class='filter-form-field'>
                      <input type='checkbox' id='$lowercase_category' name='category[]' value='$lowercase_category' $is_checked>
                      <label class='' for='$lowercase_category'>$display_category</label>
                    </div>
                  ";
              }
              mysqli_free_result($result);
              ?>
            </div>
          </div>

          <!-- Brand filter -->
          <div class="filter-checkbox-wrapper">
            <h4 class="">Brand:</h4>
            <div class="checkbox-container">
              <?php
              $result = fetch_all_brands($conn);
              while ($row = mysqli_fetch_assoc($result)) {
                $raw_brand = $row['brand'];
                $lowercase_brand = strtolower($raw_brand);
                $display_brand = ucwords($lowercase_brand);

                $is_checked = '';
                if (isset($_GET['brand']) && in_array($lowercase_brand, $_GET['brand'])) {
                  $is_checked = 'checked';
                }

                echo "
                    <div class='filter-form-field'>
                      <input type='checkbox' id='$lowercase_brand' name='brand[]' value='$lowercase_brand' $is_checked>
                      <label class='' for='$lowercase_brand'>$display_brand</label>
                    </div>
                  ";
              }
              mysqli_free_result($result);
              ?>
            </div>
          </div>

          <div class="filter-price">
            <h4 class="">Price filter:</h4>
            <div class="price-input">
              <div class="price-input-field">
                <span>Min</span>
                <span class="price-input-currency-wrapper">$
                  <input type="number" class="input-min" name="min-price" value="<?php echo isset($_GET['min-price']) ? $_GET['min-price'] : '0'; ?>">
                </span>
              </div>
              <div class="separator">-</div>
              <div class="price-input-field">
                <span>Max</span>
                <span class="price-input-currency-wrapper">$
                  <input type="number" class="input-max" name="max-price" value="<?php echo isset($_GET['max-price']) ? $_GET['max-price'] : '1000'; ?>">
                </span>
              </div>
            </div>

            <div class="slider-wrapper">
              <div class="slider">
                <div class="progress" style="
                <?php
                $min_price = isset($_GET['min-price']) ? $_GET['min-price'] : '0';
                $max_price = isset($_GET['max-price']) ? $_GET['max-price'] : '1000';
                $style = "";
                if ($max_price - $min_price >= 1 && $max_price <= 1000) {
                  $left_style = ($min_price / 1000) * 100;
                  $right_style = 100 - ($max_price / 1000) * 100;
                  $style = "left: {$left_style}%; right: {$right_style}%;";
                }
                echo "$style"
                ?>
                "></div>
              </div>
              <div class="range-input">
                <input type="range" class="range-min" min="0" max="1000" value="<?php echo isset($_GET['min-price']) ? $_GET['min-price'] : '0'; ?>" step="1">
                <input type="range" class="range-max" min="0" max="1000" value="<?php echo isset($_GET['max-price']) ? $_GET['max-price'] : '1000'; ?>" step="1">
              </div>
            </div>
          </div>

          <div class="submit-filter-button-container">
            <input type="submit" name="SUBMIT" value="APPLY" class="global-button submit-filter-button">
          </div>
        </section>
      </form>

      <div>
        <?php
          if (isset($_GET['min-price'])) {
            $min_price = $_GET['min-price'];
          } else {
            $min_price = "0";
          }
          if (isset($_GET['max-price'])) {
            $max_price = $_GET['max-price'];
          } else {
            $max_price = "1000";
          }
          if (isset($_GET['brand'])) {
            $selected_brands = $_GET['brand'];
          } else {
            $selected_brands = array();
          }
          if (isset($_GET['category'])) {
            $selected_categories = $_GET['category'];
          } else {
            $selected_categories = array();
          }
          if (isset($_GET['searchbar-input'])) {
            $searchbar_input = $_GET['searchbar-input'];
          } else {
            $searchbar_input = "";
          }

          $products = fetch_products($conn, $min_price, $max_price, $selected_brands, $selected_categories, $searchbar_input);
          $product_count = count($products);
          echo "Products found: $product_count";
        ?>
      </div>

      <div class='pagination-wrapper'>
        <?php
          $pages = split_into_pages($products, 6);

          if (isset($_GET['page'])) {
            $current_page = $_GET['page'];
          } else {
            $current_page = 1;
          }
          for ($i = 1; $i < count($pages) + 1; $i++) {
            $style = "";
            if ($i == $current_page) {
              $style = "background: #000; color: #fff;";
            }
            echo "<button onClick='addPageToQueryParams($i)' style='$style'>$i</button>";
          }
        ?>
      </div>
    </div>


    <div class="product-catalog">
      <!-- product card -->
      <?php
        if (count($products) == 0) {
          echo "
          <div class='no-product-wrapper'>
            <h5 class='no-product-text'>No products found.</h5>
          </div>
          ";
      }

        $current_page = array();
        if (count($pages) > 0) {
          if (isset($_GET['page'])) {
            $current_page = $pages[$_GET['page'] - 1];
          } else {
            $current_page = $pages[0];
          }
        }

        for ($i = 0; $i < count($current_page); $i++) {
          $product = $current_page[$i];
          echo "
            <div class='product-card'>
              <div class='product-card-image'>
                <img src='{$product['image_src']}'>
              </div>
              <div class='product-card-content'>
                <h3 class='product-card-title'>{$product['name']}</h3>
                <p class='product-card-price'>S$ {$product['price']}</p>
                <a href='product-details.php?id={$product['id']}'>
                  <button class='product-card-button'>Go to Product</button>
                </a>
              </div>
            </div>
          ";
        }
      ?>
    </div>
  </div>

  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>
