<?php
session_start();

require "db/connect.php";
if (!isset($_SESSION['qr'])) {
    header("Location:index.php");
}

$qr = $_SESSION['qr'];
$fetch = $conn->query("SELECT * FROM Users WHERE qr_id = $qr")->fetch_assoc();
$info = $conn->query("SELECT * FROM info WHERE qr_id = $qr")->fetch_assoc();
$max = mysqli_fetch_array($conn->query("SELECT MAX(id) FROM notification"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/font.css">
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



        <!--NavBar-->
        
        <div class="fixed-bottom bg-light shadow shadow-lg">
            <div class="container">
                <div class="row">
                    <div class="col-4 pt-2" id="map">
                        <i class="fas fa-map-marker-alt d-block mx-auto" style="font-size : 30px;"></i>
                        <p class="text-center mt-2" style="font-size : 12px;">ร้านยาใกล้ฉัน</p>
                    </div>
                    <div class="col-4 pt-2" id="pill">
                        <i class="fas fa-capsules d-block mx-auto" style="  font-size : 30px;color : grey"></i>
                        <p class="text-center mt-2" style="font-size : 12px;">ยาของฉัน</p>
                    </div>
                    <div class="col-4 pt-2" id="notification">
                        <div class="d-flex flex-row">
                            <i class="fas fa-bell d-block mx-auto" style="font-size : 30px"></i>
                            <span class="badge badge-danger" id="noti_count" style="position : absolute ; left : 60px"></span>
                        </div>
                        <p class="text-center mt-2" style="font-size : 12px;">การแจ้งเตือน</p>
                    </div>
                </div>

            </div>
        </div>

        <!--Pill-->
        <div class="container mt-3 mb-3" id="all-pill">
        </div>
        <!--Pharmacy-->
        <div class="container-fluid mt-5" id="map-page" style="display : none; margin-bottom : 120px;">
            <div id="map_show"></div>
        </div>

        <!--Notification-->
        <div class="container-fluid mt-3">
            <div id="noti-page" style="display : none;" class="mt-5"></div>
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

            <h4 class="text-center mt-2 mb-5">ชื่อ : <?php echo $fetch['user_name'] ?></h4>
            <div id="status" style="position : fixed; top:275px;"></div>
            <div id="form" class="">
                <form action="" id="change">
                    <label for="telephone">เบอร์โทรศัพท์</label>
                    <input type="text" id="tel" class="form-control" value="0<?php echo $info['telephone'] ?>">
                    <label for="telephone" class="mt-1">ที่อยู่</label>
                    <input type="text" id="home" class="form-control" value="<?php echo $info['home'] ?>">
                    <input id="submit" type="submit" class="btn btn-success mb-3 d-block mx-auto mt-2" value="แก้ไขข้อมูล">
                </form>
            </div>

            <button class="btn btn-primary" id="qrcode_view">QRcode ของฉัน <i class="fas fa-qrcode"></i></button>
            <button class="btn btn-secondary mt-2" onclick="alert('กำลังพัฒนา')">สอบถามเพิ่มเติม</button>
            <button class="btn btn-danger mt-2" id="logout">ออกจากระบบ</button>

        </div>
    </div>


    <!--QrCode View-->
    <div class="container-fluid mt-3" id="qrcode" style="display : none">
        <div>
            <button id="qr_close" class="btn btn-dark d-block ml-auto" style="border : 2px solid transparent; border-radius : 100px;">&times</button>
        </div>
        <div class="container mt-5 pt-5">

            <div style="margin-left : 7vw;" id="my_qrcode"></div>
            <div class="shadow shadow-sm " style="border : 2px transparent; border-radius : 50px;">
                <h4 class="text-center mt-5 p-2" style="font-size : 30px;"><?php echo $fetch['user_name'] ?></h4>
            </div>
        </div>

    </div>
    </div>





    <script src=" node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="css/fontawesome/js/all.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="js/qrcode.js"></script>
    <script src="js/main.js"></script>

    <script>
        /*Notification */
        $(document).ready(function() {
            reload();
            var qrcode = new QRCode("my_qrcode", {
                text: "<?php echo "https://192.168.1.13/DoctorAssistant?qr=" . $fetch['qr_id'] ?>",
                width: 250,
                height: 250,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        });

        function reload() {
            setTimeout(() => {
                $('#noti-page').load("db/notification.php");
                $('#map_show').load("db/map.php");
                $('#all-pill').load('db/pill.php')
                reload()
            }, 1000);


        }

        $('#qrcode_view').click(function() {
            $('#qrcode').show()
            $('#profile-page').hide()
        })
        $('#qr_close').click(function() {
            $('#qrcode').hide()
            $('#profile-page').show()

        })
    </script>
</body>

</html>