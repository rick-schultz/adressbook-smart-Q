<?php
session_start();
if (isset($_SESSION['UID'])) {
  header("Location:../pages/dashboard.php");
}
?>

<?php include_once('./components/header.php') ?>

<style>
  <?php include_once('./assets/css/index.css') ?>
</style>


<div class="login-dark text-center lg:w-50">
  <form method="POST" action="./controllers/login.php">
    <div class="mt-2 mb-4">
      <h3 class="">Address Book - Smart-Q</h3>
    </div>
    <div class="form-group mt-3 mb-3"><input class="form-control" type="text" name="username" placeholder="Username"></div>
    <div class="form-group mt-3 mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
    <div class="row mt-3">
      <div class="col-sm-6"><button class="btn btn-primary" type="submit">Log In</button></div>
      <div class="col-sm-6"><button class="btn btn-primary" type="button" onclick="window.location.href='/signup.php'">SignUp</button></div>
    </div>
    <div class="mt-3 mb-1 text-center">
      <p class="">&#169; Rick Schultz</p>
    </div>
  </form>
</div>

<?php include_once('./components/footer.php') ?>