<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_voyage.php" method="POST">
          <div class="form-group">
            <input type="text" name="NUMV" class="form-control" placeholder="NUMV" autofocus>
          </div>
           
          
          <div class="form-group">
            <input type="text" name="ID_LOC" class="form-control" placeholder="ID_LOC" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="NUM_MEC" class="form-control" placeholder="NUM_MEC" autofocus>
          </div>
          <div class="form-group">
            <input type="date" name="DATEV" class="form-control" placeholder="DATEV" autofocus>
          </div>





          <input type="submit" name="save_voyage" class="btn btn-success btn-block" value="Save voyage">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NUMV</th>
            <th>ID_LOC</th>
            <th>NUM_MEC</th>
            <th>DATEV</th>
             <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM voyage";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
             <td><?php echo $row['NUMV']; ?></td>
            <td><?php echo $row['ID_LOC']; ?></td>
            <td><?php echo $row['NUM_MEC']; ?></td>
            <td><?php echo $row['DATEV']; ?></td>
            <td>
              <a href="edit_voyage.php?NUMV=<?php echo $row['NUMV']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_voyage.php?NUMV=<?php echo $row['NUMV']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
