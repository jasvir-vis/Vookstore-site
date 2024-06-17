<?php
session_start();
?>

<?php
$login = false;
if(isset($_POST['login'])){
  $email =  $_POST['mail'];
  $pass =  $_POST['pass'];
$conn = mysqli_connect("localhost","root","","vookstore");
$q = "SELECT *  From `sign_up` where email = '{$email}' and password = '{$pass}'";
$result = mysqli_query($conn,$q);
$num = mysqli_num_rows($result);

if($num >0 ){
  while($row = mysqli_fetch_assoc($result)){
    if($email = $row['email'] && $pass = $row['password']){
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['mail'] =  $row['email'];
      $_SESSION['mobile'] = $row['mobile'];
      $_SESSION['login'] = true;
      $login = true;
      echo '<script> window.location.href = "index.php" </script>';
    }
    else{
      $login = false;
      echo ' <script> alert("Enter valid email and password") </script>';
    }
  }
}
else{
  echo ' <script> alert("Enter valid mail id") </script>' ;
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
        margin-left: 130px;

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
        <h3 class="c-text text-center">Sign-In</h3>
        <label for="labelemail">Email</label>
        <input type="text" name="mail" class="form form-control my-2" placeholder="Enter your mail id">
        <label for="labelemail">Password</label>
        <input type="password" name="pass" class="form form-control my-2" placeholder="Enter your password">
        <input class="btn btn-dark text-center my-3" type="submit" name="login" value="Sign in" ><span class="ml-3"><a href="Forget-pass.php"> Forget password?</a></span>
        <button class="btn but btn-info" id="signup"> <a href="Sign-up.php">Sign Up</a></button>
      </div>

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

 <script>
    let firstb = document.querySelector("#signin");

    firstb.addEventListener('click', ()=>{
    });


 </script>
  </body>
</html>