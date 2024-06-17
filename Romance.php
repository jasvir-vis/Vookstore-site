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


  <title>VIXSHAL-BooK.com</title>
</head>
<style>
  html{
    scroll-behavior: smooth;
  }
  table {  
  border-collapse: collapse;  
}  
  .inline{   
      display: inline-block;   
      float: right;   
      margin: 20px 0px;   
  }   
   
  input, button{   
      height: 34px;   
  }   

.pagination {   
  display: inline-block;  
  margin-left: 150px; 
}   
.pagination a {   
  font-weight:bold;   
  font-size:18px;   
  color: white;  
  float: left;   
  padding: 8px 16px;   
  text-decoration: none;
  transition: all 1.5s ease-in-out;
}   
.pagination a.active {   
      background-color: black;   
}   
.pagination a:hover {   
  background-color: beige;
  color: black;   
}

</style>
<body  onload="setInterval(change,2000)">
  <!-- logo bar -->
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
      <div class="col">
            <div class="card shadow-sm my-md-3">
              <img src="images/<?php echo $row['image']; ?>" class="bd-placeholder-img card-img-top"
                width="100%" height="225" alt="">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                dy=".3em"></text></svg>
              <div class="card-body">
                <p class="card-text"><a href=""><strong><?php echo $row['title']; ?></strong></a></p>
                <p class="card-text para">(English,Paperback,Black-ink)</p>
                <p class="card-text para"><?php echo $row['author']; ?></p>
                <p class="card-text"><b><?php echo $row['price']; ?>-</b><span class="text-danger"><?php echo $row['off']; ?>%off</span><span class="wish"><a href="#"><i class="far fa-2x fa-heart text-dark" id=hearticon" aria-hidden="true"></i></a></span></p>
                <button class="btn-primary btn">Add to cart</button>
              </div>
            </div>
    </div>



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
 
<div class="container">
  <h2 class="c-text text-center my-3">Romance books</h2>
  <p class=" mx-5 text-justify"> Fiction writing is writing that is created in the author's imagination. The author of a fictional work invents the characters, plotline, dialogue, and sometimes the story's setting. So, what is a fiction book? A fiction book, usually called a novel, is just one of the many forms of fiction writing. Works of fiction do not claim that a story is true. Nevertheless, these works can significantly impact their audience and, more broadly, society.

On the individual level, fiction can give readers an escape by inspiring and intriguing and helping them see the world in a new way. These works can whisk readers away to unknown places and introduce them to people, cultures, and societies they would never have encountered otherwise. Reading fiction can be a gratifying pastime and a way of challenging one's beliefs and understandings. </p>
<img src="MTL-images/jasvir.webp" alt="" height="500" width="1100">
</div>
 <div class="album py-5 bg-body-tertiary">
      <div class="container-fluid mx-md-5 cards">
        <h4 class="text-center c-text change bg-primary">Romantic and sad-romantic books</h4>
        <hr>
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
      
          $query = "SELECT * FROM books where topic = 'Romance' LIMIT $start_from, $per_page_record";     
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

    <div class=" container pagination">    
      <?php  
      $conn = mysqli_connect("localhost","root","","vookstore");
        $query = "SELECT COUNT(*) FROM books";     
        $result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='fictioin-load.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='fiction-load.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='fiction-load.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='fiction-load.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page-item" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();" class="btn btn-danger">Go</button>   
     </div>    
    </div>  
  </div>  

    <hr>


  <div class="container-fluid px-4 bg-light pt-5" id="custom-cards">
    <h2 class="pb-2 border-bottom text-primary">CATAGORIES</h2>

    <a href=""><div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 pt-5">
      <div class="col ">
        <h2 class="c-text text-center text-info">KIDS COLLECTION</h2>
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('MTL-images/kids.webp');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-success text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold "></h3>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="MTL-images/kids.webp" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                <small>KID'S</small>
              </li>
              <li class="d-flex align-items-center">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                <small>3d</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </a>

      <a href="">
      <div class="col">
        <h2 class="c-text text-danger text-center">OLD READER</h2>
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('MTL-images/old.jpg'); background-size: cover; background-position:center;">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"></h3>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="MTL-images/9269771.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                <small>OLD aged</small>
              </li>
              <li class="d-flex align-items-center">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                <small>4d</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </a>
      
      <a href="">
      <div class="col">
        <h2 class="c-text text-center">YOUNG READER</h2>
        <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('MTL-images/students_09.jpg'); background-size: cover; background-position: top; height: 265px;">
          <div class="d-flex flex-column h-100 p-5 text-dark pb-3 text-shadow-1">
            <h3 class="pt-2 mt-5 mb-4 display-6 lh-1 fw-bold"></h3>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="MTL-images/9269771.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                <small>YOUNGER</small>
              </li>
              <li class="d-flex align-items-center">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                <small>5d</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div>

    <?php
    include "kong.php";
    ?>
    <!-- Optional JavaScript; choose one of the two! -->
  
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"></script>
  
    <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"> </script>
    <script src="V-book.js"></script>
    <script>
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'fiction-load.php?page='+page;   
    }   
    </script>
  
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
      -->
  
  </body>
  
  </html>