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
                <img src="img/profile.jpg" id="profile" width="50px;" class="img-fluid d-block ml-auto shadow shadow-sm" style="border : 2 px solid ; border-radius : 50px;" alt="">

            </div>
        </div>

        <!--Pill-->
        <div class="container mt-5" id="all-pill">
            <div class="row">
                <div class="col-12 d-flex flex-row mb-3">
                    <img src="img/profile.jpg" width="105px" alt="">
                    <h5 class="ml-3 mt-5">Abacavir (อะบาคาเวียร์)</h5>
                </div>
                <div class="col-12 d-flex flex-row mb-3">
                    <img src="img/profile.jpg" width="105px" alt="">
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
                    <div class="col-4 pt-2" id="calendar">
                        <i class="far fa-calendar d-block mx-auto" style="font-size : 30px"></i>
                        <p class="text-center mt-2" style="font-size : 12px;">ปฎิทิน</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Settings-->
    <div class="container-fluid mt-3" id="setting" style="display : none">
        <div>
            <button id="close" class="btn btn-dark d-block ml-auto" style="border : 2px solid transparent; border-radius : 100px;">&times</button>
        </div>
        <div class="d-flex flex-column">
            <img src="img/profile.jpg" width="200px" class="mx-auto" style="border : 2px solid transparent; border-radius : 100px;" alt="">
            <h4 class="text-center mt-4 mb-3">ชื่อ : ศรชัย สมสกุล</h4>
            <button class="btn btn-primary">QRcode ของฉัน <i class="fas fa-qrcode"></i></button>
            <button class="btn btn-secondary mt-2">ตั้งค่า</button>
            <button class="btn btn-secondary mt-2">สอบถามเพิ่มเติม</button>
            <button class="btn btn-danger mt-2" id="logout">ออกจากระบบ</button>
        </div>
    </div>


    <script src=" node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="css/fontawesome/js/all.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#profile').click(function() {
                $('#setting').show()
                $('#main').hide()
            });

            $('#close').click(function() {
                $('#setting').hide()
                $('#main').show()
            });

            $('#logout').click(function() {
                Swal.fire({
                    title: 'ออกจากระบบ',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ออกจากระบบ'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "index.php"

                    }
                })

            });



            $('#all-pill').show()
            $('#pill').css({
                'background-color': 'gold',
                'border': '2px solid transparent',
                'border-radius': '50px'
            })
            $('#map').click(function() {
                $('#all-pill').hide()
                $('#menu').text("ร้านยาใกล้ฉัน")
                $('#pill').css({
                    'background-color': '',
                    'border': '',
                    'border-radius': ''
                })
                $('#calendar').css({
                    'background-color': '',
                    'border': '',
                    'border-radius': ''
                })
                $('#map').css({
                    'background-color': 'gold',
                    'border': '2px solid transparent',
                    'border-radius': '50px'
                })
            });
            $('#pill').click(function() {
                $('#all-pill').show()
                $('#menu').text("ยาของฉัน")
                $('#map').css({
                    'background-color': '',
                    'border': '',
                    'border-radius': ''
                })
                $('#calendar').css({
                    'background-color': '',
                    'border': '',
                    'border-radius': ''
                })
                $('#pill').css({
                    'background-color': 'gold',
                    'border': '2px solid transparent',
                    'border-radius': '50px'
                })
            });
            $('#calendar').click(function() {
                $('#all-pill').hide()
                $('#menu').text("ปฎิทิน")
                $('#pill').css({
                    'background-color': '',
                    'border': '',
                    'border-radius': ''
                })
                $('#map').css({
                    'background-color': '',
                    'border': '',
                    'border-radius': ''
                })
                $('#calendar').css({
                    'background-color': 'gold',
                    'border': '2px solid transparent',
                    'border-radius': '50px'
                })
            });

        });
    </script>
</body>

</html>