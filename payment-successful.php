<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/payment-successful.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  ?>

  <div class="page-wrapper">
    <img src="assets/payment-successful.png"/>
    <div class="text-body">
      <h3>Payment Successful!</h3>
      <p>Thank you for your payment. An order summary will be sent to your registered email.</p>
    </div>
    <a href="index.php" class="back-to-home">Back to Home</a>
  </div>

  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>