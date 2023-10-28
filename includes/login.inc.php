<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($email, $password) !== false) {
    header("location: ../login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $email, $password);
} else {
  header("location: ../login.php");
}
