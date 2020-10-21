<?php
require 'header.php';
?>
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
              <ul class="aa-product-catg">
                <?php  
                 require 'config.php'; 
                if (isset($_REQUEST['cid'])==0) {
                    $sql="SELECT * FROM product ";
                } if (isset($_REQUEST['cid'])!=0) {
                    $id=$_REQUEST['cid'];
                    $sql="SELECT * FROM product WHERE `catid`=$id";
                } if (isset($_REQUEST['tid'])!=0) {
                    $id=$_REQUEST['tid'];
                    $sql="SELECT * FROM product WHERE `tags`=$id";
                } if (isset($_REQUEST['colid'])!=0) {
                    $id=$_REQUEST['colid'];
                    $sql="SELECT * FROM product WHERE `col_id`=$id";
                } 
                   $r=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_assoc($r)) {
                    ?>
                <!-- start single product item -->
                <li>
                  <figure>
                    <a class="aa-product-img" 
                    href="product-detail.php?id=<?php echo $row['id'];?>">
                    <?php echo'<img style="height:300px;width:250px;"
                    src="SimplaAdmin/productimg/' . $row['img'] . '">' ?></a> 
                    <a class="aa-add-card-btn"
                    href="addpro.php?id= <?php echo $row['id'];?>">
                    <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#">
                        <?php echo $row['name']?></a></h4>
                      <span class="aa-product-price">
                        <?php echo $row['price']?>$</span>
                      <span class="aa-product-price"><del>
                        <?php echo $row['price']?>$</del></span>
                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet,
                       consectetur adipisicing elit. Numquam accusamus facere 
                       iusto, autem soluta amet sapiente ratione inventore nesciunt
                        a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>                             
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle2="tooltip" data-placement="top" 
                    title="Quick View" data-toggle="modal" 
                    data-target="#quick-view-modal">
                    <span class="fa fa-search">
                    </span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>   
                </li>
                <?php
                }
                 
                ?>                    
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" 
              tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
              aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close"
                     data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                      <div 
                      class=
                      "col-md-6 col-sm-6 col-xs-12">                              
                          <div 
                          class=
                          "aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" 
                                      data-lens-image=
                                      "img/view-slider/large/polo-shirt-1.png">
                                          <img src=
                                          "img/view-slider/medium/polo-shirt-1.png"
                                           class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image=
                                     "img/view-slider/large/polo-shirt-1.png"
                                     data-big-image=
                                     "img/view-slider/medium/polo-shirt-1.png">
                                      <img src=
                                      "img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image=
                                     "img/view-slider/large/polo-shirt-3.png"
                                     data-big-image=
                                     "img/view-slider/medium/polo-shirt-3.png">
                                      <img src=
                                      "img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image=
                                     "img/view-slider/large/polo-shirt-4.png"
                                     data-big-image=
                                     "img/view-slider/medium/polo-shirt-4.png">
                                      <img src=
                                      "img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">
                              Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet,
                             consectetur adipisicing elit. Officiis animi,
                              veritatis quae repudiandae quod nulla porro quidem,
                               itaque quis quaerat!</p>
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
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn">
                              <span class="fa fa-shopping-cart">
                              </span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
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
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
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
              $sql="select * from categorie";
              $r=mysqli_query($con, $sql);
            while ($row=mysqli_fetch_array($r)) { 
            ?>
                <li><a href="product.php?cid=<?php echo $row["catid"];?>">
                <?php echo $row["catname"];?></a></li>
<?php
            };
?>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <?php
                $sql="select * from tag";
                $r=mysqli_query($con, $sql);
                while ($row=mysqli_fetch_array($r)) { 
            ?>
                <a href="product.php?tid=<?php echo $row["id"];?>">
                <?php echo $row["tagname"];?></a>
                <?php
                };
                ?>
              </div>
            </div>
            <!-- single sidebar -->
            
           
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" 
                  class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <?php  $sql='SELECT * FROM col';
                   $r=mysqli_query($con, $sql);
                while ($row=mysqli_fetch_array($r)) { ?>
                <a href="product.php?colid=<?php echo $row["col_id"]?>">
                <input type="color"  value=
                "<?php echo $row['colname'];?>"
                style="border:none;width:50px;"disabled>
                </a>         
                    <?php 
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
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
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
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
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

<?php
require 'footer.php';
?>