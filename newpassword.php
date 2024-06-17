<?php
if(isset($_POST['submit'])){
  $pass = $_POST['pass'];
  $con = mysqli_connect("localhost","root","","vookstore");
  $data = "UPDATE sign_up SET password = '$pass'";
  $query = mysqli_query($con,$data);
  // $row = mysqli_fetch_assoc($query);
  if($query){
    echo '<script>
    window.location.href = "Sign-in.php";
     </script>';
  }
  else{
    echo ' <script> alert("password is not set"); </script>';
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link rel="stylesheet" href="V-book.css">
    <title>Sign-up/in form</title>
  </head>
  <style>
    body{
      background-color: lightyellow;
    }
    .form{
        width : 350px;
    }
    .left{
        border: 2px solid purple;
    }
    label{
        font-family: serif;
        font-size: larger;
        font-weight: 600;
        color: brown;
        margin-left: 10px;
    }
    .but{
        margin-left: 50px;

    }
   
    .s2{
        display: flex;
        opacity: 1;
        transition: all 1s ease-in-out;
    }
    .but a{
      text-decoration: none;
      color: white;
    }

  </style>
  <body>    

  <h1 class="text-center c-text my-4">VOokstore</h1>
  <form action="" method="post">
<div class="container s2 justify-content-center p-4">
    <div class="sign-up d-flex bg-dark ">
        <div class=" left bg-light p-3">
        <h3 class="c-text text-center">New password</h3>
        <label for="labelemail">Password</label>
        <input type="text" name="pass" class="form form-control my-2" placeholder="new password">
        <input class="btn btn-dark text-center my-3" type="submit" name="submit" value="submit" ></div>
        <button class="btn but btn-outline-info" id="signup"> <a href="Sign-in.php">Sign in</a></button>    
    </div>
  </div>
  </form>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>