<?php
session_start();
/* include('./config/db.php'); */
if (!(isset($_SESSION['UID']))) {
 header("Location:/");
}
?>

<h1>Dashboard</h1>