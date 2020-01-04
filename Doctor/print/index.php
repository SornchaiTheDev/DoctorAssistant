<?php

require "../../db/connect.php";
$id_card = $_GET['idcard'];
$user = $conn->query("SELECT * FROM Users WHERE id_card = $id_card")->fetch_assoc();
$info = $conn->query("SELECT * FROM info WHERE qr_id = " . $user['qr_id'] . "")->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
    <button class="btn btn-primary mb-4 d-print-none" onclick="window.location.href='../'"><i class="fas fa-arrow-left"></i></button>
        <div style="border : 10px solid">
            <div class="d-flex flex-row pt-3 pl-5">
                <img src="../../<?php echo $user['profile_img']; ?>" class="mr-5" style="border : 2px transparent; border-radius : 100%" width="150" height="150" alt="">
                <div class="flex-column ml-5 pl-5">
                    <h3>เลขประจำตัว : <?php echo $user['qr_id']; ?></h3>
                    <p><b>ชื่อผู้ป่วย : </b><?php echo $user['user_name']; ?></p>
                    <p><b>ที่อยู่ :</b> <?php echo $info['home']; ?></p>
                    <p><b>วันเกิด :</b> <?php echo $user['birthday']; ?></p>
                </div>
                <div class="flex-row ml-5 p-3 pl-4">
                   <div id="qrcode"></div>
                </div> 
            </div>

        </div>
    </div>

    <script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../js/qrcode.js"></script>
    <script>
     var qrcode = new QRCode("qrcode", {
                text: "<?php echo "https://192.168.1.13/DoctorAssistant?qr=" . $user['qr_id'] ?>",
                width: 120,
                height: 120,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
    </script>
</body>

</html>