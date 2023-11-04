<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone_number = $_POST['phone'];
  $password = $_POST['password'];
  $password_repeat = $_POST['password-repeat'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($name, $email, $address, $phone_number, $password, $password_repeat) !== false) {
    header("location: ../signup.php?error=emptyinput");
    exit();
  }

  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
    exit();
  }

  if (passwordMatch($password, $password_repeat) !== false) {
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
  }

  if (emailExists($conn, $email) !== false) {
    header("location: ../signup.php?error=emailtaken");
    exit();
  }

  createUser($conn, $name, $email, $address, $phone_number, $password);
} else {
  header("location: ../signup.php");
}
