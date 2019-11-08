<?php
  include_once 'header.php';
// change the value of $dbuser and $dbpass to your username and password
	include 'includes/db-inc.php';

  echo '<br><form class="search" action="addReviewPage.php" method="post">
        Enter Restaurant To Review: <input type="text" name="rName" placeholder="Restaurant Name..."><br>
        <input type="submit">
        </form></br>';

  echo '<br><form class="search" action="deleteReview.php" method="post">
        Delete Reviews: <input type="text" name="deleteName" placeholder="Delete by ReviewID..."><br>
        <input type="submit">
				</form></br>';


	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}


  $username = $_SESSION['username'];

  $query = "SELECT Name,rDescription,Reviews.ReviewID FROM Reviews,User,Restaurant WHERE User.username = '$username' AND User.UserID = Reviews.UserID
  AND Restaurant.RestaurantID = Reviews.RestaurantID";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

// Get user points
  $querya = "SELECT points FROM User WHERE Username = '$username' ";
	$resulta = mysqli_query($conn, $querya);
	if (!$resulta) {
		die("Query to show fields from table failed");
	}
  while($rowa = mysqli_fetch_row($resulta)) {
    foreach($rowa as $points)
      echo "</tr>\n";
  }

// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<h1> $username | Reviews | Points: $points </h1>";
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
