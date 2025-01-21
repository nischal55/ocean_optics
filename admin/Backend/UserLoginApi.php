<?php
include('../Config/db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "Select * from user_details";
$query= mysqli_query($conn,$sql);
if($query){
    while($row=mysqli_fetch_assoc($query)){
        $username_db = $row['username'];
        $password_db = $row['password'];

        if($username==$username_db){
            if(password_verify($password,$password_db)){
                session_start();
                $_SESSION['username'] = "$username";
                $_SESSION['login_status'] = "true";
                header('location:../index.php');
                break;
            }else{
                header('location:../Login.php?status=400');
            }
        }else{
            header('location:../Login.php?status=400');
        }
    }

}


?>