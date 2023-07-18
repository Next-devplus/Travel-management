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
        <form action="save_cfm.php" method="POST">


          <div class="form-group">
            <input type="text" name="NUM_CFM" class="form-control" placeholder="NUM_CFM" autofocus>
          </div>          
          <div class="form-group">
            <input type="text" name="ID_GARE_DEP" class="form-control" placeholder="	ID_GARE_DEP" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ID_GARE_ARR" class="form-control" placeholder="ID_GARE_ARR	" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ID_LOC" class="form-control" placeholder="ID_LOC" autofocus>
          </div>


          <div class="form-group">
            <input type="text" name="NUM_CHEF" class="form-control" placeholder="NUM_CHEF" autofocus>
          </div>          
          <div class="form-group">
            <input type="date" name="HEURE_DEP" class="form-control" placeholder="HEURE_DEP" autofocus>
          </div>
          <div class="form-group">
            <input type="date" name="HEURE_ARR" class="form-control" placeholder="HEURE_ARR" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="PERIODE" class="form-control" placeholder="PERIODE" autofocus>
          </div>













          <input type="submit" name="save_cfm" class="btn btn-success btn-block" value="Save cfm">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NUM_CFM</th>
            <th>ID_GARE_DEP</th>
            <th>	ID_GARE_ARR</th>
            <th>ID_LOC</th>
             <th>NUM_CHEF</th>



             <th>HEURE_DEP</th>
            <th>	HEURE_ARR</th>
            <th>PERIODE</th>
             <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM cfm";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
             <td><?php echo $row['NUM_CFM']; ?></td>
            <td><?php echo $row['ID_GARE_DEP']; ?></td>
            <td><?php echo $row['ID_GARE_ARR']; ?></td>
            <td><?php echo $row['ID_LOC']; ?></td>

            <td><?php echo $row['NUM_CHEF']; ?></td>
            <td><?php echo $row['HEURE_DEP']; ?></td>
            <td><?php echo $row['HEURE_ARR']; ?></td>
            <td><?php echo $row['PERIODE']; ?></td>


            <td>
              <a href="edit_cfm.php?NUM_CFM=<?php echo $row['NUM_CFM']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_voyage.php?NUM_CFM=<?php echo $row['NUM_CFM']?>" class="btn btn-danger">
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
