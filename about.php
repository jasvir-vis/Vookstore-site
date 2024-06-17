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


  <title>About-vookstore.com</title>
</head>
<style>
  html{
    scroll-behavior: smooth;
  }
</style>
<body  onload="setInterval(change,2000)">
  <!-- logo bar -->
  <?php
  include "king.php";
  ?>

  <?php
  $con = mysqli_connect("localhost","root","","vookstore");
  
  if(isset($_POST['search'])){
    $value = $_POST['title'];

    $query = "SELECT * FROM `books` Where CONCAT(`title`,`author`,`topic`,`price`,`description`,`off`,`category`,`image`) LIKE '%$value%'";
    $result = mysqli_query($con,$query);
    
    if(mysqli_num_rows($result) >0){
      echo ' <h2 class="text-center text-secondary my-3">Searching results</h2>';
    while ($row = mysqli_fetch_array($result)){
      
      echo '<div class="item d-md-flex flex-md-row flex-column mx-3 bg-light">';
               echo "<a href=''>"."<div class='item-img p-4'><img src='images/{$row['image']}' height='300' width='200px'></div>"."</a>";
                echo ' <div class="discription my-4"> '.
                   ' <div class="heading">'.
                        '<a href="">'."<h3 class='text-primary'>".$row['title']."</h3>".'</a>'.
                    '</div>'.
                    '<div class="small-para">'.
                        "<p>"."this is my paragraph of the the esomoethinng which we want to add down side of the author".
"</p>"
                    .'</div>'.

                    '<div class="price d-flex">'.'<span>'.
                            "<h2 class='text-secondary'>"."₹".$row['price']."-"."</h2>".
                        '</span>'.'<span class="text-info">'.$row['off']."%off".'</span>'.' </div>'.
                        '<span class="text-primary">'."--Bank Offer10% off on Bank of Baroda Credit Card EMI Txns, up to ₹2,000 on orders of ₹10,000 and aboveT&C".'</span>'.'<br>'.

                      '<span class="text-primary">'."--Bank Offer10% off on IDFC FIRST Bank Credit Card EMI Transactions, up to ₹1,750 on orders of ₹10,000 and above".'</span>'.'<br>'.'<br>'.
                    '<div class="discript pr-3 text-justify">'.$row['description'].'</div>'.
                    '<div class="buttons py-3">'.'<button class="p-1 btn btn-outline-dark mr-4">Add to cart</button>'.
                            '<button class="p-1 btn btn-outline-dark">place order</button>'.'</div>'.
                '</div>'.
            '</div>'.
           '<hr>'; 
    }
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>NO Result!!--</strong> sorry this category of book is not available.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> ';
  }
}
  ?>


  <!-- about image -->

  <div class="container my-5">
  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h1 class="featurette-heading fw-normal lh-1 ml-3 c-text"> About us</h1>
      <p class="lead ml-3 text-justify">Welcome to <strong class="text-primary">Vookstore</strong>, where the pages come alive and stories find their home. Established with a passion for literature and a commitment to fostering a love for reading, our online bookstore is a haven for book enthusiasts. At VOOK-STORE, we believe in the power of storytelling to inspire, educate, and entertain. Our carefully curated collection spans genres, from timeless classics to contemporary bestsellers, ensuring that every reader discovers their next literary adventure. <br>
      <br>
      Our bookstore is more than just a virtual space; it's a community of book lovers. We take pride in connecting readers with their favorite authors and fostering discussions about the stories that resonate with us all. Our team is comprised of passionate individuals who share a deep appreciation for the written word, and we are here to guide you through our shelves of literary treasures. 
    <br>
     Quality is at the forefront of what we do. Every book in our collection is handpicked to ensure a diverse and enriching reading experience. We strive to cater to varied tastes and preferences, offering a thoughtfully curated selection that reflects the rich tapestry of the literary world.</p>
    </div>
    <div class="col-md-5 order-md-1">
      <img src="MTL-images/toa-heftiba-ip9R11FMbV8-unsplash.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" style="box-shadow: 0px 0px 4px 2px grey;">
    </div>
  </div>
  </div>

  <div class="container my-4">
    <h3 class="featurette-heading fw-normal lh-1 ml-3"> Our Mission</h3>
    <p class=" ml-3 text-justify">Our mission is simple – to bring you the finest [Books] that combines style, functionality, and affordability. We aim to be your go-to online store for all your needs, offering a carefully curated selection that reflects the latest trends and timeless classics.</p>
     <br>
     <br>
      <h3 class="featurette-heading fw-normal lh-1 ml-3" >What Sets Us Apart</h3>
  <p class=" ml-3 text-justify"> <b>Quality Assurance: </b> We handpick each product to ensure it meets our stringent quality standards. Your satisfaction is our top priority.</p>

  <p class=" ml-3 text-justify"><b>Style Diversity: </b> Whether you're looking for [Books] for everyday use or a special occasion, our diverse collection ensures you find the perfect match for any style or taste.</p>

  <p class=" ml-3 text-justify"><b> Customer-Centric Approach:</b>Our dedicated customer support team is always ready to assist you. Your feedback and satisfaction drive us to continuously improve our services.</p>

  <br>
  <h3 class="featurette-heading fw-normal lh-1 ml-3">Connect With Us</h3>
 <p class=" ml-3 text-justify">We love hearing from our customers! Connect with us on Social Media Platforms to stay updated on the latest arrivals, promotions, and to join our growing community.</p>

 <p class=" ml-3 text-justify">Thank you for choosing <b>Vookstore</b>. We look forward to serving you and making your shopping experience with us truly exceptional.</p>

 <b class=" ml-3 text-justify">Happy Shopping!</b>
<br>
<strong class=" ml-3 text-justify text-danger">[Vook-store]</strong>


  </div>
<hr>
  
<div class="container mt-5">
  <div class="row ">
      <div class="col-md-6 offset-md-3">
          <h2 class="text-center my-4 ">Feedback Form</h2>
          <form action="">
              <div class="form-group">
                  <label for="name">Your Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
              </div>
              <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
              </div>
              <div class="form-group">
                  <label for="feedback">Feedback:</label>
                  <textarea class="form-control" id="feedback" rows="4" placeholder="Enter your feedback" required></textarea>
              </div>
              <button type="submit" class="btn btn-dark">Submit Feedback</button>
          </form>
      </div>
  </div>
</div>

<?php
include "kong.php";
?>