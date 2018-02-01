<?php
session_start();
require_once "pdo.php";

if (isset($_POST["make"]) && isset($_POST["year"]) && isset($_POST["mileage"])) {

  if($_POST["make"] == "") {
    echo '<p style="color: red;">
      Make is required
      </p>';
  }
  else if(!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])){
      echo '<p style="color: red;">
      Mileage and year must be numeric
      </p>';
  }
  else {

      $stmt = $pdo->prepare('INSERT INTO autos (make, year, mileage) VALUES ( :mk, :yr, :mi)');
      $stmt->execute(array(':mk' => $_POST['make'],':yr' => $_POST['year'], ':mi' => $_POST['mileage']));

      $_SESSION['success'] = "Record inserted";
      header("Location: view.php");
      return;

  }
}


if(isset($_POST["logout"])) {
  //http://localhost/phpworkshop/w5/
  // header('Location: http://kimconchaphpworkshop.herokuapp.com/w5/');
  header('Location: http://kimconchaphpworkshop.herokuapp.com/w5/');
  session_unset(); 
  session_destroy();
}


//if (isset($_GET["username"])) {
if (isset($_SESSION["username"])) {
  if(isset($_SESSION["username"])== "") {
    die("Not logged in");
  }
}
else {
  die("Not logged in");
}


?>


<!DOCTYPE html>
<html>
<head>
<title>W5 - Kim Concha</title>

</head>

<h1>Tracking Autos for <?php echo $_SESSION["username"] ?> </h1>
<form method="post">
<p>Make:
<input type="text" name="make" size="20"/></p>
<p>Year:
<input type="text" name="year"/></p>
<p>Mileage:
<input type="text" name="mileage"/></p>
<input type="submit" value="Add">
<input type="submit" name="logout" value="Logout">
</form>


</html>