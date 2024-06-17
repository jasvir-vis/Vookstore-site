<?php
$con =  mysqli_connect("localhost","root","","vookstore");

session_start();


//email to verify user via OTP

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


    


//php code
if(isset($_POST['register']))
{
    $email_address=$_POST['mail'];
    $email_validate="SELECT * FROM sign_up WHERE email='$email_address'";
    $result=mysqli_query($con,$email_validate);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        echo "<script>alert('user found')</script>";
        $otp=rand(1000,10000000);
        $_SESSION['otp']=$otp;
       
        $mail=new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='vookstore1710@gmail.com';
    $mail->Password='yzpfrofewrrqzffa'; 
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('vookstore1710@gmail.com');
    $mail->addAddress($_POST['mail']);

    $mail->isHTML(true);
    $mail->Subject="Thankyou for visting on vookstore";
    $mail->Body="<b>Dear Sir/Mam</b><br>
    I recieved your request for pasword updation <u> The One Time Password is given below </u><br><br>
    <b> $otp </b>.
    <br>Kindly Use this OTP for Password Updation <br>
    In case It is not requested By you Please Share us details.
    Thanking You,<br>
    <b>Vookstore.com</b><br>
    <b>By Jasvir singh-founder of vookstore</b><br>
    <br> Do not reply this is auto generated mail ";
    
    if($mail->send())
    {
        echo "<script>alert('Successfully send otp on your registred email address')</script>";
        echo ' <script> window.location.href = "otp.php"; </script>';
        


    }

    $insert="UPDATE sign_up SET otp='$otp' WHERE email='$email_address'";
    $result_insert=mysqli_query($con,$insert);
    

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
        <h3 class="c-text text-center">Forget password</h3>
        <label for="labelemail">Email</label>
        <input type="email" name="mail" class="form form-control my-2" placeholder="Enter your mail id">
        <input class="btn btn-dark text-center my-3" type="submit" name="register" value="Register" ></div>
    <div class="d-flex align-items-center left">
        <div>
        <h6 class='text-warning mx-3'>Reset your password</h6>  
        <br>
        <button class="btn but btn-outline-info" id="signup"> <a href="Sign-in.php">Sign in</a></button>    
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

  </body>
</html>