<?php

session_start();

if (isset($_POST['submit'])){
    include 'db-inc.php';

    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);

    /*Check if inputs are empty*/
    if (!isset($username) || !isset($password)){
      echo "Empty Input";
      header("Location: ../index.php?login==emptyinput");
      exit();
    }
    else{
      $sql = "SELECT * FROM User WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      //error message username
      if($resultCheck < 1){
        $message_status = "Wrong Username!";
        echo "<script type='text/javascript'>alert('$message_status');</script>";
        echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
      }
      else{
        if($row = mysqli_fetch_assoc($result)){
          //username exists build second salt query
          //$salt = $row['salt'];
          $saltsql = "SELECT username FROM User WHERE username='$username' AND password='$password'";
          $finalresult = mysqli_query($conn, $saltsql);
          if($finalrow = mysqli_fetch_assoc($finalresult)){
            /*Login successful - login user*/
            $_SESSION['username'] = $finalrow['username'];
            $_SESSION['firstname'] = $finalrow['firstName'];
            $_SESSION['lastname'] = $finalrow['lastName'];
            //$_SESSION['superhero'] = $username;
            header("Location: ../index.php?login==success");
            exit();
          }
          //Error message
          else{
            $message_status = "Wrong Password!";
            echo "<script type='text/javascript'>alert('$message_status');</script>";
            echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
          }
        }
      }
    }
  }
  else{
    header("Location: ../index.php?login==error");
    exit();
  }
