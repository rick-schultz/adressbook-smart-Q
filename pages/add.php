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

<div class="container ">

 <div class="row">
  <div class="col-sm-12 mt-5">
   <nav class="navbar navbar-expand navbar-dark bg-dark rounded mt-5">
    <div class="collapse navbar-collapse">
     <ul class="navbar-nav">
      <li><a href="/pages/dashboard.php" class="nav-link active text-white">Home</a></li>
      <li><a href="/pages/add.php" class="nav-link active text-primary">Add</a></li>
      <li><a href="/pages/update.php" class="nav-link active text-white">Update</a></li>
      <li><a href="/pages/info.php" class="nav-link active text-white">Info</a></li>
      <li><a href="/pages/logout.php" class="nav-link active text-white">Logout</a></li>
     </ul>
    </div>
   </nav>
  </div>
 </div>

 <div class="row mt-2 text-white p-2">
  <div class="col-sm-6">
   <form method="POST" action="/controllers/add.php">
    <div class="row mb-3">
     <div class="col-sm-3">
      <label>Name</label>
     </div>
     <div class="form-group col-sm-8">
      <input type="text" class="form-control" name="fn" id="fn" autocomplete="off" />
     </div>
    </div>
    <div class="row mt-3 mb-3">
     <div class="col-sm-3">
      <label>Mobile</label>
     </div>
     <div class="form-group col-sm-8">
      <input type="text" class="form-control" name="mobile" id="mobile" autocomplete="off" />
     </div>
    </div>
    <div class="row mt-3 mb-3">
     <div class="col-sm-3">
      <label>Email</label>
     </div>
     <div class="form-group col-sm-8">
      <input type="email" class="form-control" name="email" id="email" autocomplete="off" />
     </div>
    </div>
    <div class="row mt-3 mb-3">
     <div class="col-sm-3">
      <label>Address</label>
     </div>
     <div class="form-group col-sm-8">
      <input type="text" class="form-control" name="permanant" id="permanant" autocomplete="off" />
     </div>
    </div>
    <div class="row mt-3 mb-3">
     <div class="col-sm-3">
      <label>Postal Code</label>
     </div>
     <div class="form-group col-sm-8">
      <input type="text" class="form-control" name="temporary" id="temporary" autocomplete="off" />
     </div>
    </div>
    <div class="row">
     <div class="col-sm-5">
     </div>
     <div class="col-sm-7">
      <button type="submit" class="btn btn-dark btn-lg btn-block shadow" id="addBtn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
     </div>
    </div>
   </form>
  </div>
 </div>


 <?php include_once('../components/footer.php') ?>