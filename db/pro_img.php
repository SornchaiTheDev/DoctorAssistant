<?php
session_start();
require "connect.php";

$pic = $_FILES['pro_img'];
$des = "user_pic/" . $_SESSION['qr'] . ".jpg";
$file_name = $_FILES['pro_img']['tmp_name'];
if(($_FILES['pro_img']['type'] == 'image/jpg') || ($_FILES['pro_img']['type'] == 'image/png') || ($_FILES['pro_img']['type'] == 'image/jpeg')){
    if($_FILES['pro_img']['size'] < 500000){
        move_uploaded_file($file_name , $des);        
        $conn->query("UPDATE users SET profile_img = 'db/$des' WHERE qr_id = ".$_SESSION['qr']."   ");
    }else{
        echo "ไฟล์ใหญ่เกินไป";
    }
}else {
    echo "รองรับเฉพาะไฟล์ jpg png jpeg";
}


