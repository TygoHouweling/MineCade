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
          <form action="" method="POST">
            <input class="form-control" type="text" placeholder="Email"  />
            <input class="form-control"type="password" placeholder="Password" >
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
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Poppins", sans-serif;
  background: #f2f4f7;
}

.content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.flex-div {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}

.name-content {
  margin-right: 7rem;
}

.name-content .logo {
  font-size: 3.5rem;
  color: #1877f2;
}

.name-content p {
  font-size: 1.3rem;
  font-weight: 500;
  margin-bottom: 5rem;
}

form {
  display: flex;
  flex-direction: column;
  background: #fff;
  padding: 2rem;
  width: 530px;
  height: 380px;
  border-radius: 0.5rem;
  box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
}

form input {
  outline: none;
  padding: 0.8rem 1rem;
  margin-bottom: 0.8rem;
  font-size: 1.1rem;
}

form input:focus {
  border: 1.8px solid #1877f2;
}

form .login {
  outline: none;
  border: none;
  background: #1877f2;
  padding: 0.8rem 1rem;
  border-radius: 0.4rem;
  font-size: 1.1rem;
  color: #fff;
}

form .login:hover {
  background: #0f71f1;
  cursor: pointer;
}

form a {
  text-decoration: none;
  text-align: center;
  font-size: 1rem;
  padding-top: 0.8rem;
  color: #1877f2;
}

form hr {
  background: #f7f7f7;
  margin: 1rem;
}

form .create-account {
  outline: none;
  border: none;
  background: #06b909;
  padding: 0.8rem 1rem;
  border-radius: 0.4rem;
  font-size: 1.1rem;
  color: #fff;
  width: 75%;
  margin: 0 auto;
}

form .create-account:hover {
  background: #03ad06;
  cursor: pointer;
}

/* //.........Media Query.........// */

@media (max-width: 500px) {
  html {
    font-size: 60%;
  }

  .name-content {
    margin: 0;
    text-align: center;
  }

  form {
    width: 300px;
    height: fit-content;
  }

  form input {
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  form .login {
    font-size: 1.5rem;
  }

  form a {
    font-size: 1.5rem;
  }

  form .create-account {
    font-size: 1.5rem;
  }

  .flex-div {
    display: flex;
    flex-direction: column;
  }
}

@media (min-width: 501px) and (max-width: 768px) {
  html {
    font-size: 60%;
  }

  .name-content {
    margin: 0;
    text-align: center;
  }

  form {
    width: 300px;
    height: fit-content;
  }

  form input {
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  form .login {
    font-size: 1.5rem;
  }

  form a {
    font-size: 1.5rem;
  }

  form .create-account {
    font-size: 1.5rem;
  }

  .flex-div {
    display: flex;
    flex-direction: column;
  }
}

@media (min-width: 769px) and (max-width: 1200px) {
  html {
    font-size: 60%;
  }

  .name-content {
    margin: 0;
    text-align: center;
  }

  form {
    width: 300px;
    height: fit-content;
  }

  form input {
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  form .login {
    font-size: 1.5rem;
  }

  form a {
    font-size: 1.5rem;
  }

  form .create-account {
    font-size: 1.5rem;
  }

  .flex-div {
    display: flex;
    flex-direction: column;
  }

  @media (orientation: landscape) and (max-height: 500px) {
    .header {
      height: 90vmax;
    }
  }  
}

</style>

<?php   include("view/components/footer.php"); ?>