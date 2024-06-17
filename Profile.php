<?php
session_start();
include "king.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    .profile-container {
        max-width: 600px;
        margin: auto;
    }

    .profile-image {
        max-width: 100%;
        height: auto;
        border-radius: 50%;
    }

    .profile-details {
        /* margin-top: 20px; */
    }

    .bgcover {
        Height: 211px;
        width: 60%;
        /* border: 1px solid black; */
        position: absolute;
        top: 50px;
        margin-left: 20%;
        z-index: -1;
    }

    input[type="file"] {
        display: none;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .file-input-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    .pencil {
        background-color: #f5f5f5;
        padding: 4px 3px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .pencil:hover {
        background-color: orange;
    }



    .pencil::before {
        width: 8px;
        height: 100%;
        left: 50%;
        margin-left: -4px;
    }

    .pencil::after {
        width: 16px;
        height: 30px;
        border-radius: 0 0 8px 8px;
        top: -30px;
        left: 50%;
        margin-left: -8px;
    }
    </style>
</head>

<body>


    <?php
$Con = mysqli_connect("localhost","root","","vookstore");
if($_SESSION['login'] = true){
    if(isset($_POST['update'])){
    $pic = $_FILES['picture']['name'];
    $temp = $_FILES['picture']['tmp_name'];
    $path = "image/".$pic;
    $mail = $_SESSION['mail'];
    $update = "UPDATE `sign_up` set `profile` = '$pic' where `email` = '$mail' ";
    move_uploaded_file($temp,$path);
    $qc = mysqli_query($Con,$update);
    if($qc){
        echo "<script>alert('Your proffile is updated successfully');</script>";
    }
    else{
        echo "<script>alert('Try again later');</script>";
    }
}
     
}
?>


    <?php
        include "connection.php";
        if($_SESSION['login'] = true){
            $mail = $_SESSION['mail'];
        $vis = "SELECT * FROM `sign_up` Where email = '$mail'";
        $que = mysqli_query($conn,$vis);
        while($fetch = mysqli_fetch_array($que)){
        
        ?>
    <div class="text-center mt-5 ">
        <div class="bgcover">
        </div>
        <h1 class="text-center">V O O K S T O R E </h1>
        <img src="image/<?php echo $fetch['profile'] ?>" alt="Profile Image" height='200' width='200'
            style="border-radius: 50%;">
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fileInput" class="pencil">Edit <i class="fa fa-x fa-pencil"></i></label> <button
                class="btn btn-sm btn-primary" type="submit" name="update">update</button>
            <input type="file" name="picture" id="fileInput">
        </form>
    </div>

    <div class="container bg-white profile-container my-2 p-3">
        <div class="profile-details">
            <h2 class="text-center"><?php echo $fetch['name']; ?></h2>
            <p class="text-center text-muted">Welcome</p>
            <a href="Edit-profile.php" class="text-center">
                <h6 class="mb-2">Edit your profile</h6>
            </a>
            <ul class="list-group">
                <li class="list-group-item"><strong>Name:</strong> <?php echo $fetch['name']; ?></li>
                <li class="list-group-item"><strong>Dob:</strong> <?php echo $fetch['dob']; ?></li>
                <li class="list-group-item"><strong>Gender:</strong> <?php echo $fetch['gender']; ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?php echo $fetch['email']; ?></li>
                <li class="list-group-item"><strong>Phone:</strong> <?php echo $fetch['mobile']; ?></li>
            </ul>
        </div>
        <?php
        }
    }
        ?>

        <a href="address.php" class="btn btn-danger my-3">Add new address</a>
        <?php
        include "connection.php";
        if($_SESSION['login'] = true){
            $mail = $_SESSION['mail'];
        $add = "SELECT * FROM `address` Where email = '$mail'";
        $sql = mysqli_query($conn,$add);
        while($row = mysqli_fetch_array($sql)){
                ?>
        <div class="profile-details">
            <h2 class="text-center bg-dark text-white">Address</h2>
            <a href="edit-address.php" class="text-center">
                <h6 class="mb-2">Edit address</h6>
            </a>
            <ul class="list-group">
                <li class="list-group-item"><strong>Email:</strong> <?php echo $row['email']; ?></li>
                <li class="list-group-item"><strong>Location:</strong> <?php echo $row['address']; ?></li>
                <li class="list-group-item"><strong>Country:</strong> <?php echo $row['country']; ?></li>
                <li class="list-group-item"><strong>State:</strong> <?php echo $row['state']; ?></li>
                <li class="list-group-item"><strong>Pin code:</strong> <?php echo $row['zip']; ?></li>
            </ul>
        </div>
        <?php
            }
        }
    else{
        echo '<script> window.location.href = "Sign-in.php";</script>';
    }
        ?>

        <div class="profile-details">
            <h2 class="text-center bg-dark text-white">MY ORDERS</h2>
            <?php
            if($_SESSION['login']=true){
                $m = $_SESSION['mail'];
                $show = "SELECT * FROM `orders` Where email = '$m'";
                $qu = mysqli_query($conn,$show);
                if(mysqli_num_rows($qu)>0){
                while($r = mysqli_fetch_array($qu)){
                    if($r['status']=1){
                    ?>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><?php echo $r['order_id']; ?></td>
                        <td><?php echo $r['title']; ?></td>
                        <td><?php echo $r['quantity']; ?></td>
                        <td><?php echo $r['price']; ?></td>
                    </tr>
                </tbody>
            </table>

            <?php
                    }
                }
            }
                else{
                    echo '<h3 class="text-danger">Your order list is empty.</h3>';
                }
            }

            ?>

        </div>


        <div class="faq my-4 ml-2">
            <h2 class="text-black">FAQ</h2>
            <p><strong class="text-primary ml-2">1.what is your name? Why are you like vookstore?</strong></p>
            <p class="text-muted ml-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae amet deleniti
                eligendi nulla enim nobis! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, consequatur.
            </p>

            <p><strong class="text-primary ml-2">1.what is your name? Why are you like vookstore?</strong></p>
            <p class="text-muted ml-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae amet deleniti
                eligendi nulla enim nobis! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, consequatur.
            </p>

            <p><strong class="text-primary ml-2">1.what is your name? Why are you like vookstore?</strong></p>
            <p class="text-muted ml-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae amet deleniti
                eligendi nulla enim nobis! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, consequatur.
            </p>

            <p><strong class="text-primary ml-2">1.what is your name? Why are you like vookstore?</strong></p>
            <p class="text-muted ml-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae amet deleniti
                eligendi nulla enim nobis! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, consequatur.
            </p>

            <button class="btn btn-primary" id="delete">Delete your account</button>

        </div>
    </div>



    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<?php
include "kong.php";
?>