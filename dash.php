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
        <form action="save_wagon.php" method="POST">
          <div class="form-group">
            <input type="text" name="ID_WAGON" class="form-control" placeholder="ID_WAGON" autofocus>
          </div>
           
          <div class="form-group">
            <input type="text" name="NUM_CFM" class="form-control" placeholder="NUM_CFM" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="	POIDS_A_VIDE" class="form-control" placeholder="POIDS_A_VIDE" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="CHARGE_MAX" class="form-control" placeholder="CHARGE_MAX" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="TYPEW" class="form-control" placeholder="TYPEW" autofocus>
          </div>





          <input type="submit" name="save_wagon" class="btn btn-success btn-block" value="Save wagon">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id Wagon</th>
            <th>CFM</th>
            <th>Poid Vide</th>
            <th>Charge Max</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM wagon";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['ID_WAGON']; ?></td>
            <td><?php echo $row['NUM_CFM']; ?></td>
            <td><?php echo $row['POIDS_A_VIDE']; ?></td>
            <td><?php echo $row['CHARGE_MAX']; ?></td>
            <td><?php echo $row['TYPEW']; ?></td>
            <td>
              <a href="edit.php?ID_WAGON=<?php echo $row['ID_WAGON']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_wagon.php?ID_WAGON=<?php echo $row['ID_WAGON']?>" class="btn btn-danger">
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
