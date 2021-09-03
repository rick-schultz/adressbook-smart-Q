<?php
$con = mysqli_connect("bmcqwd4mvasj4lk4vk4q-mysql.services.clever-cloud.com", "u6qdlkuzhnaipicv", "BNtvFARKrbOw3VNCCGMi");
if ($con == NULL) {
 echo "Error establishing database connection.";
} else {
 mysqli_select_db($con, "bmcqwd4mvasj4lk4vk4q");
}
