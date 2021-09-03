<?php
include('../config/db.php');
$name = trim($_POST['updatefn']);
$email = trim($_POST['updateemail']);
$mobile = trim($_POST['updatemobile']);
$permanant = trim($_POST['updatepermanant']);
$temporary = trim($_POST['updatetemporary']);
if (strlen($name) > 0 && strlen($mobile) > 0 && strlen($email) > 0 && strlen($permanant) > 0 && strlen($temporary) > 0) {
 mysqli_query($con, "UPDATE persons SET Name='$name', Mobile='$mobile', Permanant_Address='$permanant', Temporary_Address='$temporary' WHERE Email='$email' ");
 if (mysqli_error($con) == "") {
  header('Location:/');
 } else {
  echo '<p style="color: #D8000C;font-weight: bold;">Something Went Wrong, Try Again.</p>';
 }
} else {
 echo '<p style="color: #D8000C;font-weight: bold;">Please Fill All The Details.</p>';
}
