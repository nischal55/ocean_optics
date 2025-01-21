<?php
include ('../Config/db.php');
$category = $_POST['category'];
$sql = "Insert into product_category(Category_name) values('$category')";
$query = mysqli_query($conn, $sql);
if ($query) {
    header('location:../category.php');
} else {
    header('location:../category.php?status=400');

}

?>