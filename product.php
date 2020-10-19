

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Product</title>

<?php include('header.php'); ?>
<?php include('config.php'); ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Products</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
            <?php

            if(isset($_GET['page']))
            {
              $page = $_GET['page'];
            }
            else
            {
              $page = 1;
            }
            $per_page = 10;
            $start_from = ($page-1)*10;
            if(isset($_GET['category_id']))
            {
              $sql = "SELECT * FROM products WHERE `category_id`='$_GET[category_id]' LIMIT $start_from,$per_page";
            }
            elseif(isset($_GET['tname']))
            {
              $sql = "SELECT * FROM products WHERE `tname` LIKE '%$_GET[tname]%' LIMIT $start_from,$per_page";
            }
            elseif(isset($_GET['color']))
            {
              $sql = "SELECT * FROM products WHERE `color` LIKE '%$_GET[color]%' LIMIT $start_from,$per_page";
            }
            elseif(isset($_POST['filter']))
            {
              $lowest_price = isset($_POST['lowest_price'])?$_POST['lowest_price']:'';
              $lowest_price1 = (int)$lowest_price;
              $highest_price = isset($_POST['highest_price'])?$_POST['highest_price']:'';
              $highest_price1 = (int)$highest_price;
              $sql = "SELECT * FROM products WHERE `price` BETWEEN $lowest_price1 AND $highest_price1 LIMIT $start_from,$per_page";
            }
            else
            {
              $sql = "SELECT * FROM products LIMIT $start_from,$per_page";
            }
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { 
			    ?>
              <ul class="aa-product-catg">
                <!-- start single product item -->
                <li>
                  <figure>
                    <a class="aa-product-img" href="product-detail.php?product_id=<?php echo $row['product_id'] ?>"><img src="admin/<?php echo $row['image'] ?>" alt="polo shirt img" width="250" height="300"><p hidden>A $_GET</p></a>
                    <a class="aa-add-card-btn"href="#" data-productid="<?php echo $row['product_id'] ?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $row['name'] ?></a></h4>
                      <span class="aa-product-price">$ <?php echo $row['price'] ?></span>
                      <p class="aa-product-descrip">"<?php echo $row['short_desc'] ?>"</p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal<?php echo $row['product_id'] ?>"><p hidden>A $_GET</p><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>                                         
              </ul>

              <?php
				}
            } else {
                echo "0 results";
            }
            ?>

<?php
if(isset($_GET['product_id']))
{
    $sql = "SELECT * FROM products WHERE `product_id`='$_GET[product_id]'";
}
else
{
    $sql = "SELECT * FROM products LIMIT $start_from,$per_page";
}
            
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
?>
              

              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal<?php echo $row['product_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="admin/<?php echo $row['image'] ?>">
                                          <img src="admin/<?php echo $row['image'] ?>" class="simpleLens-big-image"  width="250" height="300">
                                      </a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3><?php echo $row['name'] ?></h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$ <?php echo $row['price'] ?></span>
                              <p class="aa-product-avilability">Avilability: <span><?php echo $row['stock_status'] ?></span></p>
                            </div>
                            <p><?php echo $row['short_desc'] ?></p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#"><?php echo $row['category_id'] ?></a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              
    <?php
		}
} else {
    echo "0 results";
}
?>
              <!-- / quick view modal -->   
            </div>



            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
<?php
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);
  $totalrows = mysqli_num_rows($result);
  $totalpages = ceil($totalrows/$per_page);

  if ($result->num_rows > 0) {
  // output data of each row
      for($i=1;$i<=$totalpages;$i++) { 
  ?>
                  <li><a href="product.php?page=<?php echo $i ?>"><?php echo $i ?> </a></li>
                  <?php    
      }
  } else {
    echo "0 results";
  }

?>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              <?php
			        $sql = "SELECT * FROM categories";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
              // output data of each row
                  while($row = $result->fetch_assoc()) { 
			            ?>
                <li><a href="product.php?category_id=<?php echo $row['category_id'] ?>"><?php echo $row['catname'] ?><p hidden>A $_GET</p></a></li>
                  <?php
				      }
              } else {
                  // echo "0 results";
              }
              ?>
              </ul>
            </div>


            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
              <?php
			        $sql = "SELECT * FROM tags";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
              // output data of each row
                  while($row = $result->fetch_assoc()) { 
			            ?>
                  <a href="product.php?tname=<?php echo $row['tname'] ?>"><?php echo $row['tname'] ?><p hidden>A $_GET</p></a>
                  <?php
				          }
              } else {
                  // echo "0 results";
              }
              ?>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="product.php" method="POST">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                 <span id="skip-value-lower" class="example-val" name="lowest">30.00</span>
                 <input type="hidden" name="lowest_price" id="lowest_price" value="not yet defined">
                 <span id="skip-value-upper" class="example-val" name="highest">100.00</span>
                 <input type="hidden" name="highest_price" id="highest_price" value="not yet defined">
                 <button class="aa-filter-btn" type="submit" name="filter" onclick="filterFunction()">Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              
              <div class="aa-color-tag">
              <?php
			        $sql = "SELECT * FROM colors";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
              // output data of each row
                  while($row = $result->fetch_assoc()) { 
			            ?>
                <a class="aa-color-<?php echo $row['color'] ?>" href="product.php?color=<?php echo $row['color'] ?>"><p hidden>A $_GET</p></a>
              <?php
				          }
              } else {
                  // echo "0 results";
              }
              ?>    
              </div>                        
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


<?php include('footer.php'); ?>


  