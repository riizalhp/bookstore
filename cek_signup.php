<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "koneksi.php";

  $username = $_POST['username'];
  $password = $_POST['password'];
  $confpassword = $_POST['confirmpassword'];

  // Sanitize user inputs
  $username = mysqli_real_escape_string($koneksi, $username);
  $password = mysqli_real_escape_string($koneksi, $password);
  $confpassword = mysqli_real_escape_string($koneksi, $confpassword);

  // Check if password and confirm password match
  if ($password == $confpassword) {
    // Check if username already exists
    $checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $checkUsernameQuery);

    // If username exists, display error message
    if (mysqli_num_rows($result) > 0) {
      header("Location: signup.php?pesan=username_used"); // Username already used message
      exit; // Stop further execution
    }

    // If username is unique, proceed with registration
    $insertQuery = "INSERT INTO user (username, password) VALUES('$username', '$password')";
    if (mysqli_query($koneksi, $insertQuery)) {
      header("Location: index.php?pesan=terdaftar");
    } else {
      header("Location: signup.php?pesan=gagal");
    }
  } else {
    header("Location: signup.php?pesan=confirmpass_wrong"); // Confirmation password mismatch message
  }
} else {
  header("Location: signup.php");
}
?>
