
<div class="col p-2">
             
                        <div class="shadow rounded my-md-3">
                            <img src="images/<?php echo $row['image']; ?>" class="bd-placeholder-img p-4"
                                  alt="" height="270" width="100%">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em"></text></svg>
                            <div class="card-body">
                                <p class="card-text"><strong><?php echo $row['title']; ?></strong> <br>
                                        <?php echo $row['author']; ?> <br>
                                      <h5 class="text-secondary"><b>Price</b> - <?php echo $row['price']; ?> rs.</h5>  
                                    </p>
                               
                                <?php echo "<a href='refer-next.php?id=$row[id]'><button class='btn w-100 btn-warning'>View</button></a>" ?>
                                <br><br>
                                <form action="" method="post" enctype="multipart/form-data">
                                <input type="submit" class="btn btn-primary w-100" name="cart" value="Add to cart"> 
                  
                                <input type="hidden" name="item-name" value="<?php echo $row['title']; ?>">
                                <input type="hidden" name="author" value="<?php echo $row['author']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="off" value="<?php echo $row['off']; ?>">
                                <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                                </form>
                               

                            </div>
                        </div>
                   
                    </div>