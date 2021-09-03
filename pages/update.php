<?php
session_start();
include_once('../config/db.php');
if (!(isset($_SESSION['UID']))) {
  header("Location:/");
}
$usersID = $_SESSION['UID'];
$row = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM persons where users_ID='$usersID'"));
$personsCount = $row[0];
?>

<?php include_once('../components/header.php') ?>

<style>
  <?php include_once('../assets/css/bootstrap.css') ?>
</style>

<div class="container">

  <div class="row">
    <div class="col-sm-12 mt-5">
      <nav class="navbar navbar-expand-lg bg-dark rounded mt-5" style="box-shadow:3px 3px 4px rgba(0,0,0,0.2);">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li><a href="/pages/dashboard.php" class="nav-link active text-white">Home</a></li>
          <li><a href="/pages/add.php" class="nav-link active text-white">Add</a></li>
          <li><a href="/pages/update.php" class="nav-link active text-primary">Update</a></li>
          <li><a href="/pages/info.php" class="nav-link active text-white">Info</a></li>
          <li><a href="/pages/logout.php" class="nav-link active text-white">Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="row mt-2 text-white p-2">
    <div class="col-sm-6">
      <form method="POST" action="/controllers/updating.php">
        <div class="row">
          <?php
          $usersID = $_SESSION['UID'];
          $fetch = mysqli_query($con, "SELECT * FROM persons where users_ID='$usersID'");
          if (mysqli_num_rows($fetch) <= 0) {
            echo '<h3 class="text-center font">No Records Found.</h3>';
          } else {
          ?>
            <div class="col-sm-3">
              <label>Select Person</label>
            </div>
            <div class="form-group col-sm-6">
              <select class="form-control" id="name" name="name">
                <option value=0>Choose...</option>
                <?php
                while ($row = mysqli_fetch_array($fetch)) {
                  echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="col-sm-3">
              <button type="submit" class="btn btn-dark shadow">Select</button>
            </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row text-white p-2">
    <div class="col-sm-6">
      <form method="POST" action="/controllers/update.php">
        <div class="row mb-3">
          <div class="col-sm-3">
            <label>Name</label>
          </div>
          <div class="form-group col-sm-8">
            <input type="text" class="form-control" name="updatefn" id="updatefn" autocomplete="off" />
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Mobile</label>
          </div>
          <div class="form-group col-sm-8">
            <input type="text" class="form-control" name="updatemobile" id="updatemobile" autocomplete="off" />
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Email</label>
          </div>
          <div class="form-group col-sm-8">
            <input type="email" class="form-control" name="updateemail" id="updateemail" autocomplete="off" />
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Permanant Address</label>
          </div>
          <div class="form-group col-sm-8">
            <input type="text" class="form-control" name="updatepermanant" id="updatepermanant" autocomplete="off" />
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Temporary Address</label>
          </div>
          <div class="form-group col-sm-8">
            <input type="text" class="form-control" name="updatetemporary" id="updatetemporary" autocomplete="off" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
          </div>
          <div class="col-sm-7">
            <button type="submit" class="btn btn-dark btn-lg btn-block shadow" id="updateBtn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Update &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
          </div>
      </form>
    </div>
  </div>
<?php } ?>

</div>

<?php include_once('../components/footer.php') ?>