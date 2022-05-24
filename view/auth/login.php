<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  $pageTitle = 'Inloggen';
  include("view/components/header.php"); ?>
    <link rel="stylesheet" href="view/assets/Login.css">

</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <a href="index.php?con=home&op=home">
          <img src="view/assets/payment/logo.png" alt="IMG">
        </a>
        </div>

        <form class="login100-form validate-form" method="POST" action='index.php?con=auth&op=login'>
          <br><br>
        <div class="row">
        <div class="col-6"><label for="uname"><b>Username</b></label></div>
        <div class="col-6"><input type="text" placeholder="Enter Username" name="uname" style="width: 50%;" required><br></div>

        <div class="w-100"></div>
        <div class="col-6"> <label for="psw"><b>Password</b></label></div>
        <div class="col-6"><input type="password" placeholder="Enter Password" name="psw" required><br></div>
        </div>

        <button type="submit">Login</button>
        <button><a href='index.php?con=auth&op=registreer'>Registreer</a></button>
        </form>
      </div>
    </div>
  </div>

  <script>
<?php if(isset($_SESSION['msg'])): ?>
  toastr.info("<?= $this->Display->flash('msg') ?>");
  <?php endif ?>
</script>

</body>

</html>