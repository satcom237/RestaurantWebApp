<?php
  session_start();
  include_once 'header.php';

// Change the value of $dbuser and $dbpass to your username and password
	include 'includes/db-inc.php';

  $u_name = $_SESSION["username"];
  $c_name = $_POST["c_name"];

// Check if user input is an actual restaurant
  $check_status = "SELECT RestaurantName FROM Coupon WHERE RestaurantName = '$c_name' "; //Get data from table
  $result_status = mysqli_query($conn, $check_status); //Execute
  if($row_status = mysqli_fetch_assoc($result_status)){ //Checks table data

  }
  else{
    $message_status = "Invalid Restaurant";
    echo "<script type='text/javascript'>alert('$message_status');</script>";
    echo "<script type='text/javascript'> document.location = 'listCoupon.php'; </script>";
    //header("Location: ../listCoupon.php");
    //exit();
  }


// Get couponID and UserID
  /*$query3 = "SET @v1 = (SELECT UserID FROM User WHERE Username = 'jason23');
          SET @v2 = (SELECT CouponID FROM Coupon WHERE RestaurantName = 'abhiruchi');
          INSERT INTO Redeem (UserID, CouponID, NumRedeemed)
          VALUES(@v1, @v2, 1)";
  $result3 = mysqli_query($conn, $query3);
  if (!$result3) {
    die("Query to show fields from table failed");
  }*/

  $query = "SELECT UserID FROM User WHERE Username = '$u_name' ";
  $result1 = mysqli_query($conn, $query);
  if (!$result1) {
    die("Query to show fields from table failed!!!!!!!!!!");
  }
  while($row = mysqli_fetch_row($result1)) {
    foreach($row as $u_id)
      echo "</tr>\n";
  }

  //echo "<h1> $u_id </h1>";

  $querya = "SELECT CouponID FROM Coupon WHERE RestaurantName = '$c_name' ";
  $resulta = mysqli_query($conn, $querya);
  if (!$resulta) {
    die("Query to show fields from table failed!!!!!!!!!!");
  }
  while($rowa = mysqli_fetch_row($resulta)) {
    foreach($rowa as $c_id)
      echo "</tr>\n";
  }

  //echo "<h1> $c_id </h1>";

// Check if user is in db
  $check = "SELECT UserID FROM Redeem WHERE UserID = '$u_id' AND
    CouponID = '$c_id' "; //Get data from table
  $resultb = mysqli_query($conn, $check); //Execute
  if($rowb = mysqli_fetch_assoc($resultb)){ //Checks table data
    $message = "User exists";
    //echo "<script type='text/javascript'>alert('$message');</script>";
      // Update NumRedeemed, if not insert new user to update NumRedeemed
      $update_query = "UPDATE Redeem r
      INNER JOIN User u ON
        r.UserID = u.UserID
      INNER JOIN Coupon c ON
        r.CouponID = c.CouponID
      SET r.NumRedeemed = (r.NumRedeemed + 1)
      WHERE u.Username = '$u_name' AND c.RestaurantName = '$c_name' ";

      $result = mysqli_query($conn, $update_query);
    	if (!$result) {
    		die("Query to show fields from table failed");
    	}
  }
  else{
    $message = "User does not exist";
    //echo "<script type='text/javascript'>alert('$message');</script>";
      // Update NumRedeemed, if not insert new user to update NumRedeemed
      $insert_query = "INSERT INTO Redeem(UserID, CouponID, NumRedeemed) VALUES ('$u_id','$c_id',1) ";
      $resulti = mysqli_query($conn, $insert_query);
    	if (!$resulti) {
    		die("Query to show fields from table failed");
    	}
  }


// Print User's coupons table
    $queryp = "SELECT RestaurantName, NumRedeemed
      FROM Redeem, User, Coupon
      WHERE Redeem.UserID = User.UserID AND Redeem.CouponID = Coupon.CouponID AND
      User.Username = '$u_name' ";

    $resultp = mysqli_query($conn, $queryp);
  	if (!$resultp) {
  		die("Query to show fields from table failed");
  	}

    // get number of columns in table
    	$fields_nump = mysqli_num_fields($resultp);
    	echo "<h1>Table: Coupons </h1>";
    	echo "<table border='1'><tr>";

    // printing table headers
    	for($i=0; $i<$fields_nump; $i++) {
    		$fieldp = mysqli_fetch_field($resultp);
    		echo "<td><b>$fieldp->name</b></td>";
    	}
    	echo "</tr>\n";
    	while($rowp = mysqli_fetch_row($resultp)) {
    		echo "<tr>";
    		// $row is array... foreach( .. ) puts every element
    		// of $row to $cell variable
    		foreach($rowp as $cellp)
    			echo "<td>$cellp</td>";
    		echo "</tr>\n";
    	}


  mysqli_free_result($result);
  mysqli_free_result($result1);
  mysqli_free_result($result2);
  mysqli_close($conn);
  include_once 'footer.php';
?>
