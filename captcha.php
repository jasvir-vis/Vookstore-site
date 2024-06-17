<?php
session_start();
include 'king.php';
?>

<div class="container my-4">
    <h2 class="text-center text-danger bg-white">ENTER CAPTCHA CODE</h2>
    <div class="card p-3">
        <h1 class='text-white bg-dark text-center w-50 mx-auto p-4' id='captcha'><?php echo $_SESSION['captcha']; ?></h1>
        <input type="text" id="input" class="form form-control w-50 mx-auto" placeholder="enter your captcha here">
        <button class="btn btn-primary w-25 mx-auto my-3" onclick="jas()">Submit</button>

    </div>
</div>
<script>
        let captcha = document.querySelector("#captcha");
        let input = document.querySelector("#input");
    function jas(){
        let result = captcha.innerText;
        if(input.value === result){
            alert("captcha successfully entered");
            window.location.href = "user-order.php";
        }
        else{
            alert("enter captcha same as show in image");
        }
    
    }

</script>
<?php
include 'kong.php';
?>