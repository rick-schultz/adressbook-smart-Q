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
  <?php include_once('../assets/css/bootstrap.css') ?><?php include_once('../assets/css/index.css') ?>
</style>

<div class="container ">
  <div class="row justify-content-center">
    <div class="col-sm-12 mt-5">
      <nav class="navbar navbar-expand-lg bg-dark rounded mt-5" style="box-shadow:3px 3px 4px rgba(0,0,0,0.2);">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li><a href="/pages/dashboard/" class="nav-link active text-primary">Home</a></li>
          <li><a href="/pages/add/" class="nav-link active text-white">Add</a></li>
          <li><a href="/pages/update/" class="nav-link active text-white">Update</a></li>
          <li><a href="/pages/info/" class="nav-link active text-white">Info</a></li>
          <li><a href="/pages/logout.php" class="nav-link active text-white">Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <table class="table table-condensed table-responsive text-white mt-2">
    <div class="mt-3 mb-3">
      <h4 class="font text-black-50">Welcome to your address book, <?php echo $_SESSION['First_Name'] . ' ' . $_SESSION['Last_Name']; ?>!</h4>
    </div>
    <thead>
      <tr class="text-black-50">
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Permanent Address</th>
        <th>Temporary Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $usersID = $_SESSION['UID'];
      $res = mysqli_query($con, "SELECT * FROM persons where users_ID='$usersID'");
      while ($row = mysqli_fetch_array($res)) {
        echo '<tr id="' . $row['ID'] . '">
						<td>' . $row['Name'] . '</td>
						<td>' . $row['Mobile'] . '</td>
						<td>' . $row['Email'] . '</td>
						<td style="word-wrap:break-word;">' . $row['Permanant_Address'] . '</td>
						<td>' . $row['Temporary_Address'] . '</td>
						<td><button class="btn btn-dark shadow" id="' . $row['ID'] . '">Remove</button></td>
					  </tr>';
      }
      ?>
    </tbody>
  </table>

</div>


<?php include_once('../components/footer.php') ?>