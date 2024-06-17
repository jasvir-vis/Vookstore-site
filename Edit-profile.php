<?php
session_start();
?>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['mail'];
    $pass = $_POST['pass'];
    $mobile = $_POST['mob'];
    $pic = $_FILES['profile']['name'];
    $temp = $_FILES['profile']['tmp_name'];
    $path = "image/".$pic;
     
    $conn = mysqli_connect("localhost","root","","vookstore");
    move_uploaded_file($temp,$path);
    $data = "insert into `sign_up`(`name`,`email`,`password`,`mobile`,`dob`,`gender`,`profile`) values('$name','$email','$pass','$mobile','$dob','$gender','$pic')";

    $query = mysqli_query($conn,$data);
    if($query){
    echo "<script>alert('Registered successfully.')</script>";
    // echo "<script> window.location.href = 'Sign-in.php'; </script>";
    }
    else{
        echo "<script>alert('something error');</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="V-book.css">
    <title>Edit-profile/in form</title>
</head>
<style>
body {
    background-color: lightyellow;
}

.form {
    width: 350px;
}

.left {
    border: 2px solid purple;
}

label {
    font-family: serif;
    font-size: larger;
    font-weight: 600;
    color: brown;
    margin-left: 10px;
}

.but {
    margin-left: 130px;

}

.s2 {
    display: flex;
    opacity: 1;
    transition: all 1s ease-in-out;
}

.but a {
    text-decoration: none;
    color: white;
}
</style>

<body>
   <?php
   include "connection.php";
   if($_SESSION['login']=true){
    if(isset($_POST['update'])){
    $mail = $_SESSION['mail'];
    $name = $_POST['name'];
    $email = $_POST['mail'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mob'];
    $gender = $_POST['gender'];
    $jj = "UPDATE `sign_up` set name='$name',dob='$dob',gender='$gender',email='$email',mobile='$mobile' where email = '$mail'";
    $dd = mysqli_query($conn,$jj);
    if($dd){
    echo "<script>alert('updated successfully!');</script>";
   }
   else{
    echo "<script>alert('something error');</script>";
   }
   }
}
   ?>


    <?php
    include "connection.php";
    if($_SESSION['login']=true){
    $mail = $_SESSION['mail'];
    $edit = "SELECT * From `sign_up` where email = '$mail'";
    $que = mysqli_query($conn,$edit);
    while($row = mysqli_fetch_array($que)){
        if($_SESSION['mail'] = $row['email'])
        {
    ?>
    <h1 class="text-center c-text my-4">VOokstore</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container s2 justify-content-center p-4">
            <div class="sign-up d-flex bg-dark ">
                <div class=" left bg-light p-3">
                    <h2 class=" text-center">EDIT YOUR PROFILE</h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                                        <label for="labelemail">Name</label>
                    <input type="text" name="name" class="form form-control my-2" placeholder="Full name" value="<?php echo $row['name']; ?>" required>
                    <label for="labelemail">Date of birth</label>
                    <input type="date" name="dob" class="form form-control my-2" placeholder="dob" value="<?php echo $row['dob']; ?>" required>
                    <label for="labelemail">Gender</label>
                    <select name="gender" class="form-control" value="<?php echo $row['gender']; ?>" id="gender">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Trans</option>
                    </select>
</div>
<div class="col-md-6">
                    <label for="labelemail">Email</label>
                    <input type="text" name="mail" class="form form-control my-2" placeholder="Enter your mail id" value="<?php echo $row['email']; ?>" required>
                    <label for="labelemail">Mobile</label>
                    <input type="number" name="mob" class="form form-control my-2" placeholder="Enter available mobile" value="<?php echo $row['mobile']; ?>" required>

</div>
<div class="col-12">
                    <input class="btn btn-dark text-center my-3" type="submit" name="update" value="Update">
</div>
                </div>

            </div>
        </div>
    </form>
<?php
    }
}
}
?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <script>
    let firstb = document.querySelector("#signin");

    firstb.addEventListener('click', () => {});
    </script>
</body>

</html>