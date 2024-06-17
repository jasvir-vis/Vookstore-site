<?php
$conn = mysqli_connect("localhost","root","","vookstore");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "";
  ?>