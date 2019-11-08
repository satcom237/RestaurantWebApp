<?php
  include_once 'header.php';
// change the value of $dbuser and $dbpass to your username and password
	include 'includes/db-inc.php';

	/*$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}*/
// Retrieve name of table selected
  $name = $_POST["name"];
	$query = "SELECT Restaurant.Name, Reviews.rDescription FROM Restaurant, Reviews WHERE (Restaurant.RestaurantID = Reviews.RestaurantID) AND (Restaurant.Name = '$name')
 ";

 // Check if user input is an actual review
   $check_status = "SELECT Name FROM Restaurant WHERE Name = '$name' "; //Get data from table
   $result_status = mysqli_query($conn, $check_status); //Execute
   if($row_status = mysqli_fetch_assoc($result_status)){ //Checks table data

   }
   else{
     $message_status = "Invalid Restaurant Name";
     echo "<script type='text/javascript'>alert('$message_status');</script>";
     echo "<script type='text/javascript'> document.location = 'listRestaurant.php'; </script>";
   }

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<h1>Table: Reviews </h1>";
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
