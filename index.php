<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <div class="container">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <?php
      // This page allows the user to create an account or log into an existing account. Upon logging in, the session
      // is validated by $_SESSION["validate"] being set to 1. This may be changed later to use cookies for better 
      // functionality and security. 
      // Account passwords are hashed for security.

      include("info.php");
      session_start();
      $_SESSION["validate"] = 0;
      ?>

      <h2>Log In</h2>
      <form method="POST">
        <input type="hidden" name="function" value="login">
        Username: <input type="text" name="username"><br />
        Password: <input type="password" name="userpass"><br />
        <input type="submit" value="Login">
      </form><br />

      <h2>Create Account</h2>
      <form method="POST">
      <input type="hidden" name="function" value="create">
        First Name: <input type="text" name="first_name"><br />
        Last Name:  <input type="text" name="last_name"><br />
        Username:   <input type="text" name="user"><br />
        Password:   <input type="password" name="pass"><br />
        <input type="submit" value="Create Account">
      </form>

      <?php
      if (isset($_POST["function"])) {
        switch($_POST["function"]) {
          case "login":
            $login_query = "SELECT * FROM `users` WHERE user='$_POST[username]'";
            $query_return = mysqli_query($connection, $login_query);
            $result = mysqli_fetch_assoc($query_return);
            if (!empty($result)) {
              if (password_verify($_POST["userpass"], $result["pass"])) {
                // TODO: Redirect to vehicles.php if result is not empty
                $_SESSION["validate"] = 1;
                header("Location: vehicles.php", true, 301);
                exit;
              } else {
                ?>
                  <br /><div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Incorrect password.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
              }
            } else {
              ?>
              <br /><div class="alert alert-warning alert-dismissible fade show" role="alert">
                Login failed.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php
            }
            break;
          case "create":
            $select_query = "SELECT * FROM `users` WHERE user='$_POST[user]'";
            $query_return = mysqli_query($connection, $select_query);
            $result = mysqli_fetch_assoc($query_return);
            if (empty($result)) {
              $hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
              $insert_query = "INSERT INTO `users` (`first_name`, `last_name`, `user`, `pass`) VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[user]', '$hash')";
              $query_return = mysqli_query($connection, $insert_query);
              ?>
                <br /><div class="alert alert-success alert-dismissible fade show" role="alert">
                  Your account has been created. You can now log in.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
            } else {
              ?>
              <br /><div class="alert alert-warning alert-dismissible fade show" role="alert">
                This username already exists.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php
            }
            break;
          default:
          ?>
            <br /><div class="alert alert-warning alert-dismissible fade show" role="alert">
                Something went wrong.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php
            break;
        }
      } 
      ?>
    </body>
  </div>
</html>