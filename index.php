<?php
require "db/connect.php";
if (isset($_GET['qr'])) {
    $qr_id = $_GET['qr'];
    $users = $conn->query("SELECT * FROM Users WHERE qr_id = $qr_id")->fetch_assoc();
    $user = $users['username'];
    $profile_img = $users['profile_image'];
} else {
    $user = "ไม่พบผู้ใช้";
    $profile_img = "img/no_user.png";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Doctor Assistant</title>
</head>

<body>
    <div class="container">

        <div class="card mx-auto shadow" style="width : 30rem; margin-top : 25vh;">

            <div class="card-body">
                <marquee behavior="" direction="" class="mb-3">🚑ประกาศ: ระบบปิดปรับปรุงตั้งแต่ 8 ธันวาคม - 11 ธันวาคม พ.ศ.2562💨💨</marquee>
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo $profile_img; ?>" class="rounded-circle img-fluid mx-auto d-block text-center" width="200" alt="">
                    </div>
                    <div class="col-12 mt-3">
                        <h4 class="text-center">ชื่อ : <?php echo $user; ?></h4>
                        <form action="" class="m-3" id="idcard">
                            <div class="form-group">
                                <label for="id_card">ป้อนเลขประจำตัว 13 หลัก</label>
                                <input type="text" name="qr" id="id_card" class="form-control">
                                <div id="validate"></div>
                                <input type="button" id="login" class="btn mx-auto d-block mt-3" value="เข้าสู่ระบบ">
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <script src=" node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $('#login').click(function(e) {
            e.preventDefault
            if (!$.isNumeric($('#id_card').val())) {
                var id_card = $('#id_card').val()

                $('#validate').load('db/validate.php', {
                    card_num: id_card
                })
            }



        });
    </script>
</body>

</html>