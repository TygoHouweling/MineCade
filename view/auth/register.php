<?php
require 'view/components/header.php'; ?>

    <!-- <form action='index.php?con=auth&op=registreer' method="POST"> 
        
        <div class="row">
            <div class="col-6"><label for="uname"><b>Username</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter Username" name="uname" style="width: 50%;" required><br></div>

            <div class="col-6"><label for="fname"><b>Firstname</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter Firstname" name="fname" style="width: 50%;" required><br></div>

            <div class="col-6"><label for="lname"><b>Lastname</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter Username" name="lname" style="width: 50%;" required><br></div>

            <div class="col-6"><label for="email"><b>Email</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter email" name="email" style="width: 50%;" required><br></div>

            <div class="col-6"> <label for="psw"><b>Password</b></label></div>
            <div class="col-6"><input type="password" placeholder="Enter Password" name="psw" required><br></div>
        </div>

        <button type="submit">Registreer</button>
        
    </form> -->

    <div class="content">
      <div class="flex-div">
        <div class="name-content">
          <p>Register here to join the best blogs makers.</p>
        </div>
          <form action="" method="POST">
            <input class="form-control" type="text" placeholder="Firstname"/>
            <input class="form-control" type="text" placeholder="Lastname"/>
            <input class="form-control" type="text" placeholder="Username"  />
            <input class="form-control" type="text" placeholder="Email"  />
            <input class="form-control"type="password" placeholder="Password" >
            <button onclick='target1()' class="btn btn-success">Create New Account</button>
            <span class="text-center font-weight-bold">or</span>
            <hr>          
            <button onclick="window.open('index.php?con=auth&op=showregister','_self')" class="login">Log In</button>
          </form>

      </div>
    </div>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
.text-center{
    margin-top:15px;
}
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
  margin-top:15px;
  display: flex;
  flex-direction: column;
  background: #fff;
  padding: 2rem;
  width: 530px;
  height: 450px;
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
<?php require 'view/components/footer.php'; ?>