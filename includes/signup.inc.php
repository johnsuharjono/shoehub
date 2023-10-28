<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['password-repeat'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($name, $email, $password, $passwordRepeat) !== false) {
    header("location: ../signup.php?error=emptyinput");
    exit();
  }

  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
    exit();
  }

  if (passwordMatch($password, $passwordRepeat) !== false) {
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
  }

  if (emailExists($conn, $email) !== false) {
    header("location: ../signup.php?error=emailtaken");
    exit();
  }

  createUser($conn, $name, $email, $password);
} else {
  header("location: ../signup.php");
}
