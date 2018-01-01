<?php
  include_once 'header.php';
// change the value of $dbuser and $dbpass to your username and password
	include 'includes/db-inc.php';

  //Get Username
  $username = $_SESSION['username'];

  //Get table number
  $tableNum = (int)$_GET['tableNum'];

  include_once 'footer.php';
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<title>Input Number Incrementer</title>

	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<div id="page-wrap">

    <h1>Take Order</h1>
    <h2>Name: <?php echo $username; ?> | Table: <?php echo $tableNum; ?></h2>

    <form method="post" action="insertQuery.php">
      <div class="numbers-row">
        <label for="name">Salad | $5</label>
        <input type="number" name="Salad" id="menu" value="0">
      </div>
      <div class="numbers-row">
        <label for="name">Fries | $3</label>
        <input type="number" name="Fries" id="menu" value="0">
      </div>
      <div class="numbers-row">
        <label for="name">Soda | $1</label>
        <input type="number" name="Soda" id="menu" value="0">
      </div>
      <div class="buttons">
        <input type="submit" name="submit" value="Submit" id="submit">
      </div>
    </form>

	</div>

</body>

</html>
