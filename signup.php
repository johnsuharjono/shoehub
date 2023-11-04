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
    <form class="auth-form signup-form" id="signup" action="includes/signup.inc.php" method="post">
      <div class="auth-form-header">
        <h2>Sign Up</h2>
        <p>To start your transaction</p>
      </div>

      <div class="auth-form-input-wrapper">
        <div class="auth-form-input-field">
          <label for="name">Name</label>
          <input name="name" type="text" placeholder="Full name..." />
        </div>

        <div class="auth-form-input-field">
          <label for="email">Email</label>
          <input name="email" type="email" placeholder="e-mail" />
        </div>

        <div class="auth-form-input-field">
          <label for="address">Address</label>
          <input name="address" type="text" placeholder="Address" />
        </div>
        <div class="auth-form-input-field">
          <label for="phone">Phone</label>
          <input name="phone" type="text" placeholder="Phone" />
        </div>


        <div class="auth-form-input-group">
          <div class="auth-form-input-field">
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Password" />
          </div>
          <div class="auth-form-input-field">
            <label for="password-repeat">Confirm Password</label>
            <input name="password-repeat" type="password" placeholder="Password" />
          </div>
        </div>

      </div>

      <button class="auth-form-submit-button global-button" type="submit" name="submit">Sign up</button>

      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p class='auth-form-error-message'>Fill in all fields!</p>";
        } else if ($_GET["error"] == "invalidemail") {
          echo "<p class='auth-form-error-message'>Choose a proper email!</p>";
        } else if ($_GET["error"] == "passwordsdontmatch") {
          echo "<p class='auth-form-error-message'>Passwords doesn't match!</p>";
        } else if ($_GET["error"] == "stmtfailed") {
          echo "<p class='auth-form-error-message'>Something went wrong, try again!</p>";
        } else if ($_GET["error"] == "emailtaken") {
          echo "<p class='auth-form-error-message'>Email already taken!</p>";
        } else if ($_GET["error"] == "none") {
          echo "<p class='auth-form-error-message'>You have signed up!</p>";
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