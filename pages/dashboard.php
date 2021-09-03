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

<div class="container ">
 <div class="row justify-content-center">
  <div class="col-sm-6 mt-5">
   <nav class="navbar navbar-expand-lg bg-dark rounded mt-5" style="box-shadow:3px 3px 4px rgba(0,0,0,0.2);">
    <ul class="navbar-nav mb-2 mb-lg-0">
     <li><a href="/pages/dashboard/" class="nav-link active text-primary">Home</a></li>
     <li><a href="/pages/add/" class="nav-link active text-white">Add</a></li>
     <li><a href="/pages/update/" class="nav-link active text-white">Update</a></li>
     <li><a href="/pages/view/" class="nav-link active text-white">View All</a></li>
     <li><a href="/pages/logout.php" class="nav-link active text-white">Logout</a></li>
    </ul>
   </nav>
  </div>
 </div>
 <div class="row mt-2 justify-content-center text-white p-2">
  <div class="col-sm-6">
   <h4 class="font">Welcome to your address book, <?php echo $_SESSION['First_Name'] . ' ' . $_SESSION['Last_Name']; ?>!</h4>
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