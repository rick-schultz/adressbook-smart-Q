<?php
include('../config/db.php');
$email = $_POST['name'];
$res = mysqli_query($con, "SELECT * FROM persons WHERE Name='$email' ");
$array = mysqli_fetch_row($res);

session_start();
if (!(isset($_SESSION['UID']))) {
  header("Location:/");
}
$usersID = $_SESSION['UID'];
$row = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM persons where users_ID='$usersID'"));
$personsCount = $row[0];
$result = $array;
?>

<?php include_once('../components/header.php') ?>

<div class="container">

  <div class="row">
    <div class="col-sm-12 mt-5">
      <nav class="navbar navbar-expand navbar-dark bg-dark rounded mt-5">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li><a href="/pages/dashboard.php" class="nav-link active text-white">Home</a></li>
            <li><a href="/pages/add.php" class="nav-link active text-white">Add</a></li>
            <li><a href="/pages/update.php" class="nav-link active text-primary">Update</a></li>
            <li><a href="/pages/info.php" class="nav-link active text-white">Info</a></li>
            <li><a href="/pages/logout.php" class="nav-link active text-white">Logout</a></li>
          </ul>
        </div>
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
            <?php echo '<input type="text" class="form-control" name="updatefn" id="updatefn" autocomplete="off" value="' . $array[1] . '">'; ?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Mobile</label>
          </div>
          <div class="form-group col-sm-8">
            <?php echo '<input type="text" class="form-control" name="updatemobile" id="updatemobile" autocomplete="off" value="' . $array[2] . '">'; ?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Email</label>
          </div>
          <div class="form-group col-sm-8">
            <?php echo '<input type="email" class="form-control" name="updateemail" id="updateemail" autocomplete="off" value="' . $array[3] . '">'; ?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Address</label>
          </div>
          <div class="form-group col-sm-8">
            <?php echo '<input type="text" class="form-control" name="updatepermanant" id="updatepermanant" autocomplete="off" value="' . $array[4] . '">'; ?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-3">
            <label>Postal Code</label>
          </div>
          <div class="form-group col-sm-8">
            <?php echo '<input type="text" class="form-control" name="updatetemporary" id="updatetemporary" autocomplete="off" value="' . $array[5] . '">'; ?>
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