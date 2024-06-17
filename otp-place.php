<?php
$con = mysqli_connect("localhost","root","","vookstore");
session_start();
// echo $_SESSION['otp'];
// $otp=$_SESSION['otp'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate OTP | WOW</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="forgot_pass.css">
</head>
<style>
    body{
        background: lightyellow;
    }
    .wrapper{
        background-color: lightyellow;
    }
    form{
      background: lightcyan;
    }
    .c-text{
        font-family: serif;
        font-weight: 600;
        font-size: 34px;

    }
    .vook{
    color: rebeccapurple;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: 600;
    font-size: 35px;
  }
</style>
<body>


<section class="wrapper mt-6">
        <div class="container">
            <h3 class="text-center text-primary my-5 vook">Vookstore</h3>
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4  my-5 offset-xl-4 text-center">
                <form action="" method="POST" class="rounded  shadow p-5">
                    <h3 class=" c-text fs-4 mb-2">Validate OTP</h3>
                    <div class="fw-normal text-muted mb-4">
                       Enter OTP recieved on your Registred Email Address
                    </div>
                    <label for="floatingInput">OTP</label>
                    <input type="text" name="user_otp" class=" form form-control" id="floatingInput">
                    
                
                <button type="submit"  name="validate_otp" class=" btn btn-dark submit_btn my-4">Submit</button>
                <button type="submit" class=" btn btn-secondary  submit_btn  my-4 ms-3" ><a href="Forget-pass.php" class="text text-light text-decoration-none">Cancel</a></button>
                
                </form>

            </div>
        </div>
    </section>
    <?php

if(isset($_POST["validate_otp"])){
    $user_otp = $_POST["user_otp"];
    if($user_otp== $_SESSION['otp'])
    {
        echo "<script>alert('OTP Validated Successfully')</script>";
       echo "<script> window.location.href = 'orders.php';</script>";
       
        }
        else{
          echo "<script>alert('Invalid OTP entred or try to get new One')</script>";
        echo "<script>window.open('place-order.php','_self')</script>";
        }
    }

?>
</body>
</html>