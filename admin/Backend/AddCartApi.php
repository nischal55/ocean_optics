<?php
include('../Config/db.php');

$product_id = $_GET['product_id'];
$customer_id = $_COOKIE['customer_id'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];

if(!isset($_COOKIE['customer_id'])){
    header('location:../../customer-login.php');
}

$sql = "INSERT INTO cart_details (product_id,customer_id,price,quantity) VALUES ('$product_id','$customer_id','$price','$quantity')";

$query = mysqli_query($conn,$sql);
if($query){
    header('location:../../cart.php');
}else{
    echo "Failed to add to cart";
}

?>