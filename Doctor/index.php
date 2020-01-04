<?php

    require "../db/connect.php";
    $users = $conn->query("SELECT max(id) FROM users")->fetch_array();
    if($users[0] == ''){
        $users = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>Document</title>
</head>

<body style="background : url('../asset/bg.jpg'); background-repeat : no-repeat; background-size : cover;">


    <!--Welcome Message-->
    <div class="container" style="margin-top : 10vh">
        <marquee behavior="" direction="">ประกาศ :</marquee>
        <div class="shadow shadow-lg" style="border : 5px transparent; border-radius : 50px; height : 70vh; background-color : rgba(255,255,255, 0.5);">
            <h1 class="text-center" style="padding-top : 150px;">DoctorAssistant</h1>
            <button class="btn btn-primary d-block mx-auto mb-4" style="font-size : 50px;" onclick="window.location.href='history/'">ประวัติผู้ป่วย <span class="badge badge-light"><?php echo $users[0];?></span></button>
            <button class="btn btn-success d-block mx-auto mb-4" style="font-size : 50px;" onclick="window.location.href='register/'">ลงทะเบียนผู้ป่วยใหม่</button>
            

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