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

      echo '<p style="color: green;">
      Record inserted
      </p>';
  }
}


if(isset($_POST["logout"])) {
  //http://kimconchaphpworkshop.herokuapp.com/w4/login.php
  //http://localhost/phpworkshop/w4/
  header('Location: http://kimconchaphpworkshop.herokuapp.com/w4/');
  session_unset(); 
  session_destroy();
}


//if (isset($_GET["username"])) {
if (isset($_SESSION["username"])) {
  if(isset($_SESSION["username"])== "") {
    die("Name parameter missing");
  }
}
else {
  die("Name parameter missing");
}


?>


<!DOCTYPE html>
<html>
<head>
<title>W4 - Kim Concha</title>

</head>

<h1>Tracking Autos for <?php echo $_GET["username"] ?> </h1>
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

<h2>Automobiles</h2>
<?php
$stmt = $pdo->query("SELECT * FROM autos");
echo '<ul>'."\n";
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
  echo "<li>";
  echo(htmlentities($row['year']) . " " . htmlentities($row['make']) . " / " . htmlentities($row['mileage']));
  echo "</li>";
}
echo "</ul>\n";
?>

</html>

