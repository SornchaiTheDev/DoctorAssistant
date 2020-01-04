<?php

require "../db/connect.php";

$user = $_POST['username'];
$pwd = $_POST['password'];
$result = $conn->query("SELECT * FROM admin WHERE username = '$user' AND password = '$pwd'")->fetch_assoc();

if($result['username'] != ''){
    echo "<p class='text-success'>กำลังเข้าสู่ระบบ!</p>";
    echo "<script>
        $('#loading').show()
        setTimeout(function(){
            window.location.href='home.php'
        },2000)
    </script>";
}else{
    echo "<p class='text-danger'>ชื่อผู้ใช้/รหัสผ่านผิด!</p>";
   
}
