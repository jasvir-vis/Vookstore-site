<?php
session_start();
include "king.php";
if(isset($_POST['cart'])){
    if(isset($_SESSION['cart'])){
      $myitems=array_column($_SESSION['cart'],'item_name');
      if(in_array($_POST['item-name'],$myitems)){
  
        echo "<script>alert('item is already added')</script>";
        
      }
      else{
      $count = count($_SESSION['cart']);
      $_SESSION['cart'][$count]=array('item_name'=>$_POST['item-name'],'author_name'=>$_POST['author'],'price'=>$_POST['price'],'off'=>$_POST['off'],'description'=>$_POST['description'],'image'=>$_POST['image'],'quantity'=>1);
      echo "<script>alert('item added to cart');
      window.location.href = 'add-to-card.php'; </script> ";
      }
  
    }
    else{
      $_SESSION['cart'][0]=array('item_name'=>$_POST['item-name'],'author_name'=>$_POST['author'],'price'=>$_POST['price'],'off'=>$_POST['off'],'description'=>$_POST['description'],'image'=>$_POST['image'],'quantity'=>1);
      echo "<script>alert('item added to cart'); 
      window.location.href = 'add-to-card.php';</script>";
    }
  }
?>

<style>
#feedd {
    display: none;
}
</style>


<div class="container-fluid bg-white">
    <div class="row my-4 text-justify">
        <?php
         include "connection.php";
         $id = $_GET['id'];
         $da = "SELECT * from books where id=$id";
         $jq = mysqli_query($conn,$da);
         while($row = mysqli_fetch_assoc($jq)){
                        ?>
        <div class="col-lg-4 ">
            <form action="" method="post" enctype="multipart/form-data">
            <img src="images/<?php echo $row['image']; ?>" alt="" height='450' width='350' class='p-2 mx-md-5'>
        </div>
        <div class="col-lg-7 p-3">
            <h4 class="text-black ml-2"><?php echo $row['title']; ?></h4>
            <p class="text-muted ml-2"> <?php echo $row['author']; ?> <br>
                Topic - fiction &nbsp;&nbsp;&nbsp; Catagory - Science fiction </p>
            <h4 class="text-black ml-2">₹ <?php echo $row['price']; ?> -<span>(<?php echo $row['off']; ?>% off)</span></h4>
            <h5 class='text-black ml-2 mt-3'>Avaliable offers</h5>
            <ul class='ml-2 list-unstyled text-primary'>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, illo?</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, illo?</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, illo?</li>
            </ul>
            <span class='text-black ml-2 mt-3'>
                <h4 class='ml-2'>Description</h4>
            </span>
            <p class="text-secondary ml-2">
                <?php echo $row['description']; ?>
            </p>
                                 <input type="hidden" name="item-name" value="<?php echo $row['title']; ?>">
                                <input type="hidden" name="author" value="<?php echo $row['author']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="off" value="<?php echo $row['off']; ?>">
                                <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                                <div class="button my-2">
                <input class="btn btn-outline-primary btn-lg mx-3" name="cart" type="submit" value="Add to cart"></input>
                <a href="add-to-card.php" class="btn btn-outline-danger btn-lg mx-3" >Place order</a>
            </div>
           </form>
            <?php
           }
         ?>
        </div>
    </div>
    <hr class='mb-3'>

    <h2 class='text-dark ml-5 p-2'>Some related books</h2>
    <div class="album py-3 bg-body-tertiary">
        <div class="container-fluid mx-md-5 cards">
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

            </div>
        </div>
    </div>
    <h2 class="text-black text-center my-3">FAMOUS PUBLISHERS</h2>
