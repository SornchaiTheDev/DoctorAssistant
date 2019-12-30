<?php

require "../../db/connect.php";
$qr = $_GET['qr'];
$fetch = $conn->query("SELECT * FROM Users WHERE qr_id = '$qr'")->fetch_assoc();
$pill = $conn->query("SELECT * FROM pill WHERE qr_id = '$qr'");
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

<body>
    <div class="container">
        <div class="jumbotron">
            <button class="btn btn-primary" onclick="window.location.href='index.php'"><i class="fas fa-arrow-left"></i></button>
            <img src="../../<?php echo $fetch['profile_img']; ?>" width="200" class="d-block mx-auto" alt="">
            <h4 class="text-center mt-5">ชื่อผู้ใช้ : <?php echo $fetch['user_name']; ?></h4>
            <h5 class="mt-3">รายชื่อยา</h5>
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
                        while ($row = mysqli_fetch_array($pill)) {
                            echo '
                            <tr><th scope="row">' . $i . '</th>
                            <td>' . $row["pill_name"] . '</td></tr>';
                            $i++;
                        }
                        ?>


                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>