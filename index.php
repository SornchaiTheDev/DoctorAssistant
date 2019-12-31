<?php
session_start();

require "db/connect.php";
if (isset($_GET['qr'])) {
  
    $qr_id = $_GET['qr'];
    $_SESSION['qr'] = $_GET['qr'];
    $users = $conn->query("SELECT * FROM Users WHERE qr_id = $qr_id")->fetch_assoc();
    if(!$users){
        $user = "ไม่พบผู้ใช้";
        $profile_img = "img/no_user.png";    
    }else {
        $user = $users['user_name'];
        $profile_img = $users['profile_img'];
    }
    
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
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Doctor Assistant</title>
</head>

<body  style="background : url('asset/bg.jpg'); background-repeat : no-repeat; background-size : cover;">
    <div class="container">

        <div class="card mx-auto shadow" style="width : 20rem; margin-top : 10vh">

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
                                <input type="text" id="id_card" class="form-control">
                                <div id="validate"></div>
                                <input type="submit" id="login" class="btn d-block mx-auto mt-3" value="เข้าสู่ระบบ">
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <script src=" node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        
        $('#idcard').submit(function(e){
            e.preventDefault();
            id_num = $('#id_card').val()
            qrcode = '<?php echo $_GET['qr']?>'
            $('#validate').load('db/validate.php' , {id_card : id_num , qrcode : qrcode})
           
        });
           
       
    </script>
</body>

</html>