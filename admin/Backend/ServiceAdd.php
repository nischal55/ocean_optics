<?php
include('../Config/db.php');
$service_title = $_POST['service_title'];
$service_description = $_POST['editorContent'];
$service_category = $_POST['service_category'];
$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $maxFileSize = 2 * 1024 * 1024; 

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if ($fileError === 0) {
        if (in_array($fileType, $allowedTypes)) {
            if ($fileSize <= $maxFileSize) {
                
                $uniqueName = uniqid('', true) . '-' . $fileName;

                $destination = $uploadDir . $uniqueName;
                if (move_uploaded_file($fileTmpName, $destination)) {
                    $sql = "INSERT INTO services(service_title,service_description,category_id,service_image) values('$service_title','$service_description','$service_category','$destination')";

                    $query= mysqli_query($conn,$sql);

                    if($query){
                        header('location:../Services.php?status=200');
                    }else{
                        header('location:../Services.php?status=500');
                    }
                } else {
                    header('location:../Services.php?status=500');
                }
            } else {
                header('location:../Services.php?status=size');
            }
        } else {
            header('location:../Services.php?status=format');
        }
    } else {
        header('location:../Services.php?status=500');
    }

