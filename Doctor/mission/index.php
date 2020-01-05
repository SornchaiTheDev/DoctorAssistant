<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../../css/font.css">
    <title>DoctorAssistant</title>
</head>

<body style="background : url('../../asset/bg.png');">
    <div class="container d-flex  justify-content-center" style="margin-top : 30vh">
        <div class="shadow shadow-lg" style="border : 2px transparent; border-radius : 50px; width : 400px; background-color : white">
        <button class="btn btn-primary mb-4 d-print-none m-4" onclick="window.location.href='../home.php'"><i class="fas fa-arrow-left"></i></button>
            <div class="p-4">
                <h4 class="text-center">เลขประจำตัวคนไข้</h4>
                <form class="form-group" action="home.php" method="POST">
                    <label for="patient">เลขประจำตัวคนไข้</label>
                    <input class="form-control" type="text" name="qr_id" id="qr_id">
                    <div class="d-flex flex-column mt-3">
                        <input class="btn btn-primary" type="submit" value="ค้นหา">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>

</html>