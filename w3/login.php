
<?php

session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  if($username == "" || $password == "") {
    echo "User name and password are required.";
  }
  else {
    $stored_hash = '0705cde14466b539c035931e60643f8f';
    $md5 = hash('md5', "XyZzy12*$password");
    //$md5 = hash('md5', "XyZzy12*php123");
    //echo $md5;
    if($md5 != $stored_hash) {
      echo "Incorrect password";
    }
    else {
      $_SESSION["username"] = $username;
      //http://kimconchaphpworkshop.herokuapp.com/w3/login.php
      //http://localhost/phpworkshop/w3/game.php?username=".urlencode($_POST['username'])
      header("Location: http://kimconchaphpworkshop.herokuapp.com/w3/game.php?username=".urlencode($_POST['username']));
    }
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>W3 - Kim Concha</title>
</head>
<body>
<form method="POST">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit">
</form>
<!-- password is: php123 -->
</body>
</html>

















