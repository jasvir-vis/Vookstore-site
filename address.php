hhhhhh5<?php
session_start();
$con = mysqli_connect("localhost","root","","vookstore");

if(isset($_POST['sub-add'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user = $_POST['user-name'];
    $mail =  $_POST['email'];
    $address = $_POST['address'];
    $address_t =  $_POST['address-2'];
    $country = $_POST['country'];
    $state =  $_POST['state'];
    $zip = $_POST['zip'];

    $q = "insert into `address`(`first_name`,`last_name`,`username`,`email`,`address`,`second_add`,`country`,`state`,`zip`) values('$fname','$lname','$user','$mail','$address','$address_t','$country','$state','$zip') ";
    $result = mysqli_query($con,$q);

    if($result){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['addres'] = true;

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Succesffull!!</strong> Your address is added successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <script> 
  window.location.href = "place-order.php";
  </script> ';
    }

    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Denied!!</strong> check all inputs are fill properly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> ';
    }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Requiredta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="V-book.css">
    <title>Hello, world!</title>
  </head>
  <style>
    .txt{
        font-family: serif;
        font-weight: 600;
        font-size: 34px;
        color: navy;
    }
    body{
        background-color: lightcyan;
    font-family: Georgia, 'Times New Roman', Times, serif;
    }
  </style>
  <body>
   <?php
   include "king.php";
   ?>
</div>
  <div class=" container pt-5 text-center">
    <h1 >Vook-Store</h1>
    <p class="lead text-success">Add your address of the place where you want to place your order.</p>
  </div>
  
  <div class="container d-flex justify-content-center">
  <div class="col-md-8 order-md-1 bg-white">
      <h4 class="mb-3 text-center txt mt-4">ADDRESS</h4>
      <hr>
      <form class="needs-validation" novalidate="" action="" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="fname" placeholder="" value="" required fdprocessedid="iqvaq">
            <div class="invalid-feedback">
              Valid first name is required           </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lname" placeholder="" value="" required fdprocessedid="zdd75h">
            <div class="invalid-feedback">
              Valid last name is required           </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" name="user-name" placeholder="Username" required fdprocessedid="ypyuxl">
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required           </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" fdprocessedid="qq5p9n">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required fdprocessedid="en27vh">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="address-2" id="address2" placeholder="Apartment or suite" fdprocessedid="lg10x">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" name="country" id="country" required fdprocessedid="l2becg">
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" name="state" id="state" required fdprocessedid="gdowq8a">
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" name="zip" id="zip" placeholder="" required fdprocessedid="4btcsf">
            <div class="invalid-feedback">
              Zip code required           </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox mb-5">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">
        <button class="btn btn-danger btn-lg btn-block mb-3" name="sub-add" type="submit" fdprocessedid="ygagw9">Submit</button>
      </form>
    </div>
</div>

<br>

<?php
include "kong.php";
?>