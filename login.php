<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']== "POST")
{
    //something was posted
    
    $gmail= $_POST['mail'];
    $password= $_POST['pass'];

    if(!empty($gmail)&& !empty($password)&& !is_numeric($gmail))
    {

//read from database
        $query= ("Select * from signup where gmail= '$gmail' limit 1");
        $result = mysqli_query($con,$query);

       if($result)
       {
        if($result && mysqli_num_rows($result)>0)
          {
             $user_data= mysqli_fetch_assoc($result);
             if($user_data['pass']==$password)
                {
                   $_SESSION['gmail']= $user_data['gmail'];
                   header("Location: index.php");
                   die;
              } 
          }
        }
        echo "Wrong Email or Password!";
       
      }
else{
    echo "Wrong Email or Password!";
}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <title>Login Page</title>
  </head>
  <body>
    <div class="container">
      <div class="container__content">
        <h2>CAREER CATALYST</h2>
        <h3>Welcome back!</h3>
        <h1>Log In</h1>
        <form method="POST">
          <label for="email">Email</label>
          <div class="input__row">
            <input type="email" placeholder="Enter Your Email" name="mail" required >
          </div>
          <div class="input__header">
            <label for="password">Password</label>
            <a href="#">Forgot Password?</a>
          </div>
          <div class="input__row">
            <input type="password" id="password" placeholder="Password" name="pass" required >
            <span id="password-eye"><i class="ri-eye-off-line"></i></span>
          </div>
          <button>LOGIN</button>
        </form>
        <!-- <h6>or continue with</h6>
        <div class="logins">
          <a href="#"><img src="assets/search.png" alt="google" /></a>
          <a href="#"><img src="assets/github.png" alt="github" /></a>
          <a href="#"><img src="assets/facebook.png" alt="facebook" /></a>
        </div> -->
        <p>Don't have an account yet? <a href="signup.php">Sign up for free</a></p>
      </div>
      <div class="container__image">
        <img src="assets/header.png" alt="header" />
      </div>
    </div>

    <script src="main.js"></script>
  </body>
</html>
