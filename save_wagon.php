<?php

include('db.php');

if (isset($_POST['save_wagon'])) {
  $ID_WAGON = $_POST['ID_WAGON'];
  $NUM_CFM = $_POST['NUM_CFM'];
  $POIDS_A_VIDE = $_POST['POIDS_A_VIDE'];
  $CHARGE_MAX = $_POST['CHARGE_MAX'];
  $TYPEW = $_POST['TYPEW'];
  $query = "INSERT INTO `wagon`(`ID_WAGON`, `NUM_CFM`, `POIDS_A_VIDE`, `CHARGE_MAX`, `TYPEW`) VALUES ('$ID_WAGON', '$NUM_CFM', '$POIDS_A_VIDE', '$CHARGE_MAX', '$TYPEW')";
  print_r($query);
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'wagon Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: dash.php');

}

?>
