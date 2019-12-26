<?php
$error = "";
require "../../db/connect.php";
if (isset($_GET['idcard'])) {
    if (($_GET['idcard'] != '') && ($_GET['name'] != '') && ($_GET['home'] != '') && ($_GET['tel'] != '')) {
        $id_card = $_GET['idcard'];
        $username = $_GET['name'];
        $home = $_GET['home'];
        $tel = $_GET['tel'];
        $photo = "db/user_pic/123456789.jpg";
        $qr_id = rand();
        $result = $conn->query("SELECT * FROM Users WHERE id_card = '$id_card'")->fetch_assoc();
        if (!$result['id']) {
            $conn->query("INSERT INTO Users (user_name,profile_img,qr_id,id_card) VALUES ('$username','$photo','$qr_id','$id_card')");
            $conn->query("INSERT INTO info (home,telephone,qr_id) VALUES ('$home','$tel','$qr_id')");

            /*
            $pic = $_FILES['photo'];
            $des = "user_pic/" . $qr_id . ".jpg";
            $file_name = $_FILES['photo']['tmp_name'];
            echo $_FILES['photo']['name'];
            if (($_FILES['photo']['type'] == 'image/jpg') || ($_FILES['photo']['type'] == 'image/png') || ($_FILES['photo']['type'] == 'image/jpeg')) {
                if ($_FILES['photo']['size'] < 500000) {
                    move_uploaded_file($file_name, $des);
                    $conn->query("UPDATE users SET profile_img = 'db/$des' WHERE qr_id = " . $_SESSION['qr'] . "   ");
                } else {
                    echo "ไฟล์ใหญ่เกินไป";
                }
            } else {
                echo "รองรับเฉพาะไฟล์ jpg png jpeg";
            }
            */

            $status = "<p class='text-success'>สมัครสมาชิกเสร็จสิ้น</p>";
        } else {
            $status = "<p class='text-danger'>*มีบัญชีอยู่แล้ว</p>";
        }
    } else {
        header("Location:index.php?error=form");
    }
} else {
    $status = "";
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'form') {
        $status = "<p class='text-danger'>*กรอกข้อมูลให้ครบ</p>";
    }
}
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
    <title>DoctorAssistant</title>
</head>

<body>

    <div class="container jumbotron">
        <button class="btn btn-primary" onclick="window.location.href='../'"><i class="fas fa-arrow-left"></i></button>
        <h1 class="text-center mt-4">ลงทะเบียนผู้ป่วยใหม่</h1>
        <?php echo $status; ?>

        <form id="register" method="GET" class="form-group d-flex flex-column">
            <label for="name" class="mt-2">ชื่อผู้ป่วย</label>
            <input type="text" class="form-control mt-2" name="name" id="name">
            <label for="name" class="mt-2">เลขประจำตัวประชาชน</label>
            <input type="text" class="form-control mt-2" name="idcard" id="idcard">
            <label for="name" class="mt-2">ที่อยู่ผู้ป่วย</label>
            <textarea row="3" class="form-control mt-2" name="home" id="home"></textarea>
            <label for="tel" class="mt-2">เบอร์โทรผู้ป่วย</label>
            <input type="text" class="mt-2 form-control" name="tel" id="tel">
            <!--
            <label for="photo" class="mt-2">รูปผู้ป่วย </label>
            <input type="file" name="photo" id="photo">
            -->
            <button type="submit" class="btn btn-success mt-5">ลงทะเบียน</button>
        </form>
    </div>
    <script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>