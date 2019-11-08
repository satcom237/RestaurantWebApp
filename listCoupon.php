<?php

  include_once 'header.php';
// change the value of $dbuser and $dbpass to your username and password
	include 'includes/db-inc.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
// Retrieve name of table selected
	$query = "SELECT restaurantName, cDescription FROM Coupon ";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

  echo '<br><form class="search" action="redeem.php" method="post">
        Redeem Coupons: <input type="text" name="c_name" placeholder="Enter Coupon..."><br>
        <input type="submit">
        </form></br>';

// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<h1>Table: Coupons </h1>";
	echo "<table border='1'><tr>";

// printing table headers
	for($i=0; $i<$fields_num; $i++) {
		$field = mysqli_fetch_field($result);
		echo "<td><b>$field->name</b></td>";
	}
	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {
		echo "<tr>";
		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable
		foreach($row as $cell)
			echo "<td>$cell</td>";
		echo "</tr>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
  include_once 'footer.php';
?>
