<?php
include("admin/Backend/sendEmail.php");
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];
$address = $_POST['address'];
$contact = $_POST['contact'];

if ($password != $cpassword) {
    header('Location: ../customer-signup.php?error=Password does not match');
    exit();
}

function generateOTP()
{
    return rand(100000, 999999);
}
$generated_otp = generateOTP();
$email_status = sendEmail($email, $fullname, "OTP CODE", "Your OTP code is: " . $generated_otp);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="Assets/style.css">
<form action="admin/backend/customerRegistrationApi.php" method="post">
    <div class="mb-3 col-4 border p-3 mx-auto mt-5 shadow-sm">
        <h3 class="text-center p-2">OTP Verification</h3>
        <label for="exampleInputPassword1" class="form-label">Enter OTP:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="user_otp"><br>
        <!-- Hidden input fields to store the data -->
        <input type="text" name="fullname" value="<?php echo ($fullname) ?>" id="" class="w-100 " style="height: 2.5rem;" hidden>
        <input type="text" name="username" id="" value="<?php echo ($username) ?>" class="w-100 " style="height: 2.5rem;" hidden>
        <input type="password" name="password" id="" value="<?php echo ($password) ?>" class="w-100 " style="height: 2.5rem;" hidden>
        <input type="password" name="cpassword" id="" value="<?php echo ($cpassword) ?>" class="w-100 " style="height: 2.5rem;" hidden>
        <input type="email" name="email" id="" class="w-100 " value="<?php echo ($email) ?>" style="height: 2.5rem;" hidden>
        <input type="text" name="address" id="" class="w-100 " value="<?php echo ($address) ?>" style="height: 2.5rem;" hidden>
        <input type="text" name="contact" id="" class="w-100 " value="<?php echo ($contact) ?>" style="height: 2.5rem;" hidden>
        <input type="text" name="otp" id="" class="w-100 " value="<?php echo ($generated_otp) ?>" style="height: 2.5rem;" hidden>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>