<?php
include("../Config/db.php");
$customer_id = $_COOKIE['customer_id'];
$query_customer_email = "SELECT email,full_name FROM customer_details where id = '$customer_id'";
$customer_query_result = mysqli_query($conn,$query_customer_email);
$customer_email_array = mysqli_fetch_assoc($customer_query_result);
$customer_email = $customer_email_array['full_name'];

echo($customer_email);
