<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']== "POST")
{
    //something was posted
    $username=$_POST['username'];
    $gmail= $_POST['mail'];
    $password= $_POST['pass'];
    

    if(!empty($gmail)&& !empty($password)&& !is_numeric($gmail))
    {

//save to database
        $query= "insert into signup (username,gmail,pass) values ('$username','$gmail','$password')";

        mysqli_query($con,$query);
        header("Location: index.php");
        die;
}
else{
    echo "Please enter some valid information!";
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
    <title>Signup Page</title>
  </head>
  <body>
    <div class="container">
      <div class="container__content">
        <h2>CAREER CATALYST</h2>
        <h3>Welcome!</h3>
        <h1>Sign Up</h1>
        <form method="POST">
            <label for="Username">Username</label>
          <div class="input__row">
            <input type="text" placeholder="Enter Your Username" name="username" required />
          </div>
           
           <label for="email">Email</label>
          <div class="input__row">
            <input type="email" placeholder="Enter Your Email" name="mail" required>
          </div>
          
          <label for="password">Password</label>
          <div class="input__row"> 
            <input type="password" id="password" placeholder="Password" name="pass" required>
            <span id="password-eye"><i class="ri-eye-off-line"></i></span>
          </div>
          <button>SIGNUP</button>
        </form>
        <!-- <h6>or continue with</h6>
        <div class="logins">
          <a href="#"><img src="assets/search.png" alt="google" /></a>
          <a href="#"><img src="assets/github.png" alt="github" /></a>
          <a href="#"><img src="assets/facebook.png" alt="facebook" /></a>
        </div> -->
        <p>Already have an account? <a href="login.php">Login here</a></p>
      </div>
      <div class="container__image">
        <img src="assets/header.png" alt="header" />
      </div>
    </div>

    <script src="main.js"></script>
  </body>
</html>
