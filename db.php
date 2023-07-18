<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_pfa'
) or die(mysqli_erro($mysqli));

?>
