<?php

  session_start();

  if (isset($_POST['submit'])){
    //include 'db-inc.php';

    $saladNum = $_POST['Salad'];
    echo $saladNum;

    $friesNum = $_POST['Fries'];
    echo $friesNum;

    $sodaNum = $_POST['Soda'];
    echo $sodaNum;


  }
?>
