<?php
session_start();
include "king.php";
?>
<div class="container">
    <h1 class="text-danger text-center my-4 bg-white">ORDER DETAILS</h1>


    <div class="jumbotron">
    <h2 class="">Welcome </h2>
    <p class="lead">Thanks for choosing vookstore.Your order is confirmed and it is delivered soon. <br>
    Your order details are</p>
<?php
include "connection.php";
if(isset($_SESSION['login']) && $_SESSION['login']=true){   
$q = "SELECT * FROM `orders`";
$result = mysqli_query($conn,$q);
$num = mysqli_num_rows($result);
while($row = mysqli_fetch_array($result))
{
if($_SESSION['mail'] = $row['email'] )
{
    ?>      <div class="row bg-white p-3 mb-2">
            <div class="col-md-3 p-1">
             <?php echo "<img src='images/{$row['image']}' class='ml-4' width='120' height='170'>"; ?>
            </div>
            <div class="col-md-4 p-1">  
                <h5 class='text-center bg-dark text-white p-1'>order detail</h5>
             <p class='text-secondary'>Order id : <?php echo $row['order_id']; ?></p>
             <p class='text-black'> Name -<?php echo $_SESSION['name']; ?> <br>
            Item name - <?php echo $row['title'];  ?> <br> quantity - <?php echo $row['quantity']; ?> <br> Price - rs.<?php echo $row['price']; ?> </p>
            </div>
            <div class="col-md-5 p-1">
             <?php
             $tab = "SELECT * from `address` where email = '{$row['email']}'";
             $new = mysqli_query($conn,$tab);
             while($lease = mysqli_fetch_array($new)){
                if($_SESSION['mail'] = $lease['email']){
                    echo "<h5 class='text-center text-white bg-dark p-1'>Address</h5>
                    <p class='text-black'> {$lease['username']} <br>{$lease['address']}  <br> {$lease['country']}
                    <br> {$lease['state']} <br> {$lease['zip']}</p> 
                    <form action='cart-session.php' method='post'>
                    <button class='btn btn-danger mx-2' type='submit' name='placed'>Deliver</button>
                    <button class='btn btn-primary mx-2' type='submit' name='cancel' id='cancel'>cancel</button>
                    <input type='hidden' name='cancel-id' value='{$row['order_id']}'>
                    </form>
                    ";
                    

                if($row['status'] == 1){
                    echo "<span class='text-info'>Your order is succesfully delivered</span>";
                    echo "<script> let id = document.querySelector('#cancel');
                    id.style.display = 'none'; </script>";
                }

                }
             }
             ?>
<!-- for  cancel order php -->
<?php

?>




</div>
</div>

            <?php
                }
            
}
}
else{
    echo '<script> window.location.href = "Sign-in.php";</script>';
}
?>

    <hr class="my-4">
    <p>Thanks for trusting on vookstore.I wish you don't face any problem by vookstore team.</p>
    <a class="btn btn-primary btn-lg" href="V-book.php" role="button">Go to home</a>
</div>

    <div class="card py-5">
        <!-- <div class="row">
            <div class="col-md-3">
             <?php echo "<img src='images/{$row['image']}' class='ml-4' width='200' height='300'>"; ?>
            </div>
            <div class="col-md-4">
             <h4 class='text-secondary'>Order id : <?php echo $row['order_id']; ?></h4>
             <h4 class='text-black'> Name -<?php echo $_SESSION['name']; ?></h4>
             <h4 class='text-black'>Email -<?php echo $row['email']; ?></h4>

            </div> -->
            <!-- <div class="col-md-4">

            </div>
        </div>
        <div class="row other-data d-none">

        </div> -->
    </div>
    </div>


<?php
include "kong.php";
?>