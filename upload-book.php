
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Upload books</title>
  </head>
  <body>

  <div class="container my-5 ">
    <h3 class="text-center py-3">Upload your book</h3>
  <form class="row g-3" action="#" method="post" enctype="multipart/form-data">
  <div class="col-md-4">
    <label for="validationServer01" class="form-label">Title</label>
    <input type="text" class="form-control is-valid" name="title" id="validationServer01" value="Mark" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Author</label>
    <input type="text" class="form-control is-valid" name="author" id="validationServer02" value="Otto" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationServerUsername" class="form-label">Price</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend3">₹</span>
      <input type="number" class="form-control is-invalid" id="validationServerUsername" name="price" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationServerUsername" class="form-label">Off</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend3">%</span>
      <input type="number" class="form-control is-invalid" id="validationServerUsername1" name="off" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        price of book
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationServer03" class="form-label">Description</label>
    <input type="text" class="form-control is-invalid" id="validationServer03" name="descript" aria-describedby="validationServer03Feedback" required>
    <div id="validationServer03Feedback" class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationServer04" class="form-label">Topic</label>
    <select class="form-select is-invalid" id="validationServer04" name="topic" aria-describedby="validationServer04Feedback" required>
      <option selected disabled value="">Choose...</option>
      <option>Fiction</option>
      <option>Literature</option>
      <option>Magazine</option>
      <option>History</option>
      <option>Romance</option>
      <option>Competative</option>
      <option>Motivational</option>

    </select>
    <div id="validationServer04Feedback" class="invalid-feedback">
      Please select a valid topic.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationServer05" class="form-label">Catagory</label>
    <input type="text" class="form-control is-invalid" id="validationServer05" name="cat" aria-describedby="validationServer05Feedback" required>
    <div id="validationServer05Feedback" class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  <div class="col-12">
    <div class="col-md-3">
    <label for="validationServer05" class="form-label">Image</label>
    <input type="file" class="form-control is-invalid" id="validationServer06" name="picture" aria-describedby="validationServer05Feedback" required>
  </div>

  </div>
  <div class="col-12">
    <input class="btn btn-primary" type="submit" name="upload" value="upload">
  </div>
</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php

if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $off =  $_POST['off'];
    $desc =  $_POST['descript'];
    $topic = $_POST['topic'];
    $cat = $_POST['cat'];
    $picture = $_FILES['picture']['name'];
    $temp = $_FILES['picture']['tmp_name'];
    $path = "images/".$picture;

    $connection = mysqli_connect("localhost","root","","vookstore");
    move_uploaded_file($temp,$path);
    $q = "insert into `books`(`title`,`author`,`price`,`off`,`description`,`topic`,`category`,`image`) values('$title','$author','$price','$off','$desc','$topic','$cat','$picture')";
    $query = mysqli_query($connection,$q);

    if($query){
           echo "data is uploaded";
    }
    else{
           echo "error";
    }

}
?>