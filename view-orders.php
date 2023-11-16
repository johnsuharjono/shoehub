<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/view-orders.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="js/date-picker.js" defer></script>
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  ?>

  <div class="page-wrapper">
    <div class="page">
      <form class="calendar-box" action="view-orders.php" method="GET">
        <div>
          <?php 
            $selected_date = "";
            if (isset($_GET['date'])) {
              $selected_date = $_GET['date'];
            }
            echo "<input name='date' type='text' id='dateInput' placeholder='Select a date' value='$selected_date'>";
          ?>
          <div class="calendar" id="calendar">
            <div class="calendar-header">
              <button id="prevBtn" type='button'>&lt;</button>
              <h2 id="monthYear">Month Year</h2>
              <button id="nextBtn" type='button'>&gt;</button>
            </div>
            <div class="days" id="daysContainer"></div>
          </div>
        </div>
        <button class="global-button picker-button" type='submit'>
          View
        </button>

      </form>

      <h2 class="orders-text">Orders Placed</h2>
      <hr />

      <?php
        include_once 'includes/view-orders.inc.php';
        require_once 'includes/dbh.inc.php';
        if (!isset($_GET['date'])) {
          echo "<div class='empty-text'>Please select a date.</div>";
        } else if (strtotime($_GET['date']) > time()) {
          echo "<div class='empty-text'>Date selected is invalid.</div>";
        } else if (count(fetch_orders($conn, $_GET['date'])) == 0) {
          echo "<div class='empty-text'>No orders on this date.</div>";
        } else {
          $orders = fetch_orders($conn, $_GET['date']);

          echo "
            <table class='order-table'>
              <tr class='order-card header-row'>
                <th>Buyer</th>
                <th>Shipping Address</th>
                <th>Total Price</th>
                <th class='order-details-cell'>Products Purchased</th>
              </tr>
          ";
          foreach ($orders as $order) {
            $buyer = fetch_buyer($conn, $order['user_id']);
            $order_items = fetch_order_items($conn, $order['order_id']);

            $price = 0;
            $description = "";
            foreach($order_items as $item) {
              $price += ($item['quantity'] * $item['product_price']);
              $description .= "<li>{$item['quantity']} x {$item['product_name']} (size {$item['product_size']})</li>";
            }
            $price *= 1.08;

            echo "
              <tr class='order-card'>
                <td>{$buyer['name']}</td>
                <td>{$buyer['address']}</td>
                <td>\$$price</td>
                <td class='order-details-cell'>
                  <ul>
                    $description
                  </ul>
                </td>
              </tr>
            ";
          }
          echo "</table>";
        }
      ?>
    </div>

  </div>



  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>