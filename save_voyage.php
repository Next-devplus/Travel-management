<?php

include('db.php');

if (isset($_POST['save_voyage'])) {
   $NUMV = $_POST['NUMV'];
  $ID_LOC = $_POST['ID_LOC'];
  $NUM_MEC = $_POST['NUM_MEC'];
  $DATEV = $_POST['DATEV'];
  $query = "INSERT INTO `voyage`(`NUMV`, `ID_LOC`, `NUM_MEC`,`DATEV`) VALUES ('$NUMV','$ID_LOC','$NUM_MEC','$DATEV')";
  print_r($query);
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'voyage Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: voyage.php');

}

?>
