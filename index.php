<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Optical Shop</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="vendors/linericon/style.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css" />
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
  <!--================Header Menu Area =================-->
  <?php include('inc/navbar.php') ?>

  <!--================Home Banner Area =================-->
  <section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
            <p class="sub text-uppercase">Sunglasses Collection</p>
            <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
            <h4>Shop the finest eyewear online for every style, need, and budget!</h4>
            <a class="main_btn mt-40" href="#">View Collection</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!-- Start feature Area -->
  <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Money back gurantee</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>Free Delivery</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>Alway support</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Secure payment</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature Area -->

  <!--================ Feature Product Area =================-->
  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Featured product</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <?php
        include('admin/Config/db.php');

        $sql = "SELECT * FROM product_details where isfeatured = 1";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
          $id = $row['id'];
          $product_title = $row['product_title'];
          $product_price = $row['product_price'];
          $product_image_one = $row['product_image_one'];
        ?>
          <div class="col-lg-4 col-md-6">
            <div class="single-product border">
              <div class="product-img">
                <img class="img-fluid w-100" src="admin/Backend/<?php echo ($product_image_one) ?>" alt="" />
                <div class="p_icon">
                  <a href="single-product.php?id=<?php echo ($id) ?>">
                    <i class="ti-eye"></i>
                  </a>
                  <a href="" onclick="confirm('Are you sure you want to add this product to wishlist?')">
                    <i class="ti-heart"></i>
                  </a>
                  <button  onclick="addToCart(<?php echo ($id) ?>, <?php echo ($product_price) ?>)" style="background-color:white; border:none;cursor:pointer;width:35px;height:35px;transition: all 0.3s ease;" class="rounded-circle" onmouseover="this.style.backgroundColor='#85d441';this.style.color='white'"  onmouseout="this.style.backgroundColor='white';this.style.color='black'">
                    <i class="ti-shopping-cart"></i>
                  </button>
                </div>
              </div>
              <div class="product-btm">
                <a href="single-product.php?id=<?php echo ($id) ?>" class="d-block">
                  <h4><?php echo ($product_title) ?></h4>
                </a>
                <div class="mt-3">
                  <span class="mr-4">NPR <?php echo ($product_price) ?></span>
                  <del>NPR 1500</del>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->
  <section class="offer_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="offset-lg-4 col-lg-6 text-center">
          <div class="offer_content">
            <h3 class="text-uppercase mb-40">all Glasses collection</h3>
            <h2 class="text-uppercase">20% off</h2>
            <a href="#" class="main_btn mb-20 mt-5">Discover Now</a>
            <p>Limited Time Offer</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  <section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>new products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <?php
      $sql = "SELECT * FROM product_details order by id desc limit 1";
      $new_product = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($new_product)) {
        $id = $row['id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_image_one = $row['product_image_one'];
      ?>
        <div class="row">
          <div class="col-lg-6">
            <div class="new_product">
              <h5 class="text-uppercase">collection of 2019</h5>
              <h3 class="text-uppercase"><?php echo ($product_title) ?></h3>
              <div class="product-img">
                <img class="img-fluid" src="admin/Backend/<?php echo ($product_image_one) ?>" width="200" alt="" />
              </div>
              <h4>NPR <?php echo ($product_price) ?></h4>
              <a href="admin/Backend/AddCartApi.php?product_id=<?php echo ($id) ?>&quantity=1&price=<?php echo ($product_price) ?>" onclick="confirm('Are you sure you want to add this product to cart?')" class="main_btn">Add to cart</a>
            </div>
          </div>
        <?php }
        ?>


        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
            <?php
            $sql = "SELECT * FROM product_details ORDER BY id DESC LIMIT 4 OFFSET 1;";
            $new_products = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($new_products)) {
              $id = $row['id'];
              $product_title = $row['product_title'];
              $product_price = $row['product_price'];
              $product_image_one = $row['product_image_one'];

            ?>

              <div class="col-lg-6 col-md-6">
                <div class="single-product border">
                  <div class="product-img">
                    <img class="img-fluid w-100" src="admin/Backend/<?php echo ($product_image_one) ?>" alt="" />
                    <div class="p_icon">
                      <a href="single-product.php?id=<?php echo ($id) ?>">
                        <i class="ti-eye"></i>
                      </a>
                      <a href="" onclick="confirm('Are you sure you want to add this product to wishlist?')">
                        <i class="ti-heart"></i>
                      </a>
                      <button  onclick="addToCart(<?php echo ($id) ?>, <?php echo ($product_price) ?>)" style="background-color:white; border:none;cursor:pointer;width:35px;height:35px;transition: all 0.3s ease;" class="rounded-circle" onmouseover="this.style.backgroundColor='#85d441';this.style.color='white'"  onmouseout="this.style.backgroundColor='white';this.style.color='black'">
                    <i class="ti-shopping-cart"></i>
                  </button>
                    </div>
                  </div>
                  <div class="product-btm">
                    <a href="single-product.php?id=<?php echo ($id) ?>" class="d-block">
                      <h4 class="text-truncate"><?php echo ($product_title) ?></h4>
                    </a>
                    <div class="mt-3">
                      <span class="mr-4">NPR. <?php echo ($product_price) ?></span>

                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        </div>
    </div>
  </section>
  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Inspired products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <?php
        $sql = "SELECT * FROM product_details ORDER BY id DESC LIMIT 8 ;";
        $new_products = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($new_products)) {
          $id = $row['id'];
          $product_title = $row['product_title'];
          $product_price = $row['product_price'];
          $product_image_one = $row['product_image_one'];

        ?>
          <div class="col-lg-3 col-md-6">
            <div class="single-product border">
              <div class="product-img">
                <img class="img-fluid w-100" src="admin/Backend/<?php echo ($product_image_one) ?>" alt="" />
                <div class="p_icon">
                  <a href="single-product.php?id=<?php echo ($id) ?>">
                    <i class="ti-eye"></i>
                  </a>
                  <a href="#" onclick="confirm('Are you sure you want to add this product to wishlist?')">
                    <i class="ti-heart"></i>
                  </a>
                  <button  onclick="addToCart(<?php echo ($id) ?>, <?php echo ($product_price) ?>)" style="background-color:white; border:none;cursor:pointer;width:35px;height:35px;transition: all 0.3s ease;" class="rounded-circle" onmouseover="this.style.backgroundColor='#85d441';this.style.color='white'"  onmouseout="this.style.backgroundColor='white';this.style.color='black'">
                    <i class="ti-shopping-cart"></i>
                  </button>
                </div>
              </div>
              <div class="product-btm">
                <a href="single-product.php?id=<?php echo ($id) ?>" class="d-block">
                  <h4 class="text-truncate"><?php echo ($product_title) ?></h4>
                </a>
                <div class="mt-3">
                  <span class="mr-4">NPR. <?php echo ($product_price) ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!--================ End Inspired Product Area =================-->

  <!--================ start footer Area  =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default">Subscribe</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://nischalshakya2059.com" target="_blank">Nischal Shakya</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/stellar.js"></script>
  <script src="vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="vendors/isotope/isotope-min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/theme.js"></script>
  <script>
      function addToCart(productId, productPrice) {
        if (confirm('Are you sure you want to add this product to cart?')) {
          // Redirect to the cart API
          window.location.href = `admin/Backend/AddCartApi.php?product_id=${productId}&quantity=1&price=${productPrice}`;
        }
      }
    </script>
</body>

</html>