
<?php

session_start();

if (isset($_POST["username"]) || isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $a = "@";

  if($username == "" || $password == "") {
    echo '<p style="color: red;">
      Email and password are required.
      </p>';
  }
  else {
    $stored_hash = '0705cde14466b539c035931e60643f8f';
    $md5 = hash('md5', "XyZzy12*$password");
    //$md5 = hash('md5', "XyZzy12*php123");
    //echo $md5;
    if(strpos($username,$a) === false){
    echo '<p style="color: red;">
      Email must have an at-sign (@)
      </p>';
    }
    else if($md5 != $stored_hash) {
      echo '<p style="color: red;">
      Incorrect password
      </p>';
      error_log("Login fail ".$username." $md5");
    }
    else {
      $_SESSION["username"] = $username;
      error_log("Login success ".$username);
      $_SESSION['username'] = $_POST['username'];
      header("Location: view.php");
      return;
    }
  }
}

?>



<!DOCTYPE html>
<html>
<head>
  <title>W5 - Kim Concha</title>
</head>
<body>
<form method="POST">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Log In">
  <a href="index.php"><input type="button" value="Cancel"/></a>
</form>
<!-- password is: php123 -->
</body>
</html>
