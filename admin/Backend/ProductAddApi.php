<?php
include('../Config/db.php');
$product_title = $_POST['product_title'];
$product_category = $_POST['product_category'];
$product_price = $_POST['price'];
$product_quantity = $_POST['quantity'];
$product_description = $_POST['editorContent'];
$isFeatured = isset($_POST['isFeatured'])?1:0;
$product_image_one = $_FILES['product_image_one']['tmp_name'];
$product_image_two = $_FILES['product_image_two']['tmp_name'];
$product_image_three = $_FILES['product_image_three']['tmp_name'];
$product_image_one_name = $_FILES['product_image_one']['name'];
$product_image_two_name = $_FILES['product_image_two']['name'];
$product_image_three_name = $_FILES['product_image_three']['name'];

$allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
$maxFileSize = 2 * 1024 * 1024;

$uploadDir = 'uploads/products/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$uniqueName_one = uniqid('', true) . '-' . $product_image_one_name;
$uniqueName_two = uniqid('', true) . '-' . $product_image_two_name;
$uniqueName_three = uniqid('', true) . '-' . $product_image_three_name;

$destination_one = $uploadDir . $uniqueName_one;
$destination_two = $uploadDir . $uniqueName_two;
$destination_three = $uploadDir . $uniqueName_three;
if (move_uploaded_file($product_image_one, $destination_one)) {
    if (move_uploaded_file($product_image_two, $destination_two)) {
        if (move_uploaded_file($product_image_three, $destination_three)) {
            $sql = "INSERT INTO product_details(product_title,product_category,isfeatured,quantity,description,product_image_one,product_image_two,product_image_three,product_price) values('$product_title','$product_category','$isFeatured','$product_quantity','$product_description','$destination_one','$destination_two','$destination_three','$product_price')";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                header('location:../products.php?status=200');
            } else {
                header('location:../products.php?status=500');
            }
        }
    }
}

