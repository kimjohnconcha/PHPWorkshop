<?php

session_start();

$result = "";



function check($computer, $human) {
  $names = array("Rock", "Paper", "Scissors");

  if($computer == 0 && $human == 0)
    return "Human=Rock Computer=Rock Result=Tie";
  else if ($computer == 1 && $human == 0)
    return "Human=Rock Computer=Paper Result=You Lose";
  else if ($computer == 0 && $human == 1)
    return "Human=Paper Computer=Rock Result=You Win";
  else if ($computer == 1 && $human == 1)
    return "Human=Paper Computer=Paper Result=Tie";
  else if ($computer == 2 && $human == 0)
    return "Human=Rock Computer=Scissors Result=You Win";
  else if ($computer == 2 && $human == 1)
    return "Human=Paper Computer=Scissors Result=You Lose";
  else if ($computer == 2 && $human == 2)
    return "Human=Scissors Computer=Scissors Result=Tie";
  else if ($computer == 0 && $human == 2)
    return "Human=Scissors Computer=Rock Result=You Lose";
  else if ($computer == 1 && $human == 2)
    return "Human=Scissors Computer=Paper Result=You Win";
  else if ($human == 3) {
    return Test();
  }
}


function Test () {
  $names = array("Rock", "Paper", "Scissors");
  $m = "";
  for($c=0;$c<3;$c++) {
    for($h=0;$h<3;$h++) {
        $r = check($c, $h);
        //return "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        $m .= $r ."\n"; 
    }
  }
  return $m;
}


if(isset($_POST["play"])) {
  $result = check(rand(0,2), $_POST["user"]);
}


if(isset($_POST["logout"])) {
  header('Location: http://localhost/phpworkshop/w3/');
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
<title>Kim Concha R-P-S</title>
</head>
<body>
<h2>Rock Paper Scissors</h2>
<p>Welcome: <?php echo $_GET["username"] ?></p>
<form method="POST">
<select name="user">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" name="play" value="Play">
<input type="submit" name="logout" value="Logout">
<pre><?php echo $result ?></pre>
</form>
</body>
</html>








