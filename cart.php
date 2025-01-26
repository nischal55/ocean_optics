<?php
include('admin/Config/db.php');

if (!isset($_COOKIE['customer_id'])) {
  header('customer-login.php');
}

$customer_id = $_COOKIE['customer_id'];
$customer_name = $_COOKIE['customer_name'];
$sql = "Select cart_details.id,product_title,cart_details.price,cart_details.quantity, product_image_one from cart_details join product_details on cart_details.product_id = product_details.id join customer_details on cart_details.customer_id = customer_details.id where customer_id = $customer_id";
$total = 0;
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Optical Shop</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="vendors/linericon/style.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
  <?php include('inc/navbar.php') ?>

  <!--================Home Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div
          class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Cart</h2>
            <p>Very us move be blessed multiply night</p>
          </div>
          <div class="page_link">
            <a href="index.html">Home</a>
            <a href="cart.html">Cart</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Cart Area =================-->
  <section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($query)) {
                $cart_items[] = $row;
                $cart_id = $row['id'];
                $product_title = $row['product_title'];
                $product_price = $row['price'];
                $quantity = $row['quantity'];
                $image = $row['product_image_one'];
                $total = $total + $product_price * $quantity;

              ?>
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="admin/Backend/<?php echo ($image) ?>"
                          alt=""
                          style="width:100px;" />
                      </div>
                      <div class="media-body">
                        <p><?php echo ($product_title) ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5> <?php echo ($product_price) ?></h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <input
                        type="text"
                        name="qty"
                        id="sst"
                        maxlength="12"
                        value="<?php echo ($quantity) ?>"
                        title="Quantity:"
                        class="input-text qty"
                        disabled />
                    </div>
                  </td>
                  <td>
                    <a href="" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              <?php
              }
              ?>

              <tr class="out_button_area">
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="checkout_btn_inner d-flex">
                    <a class="gray_btn " href="index.php">Continue Shopping</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Proceed to Payment
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-body text-start p-4">
                            <h5 class="modal-title text-uppercase mb-5" id="exampleModalLabel"><?php echo ($customer_name) ?></h5>
                            <h4 class="mb-5">Thanks for your order</h4>
                            <p class="mb-0">Payment summary</p>
                            <hr class="mt-2 mb-4"
                              style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">


                            <?php
                            $total = 0;
                            foreach ($cart_items as $row) {
                              $cart_id = $row['id'];
                              $product_title = $row['product_title'];
                              $product_price = $row['price'];
                              $quantity = $row['quantity'];
                              $image = $row['product_image_one'];

                              $total = $total + ($product_price * $quantity);
                            ?>

                              <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0"><?php echo ($product_title) ?></p>
                                <p class="text-muted mb-0"><?php echo ($quantity) ?></p>
                                <p class="text-muted mb-0"><?php echo ($product_price) ?></p>
                              </div>
                            <?php
                            }
                            ?>
                            <div class="d-flex justify-content-between">
                              <p class="small mb-0">Shipping</p>
                              <p class="small mb-0">100</p>
                            </div>

                            <div class="d-flex justify-content-between">
                              <p class="fw-bold">Total</p>
                              <p class="fw-bold">NPR. <?php echo ($total + 100) ?></p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                              <form action="admin/backend/OrderAddApi.php" method='post'>
                                <input type="radio" name="payment" value="esewa" id="esewa" style="cursor:pointer;" requried>
                                <label for="esewa" style="cursor:pointer;">
                                  <img src="img/esewa_og.webp" width="100" alt="">
                                </label>
                                <input type="radio" name="payment" value="cod" id="cod" style="cursor:pointer;" required>
                                <label for="cod" style="cursor:pointer;">
                                  <img src="img/cash.avif" width="100" alt="">
                                </label>
                                <br>
                                <label for="">Delivery Address</label><br>
                                <input type="text" name="address" id="" class="w-100" required>
                                <input type="text" name="total" value="<?php echo($total+100) ?> " hidden>
                            </div>

                          </div>
                          <div class="modal-footer d-flex justify-content-center border-top-0 py-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg mb-1" style="background-color: #35558a;">
                              Confirm Your Order
                          </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!--================End Cart Area =================-->

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
          </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
  <script src="js/mail-script.js"></script>
  <script src="vendors/jquery-ui/jquery-ui.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script>
  <script src="js/theme.js"></script>
</body>

</html>