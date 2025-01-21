<?php
include("../Config/db.php");
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$generated_otp = $_POST['otp'];
$user_otp = $_POST['user_otp'];

if ($user_otp != $generated_otp) {
    header('Location: ../customer-signup.php?error=OTP does not match');
    exit();
}

$sql = "INSERT into customer_details(full_name,username,password,email,address,contact)values('$fullname','$username','$hashed_password','$email','$address','$contact')";

if ($conn->query($sql) === TRUE) {
    header('Location: ../../customer-signup.php?success=Account created successfully');
} else {
    header('Location: ../../customer-signup.php?error=Account creation failed');
}



?>