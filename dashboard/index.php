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

<div class="container">
 <div class="row">
  <div class="col-sm-10">
   <h1 class="title text-center">Address Book</h1>
   <div class="card">
    <ul class="nav nav-tabs">
     <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
     <li><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add</a></li>
     <li><a href="#update" aria-controls="update" role="tab" data-toggle="tab">Update</a></li>
     <li><a href="#view" aria-controls="view" role="tab" data-toggle="tab">View All</a></li>
     <li><a href="logout/" aria-controls="logout">Logout</a></li>
    </ul>
    <div class="tab-content">
     <!-- Home -->
     <div role="tabpanel" class="tab-pane active" id="home">
      <div class="container">
       <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-5">
         <h4 class="font">Welcome to your address book, <?php echo $_SESSION['First_Name'] . ' ' . $_SESSION['Last_Name']; ?>!</h4>
         <table class="table borderless">
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
        <div class="col-sm-2"></div>

       </div>
      </div>

     </div>

    </div>
   </div>
  </div>
 </div>
</div>

<?php include_once('../components/footer.php') ?>