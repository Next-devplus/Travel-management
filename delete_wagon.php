<?php

include("db.php");

if(isset($_GET['ID_WAGON'])) {
  $id = $_GET['ID_WAGON'];
  $query = "DELETE FROM wagon WHERE ID_WAGON = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'wagon  Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: dash.php');
}

?>
