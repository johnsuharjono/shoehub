<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  ?>

  <!-- Login form card -->
  <div class="auth-form-wrapper">
    <form class="auth-form login-form" id="signup" action="includes/login.inc.php" method="post">
      <div class="auth-form-header">
        <h2>Login</h2>
        <p>To start your transaction</p>
      </div>

      <div class="auth-form-input-wrapper">
        <div class="auth-form-input-field">
          <label for="email">Email</label>
          <input name="email" type="email" placeholder="e-mail" />
        </div>

        <div class="auth-form-input-field">
          <label for="password">Password</label>
          <input name="password" type="password" placeholder="Password" />
        </div>

      </div>

      <button class="auth-form-submit-button global-button" type="submit">Login</button>

      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p class='auth-form-error-message'>Fill in all fields!</p>";
        } else if ($_GET["error"] == "wronglogin") {
          echo "<p class='auth-form-error-message'>Incorrect login information!</p>";
        }
      }
      ?>
    </form>


  </div>



  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>