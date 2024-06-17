<?php
session_start();
if($_SESSION['login'] = true){
}
else{
    header("location: Sign-in.php");
}

?>

<?php
include "king.php";
?>

  <?php
  $con = mysqli_connect("localhost","root","","vookstore");
  $query = "SELECT * FROM `address` where email = '{$_SESSION['mail']}'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);
?>

<div class="container my-5 bg-white p-3">
    <h2 class="c-text text-center py-3">Edit-Address</h2>
<form class="needs-validation" novalidate="" action="" method="post" class="">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="fname" placeholder="" value="<?php echo $row['first_name'];  ?> " required fdprocessedid="iqvaq">
            <div class="invalid-feedback">
              Valid first name is required           </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lname" placeholder="" value="<?php echo $row['last_name'];  ?> " required fdprocessedid="zdd75h">
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
            <input type="text" class="form-control" id="username" name="user-name" value="<?php echo $row['username'];  ?> " placeholder="Username" required fdprocessedid="ypyuxl">
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required           </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email'];  ?> " fdprocessedid="qq5p9n">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['address'];  ?> " required fdprocessedid="en27vh">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="address-2" id="address2" <?php echo $row['second_add'];  ?>  fdprocessedid="lg10x">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" name="country" id="country" required fdprocessedid="l2becg">
              <option value=""><?php echo $row['country'];  ?> </option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" name="state" id="state" required fdprocessedid="gdowq8a">
              <option value=""><?php echo $row['state'];  ?> </option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" name="zip" id="zip" placeholder="" value="<?php echo $row['zip'];  ?> " required fdprocessedid="4btcsf">
            <div class="invalid-feedback">
              Zip code required           </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-danger px-4 mb-3 mx-3" name="update" type="submit" fdprocessedid="ygagw9">update</button>
      </form>
      <a href="address.php" class="ml-3"><button class="btn btn-info px-4" name="cancel" type="submit" fdprocessedid="ygagw9">Cancel</button></a>
    </div>
</div>
</div>
<br>

<?php

if(isset($_POST['update'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user = $_POST['user-name'];
    $mail =  $_POST['email'];
    $address = $_POST['address'];
    $address_t =  $_POST['address-2'];
    $country = $_POST['country'];
    $state =  $_POST['state'];
    $zip = $_POST['zip'];

    $data = "UPDATE `address` set first_name = '$fname',last_name='$lname',username = '$user',email = '$mail',address = '$address',second_add = '$address_t',country = '$country',state = '$state',zip = '$zip'";
    $update = mysqli_query($con,$data);

    if($update){
      echo ' <script> alert("your data is updated successfully") </script>' ;
      echo " <script> window.location.href = 'profile.php'; </script> ";
    }
    else{
    echo ' <script> alert("something error try again") </script>';

    }
}


?>
<?php
include "kong.php";
?>