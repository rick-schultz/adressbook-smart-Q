<?php
$con = mysqli_connect("localhost", "root", "");
if ($con == NULL) {
 echo "Error establishing database connection.";
} else {
 mysqli_select_db($con, "bmcqwd4mvasj4lk4vk4q");
}
