<?php
include('../Config/db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "Select * from customer_details";
$query= mysqli_query($conn,$sql);
if($query){
    while($row=mysqli_fetch_assoc($query)){
        $username_db = $row['username'];
        $password_db = $row['password'];

        if($username==$username_db){
            if(password_verify($password,$password_db)){
                include('token.php');
                $token_value = $username.$token;
                $hashed_token = password_hash($token_value,PASSWORD_DEFAULT);
                $cookie_name = "username";
                $cookie_value = $username;
                $expiry_time = time() + (24 * 60 * 60);
                setcookie($cookie_name, $cookie_value, $expiry_time, "/");
                setcookie('token',$hashed_token,$expiry_time,"/");
                setcookie('customer_id',$row['id'],$expiry_time,"/");
                setcookie('customer_name',$row['full_name'],$expiry_time,"/");
                header('location:../../index.php');
                break;
            }else{
                header('location:../../customer-login.php?status=400');
            }
        }else{
            header('location:../../customer-login.php?status=400');
        }
    }

}


?>