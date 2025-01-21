<?php
include('../Config/db.php');
$product_id = $_POST['id'];
$product_title = $_POST['product_title'];
$product_category = $_POST['product_category'];
$product_price = $_POST['price'];
$product_quantity = $_POST['quantity'];
$product_description = $_POST['editorContent'];
$isFeatured = isset($_POST['isFeatured'])?1:0;

$sql = "Update product_details set product_title = '$product_title',product_category='$product_category',product_price='$product_price',quantity = '$product_quantity',description='$product_description',isfeatured='$isFeatured' where id = '$product_id'";


$query = mysqli_query($conn,$sql);

if ($query) {
    header('location:../products.php?status=200');
} else {
    header('location:../products.php?status=500');
}