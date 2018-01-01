<?php
  include_once 'header.php';
// change the value of $dbuser and $dbpass to your username and password
	include 'includes/db-inc.php';

  //Get Username
  $username = $_SESSION['username'];

  include_once 'footer.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
.box {
    background-color: black;
    color: white;
    padding: 25px 25px 25px 25px;
    margin-top: 30px;
    text-decoration: none;
    display: inline-block;
    flex-wrap: wrap;
}

.box:hover {
    background-color: #747;;
}

</style>
</head>
<body>

<a class="box" href="takeorder.php?tableNum=1">Table 1</a>
<a class="box" href="takeorder.php?tableNum=2">Table 2</a>
<a class="box" href="takeorder.php?tableNum=3">Table 3</a>
<a class="box" href="takeorder.php?tableNum=4">Table 4</a>
<a class="box" href="takeorder.php?tableNum=5">Table 5</a>
<a class="box" href="takeorder.php?tableNum=6">Table 6</a>
<a class="box" href="takeorder.php?tableNum=7">Table 7</a>

</body>
</html>
