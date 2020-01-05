<?php

require "../../db/connect.php";
$qr = $_GET['qr'];
$fetch = $conn->query("SELECT * FROM Users WHERE qr_id = '$qr'")->fetch_assoc();
$pill = $conn->query("SELECT * FROM user_pill WHERE qr_id = '$qr'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Assistant</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
</head>

<body style="background : url('../../asset/bg.png');">
    <div class="container">
        <div class="shadow shadow-lg mt-5" style="border : 2px transparent; border-radius : 50px; background-color : rgba(255,255,255,0.7);">
            <button class="btn btn-primary mt-5 ml-5" onclick="window.location.href='index.php'"><i class="fas fa-arrow-left"></i></button>
            <img src="../../<?php echo $fetch['profile_img']; ?>" width="200" class="d-block mx-auto" style='border : 2px transparent; border-radius : 100%;' alt="">
            <h4 class="text-center mt-5">ชื่อผู้ใช้ : <?php echo $fetch['user_name']; ?></h4>
            <h5 class="mt-3 ml-3">รายชื่อยา</h5>
            <div class="mb-5 container">
                <table class="table bg-white mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อยา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            $count = 0;
                            $pills = explode(",", $pill['pill']);
                            $pill_count = count($pills);

                            if ($pills[0] != '') {
                                while ($count < $pill_count) {
                                    $id = $count + 1;
                                    echo '
                                <tr>
                                    <th scope="row">' . $id . '</th>
                                    <td>' . $pills[$count] . '</td>
                                </tr>';
                                    $count++;
                                }
                            }else{
                                echo '  <tr>
                                <th scope="row">-</th>
                                <td>ไม่พบยา</td>
                            </tr>';
                            }

                            ?>


                        </tr>
                    </tbody>
                </table>
                <div class="pb-5"></div>
            </div>
        </div>
    </div>


    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>