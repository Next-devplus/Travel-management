<?php
include("db.php");

$NUMV = '';
$ID_LOC =  '';
$NUM_MEC =  '';
$DATEV =  '';

if  (isset($_GET['NUMV'])) {
  $NUMV = $_GET['NUMV'];
  $query = "SELECT * FROM voyage WHERE NUMV=$NUMV";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);


     $NUMV = $row['NUMV'];
    $ID_LOC = $row['ID_LOC'];
    $NUM_MEC = $row['NUM_MEC'];
    $DATEV = $row['DATEV'];

    
  }
}

if (isset($_POST['update'])) {
  $NUMV = $_GET['NUMV'];
   

   $ID_LOC = $_POST['ID_LOC'];
  $NUM_MEC = $_POST['NUM_MEC'];
  $DATEV = $_POST['DATEV'];




  $query = "UPDATE voyage set NUMV='$NUMV', ID_LOC = '$ID_LOC',  NUM_MEC='$NUM_MEC',DATEV='$DATEV' WHERE NUMV='$NUMV'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'voyage Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: voyage.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_voyage.php?NUMV=<?php echo $_GET['NUMV']; ?>" method="POST">
        
         



       
           
          <div class="form-group">
            <input type="text" name="NUMV" class="form-control" placeholder="NUMV" value="<?php echo $NUMV; ?>" autofocus>
          </div>
           
          
          <div class="form-group">
            <input type="text" name="ID_LOC" class="form-control" placeholder="ID_LOC"  value="<?php echo $ID_LOC; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="NUM_MEC" class="form-control" placeholder="NUM_MEC" value="<?php echo $NUM_MEC; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="date" name="DATEV" class="form-control" placeholder="DATEV"  value="<?php echo $DATEV; ?>"autofocus>
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
