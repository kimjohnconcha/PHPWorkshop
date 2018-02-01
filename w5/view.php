<?php
session_start();
require_once "pdo.php";

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
    die("Name parameter missing");
  }
}
else {
  die("Name parameter missing");
}

if ( isset($_SESSION['success']) ) {
    echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
}

?>




<!DOCTYPE html>
<html>
<head>
<title>W5 - Kim Concha</title>

</head>

<h1>Tracking Autos for <?php echo $_SESSION["username"] ?> </h1>
<br>
<form method="post">
<a href="add.php"><input type="button" value="Add New"/></a>
<input type="submit" name="logout" value="Logout">
</form>

<br>

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