<div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner jasvir">
            <div class="carousel-item active aj">
                <div class="card-wrapper container-sm d-flex  justify-content-around">
                    <div class="card bg-secondary text-white" style="width: 18rem;">
                        <img src="MTL-images/arihant.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Arihant Books</h3>
                            <p class="card-text">Arihant was established by my two brothers and I in 1997. While I
                                oversee the complete printing operation, Deepesh and Reetesh look after content
                                development and sales and finance respectively.</p>

                        </div>
                    </div>
                    <div class="card bg-secondary text-white" style="width: 18rem;">
                        <img src="MTL-images/rupa.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Rupa Publications</h3>
                            <p class="card-text">Rupa Publications is an Indian publishing company based in New Delhi,
                                with sales centres in Kolkata, Allahabad, Bengaluru, Chennai, Mumbai, Jaipur, Hyderabad
                                and Kathmandu.</p>

                        </div>
                    </div>
                    <div class="card bg-secondary text-white" style="width: 18rem;">
                        <img src="MTL-images/hechatte.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Hachette India</h3>
                            <p class="card-text">Hachette India is the Indian arm of the publishing company Hachette,
                                which is owned by the French group, Lagardère Publishing. It started operations in India
                                in 2008, and is currently the second-largest publishing house in the country</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex   justify-content-around">
                    <div class="card  bg-secondary" style="width: 18rem;">
                        <img src="MTL-images/rolli.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Rolli Publication</h3>
                            <p class="card-text">Pramod Kapoor, the founder and publisher of Roli Books (established in
                                1978), has over the course of his illustrious career, conceived and produced
                                award-winning books that have proven to be game-changers. </p>

                        </div>
                    </div>
                    <div class="card bg-secondary text-white" style="width: 18rem;">
                        <img src="MTL-images/JaicoPublishingHouse.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Jaico Publishing House</h3>
                            <p class="card-text">Boasting one of India's largest book distribution networks, Jaico has
                                its headquarters in Mumbai, with branches in Ahmedabad, Bangalore, Chennai, Delhi,
                                Hyderabad, and Kolkata.</p>

                        </div>
                    </div>
                    <div class="card bg-secondary text-white" style="width: 18rem;">
                        <img src="MTL-images/panguine.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Penguine Random House</h3>
                            <p class="card-text">The group merged with Putnam Berkley to become Penguin Putnam, Inc. in
                                1996 and Penguin Publishing Group in 2014. Today, Penguin Publishing Group is the
                                largest division of Penguin Random House, Inc.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex  justify-content-around">
                    <div class="card bg-secondary " style="width: 18rem;">
                        <img src="MTL-images/HarperCollins-Logo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Harper Collins</h3>
                            <p class="card-text">HarperCollins Publishers LLC is an Anglo-American publishing company
                                that is considered to be one of the "Big Five" English-language publishers, along with
                                Penguin Random House</p>

                        </div>
                    </div>
                    <div class="card bg-secondary text-white" style="width: 18rem;">
                        <img src="MTL-images/macmillan.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Macmillan Publishers</h3>
                            <p class="card-text">Macmillan Publishers is a British publishing company traditionally
                                considered to be one of the 'Big Five' English language publishers. Founded in London.
                            </p>

                        </div>
                    </div>
                    <div class="card bg-secondary text-white" style="width: 18rem;">
                        <img src="MTL-images/john.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title my-3">John Wiley and Sons</h3>
                            <p class="card-text">
                                Founded in 1807, John Wiley & Sons, with the Wiley-Blackwell imprint, is one of the
                                world's leading publishers of academic, scientific and professional books and journals.
                            </p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<hr>


<div class="button-for w-25 mx-auto my-2">
    <button name="next" id="show-feed" class="btn btn-primary btn-lg"> Click for giving feedback <i
            class="fa fa-x fa-angle-down"></i></button>
</div>
<div class="container mt-5" id="feedd">
    <div class="row ">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center my-4 ">Feedback Form</h2>
            <form>
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
                    <textarea class="form-control" id="feedback" rows="4" placeholder="Enter your feedback"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-dark">Submit Feedback</button>
            </form>
        </div>
    </div>
</div>


<script>
let showFeed = document.querySelector("#show-feed");
let formf = document.querySelector("#feedd");

showFeed.addEventListener('click', () => {
    formf.style.display = "block";
    showFeed.style.display = "none";
});
</script>
<?php
include "kong.php";
?>