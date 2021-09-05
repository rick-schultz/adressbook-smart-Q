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
      <li><a href="/pages/add.php" class="nav-link active text-white">Add</a></li>
      <li><a href="/pages/update.php" class="nav-link active text-white">Update</a></li>
      <li><a href="/pages/info.php" class="nav-link active text-primary">Info</a></li>
      <li><a href="/pages/logout.php" class="nav-link active text-white">Logout</a></li>
     </ul>
    </div>
   </nav>
  </div>
 </div>

 <div class="row mt-2 text-white p-2">
  <div class="col-sm-6">
   <table class="table borderless text-white">
    <tr>
     <td>Name</td>
     <td>:</td>
     <td><?php echo $_SESSION['First_Name'] . ' ' . $_SESSION['Last_Name']; ?></td>
    </tr>
    <tr>
     <td>Username</td>
     <td>:</td>
     <td><?php echo $_SESSION['Username']; ?></td>
    </tr>
    <tr>
     <td>Last Login</td>
     <td>:</td>
     <td><?php echo $_SESSION['Last_Login']; ?></td>
    </tr>
    <tr>
     <td>Persons in Address Book</td>
     <td>:</td>
     <td><?php echo $personsCount; ?></td>
    </tr>
   </table>
  </div>
 </div>


 <?php include_once('../components/footer.php') ?>