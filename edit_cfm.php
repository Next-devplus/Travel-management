<?php
include("db.php");

$NUM_CFM ='' ;
$ID_GARE_DEP ='' ;
$ID_GARE_ARR = '' ;
$ID_LOC = '' ;
$NUM_CHEF = '' ;
$HEURE_DEP = '' ;
$HEURE_ARR = '' ;
$PERIODE = '' ;

if  (isset($_GET['NUM_CFM'])) {
  $NUM_CFM = $_GET['NUM_CFM'];
  $query = "SELECT * FROM cfm WHERE NUM_CFM=$NUM_CFM";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);


      $NUM_CFM = $row['NUM_CFM'];
     $ID_GARE_DEP = $row['ID_GARE_DEP'];
     $ID_GARE_ARR = $row['ID_GARE_ARR'];
     $ID_LOC = $row['ID_LOC'];
     $NUM_CHEF = $row['NUM_CHEF'];
     $HEURE_DEP = $row['HEURE_DEP'];
     $HEURE_ARR = $row['HEURE_ARR'];
     $PERIODE = $row['PERIODE'];

    
  }
}

if (isset($_POST['update'])) {
  $NUM_CFM = $_GET['NUM_CFM'];
   

   $ID_GARE_DEP = $_POST['ID_GARE_DEP'];
  $ID_GARE_ARR = $_POST['ID_GARE_ARR'];
  $ID_LOC = $_POST['ID_LOC'];
  $NUM_CHEF = $_POST['NUM_CHEF'];
  $HEURE_DEP = $_POST['HEURE_DEP'];
  $HEURE_ARR = $_POST['HEURE_ARR'];
  $PERIODE = $_POST['PERIODE'];



  $query = "UPDATE cfm set NUM_CFM='$NUM_CFM', ID_GARE_DEP = '$ID_GARE_DEP', ID_GARE_ARR='$ID_GARE_ARR',ID_LOC='$ID_LOC',NUM_CHEF='$NUM_CHEF', HEURE_DEP = '$HEURE_DEP',  HEURE_ARR='$HEURE_ARR',PERIODE='$PERIODE' WHERE NUM_CFM='$NUM_CFM'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'CFM Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: cfm.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_cfm.php?NUM_CFM=<?php echo $_GET['NUM_CFM']; ?>" method="POST">
        
         



      
          
          <div class="form-group">
            <input type="text" name="NUM_CFM" class="form-control" placeholder="NUM_CFM" value="<?php echo $NUM_CFM; ?>" autofocus>
          </div>          
          <div class="form-group">
            <input type="text" name="ID_GARE_DEP" class="form-control" placeholder="	ID_GARE_DEP"  value="<?php echo $ID_GARE_DEP; ?>"autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ID_GARE_ARR" class="form-control" placeholder="ID_GARE_ARR	" value="<?php echo $ID_GARE_ARR; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ID_LOC" class="form-control" placeholder="ID_LOC"  value="<?php echo $ID_LOC; ?>" autofocus>
          </div>


          <div class="form-group">
            <input type="text" name="NUM_CHEF" class="form-control" placeholder="NUM_CHEF"  value="<?php echo $NUM_CHEF; ?>"autofocus>
          </div>          
          <div class="form-group">
            <input type="date" name="HEURE_DEP" class="form-control" placeholder="HEURE_DEP"  value="<?php echo $HEURE_DEP; ?>"autofocus>
          </div>
          <div class="form-group">
            <input type="date" name="HEURE_ARR" class="form-control" placeholder="HEURE_ARR"  value="<?php echo $HEURE_ARR; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="PERIODE" class="form-control" placeholder="PERIODE"  value="<?php echo $PERIODE; ?>" autofocus>
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
