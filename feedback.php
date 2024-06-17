<?php
if(isset($_POST['feedback'])){
    include "connection.php";
    $fname = $_POST['fname'];
    $fmail = $_POST['fmail'];
    $fpara = $_POST['feed-para'];
    
    $feedback = "insert into `feedback`(`name`,`email`,`feedback`) values('$fname','$fmail','$fpara')";
    $ff = mysqli_query($conn,$feedback);
    if($ff){
        echo '<script>
        window.location.href = "index.php"; </script>';
    }
}
?>