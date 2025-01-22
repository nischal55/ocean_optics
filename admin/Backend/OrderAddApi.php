<?php
include('../Config/db.php');
$customer_id = $_COOKIE['customer_id'];
$payment_method = $_POST['payment'];
$total = $_POST['total'];

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
        <input type="text" id="success_url" name="success_url" value="http://localhost/opticalShop/admin/backend/orderAddEsewa.php" required hidden>
        <input type="text" id="failure_url" name="failure_url" value="http://localhost/opticalShop/" required hidden>
        <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required hidden>
        <input type="text" id="signature" name="signature" value="<?php echo ($signature) ?>" required hidden>
        <input value="Submit" type="submit" hidden>
    </form>

<?php
}else{
    $query_cart = "SELECT * FROM cart_details where customer_id = '$customer_id'";
    $result = mysqli_query($conn,$query_cart);
    while($row=mysqli_fetch_assoc($result)){
        $cart_id = $row['id'];
        $product_id = $row['product_id'];
        $customer_id = $row['customer_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];

        $insert_query = "INSERT INTO order_details(product_id,price,quantity,customer_id,order_date,payment_status,order_status,delivery_address,order_code)";
    }
}
?>

<script>
    document.getElementById("esewa").submit();
</script>