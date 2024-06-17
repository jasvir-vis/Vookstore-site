<?php
session_start();

include "king.php";
?>
    <div class="container p-3 my-5 bg-warning text-black">
        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
            <form action="" method="post">
                <div class="form-group w-50">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>UPI/patym/phone-pay</option>
                        <option>Debit card</option>
                        <option>Credit card</option>
                        <option>Visa card</option>
                        <option>Cash on delivery</option>
                    </select>
                </div>

        </div>
        <div class="row card-data">
            <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="" fdprocessedid="ymyxof">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                    Name on card is required
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="" fdprocessedid="2haym">
                <div class="invalid-feedback">
                    Credit card number is required
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required=""
                    fdprocessedid="6kns3">
                <div class="invalid-feedback">
                    Expiration date required
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="" fdprocessedid="cpc9lh">
                <div class="invalid-feedback">
                    Security code required
                </div>

            </div>
        </div>
        <div class="row card-data upi">
            <div class="col-md-6 mb-3">
                <label for="cc-name">UPI ID</label>
                <input type="text" class="form-control" id="cc-name" placeholder="Enter here" required=""
                    fdprocessedid="ymyxof">
                <small class="text-muted">upi id as on your app</small>
                <div class="invalid-feedback">
                    Upi id of online payment app
                </div>
            </div>
        </div>
        <div class="mt-4">
            <input class="btn btn-dark" type="submit" name="confirm" id="confirm" value="confirm">
        </div>
    </div>
    </form>
    </div>
    </div>

    <?php
    if(isset($_POST['confirm'])){
        if($_SESSION['login']=true){
        $generate = rand(10000,10000000);
        $_SESSION['captcha'] = $generate;
       echo " <script> window.location.href = 'captcha.php'; </script>";
    }
    else{
        echo '<script> window.location.href = "place-order.php"</script>';
    }
}
    ?>

<?php
include "kong.php";
?>