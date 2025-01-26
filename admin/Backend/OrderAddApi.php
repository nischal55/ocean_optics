<?php
include('../Config/db.php');
$customer_id = $_COOKIE['customer_id'];
$payment_method = $_POST['payment'];
$total = $_POST['total'];
$delivery_address = $_POST['address'];

$customer_id = $_COOKIE['customer_id'];
$query_customer_email = "SELECT email,full_name FROM customer_details where id = '$customer_id'";
$customer_query_result = mysqli_query($conn,$query_customer_email);
$customer_email_array = mysqli_fetch_assoc($customer_query_result);
$customer_email = $customer_email_array['email'];
$customer_name = $customer_email_array['full_name'];

?>

<?php
if ($payment_method == "esewa") {
    $s = hash_hmac('sha256', 'Message', 'secret', true);
    $amount = $total;
    $transaction_uuid = bin2hex(random_bytes(20));
    $product_code = "EPAYTEST";
    $secret_key = '8gBm/:&EnhH.1/q';
    $message = 'total_amount=' . $amount . ',transaction_uuid=' . $transaction_uuid . ',product_code=' . $product_code;
    $signature = base64_encode(hash_hmac('sha256', $message, $secret_key, true));

?>

    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="esewa">
        <input type="text" id="amount" name="amount" value="<?php echo ($amount) ?>" hidden required>
        <input type="text" id="tax_amount" name="tax_amount" value="0" required hidden>
        <input type="text" id="total_amount" name="total_amount" value="<?php echo ($amount) ?>" required hidden>
        <input type="text" id="transaction_uuid" name="transaction_uuid" value="<?php echo ($transaction_uuid) ?>" required hidden>
        <input type="text" id="product_code" name="product_code" value="EPAYTEST" required hidden>
        <input type="text" id="product_service_charge" name="product_service_charge" value="0" required hidden>
        <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required hidden>
        <input type="text" id="success_url" name="success_url" value="http://localhost/opticalShop/admin/backend/EsewaConfirmationApi.php" required hidden>
        <input type="text" id="failure_url" name="failure_url" value="http://localhost/opticalShop/" required hidden>
        <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required hidden>
        <input type="text" id="signature" name="signature" value="<?php echo ($signature) ?>" required hidden>
        <input value="Submit" type="submit" hidden>
    </form>

<?php
} else {
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
        if($result_add){
            $order_add_status = true;
        }
    }

    if($order_add_status){
        include('sendEmail.php');
        $body = "Your Order has been successfully placed. Your order code is $order_code. You can track your order using the order code";
        sendEmail($customer_email,$customer_name,"Order Successfully Placed",$body);
        $empty_cart = "DELETE from cart_details where customer_id = '$customer_id'";
        $query_result = mysqli_query($conn,$empty_cart);
        header('location:../../index.php');
    }
}
?>

<script>
    document.getElementById("esewa").submit();
</script>