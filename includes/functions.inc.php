<?php

// Sign up function
function emptyInputSignup($name, $email, $password, $passwordRepeat)
{
  $result = false;
  if (empty($name) || empty($email) || empty($password) || empty($passwordRepeat)) {
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
  $sql = "SELECT * FROM users WHERE email = ?;";
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


function createUser($conn, $name, $email, $password)
{
  $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedpassword);
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
    header("location: ../index.php");
    exit();
  }
}
