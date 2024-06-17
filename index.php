<?php
if(isset($_POST['set'])){
 $cookie_name = "fiction";
 $cookie_value = "fiction-books";
setcookie($cookie_name,$cookie_value,time() + (3600 * 24),"/");
}
else{
  echo "";
}
?>
<?php
include "cart-session.php";
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

#feedd {
    display: none;
}

.slider-container {
    width: 90%;
    overflow: hidden;
    position: relative;
    margin: 0 auto;
}

.slider-wrapper {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.card-a {
    width: 25%;
    box-sizing: border-box;
    padding: 20px;
    margin: 0 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
</style>

<body>

    <form action="" method="post">
        <div class="alert cook container-fluid alert-warning alert-dismissible fade show position-fixed" role="alert">
            <strong>Set cookies!</strong>Then we are find easily your choice.this cookies set on <b
                class="text-danger">fiction</b> type. <button class="btn btn-dark ml-4" id="cookie" name="set">Set
                cookie</button>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </form>
    <?php
include "king.php";
?>
    <div class="album bg-body-tertiary">
        <div class="container-fluid mx-md-5 cards">
            <div class="row row-cols-2 d-flex row-cols-lg-5 row-cols-md-3 g-3">
                <?php
  $con = mysqli_connect("localhost","root","","vookstore");
  
  if(isset($_POST['search'])){
    $value = $_POST['title'];

    $query = "SELECT * FROM `books` Where CONCAT(`title`,`author`,`topic`,`price`,`description`,`off`,`category`,`image`) LIKE '%$value%'";
    $result = mysqli_query($con,$query);
    
    if(mysqli_num_rows($result) >0){
      echo '<script> alert("Click ok and see searching results"); </script>';
    while ($row = mysqli_fetch_array($result)){
      
      ?>
                <?php include "myfile.php"; ?>
                <?php
    }
  }
  else{
    echo '<script> alert("Sorry!! no item found"); </script>';
  }
}
  ?>
            </div>
        </div>
    </div>



    <div class="d-md-flex scroll-first" id="first">
        <div class="container my-md-5 ml-md-3 id">
            <video src="MTL-images/Untitled video - Made with Clipchamp (4).mp4" height="400" width="100%"
                style="box-shadow: 2px 2px 2px 2px darkcyan;" autoplay loop></video>
        </div>

        <div class="container-fluid d-flex my-md-5">
            <div class="row featurette banner ">
                <div class="col-lg-7">
                    <h2 class="featurette-heading fw-normal lh-1 ">Millions of book at SaleS</h2>
                    <ul class="mx-3">
                        <li>Beautiful vintage editions in memorable dust jackets.</li>
                        <li> Big books at cheap prices, from art books to coffee-table books</li>
                        <li>Thousands of used copies of romance novels.</li>
                        <li>Used self help books, from spiritual guidance to business books.</li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <img src="MTL-images/sincerely-media-nGrfKmtwv24-unsplash.jpg"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300"
                        height="300" alt="">
                    <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%"
                        fill="var(--bs-secondary-color)" dy=".3em"></text></svg>
                </div>
            </div>
        </div>
    </div>
    </div>

    <hr>
    <h1 class="text-center text-danger my-3">Famous Author of All Time</h1>
    <div class="container-fluid">
        <?php
        include 'author-slider.php'
        ?>
    </div>

    <br><br>
    <div class="album bg-body-tertiary">
        <div class="container-fluid mx-md-5 cards">
            <div class="row row-cols-2 d-flex row-cols-lg-5 row-cols-md-3 g-3">
                <?php
    $cookie_name="fiction";
    if(!isset($_COOKIE[$cookie_name])){
      echo "";
    }
    else{
      $jas = "SELECT * from `books`";
      $quer = mysqli_query($con,$jas);
      while($row = mysqli_fetch_array($quer)){
        if($cookie_name = $row['topic']){
          echo '<script>
    document.querySelector(".cook").style.opacity = "0";
 </script> ';
          ?>
                <?php include "myfile.php"; ?>
                <?php
        }
      }

    }

    ?>
            </div>
        </div>
    </div>


    <!-- Trending books -->
    <div class="album py-5" style="background-color: white;">
        <div class="container-fluid mx-md-5 cards">
            <h2 class="text-center text-Success">BEST BOOKS OF ALL TIME</h2>
            <div class="row row-cols-2 row-cols-lg-5 row-cols-md-3 g-3">

                <?php
        $con = mysqli_connect("localhost","root","","vookstore");
        $per_page_record = 10;  // Number of entries to show in a page.   
          // Look for a GET variable page if not found default is 1.        
          if (isset($_GET["page"])) {    
              $page  = $_GET["page"];    
          }    
          else {    
            $page=1;    
          }    
      
          $start_from = ($page-1) * $per_page_record;     
      
          $query = "SELECT * FROM books LIMIT $start_from, $per_page_record";     
          $result = mysqli_query ($con, $query); 
          $num = mysqli_num_rows($result);   

                  if($num>0){
                    while($row = mysqli_fetch_assoc($result)){
          ?>

                <?php include "myfile.php"; ?>

                <?php
                       }
          }
        ?>

            </div>
        </div>
    </div>
    <br>

    <hr>
    <div class="container-fluid d-flex flex-md-row flex-column justify-content-between banner2">
        <h2 class="text-center"></h2>
        <div class="rel d-flex flex-column align-items-center justify-content-center h-100 w-100">
            <div>
                <h2 class="text-start my-4 mx-2">Think before you speak. Read before you think</h2>
                <p class="text-justify">We are providing special books and many of the people like to read
                    fiction,romance,drama and magazines books .For students competative books are help to boost his
                    career.
                    <br><br>
                    Buy books in best price and affordable price,Also,we are providing books on rent.

                    </tenetur>
                </p>
                <button class="btn btn-outline-danger">Related more..</button>
            </div>
        </div>
        <div class="d-flex mx-3  flex-lg-row flex-column">
            <div class="rel2 mr-3">
                <div class="card " style="width: 18rem;">
                    <img src="MTL-images/image12.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <br>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.
                            Lorem ipsum dolor sit amet ...
                        </p>
                    </div>
                </div>

            </div>
            <div class="rel3 mr-3">
                <div class="card" style="width: 18rem;">
                    <img src="MTL-images/image2.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="rel4">
                <div class="card" style="width: 18rem;">
                    <img src="MTL-images/image11.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr>





   

        <div class="container bg-warning p-4">
            <h2 class="ml-2 mb-4">Feedback given by users</h2>
            <div class="my-3 p-3 bg-light rounded shadow">
                <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>

            <?php
            include "connection.php";
            $sel = "SELECT * from feedback";
            $jq = mysqli_query($conn,$sel);

            while($fame = mysqli_fetch_assoc($jq)){
            ?>

                <div class="d-flex text-body-danger pt-3">
                    <h6 class="pb-3 mb-0 border-bottom">
                        <strong class="d-block text-gray-Primary p-2"><i class="fa fa-x fa-user-alt mx-2 text-primary"></i><?php echo $fame['name']; ?></strong>
                        <strong class="d-block text-gray-dark p-2"><i class="fa fa-x fa-envelope mx-2 text-danger"></i><?php echo $fame['email']; ?></strong>
                        
                        <i class="fa fa-x fa-comment-dots mx-2 text-success"> </i> - <?php echo $fame['feedback']; ?>
                    </h6>
                </div>
                <?php
            }
                ?>

               
                
                <small class="d-block text-end mt-3">
                    <a href="#">All updates</a>
                </small>
            </div>
        </div>


        <div class="button-for w-25 mx-auto my-2">
            <button name="next" id="show-feed" class="btn btn-primary btn-lg"> Click for giving feedback <i
                    class="fa fa-x fa-angle-down"></i></button>
        </div>

        <div class="container mt-5" id="feedd">
            <div class="row ">
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center my-4 ">Feedback Form</h2>
                    <form action="feedback.php" method="post">
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" class="form-control" id="name" name="fname" placeholder="Enter your name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="fmail"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="feedback">Feedback:</label>
                            <textarea class="form-control" id="feedback" name="feed-para" rows="4"
                                placeholder="Enter your feedback" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark" name="feedback">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>



        <?php
    include "kong.php";
    ?>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>

        <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"> </script>
        <script src="V-book.js"></script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

        <script>
        let showFeed = document.querySelector("#show-feed");
        let formf = document.querySelector("#feedd");

        showFeed.addEventListener('click', () => {
            formf.style.display = "block";
            showFeed.style.display = "none";
        });
        </script>

</body>

</html>