<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style1.css">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger" role="alert">
        Your Registration is failed!
      </div>
    <?php }
  }
  ?>
  <center>
    <div class="form-container" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width:500px; margin:auto;">
      <div class="row mb-4">
        <h1>UNIBOOKSTORE</h1>
      </div>
      <div class="row">
        <form method="POST" action="cek_signup.php">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword" required>
          </div>
          <button class="btn btn-primary" type="submit">Sign Up</button>
          </form>
          <p style="margin-top: 10px;">Already have an account? <a href="index.php" class="text-primary">Sign in</a></p>
        
      </div>
    </div>
  </center>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
