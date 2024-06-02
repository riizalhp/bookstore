<?php
// Include the koneksi.php file to establish database connection
include('koneksi.php');

// Check if the login form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {

  // Extract the username and password from the POST request
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);

  // Create the SQL query to select the user from the database
  $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

  // Execute the query and store the result
  $result = mysqli_query($koneksi, $sql);

  // Check if the query returned any rows (i.e., if a valid user was found)
  if (mysqli_num_rows($result) > 0) {
    // Valid user found! Start a session and redirect to the welcome page
    session_start();
    $_SESSION['username'] = $username;
    header('Location: main.php'); // Replace "welcome.php" with the actual URL of your welcome page
  } else {
    // Invalid user credentials
    header('Location: index.php?pesan=gagal'); // Redirect to the login page with an error message
  }
} else {
  // Login form not submitted yet
  // You can add code here to display the login form (e.g., using HTML)
}
?>
