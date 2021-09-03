<?php
session_start();
if (isset($_SESSION['UID'])) {
  header("Location:/");
}
?>

<?php include_once('./components/header.php') ?>

<style>
  <?php include_once('./assets/css/index.css') ?>
</style>

<div class="login-dark">
  <form method="POST" action="./controllers/signup.php">
    <div class="mt-2 mb-5">
      <h3 class="">Create A New Account</h2>
    </div>
    <div class="form-group mt-3 mb-3">
      <label>First Name</label>
      <input type="text" class="form-control" name="fn" id="fn" autocomplete="off" />
    </div>
    <div class="form-group mt-3 mb-3">
      <label>Last Name</label>
      <input type="text" class="form-control" name="ln" id="ln" autocomplete="off" />
    </div>
    <div class="form-group mt-3 mb-3">
      <label>Choose Username</label>
      <input type="text" class="form-control" name="username" id="username" autocomplete="off" />
    </div>
    <div class="form-group mt-3 mb-3">
      <label>Choose Password</label>
      <input type="password" class="form-control" name="password" id="password" autocomplete="off" />
    </div>

    <div class="row mt-3 mb-3">
      <div class="col-sm-6">
        <input type="submit" value="Register" name="submit" class="btn btn-primary" id="regBtn" />
      </div>
      <div class="col-sm-6">
        <input type="button" value="Back" class="btn btn-primary " id="resetBtn" onclick="window.location.href='/'" />
      </div>
  </form>
</div>

<?php include_once('./components/footer.php') ?>