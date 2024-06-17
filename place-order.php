<?php
session_start();
?>
<?php
include "connection.php";
if((isset($_SESSION['login'])) && $_SESSION['login'] = true ){
    $data = "SELECT * FROM `address`";
    $query = mysqli_query($conn,$data);
    $row = mysqli_fetch_array($query);
    if($_SESSION['mail'] = $row['email']){
        echo '<script> window.location.href = "place-order.php"; </script>';
    }
    else{
      header("location: address.php");
    }
}

else{
    echo ' <script> window.location.href = "Sign-in.php"; </script> ';
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
    <link rel="stylesheet" href="V-media.css">
    <link rel="stylesheet" href="styles.css">


    <title>VOoKstore.com</title>
</head>
<style>
html {
    scroll-behavior: smooth;
}

.cook {
    border: 1px solid dark;
    box-shadow: 0px 0px 4px 2px salmon;
    background-color: dark;
    color: black;
    top: 90%;
    z-index: 3;

}
</style>

<body>
    <?php
  include "king.php";
  ?>


    <h2 class="c-text text-center my-3">Place order</h2>

    <div class="container">
        <div class=" bg-dark p-2 my-3 text-light">
            <span>
                <h2 class="text-warning text-center"><?php echo " {$_SESSION['name']}"; ?> </h2>
            </span>
        </div>
        <div class="text-dark ">
            <?php
     $q = "SELECT * FROM `sign_up`";
     $result = mysqli_query($conn,$q);
     $row = mysqli_fetch_array($result);

     if($_SESSION['email'] = $row['email']){
        $sql = "SELECT * FROM `address` where email = '{$_SESSION['mail']}'";
        $query = mysqli_query($conn,$sql);
        $row =  mysqli_fetch_array($query);

        if($_SESSION['mail'] == $row['email']){
        echo "<h4 clas='text-dark'> {$row['first_name']} {$row['last_name']} <br>
        {$row['email']} <br>
        {$row['address']} <br> {$row['country']}<br> {$row['state']}-({$row['zip']}) </h4> ";
     }
    }

     ?>
           <a href="edit-address.php"><button class="btn btn-outline-primary" id="edit-ad">Edit-address</button></a>

        </div>
    </div>
    <div class="container my-4">
        <table class="table table-striped">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price/off</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($_SESSION['cart'])){
                      foreach($_SESSION['cart'] as $key => $value)
                      {
                        
                      echo  "<tr>";
                      echo "<td><img src='images/{$value['image']}' width='70' height='100'></td>";
                      echo "<td>".$value['item_name']."</td>";
                      echo "<td>".$value['author_name']."</td>";
                      echo "<td>".$value['quantity']."</td>";
                      echo "<td>"."₹ ".$value['price']."</td>"; 
                    }
                  }
                    ?>
                </tbody>
            </table>


    </div>
    <hr class="my-3">
    
    <div class="container">
        <h2 class='text-danger '>Make payment method</h2>
        <p class='text-muted'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat laborum magnam voluptatem ea ipsa dolorum nesciunt repellat ullam illo?</p>
        <button class="btn btn-primary"><a href="payment.php" class='text-white'>Payment</a></button>
    </div>

    <?php
  include "kong.php";
  ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"> </script>
    <script src="V-book.js"></script>
</body>

</html>