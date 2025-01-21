<?php
include('../Config/db.php');
$product_id = $_GET['product_id'];
$sql = "DELETE FROM product_details where id = '$product_id'";

$query = mysqli_query($conn,$sql);
if($query){
    header('location:../products.php');
}
?>

