<?php

session_start();
  if (isset($_POST['submit'])) {
    include 'db-inc.php';

		//User inputs
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		//$salt = mysqli_real_escape_string($conn, $_POST['salt']);

		if($username == NULL || $firstname == NULL || $lastname == NULL || $password == NULL){
			$_SESSION['err1'] = "Empty Input! Please enter all the fields";
			//echo "<script type='text/javascript'>alert('$mess1);</script>";
      		header("Location: ../signup.php");
      		exit();
		}
		else if(strlen($password) < 8){ // Make sure password is atleast 8 chars
			$_SESSION['err2'] = "Password is less than 8 characters";
			//echo "<script type='text/javascript'>alert('$_SESSION['err1']');</script>";
			//echo " Password is less than 8 characters";
			header("Location: ../signup.php");
			exit;
		}
		else{
			 /*This statement gets queryed in db*/
			 $sql = "SELECT * FROM User WHERE username='$username'";
			 //Check in db
			 $result = mysqli_query($conn, $sql);
			 if($row = mysqli_fetch_assoc($result)){ // Checks table data
				//$message = "Username already taken";
				$_SESSION['err3'] = "Username already taken";
				//echo "<script type='text/javascript'>alert('$message');</script>";
				//echo "Username already taken";
				header("Location: ../signup.php");
				exit;
			}
			else{
				$query = "INSERT INTO User (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";
	
				if(mysqli_query($conn, $query)){ // This line actually executes insert
					//echo " Record successfully added";
					$_SESSION['err5'] = "Pecord successfully added";
					header("Location: ../signup.php");
					exit;
				}
				else{
					//echo "ERROR: Could not able to execute $query. " . mysqli_error($conn1);
					$_SESSION['err4'] = "Error: Can't connect";
					//echo " ERROR";
					header("Location: ../signup.php");
					exit;
				}
			}	
		}
	}
	else{
		$_SESSION['err6'] = "Normal";
		header("Location: ../signup.php");
		exit();
	}	