<?php

include('db.php');

if (isset($_POST['save_cfm'])) {

  $NUM_CFM = $_POST['NUM_CFM'];
  $ID_GARE_DEP = $_POST['ID_GARE_DEP'];
  $ID_GARE_ARR = $_POST['ID_GARE_ARR'];
  $ID_LOC = $_POST['ID_LOC'];
  $NUM_CHEF = $_POST['NUM_CHEF'];
  $HEURE_DEP = $_POST['HEURE_DEP'];
  $HEURE_ARR = $_POST['HEURE_ARR'];
  $PERIODE = $_POST['PERIODE'];

  $query = "INSERT INTO `cfm`(`NUM_CFM`, `ID_GARE_DEP`, `ID_GARE_ARR`, `ID_LOC`, `NUM_CHEF`, `HEURE_DEP`, `HEURE_ARR`, `PERIODE`)
  
  
   VALUES ('$$NUM_CFM', '$ID_GARE_DEP', '$ID_GARE_ARR', '$ID_LOC', '$NUM_CHEF', '$HEURE_DEP', '$HEURE_ARR', '$PERIODE')";
  print_r($query);
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'cfm Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: cfm.php');

}

?>
