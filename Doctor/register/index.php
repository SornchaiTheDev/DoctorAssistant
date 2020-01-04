<?php
$error = "";
require "../../db/connect.php";
if (isset($_POST['id_card'])) {
    if (($_POST['id_card'] != '') && ($_POST['name'] != '') && ($_POST['home'] != '') && ($_POST['phone'] != '') && ($_POST['birthday'] != '')) {
        $id_card = $_POST['id_card'];
        $username = $_POST['name'];
        $home = $_POST['home'];
        $tel = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $photo = "db/user_pic/normal_user.png";

        //Date
        $date = date("Y-m-d");
        $qr_id = rand();
        $result = $conn->query("SELECT * FROM Users WHERE id_card = '$id_card'")->fetch_assoc();
        if (!$result['id']) {
            //Upload Profile Pic 
            $des = "../../db/user_pic/";
            move_uploaded_file($_FILES['pic']['tmp_name'], $des . $_FILES['pic']['name']);
            $profile_pic = "db/user_pic/" . $_FILES['pic']['name'];
            $conn->query("INSERT INTO Users (user_name,profile_img,qr_id,id_card,birthday,creation) VALUES ('$username','$profile_pic','$qr_id','$id_card','$birthday','$date')");
            $conn->query("INSERT INTO info (home,telephone,qr_id) VALUES ('$home','$tel','$qr_id')");




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
if (isset($_POST['error'])) {
    if ($_POST['error'] == 'form') {
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

<body style="background : url('../../asset/bg.jpg'); background-repeat : no-repeat; background-size : cover;">

    <div class="container jumbotron shadow shadow-lg mt-5" style="border : 2px transparent; border-radius : 50px; background-color : rgba(255,255,255,0.2);">

        <button class="btn btn-primary" onclick="window.location.href='../'"><i class="fas fa-arrow-left"></i></button>
        <h1 class="text-center mt-4 text-white">ลงทะเบียนผู้ป่วยใหม่</h1>
        <div id="status"><?php echo $status; ?></div>

        <form id="register" method="POST" class="form-group d-flex flex-column" enctype="multipart/form-data">
            <label for="name" class="mt-2">ชื่อผู้ป่วย</label>
            <input type="text" class="form-control mt-2" style="border : 2px transparent; border-radius : 50px;" name="name" id="name" placeholder="กรอกชื่อผู้ป่วย" required>
            <label for="name" class="mt-2">เลขประจำตัวประชาชน</label>
            <input type="text" class="form-control mt-2" style="border : 2px transparent; border-radius : 50px;" name="id_card" id="idcard" placeholder="กรอกบัตรประชาชน" required>
            <label for="name" class="mt-2">วันเกิด</label>
            <input type="date" class="form-control mt-2" style="border : 2px transparent; border-radius : 50px;" name="birthday" id="birthday" placeholder="กรอกวันเกิด" required>
            <label for="name" class="mt-2">ที่อยู่ผู้ป่วย</label>
            <textarea row="3" class="form-control mt-2" name="home" id="home" placeholder="กรอกที่อยู่" required></textarea>
            <label for="tel" class="mt-2">เบอร์โทรผู้ป่วย</label>
            <input type="text" class="mt-2 form-control" style="border : 2px transparent; border-radius : 50px;" name="phone" id="tel" placeholder="กรอกเบอร์โทร" required>
            <label for="photo" class="mt-2">รูปผู้ป่วย </label>
            <input type="file" name="pic" id="photo">
            <button type="submit" class="btn btn-success mt-5">ลงทะเบียน</button>
        </form>
        <div class="container d-flex flex-column">
       <?php if(isset($_POST['id_card'])){
           echo '<button class="btn btn-warning" onclick="print()">พิมพ์บัตรผู้ป่วย</button>';
       }
       ?>
    </div>
    </div>
  
    <script src="../../node_modules/jquery/dist/jquery.min.js"> </script>
    <script src="../../css/fontawesome/js/all.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        function print() {
            window.location.href='../print/index.php?idcard=<?php echo  $id_card; ?>'
        }
    </script>
</body>

</html>