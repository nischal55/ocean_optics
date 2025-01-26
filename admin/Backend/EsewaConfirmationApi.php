<?php
include('../Config/db.php');
$customer_id = $_COOKIE['customer_id'];
$query_cart = "SELECT * FROM cart_details where customer_id = '$customer_id'";
$result = mysqli_query($conn, $query_cart);
$query_order = "SELECT * FROM order_details ORDER BY order_id DESC LIMIT 1";
$result_orders = mysqli_query($conn, $query_order);
$order_code = "TI-01";
if (mysqli_num_rows($result_orders) > 0) {
    $order_code_array = mysqli_fetch_assoc($result_orders);
    $order_code_db = explode("-", $order_code_array['order_code']);
    $new_order_number = (int)$order_code_db[1] + 1;
    $order_code = "TI-" . str_pad($new_order_number, 2, "0", STR_PAD_LEFT);
}

$order_add_status = false;

while ($row = mysqli_fetch_assoc($result)) {
    $cart_id = $row['id'];
    $product_id = $row['product_id'];
    $customer_id = $row['customer_id'];
    $quantity = $row['quantity'];
    $price = $row['price'];
    $currentTime = date('Y-m-d');

    $insert_query = "INSERT INTO order_details(product_id,price,quantity,customer_id,order_date,payment_status,order_status,delivery_address,order_code)value('$product_id','$price','$quantity','$customer_id','$currentTime','pending','pending','$delivery_address','$order_code')";

    $result_add = mysqli_query($conn, $insert_query);
    if ($result_add) {
        $order_add_status = true;
    }
}

if ($order_add_status) {
    include('sendEmail.php');
    $body = "Your Order has been successfully placed. Your order code is $order_code. You can track your order using the order code";
    sendEmail($customer_email, $customer_name, "Order Successfully Placed", $body);
    $empty_cart = "DELETE from cart_details where customer_id = '$customer_id'";
    $query_result = mysqli_query($conn, $empty_cart);
    header('location:../../index.php');
}
