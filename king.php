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
  html{
    scroll-behavior: smooth;
  }
  .cook{
    border: 1px solid dark;
    box-shadow: 0px 0px 4px 2px salmon;
    background-color: dark;
    color: black;
  top: 90%;
  z-index: 3;

  }
  .great a{
    transition: all 0.5s ease-in;
  }
  .great a:hover{
    transform: scale(1.1);
    border-bottom: 3px solid navy;
  }
  @media only screen and (min-width: 300px) and (max-width: 768px){

    .visiblity{
        display: none;
    }
    .pheight{
      position: absolute;
        top: 27%;
        width: 0;
    }
  }

  @media only screen and (min-width:768px) and (max-width:1280px) {
 
    .profile{
      width: 57%;
      top: 14%;
    }
    .sidebar{
      width: 20%;
    }

}


</style>

<body>

  <!-- logo bar -->
  <header>
  <div class="container-fluid bg-warning logobar d-flex flex-column flex-lg-row align-items-center justify-content-around" id="top">
    <div class="logo d-md-flex">
      <div>
      <span class="c-text ml-md-0 ml-5 mr-5">VOoKstore</span>
    </div>
    <div class="my-2">
      <form action="" method="post" enctype="multipart/form-data" class="d-flex">
      <div class="search mr-4"><input type="text" name="title" class="form form-control" placeholder="Enter title of book"></div>
      <div class="search"><input type="submit" class="btn btn-dark" name="search" value="search"></div>
</form>
    </div>
    </div>
    <div class='d-flex great'>
      <a class="nav-link mx-1 mx-md-3 mt-2 text-dark active" href="index.php">HOME<span class="sr-only">(current)</span></a>
      <a class="nav-link mx-1 mx-md-3 mt-2 text-dark" href="about.php">ABOUT<span class="sr-only">(current)</span></a>
      <a class="nav-link mx-1 mx-md-3 mt-2 text-dark" href="Sign-up.php">SIGN-UP<span class="sr-only">(current)</span></a>
    </div>
   
    <div class="social-logo">
      <a href="add-to-card.php"><i class="fa fa-2x fa-shopping-bag mx-3 text-dark" id="bagicon" aria-hidden="true"></i></a>
      <a href="#" class="profileicon"><i class="fa fa-2x fa-user-alt text-dark" id="instaicon" aria-hidden="true"></i></a>
    </div>

    <!-- profile side -->
    <div class="profile visiblity pheight">
      <div class="d-flex flex-column flex-shrink-0 p-2 text-bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fa fa-x fa-leanpub text-dark mx-3" id="bagicon" aria-hidden="true"></i>
          <span class="fs-4 text-dark">Account Details</span>
        </a>
        <hr>
        <ul class="nav mb-auto">
          <li>
            <a href="profile.php" class="nav-link text-primary" aria-current="page">
              <i class="fa fa-x fa-home text-danger bi pe-none me-2" width="16" height="16" id="bagicon" aria-hidden="true"></i>
              Profile
            </a>
          </li>
          <li>
            <a href="user-order.php" class="nav-link text-primary">
              <i class="fa fa-x fa-cube text-danger  bi pe-none me-2" width="16" height="16" id="bagicon" aria-hidden="true"></i>
              Orders
            </a>
          </li>
          <li>
            <a href="add-to-card.php" class="nav-link text-primary">
              <i class="fa fa-x fa-shopping-bag text-danger bi pe-none me-2" width="16" height="16" id="bagicon" aria-hidden="true"></i>
              Add to cart
            </a>
          </li>
          <li>
            <a href="upload-book.php" class="nav-link text-priamary">
              <i class="fa fa-x fa-handshake text-danger bi pe-none me-2" width="16" height="16" id="bagicon" aria-hidden="true"></i>
              Upload book
            </a>
          </li>
          <li>
            <a href="help-center.php" class="nav-link text-priamary">
              <i class="fa fa-x fa-headphones text-danger bi pe-none me-2" width="16" height="16" id="bagicon" aria-hidden="true"></i>
              Help center
            </a>
          </li>
          <li><a href="logout.php" class="nav-link text-success mt-5 "><strong>LOGOUT</strong></a></li>
        </ul>
        <hr>
      </div>
    </div>
  </div>
  <!-- nav bar -->
  <nav class="navbar navbar-expand-lg j navbar-dark">
    
    <div class="burger container-fluid flex-column mx-3">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <li class="nav-item mx-md-4 dropdown">
          <a text-darka class="nav-link" href="Fiction.php" id="navbarDropdownMenuLink" role="button">
            FICTION
          </a>
        </li>
        <li class="nav-item mx-md-4 dropdown">
          <a text-darka class="nav-link" href="Literature.php" id="navbarDropdownMenuLink" role="button"
            >
            LITERATURE
          </a>
        </li>
        <li class="nav-item mx-md-4 dropdown">
          <a text-darka class="nav-link" href="Magazine.php" id="navbarDropdownMenuLink" role="button"
            >
            MAGAZINES
          </a>
        </li>
        <li class="nav-item mx-md-4 dropdown">
          <a text-darka class="nav-link" href="History.php" id="navbarDropdownMenuLink" role="button"
            >
            HISTORY
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          </div>
        </li>
        <li class="nav-item mx-md-4 dropdown">
          <a text-darka class="nav-link" href="Romance.php" id="navbarDropdownMenuLink" role="button"
            >
            ROMANCE
</a>
        </li>
        <li class="nav-item mx-md-4 dropdown">
          <a text-darka class="nav-link" href="Competative.php" id="navbarDropdownMenuLink" role="button"
            >
            COMPETATIVE
          </a>
        </li>
        <li class="nav-item mx-md-4 dropdown">
          <a text-darka class="nav-link" href="Motivational.php" id="navbarDropdownMenuLink" role="button"
            >
            MOTIVATIONAL
          </a>
        </li>
      </div>
    </div>
  </nav>
  <!-- second section -->
  <div class="king">
    <div class="sidebar height visible">
      <ul>
        <li><a href="index.php" class="danger">Home</a></li>
        <li><a href="Fiction.php" class="text-primary">Fiction</a></li>
        <li><a href="Literature.php" class="text-primary">Literature</a></li>
        <li><a href="Magazine.php" class="text-primary">Magazines</a></li>
        <li><a href="History.php" class="text-primary">History</a></li>
        <li><a href="Romance.php" class="text-primary">Romance</a></li>
        <li><a href="Competative.php" class="text-primary">Competative</a></li>
        <li><a href="Motivational.php" class="text-primary">Motivational</a></li>
        <li></li>
        <li><a href="" class="text-danger">Other catagories</a></li>
        <li><a href="kids.php" class="text-primary">Kids</a></li>
        <li><a href="younger.php" class="text-primary">Younger</a></li>
        <li><a href="old.php" class="text-primary">Old</a></li>
      </ul>

    </div>
</header>
  </div>


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

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

</body>

</html>