<?php

include("db.php");

if(isset($_GET['NUMV'])) {
  $id = $_GET['NUMV'];
  $query = "DELETE FROM voyage WHERE NUMV = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'voyage  Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: voyage.php');
}

?>
