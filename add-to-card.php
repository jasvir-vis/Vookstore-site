<?php
session_start();
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


    <title>add-to-cart items of vookstore</title>
</head>
<style>
.total {
    background: beige;
    box-shadow: 0px 0px 2px 0px black;
}
</style>

<body>

    <?php
    include "king.php";
    ?>
    <div class="container">
        <h1 class="text-danger text-center my-4 bg-white">MY CART</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Price/off</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">total-price</th>
                            <th scope="col">remove</th>
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
                      echo "<td>"."₹ ".$value['price']."<input type='hidden' class='price' value='$value[price]'>"."</td>";
                      echo " <form action='cart-session.php' method='post'>
                      <td> <input class='text-center quantity' name='modify' onchange='this.form.submit()' type='number' min='1' max='10' value='$value[quantity]'> </td> 
                      <input type='hidden' name='item_name' value='$value[item_name]'>
                      </form>";
                     echo '<td class="total-sub"><script>  </script> </td>';
                     echo "<form action='cart-session.php' method='post'> 
                     <td><button class='btn btn-outline-secondary btn-sm' name='remove'>remove</button></td> <input type='hidden' name='item_name' value='$value[item_name]'>
                     </form>";
                   echo "</tr>";
                    }
                  }

                    ?>
                    </tbody>
                </table>
            </div>
            <?php
            if(isset($_SESSION['cart'])){
                $count=0;
                $count = count($_SESSION['cart']);
            }
            else{
                $count=0;
            }
            ?>

             <div class="col-md-3">
                <div class="total p-3">
                    <h2 class="text-dark p-2 text-center">CART ITEMS</h2>
                    <hr>
                    <h5 class=" ml-3 text-primary p-2">No. of items in cart</h5>
                    <h5 class="ml-3 text-warning bg-dark p-2"><?php echo $count; ?></h5>
                    <h5 class="text-primary p-2 ml-3">Total price of all items</h5>
                    <h5 class="text-warning p-2 bg-dark ml-3" id="gt"></h5>
                    <form action="" method="post">
                    <button class="btn btn-primary mx-4 mt-3" type="submit" name="go-order">Place-order</button>
                   </form>
                </div>
            </div>
        </div>

        <?php
        include "connection.php";
        if(isset($_SESSION['login']) && $_SESSION['login']=true){
        if(isset($_SESSION['cart'])){
            if(isset($_POST['go-order'])){
                $id = rand(10000,1000000);
                $_SESSION['order'] = $id;
                $name = $value['item_name'];
                $price = $value['price'];
                $mail = $_SESSION['mail'];
                $quantity = $value['quantity'];
                $image = $value['image'];

                $sql = "insert into `orders`(`order_id`,`title`,`price`,`quantity`,`image`,`email`) values('$id','$name','$price','$quantity','$image','$mail')";

                $query = mysqli_query($conn,$sql);

                if($query){
                    echo '<script> window.location.href = "place-order.php";</script>';
                }
                else{
                    echo '<script> alert("something error occur"); </script>';
                }
            }
        }
        else{
            echo '<script> alert("NO item present in cart");</script>';
        }
    }
    else{
        echo '<script> window.location.href = "Sign-in.php"; </script>';
    }
        ?>

        <?php
    include "kong.php";
    ?>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>

        <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"> </script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
        <script>
        let jas = 0;
        let price = document.getElementsByClassName("price");
        let quant = document.getElementsByClassName("quantity");
        let total = document.getElementsByClassName("total-sub");
        let gt = document.querySelector("#gt");

        function make() {
            jas = 0;
            for (i = 0; i < price.length; i++) {
                total[i].innerText = (price[i].value) * (quant[i].value);
                jas = jas + (price[i].value) * (quant[i].value);
            }
            gt.innerText = "Rs." + jas;
        }

        make();
        </script>

</body>

</html>