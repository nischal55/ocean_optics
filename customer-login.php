<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optical Shop | User Login</title>
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
</head>

<body>
    <div class="mx-auto mt-5 shadow-sm" style="width: 30rem;height:32rem;">
        <h3 class="p-4 text-center">Customer Login</h3>
        <?php
        if (isset($_GET['status'])) {
        ?>
            <div class="alert alert-danger mx-5" role="alert">
                Invalid Username or Password
            </div>

        <?php
        }

        ?>
        <form action="admin/Backend/CustomerLoginApi.php" method="post" class="px-5">
            <label for="">Username</label><br>
            <input type="text" name="username" id="" class="w-100 " style="height: 2.5rem;"><br><br>
            <label for="">Password</label><br>
            <input type="password" name="password" id="" class="w-100 " style="height: 2.5rem;"><br>
            <a href="">Forget Password?</a><br><br>
            <input type="submit" value="Login" class="btn btn-primary w-100" style="height: 3rem;"><br><br>
            <a href="customer-signup.php" class="btn btn-success w-100" style="height: 3rem;">Sign Up</a>
        </form>

    </div>
</body>

</html>