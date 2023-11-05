<?php

// Sign up function
function emptyInputSignup($name, $email, $address, $phone_number, $password, $passwordRepeat)
{
  $result = false;
  if (empty($name) || empty($email) || empty($address) || empty($phone_number) || empty($password) || empty($passwordRepeat)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email)
{
  $result = false;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function passwordMatch($password, $passwordRepeat)
{
  $result = false;
  if ($password !== $passwordRepeat) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function emailExists($conn, $email)
{
  $sql = "SELECT * FROM user WHERE email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $address, $phone_number, $password)
{
  $sql = "INSERT INTO user (name, email, password, address, phone_number, role) VALUES (?, ?, ?, ?, ?, 'user');";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashedpassword, $address, $phone_number);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();
}


// Login function
function emptyInputLogin($email, $password)
{
  $result = false;
  if (empty($email) || empty($password)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $email, $password)
{
  $emailExists = emailExists($conn, $email);

  if ($emailExists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $hashedPassword = $emailExists["password"];
  $checkPassword = password_verify($password, $hashedPassword);

  if ($checkPassword === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  } else if ($checkPassword === true) {
    session_start();
    $_SESSION["userId"] = $emailExists["id"];
    $_SESSION["userEmail"] = $emailExists["email"];
    $_SESSION["userName"] = $emailExists["name"];
    $_SESSION["cartItems"] = array();
    header("location: ../index.php");
    exit();
  }
}

// Size function utils
function format_shoe_size($number) {
  // If it does not have a decimal part, remove comma
  if (floor($number) != $number) {
      return number_format($number, 1, '.', ',');
  } else {
      return number_format($number, 0, '.', '');
  }
}

// Quantity Utils
function fetch_quantity($conn, $product_id, $size) {
  $sql_query = "SELECT quantity FROM product_size WHERE product_id = $product_id AND size = $size";

  $result = mysqli_query($conn, $sql_query);
  if (mysqli_num_rows($result) == 0) {
    return 0;
  } else {
    return mysqli_fetch_assoc($result)['quantity'];
  }
}
