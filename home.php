<?php
session_start();

require "db/connect.php";

$qr = $_SESSION['qr'];
$fetch = $conn->query("SELECT * FROM users WHERE qr_id = $qr")->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/home.css">
    <title>DoctorAssistant</title>
</head>

<body>

    <div id="main">
        <!--Top Menu-->
        <div class="container">
            <div class="mt-2 d-flex flex-row">
                <h3 class="mt-2" id="menu">ยาของฉัน</h3>
                <img src="<?php echo $fetch['profile_img'] ?>" id="profile" width="50px;" class="img-fluid d-block ml-auto shadow shadow-sm" style="border : 2 px solid ; border-radius : 50px;" alt="">

            </div>
        </div>

        <!--Pill-->
        <div class="container mt-5" id="all-pill">
            <div class="row">
                <div class="col-12 d-flex flex-row mb-3">
                    <img src="<?php echo $fetch['profile_img'] ?>" width="105px" alt="">
                    <h5 class="ml-3 mt-5">Abacavir (อะบาคาเวียร์)</h5>
                </div>
                <div class="col-12 d-flex flex-row mb-3">
                    <img src="<?php echo $fetch['profile_img'] ?>" width="105px" alt="">
                    <h5 class="ml-3 mt-5">Benzoyl Peroxide (เบนโซอิลเพอร์ออกไซด์)</h5>
                </div>

                <div class="col-12 d-flex flex-row" style="margin-bottom : 100px;">
                    <button class="btn btn-warning mx-auto">แสกนยาเพิ่มเติม <i class="fas fa-qrcode"></i></button>
                </div>



            </div>
        </div>

        <!--NavBar-->
        <div class="fixed-bottom bg-light shadow shadow-lg">
            <div class="container">
                <div class="row">
                    <div class="col-4 pt-2" id="map">
                        <i class="fas fa-map-marker-alt d-block mx-auto" style="font-size : 30px; color : red"></i>
                        <p class="text-center mt-2" style="font-size : 12px;">ร้านยาใกล้ฉัน</p>
                    </div>
                    <div class="col-4 pt-2" id="pill">
                        <i class="fas fa-capsules d-block mx-auto" style="  font-size : 30px;color : grey"></i>
                        <p class="text-center mt-2" style="font-size : 12px;">ยาของฉัน</p>
                    </div>
                    <div class="col-4 pt-2" id="notification">
                        <div class="d-flex flex-row">
                            <i class="fas fa-bell d-block mx-auto" style="font-size : 30px"></i>
                            <span class="badge badge-danger" style="position : fixed ; left : 310px">99+</span>
                        </div>
                        <p class="text-center mt-2" style="font-size : 12px;">การแจ้งเตือน</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Profile-->
    <div class="container-fluid mt-3" id="profile-page" style="display : none">
        <div>
            <button id="close" class="btn btn-dark d-block ml-auto" style="border : 2px solid transparent; border-radius : 100px;">&times</button>
        </div>
        <div class="d-flex flex-column">
            <!--Profile_Img-->
            <img src="<?php echo $fetch['profile_img'] ?>" width="200px" class="mx-auto" style="border : 2px solid transparent; border-radius : 100px;" alt="">
            <!--<form enctype="multipart/form-data" id="profile" class="mt-3">
                <input type="file" name="pro_img" id="">
            </form>
            -->
            <h4 class="text-center mt-2 mb-5">ชื่อ : ศรชัย สมสกุล</h4>
            <div id="status" style="position : fixed; top:275px;"></div>
            <div id="form" class="">
                <form action="" id="change">
                    <label for="telephone">เบอร์โทรศัพท์</label>
                    <input type="text" id="tel" class="form-control" value="0966353408">
                    <label for="telephone" class="mt-1">ที่อยู่</label>
                    <input type="text" id="home" class="form-control" value="98/43 หมู่บ้านเสริมทรัพย์ ถนนวิรัชหงษ์หยก ตำบลวิชิต อำเภอเมือง จังหวัดถูเก็ต">
                    <input id="submit" type="submit" class="btn btn-success mb-3 d-block mx-auto mt-2" value="บันทึกข้อมูล">
                </form>
            </div>

            <button class="btn btn-primary">QRcode ของฉัน <i class="fas fa-qrcode"></i></button>
            <button class="btn btn-secondary mt-2">สอบถามเพิ่มเติม</button>
            <button class="btn btn-danger mt-2" id="logout">ออกจากระบบ</button>

        </div>
    </div>

    <!--Pharmacy-->
    <div class="container-fluid mt-5" id="map-page" style="display : none; margin-bottom : 120px;">
        <div class="card mb-3" style="width: 20rem;">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title">Lorem ipsum, dolor sit amet consectetur</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad molestias sequi assumenda, su</p>
                    <a href="https://goo.gl/maps/4Ezk24sHmsjy35PFA" class="btn btn-warning">เส้นทาง</a>
                </div>
            </div>
        </div>
    </div>

    <!--Notification-->
    <div class="container-fluid mt-5" id="noti-page" style="display : none; margin-bottom : 120px;">
        <div class="card mb-3" style="height: 6rem;" id="no1">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title"><b>หมอนัด 1 ธันวาคม </b></h5>
                    <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="height: 6rem;">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title"><b>หมอนัด 1 ธันวาคม </b></h5>
                    <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="height: 6rem;">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title"><b>หมอนัด 1 ธันวาคม </b></h5>
                    <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="height: 6rem;">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title"><b>หมอนัด 1 ธันวาคม </b></h5>
                    <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="height: 6rem;">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title"><b>หมอนัด 1 ธันวาคม </b></h5>
                    <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="height: 6rem;">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <h5 class="card-title"><b>หมอนัด 1 ธันวาคม </b></h5>
                    <p class="card-text">แตะเพื่อแสดงเพิ่มเติม</p>
                </div>
            </div>
        </div>
    </div>




    <script src=" node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="css/fontawesome/js/all.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>