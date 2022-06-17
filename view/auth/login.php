<?php
if (!isset($_SESSION)) {
  session_start();
}

  $pageTitle = 'Inloggen';
  include("view/components/header.php"); ?>
    <link rel="stylesheet" href="view/assets/Login.css">

</head>

<body>
  <!-- <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <a href="index.php?con=home&op=home">
          <img src="view/assets/payment/logo.png" alt="IMG">
        </a>
        </div>

        <form class="card card-outline-secondary login100-form validate-form" method="POST" action='index.php?con=auth&op=login'>

          <br><br>
          <div class="row form-group">
            <div class="col-5"></div>
            <div class="col-1"><label for="uname"><b>Username</b></label></div>
            <div class="col-3"><input class="form-control" type="text" placeholder="Enter Username" name="uname" style="width: 50%;" required><br></div>
            <div class="col-3"></div>

            <div class="col-5"></div>
            <div class="col-1"> <label for="psw"><b>Password</b></label></div>
            <div class="col-3"><input class="form-control" type="password" placeholder="Enter Password" name="psw" style="width: 50%;" required><br></div>
            <div class="col-3"></div>
          </div>

          <div class="row">
            <div class="col-5"></div>
            <div class="col-1"><a href=''><button class="btn btn-primary">Registreer</button></a></div>
            <div class="col-3"><button class="btn btn-primary" type="submit">Login</button></div>
            <div class="col-3"></div>
          </div>

        </form>

      </div>
    </div>
  </div> -->

      <div class="content">
      <div class="flex-div">
        <div class="name-content">
          <p>Login here to experience the best blogs.</p>
        </div>
          <form id="formlg" action="index.php?con=auth&op=login" method="POST">
            <input class="form-control" name="uname" type="text" placeholder="Username" required />
            <input class="form-control" name="password" type="password" placeholder="Password" required>
            <button onclick="window.open('index.php?con=auth&op=showregister','_self')" class="login">Log In</button>
            <a href="#">Forgot Password ?</a>
            <hr>          <button onclick='target1()' class="btn btn-success">Create New Account</button>

          </form>

      </div>
    </div>
    <script>
      function target(){
        event.preventDefault();
        
      }
      function target1(){
        event.preventDefault();
        window.open('index.php?con=auth&op=showregister','_self')
      }
      </script>
<?php   include("view/components/footer.php"); ?>