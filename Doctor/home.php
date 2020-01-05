<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: index.php");
}
require "../db/connect.php";
$users = $conn->query("SELECT max(id) FROM users")->fetch_array();
if ($users[0] == '') {
    $users = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Document</title>
</head>

<body style="background : url('../asset/bg.png');">


    <!--Welcome Message-->
    <div class="container" style="margin-top : 10vh">
        <marquee behavior="" direction="">ประกาศ :</marquee>

        <div class="shadow shadow-lg" style="border : 5px transparent; border-radius : 50px; height : 70vh; background-color : white;">
        <button class="btn btn-primary m-5" onclick="window.location.href='logout.php'"><i class="fas fa-arrow-left"></i></button>
            <h1 class="text-center" style="padding-top : 60px;">DoctorAssistant</h1>
            <div class="text-center mt-5">
                <button class="btn btn-info" style="font-size : 30px;" onclick="window.location.href='history/'">ประวัติผู้ป่วย <span class="badge badge-light"><?php echo $users[0]; ?></span></button>
                <button class="btn btn-warning" style="font-size : 30px;" onclick="window.location.href='register/'">ลงทะเบียนผู้ป่วยใหม่</button>
                <button class="btn btn-primary" style="font-size : 30px;" onclick="window.location.href='pill/'">ข้อมูลยา</button>
                <button class="btn btn-success" style="font-size : 30px;" onclick="window.location.href='mission/'">คนไข้</button>
            </div>


        </div>
    </div>

    <!--New Patient-->
    <div class="container">


    </div>





    <script src="../node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="../css/fontawesome/js/all.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>