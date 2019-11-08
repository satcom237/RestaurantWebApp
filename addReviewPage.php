<?php
  session_start();
  include_once 'header.php';
// change the value of $dbuser and $dbpass to your username and password
	include 'includes/db-inc.php';

  $_SESSION['r'] = $_POST['rName'];
  $r_name = $_POST['rName'];
  echo "<h1> $r_name | Review </h1>";

  echo '<br><form class="search" action="addReview.php" method="post">
        Enter Review: <input type="text" name="addReview" placeholder="Enter Review Here..."><br>
        <input type="submit">
        </form></br>';

        // Check if user input is an actual restaurant
          $check_status = "SELECT Name FROM Restaurant WHERE Name = '$r_name' "; //Get data from table
          $result_status = mysqli_query($conn, $check_status); //Execute
          if($row_status = mysqli_fetch_assoc($result_status)){ //Checks table data

          }
          else{
            $message_status = "Invalid Restaurant";
            echo "<script type='text/javascript'>alert('$message_status');</script>";
            echo "<script type='text/javascript'> document.location = 'myReviews.php'; </script>";
            //header("Location: ../listCoupon.php");
            //exit();
          }

  include_once 'footer.php';

  ?>
