<?php
$expiry_time = time() - 3600;
setcookie('username', '', $expiry_time, "/");
setcookie('token','',$expiry_time,"/");
setcookie('customer_id','',$expiry_time,"/");
header('location:../../customer-Login.php');
?>