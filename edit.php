<?php
include("db.php");

$ID_WAGON = '';
    $NUM_CFM = '';
    $POIDS_A_VIDE = '';
    $CHARGE_MAX = '';
    $TYPEW = '';

if  (isset($_GET['ID_WAGON'])) {
  $ID_WAGON = $_GET['ID_WAGON'];
  $query = "SELECT * FROM wagon WHERE ID_WAGON=$ID_WAGON";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);


    $ID_WAGON = $row['ID_WAGON'];
    $NUM_CFM = $row['NUM_CFM'];
    $POIDS_A_VIDE = $row['POIDS_A_VIDE'];
    $CHARGE_MAX = $row['CHARGE_MAX'];
    $TYPEW = $row['TYPEW'];

    
  }
}

if (isset($_POST['update'])) {
  $ID_WAGON = $_GET['ID_WAGONs'];
   

  $ID_WAGON = $_POST['ID_WAGON'];
  $NUM_CFM = $_POST['NUM_CFM'];
  $POIDS_A_VIDE = $_POST['POIDS_A_VIDE'];
  $CHARGE_MAX = $_POST['CHARGE_MAX'];
  $TYPEW = $_POST['TYPEW'];




  $query = "UPDATE wagon set ID_WAGON='$ID_WAGON', NUM_CFM = '$NUM_CFM',  POIDS_A_VIDE='$POIDS_A_VIDE',CHARGE_MAX='$CHARGE_MAX', TYPEW ='$TYPEW' WHERE ID_WAGON='$ID_WAGON'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'wagon Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: dash.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?ID_WAGON=<?php echo $_GET['ID_WAGON']; ?>" method="POST">
        
         



        <div class="form-group">
            <input type="text" name="ID_WAGON" class="form-control" placeholder="ID_WAGON" value="<?php echo $ID_WAGON; ?>" autofocus>
          </div>
           
          <div class="form-group">
            <input type="text" name="NUM_CFM" class="form-control" placeholder="NUM_CFM" value="<?php echo $NUM_CFM; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="POIDS_A_VIDE" class="form-control" placeholder="POIDS_A_VIDE" value="<?php echo $POIDS_A_VIDE; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="CHARGE_MAX" class="form-control" placeholder="CHARGE_MAX" value="<?php echo $CHARGE_MAX; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="TYPEW" class="form-control" placeholder="TYPEW"  value="<?php echo $TYPEW; ?>"autofocus>
          </div>





          




        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
